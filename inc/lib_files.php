<?php
























/**
 * Class for fileserver access
 *
 */
class CS_FILES {

    /**
     * Show a web GUI filebrowser
     *
     * @param basedir $basedir
     * @param dir $dir
     */
    public static function showbrowser($basedir, $dir) {
        global $CONFIG_DATEFORMAT;

        $directory = $basedir . '/' . $dir;

        // Exit if try to access files outside our directory
        if (strstr($dir, '..') <> false) exit();
        $directory = realpath($directory);

        $dirs = explode('/', $dir);

        // Breadcrumb
        if (count($dirs) > 1) {
            echo('<div class="center"><table cellpadding="2" cellspacing="0" border="0"><tr>');
            echo('<td class="nametext"><a href="/">home</a></td>');
            $currentdir = '';
            foreach ($dirs as $d) {
                $currentdir .= '/' . $d . '';
                if ($d <> '') echo('<td class="nametext"><a href="/?dir=' . $currentdir . '"><img src="/img/arrow.png" border="0" />&nbsp;' . $d . '</a></td>');
            }
            echo('</tr></table></div>');
        }

        // Files and directories
        echo('<div class="center"><table cellpadding="6" cellspacing="0" border="0" class="browser">');
        $filesfound = false;
        if (is_dir($directory)) {
            if ($dh = opendir($directory)) {
                while (($file = readdir($dh)) !== false) {
                    if ($file <> '.' and $file <> '..') {
                        $filesfound = true;
                        $stat = stat($directory . '/' . $file);
                        $filetype = filetype($directory . '/' . $file);
                        echo('<tr class="browserline">');
                        CS_UTIL::showicon($filetype);

                        if ($filetype == 'dir') echo('<td class="nametext"><a href="/?dir=' . $dir . '/' . $file . '">' . $file . '</a></td>');
                        if ($filetype <> 'dir') echo('<td class="nametext"><a href="/?dir=' . $dir . ' &file=' . $file . '">' . $file . '</a></td>');
                        if ($filetype <> 'dir') echo('<td class="sizetext">' . $stat['size'] . ' byte</td>'); else echo('<td></td>');
                        echo('<td class="sizetext">' . date($CONFIG_DATEFORMAT, $stat['mtime']) . '</td>');
                        echo('</tr>');
                    }
                }
                closedir($dh);
            }
        }
        echo('</table>');
        if (!$filesfound) echo('<br />no files here');
        echo('</div>');
    }



    /**
     * Return the content of a file
     *
     * @param dir $dir
     * @param file $file
     */
    public static function get($dir, $file) {
        if (isset($_SESSION['username']) and $_SESSION['username'] <> '') {
            global $CONFIG_DATADIRECTORY;
            $filename = $CONFIG_DATADIRECTORY . '/' . $dir . '/' . $file;

            // Exit if try to access files outside our directory
            if (strstr($filename, '..') <> false) exit();

            CS_LOG::event($_SESSION['username'], 3, $dir . '/' . $file);

            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename=' . basename($file));
            header('Content-Transfer-Encoding: binary');
            header('Expires: 0');
            header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
            header('Pragma: public');
            header('Content-Length: ' . filesize($filename));
            readfile($filename);
        }
        exit;
    }


}



?>
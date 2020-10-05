<?php






















require_once('inc/lib_base.php');

if (isset($_GET['dir'])) $dir = $_GET['dir']; else $dir = '';

if (isset($_GET['file'])) {

    CS_FILES::get($dir, $_GET['file']);

} else {


    CS_UTIL::showheader();

    CS_FILES::showbrowser($CONFIG_DATADIRECTORY, $dir);

    echo('<br /><br /><p class="hint">Hint: Mount it via webdav like this: <a href="webdav://' . $_SERVER["HTTP_HOST"] . $WEBROOT . '/webdav/cloudshare.php">webdav://' . $_SERVER["HTTP_HOST"] . $WEBROOT . '/webdav/cloudshare.php</a></p>');

    CS_UTIL::showfooter();

}

?>
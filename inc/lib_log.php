<?php























/**
 * Class for logging features
 *
 */
class CS_LOG {

    /**
     * Array to define different log types
     *
     */
    public static $TYPE = array(
        1 => 'login',
        2 => 'logout',
        3 => 'read',
        4 => 'write'
    );


    /**
     * Log an event
     *
     * @param username $user
     * @param type $type
     * @param message $message
     */
    public static function event($user, $type, $message) {
        $result = CS_DB::query('insert into log (timestamp, user, type, message) values ("' . time() . '", "' . addslashes($user) . '", "' . addslashes($type) . '", "' . addslashes($message) .'")');
        CS_DB::free_result($result);
    }


    /**
     * Show the log entries in a web GUI
     *
     */
    public static function show() {
        global $CONFIG_DATEFORMAT;
        echo('<div class="center"><table cellpadding="6" cellspacing="0" border="0" class="browser">');

        $result = CS_DB::query('select timestamp, user, type, message from log order by timestamp desc limit 20');
        $count = CS_DB::numrows($result);
        for ($i = 0; $i < $count; $i++) {

            $entry = CS_DB::fetch_assoc($result);
            echo('<tr class="browserline">');
            echo('<td class="sizetext">' . date($CONFIG_DATEFORMAT, $entry['timestamp']) . '</td>');
            echo('<td class="highlighttext">' . CS_LOG::$TYPE[$entry['type']] . '</td>');
            echo('<td class="nametext">' . $entry['user'] . '</td>');
            echo('<td class="nametext">' . $entry['message'] . '</td>');
            echo('</tr>');
        }
        echo('</table></div>');
        CS_DB::free_result($result);

    }

}



?>
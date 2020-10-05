<?php























require_once('../config/config.php');
require_once('lib_base.php');
require_once('HTTP/WebDAV/Server/Filesystem.php');


ini_set('default_charset', 'UTF-8');
#ini_set('error_reporting', '');


if (empty($_SERVER['PHP_AUTH_USER']) && empty($_SERVER['REDIRECT_REMOTE_USER'])) {
    header('WWW-Authenticate: Basic realm="cloudshare"');
    header('HTTP/1.0 401 Unauthorized');
    die('401 Unauthorized');
}

$user = $_SERVER['PHP_AUTH_USER'];
$passwd = $_SERVER['PHP_AUTH_PW'];
if (($user == $CONFIG_ADMINLOGIN) and ($passwd == $CONFIG_ADMINPASSWORD)) {

    $server = new HTTP_WebDAV_Server_Filesystem();
    $server->db_host = $CONFIG_DBHOST;
    $server->db_name = $CONFIG_DBNAME;
    $server->db_user = $CONFIG_DBUSER;
    $server->db_passwd = $CONFIG_DBPWD;
    $server->ServeRequest($CONFIG_DATADIRECTORY);

} else {
    header('WWW-Authenticate: Basic realm="cloudshare"');
    header('HTTP/1.0 401 Unauthorized');
    die('401 Unauthorized');
}



?>
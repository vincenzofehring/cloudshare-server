<?php


// Owner
$CONFIG_FOOTEROWNERNAME = 'Code Monkeys Software';
$CONFIG_FOOTEROWNEREMAIL = 'info@codemonkeyssoftware.com';


// ADMIN ACCOUNT
$CONFIG_ADMINLOGIN = 'CodeMonkey';
$CONFIG_ADMINPASSWORD = '123';


// DB Config
$CONFIG_DBHOST = 'localhost';
$CONFIG_DBNAME = 'cloudshare';
$CONFIG_DBUSER = 'cloudshare';
$CONFIG_DBPWD = 'cloudshare';

// Directories
$CONFIG_DATADIRECTORY = '/www/testy';
$CONFIG_DOCUMENTROOT = '/www/cloudshare/htdocs';


// Force SSL
$CONFIG_HTTPFORCESSL = false;


// Other
$CONFIG_DATEFORMAT = 'j M Y G:i';

// Plugins
$CONFIG_LOADPLUGINS = 'music test';
// $CONFIG_LOADPLUGINS = '';


// Set the right include path
// Don't change unless you know what you are doing
set_include_path(get_include_path() . PATH_SEPARATOR . $CONFIG_DOCUMENTROOT . PATH_SEPARATOR . $CONFIG_DOCUMENTROOT . '/inc');

require_once('inc/lib_base.php');

?>
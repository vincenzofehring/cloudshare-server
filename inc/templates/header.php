<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>CloudShare</title>
    <link rel="stylesheet" type="text/css" href="/css/default.css" />
</head>
<body bgcolor="#F9F9F9">
<center><a href="/"><img src="img/cloudshare-logo-small.png" border="0"></a></center>
<?php

    if (!isset($_SESSION['username']) or $_SESSION['username'] == '') {

        echo('<br /><br /><center>');
        CS_UTIL::showloginform();
        echo('</center>');
        CS_UTIL::showfooter();
        exit();
    } else {

        echo('<br /><center>');
        CS_UTIL::shownavigation();
        echo('</center>');

    }

?>
<br />
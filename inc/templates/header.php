<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>CloudShare</title>
    <base href="<?php echo($WEBROOT); ?>/" />
    <link rel="stylesheet" type="text/css" href="css/default.css" />
</head>
<body>
<?php
    echo('<h1><a id="cloudshare-logo" href="' . $WEBROOT . '"><span>CloudShare</span></a></h1>');


    // Check if already configured. Otherwise start configuration wizard
    $error = CS_CONFIG::writeconfiglisener();
    echo $error;
    if (empty($CONFIG_ADMINLOGIN)) {
        $FIRSTRUN=true;
        echo('<div class="center">');
        echo('<p class="errortext">' . $error . '</p>');
        echo('<p class="highlighttext">First Run Wizard</p>');
        CS_CONFIG::showconfigform();
        echo('</div>');
        CS_UTIL::showfooter();
        exit();
    }


    // Show the loginform if not logged in
    if (!isset($_SESSION['username']) or $_SESSION['username'] == '') {
        echo('<div class="center">');
        CS_UTIL::showloginform();
        echo('</div>');
        CS_UTIL::showfooter();
        exit();
    } else {
        echo('<div id="nav" class="center">');
        CS_UTIL::shownavigation();
        echo('</div>');
    }

?>
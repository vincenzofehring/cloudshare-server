<?php























require_once('../inc/lib_base.php');

CS_UTIL::showheader();

// Uncheck the create and fill db options on default.
$createDB = false;
$fillDB = false;

echo('<div class="center">');
CS_CONFIG::showconfigform();
echo('</div>');


CS_UTIL::showfooter();

?>
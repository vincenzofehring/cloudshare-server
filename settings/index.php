<?php























require_once('../inc/lib_base.php');


CS_UTIL::showheader();

$FIRSTRUN = false;

echo('<div class="center">');
CS_CONFIG::showconfigform();
echo('</div>');


CS_UTIL::showfooter();

?>
<?php

if (!isset($_GET['viewmode'])) {
	$_GET['viewmode'] = "year";
}
if (isset($_GET['viewmode']) && $_GET['viewmode'] == "year") {
	
	global $strings;
	include("plugins/events/templates/calendar_year.php");
}

?>
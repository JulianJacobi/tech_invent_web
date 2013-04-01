<?php

if (!isset($_GET['viewmode'])) {
	$_GET['viewmode'] = "year";
}
if (isset($_GET['viewmode']) && $_GET['viewmode'] == "year") {
	$res = mysql_query("SELECT * FROM events");
	while ($row = mysql_fetch_assoc($res)) {
		if ($row['begin'] == $row['end']) {
			$event[$row['begin']]['h'] ++;
		}
	}
	global $strings;
	include("plugins/events/templates/calendar_year.php");
}

?>
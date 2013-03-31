<?php

if (isset($_GET['mode']) && $_GET['mode'] == "calendar") {
	include("plugins/events/engine/calendar.php");
}
?>
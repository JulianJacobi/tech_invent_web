<?php
include("plugins/usermanager/strings.php");

if(!isset($_POST['step'])) {
	global $strings;
	include("plugins/usermanager/templates/grouplist.php");
}

?>
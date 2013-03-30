<?php

if(isset($_GET['mode'])) {
	include("plugins/settings/templates/settings_menu.php");
	if (isset($_GET['part'])) {
//		$helper_path = $settings_modules[$_GET['mode']][$_GET['modul']];
		include("plugins/" . $_GET['mode'] . "/settings.php");
	}
}

?>
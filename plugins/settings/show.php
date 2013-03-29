<?php

function render_settings() {
global $settings_modules;
	if(isset($_GET['mode'])) {
		$helper_path = $settings_modules[$_GET['mode']][$_GET['modul']];
		include("plugins/".$_GET['mode']."/".$helper_path.".php");
	}
}

?>
<?php
global $settings_menu;
global $settings_modules;
if(!isset($_GET["modul"])) {
$_GET["modul"] = "Haupteinstellungen";
}
include("plugins/settings/templates/settings_menu.php");
include("plugins/settings/show.php");



render_settings();
?>
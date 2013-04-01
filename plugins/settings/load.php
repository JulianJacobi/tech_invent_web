<?php
/*
 * load file in settings Olugin for TechInvent
 * 
 * @author Julian Jacobi
 * @version 2013-03-29
 */

include("plugins/settings/strings.php");

function settings_add_plugin($plugin_identifier, $plugin_name) {
	global $menu;
	$menu->addSubmenuItem("settings", $plugin_name, $plugin_identifier);
}

$settings_menu = null;

function settings_add_item($plugin_identifier, $item_name, $item_value) {
	global $settings_menu;
    $settings_menu[$plugin_identifier][$item_name] = $item_value;
}

function settings_add_config_item($plugin_identifier) {
	global $strings;
	settings_add_item($plugin_identifier, $strings['settings']['configuration'], "configuration");
}

$menu->addMenuItem("settings", "Einstellungen");

settings_add_plugin("settings", "Main");

//settings_add_item("settings", "Main");

?>
<?php
/*
 * load file in settings Olugin for TechInvent
 * 
 * @author Julian Jacobi
 * @version 2013-03-29
 */

function settings_add_plugin($plugin_identifier, $plugin_name) {
	add_submenu_item("settings", $plugin_name, $plugin_identifier);
}

$settings_menu = null;

function settings_add_item($plugin_identifier, $item_name, $item_value) {
	global $settings_menu;
    $settings_menu[$plugin_identifier][$item_name] = $item_value;
}

add_menu_item("settings", "Einstellungen");

settings_add_plugin("settings", "Main");

//settings_add_item("settings", "Main");

?>
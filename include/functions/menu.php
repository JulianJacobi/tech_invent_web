<?php

function add_menu_item($plugin_identifier, $item_name, $item_get_value) {
    global $nav_menu;
    $nav_menu[$plugin_identifier][$item_name] = $item_get_value;
}
function add_settings_item($plugin_name, $item_name, $modul_name, $settings_path) {
	global $settings_menu;
	global $settings_modules;
	$settings_menu[$plugin_name] = $item_name;
	$settings_modules[$plugin_name][$modul_name] = $settings_path;
	
}
?>
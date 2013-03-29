<?php

function add_menu_item($plugin_identifier, $item_name, $item_get_value) {
    global $nav_menu;
    $nav_menu[$plugin_identifier][$item_name] = $item_get_value;
}
function add_settings_item($plugin_name, $item_name) {
	global $settings_menu;
	$settings_menu[$plugin_name] = $item_name;
}
?>
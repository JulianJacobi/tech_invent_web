<?php

$nav_submenu = null;
$nav_submenu = null;

function add_submenu_item($plugin_name, $item_name, $item_get_value) {
    global $nav_submenu;
    $nav_submenu[$plugin_name][$item_name] = $item_get_value;
}

function add_menu_item($plugin_name, $item_name) {
    global $nav_menu;
    $nav_menu[$plugin_name] = $item_name;
}

?>
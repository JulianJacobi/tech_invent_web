<?php

function add_menu_item($plugin_identifier, $item_name, $item_get_value) {
    $nav_menu[$plugin_identifier][$item_name] = $item_get_value;
}

?>
<?php

include ('plugins/events/strings.php');

add_menu_item("events", $strings['events']['main_menu_entry']);

add_submenu_item("events", $strings['events']['sub_menu_calendar'], "calendar");

?>
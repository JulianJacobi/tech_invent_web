<?php

include ('plugins/events/strings.php');

$menu->addMenuItem("events", $strings['events']['main_menu_entry']);

$menu->addSubmenuItem("events", $strings['events']['sub_menu_calendar'], "calendar");

?>
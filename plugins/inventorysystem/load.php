<?php

include ('plugins/inventorysystem/strings.php');

add_menu_item("inventorysystem", $strings['menu']['pluginname']);

add_submenu_item("inventorysystem", $strings['menu']['inventorylist'], "list");

?>
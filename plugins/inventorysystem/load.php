<?php

include ('plugins/inventorysystem/strings.php');
include ('plugins/inventorysystem/api.php');

$menu->addMenuItem("inventorysystem", $strings['menu']['pluginname']);

$menu->addSubmenuItem("inventorysystem", $strings['menu']['inventorylist'], "list");

settings_add_plugin("inventorysystem", $strings['menu']['pluginname']);

settings_add_item("inventorysystem", $strings['menu']['inventorylist'], "list");

?>
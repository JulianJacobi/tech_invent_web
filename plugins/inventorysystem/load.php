<?php

include ('plugins/inventorysystem/strings.php');
include ('plugins/inventorysystem/api.php');

$menu->addMenuItem("inventorysystem", $strings['menu']['pluginname']);

$menu->addSubmenuItem("inventorysystem", $strings['menu']['inventorylist'], "list");

?>
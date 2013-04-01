<?php

include ('plugins/inventorysystem/strings.php');
include 'plugins/inventorysystem/Inventory.php';

$res = mysql_query("SELECT * FROM inventorys");
while ($row = mysql_fetch_object($res)) {
	$inventorys[$row->name] = Inventory::readFromFileOrCreate($row->name);
}

$menu->addMenuItem("inventorysystem", $strings['menu']['pluginname']);

foreach($inventorys AS $name => $name2) {
	$menu->addSubmenuItem("inventorysystem", $name, ("list&inventory=".$name));
}

settings_add_plugin("inventorysystem", $strings['menu']['pluginname']);

settings_add_config_item("inventorysystem");

settings_add_item("inventorysystem", $strings['menu']['inventorylist'], "list");

?>
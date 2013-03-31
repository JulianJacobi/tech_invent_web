<?php
if(isset($_GET['mode']) && $_GET['part'] == "list"){
	include 'plugins/inventorysystem/Inventory.php';
	$res = mysql_query("SELECT * FROM inventorys");
	while ($row = mysql_fetch_object($res)) {
		$inv[$row->id] = Inventory::readFromFile($row->name);
	}
	global $strings;
	include("plugins/inventorysystem/templates/InventoryList.php");
}

?>
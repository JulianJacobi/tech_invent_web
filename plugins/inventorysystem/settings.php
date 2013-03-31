<?php
if(isset($_GET['mode']) && $_GET['part'] == "list"){
	if (!isset($_POST['step'])) {
		include 'plugins/inventorysystem/Inventory.php';
		$res = mysql_query("SELECT * FROM inventorys");
		while ($row = mysql_fetch_object($res)) {
			$inv[$row->id] = Inventory::readFromFileOrCreate($row->name);
			}
		global $strings;
		include("plugins/inventorysystem/templates/InventoryList.php");
	} elseif (isset($_POST['step']) && $_POST['step'] == "edit_inventory") {
		//InventoryEdit $_POSTs: iname & idescription
		global $strings;
		include("plugins/inventorysystem/templates/InventoryEdit.php");
	} elseif (isset($_POST['step']) && $_POST['step'] == "add_inventory") {
		//AddInventory $_POSTs: idescription & iname
	} elseif (isset($_POST['step']) && $_POST['step'] == "del_inventory") {
		//DelInventory $_POSTs: none
		global $strings;
		include("plugins/inventorysystem/templates/InventoryDelete.php");
	}
}

?>
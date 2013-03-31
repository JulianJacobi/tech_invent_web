<?php
global $inventorys;
if(isset($_GET['mode']) && $_GET['part'] == "list"){
	if (!isset($_POST['step'])) {
		$inv = $inventorys;
		include("plugins/inventorysystem/templates/InventoryList.php");
	} elseif (isset($_POST['step']) && $_POST['step'] == "edit_inventory") {
		if (isset($_POST['iname_old']) && isset($_POST['idescription'])) {
			$inv = $inventorys[$_POST['iname_old']];
			$inv->delete();
			$inv->name = $_POST['iname'];
			$inv->description = $_POST['idescription'];
			$inv->writeToFile();
			$inventorys[$_POST['iname']] = $inv;
			$inventorys[$_POST['iname_old']] == null;
			$inv = $inventorys;
			echo "<meta http-equiv='refresh' content='0; URL=$get_string'>";
		}
		//InventoryEdit $_POSTs: iname & idescription
		include("plugins/inventorysystem/templates/InventoryEdit.php");
	} elseif (isset($_POST['step']) && $_POST['step'] == "add_inventory") {
		$inv = new Inventory();
		$inv->name = $_POST['iname'];
		$inv->description = $_POST['idescription'];
		$inv->writeToFile();
		$inventorys[$_POST['iname']] = $inv;
		echo "<meta http-equiv='refresh' content='0; URL=$get_string'>";
		//AddInventory $_POSTs: idescription & iname
	} elseif (isset($_POST['step']) && $_POST['step'] == "del_inventory") {
		//DelInventory $_POSTs: none
		if (isset($_POST['del_inventory']) && $_POST['del_inventory'] == 'true') {
			$inv = $inventorys[$_POST['iname']];
			$inv->delete();
			$inv = $inventorys;
			global $get_string;
			echo "<meta http-equiv='refresh' content='0; URL=$get_string'>";
		} else {
			include("plugins/inventorysystem/templates/InventoryDelete.php");
		}
	}
}

?>
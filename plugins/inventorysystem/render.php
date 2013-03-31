<?php
if(isset($_GET['mode']) && $_GET['mode'] == "list"){
	include 'plugins/inventorysystem/Inventory.php';
	$result = mysql_query("SELECT name FROM inventorys;");
	while ($row = mysql_fetch_object($result)) {
		$inv[$row->name] = new Inventory($row->name);
	}
	global $strings;
	include("plugins/inventorysystem/templates/InventoryList.php");
}

?>
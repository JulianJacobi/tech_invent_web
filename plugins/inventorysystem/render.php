<?php
if(isset($_GET['mode']) && $_GET['mode'] == "list"){

	global $strings;
	include("plugins/inventorysystem/templates/InventoryList.php");
}

?>
<link href="plugins/inventorysystem/css/InventoryDelete.css" rel="stylesheet" type="text/css">
<?php global $get_string, $strings; ?>
<div class="templates_container inventorysystem_inventorylist_delete">
	<p class="templates_headline"><?php print($strings['inventorysystem']['inventorylist_delete_headline']); ?></p>
	
	<p><?php print($strings['inventorysystem']['inventorylist_delete_label1']."<b>".$_POST['iname']."</b>".$strings['inventorysystem']['inventorylist_delete_label2']); ?></p>
	<form action="<?php print $get_string; ?>" method="post" class="inventorysystem_inventorylist_delete">
		<input type="hidden" name="step" value="del_inventory">
		<input type="hidden" name="del_inventory" name="true">
		<input type="hidden" name="iname" value="<?php print($_POST['iname']); ?>">
		<a href="<?php print($get_string); ?>"><button class="system_button" type="button"><?php print($strings['inventorysystem']['inventorylist_delete_abr']); ?></button></a>
		<input type="submit" value="<?php print($strings['inventorysystem']['inventorylist_delete_ok']); ?>" class="system_button">
	</form>
</div>
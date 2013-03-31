<link href="plugins/inventorysystem/css/InventoryEdit.css" rel="stylesheet" type="text/css">
<?php global $strings, $get_string; ?>
<div class="templates_container inventorysystem_inventorylist_edit">
	<p class="templates_headline"><?php print($strings['inventorysystem']['inventorylist_edit_headline']." (".$_POST['iname'].")"); ?></p>
	<form action="<?php print($get_string); ?>" method="post" class="inventorysystem_inventorylist_edit">
		<input type="hidden" name="iname_old" value="<?php print $_POST['iname'] ?>">
		<p class="inventorysystem_inventorylist_edit_label"><?php print($strings['inventorysystem']['inventorylist_edit_name']) ?></p>
		<input type="text" name="iname" value="<?php print $_POST['iname']; ?>" class="system_input_text inventorysystem_inventorylist_edit_input">
		
	</form>
</div>
<link href="plugins/inventorysystem/css/InventoryEdit.css" rel="stylesheet" type="text/css">
<?php global $strings, $get_string; ?>
<div class="templates_container inventorysystem_inventorylist_edit">
	<p class="templates_headline"><?php print($strings['inventorysystem']['inventorylist_edit_headline']." (".$_POST['iname'].")"); ?></p>
	<form action="<?php print($get_string); ?>" method="post" class="inventorysystem_inventorylist_edit">
		<input type="hidden" name="step" value="edit_inventory">
		<input type="hidden" name="iname_old" value="<?php print $_POST['iname'] ?>">
		<p class="inventorysystem_inventorylist_edit_label"><?php print($strings['inventorysystem']['inventorylist_edit_name']); ?></p>
		<input type="text" name="iname" value="<?php print $_POST['iname']; ?>" class="system_input_text inventorysystem_inventorylist_edit_input">
		<p class="inventorysystem_inventorylist_edit_label"><?php print($strings['inventorysystem']['inventorylist_edit_description']); ?></p>
		<textarea class="system_input_text" name="idescription"><?php print($_POST['idescription']); ?></textarea>
		<input type="submit" value="<?php print($strings['inventorysystem']['inventorylist_edit_save']); ?>" class="system_button inventorysystem_inventorylist_edit_button">
	</form>
	<a href="<?php print($get_string); ?>"><button class="system_backbutton"><?php print($strings['main']['backbutton']); ?></button></a>
</div>
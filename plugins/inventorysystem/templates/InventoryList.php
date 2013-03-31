<link href="plugins/inventorysystem/css/InventoryList.css" rel="stylesheet" type="text/css">
<?php global $strings, $get_string; ?>
<div class="templates_container inventorysystem_inventorylist">
	<p class="templates_headline"><?php print($strings['inventorysystem']['inventorylist']); ?></p>
	<table class="inventorysystem_inventorylist" align="center">
	<tr class="inventorysystem_inventorylist_head"><td>
		<p><?php print($strings['inventorysystem']['inventorylist_name']); ?></p>
	</td><td>
		<p><?php print($strings['inventorysystem']['inventorylist_count']); ?></p>
	</td><td>
		<p><?php print($strings['inventorysystem']['inventorylist_description']); ?></p>
	</td></tr>
	<form action="<?php print($get_string); ?>" method="post">
		<input type="hidden" name="step" value="add_inventory">
	<tr class="inventorysystem_inventorylist_add"><td class="inventorysystem_inventorylist_entry_name">
		<input type="text" name="iname" class="system_input_text">
	</td><td></td><td>
		<textarea class="inventorysystem_inventorylist_add_textarea system_input_text" name="idescription"></textarea>
	</td><td>
		<input type="submit" value="<?php print($strings['inventorysystem']['inventorylist_add']); ?>" class="system_button">
	</td><td></td></tr>
	</form>
	<?php
		$style = 0;
		foreach ($inv AS $name => $inventory) {
			if ($style % 2 == 1) {
				$class = " inventorysystem_inventorylist_entry_hl1";
			} else {
				$class = " inventorysystem_inventorylist_entry_hl2";
			}
			print('<tr class="inventorysystem_inventorylist_entry'.$class.'"><td class="inventorysystem_inventorylist_entry_name">');
			print("$inventory->name");
			print('</td><td class="inventorysystem_inventorylist_entry_count">');
			print($inventory->item_count());
			print('</td><td class="inventorysystem_inventorylist_entry_description">');
			print("$inventory->description");
			print('</td><td>');
			?>
			<form action="<?php print($get_string); ?>" method="post">
				<input type="hidden" name="step" value="edit_inventory">
				<input type="hidden" name="iname" value="<?php print("$inventory->name"); ?>">
				<input type="hidden" name="iname_old" value="<?php print("$inventory->name"); ?>">
				<input type="submit" value="<?php print($strings['inventorysystem']['inventorylist_edit']); ?>" class="system_button inventorysystem_inventorylist_button">
			</form>
			<?php
			print('</td><td>');
			?>
			<form action="<?php print($get_string); ?>" method="post">
				<input type="hidden" name="step" value="del_inventory">
				<input type="hidden" name="iname" value="<?php print("$inventory->name"); ?>">
				<input type="submit" value="<?php print($strings['inventorysystem']['inventorylist_delete']); ?>" class="system_button inventorysystem_inventorylist_button">
			</form>
			<?php
			print('</td></tr>');
			
			$style++;
		}
	?>
	</table>
</div>
<link href="plugins/inventorysystem/css/InventoryList.css" rel="stylesheet" type="text/css">
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
	<form action=""
	<tr class="inventorysystem_inventorylist_add"><td>
		
	</td><td></td><td>
	
	</td><td>
	
	</td><td></td></tr>
	<?php
		foreach ($inv AS $name => $inventory) {
			print('<tr class="inventorysystem_inventorylist_entry"><td class="inventorysystem_inventorylist_entry_name">');
			print("$inventory->name");
			print('</td><td class="inventorysystem_inventorylist_entry_count">');
			print("$inventory->item_count");
			print('</td><td class="inventorysystem_inventorylist_entry_description">');
			print("$inventory->description");
			print('</td></tr>');
		}
	?>
	</table>
</div>
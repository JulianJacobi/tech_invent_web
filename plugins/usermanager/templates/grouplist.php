<?php 
global $strings, $get_string;
?>
<link href="plugins/usermanager/css/grouplist.css" rel="stylesheet" type="text/css">
<div id="usermanager_grouplist">
	<p id="usermanager_grouplist_headline"><?php print($strings['usermanager']['grouplist_headline']); ?></p>
	<table align="center">
	<tr class="usermanager_grouplist_head"><td>
		<p><?php print($strings['usermanager']['grouplist_id']) ?></p>
	</td><td>
		<p><?php print($strings['usermanager']['grouplist_name']) ?></p>
	</td><td>
		<p><?php print($strings['usermanager']['grouplist_description']); ?></p>
	</td></tr>
	<tr class="usermanager_grouplist_entry"><td></td><td valign="top">
		<form action="<?php print($get_string); ?>" method="post">
			<input type="hidden" name="step" value="new_groups">
			<input type="text" name="gname" class="system_input_text usermanager_grouplist_text">
	</td><td>
		<textarea name="gdescription" class="usermanager_grouplist_textarea"></textarea>
	</td><td valign="bottom">
			<input type="submit" value="<?php print($strings['usermanager']['grouplist_add']); ?>" class="system_button">
		</form>
	</td><td>
	</td></tr>
		
	<?php
	$abfrage_gruppen = mysql_query("SELECT * FROM groups");
	$j = 0;
	while($row = mysql_fetch_object($abfrage_gruppen)) {
		$description = "$row->description";
		$desc_array = explode(" ", $description);
		if (count($desc_array) >  $configs['config_grouplist_description_length']){
			 $desc_array = array_slice($desc_array, 0, $configs['config_grouplist_description_length']);
			 $desc_array[$configs['config_grouplist_description_length']] = "...";
		}
		$description = implode(" ", $desc_array);
		?>
		<tr class="usermanager_grouplist_entry <?php if($j % 2  == 0){ print("usermanager_grouplist_entry_hl"); } ?>"><td valign="top">
			<p><?php print("$row->id"); ?></p>
		</td><td valign="top">
			<p><?php print("$row->name"); ?></p>
		</td><td title="<?php print("$row->description") ?>">
			<p class="usermanager_grouplist_description"><?php print($description); ?></p>
		</td><td valign="middle">
			<form action="<?php print($get_string); ?>" method="post">
				<input type="hidden" name="step" value="edit_groups">
				<input type="hidden" name="gname" value="<?php print("$row->name"); ?>">
				<input type="submit" value="<?php print($strings['usermanager']['grouplist_edit']); ?>" class="system_button usermanager_grouplist_button">
			</form>
		</td><td valign="middle">
			<form action="<?php print($get_string); ?>" method="post">
				<input type="hidden" name="step" value="del_groups">
				<input type="hidden" name="gname" value="<?php print("$row->name"); ?>">
				<input type="submit" value="<?php print($strings['usermanager']['grouplist_del']); ?>" class="system_button usermanager_grouplist_button">
			</form>
		</td></tr>
		<?php
		$j++;
	}
	?>
	<tr><td colspan="2">
		<form action="<?php print($get_string); ?>" method="post">
			<input type="hidden" name="step" value="group_overview">
			<input type="submit" value="<?php print($strings['usermanager']['groupoverview']); ?>" class="system_button">
		</form>
		</td><td colspan="3">
		<form action="<?php print($get_string); ?>" method="post">
			<input type="hidden" name="step" value="perm_overview">
			<input type="submit" value="<?php print($strings['usermanager']['permissionoverview']); ?>" class="system_button">
		</form>
		</td></tr>
	</table>
</div>
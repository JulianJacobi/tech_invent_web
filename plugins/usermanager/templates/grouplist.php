<link href="plugins/usermanager/css/grouplist.css" rel="stylesheet" type="text/css">
<div id="usermanager_grouplist">
	<p id="usermanager_grouplist_headline"><?php print($strings['usermanager']['grouplist_headline']); ?></p>
	<table align="center">
	<tr class="usermanager_grouplist_head"><td>
		<p><?php print($strings['usermanager']['grouplist_id']) ?></p>
	</td><td>
		<p><?php print($strings['usermanager']['grouplist_name']) ?></p>
	</td></tr>
	<tr><td></td><td>
		<form action="./?plugin=settings&mode=usermanager&modul=Rechtegruppen" method="post">
			<input type="hidden" name="step" value="new_groups">
			<input type="text" name="gname" class="system_input_text usermanager_grouplist_text">
	</td><td>
			<input type="submit" value="<?php print($strings['usermanager']['grouplist_add']); ?>" class="system_button">
		</form>
	</td></tr>
		
	<?php
	$abfrage_gruppen = mysql_query("SELECT * FROM groups");
	$j = 0;
	while($row = mysql_fetch_object($abfrage_gruppen)) {
		?>
		<tr class="usermanager_grouplist_entry <?php if($j % 2  == 0){ print("usermanager_grouplist_entry_hl"); } ?>"><td>
			<p><?php print("$row->id"); ?></p>
		</td><td>
			<p><?php print("$row->name"); ?></p>
		</td><td>
			<form action="./?plugin=settings&mode=usermanager&modul=Rechtegruppen" method="post">
				<input type="hidden" name="step" value="edit_groups">
				<input type="hidden" name="edit" value="perms">
				<input type="hidden" name="gname" value="<?php print("$row->name"); ?>">
				<input type="submit" value="<?php print($strings['usermanager']['grouplist_edit']); ?>" class="system_button usermanager_grouplist_button">
			</form>
		</td><td>
			<form action="./?plugin=settings&mode=usermanager&modul=Rechtegruppen" method="post">
				<input type="hidden" name="step" value="del_groups">
				<input type="hidden" name="gname" value="<?php print("$row->name"); ?>">
				<input type="submit" value="<?php print($strings['usermanager']['grouplist_del']); ?>" class="system_button usermanager_grouplist_button">
			</form>
		</td></tr>
		<?php
		$j++;
	}
	?>
</div>
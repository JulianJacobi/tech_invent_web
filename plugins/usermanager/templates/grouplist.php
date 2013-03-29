<link href="plugins/usermanager/css/grouplist.css" rel="stylesheet" type="text/css">
<div id="usermanager_grouplist">
	<p id="usermanager_grouplist_headline"><?php print($strings['usermanager']['grouplist_headline']); ?></p>
	<table>
	<tr class="usermanager_grouplist_head"><td>
		<p><?php print($strings['usermanager']['grouplist_id']) ?></p>
	</td><td>
		<p><?php print($strings['usermanager']['grouplist_name']) ?></p>
	</td></tr>
	<?php
	$abfrage_gruppen = mysql_query("SELECT * FROM groups");
	$j = 0;
	while($row = mysql_fetch_object($abfrage_gruppen)) {
		?>
		<tr class="usermanager_grouplist_entry <?php if($j % 2  == 1){ print("usermanager_grouplist_entry_hl"); } ?>"><td>
			<p><?php print("$row->id"); ?></p>
		</td><td>
			<p><?php print("$row->name"); ?></p>
		</td><td>
			<form action="./?plugin=settings&mode=usermanager&modul=Rechtegruppen" method="post">
				<input type="hidden" name="step" value="edit_groups">
				<input type="hidden" name="edit" value="perms">
				<input type="hidden" name="gname" value="<?php print("$row->name"); ?>">
				<input type="submit" value="<?php print($strings['usermanager']['grouplist_edit']); ?>"
			</form>
		<?php
		$j++;
	}
	?>
</div>
<?php 
global $strings, $get_string;
?>
<link href="plugins/usermanager/css/groupoverview.css" rel="stylesheet" type="text/css">
<div id="usermanager_grouplist">
	<p id="usermanager_grouplist_headline"><?php print($strings['usermanager']['grouplist_headline']); ?></p>
	<div class="usermanager_groupoverview_table">
	<table align="center">
	<tr><td></td>
	<?php
	$abfrage_gruppen = mysql_query("SELECT * FROM login");
	$j = 0;
	while($row = mysql_fetch_object($abfrage_gruppen)) {
		?>
		<td class="usermanager_groupoverview_head <?php if($j % 2  == 0){ print("usermanager_groupoverview_head_hl"); } ?>">
			<p><?php print("$row->username"); ?></p>
		</td>
		<?php
		$users[$row->username] = $row->id;
		$j++;
	}
	?>
	</tr>
	<?php 
	$groupperms = null;
	foreach ($users AS $name => $num) {
		$abfrage_gruppen = mysql_query("SELECT * FROM perms ORDER BY name");
		while($row = mysql_fetch_assoc($abfrage_gruppen)) {
			$groupperms[$row['name']][$name] = has_userid_permission($num, $row['name']);
		}
	}
	$j = 0;
	foreach ($groupperms AS $perm => $groups) {
		?>
		<tr class="usermanager_groupoverview_entry <?php if($j % 2  == 0){ print("usermanager_groupoverview_entry_hl"); } ?>">
		<td><p><?php print($perm); ?></p></td>
		<?php 
		foreach ($groups AS $num => $val) {
			?>
			<td class="<?php if($val){ print("usermanager_groupoverview_entry_1"); } else { print("usermanager_groupoverview_entry_0"); } ?>"><p><?php print($val); ?></p></td>
			<?php
		}
		?>
		</tr>
		<?php 
		$j++;
	}
	?>
	</table>	
	</div>
	<a href="<?php print($get_string); ?>"><button class="system_backbutton"><?php print($strings['main']['backbutton']); ?></button></a>
</div>
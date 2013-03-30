<link href="plugins/usermanager/css/group_mono.css" rel="stylesheet" type="text/css">
<div id="usermanager_monogroup">
	<p id="usermanager_monogroup_headline"><?php print($strings['usermanager']['monogroup_headline']." (".$_POST['gname'].")") ?></p>
	
	<p class="usermanager_monogroup_label"><?php print($strings['usermanager']['monogroup_rights']) ?></p>
	<form action="./?plugin=settings&mode=usermanager&modul=Rechtegruppen" method="post">
		<input type="hidden" name="step" value="edit_groups">
		<input type="hidden" name="edit" value="perms">
		<input type="hidden" name="gname" value="<?php print($_POST['gname']) ?>">
	<?php
	$rights = get_permissions_for_group($_POST['gname']);
	foreach($rights AS $name => $state) {
		?>
		<input type="checkbox" name="<?php $name ?>" <?php if($state == 1){print("checked");}?> class="usermanager_monogroup_checkbox">
		<p class="usermanager_monogroup_checkboxlabel"><?php print($name) ?></p>
		<?php
	}
	?>
	<input type="submit" value="<?php print($strings['usermanager']['monogroup_rightsok']); ?>" class="system_button">
	</form>
	<a href="./?plugin=settings&mode=usermanager&modul=Rechtegruppen"><button class="system_backbutton"><?php print($strings['main']['backbutton']); ?></button></a>
</div>
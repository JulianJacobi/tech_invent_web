<?php 
global $strings, $get_string;
?>
<link href="plugins/usermanager/css/group_mono.css" rel="stylesheet" type="text/css">
<div id="usermanager_monogroup">
	<p id="usermanager_monogroup_headline"><?php print($strings['usermanager']['monogroup_headline']." (".$_POST['gname'].")") ?></p>
	<p id="usermanager_monogroup_status"><?php if (isset($done)) print($strings['usermanager']['monogroup_done']) ?></p>
	
	<p class="usermanager_monogroup_label"><?php print($strings['usermanager']['monogroup_rights']) ?></p>
	<form action="<?php print($get_string); ?>" method="post">
		<input type="hidden" name="step" value="edit_groups">
		<input type="hidden" name="edit" value="perms">
		<input type="hidden" name="gname" value="<?php print($_POST['gname']) ?>">
	<?php
	$rights = get_permissions_for_group($_POST['gname']);
	foreach($rights AS $name => $state) {
		?>
		<input type="checkbox" name="<?php print($name) ?>" <?php if($state == 1){print("checked");}?> class="usermanager_monogroup_checkbox">
		<p class="usermanager_monogroup_checkboxlabel"><?php print($name) ?></p>
		<?php
	}
	?>
	<input type="submit" value="<?php print($strings['usermanager']['monogroup_rightsok']); ?>" class="system_button">
	</form>
	<a href="<?php print($get_string); ?>"><button class="system_backbutton"><?php print($strings['main']['backbutton']); ?></button></a>
</div>
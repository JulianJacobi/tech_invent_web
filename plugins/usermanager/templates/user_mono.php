<?php 
global $strings, $get_string;
?>
<link href="plugins/usermanager/css/usermono.css" rel="stylesheet" type="text/css">
<div id="usermanager_monouser">
	<p id="usermanager_monouser_headline"><?php print($strings['usermanager']['userlist_headline']." (".$username.")"); ?></p>
	<p class="usermanager_monouser_label"><?php print($strings['usermanager']['monouser_rights']); ?></p>
	<form action="<?php print($get_string); ?>" method="post">
		<input type="hidden" name="step" value="user_mono">
		<input type="hidden" name="edit" value="groups">
		<input type="hidden" name="uname" value="<?php print($_POST['uname']); ?>">
	<?php 
		$groups = get_groups_for_user($_POST['uname']);
		foreach ($groups AS $name => $state) {
			?>
			<input type="checkbox" name="<?php print($name) ?>" <?php if($state == 1){print("checked");} ?> class="usermanager_monouser_checkbox"><p class="usermanager_monouser_checkboxlabel"><?php print($name); ?></p>
			<?php
		}
	?>
		<input type="submit" value="<?php print($strings['usermanager']['monouser_rightsok']); ?>" class="system_button usermanager_monouser_button">
	</form>
	<a href="<?php print($get_string); ?>"><button class="system_backbutton"><?php print($strings['main']['backbutton']); ?></button></a>
</div>
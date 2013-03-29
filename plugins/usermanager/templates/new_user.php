<link href="plugins/usermanager/css/new_user.css" rel="stylesheet" type="text/css">
<div id="usermanager_monouser">
	<p id="usermanager_newuser_headline"><?php print($strings['usermanager']['newuser_headline']); ?></p>
	<form action="./?plugin=settings&mode=usermanager&modul=Benutzerverwaltung" method="post" id="usermanager_newuser">
		<input type="hidden" name="step" value="add_user">
		<p class="usermanager_newuser_label"><?php print($strings['usermanager']['newuser_username']); ?></p>
		<?php
		if(isset($error) & $error == 1) {
			print('<p class="usermanager_newuser_error">'.$strings['usermanager']['newuser_error1'].'</p>');
		}
		?>
		<input type="text" name="newuser_username" class="system_input_text usermanager_user_settings" value="<?php  ?>">
		<p class="usermanager_newuser_label"><?php print($strings['usermanager']['newuser_passwd']); ?></p>
		<input type="password" name="newuser_passwd" class="system_input_text usermanager_user_settings">
		<p class="usermanager_newuser_label"><?php print($strings['usermanager']['newuser_repeat_passwd']); ?></p>
		<input type="password" name="newuser_passwd2" class="system_input_text usermanager_user_settings"><br>
		
		<input type="submit" value="<?php print $strings['usermanager']['newuser_add'] ?>" class="system_button usermanager_user_settings_button">
	</form>
</div>
<link href="plugins/usermanager/css/new_user.css" rel="stylesheet" type="text/css">
<div id="usermanager_newuser">
	<p id="usermanager_newuser_headline"><?php print($strings['usermanager']['newuser_headline']); ?></p>
	<form action="./?plugin=settings&mode=usermanager&modul=Benutzerverwaltung" method="post" id="usermanager_newuser">
		<input type="hidden" name="step" value="add_user">
		<p class="usermanager_newuser_label"><?php print($strings['usermanager']['newuser_username']); ?></p>
		<?php
		if(isset($error) & $error == 1) {
			print('<p class="usermanager_newuser_error">'.$strings['usermanager']['newuser_error1'].'</p>');
		}
		?>
		<input type="text" name="newuser_username" class="system_input_text usermanager_newuser" value="<?php print($new_username) ?>">
		<p class="usermanager_newuser_label"><?php print($strings['usermanager']['newuser_passwd']); ?></p>
		<?php
		if(isset($error) & $error == 2) {
			print('<p class="usermanager_newuser_error">'.$strings['usermanager']['newuser_error2'].'</p>');
		}
		?>
		<input type="password" name="newuser_passwd" class="system_input_text usermanager_newuser">
		<p class="usermanager_newuser_label"><?php print($strings['usermanager']['newuser_repeat_passwd']); ?></p>
		<?php
		if(isset($error) & $error == 3) {
			print('<p class="usermanager_newuser_error">'.$strings['usermanager']['newuser_error3'].'</p>');
		}
		?>
		<input type="password" name="newuser_passwd2" class="system_input_text usermanager_newuser"><br>
		
		<input type="submit" value="<?php print $strings['usermanager']['newuser_add'] ?>" class="system_button usermanager_newuser_button">
	</form>
</div>
<?php global $strings; ?>
<link href="plugins/usermanager/css/user_settings.css" rel="stylesheet" type="text/css">
<div id="user_settings">
	<p class="usermanager_user_settings_headline"><?php print($strings['usermanager']['user_settings_headline']); ?>
	<form action="./?plugin=usermanager&mode=user_settings" method="post">
		<input type="text" name="settings_new_username" class="system_input_text">
		
		<input type="password" name="settings_old_passwd" class="system_input_text">
		<input type="password" name="settings_new_passwd" class="system_input_text">
		<input type="password" name="settings_new_passwd2" class="system_input_text">
		
		<input type="submit" value="Ändern" class="system_button">
	</form>
</div>
<link href="plugins/usermanager/css/user_settings.css" rel="stylesheet" type="text/css">
<div id="user_settings">
	<p id="usermanager_user_settings_headline"><?php print($strings['usermanager']['user_settings_headline']); ?>
	<form action="./?plugin=usermanager&mode=user_settings" method="post" id="usermanager_user_settings">
		<p class="usermanager_user_settings_label"><?php print($strings['usermanager']['user_settings_username']); ?></p>
		<input type="text" name="settings_new_username" class="system_input_text usermanager_user_settings" value="<?php print($settings_new_username); ?>">
		
		<p class="usermanager_user_settings_label"><?php print($strings['usermanager']['user_settings_old_passwd']); ?></p>
		<input type="password" name="settings_old_passwd" class="system_input_text usermanager_user_settings">
		<p class="usermanager_user_settings_label"><?php print($strings['usermanager']['user_settings_new_passwd']); ?></p>
		<input type="password" name="settings_new_passwd" class="system_input_text usermanager_user_settings">
		<p class="usermanager_user_settings_label"><?php print($strings['usermanager']['user_settings_repeat_passwd']); ?></p>
		<input type="password" name="settings_new_passwd2" class="system_input_text usermanager_user_settings"><br>
		
		<input type="submit" value="Ändern" class="system_button usermanager_user_settings_button">
	</form>
</div>
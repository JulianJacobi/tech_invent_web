<?php global $strings; ?>
<link href="plugins/usermanager/css/user_settings.css" rel="stylesheet" type="text/css">
<div id="user_settings">
	<form action="./" method="post">
		<input type="text" name="settings_new_username">
		
		<input type="password" name="settings_old_passwd">
		<input type="password" name="settings_new_passwd">
		<input type="password" name="settings_new_passwd2">
		
		<input type="submit" value="Ändern">
	</form>
</div>
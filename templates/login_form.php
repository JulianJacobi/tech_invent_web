<div id="login">
	<form action="./" method="post" id="login_form">
		<p id="login_headline"><?php print($string_login_headline); ?></p>
		<p class="login_label"><?php print($string_login_username); ?></p>
		<input type="text" name="login_user" class="login_input"><br>
		<p class="login_label"><?php print($string_login_password); ?></p>
		<input type="password" name="login_passwd" class="login_input"><br>
		<?php
		if ($error) {
			print('<p class="login_error">'.$string_login_error.'</p>');
		}
		?>
		<input type="submit" value="<?php print($string_login_login); ?>" id="login_submit" class="login_input">
	</form>
</div>
<div id="login">
	<form action="./" method="post" id="login_form">
		<p id="login_headline">Login</p>
		<p class="login_label">Username:</p>
		<input type="text" name="login_user" class="login_input"><br>
		<p class="login_label">Passwort:</p>
		<input type="password" name="login_passwd" class="login_input"><br>
		<?php
		if ($error) {
			print('<p class="login_error">Login fehlgeschlagen!</p>');
		}
		?>
		<input type="submit" value="Anmelden" id="login_submit" class="login_input">
	</form>
</div>
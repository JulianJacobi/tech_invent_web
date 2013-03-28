<div id="login">
	<form action="./" method="post" id="login_form">
		<p id="login_headline"><?php print($strings['login']['headline']); ?></p>
		<p class="login_label"><?php print($strings['login']['username']); ?></p>
		<input type="text" name="login_user" class="login_input"><br>
		<p class="login_label"><?php print($strings['login']['password']); ?></p>
		<input type="password" name="login_passwd" class="login_input"><br>
		<?php
		if ($error) {
			print('<p class="login_error">'.$strings['login']['error'].'</p>');
		}
		?>
		<input type="submit" value="<?php print($strings['login']['login']); ?>" id="login_submit" class="login_input">
	</form>
</div>
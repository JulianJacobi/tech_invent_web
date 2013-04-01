<link href="plugins/settings/css/SettingsConfiguration.css" rel="stylesheet" type="text/css">
<?php global $strings, $get_string; ?>
<div class="templates_container settings_configuration">
	<p class="templates_headline"><?php print($strings['settings']['configuration_headline']." (".$plugin.")"); ?></p>
	<form action="<?php print($get_string); ?>" method="post" class="settings_configuration">
		<input type="hidden" name="step" value="save">
		<?php
		foreach ($settings AS $name => $value) {
			if (isset($strings[$plugin][$name])) {
				$label = $strings[$plugin][$name];
			} else {
				$label = $name;
			}
			print('<p>'.$label.'</p>');
			print('<input class="system_input_text" type="text" name="'.$name.'" value="'.$value.'">');
		}
		?>
		<br>
		<input type="submit" value="<?php print($strings['settings']['configuration_save']); ?>" class="system_button">
	</form>
</div>
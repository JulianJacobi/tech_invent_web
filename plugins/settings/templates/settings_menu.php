<link href="plugins/settings/css/settings_menu.css" rel="stylesheet" type="text/css">
<div id="settings_menu">
	<?php
	foreach ($settings_menu AS $plugin_name => $item_name) { 
			foreach ($settings_modules AS $modul_plugin_name => $modul_plugin_arry) {
				if ($modul_plugin_name == $plugin_name) {
					foreach ($modul_plugin_arry AS $modul_name => $modul_printname) {
	?>
					<div class='settings_menu_item'><a href='./?plugin=settings&mode=<?php print($plugin_name); ?>&modul=<?php print($modul_name); ?>'><?php print($modul_name); ?></a></div>
	<?php }}}} ?>
</div>
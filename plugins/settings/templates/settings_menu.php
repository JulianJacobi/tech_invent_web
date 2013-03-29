<link href="plugins/settings/css/settings_menu.css" rel="stylesheet" type="text/css">
<div id="settings_menu">
	<?php foreach ($settings_menu AS $plugin_name => $item_name) { ?>
		<div class='settings_menu_item'><a href='./?plugin=settings&mode=<?php print($plugin_name); ?>'><?php print($item_name); ?></a></div>
	<?php } ?>
</div>
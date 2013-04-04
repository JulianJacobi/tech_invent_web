<link href="plugins/settings/css/settings_menu.css" rel="stylesheet" type="text/css">
<div id='settings_menu'>
	<?php
	global $settings_menu, $get_string;
	if (isset($_GET['mode'])) {
		$mode = $_GET['mode'];
		$submenu = $settings_menu[$mode];
		foreach ($submenu AS $plugin => $plugin_menu) {
			if (isset($_GET['part']) && $_GET['part'] == $plugin_menu){
				$menuactive = "settings_menu_item_active";
			} else {
				$menuactive = " ";
			}
			?>
		    <div class='settings_menu_item <?php print($menuactive) ?>'>
		    	<a href='<?php print($get_string . "part=" . $plugin_menu); ?>'><?php print($plugin); ?></a>
		    </div>
		    <?php
		}
	}
	?>
</div>
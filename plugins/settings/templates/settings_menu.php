<link href=""
<div id='settings_menu'>
	<?php
	global $settings_menu, $get_string;
	if (isset($_GET['mode'])) {
		$mode = $_GET['mode'];
		$submenu = $settings_menu[$mode];
		foreach ($submenu AS $plugin => $plugin_menu) {
			?>
		    <div class='settings_menu_item'><a href='<?php print($get_string . "part=" . $plugin_menu); ?>'><?php print($plugin); ?></a></div>
		    <?php
		}
	}
	?>
</div>
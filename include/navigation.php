
<div id='menu'>
	<?php
	foreach ($nav_menu AS $plugin => $plugin_menu) {
		?>
	    <div class='menu_item'><a href='./?plugin=<?php print($plugin); ?>'><?php print($plugin_menu); ?></a></div>
	    <?php
	}
	$name = $_SESSION['username'];
	?>
	<div id='username'><?php print($name); ?></div>
</div>
<div id="second_menu">
	<?php 
	if (isset($_GET['plugin'])) {
		$plugin = $_GET['plugin'];
		$submenu = $nav_submenu[$plugin];
		if (isset($submenu))
			foreach ($submenu AS $name => $val) {
				?>
				<div class='secound_menu_item'>
					<a href='./?plugin=<?php print($plugin); ?>&mode=<?php print($val); ?>'><?php print($name); ?></a>
				</div>
				<?php
			}
	}
	?>
</div>
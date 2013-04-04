<div id='menu'>
	<?php
	$menu = $this->menu_items;
	foreach ($menu AS $plugin => $plugin_menu) {
		if(isset($_GET['plugin']) && $_GET['plugin'] == $plugin){
			$active = "menu_item_active";
		} else {
			$active = " ";
		}
		?>
	    <div class='menu_item <?php print $active; ?>'>
	    	<a href='./?plugin=<?php print($plugin); ?>'><?php print($plugin_menu); ?></a>
	    </div>
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
		$submenu = $this->submenu_items[$plugin];
		if (isset($submenu)){
			foreach ($submenu AS $name => $val) {
				if (isset($_GET['mode']) && $_GET['mode'] === $val){
					$subactive = "second_menu_item_active";
				} else {
					$subactive = " ";
				}
				?>
				<div class='second_menu_item <?php print($subactive) ?>'>
					<a href='./?plugin=<?php print($plugin); ?>&mode=<?php print($val); ?>'><?php print($name); ?></a>
				</div>
				<?php
			}
		}
	}
	?>
</div>
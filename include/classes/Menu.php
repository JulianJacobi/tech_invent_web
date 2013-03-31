<?php

class Menu
{
	
	public $submenu_items = array();
	public $menu_items = array();
	
	public function addSubmenuItem($plugin_name, $item_name, $item_get_value) {
	    $this->submenu_items[$plugin_name][$item_name] = $item_get_value;
	}
	
	public function addMenuItem($plugin_name, $item_name) {
	    $this->menu_items[$plugin_name] = $item_name;
	}
	
	public function render() {
		include("templates/MenuBar.php");
	}
	
}

?>
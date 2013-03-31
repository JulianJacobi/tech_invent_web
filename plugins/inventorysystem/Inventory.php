<?php

class Inventory
{
	protected $id = 0;
	public $name = "";
	public $description = "";
	
	protected $items = array();
	public $item_count = 0;
	
	public function readFromFile($name) {
		$filename = "plugins/inventorysystem/inventorys/" . $name . ".inventory";
		$file = fopen($filename, "r");
		$str = fread($file, filesize($filename));
		$this = unserialize($str);
		fclose($file);
	}
	
	public  function writeToFile($name) {
		$filename = "plugins/inventorysystem/inventorys/" . $name . ".inventory";
		$file = fopen($filename, "W");
		$str = serialize($this);
		fputs($file, $str);
		fclose($file);
	}
}

?>
<?php

class Inventory
{
	public $id = 0;
	public $name = "";
	public $description = "";
	
	public $items = array();
	
	public function item_count() {
		count($this->items);
	}
	
	public static function readFromFileOrCreate($name) {
		$filename = "plugins/inventorysystem/inventorys/" . $name . ".inventory";
		$file = @fopen($filename, "r");
		if ($file == false) {
			$new = new Inventory();
			$new->name = $name;
			mysql_query("INSERT INTO inventorys (id, name) VALUES (NULL , '" . $name . "');");
			return $new;
		}
		$str = fread($file, filesize($filename));
		fclose($file);
		return unserialize($str);
	}
	
	public  function writeToFile() {
		$filename = "plugins/inventorysystem/inventorys/" . $this->name . ".inventory";
		$file = fopen($filename, "w");
		$str = serialize($this);
		fwrite($file, $str);
		fclose($file);
	}
	
	public function delete() {
		mysql_query("DELETE FROM `tech_invent`.`inventorys` WHERE `inventorys`.`name` = '" . $this->name . "');");
		unlink($this->name);
	}
}

?>
<?php

class Inventory
{
	protected $id = 0;
	public $name = "";
	public $description = "";
	
	protected $items = array();
	public $item_count = 0;
	
	function __construct($name) {
		$this->name = $name;
		$result = mysql_query("SELECT * FROM inventorys WHERE name = '" . $name . "';");
		if (mysql_num_rows($result) > 0) {
			$row = mysql_fetch_object($result);
			$this->description = $row->description;
			$this->id = $row->id;
		}
	}
}

?>
<?php

function add_item_to_inventory($idcode, $serial, $name, $description) {
	mysql_query("INSERT INTO inventory (id, idcode, serial, name, description) VALUES (NULL , '" . $idcode . "', '" . $serial . "', '" . $name . "', '" . $description . "');");
}

function get_item_from_inventory($idcode) {
	mysql_query("INSERT INTO inventory (id, idcode, serial, name, description) VALUES (NULL , '" . $idcode . "', '" . $serial . "', '" . $name . "', '" . $description . "');");
}

?>
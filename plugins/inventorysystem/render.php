<?php

$result = mysql_query("SELECT * FROM inventory");
while ($row = mysql_fetch_assoc($result)) {
	echo $row['id'] . "," . $row['serial'] . "," . $row['name'] . "," . $row['description'];
}

?>
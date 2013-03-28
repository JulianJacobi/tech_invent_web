<?php

if (isset($_GET['mode']) && $_GET['mode'] == "show_users") {
	$e = mysql_query("SELECT * FROM login");
    while($row = mysql_fetch_assoc($e)) {
        $id = $row['id'];
        $name = $row['username'];
        $pass = $row['password'];
        echo "Id:$id, Name:$name, Pass:$pass<br>";
    }
}

?>
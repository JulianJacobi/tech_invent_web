<?php

if (isset($_GET['mode']) && $_GET['mode'] == "show_users") {
    global $config_db_server, $config_db_user, $config_db_password, $config_db_database;
    $login_connection = mysql_connect($config_db_server, $config_db_user, $config_db_password);
	mysql_select_db($config_db_database);
	$e = mysql_query("SELECT * FROM login");
    while($row = mysql_fetch_assoc($e)) {
        $id = $row['id'];
        $name = $row['username'];
        $pass = $row['password'];
        echo "Id:$id, Name:$name, Pass:$pass<br>";
    }
}

?>
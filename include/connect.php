<?php
/*
 * database connection for TechInvent
 *
 * @autor Julian Jacobi
 * @version 2013-03-28
 */

include("config/config_db.php");

mysql_connect($config_db_server, $config_db_user, $config_db_password)
or die ("Keine Verbindung zur Datenbank!");

mysql_select_db($config_db_database)
or die ("Datenbank existiert nicht!");
?>
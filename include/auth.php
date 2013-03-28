<?php
/*
 * Authentication for TechInvent
 *
 * @author Malte Kießling
 * @version 2013-03-28
 */
include("config/config_db.php");
 
$raw_login_user = "";
$raw_login_passwd = "";
if (!isset($_SESSION["login"])) {
	$_SESSION["login"] = false;
	generate_login(false);
	
}
if (isset($_POST["login_user"]) and isset($_POST["login_passwd"])) {
	$raw_login_user = $_POST["login_user"];
	$raw_login_passwd = $_POST["login_passwd"];
	
}



if($_SESSION["login"] == true) {
	//continue
	}
else {
	if($raw_login_passwd == "" and $raw_login_user == "") {
		generate_login(false);
	}
	
	$escaped_login_user = mysql_real_escape_string($raw_login_user);
	if($escaped_login_user != $raw_login_user){
		generate_login(true);
		}
	$hashed_login_passwd = md5($raw_login_passwd);
	$login_connection = mysql_connect($config_db_server, $config_db_user, $config_db_password);
	$abfrage = "SELECT * FROM login WHERE username == '$escaped_login_user' LIMIT 1";
	$ergebnis = mysql_query($abfrage);
	$row = mysql_fetch_object($ergebnis)
    
	if(md5($row->username.$row->password) == md5($escaped_login_user.$hashed_login_passwd) {
		$_SESSION["login"] = true;
		$_SESSION["userid"] = $row->id;
		$_SESSION["username"] = $row->username;
		}
	else
	{
		generate_login(true);
		}
}
function generate_login($error)
{
include("templates/login_form.php");
exit;
}

?>
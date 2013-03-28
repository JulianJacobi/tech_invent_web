<?php
/*
 * Authentication for TechInvent
 *
 * @author Malte Kießling
 * @version 2013-03-28
 */

require_once("config/config_db.php");
$raw_login_user = $_POST["login_user"];
$raw_login_passwd = $_POST["login_passwd"];
if(isset($raw_login_user) and isset($raw_login_passwd)) {
	if ($raw_login_user == "" and $raw_login_passwd == "") {
		generate_login(false);
	}
}
else {
	generate_login(false);
}


function generate_login($error)
{

exit;
}

?>
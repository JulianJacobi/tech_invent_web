<?php
/*
 * Authentication for TechInvent
 *
 * @author Malte Kießling
 * @version 2013-03-28
 */

$raw_login_user = "";
$raw_login_passwd = "";
if (!isset($_SESSION["login"])) {
	$_SESSION["login"] = false;
}
if (isset($_POST["login_user"]) and isset($_POST["login_passwd"])) {
	$raw_login_user = $_POST["login_user"];
	$raw_login_passwd = $_POST["login_passwd"];
}

if($_SESSION["login"] == false) {
generate_login(false);
}
else if($raw_login_user == "" or $raw_login_passwd == "" ) {
generate_login(true);
}       
else if($_SESSION["login"] == true) {
	//continue
	}
else {
generate_login(true);
}
function generate_login($error)
{
include("templates/login_form.php");
exit;
}

?>
<?php


//Ist die Session erstellt? Melden wir uns ab?

if (!isset($_SESSION["login"]) || isset($_GET["plugin"]) && $_GET["plugin"] == "logout") {
	$_SESSION["login"] = false;
	$_SESSION["userid"] = 0;
	$_SESSION["username"] = "";
	generate_login(false);	
}

//Erstellen und leeren der Roh-Variablen
 
$raw_login_user = "";
$raw_login_passwd = "";

//Wird was wer POST übergeben?
if (isset($_POST["login_user"]) and isset($_POST["login_passwd"])) {
	$raw_login_user = $_POST["login_user"];
	$raw_login_passwd = $_POST["login_passwd"];	
}

//Bin ich angemeldet?
if($_SESSION["login"] == true) {
	//continue
	}
	
//Denn wenn nicht...
else {
	//...schaue ich, ob man überhabt was übergeben hat...
	if($raw_login_passwd == "" and $raw_login_user == "") {
		generate_login(false);
	}
	
	//dafür sorgen, das auch ja nimand hackt,...
	$escaped_login_user = mysql_real_escape_string($raw_login_user);
	if($escaped_login_user != $raw_login_user){
		generate_login(true);
		}
		
	//und hab dann hier ne challange für den login!
	$hashed_login_passwd = md5($raw_login_passwd);
	
	$abfrage = "SELECT * FROM login WHERE username = '$escaped_login_user' LIMIT 1";
	$ergebnis = mysql_query($abfrage); 
	$row = mysql_fetch_object($ergebnis);
    if(isset($row->username) and isset($row->password) and isset($row->id)) { 
		if(md5($row->username.$row->password) == md5($escaped_login_user.$hashed_login_passwd)) {
			//Eintragen der Darten in die Session...
			$_SESSION["login"] = true;
			$_SESSION["userid"] = $row->id;
			$_SESSION["username"] = $row->username;
			}
		else
		{
			//... oder auch nicht
			$_SESSION["login"] = false;
			generate_login(true);
			}
	}
	else {
		generate_login(true);
	}
	
	if (!has_permission("login")) {
	generate_login("true");
}
}
//Das is die Funktion, die im falle das Irgentwas mit Login passiert aufgerufen wird.
function generate_login($error)
{
include("templates/forms/Login.php");
exit;
}

?>
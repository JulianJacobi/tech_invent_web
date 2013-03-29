<?php
//Nutzerliste
if (isset($_GET['mode']) && $_GET['mode'] == "show_users") {
	$e = mysql_query("SELECT * FROM login");
    while($row = mysql_fetch_assoc($e)) {
        $id = $row['id'];
        $name = $row['username'];
        $pass = $row['password'];
        echo "Id:$id, Name:$name, Pass:$pass<br>";
    }
}

//Einstellungen
else if (isset($_GET['mode']) && $_GET['mode'] == "user_settings") {
	if(isset($_POST["settings_old_passwd"]) and isset($_POST["settings_new_passwd"]) and isset($_POST["settings_new_passwd2"]) and isset($_POST["settings_new_username"]) ) {
		$settings_old_passwd = $_POST["settings_old_passwd"];
		$settings_new_passwd = $_POST["settings_new_passwd"];
		$settings_new_passwd2 = $_POST["settings_new_passwd2"];
		$settings_new_username = $_POST["settings_new_username"];
		$settings_escaped_query = mysql_real_escape_string($_SESSION["username"]);
		$settings_query = mysql_query("SELECT * FROM login WHERE username = '$settings_escaped_query' LIMIT 1");
		$settings_return = mysql_fetch_object($settings_query);
		if ($settings_old_passwd == "") {
			generate_setting_template(0);
			}
		else if ($settings_new_passwd != $settings_new_passwd2) {
			generate_setting_temlate(1);
		}
		else if ((md5(md5($settings_old_passwd).$_SESSION["username"])) == md5($settings_return->username.$settings_return->password)) {
			if($settings_new_passwd != "") {
				$settings_new_passwd = md5($settings_new_passwd);
				$settings_escaped_userid = mysql_real_escape_string($_SESSION["userid"]);
				$settings_change_query = mysql_query("UPDATE login Set password = '$settings_new_passwd' WHERE id = '$settings_escaped_userid'");
			}
			
			if($settings_new_username != "") {
				$_SESSION['username'] = $settings_new_username;
				$settings_escaped_userid = mysql_real_escape_string($_SESSION["userid"]);
				$settings_change_query = mysql_query("UPDATE login Set username = '$settings_new_username' WHERE id = '$settings_escaped_userid'");
			}
			generate_setting_temlate(3);
		} 
		else {
			generate_setting_temlate(2);
		}
			
	}
}

function generate_setting_template($setting_state)
{
include("/plugins/usermanager/templates/user_settings.php");
}
?>
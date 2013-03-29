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
		$settings_new_passwd = md5($_POST["settings_new_passwd"]);
		$settings_new_passwd2 = $_POST["settings_new_passwd2"];
		$settings_new_username = $_POST["settings_new_username"];
		if ($settings_old_passwd == "") {
			generate_setting_template(0);
			}
		else if ($settings_new_passwd != $settings_new_passwd2) {
			generate_setting_temlate(1);
		}
		$
		else if ((md5(md5($settings_old_passwd).$_SESSION["username"])) == )
		
	}
}

function generate_setting_template($setting_state)
{

}
?>
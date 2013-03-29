<?php
include("plugins/usermanager/strings.php");
if(!isset($_POST['step'])){
	$e = mysql_query("SELECT * FROM login ORDER BY id");
	$i = 0;
	while($row = mysql_fetch_assoc($e)) {
	    $id = $row['id'];
	    $name = $row['username'];
	    $pass = $row['password'];
	    $users[$i]['id'] = $id;
	    $users[$i]['name'] = $name;
	    $users[$i]['pass'] = $pass;
	    $i++;
	}
	global $strings;
	include("plugins/usermanager/templates/userlist.php");
} elseif (isset($_POST['step']) && $_POST['step'] == "user_mono") {
	$userid = $_POST['uid'];
	$username = $_POST['uname'];
	if (isset($_POST['edit']) && $_POST['edit'] == "groups") {
		$groups = get_groups_for_user($username);
		foreach ($groups AS $name => $val) {
			if (isset($_POST[$name]))
				if ($_POST[$name] == "on") {
					$groups[$name] = true;
				} else {
					$groups[$name] = false;
				}
		}
		 set_groups_for_user($username, $groups);
	}
	global $strings;
	include("plugins/usermanager/templates/user_mono.php");
} elseif (isset($_POST['step']) && $_POST['step'] == "add_user") {
	if(!isset($_POST['newuser_username']) || !isset($_POST['newuser_passwd']) || !isset($_POST['newuser_passwd2'])){
		global $string;
		$new_username = "";
		include("plugins/usermanager/templates/new_user.php");
		exit;
	}
	if(isset($_POST['newuser_username']) && !ctype_space($_POST['newuser_username']) && $_POST['newuser_username'] != "") {
		$new_username = mysql_real_escape_string($_POST['newuser_username']);
		if(!user_exists($new_username)) {
			if(isset($_POST['newuser_passwd']) && !ctype_space($_POST['newuser_passwd']) && $_POST['newuser_passwd'] != "") {
				$new_passwd = md5(mysql_real_escape_string($_POST['newuser_passwd']));
				$new_passwd2 = md5(mysql_real_escape_string($_POST['newuser_passwd2']));
				if($new_passwd == $new_passwd2){
					add_user($new_username, $new_passwd);
					echo '<meta http-equiv="refresh" content="0; URL=./?plugin=settings&mode=usermanager&modul=Benutzerverwaltung">';
				} else {
					global $string;
					$error = 3;
					include("plugins/usermanager/templates/new_user.php");
				}
			} else {
				global $string;
				$error = 2;
				include("plugins/usermanager/templates/new_user.php");
			}
		} else {
			global $string;
			$error = 1;
			include("plugins/usermanager/templates/new_user.php");
		}
	} else {
		global $string;
		$error = 1;
		include("plugins/usermanager/templates/new_user.php");
	}

} elseif (isset($_POST['step']) && $_POST['step'] == "del_user") {
	global $strings;
	include("plugins/usermanager/templates/del_user.php");
	if (isset($_POST['delete']) && $_POST['delete'] == "true") {
		$username = mysql_real_escape_string($_POST['uname']);
		remove_user($username);
		echo '<meta http-equiv="refresh" content="0; URL=./?plugin=settings&mode=usermanager&modul=Benutzerverwaltung">';
	}
}
?>
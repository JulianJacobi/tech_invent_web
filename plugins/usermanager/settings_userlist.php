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
	global $strings;
	include("plugins/usermanager/templates/user_mono.php");
}
?>
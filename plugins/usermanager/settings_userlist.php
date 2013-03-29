<?php
include("plugins/usermanager/strings.php");
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

?>
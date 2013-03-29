<?php
function has_permission($perm) {
	$escaped_user_id = mysql_real_escape_string($_SESSION['userid']);
	$result = mysql_query("SELECT perms.id FROM perms, groupperms, usergroups WHERE usergroups.group = groupperms.group AND groupperms.perm = perms.id AND perms.name = '" . $perm . "' AND usergroups.userid = " . $escaped_user_id);
	if ($result != null AND mysql_num_rows($result) == 1)
		return true;
		
	return false;
}

function add_user_to_group($username, $groupname) {
	$result = mysql_query("SELECT login.id AS userid, groups.id AS groupid FROM login, groups WHERE login.username = '" . $username . "' AND groups.name = '" . $groupname . "';");
	$row = mysql_fetch_object($result);
	$userid = $row['userid'];
	$groupid = $row['groupid'];
	mysql_query("INSERT INTO `tech_invent`.`usergroups` (`id`, `userid`, `group`) VALUES (NULL, '" . $userid . "', '" . $groupid . "');");
}

function remove_user_from_group($username, $groupname) {
	$result = mysql_query("SELECT login.id AS userid, groups.id AS groupid FROM login, groups WHERE login.username = '" . $username . "' AND groups.name = '" . $groupname . "';");
	$row = mysql_fetch_object($result);
	$userid = $row['userid'];
	$groupid = $row['groupid'];
	mysql_query("DELETE FROM usergroups WHERE usergroups.userid = '" . $userid . "' AND usergroups.group = '" . $groupid . "';");
}

function add_permission_to_group($permissionname, $groupname) {
	$result = mysql_query("SELECT perms.id AS permid, groups.id AS groupid FROM perms, groups WHERE perms.name = '" . $permissionname . "' AND groups.name = '" . $groupname . "';");
	$row = mysql_fetch_object($result);
	$permid = $row['permid'];
	$groupid = $row['groupid'];
	mysql_query("INSERT INTO `tech_invent`.`groupperms` (`id`, `group`, perm) VALUES (NULL, '" . $groupid . "', '" . $permid . "');");
}

function remove_permission_from_group($permissionname, $groupname) {
	$result = mysql_query("SELECT perms.id AS permid, groups.id AS groupid FROM perms, groups WHERE perms.name = '" . $permissionname . "' AND groups.name = '" . $groupname . "';");
	$row = mysql_fetch_object($result);
	$permid = $row['permid'];
	$groupid = $row['groupid'];
	mysql_query("DELETE FROM groupperms WHERE groupperms.group = '" . $groupid . "' AND groupperms.perm = '" . $permid . "');");
}

function add_group($groupname, $description) {
	if (mysql_num_rows(mysql_query("SELECT * FROM groups WHERE name = '" . $groupname . "';")) == 0)
		mysql_query("INSERT INTO groups (`id`, `name`, `description`) VALUES (NULL, '" . $groupname . "', '" . $description . "');");
}

function remove_group($groupname) {
	mysql_query("DELETE FROM groups WHERE name = '" . $groupname . "';");
}

function add_permission($permname, $description) {
	if (mysql_num_rows(mysql_query("SELECT * FROM perms WHERE name = '" . $permname . "';")) == 0)
		mysql_query("INSERT INTO perms (`id`, `name`, `description`) VALUES (NULL, '" . $permname . "', '" . $description . "');");
}

function remove_permission($permname) {
	mysql_query("DELETE FROM perms WHERE name = '" . $permname . "';");
}

function get_groups_for_user($username) {
	$result = mysql_query("SELECT groups.name, (usergroups.group = groups.id) AS res FROM groups, usergroups, login WHERE login.username = '" . $username . "' AND  login.id = usergroups.userid");
	while($row = mysql_fetch_object($result)) {
		$name = $row['name'];
		$bool = $row['res'];
		$res[$name] = $bool;
	}
	return $res;
}

function set_groups_for_user($username, $new) {
	$old = get_groups_for_user($username);
	foreach ($old AS $name => $bool) {
		if ($bool == $new[$name])
			continue;
		if ($bool == true && $new[$name] == false) {
			remove_user_from_group($username, $name);
		} else {
			add_user_to_group($username, $name);
		}
	}
}

?>
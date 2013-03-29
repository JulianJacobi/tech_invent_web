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
	$row = mysql_fetch_assoc($result);
	$userid = $row['userid'];
	$groupid = $row['groupid'];
	mysql_query("INSERT INTO `tech_invent`.`usergroups` (`id`, `userid`, `group`) VALUES (NULL, '" . $userid . "', '" . $groupid . "');");
}

function remove_user_from_group($username, $groupname) {
	$result = mysql_query("SELECT login.id AS userid, groups.id AS groupid FROM login, groups WHERE login.username = '" . $username . "' AND groups.name = '" . $groupname . "';");
	$row = mysql_fetch_assoc($result);
	$userid = $row['userid'];
	$groupid = $row['groupid'];
	mysql_query("DELETE FROM usergroups WHERE usergroups.userid = '" . $userid . "' AND usergroups.group = '" . $groupid . "';");
}

function add_permission_to_group($permissionname, $groupname) {
	$result = mysql_query("SELECT perms.id AS permid, groups.id AS groupid FROM perms, groups WHERE perms.name = '" . $permissionname . "' AND groups.name = '" . $groupname . "';");
	$row = mysql_fetch_assoc($result);
	$permid = $row['permid'];
	$groupid = $row['groupid'];
	mysql_query("INSERT INTO `tech_invent`.`groupperms` (`id`, `group`, perm) VALUES (NULL, '" . $groupid . "', '" . $permid . "');");
}

function remove_permission_from_group($permissionname, $groupname) {
	$result = mysql_query("SELECT perms.id AS permid, groups.id AS groupid FROM perms, groups WHERE perms.name = '" . $permissionname . "' AND groups.name = '" . $groupname . "';");
	$row = mysql_fetch_assoc($result);
	$permid = $row['permid'];
	$groupid = $row['groupid'];
	mysql_query("DELETE FROM groupperms WHERE groupperms.group = '" . $groupid . "' AND groupperms.perm = '" . $permid . "');");
}

function add_user($username, $password) {
	if (!user_exists($username))
		mysql_query("INSERT INTO login (`id`, `username`, `password`) VALUES (NULL, '" . $username . "', '" . $password . "');");
}

function remove_user($username) {
	$result = mysql_fetch_assoc(mysql_query("SELECT id FROM login WHERE username = '" . $username . "';"));
	$id = $result['id'];
	mysql_query("DELETE FROM usergroups WHERE userid = " . $id);
	mysql_query("DELETE FROM login WHERE username = '" . $username . "';");
}

function add_group($groupname, $description) {
	if (!group_exists($groupname))
		mysql_query("INSERT INTO groups (`id`, `name`, `description`) VALUES (NULL, '" . $groupname . "', '" . $description . "');");
}

function remove_group($groupname) {
	$result = mysql_fetch_assoc(mysql_query("SELECT id FROM groups WHERE name = '" . $groupname . "';"));
	$id = $result['id'];
	mysql_query("DELETE FROM usergroups WHERE group = " . $id);
	mysql_query("DELETE FROM groupsperms WHERE group = " . $id);
	mysql_query("DELETE FROM groups WHERE name = '" . $groupname . "';");
}

function add_permission($permname, $description) {
	if (!permission_exists($permname))
		mysql_query("INSERT INTO perms (`id`, `name`, `description`) VALUES (NULL, '" . $permname . "', '" . $description . "');");
}

function remove_permission($permname) {
	$result = mysql_fetch_assoc(mysql_query("SELECT id FROM perms WHERE name = '" . $permname . "';"));
	$id = $result['id'];
	mysql_query("DELETE FROM groupsperms WHERE group = " . $id);
	mysql_query("DELETE FROM perms WHERE name = '" . $permname . "';");
}

function user_exists($username) {
	return !mysql_num_rows(mysql_query("SELECT * FROM login WHERE username = '" . $username . "';")) == 0;
}

function group_exists($groupname) {
	return !mysql_num_rows(mysql_query("SELECT * FROM groups WHERE name = '" . $groupname . "';")) == 0;
}

function permission_exists($permname) {
	return !mysql_num_rows(mysql_query("SELECT * FROM perms WHERE name = '" . $permname . "';")) == 0;
}

function get_groups_for_user($username) {
	$result = mysql_query("SELECT name FROM groups");
	while($row = mysql_fetch_assoc($result)) {
		$name = $row['name'];
		$res[$name] = 0;
	}
	$result = mysql_query("SELECT groups.name FROM groups, usergroups, login WHERE login.username = '" . $username . "' AND login.id = usergroups.userid AND usergroups.group = groups.id");
	while($row = mysql_fetch_assoc($result)) {
		$name = $row['name'];
		$res[$name] = 1;
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
			//echo "del:" . $username . ":" . $name . ";<br>";
		} else {
			add_user_to_group($username, $name);
			//echo "add:" . $username . ":" . $name . ";<br>";
		}
	}
}

function get_permissions_for_group($groupname) {
	$result = mysql_query("SELECT name FROM perms");
	while($row = mysql_fetch_assoc($result)) {
		$name = $row['name'];
		$res[$name] = 0;
	}
	$result = mysql_query("SELECT perms.name FROM perms, groupperms, groups WHERE groups.name = '" . $groupname . "' AND groups.id = groupperms.group AND groupperms.perm = perms.id");
	while($row = mysql_fetch_assoc($result)) {
		$name = $row['name'];
		$res[$name] = 1;
	}
	return $res;
}

function set_permissions_for_group($groupname, $new) {
	$old = get_permissions_for_group($groupname);
	foreach ($old AS $name => $bool) {
		if ($bool == $new[$name])
			continue;
		if ($bool == true && $new[$name] == false) {
			remove_permission_from_group($groupname, $name);
			//echo "del:" . $username . ":" . $name . ";<br>";
		} else {
			add_permission_to_group($groupname, $name);
			//echo "add:" . $username . ":" . $name . ";<br>";
		}
	}
}

?>
<?php
include("plugins/usermanager/strings.php");

if(!isset($_POST['step'])) {
	include("plugins/usermanager/templates/grouplist.php");
} elseif ($_POST['step'] == "edit_groups") {
	$groupname = $_POST['gname'];
	if (isset($_POST['edit']) && $_POST['edit'] == "perms") {
		$groups = get_permissions_for_group($groupname);
		foreach ($groups AS $name => $val) {
			if (isset($_POST[$name]) && $_POST[$name] == "on") {
				$groups[$name] = true;
			} else {
				$groups[$name] = false;
			}
		}
		$done = true;
		set_permissions_for_group($groupname, $groups);
	}
	include("plugins/usermanager/templates/group_mono.php");
} elseif ($_POST['step'] == "group_overview" && has_permission("groups_view_overview")) {
	include("plugins/usermanager/templates/groupoverview.php");
} elseif ($_POST['step'] == "perm_overview" && has_permission("permissions_view_overview")) {
	include("plugins/usermanager/templates/permsoverview.php");
} elseif ($_POST['step'] == "del_perm" && has_permission("permissions_remove")) {
	remove_permission(mysql_real_escape_string($_POST['pname']));
	include("plugins/usermanager/templates/groupoverview.php");
} elseif ($_POST['step'] == "add_perm" && has_permission("permissions_add")) {
	add_permission(mysql_real_escape_string($_POST['pname']), "");
	include("plugins/usermanager/templates/groupoverview.php");
}  elseif ($_POST['step'] == "new_groups" && has_permission("grouplist_add")) {
	$gname = $_POST['gname'];
	$description = $_POST['gdescription'];
	add_group($gname, $description);
	include("plugins/usermanager/templates/grouplist.php");
} elseif ($_POST['step'] == "del_groups" && has_permission("groups_remove")) {
	$gname = mysql_real_escape_string($_POST['gname']);
	remove_group($gname);
	include("plugins/usermanager/templates/grouplist.php");
}

?>
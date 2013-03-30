<?php
include("plugins/usermanager/strings.php");

if(!isset($_POST['step'])) {
	global $strings;
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
		 set_permissions_for_group($groupname, $groups);
	}
	global $strings;
	include("plugins/usermanager/templates/group_mono.php");
} elseif ($_POST['step'] == "group_overview") {
	global $strings;
	include("plugins/usermanager/templates/groupoverview.php");
}  elseif ($_POST['step'] == "new_groups") {
	$gname = $_POST['gname'];
	$description = $_POST['gdescription'];
	add_group($gname, $description);
	global $strings;
	include("plugins/usermanager/templates/grouplist.php");
} elseif ($_POST['step'] == "del_groups") {
	$gname = mysql_real_escape_string($_POST['gname']);
	remove_group($gname);
	global $strings;
	include("plugins/usermanager/templates/grouplist.php");
}

?>
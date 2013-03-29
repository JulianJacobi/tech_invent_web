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
}

?>
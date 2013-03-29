<?php
function has_permission($perm) {
	$escaped_user_id = mysql_real_escape_string($_SESSION['userid']);
	$result = mysql_query("SELECT perms.id FROM perms, groupperms, usergroups WHERE usergroups.group = groupperms.group AND groupperms.perm = perms.id AND perms.name = '" . $perm . "' AND usergroups.userid = " . $escaped_user_id);
	if (mysql_num_rows($result) == 1)
		return true;
		
	return false;
}
?>
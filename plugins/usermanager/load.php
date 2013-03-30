<?php
include("plugins/usermanager/strings.php");
//add_menu_item('usermanager', 'Benutzerliste', "show_users"); // main=core
//add_menu_item('usermanager', 'Nutzereinstellungen', "user_settings"); // main=core
//if (has_permission("user.view.data"))
	settings_add_plugin("usermanager", $strings['usermanager']['menu_name']);
//if (has_permission("user.view.data"))
	settings_add_item("usermanager", "Nutzerdaten", "settings");
//if (has_permission("admin.view.userlist"))
	settings_add_item("usermanager", "Benutzerverwaltung", "settings_userlist");
//if (has_permission("admin.view.grouplist"))
	settings_add_item("usermanager", "Rechtegruppen", "settings_groups");
?>
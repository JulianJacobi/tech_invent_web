<?php
include("plugins/usermanager/strings.php");
//add_menu_item('usermanager', 'Benutzerliste', "show_users"); // main=core
//add_menu_item('usermanager', 'Nutzereinstellungen', "user_settings"); // main=core
if (has_permission("userdata_view") || has_permission("users_view_list") || has_permission("groups_view_list"))
	settings_add_plugin("usermanager", $strings['usermanager']['menu_name']);
	
if (has_permission("userdata_view"))
	settings_add_item("usermanager", "Nutzerdaten", "settings");
if (has_permission("users_view_list"))
	settings_add_item("usermanager", "Benutzerverwaltung", "settings_userlist");
if (has_permission("groups_view_list"))
	settings_add_item("usermanager", "Rechtegruppen", "settings_groups");

settings_add_config_item("usermanager");
?>
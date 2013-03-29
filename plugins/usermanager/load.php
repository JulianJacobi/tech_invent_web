<?php

//add_menu_item('usermanager', 'Benutzerliste', "show_users"); // main=core
//add_menu_item('usermanager', 'Nutzereinstellungen', "user_settings"); // main=core
add_settings_item("usermanager", "Nutzereinstellungen", "Daten", "settings");
add_settings_item("usermanager", "Nutzereinstellungen", "Nutzerliste", "settings_userlist");
?>
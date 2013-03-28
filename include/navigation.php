<?php
/*
 * Menu Construktor for TechInvent
 *
 * @author Lukas Klingberg
 * @version 2013-03-28
 */

echo "<div id='menu'>";

foreach ($nav_menu AS $plugin => $plugin_menu) {
    echo "<div class='menu_plugin'>";
    foreach ($plugin_menu AS $name => $get_val) {
        echo "<div class='menu_item'><a href='./?plugin=$plugin&mode=$get_val'>$name</a></div>";
    }
    echo "</div>";
}

echo "</div>";

?>
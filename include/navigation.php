<?php
/*
 * Menu Construktor for TechInvent
 *
 * @author Lukas Klingberg
 * @version 2013-03-28
 */
 
add_menu_item('main', 'Start', "main");
add_menu_item('main', 'Ger&auml;te', "things");
add_menu_item('main', 'Produktionen', "productions"); // main=core
add_menu_item('show', 'Produktionen', "productions");

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
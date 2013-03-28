<?php
/*
 * Menu Construktor for TechInvent
 *
 * @author Lukas Klingberg
 * @version 2013-03-28
 */
 
$nav_menu['main']['Start'] = "main";
$nav_menu['main']['Ger&auml;te'] = "things";
$nav_menu['main']['Produktionen'] = "productions"; // main=core
$nav_menu['show']['Produktionen'] = "productions";

echo "<div id='menu'>";

foreach ($nav_menu AS $plugin => $plugin_menu) {
  echo "<div class='menu_plugin'>";
  foreach ($plugin_menu AS $name => $get_val) {
    echo "<div class='menu_item'><a href='/?plugin=$plugin&mode=$get_val'>$name</a></div>";
  }
  echo "</div>";
}

echo "</div>";

?>
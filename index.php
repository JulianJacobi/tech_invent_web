<?php
session_start();												// PHP/Login Session

global $get_string; 											// Regenerate current GET string
$get_string = "./?";
foreach ($_GET AS $name => $val)
	$get_string = $get_string . $name . "=" . $val . "&";

function __autoload($class_name) { 								// Autoload Classes
    include "include/classes/" . $class_name . ".php";
}

include("include/connect.php"); 								// Database connection

include("include/functions/include.php");						// Basic Functions

include("include/strings.php");									// Locationfile

include("templates/Header.php");								// HTML head

require_once("include/Login.php");								// Login

$menu = new Menu();												// Menubar

include("include/plugins/include.php");							// Load/Init all Plugins

$menu->addMenuItem("logout", $strings['main']['logout']);		// Logout Button

$menu->render();												// render Menubar

render_plugin();												// Include currents Plugin render.php

include("templates/Footer.php");								// HTML foot

?>

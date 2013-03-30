<?php
session_start();
$get_string = "./?";
foreach ($_GET AS $name => $val)
	$get_string = $get_string . $name . "=" . $val . "&";
include("include/connect.php"); // database connection
/*
 * Index File for TechInvent
 *
 * @author Julian jacobi
 * @version 2013-03-29
 */

//Basic Functions
include("include/functions/include.php");
include("include/strings.php");
include("include/plugins/include.php");

//HTML Header
include("templates/html_head.php");

//Login Scripts
require_once("include/auth.php");

//Navigationbar
include("include/navigation.php");
render_plugin();

//HTML Footer
include("templates/html_footer.php");

?>

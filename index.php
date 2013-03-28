<?php
session_start();
/*
 * Index File for TechInvent
 *
 * @author Julian jacobi
 * @version 2013-03-28
 */

//Basic Functions
include("include/functions/include.php");

//HTML Header
include("templates/html_head.php");
include("include/strings.php");

//Login Scripts
require_once("include/auth.php");

//Static text for Testing
include("include/test.php");

//Navigationbar
include("include/navigation.php");




//HTML Footer
include("templates/html_footer.php");

?>

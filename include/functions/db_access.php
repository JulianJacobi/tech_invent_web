<?php
/*
 * Database Access fo TechInvent
 *
 * @author Julian Jacobi
 * @version 2013-03-28
 */

function db_request_prepare($request) {
	$return = mysql_query($request);
	
	return $return;
}

function db_request_fetch_object(resource $result) {
	$return = mysql_fetch_object($result);
	
	return $return;
}

function db_request_num_rows(resource $result) {
	$return = mysql_num_rows($result);
	
	return $return;
}

?>
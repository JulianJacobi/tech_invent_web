<?php

$plugin = $_GET['mode'];
//Speichern
if (isset($_POST['step']) && $_POST['step'] == "save") {
	$file = file("plugins/".$plugin."/config.ini");
	foreach($file AS $row) {
		$row_array = explode(" ", $row);
		$settings[$row_array[0]] = $row_array[2];
	}
	$sindex = 0;
	foreach($settings AS $sname => $svalue) {
		$ini[$sindex] = $sname." = ".$_POST[$sname];
	$sindex++;
	}
	$fp = fopen('plugins/'.$plugin.'/config.ini', 'w');
	foreach($ini as $fvalues) fputs($fp, $fvalues."\n");
	fclose($fp);
}
$file = file("plugins/".$plugin."/config.ini");
foreach($file AS $row) {
	$row_array = explode(" ", $row);
	$settings[$row_array[0]] = $row_array[2];
}


include("plugins/settings/templates/SettingsConfiguration.php");
?>
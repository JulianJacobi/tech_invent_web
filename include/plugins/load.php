<?php

if (isset($_GET['scan']) && $_GET['scan'] == "true" && has_permission("admin.scan.plugins")) {
    include("include/plugins/scan.php");
}

$filename = "include/plugins/plugins.list";
$file = fopen($filename, "r");
$raw_list = fread($file, filesize($filename));

$list = explode("\n", $raw_list);

foreach ($list AS $i => $plugin) {
    $plugin = rtrim($plugin);
    if ($plugin != "")
        include("plugins/" . $plugin . "/load.php");
}

?>
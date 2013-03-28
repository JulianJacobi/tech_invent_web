<?php

$list = scandir("plugins/");
$filename = "include/plugins/plugins.list";
$file = fopen($filename, "w");
$new_list = "";

foreach ($list AS $i => $v) {
    if ($v == "" || $v == "." || $v == "..")
        continue;
    $new_list = $new_list . $v . "\n";
}

fputs($file, $new_list);


?>
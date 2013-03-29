<?php

$list = scandir("plugins/");
$i = 0;

foreach ($list AS $i => $v) {
    if ($v == "" || $v == "." || $v == ".." || $v == ".DS_Store")
        continue;
    $new_list[$i] = $v;
	$sort_list[$v] = $i;
	$i ++;
}

$error = "";

foreach ($new_list AS $i => $plugin) {
	$dfilename = "plugins/" . $plugin . "/dependencies.list";
	$dfile = fopen($dfilename, "r");
	if (filesize($dfilename) > 0) {
		$raw_list = fread($dfile, filesize($dfilename));
		$list = explode("\n", $raw_list);
		foreach ($list AS $di => $dplugin) {
			$dplugin = rtrim($dplugin);
			if ($dplugin != "") {
				$found = false;
				foreach ($new_list AS $ddi => $ddplugin) {
					if ($dplugin == $ddplugin) {
						if ($sort_list[$dplugin] > $sort_list[$plugin])
							$sort_list[$plugin] = $sort_list[$dplugin] + 1;
						$found = true;
					}
				}
				if (!$found)
					$error = $error . "Error: Dependencie " . $dplugin . " of Plugin " . $plugin . " not found!<br>";
			}
		}
	}
}

$max = 0;

foreach ($sort_list AS $name => $id)
	if ($id > $max)
		$max = $id;

$pos = 0;
$final_list = "";
$next = false;

while ($pos <= $max) {
	foreach ($sort_list AS $name => $id) {
		if ($id == $pos) {
			$final_list = $final_list . $name . "\n";
		}
	}
	$pos ++;
}

$filename = "include/plugins/plugins.list";
$file = fopen($filename, "w");
fputs($file, $final_list);


?>
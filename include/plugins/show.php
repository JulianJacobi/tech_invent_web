<?php

function render_plugin() {
    if (isset($_GET['plugin'])) {
        global $list;
        foreach ($list AS $i => $plugin) {
            $plugin = rtrim($plugin);
            if ($plugin != "" && $plugin == $_GET['plugin'])
                include("plugins/" . $plugin . "/render.php");
        }
    }
}

?>
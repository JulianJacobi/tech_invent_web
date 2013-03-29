<?php

function render_settings() {
	if(isset($_GET['mode'])) {
		include("plugins/".$_GET['mode']."/settings.php");
	}
}

?>
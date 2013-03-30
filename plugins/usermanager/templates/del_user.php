<?php 
global $strings, $get_string;
?>
<link href="plugins/usermanager/css/del_user.css" rel="stylesheet" type="text/css">
<div id="usermanager_deluser">
	<p id="usermanager_deluser_headline"><?php print($strings['usermanager']['deluser_headline']); ?></p>
	<p id="usermanager_deluser_label"><?php print($strings['usermanager']['deluser_question1']."<b>".$_POST['uname']."</b>".$strings['usermanager']['deluser_question2']); ?></p>
	<form action="<?php print($get_string); ?>" method="post" id="usermanager_deluser">
		<input type="hidden" value="<?php print($_POST['uname']) ?>" name="uname">
		<input type="hidden" value="del_user" name="step">
		<input type="hidden" value="true" name="delete">
		<a href="<?php print($get_string); ?>" class="usermanager_deluser_link"><button class="system_button" type="button"><?php print($strings['usermanager']['deluser_abbr']) ?></button></a>
		<input type="submit" value="<?php print($strings['usermanager']['deluser_ok']) ?>" class="system_button">
	</form>
</div>
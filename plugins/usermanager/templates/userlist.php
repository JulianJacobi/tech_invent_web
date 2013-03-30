<?php 
global $strings, $get_string;
?>
<link href="plugins/usermanager/css/userlist.css" rel="stylesheet" type="text/css">
<div id="usermanager_userlist">
	<p id="usermanager_userlist_headline"><?php print($strings['usermanager']['userlist_headline']); ?></p>
	<table id="usermanager_userlist" align="center">
		<tr class="usermanager_userlist_head"><td>
			<p class="usermanager_userlist_head"><?php print($strings['usermanager']['userlist_head_id']); ?></p>
		</td><td>
			<p class="usermanager_userlist_head"><?php print($strings['usermanager']['userlist_head_name']); ?></p>
		</td><td>
			<p class="usermanager_userlist_head"><?php print($strings['usermanager']['userlist_head_pass']); ?></p>
		</td></tr>
		<tr class="usermanager_userlist_entry"><td></td><td></td><td></td><td>
			<form action="<?php print($get_string); ?>" method="post">
				<input type="hidden" name="step" value="add_user">
				<input type="submit" value="<?php print($strings['usermanager']['userlist_add']) ?>" class="system_button usermanager_userlist_editbutton">
			</form>
		</td><td>
		</td></tr>
	<?php $j = 0; ?>
	<?php foreach ($users AS $i){ ?>
		<tr class="usermanager_userlist_entry <?php if($j % 2 == 0){ print("usermanager_userlist_entry_hl");} ?>"><td>
			<p class="usermanager_userlist_entry"><?php print($i['id']) ?></p>
		</td><td>
			<p class="usermanager_userlist_entry"><?php print($i['name']) ?></p>
		</td><td>
			<p class="usermanager_userlist_entry"><?php print($i['pass']) ?></p>
		</td><td>
			<form action="<?php print($get_string); ?>" method="post" id="usermanager_userlist_editform">
				<input type="hidden" name="step" value="user_mono">
				<input type="hidden" name="uid" value="<?php print($i['id']) ?>">
				<input type="hidden" name="uname" value="<?php print($i['name']) ?>">
				<input type="submit" value="<?php print($strings['usermanager']['userlist_edit']) ?>" class="system_button usermanager_userlist_editbutton">
			</form>
		</td><td>
			<form action="<?php print($get_string); ?>" method="post">
				<input type="hidden" name="step" value="del_user">
				<input type="hidden" name="uname" value="<?php print($i['name']) ?>">
				<input type="submit" value="<?php print($strings['usermanager']['userlist_delete']) ?>" class="system_button usermanager_userlist_editbutton">
			</form>
		</td></tr>
	<?php $j++; ?>
	<?php }
	if (has_permission("users_view_overview")) {
		?> 
		<tr><td colspan="5">
		<form action="<?php print($get_string); ?>" method="post">
			<input type="hidden" name="step" value="user_overview">
			<input type="submit" value="<?php print($strings['usermanager']['useroverview']); ?>" class="system_button">
		</form>
		</td></tr>
		<?php 
	}
	?>
	</table>
</div>
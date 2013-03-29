<link href="plugins/usermnager/css/userlist.css" rel="stylesheet" type="text/css">
<div id="usermanager_userlist">
	<table id="usermanager_userlist">
		<tr><td>
			<p class="usermanager_userlist_head"><?php print($strings['usermanager']['userlist_head_id']) ?></p>
		</td><td>
			<p class="usermanager_userlist_head"><?php print($strings['usermanager']['userlist_head_name']) ?></p>
		</td><td>
			<p class="usermanager_userlist_head"><?php print($strings['usermanager']['userlist_head_pass']) ?></p>
		</td></tr>
	<?php foreach ($users AS $i){ ?>
		<tr><td>
			<p class="usermanager_userlist_entry"><?php print($users[$i]['id']) ?></p>
		</td><td>
			<p class="usermanager_userlist_entry"><?php print($users[$i]['name']) ?></p>
		</td><td>
			<p class="usermanager_userlist_entry"><?php print($users[$i]['pass']) ?></p>
		</td></tr>
	<?php }?> 
	</table>
</div>
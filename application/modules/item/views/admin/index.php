<h2>Manage Items</h2>
<div class="menu_title" style="float:left; color:#037;padding:5px; display:block;">
<a href="item/create">Create New Item</a>
<br/><br/>
<?php 
foreach($qrs as $s):?>
	<div class="menu_title" style="float:left; color:#037;">
	<strong><?php echo $s->heading; ?></strong>
	</div><br/>
	<div class="menu_control" style="float:left">
	<a href="item/edit/<?php echo $s->id; ?>">Edit</a> | <a href="item/delete/<?php echo $s->id; ?>">Delete</a>
	</div><br/> <hr/>
<?php endforeach; ?>
</div>
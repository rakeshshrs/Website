<h2>Manage Category</h2>
<div class="menu_title" style="float:left; color:#037;padding:5px; display:block;">
<a href="category/create">Create New Category</a>
<br/><br/>
<?php 
foreach($qrs as $s):?>
	<div class="menu_title" style="float:left; color:#037;">
	<strong><?php echo $s->heading; ?></strong>
	</div><br/>
	<div class="menu_control" style="float:left">
	<a href="category/edit/<?php echo $s->id; ?>">Edit</a> | <a href="category/delete/<?php echo $s->id; ?>">Delete</a>
	</div><br/> <hr/>
<?php endforeach; ?>
</div>
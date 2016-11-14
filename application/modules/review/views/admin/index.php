<h2>Manage Reviews</h2>
<div class="menu_title" style="float:left; color:#037;padding:5px; display:block;">
<br/><br/>
<?php 
foreach($qrs as $s):?>
	<div class="menu_title" style="float:left; color:#037;">
	<strong>Subject: </strong><?php echo $s->subject; ?><strong>  |  Posted By: </strong><?php echo $s->name; ?>
	</div><br/>
	<div class="menu_control" style="float:left">
	<a href="review/edit/<?php echo $s->id; ?>">Edit</a> | <a href="review/delete/<?php echo $s->id; ?>">Delete</a>
	</div><br/> <hr/>
<?php endforeach; ?>
</div>
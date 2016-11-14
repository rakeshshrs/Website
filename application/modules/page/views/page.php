<div class="container">
<?php 
foreach($qrs as $s):?>
	<h1><?php echo $s->heading; ?></h1>
	<p><?php echo $s->description; ?></p>
<?php endforeach; ?>
</div>
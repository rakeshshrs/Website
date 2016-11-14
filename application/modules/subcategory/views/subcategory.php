<div class="container">
<h1>Sub Category</h1><br/>
<div class="menu_items">
<?php foreach($qrs as $s):?>
	<h1><a href="<?php echo base_url().'category'.'/'.$s->slug; ?>"><?php echo $s->heading; ?></a></h1>
	<p><?php echo $s->description; ?></p>
	
<?php
	$u=$this->uri->segment(2);
	if($u){
?>
		<a href="<?php echo base_url('item'); ?>" title="Go back" class="btn btn-warning">Back To All Items</a>
<?php } ?>

	<hr/>
<?php endforeach; ?>
</div>
</div>

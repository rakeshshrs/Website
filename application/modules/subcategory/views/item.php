<div class="container">
<h1>Menu Items</h1><br/>
<div class="menu_items">
<?php foreach($qrs as $s):?>
	<h1><a href="<?php echo base_url().'item/'.$s->category.'/'.$s->slug; ?>"><?php echo $s->heading; ?></a></h1>
	<p><?php echo $s->description; ?></p>
	<p><strong>Price: </strong>Rs. <?php echo $s->price; ?></p>
	<?php if($s->image!=""){?>
	<img src="<?php echo base_url().'/assets/upload/'.$s->image;?>" alt="<?php echo $s->heading;?>" width="100px"/>
	<?php } ?>
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

<div class="container">
	<div class="row">
		<div class="col-md-6 menu_items">
		<?php foreach($qrs as $s):?>
			<h1><?php echo $s->heading; ?></h1>
			<?php if($s->image!=""){?>
			<img src="<?php echo base_url().'/assets/upload/items/'.$s->image;?>" alt="<?php echo $s->heading;?>" style="width:100%; margin:10px 0px;"/>
			<?php } ?>

		<!-- <?php
			$u=$this->uri->segment(2);
			if($u){
		?>
				<a href="<?php echo base_url('category'); ?>" title="Go back" class="btn btn-warning">Back To All Category</a>
		<?php } ?> -->

			
		<?php endforeach; ?>
		</div>

		<div class="col-md-6 prdSidebar">
			<?php foreach($qrs as $q):?>
				<h3>Item Description</h3>
				<p><?php echo $s->description; ?></p>
				<p><strong><i class="fa fa-tag" aria-hidden="true"></i> Price: </strong><br/>Rs. <?php echo $s->price; ?></p>	
				<form method="post" action="">
				<p>
				<input type="hidden" name="prd_name" value="<?php echo $s->heading;?>"/>
				<input type="hidden" name="prd_price" value="<?php echo $s->price;?>"/>
				<strong><i class="fa fa-sort-numeric-asc" aria-hidden="true"></i> Quantity: </strong>
				<input type="number" name="prd_qty" value="" class="form-control" style="max-width: 100px;"/><br/>
				<button type="submit" class="btn btn-success">Add to Cart <i class="fa fa-shopping-cart" aria-hidden="true"></i></button>
				</p>
				</form>
			<?php endforeach;?>
		</div>

	</div>
</div>

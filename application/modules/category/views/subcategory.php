<div class="container">
<h1>Sub Categories</h1><br/>

<?php foreach($qrs as $s):?>
<div class="col-md-4">
	<div class="row">
		<div class="menu_items">
			<figure>
		        <?php if($s->image!=""){?>
				<img src="<?php echo base_url().'/assets/upload/sub-categories/'.$s->image;?>" alt="<?php echo $s->heading;?>" style="width:100%; margin:0 auto;"/>
			<?php } ?>
		    	<figcaption>
		      	<center>
			      	<p></p>
			      	<p></p>
			    	<h1><?php echo $s->heading; ?></h1>
			    	<?php echo $s->description; ?>
			    	<br>
			    	<a href="<?php echo base_url().'category'.'/'.$catslug.'/subcategory/'.$s->slug; ?>" class="btn btn-default btn-round">VIEW DETAILS</a>
				</center>
		        </figcaption>
		    </figure>
	    </div>
	</div>	
</div>
<?php endforeach; ?>
	
<div class="clear"></div>
<?php
	$u=$this->uri->segment(2);
	if($u){
?>
		<a href="<?php echo base_url('category'); ?>" title="Go back" class="btn btn-warning">Back To All Category</a>
<?php } ?>

	
</div>
</div>

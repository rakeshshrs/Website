<h2>Edit Review</h2>

<?php echo form_open('admin/review/update'); ?>

<div class="form">
<?php foreach($qrs as $r):?>
	<div class="form-group">
	<label for="id">ID</label>
	<input type="text" name="id" value="<?php echo $r->id; ?>" class="form-control" id="id" readonly>
	</div>

	<div class="form-group">
	<label for="name">Name</label>
	<input type="text" name="name" class="form-control" value="<?php echo $r->name; ?>" id="name">
	</div>

	<div class="form-group">
	<label for="email">Email</label>
	<input type="text" name="email" class="form-control" id="email" value="<?php echo $r->email; ?>">
	</div>

	<div class="form-group">
	<label for="subject">Subject</label>
	<input type="text" name="subject" class="form-control" id="subject" value="<?php echo $r->subject; ?>">
	</div>

	<div class="form-group">
	<label for="msg">Message</label>
	<textarea name="msg" class="form-control" id="editor1"><?php echo $r->msg; ?></textarea>
	<script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( 'editor1' );
    </script>
	</div>

	<div class="form-group">
	<label for="created_on">Posted on</label>
	<input type="text" name="created_on" class="form-control" id="created_on" value="<?php echo $r->created_on; ?>">
	</div>

	<div class="form-group">
	<label for="status">Status</label>
	<div>
	<?php if($r->status==1){
		?>
	<label class="radio-inline">
	<input type='radio' name='status' id='status' value='1' checked="checked">Active
	</label>
	<label class="radio-inline">
	<input type='radio' name='status' id='status' value='0'>Inactive
	</label>
	<?php } else {?>
	<label class="radio-inline">
	<input type='radio' name='status' id='status' value='1'>Active
	</label>
	<label class="radio-inline">
	<input type='radio' name='status' id='status' value='0' checked="checked">Inactive
	</label>
	<?php } ?>
	</div>
	</div>

	<div class="form-group">
	<label for="order">Order</label>
	<input type='number' name='order' class="form-control" id="order" value="<?php echo $r->order; ?>">
	</div>

	<div class="form-group pull-right">
	<input type="submit" name="submit" value="Submit" class="btn btn-info">
	</div>

<?php endforeach; ?>
</div>
<?php echo form_close(); ?>
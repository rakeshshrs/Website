<div class="container">
<div class="row">
<div class="col-md-7">
<h1>Reviews</h1><br/>
<?php foreach($qrs as $s):?>
<div class="panel-group">
<div class="panel panel-warning">
<div class="panel-heading">
<?php echo $s->subject; ?>
<span style="float:right"><strong>Posted on: </strong><?php echo $s->created_on; ?></span>
</div>
<div class="panel-body"><?php echo $s->msg; ?></div>
<div class="panel-footer"><strong>Posted by: </strong><?php echo $s->name; ?></div>
</div>
</div>
<?php endforeach; ?>

<p><?php echo $links; ?></p>
<hr/>
</div>

<div class="col-md-5">
<h2>Write your review</h2>
<p>Please fill up the form below to write a review. We really appreciate your every words. * denotes required field.</p><br/>
<?php echo form_open('review/store'); ?>

	<div class="form-group">
	<label for="name">Name *</label>
	<input type="text" name="name" class="form-control" required>
	</div>

	<div class="form-group">
	<label for="email">Email</label>
	<input type="email" name="email" class="form-control">
	</div>

	<div class="form-group">
	<label for="subject">Subject</label>
	<input type="text" name="subject" class="form-control">
	</div>

	<div class="form-group">
	<label for="message">Message *</label>
	<textarea name="msg" class="form-control" id="editor1" required></textarea>
	<script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( 'editor1',
    {
        toolbar : 'Basic', /* this does the magic */
        uiColor : '#9F5827'
    });
    </script>
	</div>	

	<div class="form-group">
	<input type="submit" id="submit" name="submit" value="Submit" class="btn btn-warning" />
    </div>  

<?php echo form_close(); ?>
</div>
</div>
</div>
<h2>Edit Item</h2>

<?php echo form_open_multipart('admin/item/update'); ?>

<div class="form">
<?php foreach($qrs as $r):?>
	<div class="form-group">
	<label for="id">ID</label>
	<input type="text" name="id" value="<?php echo $r->id; ?>" class="form-control" id="id" readonly>
	</div>

	<div class="form-group">
	<label for="heading">Heading</label>
	<input type="text" name="heading" class="form-control" value="<?php echo $r->heading; ?>" id="heading">
	</div>

	<div class="form-group">
	<label for="page_title">Page Title</label>
	<input type="text" name="page_title" class="form-control" id="page_title" value="<?php echo $r->page_title; ?>">
	</div>

	<div class="form-group">
	<label for="meta_desc">Meta Description</label>
	<textarea name="meta_desc" class="form-control" id="meta_desc"><?php echo $r->meta_desc; ?></textarea>
	</div>

	<div class="form-group">
	<label for="meta_keyword">Meta Keyword</label>
	<input type="text" name="meta_keyword" class="form-control" id="meta_keyword" value="<?php echo $r->meta_keyword; ?>">
	</div>

	<div class="form-group">
	<label for="description">Page Description</label>
	<textarea name="description" class="form-control" id="editor1"><?php echo $r->description; ?></textarea>
	<script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( 'editor1' );
            </script>
	</div>

	<div class="form-group">
	<label for="category">Category</label>
	<select name="category" class="form-control" id="category" value="<?php echo $r->heading; ?>" required>
		<?php foreach($category as $cat):?>
			<option value="<?php echo $cat->heading; ?>"><?php echo $cat->heading; ?></option>
		<?php endforeach;?>
	</select>
	</div>

	<div class="form-group">
	<label for="subcategory">Sub category</label>
	<select name="subcategory" class="form-control" id="subcategory" value="<?php echo $r->heading; ?>" required>
		<?php foreach($subcategory as $subcat):?>
			<option value="<?php echo $subcat->heading; ?>"><?php echo $subcat->heading; ?></option>
		<?php endforeach;?>
	</select>
	</div>


	<div class="form-group">
	<label for="price">Price</label>
	<input type="number" name="price" class="form-control" id="price" value="<?php echo $r->price; ?>">
	</div>

	<div class="form-group">
	<label for="image">Page Image</label>
	<input type='file' name='image' id='image'>
	</div>

	<div class="form-group">
	<label for="imagethumb">Image Thumbnail</label>
	<input type='file' name='imagethumb' id='imagethumb'>
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
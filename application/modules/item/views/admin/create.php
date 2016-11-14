<h2>Create New Item</h2>

<?php echo form_open_multipart('admin/item/store'); ?>
<div class="form">
	<div class="form-group">
	<label for="heading">Heading</label>
	<input type="text" name="heading" class="form-control" id="heading">
	</div>

	<div class="form-group">
	<label for="page_title">Page Title</label>
	<input type="text" name="page_title" class="form-control" id="page_title">
	</div>

	<div class="form-group">
	<label for="meta_desc">Meta Description</label>
	<textarea name="meta_desc" class="form-control" id="meta_desc"></textarea>
	</div>

	<div class="form-group">
	<label for="meta_keyword">Meta Keyword</label>
	<input type="text" name="meta_keyword" class="form-control" id="meta_keyword">
	</div>

	<div class="form-group">
	<label for="description">Page Description</label>
	<textarea name="description" class="form-control" id="editor1"></textarea>
	<script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( 'editor1' );
            </script>
	</div>

	<div class="form-group">
	<label for="category">Category</label>
	<select name="category" class="form-control" id="category" required>
		<option value="">Choose a category</option>
		<?php foreach($category as $cat):?>
			<option value="<?php echo $cat->heading; ?>"><?php echo $cat->heading; ?></option>
		<?php endforeach;?>
	</select>
	</div>

	<div class="form-group">
	<label for="subcategory">Sub category</label>
	<select name="subcategory" class="form-control" id="subcategory" required>
		<option value="">Choose a subcategory</option>
		<?php foreach($subcategory as $subcat):?>
			<option value="<?php echo $subcat->heading; ?>"><?php echo $subcat->heading; ?></option>
		<?php endforeach;?>
	</select>
	</div>

	<div class="form-group">
	<label for="Price">Price</label>
	<input type="number" name="price" class="form-control" id="price">
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
	<label class="radio-inline">
	<input type='radio' name='status' id='status' value='1'>Active
	</label>
	<label class="radio-inline">
	<input type='radio' name='status' id='status' value='0'>Inactive
	</label>
	</div>
	</div>

	<div class="form-group">
	<label for="order">Order</label>
	<input type='number' name='order' class="form-control" id="order">
	</div>

	<div class="form-group pull-right">
	<input type="submit" name="submit" value="Submit" class="btn btn-info">
	</div>





	
		<!-- <input type="text" name="date" class="form-control datepicker datepicker-icon"> -->	
		
</div>


<?php echo form_close(); ?>
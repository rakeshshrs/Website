<div class="container">
<div class="row">

<div class="col-md-12">
<h2>Register</h2>
<p>Please fill up the form below to register. * denotes required field.</p><br/>
<?php echo form_open('customer/store'); ?>

	<div class="form-group">
	<label for="name">Name *</label>
	<input type="text" name="name" class="form-control" required>
	</div>

	<div class="form-group">
	<label for="email">Email</label>
	<input type="email" name="email" class="form-control">
	</div>

	<div class="form-group">
	<label for="username">Username</label>
	<input type="username" name="username" class="form-control">
	</div>

	<div class="form-group">
	<label for="password">Password</label>
	<input type="password" name="password" class="form-control">
	</div>

	<div class="form-group">
	<label for="dob">Date of Birth</label>
	<input type="dob" name="dob" class="form-control">
	</div>

	<div class="form-group">
	<label for="address">Address</label>
	<input type="address" name="address" class="form-control">
	</div>

	<div class="form-group">
	<label for="country">Country</label>
	<input type="country" name="country" class="form-control">
	</div>

	<div class="form-group">
	<label for="company">Company</label>
	<input type="company" name="company" class="form-control">
	</div>

	<div class="form-group">
	<input type="submit" id="submit" name="submit" value="Submit" class="btn btn-warning" />
    </div>  

<?php echo form_close(); ?>
</div>
</div>
</div>
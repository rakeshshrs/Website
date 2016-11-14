<h1><strong>Please login to CMS</strong></h1>
<center><h2>Login</h2></center>

<?php echo form_open('admin/authenticate'); ?>
<label>UserName :</label>
<input type="text" name="username" id="name" placeholder="username" class="login-input"/><br /><br />
<label>Password :</label>
<input type="password" name="password" id="password" placeholder="**********" class="login-input"/><br/><br />
<input type="submit" value=" Login " name="submit" class="btn btn-default"/><br />
<?php echo form_close(); ?>
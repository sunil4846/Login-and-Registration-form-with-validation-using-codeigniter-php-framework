<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/bootstrap.css' ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/style.css' ?>">
</head>
<body>

<div class="container mb-5">
	<?php  
	$msg = $this->session->flashdata('msg');
	if ($msg != "") {
		echo "<div class='alert alert-success'>$msg<div>";
	}
	?>
	<div class="col-md-6">
		<div class="card mt-4">
	  		<div class="card-header">
	    		Register
	  		</div>
	  		<form method="post" name="registerForm" id="registerForm" action="<?php echo base_url().'index.php/Auth/register'?>">
	  			<div class="card-body register">
	    			<p class="card-text">Please fill with your details</p>
	    			<div class="form-group">
	    				<label for="name">First Name</label>
	    				<input type="text" name="first_name" id="first_name" value="<?php echo set_value('first_name'); ?>" class="form-control <?php echo(form_error('first_name') != "") ? 'is-invalid' : '' ;?>" placeholder="First Name">
	    				<p class="invalid-feedback"><?php echo strip_tags(form_error('first_name')); ?></p>
	    			</div>
	    			<div class="form-group">
	    				<label for="name">Last Name</label>
	    				<input type="text" name="last_name" id="last_name" value="<?php echo set_value('last_name'); ?>" class="form-control <?php echo(form_error('last_name') != "") ? 'is-invalid' : '' ;?>" placeholder="Last Name">
	    				<p class="invalid-feedback"><?php echo strip_tags(form_error('last_name')); ?></p>
	    			</div>
	    			<div class="form-group">
	    				<label for="email">Email</label>
	    				<input type="email" name="email" id="email" value="<?php echo set_value('email'); ?>" class="form-control <?php echo(form_error('email') != "") ? 'is-invalid' : '' ;?>" placeholder="Email">
	    				<p class="invalid-feedback"><?php echo strip_tags(form_error('email')); ?></p>
	    			</div>
	    			<div class="form-group">
	    				<label for="phone">Phone Number</label>
	    				<input type="tel" name="phone" id="phone" value="<?php echo set_value('phone'); ?>" class="form-control <?php echo(form_error('phone') != "") ? 'is-invalid' : '' ;?>" placeholder="Phone Number">
	    				<p class="invalid-feedback"><?php echo strip_tags(form_error('phone')); ?></p>
	    			</div>
	    			<div class="form-group">
	    				<label for="password">Password</label>
	    				<input type="password" name="password" id="password" value="<?php echo set_value('password'); ?>" class="form-control <?php echo(form_error('password') != "") ? 'is-invalid' : '' ;?>" placeholder="Password">
	    				<p class="invalid-feedback"><?php echo strip_tags(form_error('password')); ?></p>
	    			</div>
	    			<div class="form-group">
	    				<button class="btn btn-block btn-primary">REGISTER NOW</button>
	    			</div>
	    			<div class="mt-4">
						<a href="<?php echo base_url().'index.php/Auth/login';?>">LOGIN</a>
					</div>
	  			</div>
  			</form>
		</div>
	</div>
</div>
</body>
</html>
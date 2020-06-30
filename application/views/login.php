<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/bootstrap.css' ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/style.css' ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/login.css' ?>">
</head>
<body>
	<form class="form-signin" action="<?php echo base_url().'index.php/Auth/login';?>" method="post" name="frm" id="frm">

		<?php  
			$msg = $this->session->flashdata('msg');
			if($msg != ""){
		?>
		<div class="alert alert-danger">
			<?php echo $msg; ?>
		</div>
		<?php 
			}
		?>
		<h1 class="h3 mb-3 font-weight-normal text-center">Please Login</h1>
		
		<label for="email" class="sr-only">Email address</label>
		<input type="email" id="email" name="email" value="<?php echo set_value('email'); ?>" class="form-control <?php echo(form_error('email') != "") ? 'is-invalid' : '' ;?>" placeholder="Email address">
		<p class="invalid-feedback"><?php echo strip_tags(form_error('email')); ?></p>
		
		<label for="password" class="sr-only">Password</label>
		<input type="password" id="password" name="password" value="" class="form-control <?php echo(form_error('password') != "") ? 'is-invalid' : '' ;?>" placeholder="Password" >
		<p class="invalid-feedback"><?php echo strip_tags(form_error('password')); ?></p>
		<button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
		<div class="mt-4">
			<a href="<?php echo base_url().'index.php/Auth/register';?>">REGISTER HERE</a>
		</div>
    </form>
</body>
</html>
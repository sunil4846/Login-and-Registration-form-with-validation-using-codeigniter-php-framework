<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/bootstrap.css' ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/style.css' ?>">
</head>
<body>
	<header>
		<nav class="navbar navbar-expand-md navbar-black fixed-top bg-disk">
			<div class="container">
				<a href="#" class="navbar-brand text-black">Welcome To dashboard</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aroa-control="">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="col-md-6 text-right text-black">Welcome <?php echo $user['first_name'].''.$user['last_name']; ?> <a href="<?php echo base_url().'index.php/Auth/logout';?>" class="nav-item text-black">logout</a></div>
			</div>
		</nav>
	</header>
</body>
</html>

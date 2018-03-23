<?php require_once('../../private/initialize.php') ?>

<!DOCTYPE html>
<html lang="en">
	<head>
	  <meta name="author" content="wakil bouljoub">
	  <meta charset="UTF-8">
	  <meta http-equiv="X-UA-Compatible" content="IE=edge">
	  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	  <meta http-equiv="x-ua-compatible" content="ie=edge">
	  <link rel="stylesheet" href="<?php echo url_for('stylesheets/bootstrap.min.css'); ?>">
	  <link rel="stylesheet" href="<?php echo url_for('stylesheets/user.css'); ?>">
	  <script src="https://use.fontawesome.com/54585300a1.js"></script>
	  <title>LainaBike</title>
	</head>
	<body>
		<div class="container">
			<header>
				<h1 class="sr-only">LainaBike User Home Page</h1>
				<nav class="navbar navbar-expand-sm justify-content-center">
					<div class="navbar-nav">
						<a class="nav-item nav-link" href="<?php echo WWW_ROOT . '/user/index.php'; ?>">Rent a Bike</a>
						<a class="nav-item nav-link" href="<?php echo WWW_ROOT . '/user/reservation.php'; ?>">My reservation</a>
						<a class="nav-item nav-link" href="<?php echo WWW_ROOT . '/user/profile.php'; ?>"><?php echo $_SESSION['user_name']; ?></a>
						<?php if(isset($_SESSION['is_admin'])){ ?>	
							<a class="nav-item nav-link" href="<?php echo WWW_ROOT . '/admin/index.php'; ?>">Administration</a>
						<?php } ?>
						<a class="nav-item nav-link" href="<?php echo WWW_ROOT . '/Logout.php'; ?>">Log Out</a>
						
					</div>
	 				<img class="nav-item navbar-brand img-responsive" width="70" src="../../public/images/logo.png" alt="logo">
				</nav>
				
			</header>
		</div>
		<div class="container-fluid">
		
		  


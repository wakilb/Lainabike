<?php require_once('../../private/initialize.php') ?>
<!doctype html>

<?php $UserID = 1 ;?>

<html lang="en">
  <head>
    <title>LainaBike</title>
	<meta name="author" content="wakil bouljoub">
    <meta charset="utf-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
  </head>

  <body>
	  <header>
	  	<h1>LainaBike User Home Page</h1>		  
	  </header>
	  
	  <nav>
		  <a href="<?php echo WWW_ROOT . '/user/index.php'; ?>">Rent a Bike</a>
		  <a href="<?php echo WWW_ROOT . '/user/reservation.php'; ?>">My reservation</a>
		  <a href="<?php echo WWW_ROOT . '/user/profile.php'; ?>">My Profile</a>
		  <a href="">Log Out</a>
	  </nav>
	  
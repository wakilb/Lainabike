<!doctype html>

<html lang="en">
  <head>
    <title>LainaBike | <?php echo h($page_title); ?></title>
    <meta charset="utf-8">
	<meta name="author" content="wakil bouljoub">
    <link rel="stylesheet" media="all" href="<?php echo url_for('stylesheets/admin.css'); ?>" />
	<script src="https://use.fontawesome.com/54585300a1.js"></script>
  </head>

  <body>
    <header>
      <h1>LainaBike Admin Home Page</h1>
    </header>

    <navigation>
      
        <a href="<?php echo WWW_ROOT . '/admin/index.php'; ?>">Home</a>
		<a href="<?php echo WWW_ROOT . '/admin/User/index.php'; ?>">User</a>
		<a href="<?php echo WWW_ROOT . '/admin/Reservation/index.php'; ?>">Reservation</a>
		<a href="<?php echo WWW_ROOT . '/admin/BikeInventory/index.php'; ?>">BikeInventory</a>
		<a href="<?php echo WWW_ROOT . '/Logout.php'; ?>">Log out</a>
      
    </navigation>
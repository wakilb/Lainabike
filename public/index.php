<?php include_once("../private/initialize.php") ?>

<?php 
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$email = isset($_POST['Email']) ? $_POST['Email'] : null;
	$password= isset($_POST['Password']) ? $_POST['Password']: null;
	
	
	

}else{ ?>
	<html>
	<head>
		
	</head>
	<body>
		<h1>Sing In</h1>
		<p>Welcome to LainaBike</p>
		<form action="<?php url_for('index.php') ?>" method="post">
			<dl>
				<dt>Email: </dt>
				<dd><input name="Email" type="email"></dd>
			</dl>
			<dl>
				<dt>Password: </dt>
				<dd><input name="Password" type="password"></dd>
			</dl>
			<input name="submit" type="submit" value="submit">
		</form>
		<h1>New User?</h1>
		<a href="<?php echo(url_for("new_user.php")) ?>">Sing Up</a>
	</body>
</html>
<?php } ?>

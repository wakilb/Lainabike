<?php include_once("../private/initialize.php") ?>

<?php include_once("../private/shared/inout_header.php") ?>

<?php 

	$errors = [];
	$failure_message = "Log in unsuccessful! Try again"; 
	
	
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$email = isset($_POST['Email']) ? $_POST['Email'] : '';
		$password= isset($_POST['Password']) ? $_POST['Password']: '';
		
		//Validation Of the user input
			if(is_blank($email)){
				$errors[] = "Please enter your email";
			}
			if(is_blank($password)){
				$errors[] = "Please enter your password";
			}
		if(empty($errors)){
			//Find the user in Database
			$query  = "SELECT * FROM users WHERE Email= ";
			$query .= "'" . db_escape($db, $email) . "'";
			$query .= "LIMIT 1";
			if($result = mysqli_query($db, $query)){
				$user=mysqli_fetch_row($result);
				if(password_verify($password , $user[3])){
					log_in_user($user);
					header ("Location: user/index.php");
				}else
				$errors[]=$failure_message; 
				
			}else
				$errors[]=$failure_message; 
			
		}
		 
		
	}


?>

		<h1><i class="fa fa-sign-in" aria-hidden="true">Sing In</i></h1>
		<?php echo display_errors($errors); ?>
		<form action="<?php url_for('index.php') ?>" method="post" class="center col-xs-12 login_form">
			<dl>
				<dt>Email: </dt>
				<dd>
				
					<input name="Email" type="email" class="form-control" aria-label="email" aria-describedby="inputGroup-sizing-sm" placeholder="email@lainabike.fi">
				</dd>
			</dl>
			<dl>
				<dt>Password: </dt>
				<dd>
					<input name="Password" type="password" class="form-control" aria-label="email" aria-describedby="inputGroup-sizing-sm" placeholder="password">
				</dd>
			</dl>
			<input name="submit" type="submit" value="Sing In" class="btn btn-primary btn-block">
		</form>
		<h1><i class="fa fa-user-plus" aria-hidden="true">New User?</i></h1>
<a class="btn btn-primary btn-block" href="new_user.php">Sing up</a>



<?php include_once("../private/shared/inout_footer.php") ?>


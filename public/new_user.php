<?php require_once("../Private/initialize.php") ?>

<?php include_once("../Private/shared/inout_header.php") ?>

<?php
	
	$toggle="";

if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$name = isset($_POST['Name']) ? $_POST['Name'] : null;
    $email = isset($_POST['Email']) ? $_POST['Email'] : null;
	$password = isset($_POST['Password']) ? $_POST['Password'] : null;
	$Repassword = isset($_POST['PasswordReapeat']) ? $_POST['PasswordReapeat'] : null;


//Data validation
$newUser = [];
$newUser['Name']= $name;
$newUser['Email']= $email;
$newUser['Password']= $password;
$newUser['RePassword']= $Repassword;
$validationResult=new_user_validation($newUser);
	
	    //User exist
	    $query = "SELECT Email from Users where Email= " ;
		$query .= "'" . db_escape($db, $email) . "'";
	  	$result = mysqli_query($db,$query);
	  	if(mysqli_num_rows($result) > 0)
		{
			$validationResult[] = "A user with the same email already enrigistred !";
			
		}


if(empty($validationResult)){
	
	//Password Encryption
	$HashedPassword = password_hash($password , PASSWORD_BCRYPT);
	
	
	
	$query = "INSERT INTO users " ;
	$query .= "(Name, Email, HashedPassword, Feedback) ";
	$query .= "VALUES (";
	$query .= "'" . db_escape($db, $name) . "', ";
	$query .= "'" . db_escape($db, $email) . "', ";
	$query .= "'" . db_escape($db, $HashedPassword) . "', ";
	$query .= "'0' )";
	$result = mysqli_query($db, $query);

	if($result){
		$toggle="hidden";
		$message="user enregistred withh succes ! ";
		header("refresh:3 ; url=".url_for("index.php"));
	}
	else
		$message="There is a problem please contact the site owner ";
}else{
	//var_dump($validationResult);
}


}



?>

		<h1>Sing Up</h1>
		<p>Welcome to LainaBike, Please enter your information bellow to enregister!</p>
		<?php echo display_errors($validationResult) ?>
		<?php if(isset($message))echo ("<div class=\"ok\">" . $message . "</div>") ?>
		<form action="<?php echo(url_for("new_user.php")) ?>" method="post" <?php echo $toggle; ?>>
			<dl>
				<dt>Name: </dt>
				<dd><input name="Name" type="text" value="<?php if(isset($name)) echo $name;?>"></dd>
			</dl>
			<dl>
				<dt>Email: </dt>
				<dd><input name="Email" type="email" value="<?php if(isset($email)) echo $email;?>"></dd>
			</dl>
			<dl>
				<dt>Password: </dt>
				<dd><input name="Password" type="password"></dd>
			</dl>
			<dl>
				<dt>Repeat Password: </dt>
				<dd><input name="PasswordReapeat" type="password"></dd>
			</dl>
			<input name="submit" type="submit" value="sing up" class="btn btn-primary">
		</form>

<?php include_once("../Private/shared/inout_footer.php") ?>
<?php require_once("../../private/shared/user_header.php") ; ?>
<?php 
//Get user details 
$name= $_SESSION['user_name'];
$email=$_SESSION['user_email'];
 
?>
		<h1>Edit My profile</h1>
		<form action="" method="post" class="form-horizontal">
			<dl>
				<dt><label for="Name">Name: </label></dt>
				<dd><input name="Name" id="Name" type="text" value="<?php echo $name; ?>" class="form-control"></dd>
			</dl>
			<dl>
				<dt><label for="Email">Email: </label></dt>
				<dd><input name="Email" id="Email" type="email" value="<?php echo $email; ?>" class="form-control" disabled></dd>
			</dl>
			<dl>
				<dt><label for="OldPassword">Old Password: </label></dt>
				<dd><input id="OldPassword" name="OldPassword" type="password" class="form-control"></dd>
			</dl>
			<dl>
				<dt><label for="NewPassword">New Password: </label></dt>
				<dd><input id="NewPassword" name="Password" type="password" class="form-control"></dd>
			</dl>
			<dl>
				<dt><label for="ReNewPassword">Repeat new Password: </label></dt>
				<dd><input id="ReNewPassword" name="Password" type="password" class="form-control"></dd>
			</dl>
			<input class="btn btn-primary btn-lg btn-block" name="edit" type="submit" value="edit">
		</form>

<?php require_once("../../private/shared/user_footer.php") ; ?>
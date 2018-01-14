<?php require_once("../../private/shared/user_header.php") ; ?>
<?php 
//Get user details 



?>
		<h1>Edit My profile</h1>
		<form action="" method="post">
			<dl>
				<dt>Name: </dt>
				<dd><input name="Name" type="text"></dd>
			</dl>
			<dl>
				<dt>Email: </dt>
				<dd><input name="Email" type="email"></dd>
			</dl>
			<dl>
				<dt>Old Password: </dt>
				<dd><input name="Password" type="password"></dd>
			</dl>
			<dl>
				<dt>New Password: </dt>
				<dd><input name="Password" type="password"></dd>
			</dl>
			<dl>
				<dt>Repeat new Password: </dt>
				<dd><input name="Password" type="password"></dd>
			</dl>
			<input name="edit" type="submit" value="edit">
		</form>

<?php require_once("../../private/shared/user_footer.php") ; ?>
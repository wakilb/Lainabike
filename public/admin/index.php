<?php require_once('../../private/initialize.php'); ?>

<!--Example of how can use variable between th current file and the required/included ones -->
<?php $page_title ='Admin'; ?>
<!--Bring the MarkUp (HTML) for the header-->
<?php include('../../private/shared/admin_header.php') ?>


<?php 
	$userResult=null;
	$toggle="hidden";
	
	$query= "SELECT * FROM admins ";
	$query .= "ORDER BY Id ASC"; 
	$result= mysqli_query($db, $query);

if($_SERVER['REQUEST_METHOD'] == 'POST'){
	if($_POST['submitEmail']){
	$email= isset ($_POST['search']) ? $_POST['search'] : '';

		$query2 = "SELECT * FROM users WHERE ";
		$query2 .= "Email='" . db_escape($db, $email)  . "'";
		$query2 .= " AND '". db_escape($db, $email)  . "'";
		$query2 .=" NOT IN (SELECT Email FROM admins )";
		$result2 = mysqli_query($db, $query2);
		$toggle="";
	}elseif($_POST['updatePassword']){
	$password= isset ($_POST['password']) ? $_POST['password'] : '';
	//Password Encryption
	$HashedPassword = password_hash($password , PASSWORD_BCRYPT);

		$query2 = "UPDATE admins SET ";
		$query2 .= "HashedPassword='" . $HashedPassword  . "' ";
		$query2 .= "WHERE Id= '". db_escape($db, $_SESSION['user_id'])  . "'"; 
		mysqli_query($db, $query2);
		echo ($query2);
	}
}




?>



    <div id="content">
		<h1>Admin accounts:</h1>
		<table class="list">
			<tr>
				<th>Email</th>
				<th>&nbsp;</th>
				<th>&nbsp;</th>
			</tr>
			<?php while($admin = mysqli_fetch_assoc($result)) { ?>
			<tr>
				<td><?php echo $admin['Email']; ?></td>
				<td><a href="<?php echo url_for("admin/manage/unsetadmin.php?Id=" . h(u($admin['Id']))); ?>">Unset</a></td>
			</tr>
			<?php } ?>
		</table>
		
		
		<h1>Add new Admin:</h1>
		<h2>search from the users</h2>
		<form action="<?php url_for("public/admin/index.php"); ?>" method="post" >
			<dl>
				<dt>Enter user eamil:</dt>
				<dt><input name="search" type="email"></dt>
				<dt><input name="submitEmail" type="submit" value="Search"></dt>
			</dl>
			<dl <?php echo ($toggle); ?>>
				<?php 
					if(mysqli_num_rows($result2) > 0){
						while($user=mysqli_fetch_row($result2)){
							$userResult = "Email :";
							$userResult .= " ".$user[2]." <br>";
							$userResult .= "Name : ";
							$userResult .=" ". $user[1];
							
				?>
				<dd><?php echo $userResult ?></dd>
				<dd><a href="<?php echo url_for("admin/manage/setadmin.php?Id=" . h(u($user[0]))); ?>">Set As admin</a></dd>
				<?php
							}
						}elseif(is_blank($email)){
							echo ("You didn't provide an email");
						}else{
							$userResult="The User not Found OR already have admin's role!";
				?>
				<dd><?php echo $userResult ?></dd>
				<?php
						}
				?>
				
			
			</dl>
		</form>		
		
		
		<h1>Change Password:</h1>
		<form action="<?php url_for("public/admin/index.php"); ?>" method="post">
			<dl>
				<dt>New Password:</dt>
				<dd>
					<input name="password" type="password">
				</dd>
			</dl>
			<dl>
				<dt>Confirm Password:</dt>
				<dd>
					<input name="Repassword" type="password">
				</dd>
			</dl>
			<dl>
				<dt></dt>
				<dd>Note! the validation is not set ! </dd>
			</dl>
			<dl>
				<dt></dt>
				<dd>
					<input name="updatePassword" type="submit">
				</dd>
			</dl>
		</form>
	 
	  <?php
	   mysqli_free_result($result);
	  ?>
		

		
    </div>

<!--Bring the MarkUp (HTML) for the Footer-->
<?php include('../../private/shared/admin_footer.php') ?>

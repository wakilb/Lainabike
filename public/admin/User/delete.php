<?php 

require_once('../../../private/initialize.php');

$page_title ='Delete user';

$Id= isset($_GET['Id']) ? $_GET['Id'] : header("Location: ". url_for("admin/User/index.php"));
$toggle="";
$text="Are you sure you want to delete this user?";

//Get the element from Database
$query= "SELECT * FROM users ";
$query.= "WHERE Id= ";
$query.= "'" . db_escape($db, $Id). "'";
$result=mysqli_query($db,$query);
$user = mysqli_fetch_assoc($result);
mysqli_free_result($result);

//Delete the record from database 
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
	if(isset($_POST['delete'])){
		$query= "DELETE FROM users ";
		$query.= "WHERE Id= ";
		$query.= "'" .db_escape($db, $Id). "'";
		$query.= "LIMIT 1";
		$result=mysqli_query($db,$query);
		if($result){
			$toggle="hidden";
			$text="User deleted with succes !";
		}else{
			echo mysqli_error($db);
		}
		
	}else if (isset($_POST['cancel'])){
		header("Location: ". url_for("admin/User/index.php"));
	}
}

?>

<?php include('../../../private/shared/admin_header.php') ?>

<div id="content">
    <h1>User</h1>
	<h2>delete user</h2>
	<p><?php echo($text)?></p>
	<p class="item" <?php echo($toggle)?>>Name: <?php echo($user['Name']) ?><br>Email: <?php echo($user['Email']) ?></p>
	
	<form action="<?php echo(url_for('/admin/User/delete.php?Id='.h(u($user['Id'])))) ?>" method="post" <?php echo($toggle)?>>
		<input type="submit" name="delete" value="Delete User" />
		<input type="submit" name="cancel" value="No"  />
	</form>

</div>

<?php include('../../../private/shared/admin_footer.php') ?>
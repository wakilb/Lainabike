<?php require_once('../../../private/initialize.php'); ?>

<?php 
 $page_title ='Admin'; 
include('../../../private/shared/admin_header.php');
?>

<?php 
if(!isset($_GET['Id'])){
	header("Location: ". url_for("admin/BikeInventory/index.php"));
	exit;
}else{
	
	$id=$_GET['Id'];
	$query = "SELECT * FROM users WHERE Id= ";
	$query .= "'" . db_escape($db, $id) . "'"; 
	$result = mysqli_query($db, $query);
	$user=mysqli_fetch_row($result);

}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$Id= $user[0];
	$query = "DELETE FROM admins WHERE Id= ";
	$query .= "'" . db_escape($db, $id) . "'"; 
	$result = mysqli_query($db, $query);
	
	if($result){
		$message = "Admin unset with success !";
	}else{
	echo mysqli_error($db);
	}
	
}


?>

<div id="content">
<h1>Unset Admin</h1>
	
	<form action="<?php echo url_for("admin/manage/unsetadmin.php?Id=".$id); ?>" method="post">
		<?php if(!isset($message)){ ?>
		<p>Would you set that user as NON admin ? ?</p>
		<dl>
			<dt>Name: </dt>
			<dd><?php echo $user[1]; ?></dd>
		</dl>
		<dl>
			<dt>Email: </dt>
			<dd><?php echo $user[2]; ?></dd>
		</dl>
		<dl>
			<dt></dt>
			<dd><input name="setadmin" type="submit" value="Yes"></dd>
		</dl>
		<?php } ?>
		<?php if(isset($message)){ ?>
		<dl>
			<dt><?php echo $message ?></dt>
			<dd><a href="<?php echo WWW_ROOT . '/admin/index.php'; ?>">Home</a></dd>
		</dl>
		<?php } ?>
	</form>
</div>

<?php include('../../../private/shared/admin_footer.php'); ?>
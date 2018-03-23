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
	$Name= $user[1];
	$Email= $user[2];
	$HashedPassword= $user[3];
	
	$query = "INSERT INTO admins " ;
	$query .= "(Id, Name, Email, HashedPassword) ";
	$query .= "VALUES (";
	$query .= "'" . db_escape($db, $Id) . "', ";
	$query .= "'" . db_escape($db, $Name) . "', ";
	$query .= "'" . db_escape($db, $Email) . "', ";
	$query .= "'" . db_escape($db, $HashedPassword) . "')";
	$result = mysqli_query($db, $query);
	
	if($result){
	$message ="Admin set with success !";
	}else{
	echo mysqli_error($db);
	}
	
}


?>

<div id="content">
<h1>Set Admin</h1>
	
	<form action="<?php echo url_for("admin/manage/setadmin.php?Id=".$id); ?>" method="post">
		<?php if(!isset($message)){ ?>
		<p>Would you give this user an admin's roles ?</p>
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
			<dd><a href="<?php echo WWW_ROOT . '/admin/index.php'; ?>">Back</a></dd>
		</dl>
		<?php } ?>
	</form>
</div>

<?php include('../../../private/shared/admin_footer.php'); ?>
<?php 

require_once('../../../private/initialize.php');

$page_title ='Delete Bike';

$Id= isset($_GET['Id']) ? $_GET['Id'] : header("Location: ". url_for("admin/BikeInventory/index.php"));
$toggle="";
$text="Are you sure you want to delete this bike?";

//Get the element from Database
$query= "SELECT * FROM bikes ";
$query.= "WHERE Id= ";
$query.= "'" .db_escape($db, $Id). "'";
$result=mysqli_query($db,$query);
$bike = mysqli_fetch_assoc($result);
mysqli_free_result($result);

//Delete the record from database 
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
	if(isset($_POST['delete'])){
		$query= "DELETE FROM bikes ";
		$query.= "WHERE Id= ";
		$query.= "'" .db_escape($db, $Id). "'";
		$query.= "LIMIT 1";
		$result=mysqli_query($db,$query);
		if($result){
			$toggle="hidden";
			$text="Bike deleted with succes !";
		}else{
			echo mysqli_error($db);
		}
		
	}else if (isset($_POST['cancel'])){
		header("Location: ". url_for("admin/BikeInventory/index.php"));
	}
}

?>

<?php include('../../../private/shared/admin_header.php') ?>

<div id="content">
    <h1>BikeInventory</h1>
	<h2>delete Bike</h2>
	<p><?php echo($text)?></p>
	<p class="item" <?php echo($toggle)?>>Model: <?php echo($bike['Model']) ?><br>Photo: <?php echo($bike['Photo']) ?></p>
	
	<form action="<?php echo(url_for('/admin/BikeInventory/delete.php?Id='.h(u($bike['Id'])))) ?>" method="post" <?php echo($toggle)?>>
		<input type="submit" name="delete" value="Delete bike" />
		<input type="submit" name="cancel" value="No"  />
	</form>

</div>

<?php include('../../../private/shared/admin_footer.php') ?>
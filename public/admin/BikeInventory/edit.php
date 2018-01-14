<?php
require_once('../../../private/initialize.php');
/*
//Test How we could recieve data from the super global varaibles 
$bikeID= isset($_GET['bikeID']) ? $_GET['bikeID'] : '0';
echo ($bikeID);
*/
$page_title ='Edit Bike';
$toggle1="";
$toggle2="hidden";

?>

<?php

if(!isset($_GET['Id'])){
	header("Location: ". url_for("admin/BikeInventory/index.php"));
	
}
$Id= $_GET['Id'];
$query = "SELECT * FROM bikes ";
$query .= "WHERE Id= ";
$query .= "'" . db_escape($db, $Id) . "'" ;
$result = mysqli_query($db, $query);
$bike = mysqli_fetch_assoc($result);
mysqli_free_result($result);


if($_SERVER['REQUEST_METHOD'] == 'POST'){
	//here i need to change the checking method "isset" to if it not equal null 
	$type= $_POST['type']; 
	$size= $_POST['size']; 
	$location= $_POST['location']; 
	$availability= $_POST['availability'] ;
	$Public_Id= $_POST['Public_Id']; 
	$photo= $_POST['photo'];
	
	$query = "UPDATE bikes ";
	$query .= "SET ";
	$query .= "Model='" . db_escape($db, $type) . "', " ;
	$query .= "Size='" . db_escape($db, $size) . "', " ;
	$query .= "Location='" . db_escape($db, $location) . "', " ;
	$query .= "Availability='" . db_escape($db, $availability) . "', " ;
	$query .= "Public_Id='" . db_escape($db, $Public_Id) . "', " ;
	$query .= "Photo='" . db_escape($db, $photo) . "' " ;
	$query .= "WHERE Id= " . db_escape($db, $Id) ;
	
	
	$result= mysqli_query($db , $query);
	
	//Check if the UPDATE succed 
	if($result) {
      	$toggle2="";
		$toggle1="hidden";
    } else {
      // UPDATE failed
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }

}

?>

<?php include('../../../private/shared/admin_header.php') ?>
<div id="content">
    <h1>BikeInventory</h1>
	<h2>edit Bike</h2>
	<form action="<?php echo url_for("admin/BikeInventory/edit.php?Id=" . h(u($Id))); ?>" method="post" <?php echo ($toggle1); ?>>
		<dl>
			<dt>Type</dt>
			<dd>
				<select name="type">
					<option value="RoadRacing"<?php if($bike['Model'] == "RoadRacing"){ echo "selected"; }?>>RoadRacing</option>
					<option value="Track"<?php if($bike['Model'] == "Track"){ echo "selected"; }?>>Track</option>
					<option value="CycloCross"<?php if($bike['Model'] == "CycloCross"){ echo "selected"; }?>>CycloCross</option>
					<option value="Mountain"<?php if($bike['Model'] == "Mountain"){ echo "selected"; }?>>Mountain</option>
				</select>
			</dd>
		</dl>
		<dl>
			<dt>Size</dt>
			<dd>
				<input type="number" name="size" min="49" max="59" value="<?php echo($bike['Size']);?>" >
			</dd>
		</dl>
		<dl>
			<dt>Location</dt>
			<dd>
				<select name="location">
					<option value="Fellmannia"<?php if($bike['Location'] == "Fellmannia"){ echo "selected"; }?>>Fellmannia</option>
					<option value="Niemi"<?php if($bike['Location'] == "Niemi"){ echo "selected"; }?>>Niemi</option>
				</select>
			</dd>
		</dl>
		<dl>
			<dt>Availability</dt>
			<dd>
				<input name="availability" type="radio" value="yes"<?php if($bike['Availability'] == "yes"){ echo ("checked='checked'"); }?>>Yes 
				<input name="availability" type="radio" value="no"<?php if($bike['Availability'] == "no"){ echo ("checked='checked'"); }?>>No 
			</dd>
		</dl>
		<dl>
			<dt>Public ID</dt>
			<dd>
				<input name="Public_Id" type="text" value="<?php echo($bike['Public_Id']);?>">
			</dd>
		</dl>
		<dl>
			<dt>Photo</dt>
			<dd>
				<input type="file" name="photo">
			</dd>
		</dl>
		<div id="operations">
        	<input type="submit" value="Edit Bike" />
      	</div>
		
	</form>
	<p <?php echo ($toggle2) ?>><?php echo ("UPDATE succed <br> <a href=" . url_for("admin/BikeInventory/index.php") . "><br>Bike Inventory</a>"); ?></p>
</div>

<?php include('../../../private/shared/admin_footer.php') ?>
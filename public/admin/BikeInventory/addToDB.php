<?php
require_once ("../../../private/initialize.php");
$page_title ='Add Bike';
include('../../../private/shared/admin_header.php')
?>


<?php	
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	
	
	//here i need to change the checking method "isset" to if it not equal null 
	$type= isset($_POST['type']) ? $_POST['type'] : ''; 
	$size= isset($_POST['size']) ? $_POST['size'] : '0'; 
	$location= isset($_POST['location']) ? $_POST['location'] : 'Location Problem'; 
	$availability= isset($_POST['availability']) ? $_POST['availability'] : '';
	$Public_Id= isset($_POST['Public_Id']) ? $_POST['Public_Id'] : ''; 
	$photo= isset($_POST['photo']) ? $_POST['photo'] : 'No Photo';
	
	//Data validation
	$newBike = [];
	$newBike['Public_Id']= $Public_Id;
	$newBike['Size']= $size;
	$validationResult=new_bike_validation($newBike);

	//Bike exist
	$query = "SELECT Public_Id from bikes where Public_Id= " ;
	$query .= "'" . db_escape($db, $Public_Id) . "'";
	$result = mysqli_query($db,$query);
	if(mysqli_num_rows($result) > 0)
	{
		$validationResult[] = "A Bike with the same ID already enrigistred !";	
	}
	
	if(empty($validationResult)){
	$query = "INSERT INTO bikes " ;
	$query .= " (Model , Size , Location , Availability , Public_Id , Photo ) ";
	$query .= "VALUES (";
	$query .= "'" . db_escape($db, $type) . "'," ;
	$query .= "'" . db_escape($db, $size) . "'," ;
	$query .= "'" . db_escape($db, $location) . "'," ;
	$query .= "'" . db_escape($db, $availability) . "'," ;
	$query .= "'" . db_escape($db, $Public_Id) . "'," ;
	$query .= "'" . db_escape($db, $photo) . "'" ;
	$query .= ")" ;
	$result = mysqli_query($db, $query);	
	
	
		echo ("<h2 id='message'>Bike added with success ! </h2><br>" );
		echo ("Type: " . $type . "<br>");
		echo ("Size: " . $size . "<br>");
		echo ("Location: " . $location . "<br>");
		echo ("Availability: " . $availability . "<br>");
		echo ("Public ID: " . $Public_Id . "<br>");
		echo ("Photo: " . $photo . "<br>");
		echo ("<a href=" . url_for("admin/BikeInventory/index.php") . ">Bike Inventory</a>");
		
	}else{
		echo display_errors($validationResult);
		db_disconnect($db);
		echo ("<br><a href=" . url_for("admin/BikeInventory/add.php") . ">Try again</a>");
		include ('../../../private/shared/admin_footer.php');
		exit();
		

	}
}else{
	header("Location: ". url_for("admin/BikeInventory/index.php"));
	exit;
}
?>

<?php include ('../../../private/shared/admin_footer.php'); ?>

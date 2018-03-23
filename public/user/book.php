<?php require_once('../../private/initialize.php'); ?>

<?php 

require_once('../../private/shared/user_header.php');

if(!isset($_GET['Id'])){
	header("Location: ". url_for("user/index.php"));
	
}
$Id= $_GET['Id'];
$query = "SELECT * FROM bikes ";
$query .= "WHERE Id= ";
$query .= "'" . db_escape($db, $Id) . "'" ;
$result = mysqli_query($db, $query);

$okToggle="";

while($bike = mysqli_fetch_assoc($result)) {
		echo ("<p class=\"text-primary\">");
        echo ("You are In the process To Book This Bike :<br />");
		echo ("</p>");
		echo ("<div class=\"list\">");
		echo ("<dl>");
        echo ("Type : " . u($bike['Model']). "<br />");
		echo ("Size : " . u($bike['Size']). "<br />");
		echo ("Location : " . u($bike['Location']). "<br />");
		echo ("Public Id : " . u($bike['Public_Id']). "<br />");
		echo ("Photo : " . u($bike['Photo']). "<br />");
		echo ("</dl>");
		echo ("</div>");
	
       } 

mysqli_free_result($result);

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
	$user_id= $_SESSION['user_id'];
	$bike_id= $_GET['Id'];
	$date= date("Y-m-d H:i:s");
	
	
	$query = "INSERT INTO reservations " ;
	$query .= " (User_Id, Bike_Id , Date , Number , Status , Initial_Status) ";
	$query .= "VALUES (";
	$query .= "'" . db_escape($db,$user_id) . "'," ;
	$query .= "'" . db_escape($db,$bike_id) . "'," ;
	$query .= "'" . db_escape($db,$date) . "'," ;
	$query .= "'" . $status= 1 . "'," ;
	$query .= "'" . $number= 1 . "'," ;
	$query .= "'" . $initial_status= 0 . "'" ;
	$query .= ")" ;
	$result = mysqli_query($db, $query);
	
	$query2 = "UPDATE bikes SET Availability = 'PD' WHERE Id = ";
	$query2 .= "'" .$_GET['Id']. "'";
	mysqli_query($db, $query2);
	
	echo ("<p class=\"text-warning\"> now The bike is waiting for you when you take it from the garage put your feedback about the statut of the bike so after that the reservation is completed </p> ");
	$okToggle="disabled";
	header("refresh:6 ; url=".url_for("user/reservation.php"));
}
?>





<form action="<?php url_for("/user/book.php") ?>" method="post">
	<input type="submit" value="ok" class="btn btn-primary <?php echo($okToggle); ?>" >
</form>

<?php require_once('../../private/shared/user_footer.php'); ?>
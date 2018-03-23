<?php require_once("../../Private/initialize.php") ?>

<?php 
	
require_once('../../private/shared/user_header.php');

if(!isset($_GET['reservationId'])){
	header("Location: ". url_for("user/reservation.php"));
}

$message="";
$SubmitToggle= null;
$reservationId= $_GET['reservationId'];
if(isset($_POST['intial_status'])){		
		//Change The availability status
		$query= "SELECT * FROM reservations WHERE Id= '" . db_escape($db, $reservationId) . "' "; 
		$result=mysqli_query($db, $query);
		while($bike = mysqli_fetch_assoc($result)){
			$query="UPDATE `bikes` SET `Availability`='yes' ";
			$query.="WHERE Id= " . db_escape($db, $bike['Bike_Id']) ;
			mysqli_query($db, $query);
		}
		//Check if the UPDATE succed 
	if($result) {
		$SubmitToggle= "hidden";
      	$message="<p class=\"text-primary\"> Thank you for using Lainabike!</p>";
		$message.="<a href=" . url_for("user/index.php") . "><br>Home</a> ";
    } else {
      // UPDATE failed
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }

		//Set reservation into Archive Status 
		$query="UPDATE `reservations` SET `status`='3' ";
		$query .= "WHERE Id= " . db_escape($db, $reservationId) ;
		mysqli_query($db, $query);
}

?>


<h1>Close your reservation</h1>
<p class="text-primary">
	Think you for using LainaBike! We hope you enjoyed our service<br>
	By closing your reservation the details of this operation will be archived. So please describe the status of the bike So that we could get back to it in case of any demage
</p>
<form action="<?php echo(url_for("user/closeReservation.php?reservationId=" . h(u($_GET['reservationId'])))); ?>" method="post" <?php echo($SubmitToggle); ?>>
	<label>The bike Status: </label><input type="number" name="intial_status" value="0" max="1" min="-1">
	<input class="btn btn-danger" type="submit" name="close" value="Close and finnish my reservation">
	
</form>
<?php if($message !== "") echo $message; ?>

<?php require_once('../../private/shared/user_header.php'); ?>
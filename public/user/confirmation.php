<?php require_once("../../Private/initialize.php") ?>

<?php 

if(!isset($_GET['reservationId'])){
	header("Location: ". url_for("user/reservation.php"));
}


$SubmitToggle= null;
if(isset($_POST['status'])){
	if($_POST['status'] == 0 ){
		echo("You must give a feadback !");
	}elseif ($_POST['status'] == 1 ) {
		//Update the status of the reservation 
		$reservationId= $_GET['reservationId'];
		$query = "UPDATE reservations ";
		$query .= "SET ";
		$query .= "Status='2' " ;
		$query .= "WHERE Id= " . db_escape($db, $reservationId) ;
		mysqli_query($db, $query);
		//Update the page assets
		$SubmitToggle="disabled";
		echo("Good feadback! <br>the resrvation with Id : " . $_GET['reservationId']. " Is activated now ! Enjoy");
		echo("<br> you will be redirected to the reservation page ");
		header("refresh:5 ; url=".url_for("user/reservation.php"));
		
		
		
	}else{
		$reservationId= $_GET['reservationId'];
		
		
		$query="SELECT * FROM reservations WHERE Id= '" . db_escape($db,  $reservationId) . "' "; 
		$result=mysqli_query($db, $query);
		while($bike = mysqli_fetch_assoc($result)){
			$query="UPDATE `bikes` SET `Availability`='yes'  WHERE Id= " . db_escape($db, $bike['Bike_Id']) ;
			mysqli_query($db, $query);
			
		}
	
		
		
		$query = "DELETE FROM reservations ";
		$query .= "WHERE Id= " . db_escape($db, $reservationId) ;
		mysqli_query($db, $query);
		//Update the page assets
		$SubmitToggle="disabled";
		echo(" Bad feadback! <br>the resrvation with Id : " . $_GET['reservationId']. " Is Deleted now ! Please go back and choose another bike");
		echo("<br> you will be redirected to the rent page ");
		header("refresh:5 ; url=".url_for("user/index.php"));
		

	}
	
}

?>

<h1>Confirme your reservation</h1>
<p>
	In this section You will describe the status of the bike before it move into your respensability<br>
	so Please right carfully your feedback
</p>
<form action="<?php echo(url_for("user/confirmation.php?reservationId=" . h(u($_GET['reservationId'])))); ?>" method="post">
	<label>FeedBack: </label><input type="number" name="status" value="0" max="1" min="-1">
	<?php 
		if(isset($_GET['reservationId'])){
			$reservationInSpot= $_GET['reservationId'];
		}
	?>
	<input type="submit" name="confirme" value="confirme" <?php echo($SubmitToggle); ?>  >
</form>
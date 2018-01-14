<?php require_once("../../private/shared/user_header.php") ; ?>

<?php
	$query = "SELECT * FROM reservations WHERE User_Id = '";
	$query .= "1'"; //To be modify dinamic
	$result = mysqli_query($db, $query);
?>

<h2>My reservation</h2>
	  <table>
		  <tr>
			  <th>Reservation ID</th>
			  <th>Bike ID</th>
			  <th>Date of reservation</th>
			  <th>Due Date</th>
			  <th>Status</th>
			  <th>&nbsp;</th>
			  <th>&nbsp;</th>
			  <th>&nbsp;</th>
		  </tr>
		  <?php while($reservation = mysqli_fetch_assoc($result)) { ?>
		  <?php
			if($reservation['Status'] != 3){ ?>
			<!--Check the status of the reservation to apply the color to the cell-->
		  	<?php	
				if ($reservation['Status'] == 1){
					$statusColor = "Yellow";
					$style= "";
				}elseif ($reservation['Status'] == 2){
					$statusColor = "Green";
					$style= "pointer-events:none; cursor:default; color:grey;";
				}
		  	?>
		  <tr>
			  <td><?php echo u($reservation['Id']) ;?></td>
			  <td><?php echo u($reservation['Bike_Id']) ;?></td>
			  <td><?php echo u($reservation['Date']) ;?></td>
			  <td><?php $dueDate= date('Y-m-d ', strtotime($reservation['Date'] . '+7 day')); echo $dueDate ;?></td>
			  <td <?php  echo ("style= \"background-color: ". $statusColor ." ; \" ") ;?>></td>
			  <td><a href="<?php echo(url_for("user/confirmation.php?reservationId=" . h(u($reservation['Id'])))); ?>" style="<?php echo($style); ?>">Activate</a></td>
			  <td><a href="">Renew</a></td>
			  <td><a href="<?php echo(url_for("user/closeReservation.php?reservationId=" . h(u($reservation['Id'])))); ?>">Close Reservation</a></td>
		  </tr>												 
		  <?php }?>
		  <?php } ?>
	  </table>

<?php require_once("../../private/shared/user_footer.php") ; ?>
<?php require_once("../../private/shared/user_header.php") ; ?>

<?php
	$query = "SELECT * FROM reservations WHERE User_Id = ";
	$query .= "'" . db_escape($db , $_SESSION['user_id']) . "'";
	$result = mysqli_query($db, $query);
?>

<h2>My reservation</h2>
<div class="table-responsive">
	  <table class="table table-hover table-bordered">
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
			  <td>
				  <a class="btn btn-success" href="<?php echo(url_for("user/confirmation.php?reservationId=" . h(u($reservation['Id'])))); ?>" style="<?php echo($style); ?>" aria-label="Activate">
  					<i class="fa fa-check" aria-hidden="true"></i>Activate</a>
			  </td>
			  <td>
				  <a class="btn btn-info" href="" aria-label="renew"><i class="fa fa-spinner" aria-hidden="true"></i>Renew</a>
			  </td>
			  <td>
				  <a class="btn btn-danger" href="<?php echo(url_for("user/closeReservation.php?reservationId=" . h(u($reservation['Id'])))); ?>" aria-label="Close"><i class="fa fa-close" aria-hidden="true"></i>Close</a>
			  </td>
		  </tr>												 
		  <?php }?>
		  <?php } ?>
	  </table>
</div>
<?php require_once("../../private/shared/user_footer.php") ; ?>
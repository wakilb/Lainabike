<?php require_once('../../../private/initialize.php'); ?>

<!--Example of how can use variable between th current file and the required/included ones -->
<?php $page_title ='Admin'; ?>
<!--Bring the MarkUp (HTML) for the header-->
<?php include('../../../private/shared/admin_header.php') ?>


<?php
	
	//Need desition if we list all the records or some spesific ones
	$sql = "SELECT * FROM reservations ";
  	$sql .= "ORDER BY Id ASC"; 
  	$reservations_result = mysqli_query($db , $sql);
	
?>


    <div id="content">
		<h1>Reservation</h1>
		<table class="list">
			<tr>
				<th>User ID</th>
				<th>Bike ID</th>
				<th>Date</th>
				<th>Number</th>
			</tr>
			<?php while($reservation=mysqli_fetch_assoc($reservations_result)) { ?>
			<tr>
				<td><?php echo u($reservation['User_Id']); ?></td>
				<td><?php echo u($reservation['Bike_Id']); ?></td>
				<td><?php echo u($reservation['Date']); ?></td>
				<td><?php echo u($reservation['Number']); ?></td>
			</tr>
		<?php } ?> 
		</table>
    </div>

<!--Bring the MarkUp (HTML) for the Footer-->
<?php include('../../../private/shared/admin_footer.php') ?>

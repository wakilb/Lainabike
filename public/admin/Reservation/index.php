<?php require_once('../../../private/initialize.php'); ?>

<!--Example of how can use variable between th current file and the required/included ones -->
<?php $page_title ='Admin'; ?>
<!--Bring the MarkUp (HTML) for the header-->
<?php include('../../../private/shared/admin_header.php') ?>

<!--
Simulate the Database 
-->
<?php
	
	
	$reservations = [
		['UserID' => '1' , 'BikeID' => '1' , 'Date' => '24/10/2017' , 'Number' => '1'] ,
		['UserID' => '2' , 'BikeID' => '2' , 'Date' => '21/10/2017' , 'Number' => '3'] ,
		['UserID' => '3' , 'BikeID' => '3' , 'Date' => '22/10/2017' , 'Number' => '2'] 
	];
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
			<?php foreach ($reservations as $reservation) { ?>
			<tr>
				<td><?php echo u($reservation['UserID']); ?></td>
				<td><?php echo u($reservation['BikeID']); ?></td>
				<td><?php echo u($reservation['Date']); ?></td>
				<td><?php echo u($reservation['Number']); ?></td>
			</tr>
		<?php } ?> 
		</table>
    </div>

<!--Bring the MarkUp (HTML) for the Footer-->
<?php include('../../../private/shared/admin_footer.php') ?>

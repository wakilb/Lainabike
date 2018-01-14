<?php require_once('../../../private/initialize.php'); ?>

<?php
  $sql = "SELECT * FROM bikes ";
  $sql .= "ORDER BY Id ASC"; 
  $bikes_result = mysqli_query($db , $sql);


?>

<!--Example of how can use variable between the current file and the required/included ones -->
<?php $page_title ='Admin'; ?>
<!--Bring the MarkUp (HTML) for the header-->
<?php include('../../../private/shared/admin_header.php') ?>


<div id="content">
  <div class="subjects listing">
    <h1>BikeInventory</h1>

    <div class="actions">
		<a href="<?php echo url_for('admin/BikeInventory/add.php') ?>"><i class="fa fa-plus-square fa-2x" aria-hidden="true"></i><span class="sr-only">Add New Bike</span></a>
    </div>

  	<table class="list">
  	  <tr>
        <th>Bike ID</th>
        <th>Type</th>
        <th>Size</th>
  	    <th>Location</th>
  	    <th>Availability</th>
		<th>Public ID</th>
  	    <th>Photo</th>
        <th>&nbsp;</th>
		<th>&nbsp;</th>
  	  </tr>


		
      <?php while($bike = mysqli_fetch_assoc($bikes_result)) { ?>
        <tr>
          <td><?php echo u($bike['Id']); ?></td>
          <td><?php echo u($bike['Model']); ?></td>
		  <td><?php echo u($bike['Size']); ?></td>
		  <td><?php echo u($bike['Location']); ?></td>
          <td><?php echo $bike['Availability'] == 'yes' ? 'Available' : 'Not avilable'; ?></td>
		  <td><?php echo u($bike['Public_Id']); ?></td>
		  <td><?php echo u($bike['Photo']); ?></td>
          <td><a class="action" href="<?php echo url_for('/admin/BikeInventory/edit.php?Id='.h(u($bike['Id']))); ?>">Edit</a></td>
          <td><a class="action" href="<?php echo url_for('/admin/BikeInventory/delete.php?Id='.h(u($bike['Id']))); ?>">Delete</a></td>
    	</tr>
      <?php } ?>
  	</table>
	  
	  <?php
	   mysqli_free_result($bikes_result);
	  ?>
  </div>

</div>


<!--Bring the MarkUp (HTML) for the Footer-->
<?php include('../../../private/shared/admin_footer.php') ?>

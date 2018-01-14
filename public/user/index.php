<?php require_once('../../private/shared/user_header.php') ?>

<?php 
//Get DATA from database to fill the search form 
	$query = "SELECT DISTINCT Model FROM bikes" ;
	$result= mysqli_query($db , $query);
	$query = "SELECT DISTINCT Location FROM bikes" ;
	$result2= mysqli_query($db , $query);

//Get data according to the search criteria 


if ($_SERVER["REQUEST_METHOD"] == 'POST'){
	if($_POST['BikeModel'] == 'Any Type' && $_POST['BikeLocation'] == 'Any Location'){
		$query2 = " SELECT * FROM bikes WHERE Availability = 'yes' ";
		$result= mysqli_query($db , $query2);	
	}else{
   	$query2 = " SELECT * FROM bikes WHERE (";
	$query2 .= "Model = '" . db_escape($db, $_POST['BikeModel']) . "' OR ";
	$query2 .= "Size = '" . db_escape($db, $_POST['size']) . "' OR ";
	$query2 .= "Location = '" . db_escape($db, $_POST['BikeLocation']) . "') ";
	$query2 .= "AND (Availability = 'Yes' ) ";

	$result= mysqli_query($db , $query2);	
	}
}
?>

	  <h2>Rent a Bike</h2>

	<table class="list">
		
      <?php if (isset ($query2)){ ?>
		<tr>
			<th>Bike ID</th>
			<th>Type</th>
			<th>Size</th>
			<th>Location</th>
			<th>Availability</th>
			<th>Public ID</th>
			<th>Photo</th>
			<th>&nbsp;</th>
		</tr>
		
	
		<?php while($bike = mysqli_fetch_assoc($result)) { ?>
        <tr>
          <td><?php echo u($bike['Id']); ?></td>
          <td><?php echo u($bike['Model']); ?></td>
		  <td><?php echo u($bike['Size']); ?></td>
		  <td><?php echo u($bike['Location']); ?></td>
          <td><?php echo $bike['Availability'] == 'yes' ? 'Available' : 'Not avilable'; ?></td>
		  <td><?php echo u($bike['Public_Id']); ?></td>
		  <td><?php echo u($bike['Photo']); ?></td>
          <td><a class="action" href="<?php echo url_for('/user/book.php?Id='.h(u($bike['Id']))); ?>">Book</a></td>
    	</tr>
      <?php } }?>
  	</table>

 <?php if (!isset ($query2)){ ?>
	  <form action="<?php echo url_for("user/index.php") ?>" method="post">
		  <dl>
			  <dt>Bike model: </dt>
			  <dd>
				  <select name="BikeModel">
					  <?php
					    while ($bike_model= mysqli_fetch_assoc($result)){
							echo ("<option value=" . $bike_model['Model'] . ">" . $bike_model['Model'] . "</option>");
						}
							
					  ?>
					  <option value="Any Type" selected>Any Type</option>
				  </select>
			  </dd>
		  </dl>
		  <dl>
			  <dt>Bike size: </dt>
			  <dd>
				  <input type="number" name="size" min="49" max="59" >
			  </dd>
		  </dl>
		  <dl>
			  <dt>Bike Location: </dt>
			  <dd>
				  <select name="BikeLocation">
					  <?php
					    while ($bike_location= mysqli_fetch_assoc($result2)){
							echo ("<option value=" . $bike_location['Location'] . ">" . $bike_location['Location'] . "</option>");
						}
							
					  ?>
					  <option value="Any Location" selected>Any Location</option>
				  </select>
			  </dd>
		  </dl>
		  <input name="search" type="submit" value="search">
	  </form>
 <?php } ?>

<?php
//Release Data
mysqli_free_result($result);
mysqli_free_result($result2);

?>
	  

<?php require_once('../../private/shared/user_footer.php') ?>

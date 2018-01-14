<?php require_once ('../../../private/initialize.php')?>
<!--Example of how can use variable between the current file and the required/included ones -->
<?php $page_title ='Add Bike'; ?>
<!--Bring the MarkUp (HTML) for the header-->
<?php include('../../../private/shared/admin_header.php') ?>


<div id="content">
    <h1>BikeInventory</h1>
	<h2>Add new Bike</h2>
	<form action="<?php echo url_for("admin/BikeInventory/addToDB.php") ?>" method="post">
		<dl>
			<dt>Type</dt>
			<dd>
				<select name="type">
					<option value="RoadRacing">RoadRacing</option>
					<option value="Track">Track</option>
					<option value="CycloCross">CycloCross</option>
					<option value="Mountain">Mountain</option>
				</select>
			</dd>
		</dl>
		<dl>
			<dt>Size</dt>
			<dd>
				<input type="number" name="size" min="49" max="59" >
			</dd>
		</dl>
		<dl>
			<dt>Location</dt>
			<dd>
				<select name="location">
					<option value="Fellmannia">Fellmannia</option>
					<option value="Niemi">Niemi</option>
				</select>
			</dd>
		</dl>
		<dl>
			<dt>Availability</dt>
			<dd>
				<input name="availability" type="radio" value="yes" checked>Yes 
				<input name="availability" type="radio" value="no">No 
			</dd>
		</dl>
		<dl>
			<dt>Public ID</dt>
			<dd>
				<input name="Public_Id" type="text">
			</dd>
		</dl>
		<dl>
			<dt>Photo</dt>
			<dd>
				<input type="file" name="photo">
			</dd>
		</dl>
		<div id="operations">
        	<input type="submit" value="Add Bike" />
      	</div>
		
	</form>
</div>


<?php include ('../../../private/shared/admin_footer.php')?>
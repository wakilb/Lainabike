<?php require_once('../../../private/initialize.php'); ?>

<!--Example of how can use variable between th current file and the required/included ones -->
<?php $page_title ='Admin'; ?>
<!--Bring the MarkUp (HTML) for the header-->
<?php include('../../../private/shared/admin_header.php') ?>

<!--Retreive from Database--> 
<?php
	
	$query = "SELECT * FROM users " ;
    $query .= "ORDER BY Id ASC";
    $query_result= mysqli_query($db , $query);
	
?>




    <div id="content">
		<h1>User</h1>
		<table class="list">
			<tr>
				<th>User Id</th>
				<th>Name</th>
				<th>Email</th>
				<th>FeedBack</th>
				<th>&nbsp;</th>
			</tr>
			<?php while($user = mysqli_fetch_assoc($query_result)) { ?>
			 <tr>
				<td><?php echo $user['Id']; ?></td>
				<td><?php echo $user['Name']; ?></td>
				<td><?php echo $user['Email']; ?></td>
				<td><?php echo $user['Feedback']; ?></td>
				<td><a class="action" href="<?php echo url_for('/admin/User/delete.php?Id='.h(u($user['Id']))); ?>">Delete</a></td>
			</tr>
		<?php } ?>
		</table>
		
		<?php
		   mysqli_free_result($query_result);
		?>
    </div>

<!--Bring the MarkUp (HTML) for the Footer-->
<?php include('../../../private/shared/admin_footer.php') ?>


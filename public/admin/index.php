<?php require_once('../../private/initialize.php'); ?>

<!--Example of how can use variable between th current file and the required/included ones -->
<?php $page_title ='Admin'; ?>
<!--Bring the MarkUp (HTML) for the header-->
<?php include('../../private/shared/admin_header.php') ?>




    <div id="content">
		<h1>Home</h1>
		<p>Could have some settings here !!</p>
    </div>

<!--Bring the MarkUp (HTML) for the Footer-->
<?php include('../../private/shared/admin_footer.php') ?>

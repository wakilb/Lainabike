<?php 
include_once("../private/initialize.php");

echo("See you later !");

//Need to unset the SESSIONS 



header("Location : index.php");
header("refresh:3 ; url=".url_for("index.php"));
?>
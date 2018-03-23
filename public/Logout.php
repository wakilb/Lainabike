<?php 
include_once("../private/initialize.php");
include_once("../Private/shared/inout_header.php"); 


echo("<h1 class=\" text-success\">See you later ! </h1>");

//unset the SESSIONS
//unset($_SESSION['user_name']);
session_destroy();

include_once("../Private/shared/inout_footer.php");
header("refresh:3 ; url=".url_for("index.php"));
?>
<?php
/*Here all the document needed to load in several pages*/



require_once ('functions.php');
require_once('validation_functions.php');


// Assign the root URL to a PHP constant
// * Do not need to include the domain
// * Use same document root as webserver
// * Can set a hardcoded value:
// define("WWW_ROOT", '/~kevinskoglund/globe_bank/public');
// define("WWW_ROOT", '');
// * Can dynamically find everything in URL up to "/public"
$public_end = strpos($_SERVER['SCRIPT_NAME'], '/public') + 7;
$doc_root = substr($_SERVER['SCRIPT_NAME'], 0, $public_end);
define("WWW_ROOT", $doc_root);
// END OF PREVIOUS TASK 

//database Part
require_once ('database.php');
$db= db_connect();
// END OF DATABASE PART

//Validation Array
$validationResult = [];


//Session Turn on 
session_start();

?>

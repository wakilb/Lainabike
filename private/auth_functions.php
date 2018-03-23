<?php

  // Performs all actions necessary to log in a user
  function log_in_user($user) {
  // Renerating the ID protects the admin from session fixation.
    session_regenerate_id();
    $_SESSION['user_id'] = $user[0];
    $_SESSION['user_name'] = $user[1];
	$_SESSION['user_email'] = $user[2];
	if(is_an_admin($user[0]))
		$_SESSION['is_admin'] = "yes";
    return true;
  }

function is_an_admin($id){
	global $db;
	
	$query = "SELECT * FROM admins WHERE Id= " ;
	$query .= "'" . db_escape($db, $id) . "'"  ;
	$result=mysqli_query($db, $query);
	if(mysqli_num_rows($result) > 0 )
		return true;
	else
		return false;
	
	
}

  function is_logged_in() {
    return isset($_SESSION['admin_id']);
  }

  // Call require_login() at the top of any page which needs to
  // require a valid login before granting acccess to the page.
  function require_login() {
    if(!is_logged_in()) {
      redirect_to(url_for('/staff/login.php'));
    } else {
      // Do nothing, let the rest of the page proceed
    }
  }

?>

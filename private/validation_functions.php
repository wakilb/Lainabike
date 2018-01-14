<?php



  // is_blank('abcd')
  // * validate data presence
  // * uses trim() so empty spaces don't count
  // * uses === to avoid false positives
  // * better than empty() which considers "0" to be empty
  function is_blank($value) {
    return !isset($value) || trim($value) === '';
  }

  // has_presence('abcd')
  // * validate data presence
  // * reverse of is_blank()
  // * I prefer validation names with "has_"
  function has_presence($value) {
    return !is_blank($value);
  }

  // has_length_greater_than('abcd', 3)
  // * validate string length
  // * spaces count towards length
  // * use trim() if spaces should not count
  function has_length_greater_than($value, $min) {
    $length = strlen($value);
    return $length > $min;
  }

  // has_length_less_than('abcd', 5)
  // * validate string length
  // * spaces count towards length
  // * use trim() if spaces should not count
  function has_length_less_than($value, $max) {
    $length = strlen($value);
    return $length < $max;
  }

  // has_length_exactly('abcd', 4)
  // * validate string length
  // * spaces count towards length
  // * use trim() if spaces should not count
  function has_length_exactly($value, $exact) {
    $length = strlen($value);
    return $length == $exact;
  }

  // has_length('abcd', ['min' => 3, 'max' => 5])
  // * validate string length
  // * combines functions_greater_than, _less_than, _exactly
  // * spaces count towards length
  // * use trim() if spaces should not count
  function has_length($value, $options) {
    if(isset($options['min']) && !has_length_greater_than($value, $options['min'] - 1)) {
      return false;
    } elseif(isset($options['max']) && !has_length_less_than($value, $options['max'] + 1)) {
      return false;
    } elseif(isset($options['exact']) && !has_length_exactly($value, $options['exact'])) {
      return false;
    } else {
      return true;
    }
  }

  // has_inclusion_of( 5, [1,3,5,7,9] )
  // * validate inclusion in a set
  function has_inclusion_of($value, $set) {
  	return in_array($value, $set);
  }

  // has_exclusion_of( 5, [1,3,5,7,9] )
  // * validate exclusion from a set
  function has_exclusion_of($value, $set) {
    return !in_array($value, $set);
  }

  // has_string('nobody@nowhere.com', '.com')
  // * validate inclusion of character(s)
  // * strpos returns string start position or false
  // * uses !== to prevent position 0 from being considered false
  // * strpos is faster than preg_match()
  function has_string($value, $required_string) {
    return strpos($value, $required_string) !== false;
  }

  // has_valid_email_format('nobody@nowhere.com')
  // * validate correct format for email addresses
  // * format: [chars]@[chars].[2+ letters]
  // * preg_match is helpful, uses a regular expression
  //    returns 1 for a match, 0 for no match
  //    http://php.net/manual/en/function.preg-match.php
  function has_valid_email_format($value) {
    $email_regex = '/\A[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,}\Z/i';
    return preg_match($email_regex, $value) === 1;
  }

function new_bike_validation($newBike){
		$errors = [];
		
		//Data presence 
		if(is_blank($newBike['Public_Id'])){
			$errors[] = "Public Id is necessery ! ";
		}
		if(is_blank($newBike['Size'])){
			$errors[] = "Please give the size";
		}
		
		//Public ID length
		if(!has_length($newBike['Public_Id'],['min' => 3, 'max' => 40])){
			$errors[] = "Public ID must be between 4 and 40 characters";
		}
		   
		return $errors;
}

function new_user_validation($newUser){
		$errors = [];
		


		//Data presence 
		if(is_blank($newUser['Name'])){
			$errors[] = "Name field is empty ! please provide your name";
		}
		if(is_blank($newUser['Email'])){
			$errors[] = "Email field is empty ! please provide your email adresse";
		}
		if(is_blank($newUser['Password'])){
			$errors[] = "Password field is empty ! please choose a password";
		}
		if(is_blank($newUser['RePassword'])){
			$errors[] = "please confirm your password";
		}
		
		//Name length
		if(!has_length($newUser['Name'],['min' => 4, 'max' => 40])){
			$errors[] = "Name must be between 4 and 40 characters";
		}
		
		//Name type
		if(!is_string($newUser['Name'])){
			$errors[] = "Name should have only alphabet";
		}
		
		//email format
		if(!has_valid_email_format($newUser['Email'])){
			$errors[] = "Email format are not valide";
		}
		   
		//Password confirmation
		if(!($newUser['Password'] === $newUser['RePassword'])){
			$errors[] = "Passwords are not similar";
		}
		   
		return $errors;
		   }

?>

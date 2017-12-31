<?php

	/*
	 #About
		This function is used to validate inputs, Takes 3 arguments 
		1st is the input itself to check.
		2nd is the type of input to validate according to.
		3rd is it required or not.

		->> REQUIRED Accepts values
		 *	false -> NOT required	 
		 * 	true -> Required


		->> TYPE Accepts values
		 *	name 					-> from A to Z, from a to z, ( - ' ), and MAX 2 spaces. MAX 10 char. MIN 2 char.
		 *	fullname			-> from A to Z, from a to z, , and MAX 5 spaces. MAX 30 char. MIN 5 char.
		 *	email 				-> from a to z, from 0 to 9, , and ( @ , . , _ , -  )
		 *	mobile				-> from 0 to 9, and MUST 11.
		 *	link 					-> from A to Z, from a to z, from 0 to 9, and ( ? % & ! / : = . _ - @)
		 *	
		 *	
	 		 

		->> RETURN 
		 *	IF Required & Empty ->>> NULL
		 *	IF NOT Required & Empty ->>> TRUE
		 *
		 *
		 *

		*/


	/*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*/
	// Define Constants

	$__TYPES_ARRAY__  =  array('name', 'fullname', 'email', 'mobile', 'link', 'text', 'password', 'birthday');
	$__YEAR_ARRAY__  =  array(0, 31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31) ;
	$__YEAR_ARRAY_29__ = array(0, 31, 29, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);

	/* with javascript is better */
	// $types_array = array('name', 'fullname', 'email', 'mobile', 'link', 'image');
	// $expensions = array("jpeg","jpg","png");
  
	define('__REQUIRED__', 'This field is required!');

	// 
	define("__MAX_NAME_LENGTH__", 10);
	define("__MIN_NAME_LENGTH__", 2);
	define("__MAX_NAME_SPACES__", 2); 
	define("__INVALID_NAME__", "Invaild! Allowed ONLY ( English letters & Spaces )."); 
	define("__INVALID_NAME_LENGTH__", 
		"Invaild! Min:Max characters are ".__MIN_NAME_LENGTH__.":".__MAX_NAME_LENGTH__." characters."); 
	define("__INVALID_NAME_SPACES__", "Invaild! Max spaces are ".__MAX_NAME_SPACES__." spaces."); 

	// 
	define("__MAX_FULL_NAME_LENGTH__", 30);
	define("__MIN_FULL_NAME_LENGTH__", 5);
	define("__MAX_FULL_NAME_SPACES__", 5); 
	define("__INVALID_FULL_NAME__", "Invaild! Allowed ONLY ( English letters & Spaces )."); 
	define("__INVALID_FULL_NAME_LENGTH__", 
		"Invaild! Min:Max characters are ".__MIN_FULL_NAME_LENGTH__.":".__MAX_FULL_NAME_LENGTH__." characters."); 
	define("__INVALID_FULL_NAME_SPACES__", "Invaild! Max spaces are ".__MAX_FULL_NAME_SPACES__." spaces.");

	//
	define("__MAX_EMAIL_LENGTH__", 50);
	define("__MIN_EMAIL_LENGTH__", 10);
	define("__INVALID_EMAIL__", "Invaild! Allowed ONLY ( Small english letters & Numbers & - _ . @ )."); 
	define("__INVALID_ACT_EMAIL__", "Invaild E-Mail."); 
	define("__INVALID_EMAIL_LENGTH__", 
		"Invaild! Min:Max characters are ".__MIN_EMAIL_LENGTH__.":".__MAX_EMAIL_LENGTH__." characters."); 
	define("__MUST_EMAIL__", "Invaild! MUST contain . & @ characters."); 
	
	//
	define("__MOB_LENGTH__", 11);
	define("__INVALID_MOB__", "Invaild! Allowed ONLY ( Numbers )."); 
	define("__INVALID_ACT_MOB__", "Invaild mobile."); 
	define("__INVALID_MOB_LENGTH__", "Invaild! Length MUST be ".__MOB_LENGTH__." numbers."); 

	//
	define("__INVALID_LINK__", "Invaild!"); 
	define("__INVALID_ACT_LINK__", "Invaild Link!."); 
	define("__LINK_LENGTH__", 255);
	define("__INVALID_LINK_LENGTH__", "Invaild! Max length is ".__LINK_LENGTH__." characters."); 
	
	//
	define("__MAX_PASSWORD_LENGTH__", 50);
	define("__MIN_PASSWORD_LENGTH__", 5);
	define("__INVALID_PASSWORD_LENGTH__", 
		"Invaild! Min:Max characters are ".__MIN_PASSWORD_LENGTH__.":".__MAX_PASSWORD_LENGTH__." characters."); 

	//
	define('__INVALID_BOD_INPUT__', 'Invaild argument MUST be an array');
	define('__INVALID_BOD_LENGTH__', 'Invaild argument length MUST be 3[day, month, year]');
	define('__MIN_BOD_YEAR__', 1985);
	define('__MAX_BOD_YEAR__', date("Y"));
	define('__INAVLID_BOD_YEAR__', 'Invaild Year!');
	define('__MIN_BOD_MONTH__', 1);
	define('__MAX_BOD_MONTH__', 12);
	define('__INAVLID_BOD_MONTH__', 'Invaild Month!');
	define('__INAVLID_BOD_DAY__', 'Invaild Day!');
	define('__YEAR_INPUT_NAME__', 'year');
	define('__MONTH_INPUT_NAME__', 'month');
	define('__DAY_INPUT_NAME__', 'day');
	

	//
	/*
	define('__NO_FILE__', 'NO file selected!');
	define('__INVALID_IMAGE_EXTENSION__', "Extension NOT allowed, Please choose a JPEG or PNG file.");
	define('__MAX_IMAGE_SIZE__', 2097152); // 2MB
	define('__MAX_IMAGE_SIZE_MB__', __MAX_IMAGE_SIZE__/1024/1024);
	define('__INVALID_IMAGE_SIZE__', "Exceed max size. Max size is ".__MAX_IMAGE_SIZE_MB__." MB");
	*/

	/*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*/
	// Function to validate
	function validate($input, $type, $required = TRUE){
		
		if($required !== true && $required != false){
			throw new Exception('Invaild third argument MUST be ( TRUE or FALSE)');
		}

		if(!is_array($input)){
      $trim_input = trim($input);
			if(empty($trim_input)){
				if($required){
			    return array('result' => FALSE, 'msg' => __REQUIRED__);
				} else {
					return array('result' => TRUE, 'value' => NULL);
				}
		  }
		}

		$trim_type = trim($type);
		$type = strtolower($trim_type);

		if(!in_array($type, $GLOBALS['__TYPES_ARRAY__'])){
			$type_string = "";
			foreach ($GLOBALS['__TYPES_ARRAY__'] as $type_element) {
				$type_string .= ucwords($type_element).", ";
			}
			throw new Exception('Invaild 2nd argument MUST be on of those ( '.substr($type_string, 0, strlen($type_string)-2).' )');
		}

		/* TEXT */
		if($type == 'text'){
			return array('result' => TRUE, 'value' => str_replace("'", "\'", trim($input)));
		}
		
		else 

		/* NAME */
		if($type == 'name'){
			$input = trim($input);
			if(!preg_match("/^[a-zA-Z \-\']*$/", $input)){
		    return array('result' => FALSE, 'msg' => __INVALID_NAME__);
		  }
		  if(strlen($input) > __MAX_NAME_LENGTH__ || strlen($input) < __MIN_NAME_LENGTH__){
		  	return array('result' => FALSE, 'msg' => __INVALID_NAME_LENGTH__);
		  }
			if(count(explode(" ", $input)) > __MAX_NAME_SPACES__ + 1){
				return array('result' => FALSE, 'msg' => __INVALID_NAME_SPACES__);
			}
			return array('result' => TRUE, 'value' => str_replace("'", "\'", $input));
		} 
		
		else 

		/* FULLNAME */
		if($type == 'fullname'){
			$input = trim($input);
			if(!preg_match("/^[a-zA-Z \-\']*$/", $input)){
		    return array('result' => FALSE, 'msg' => __INVALID_FULL_NAME__);
		  }
		  if(strlen($input) > __MAX_FULL_NAME_LENGTH__ || strlen($input) < __MIN_FULL_NAME_LENGTH__){
		  	return array('result' => FALSE, 'msg' => __INVALID_FULL_NAME_LENGTH__);
		  }
			if(count(explode(" ", $input)) > __MAX_FULL_NAME_SPACES__ + 1){
				return array('result' => FALSE, 'msg' => __INVALID_FULL_NAME_SPACES__);
			}
			return array('result' => TRUE, 'value' => str_replace("'", "\'", $input));
		}
		
		else 
		
		/* EMAIL */
		if($type == 'email'){
			$input = trim($input);
			if(!preg_match("/^[a-z0-9\-_.@]*$/", $input)){
		    return array('result' => FALSE, 'msg' => __INVALID_EMAIL__);
		  }
		  if(strlen($input) > __MAX_EMAIL_LENGTH__ || strlen($input) < __MIN_EMAIL_LENGTH__){
		  	return array('result' => FALSE, 'msg' => __INVALID_EMAIL_LENGTH__);
		  }
			$email_array_1 = explode('@', $input);
		  if(!isset($email_array_1[1])){
		    return array('result' => FALSE, 'msg' => __MUST_EMAIL__);
		  }
		  $email_array_2 = explode('.', $email_array_1[1]);
		  if(!isset($email_array_2[1])){
		  	return array('result' => FALSE, 'msg' => __MUST_EMAIL__);
		  }$__trim = trim($email_array_2[1]); $__trim_ = trim($email_array_2[0]);
		  if(empty($__trim) || empty($__trim_)){
		  	return array('result' => FALSE, 'msg' => __INVALID_ACT_EMAIL__);
		  }
			return array('result' => TRUE, 'value' => $input);
		}
		
		else 
		
		/* MOBILE */
		if($type == 'mobile'){
			$input = trim($input);
			if(!preg_match("/^[0-9]*$/", $input)){
		    return array('result' => FALSE, 'msg' => __INVALID_MOB__);
		  }
		  if(strlen($input) !== __MOB_LENGTH__){
		  	return array('result' => FALSE, 'msg' => __INVALID_MOB_LENGTH__);
		  }
			$mob = str_split($input);
		  if($mob[0] != 0){
		  	return array('result' => FALSE, 'msg' => __INVALID_ACT_MOB__);
		  } 
		  if($mob[1] != 1){
		  	return array('result' => FALSE, 'msg' => __INVALID_ACT_MOB__);
		  }
		  if($mob[2] != 0 && $mob[2] != 1 && $mob[2] != 2){
		  	return array('result' => FALSE, 'msg' => __INVALID_ACT_MOB__);
		  }
			return array('result' => TRUE, 'value' => $input);
		}
		
		else 
		
		/* LINK */
		if($type == 'link'){
			$input = trim($input);
			if(!preg_match("/^[a-zA-Z0-9\/\-?,%&!:=._@]*$/", $input)){
		    return array('result' => FALSE, 'msg' => __INVALID_LINK__);
		  }
		  if(strlen($input) > __LINK_LENGTH__){
		  	return array('result' => FALSE, 'msg' => __INVALID_LINK_LENGTH__);
		  }
		  /* TAKE LONG TIME BUT SECURE! */
		  /*
		  $time = time();
		 	$headers = @get_headers($input);
			if($headers === false || $headers[0] === "HTTP/1.0 404 Not Found") {
		    return array('result' => FALSE, 'msg' => __INVALID_ACT_LINK__, 'value' => $input);
			}
			$time2 = time(); 
			*/
			return array('result' => TRUE, 'value' => $input);
		} 
		
		else 

		/* PASSWORD */
		if($type == 'password'){
		  if(strlen($input) > __MAX_PASSWORD_LENGTH__ || strlen($input) < __MIN_PASSWORD_LENGTH__){
		  	return array('result' => FALSE, 'msg' => __INVALID_PASSWORD_LENGTH__);
		  }
			return array('result' => TRUE, 'value' => str_replace("'", "\'", $input));
		}

		else

		/* BIRTHDAY */
		if($type == 'birthday'){
			
			if(!is_array($input)){
				throw new Exception(__INVALID_BOD_INPUT__);
			}
			
			if(count($input) != 3){
				throw new Exception(__INVALID_BOD_LENGTH__);
			}

			if(!$required && $input[0] == '' && $input[1] == '' && $input[2] == ''){
				return array('result' => TRUE, 'value' => NULL);
			} else {				
				if($input[2] < __MIN_BOD_YEAR__ || $input[2] > __MAX_BOD_YEAR__){
					return array('result' => FALSE, 'msg' => __INAVLID_BOD_YEAR__, 'inputname' => __YEAR_INPUT_NAME__);
				}
				
				if($input[1] < __MIN_BOD_MONTH__ || $input[1] > __MAX_BOD_MONTH__){
					return array('result' => FALSE, 'msg' => __INAVLID_BOD_MONTH__, 'inputname' => __MONTH_INPUT_NAME__);
				}

				if($input[2]%4 == 0 && $input[2]%100 != 0 || $input[2]%400 == 0){
					$day29 = TRUE; 
				} else {
					$day29 = FALSE;
				}

				if($day29){
					if($input[0] > $GLOBALS['__YEAR_ARRAY_29__'][$input[1]] || $input[0] < 1){
						return array('result' => FALSE, 'msg' => __INAVLID_BOD_DAY__, 'inputname' => __DAY_INPUT_NAME__);
					}
				} else {
					if($input[0] >$GLOBALS['__YEAR_ARRAY__'][$input[1]] || $input[0] < 1){
						return array('result' => FALSE, 'msg' => __INAVLID_BOD_DAY__, 'inputname' => __DAY_INPUT_NAME__);
					}
				}
				return array('result' => TRUE, 'value' => array('day' => $input[0], 'month' => $input[1], 'year' => $input[2]));
			} 
		}
		/*
		
		else 

		if($type == 'image'){
			if(empty(trim($input['name']))){
				return array('result' => FALSE, 'msg' => __NO_FILE__);
			}
      $file_name = $input['name'];
      $file_size = $input['size'];
      $file_tmp = $input['tmp_name'];
      $file_type = $input['type'];
      $file_ext = strtolower(@end(@explode('.',$input['name'])));
      if(!in_array($file_ext, $GLOBALS['expensions'])){
         return array('result' => FALSE, 'msg' => __INVALID_IMAGE_EXTENSION__);
      }
      if($file_size > __MAX_IMAGE_SIZE__){
        return array('result' => FALSE, 'msg' => __INVALID_IMAGE_SIZE__);
      }
		}

		*/

		/* do in javascript using Jquery is easier to you and user ^_^ */
		/*
			// HTML ->> <input type="file" id="myFile">
			$('#myFile').bind('change', function() {
        var file = this.files[0];
        var fileType = file["type"];
        var fileSize = file["size"];
        var ValidImageTypes = ["image/jpeg", "image/png"];
        if ($.inArray(fileType, ValidImageTypes) && fileSize < 2097152) {
        	// if ok code here
        } else {
					// if false code here
        }
     	});

		*/
		

		
	}


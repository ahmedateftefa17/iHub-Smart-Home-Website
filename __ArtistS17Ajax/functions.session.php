<?php
	
	session_start();

	function setSession($session_names_values_array){
		if(!is_array($session_names_values_array)){
			throw new Exception(
				"->>> Invalid Argument MUST be an (( array )) <<<-"
			);
		}
		if(isset($session_names_values_array[0])){
			throw new Exception(
				"->>> Invalid Argument MUST be an (( array as key(session_name) => value(session_value) )) <<<-"
			);	
		}
		foreach ($session_names_values_array as $session_name => $session_value) {
			$_SESSION[$session_name] = $session_value;
		}
	}

	function checkSession($session_name){
		if(isset($_SESSION[$session_name])){
			return TRUE;
		} else {
			return FALSE;
		}
	}

	function getSession($session_name){
		if(isset($_SESSION[$session_name])){
			return $_SESSION[$session_name];
		} else {
			return NULL;
		}
	}

	function unsetSession($session_name){
		if(isset($_SESSION[$session_name])){
			unset($_SESSION[$session_name]);
		}
	}

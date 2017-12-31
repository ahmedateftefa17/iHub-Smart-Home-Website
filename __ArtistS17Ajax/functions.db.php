<?php

	$server_name = "localhost";
	//$server_username = "u841311189_tst";
	//$server_password = "yIZ4xG54OWKJW9";
	$server_username = "root";
	$server_password = "";
	$database_name = "u841311189_tst";

	// function to run sql(Insert, Update, Delete) --> With NO returned Data
	function postQuery($sql_commond_line){
		$trim_sql = trim($sql_commond_line);
		if(empty($trim_sql)){
			throw new Exception("--->>>>>Empty query!!<<<<<---");
		}
		$conn = mysqli_connect($GLOBALS['server_name'], $GLOBALS['server_username'], $GLOBALS['server_password'], $GLOBALS['database_name']);
		$result = mysqli_query($conn, $sql_commond_line);
		if($result === TRUE){
			mysqli_close($conn);
			return TRUE;
		} else {
			mysqli_close($conn);
			return FALSE;
		}
	}

	// function to run sql(Select) --> With returned Data
	function getQuery($sql_commond_line){
		$trim_sql = trim($sql_commond_line);
		if(empty($trim_sql)){
			throw new Exception("--->>>>>Empty query!!<<<<<---");
		}
		$conn = mysqli_connect($GLOBALS['server_name'], $GLOBALS['server_username'], $GLOBALS['server_password'], $GLOBALS['database_name']);
		$result = mysqli_query($conn, $sql_commond_line);
		if($result == false){
			mysqli_close($conn);
			return NULL;
		} else if($result->num_rows > 0){
			$return = array();
			while($row = $result->fetch_assoc()){
				$return[] = $row;
			}
			mysqli_close($conn);
			return $return;
		} else {
			mysqli_close($conn);
			return NULL;
		}
	}

	// function Select Table from db
	function getTable($table){
		$result = getQuery("SELECT * FROM `$table`");
		return $result;
	}

	// function Select specific
	function getColumns($columns, $table, $id, $column_name = 'id'){
		if(!is_array($columns)){
			throw new Exception("1st argument MUST be an array.");
		} else {
			$return = array();
			foreach($columns as $column){
				$result = getQuery("SELECT `$column` FROM `$table` WHERE `$column_name` = '$id' ORDER BY `$column_name` ASC");
				$return[$column] = $result;
			}
			if(count($return) == 0){
				return NULL;
			} else {
				return $return;
			}
		}
	}

	// function Select specific
	function getQueryMulti($table, $value, $columns){
		if(!is_array($columns)){
			throw new Exception("3rd argument MUST be an array.");
		} else {
			foreach($columns as $column){
				$result = getQuery("SELECT * FROM `$table` WHERE `$column` LIKE '$value' ORDER BY `$column` ASC");
				if($result !== NULL){
					return $result;
				}
			}
			foreach($columns as $column){
				$result = getQuery("SELECT * FROM `$table` WHERE `$column` LIKE '$value%' ORDER BY `$column` ASC");
				if($result !== NULL){
					return $result;
				}
			}
			/*
			foreach($columns as $column){
				$result = getQuery("SELECT * FROM `$table` WHERE `$column` LIKE '%$value' ORDER BY `$column` ASC");
				if($result !== NULL){
					return $result;
				}
			}
			foreach($columns as $column){
				$result = getQuery("SELECT * FROM `$table` WHERE `$column` LIKE '%$value%' ORDER BY `$column` ASC");
				if($result !== NULL){
					return $result;
				}
			}
			*/
			return NULL;
		}
	}

	// function to test exist of an id in table
	function id_exists($table, $value, $column_name = "id"){
		$result = getQuery("SELECT `$column_name` FROM `$table` WHERE `$column_name` = '$value'");
		if($result === NULL){
			return FALSE;
		} else {
			return TRUE;
		}
	}

	function find($table, $value, $column_name = "id"){
		return getQuery("SELECT * FROM `$table` WHERE `$column_name` = '$value'");
	}

	// Count visitors
	function visit(){
		$sql = "CREATE TABLE IF NOT EXISTS `visitors` (
			`counter` int(6) NOT NULL AUTO_INCREMENT PRIMARY KEY,
			`IP_Of_Visitor` varchar(50) NOT NULL,
			`Time_Of_Visit` varchar(15) NOT NULL,
			`Date_Of_Visit` varchar(50) NOT NULL
			) ENGINE=InnoDB DEFAULT CHARSET=utf8;
		";
		postQuery($sql);
		$IP_Of_Visitor = $_SERVER['REMOTE_ADDR'];
	 	$sql = "SELECT * FROM `visitors` WHERE `IP_Of_Visitor`='$IP_Of_Visitor'";
		$visitors = getQuery($sql);
		if($visitors !== NULL){
			$time = time();
			$date = date('h:i:sA - D - d/m/Y');
			$sql = "UPDATE `visitors` SET `Time_Of_Visit`='$time', `Date_Of_Visit`='$date' WHERE `IP_Of_Visitor`='$IP_Of_Visitor'";
			postQuery($sql);
		} else {
			$time = time();
			$date = date('h:i:sA - D - d/m/Y');
			$sql = "INSERT INTO `visitors` (`IP_Of_Visitor`, `Time_Of_Visit`, `Date_Of_Visit`) VALUES ('$IP_Of_Visitor' ,'$time', '$date')";
			postQuery($sql);
		}
	}
	visit();

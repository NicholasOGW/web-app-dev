<?php
define('DB_SERVER', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'uecs2094_assignment');

function initdb(){

	$conn = new mysqli(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME);

	if($conn->connect_error){
		die("Connection failed: " . $conn->connect_error);
	}
	return $conn;
}
?>
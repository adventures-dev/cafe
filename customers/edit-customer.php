<?php

	session_start();
	$user = $_SESSION['user'];
	
	include("../scripts/dbconnect.php");
	$id = $_POST['id'];

	$name = $_POST['name'];
	$company = $_POST['company'];
	$date_updated = date("Y-m-d H:i:s");
	
	
	mysql_query("UPDATE customers SET name = '".mysql_real_escape_string($name)."', company = '$company', date_updated = '$date_updated' WHERE id = '$id'")or die(mysql_error());
	
	
	
	echo true;
	

?>
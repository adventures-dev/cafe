<?php

	session_start();
	$user = $_SESSION['user'];
	
	include("../scripts/dbconnect.php");
	
	$name = $_POST['name'];
	$company = $_POST['company'];
	$date_created = date("Y-m-d H:i:s");
	$date_updated = date("Y-m-d H:i:s");
	
	mysql_query("INSERT INTO customers (name, company, date_created, date_updated, created_by) VALUES ('".mysql_real_escape_string($name)."','$company', '$date_created', '$date_updated', '$user')")or die(mysql_error());
	
	echo true;
	

?>
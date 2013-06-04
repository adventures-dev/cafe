<?php

	session_start();
	$user = $_SESSION['user'];
	
	include("../scripts/dbconnect.php");
	
	$title = $_POST['title'];
	$description = $_POST['description'];
	$price = $_POST['price'];
	$date_created = date("Y-m-d H:i:s");
	$date_updated = date("Y-m-d H:i:s");
	
	mysql_query("INSERT INTO items (title, description, price, date_created, date_updated, created_by) VALUES ('".mysql_real_escape_string($title)."','".mysql_real_escape_string($description)."','$price', '$date_created', '$date_updated', '$user')")or die(mysql_error());
	
	echo true;
	

?>
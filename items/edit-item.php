<?php

	session_start();
	$user = $_SESSION['user'];
	
	include("../scripts/dbconnect.php");
	$id = $_POST['id'];

	$title = $_POST['title'];
	$description = $_POST['description'];
	$price = $_POST['price'];
	$date_updated = date("Y-m-d H:i:s");
	
	
	mysql_query("UPDATE items SET title = '".mysql_real_escape_string($title)."', description = '".mysql_real_escape_string($description)."', price = '$price', date_updated = '$date_updated' WHERE id = '$id'")or die(mysql_error());
	
	
	
	echo true;
	

?>
<?php
	
	include("../scripts/dbconnect.php");
	$id = $_POST['id'];

	$title = $_POST['title'];
	$date_updated = date("Y-m-d H:i:s");
	
	
	mysql_query("UPDATE companies SET title = '".mysql_real_escape_string($title)."', date_updated = '$date_updated' WHERE id = '$id'")or die(mysql_error());
	
	echo true;
	

?>
<?php


	
	include("../scripts/dbconnect.php");
	$id = $_POST['id'];


	mysql_query("DELETE FROM companies WHERE id = '$id'")or die(mysql_error());
	
	
	
	echo true;
	

?>
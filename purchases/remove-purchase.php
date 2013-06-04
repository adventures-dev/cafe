<?php

	include("../scripts/dbconnect.php");
	$id = $_POST['purchase'];


	mysql_query("DELETE FROM purchases WHERE id = '$id'")or die(mysql_error());
	
	
	
	echo true;
	

?>
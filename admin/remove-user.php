<?php

session_start();

$user = $_SESSION['user'];

include("../scripts/dbconnect.php");
$id = $_POST['id'];

if($id != $user ){
	
	
mysql_query("DELETE FROM users WHERE id = '$id'")or die(mysql_error());


	echo true;

	
}else{
	echo false;
}



?>
<?php
	session_start();
	include("../scripts/dbconnect.php");
	
	$shopping_cart = $_SESSION['cart'];
	
	$customer = $_POST['customer'];
	$company = $_POST['company'];
	
	$date_created = date('Y-m-d H:i:s');
	
	for($i = 0; $i<count($shopping_cart); $i++){
		
		$item = $shopping_cart[$i]['id'];
		
		if($customer == "Guest"){
			
			mysql_query("INSERT INTO purchases (company, item, date_created) VALUES ('$company', '$item', '$date_created')")or die(mysql_error());
			
			
		}else{
			mysql_query("INSERT INTO purchases (customer, item, date_created) VALUES ('$customer', '$item', '$date_created')")or die(mysql_error());

			
		}
		
		
	}
	
	
	
	session_destroy();

	echo true;

?>
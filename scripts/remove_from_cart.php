<?php

	session_start();
	
	$item = $_POST['item'];

	$shopping_cart = $_SESSION['cart'];
	$found = false;
	
	
	for($i = 0; $i<count($shopping_cart); $i++){
		
		if($shopping_cart[$i]['id'] == $item && $found != true){
			
			$found = true;
			unset($shopping_cart[$i]);
			$shopping_cart= array_values($shopping_cart);
		}
		
	}
	
	$_SESSION['cart'] = $shopping_cart;
	
	echo count($shopping_cart);

?>
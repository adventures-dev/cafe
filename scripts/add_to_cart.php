<?php

	session_start();
	
	$array = array();
	$array['id'] = $_POST['item'];
	$array['title'] = $_POST['title'];
	$array['price'] = $_POST['price'];
	
	$shopping_cart = $_SESSION['cart'];
	
	$shopping_cart[] = $array;
	
	$_SESSION['cart'] = $shopping_cart;
	
	echo count($shopping_cart);

?>
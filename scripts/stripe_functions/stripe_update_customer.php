<?php
include('../config.php');

$stripe_id = $_POST['stripe_id'];

//add or remove variables based on what you what to update
$card = $_POST['stripeToken'];
$eamil = $_POST['email'];

$url = 'https://api.stripe.com/v1/customers/'.$stripe_id;
$ch = curl_init();

//set the url, number of POST vars, POST data
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Bearer '.$secret_key));
curl_setopt($ch,CURLOPT_URL, $url);
curl_setopt($ch,CURLOPT_POST, true);	
curl_setopt($ch,CURLOPT_POSTFIELDS, "card=".$card."&email=".$email);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

//execute post
$result = curl_exec($ch);
//close connection
curl_close($ch);

echo true;
?>

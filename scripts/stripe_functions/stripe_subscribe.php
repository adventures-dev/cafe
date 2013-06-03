<?php
include('../config.php');

$card = $_POST['stripeToken'];
$plan = $_POST['plan'];
$email = $_POST['email'];

$url = 'https://api.stripe.com/v1/customers';

$ch = curl_init(); 

//set the url, number of POST vars, POST data
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Bearer '.$secret_key));
curl_setopt($ch,CURLOPT_URL, $url);
curl_setopt($ch,CURLOPT_POST, true);	
curl_setopt($ch,CURLOPT_POSTFIELDS, "card=".$card."&email=".$email."&plan=".$plan);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

//execute post
$result = curl_exec($ch);

///get stripe id
$result = json_decode($result, true);
$stripe_id = $result['id'];

//close connection
curl_close($ch);

///insert database update here using $stripe_id


echo true;

?>
<?php
include('../config.php');

$stripe_id = $_POST['stripe_id'];
$plan = $_POST['plan'];

$url = 'https://api.stripe.com/v1/customers/'.$stripe_id.'/subscription';
$ch = curl_init();

//set the url, number of POST vars, POST data
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Bearer '.$secret_key));
curl_setopt($ch,CURLOPT_URL, $url);
curl_setopt($ch,CURLOPT_POST, true);	
curl_setopt($ch,CURLOPT_POSTFIELDS, "plan=".$plan);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

//execute post
$result = curl_exec($ch);
//close connection
curl_close($ch);

///insert database update here


echo true;


?>
<?php
include("../scripts/dbconnect.php");

//include post varibles here 
$number = $_POST['number'];
$date_one = $_POST['date_one'];
$date_two = $_POST['date_two']; 
$limitnumber = 25; //edit limitnumber if you wish to load more


$data = mysql_query("SELECT purchases.id, purchases.date_created, customers.name AS customer, items.title AS item, items.price AS price FROM purchases JOIN customers ON customers.id = purchases.customer JOIN items ON items.id = purchases.item WHERE purchases.date_created BETWEEN '$date_one' AND '$date_two' UNION ALL SELECT purchases.id, purchases.date_created, companies.title AS customer, items.title AS item, items.price AS price FROM purchases JOIN companies ON companies.id = purchases.company JOIN items ON items.id = purchases.item WHERE purchases.date_created BETWEEN '$date_one' AND '$date_two' ORDER BY date_created DESC  LIMIT " . $number . ", $limitnumber")or die(mysql_error());


$array = array();
while ($row = mysql_fetch_array($data)) {
    $array[] = $row;
}

if (count($array) == 0) {
    echo false;
}

$js_array = json_encode($array);
echo $js_array;


?>
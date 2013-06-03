<?php
session_start();
include('../scripts/dbconnect.php');

$username  = $_POST['username'];
$password  = $_POST['password'];




if ($username && $password) {
	$username = strtolower($username);

	$query = mysql_query("SELECT * FROM users WHERE username = '$username'") or die(mysql_error());

	$numrows = mysql_num_rows($query);

	if ($numrows != 0) {

		$error = "Username already taken";
		echo $error;
	} else {
			$salt     = sha1(md5($password));
			$password = md5($password . $salt);

			$data = mysql_query("INSERT INTO users (username, password)
                VALUES ('$username','$password')") or die(mysql_error());

			echo true;
		

	}
} else {
	$error = "Please enter all information";
	echo $error;
}



?>

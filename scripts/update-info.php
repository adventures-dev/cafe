<?php
session_start();
include('dbconnect.php');

$id = $_SESSION['user'];

$data = mysql_query("SELECT username FROM users WHERE id = '$id'")or die(mysql_error());
while($info = mysql_fetch_array($data)){
	$oldusername = $info['username'];
}

$username = $_POST['username'];

$newpassword = $_POST['newpassword'];
$oldpassword = $_POST['oldpassword'];

if ($oldpassword) {
	$username = strtolower($username);
	$query = mysql_query("SELECT * FROM users WHERE username = '$oldusername'") or die(mysql_error());

	$numrows = mysql_num_rows($query);

	if ($numrows != 0) {
		//code to login
		while ($row = mysql_fetch_assoc($query)) {
			$dbusername = $row['username'];
			$dbpassword = $row['password'];
		}

		$salt        = sha1(md5($oldpassword));
		$oldpassword = md5($oldpassword . $salt);
		//check to see if they match!
		if ($oldusername == $dbusername && $oldpassword == $dbpassword) {

			if ($_POST['newpassword']) {
				$newsalt     = sha1(md5($newpassword));
				$newpassword = md5($newpassword . $newsalt);

				mysql_query("UPDATE users SET password = '" . mysql_real_escape_string($newpassword) . "' WHERE username = '$oldusername'") or die(mysql_error());


			}


			if ($_POST['username']) {
				$query = mysql_query("SELECT * FROM users WHERE username = '$username'") or die(mysql_error());

				$numrows = mysql_num_rows($query);

				if ($numrows != 0) {
					die("Username not available.");
				} else {
					mysql_query("UPDATE users SET username = '" . mysql_real_escape_string($username) . "' WHERE username = '$oldusername'") or die(mysql_error());

					$_SESSION['username'] = $username;

				}
			}
			echo true;

		} else {
			$error = "Incorrect password!";
			echo $error;
		}
	} else {
		$error = "That user doesn't exist!";
		echo $error;
	}
} else{

		$error = "Please enter a vaild password";
		echo $error;

}


?>

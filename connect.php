<?php
session_start();
$serverName = "db";
$userName = "MYSQL_USER";
$userPassword = "MYSQL_PASSWORD";
$dbName = "MYSQL_DATABASE";
$conn = mysqli_connect($serverName, $userName, $userPassword, $dbName) or die("Failed to connec to databse :" . mysqli_error($objCon));
if (mysqli_connect_errno()) {
	echo "Database Connect Failed : " . mysqli_connect_error();
	exit();
}
mysqli_query($conn, "SET NAMES 'utf8' ");
?>
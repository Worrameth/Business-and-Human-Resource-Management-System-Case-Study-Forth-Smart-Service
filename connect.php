<?php
session_start();
$serverName = "localhost";
$userName = "root";
$userPassword = "";
$dbName = "testweb";
$conn = mysqli_connect($serverName,$userName,$userPassword,$dbName) or die("Failed to connec to databse :" . mysqli_error($objCon));
if (mysqli_connect_errno())
	{
		echo "Database Connect Failed : " . mysqli_connect_error();
		exit();
	}
mysqli_query($conn, "SET NAMES 'utf8' ");
?>

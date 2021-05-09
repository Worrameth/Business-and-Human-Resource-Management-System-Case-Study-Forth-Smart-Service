<?php
session_start();
$serverName = "localhost";
$userName = "root";
$userPassword = "";
$dbName = "testweb";
$objCon = mysqli_connect($serverName,$userName,$userPassword,$dbName) or die("Error: " . mysqli_error($objCon));
mysqli_query($objCon, "SET NAMES 'utf8' ");

?>

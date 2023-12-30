<?php
// session_start();

require_once("connect.php");

$stremp_username = mysqli_real_escape_string($conn, $_POST['username']);
$stremp_userpass = mysqli_real_escape_string($conn, $_POST['password']);

$strSQL = "SELECT employee.username, employee.phone, department.departmentName, employee.role FROM employee 
	LEFT JOIN department ON employee.departmentId = department.departmentId WHERE username = '" . $stremp_username . "' AND password = '" . $stremp_userpass . "'";
$objQuery = mysqli_query($conn, $strSQL);
$objResult = mysqli_fetch_array($objQuery);
if (!$objResult) {
	echo "<script language=\"JavaScript\">";
	echo "alert('ชื่อผู้ใช้และรหัสผ่านของคุณไม่ถูกต้อง กรุณาลองใหม่อีกครั้ง');window.location='index.php'";
	echo "</script>";
} else {
	$_SESSION["username"] = $objResult["username"];
	$_SESSION["phone"] = $objResult["phone"];
	$_SESSION["departmentName"] = $objResult["departmentName"];
	if ($objResult["role"] == "HR") {
		header("location:HR/index.php");
	} elseif ($objResult["role"] == "Manager") {
		header("location:Manager/index.php");
	} else {
		header("location:Employee/index.php");
	}
}
mysqli_close($con);
?>
<?php
	// session_start();

	require_once("connect.php");
	
	$stremp_username = mysqli_real_escape_string($conn,$_POST['username']);
	$stremp_userpass = mysqli_real_escape_string($conn,$_POST['password']);

	$strSQL = "SELECT * FROM employee WHERE username = '".$stremp_username."' AND password = '".$stremp_userpass."'";
	$objQuery = mysqli_query($conn,$strSQL);
	$objResult = mysqli_fetch_array($objQuery);
	if(!$objResult)
	{
		echo "<script language=\"JavaScript\">";
		echo "alert('ชื่อผู้ใช้และรหัสผ่านของคุณไม่ถูกต้อง กรุณาลองใหม่อีกครั้ง');window.location='index.php'";
		echo "</script>";
	}
	else
	{
			$_SESSION["username"] = $objResult["username"];
			$_SESSION["phone"] = $objResult["phone"];
			$_SESSION["department"] = $objResult["department"];
			if($objResult["role"] == "Admin")
			{
				header("location:Admin/employee.php");
			}
			elseif($objResult["role"] == "HR")
			{
				header("location:HR/employee.php");
			}
			elseif($objResult["role"] == "Manager")
			{
				header("location:Manager/index.php");
			}else {
				header("location:Employee/index.php");
			}
	}
	mysqli_close($con);
?>
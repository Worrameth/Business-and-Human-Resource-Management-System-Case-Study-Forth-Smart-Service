<?php
include('connect.php');
    $username = $_REQUEST["username"];
    $name = $_REQUEST["name"];
		$password = $_REQUEST["password"];
		$department = $_REQUEST["department"];
    $email = $_REQUEST["email"];
		$phone = $_REQUEST["phone"];
		//$status = $_POST["status"];

	
	//เพิ่มเข้าไปในฐานข้อมูล
	$sql = "INSERT INTO employee(username,name,password,department,email,phone)
			 VALUES('$username','$name','$password','$department','$email','$phone')";



	$result = mysqli_query($objCon, $sql) or die ("Error in query: $sql " . mysqli_error());
	
	//ปิดการเชื่อมต่อ database
	mysqli_close($objCon);
	//จาวาสคริปแสดงข้อความเมื่อบันทึกเสร็จและกระโดดกลับไปหน้าฟอร์ม
	
	if($result){
	echo "<script type='text/javascript'>";
	echo "alert('Register Succesfuly');";
	echo "window.location = 'employee.php'; ";
	echo "</script>";
	
	}
	else{
	echo "<script type='text/javascript'>";
	echo "alert('Error back to register again');";
	echo "</script>";
}
?>
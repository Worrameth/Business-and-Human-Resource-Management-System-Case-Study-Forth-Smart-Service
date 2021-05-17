<?php
include('../connect.php');
    $username = $_REQUEST["username"];
    $name = $_REQUEST["name"];
		$password = $_REQUEST["password"];
		$departmentName = $_REQUEST["departmentName"];
    $email = $_REQUEST["email"];
		$phone = $_REQUEST["phone"];
		//$role = $_POST["role"];
	
	//เพิ่มเข้าไปในฐานข้อมูล
	$sql = "INSERT INTO employee(username,name,password,departmentName,email,phone)
			 VALUES('$username','$name','$password','$departmentName','$email','$phone')";



	$result = mysqli_query($conn, $sql);
	
	//ปิดการเชื่อมต่อ database
	mysqli_close($conn);
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
	echo "window.location = 'register.php'; ";
	echo "</script>";
}
?>
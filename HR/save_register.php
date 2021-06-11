<?php
include('../connect.php');
    $username = $_REQUEST["username"];
    $name = $_REQUEST["name"];
		$password = $_REQUEST["password"];
		$departmentId = $_REQUEST["departmentId"];
    $email = $_REQUEST["email"];
		$phone = $_REQUEST["phone"];
		$role = $_POST["role"];
	
	//เพิ่มเข้าไปในฐานข้อมูล
	$sql = "INSERT INTO employee(username,name,password,departmentId,email,phone,role)
			 VALUES('$username','$name','$password','$departmentId','$email','$phone','$role')";



	$result = mysqli_query($conn, $sql) or die ("Error in query: $sql " . mysqli_error());
	
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
	echo "</script>";
}
?>
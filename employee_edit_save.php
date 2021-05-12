<?php
include_once 'connect.php';
$id = $_GET["id"];
$res = mysqli_query($conn, "select * from employee where userid = '$id'");
while ($_REQUEST = mysqli_fetch_array($res)) {
  $username = $_REQUEST["username"];
  $name = $_REQUEST["name"];
  $password = $_REQUEST["password"];
  $department = $_REQUEST["departmentId"];
  $email = $_REQUEST["email"];
  $phone = $_REQUEST["phone"];
}
if (isset($_POST["save"])) {
  $sql = "UPDATE employee SET password='$_POST[password]', name = '$_POST[name]', departmentId = '$_POST[departmentId]', phone = '$_POST[phone]', email = '$_POST[email]' WHERE userid = $id";
  $result = mysqli_query($conn, $sql) or die ("Error in query: $sql " . mysqli_error());
	
	//ปิดการเชื่อมต่อ database
	mysqli_close($objCon);
	//จาวาสคริปแสดงข้อความเมื่อบันทึกเสร็จและกระโดดกลับไปหน้าฟอร์ม
	
	if($result){
	echo "<script type='text/javascript'>";
	echo "alert('Edit Succesfuly');";
	echo "window.location = 'employee.php'; ";
	echo "</script>";
	
	}
	else{
	echo "<script type='text/javascript'>";
	echo "alert('Error back to edit again');";
  echo "Error: " . $sql . " " . mysqli_error($objCon);
	echo "</script>";
  }
}
?>
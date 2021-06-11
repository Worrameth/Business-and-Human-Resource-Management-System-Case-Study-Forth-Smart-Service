<?php
include_once '../connect.php';
$id = $_GET["id"];
$res = mysqli_query($conn, "SELECT userid,username,name,password,depart.departmentName,phone,email,role,depart.departmentId FROM employee AS emp INNER JOIN department as depart ON emp.departmentId = depart.departmentId WHERE emp.userid = '$id'");
while ($_REQUEST = mysqli_fetch_array($res)) {
  $username = $_REQUEST["username"];
  $name = $_REQUEST["name"];
  $password = $_REQUEST["password"];
  $departmentId = $_REQUEST["departmentId"];
	$departmentName = $_REQUEST["departmentName"];
  $email = $_REQUEST["email"];
  $phone = $_REQUEST["phone"];
	$role = $_REQUEST["role"];
}
if (isset($_POST["save"])) {
  $sql = "UPDATE employee SET password='$_POST[password]', name = '$_POST[name]', departmentId = '$_POST[departmentId]', phone = '$_POST[phone]', role = '$_POST[role]', email = '$_POST[email]' WHERE userid = $id";
  $result = mysqli_query($conn, $sql) or die ("Error in query: $sql " . mysqli_error());
	
	//ปิดการเชื่อมต่อ database
	mysqli_close($conn);
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
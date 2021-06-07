<?php
include('../connect.php');
$strSQL = "SELECT * FROM employee WHERE username = '".$_SESSION["username"]."'";
$objQuery = mysqli_query($conn,$strSQL);
$objResult = mysqli_fetch_array($objQuery);
if(!$objResult)
	{
		echo "<script language=\"JavaScript\">";
		echo "alert('กรุณาเข้าสู่ระบบ');window.location='../index.php'";
		echo "</script>";
	}
	$userid = $objResult["userid"];
  $leaveTypeId = $_REQUEST["leaveTypeId"];
  $leave_from = $_REQUEST["leave_from"];
  $leave_to = $_REQUEST["leave_to"];
  $leave_description = $_REQUEST["leave_description"];
	
	//เพิ่มเข้าไปในฐานข้อมูล
	$sql = "INSERT INTO leave_main(userId,leaveTypeId,leave_from,leave_to,leave_description,leaveStatusId)
			 VALUES($userid,$leaveTypeId,'$leave_from','$leave_to','$leave_description',1)";



	$result = mysqli_query($conn, $sql) or die ("Error in query: $sql " . mysqli_error());
	
	//ปิดการเชื่อมต่อ database
	mysqli_close($conn);
	//จาวาสคริปแสดงข้อความเมื่อบันทึกเสร็จและกระโดดกลับไปหน้าฟอร์ม
	
	if($result){
	echo "<script type='text/javascript'>";
	echo "alert('แจ้งข้อมูลการลาเสร็จสิ้น');";
	echo "window.location = 'show_leave.php'; ";
	echo "</script>";
	
	}
	else{
	echo "<script type='text/javascript'>";
	echo "alert('Error back to register again');";
	echo "</script>";
}
?>
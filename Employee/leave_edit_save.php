<?php
include_once '../connect.php';
$id = $_GET["id"];
$res = mysqli_query($conn, "SELECT leaveId, employee.userId, employee.username, leave_type.leaveTypeName, leave_type.leaveTypeId, leave_from, leave_to, leave_description, leave_status.leaveStatusName, leave_status.leaveStatusId  FROM leave_main INNER JOIN leave_type ON leave_main.leaveTypeId = leave_type.leaveTypeId INNER JOIN employee ON leave_main.userId = employee.userid INNER JOIN leave_status ON leave_main.leaveStatusId = leave_status.LeaveStatusId WHERE leaveId = $id");
while ($_REQUEST = mysqli_fetch_array($res)) {
  $leaveId = $_REQUEST["leaveId"];
  $username = $_REQUEST["username"];
  $userId = $_REQUEST["userId"];
  $leaveTypeName = $_REQUEST["leaveTypeName"];
  $leaveTypeId = $_REQUEST["leaveTypeId"];
  $leave_from = $_REQUEST["leave_from"];
  $leave_to = $_REQUEST["leave_to"];
	$leave_description = $_REQUEST["leave_description"];
  $leaveStatusName = $_REQUEST["leaveStatusName"];
  $leaveStatusId = $_REQUEST["leaveStatusId"];
}
if (isset($_POST["save"])) {
  $sql = "UPDATE leave_main SET leaveTypeId = $_POST[leaveTypeId], leave_from = '$_POST[leave_from]', leave_to = '$_POST[leave_to]', leave_description = '$_POST[leave_description]', leaveStatusId = $_POST[leaveStatusId] WHERE leaveId = $id";
  $result = mysqli_query($conn, $sql) or die ("Error in query: $sql " . mysqli_error());
	
	//ปิดการเชื่อมต่อ database
	mysqli_close($conn);
	//จาวาสคริปแสดงข้อความเมื่อบันทึกเสร็จและกระโดดกลับไปหน้าฟอร์ม
	
	if($result){
		echo "<script type='text/javascript'>";
		echo "alert('Edit Succesfuly');";
		echo "window.location = 'show_leave.php'; ";
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
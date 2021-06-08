<?php
include_once '../connect.php';
$borrowId = $_GET["id"];
$res = mysqli_query($conn, "SELECT borrowId, employee.name, department.departmentName,borrowItem,date_format(borrow_date, '%d/%m/%Y') As borrow_date, date_format(return_date, '%d/%m/%Y') As return_date, tool_status.toolStatusName, tool_status.toolStatusId  FROM borrow INNER JOIN employee ON borrow.userId = employee.userid INNER JOIN department ON borrow.departmentId = department.departmentId INNER JOIN tool_status ON borrow.toolStatusId = tool_status.toolStatusId WHERE borrowId = '$borrowId'");
while ($_REQUEST = mysqli_fetch_array($res)) {
  $borrowId = $_REQUEST["borrowId"];
  $name = $_REQUEST["name"];
  $departmentName = $_REQUEST["departmentName"];
  $borrowItem = $_REQUEST["borrowItem"];
	$borrow_date = $_REQUEST["borrow_date"];
  $return_date = $_REQUEST["return_date"];
  $toolStatusId = $_REQUEST["toolStatusId"];
  $toolStatusName = $_REQUEST["toolStatusName"];
}
if (isset($_POST["save"])) {
  $sql = "UPDATE borrow SET toolStatusId = $_POST[toolStatusId] WHERE borrowId = $borrowId";
  $result = mysqli_query($conn, $sql) or die ("Error in query: $sql " . mysqli_error());

	$upsql = "UPDATE air_card SET toolStatusId = 1 WHERE acId = '$borrowItem'";
  $result2 = mysqli_query($conn, $upsql);

  $upsql = "UPDATE headphones SET toolStatusId = 1 WHERE hpId = '$borrowItem'";
  $result2 = mysqli_query($conn, $upsql);

  $upsql = "UPDATE wireless SET toolStatusId = 1 WHERE wrId = '$borrowItem'";
  $result2 = mysqli_query($conn, $upsql);
	//ปิดการเชื่อมต่อ database
	mysqli_close($conn);
	//จาวาสคริปแสดงข้อความเมื่อบันทึกเสร็จและกระโดดกลับไปหน้าฟอร์ม
	
	if($result){
		echo "<script type='text/javascript'>";
		echo "alert('แก้ไขการยืมเสร็จสิ้น');";
		echo "window.location = 'borrow.php'; ";
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
<?php
include_once '../connect.php';
$acId = $_GET['id'];
$res = mysqli_query($conn, "SELECT acId, tool_status.toolStatusName, tool_status.toolStatusId FROM air_card INNER JOIN tool_status ON air_card.toolStatusId = tool_status.toolStatusId WHERE acId = '$acId'");
while ($_REQUEST = mysqli_fetch_array($res)) {
  $acId = $_REQUEST["acId"];
  $toolStatusId = $_REQUEST["toolStatusId"];
  $toolStatusName = $_REQUEST["toolStatusName"];
}
$empSQL = mysqli_query($conn,"SELECT * FROM employee WHERE username = '".$_SESSION["username"]."'");
while ($_REQUEST = mysqli_fetch_array($empSQL)) {
		$userid = $_REQUEST["userid"];
		$departmentId = $_REQUEST["departmentId"];
}
$borrow_date = $_POST['borrow_date'];
$return_date = $_POST['return_date'];

if (isset($_POST["save"])) {
  $sql = "INSERT INTO borrow(userId,departmentId,borrowItem,borrow_date,return_date,toolStatusId)
			 VALUES($userid,$departmentId,'$acId','$borrow_date','$return_date',2)";
  $result = mysqli_query($conn, $sql) or die ("Error in query: $sql " . mysqli_error());

  $upsql = "UPDATE air_card SET toolStatusId = 2 WHERE acId = $acId";
  $result2 = mysqli_query($conn, $upsql) or die ("Error in query: $upsql " . mysqli_error());
	
	//ปิดการเชื่อมต่อ database
	mysqli_close($conn);
	//จาวาสคริปแสดงข้อความเมื่อบันทึกเสร็จและกระโดดกลับไปหน้าฟอร์ม
	
	if($result){
		echo "<script type='text/javascript'>";
		echo "alert('ยืมอุปกรณ์เสร็จสิ้น');";
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
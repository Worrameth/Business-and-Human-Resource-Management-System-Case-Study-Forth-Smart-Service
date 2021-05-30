<?php
include_once '../connect.php';
$id = $_GET["id"];
$res = mysqli_query($conn, "SELECT * FROM news WHERE newsId = '$id'");
while ($_REQUEST = mysqli_fetch_array($res)) {
  $headline = $_REQUEST["headline"];
  $image = $_REQUEST["image"];
  $filename = $_REQUEST["filename"];
}
if (isset($_POST["save"])) {
  $sql = "UPDATE news SET headline='$_POST[headline]', image = '$_POST[image]', filename = '$_POST[filename]', upload_time = Now() WHERE newsId = $id";
  $result = mysqli_query($conn, $sql) or die ("Error in query: $sql " . mysqli_error());
	
	//ปิดการเชื่อมต่อ database
	mysqli_close($conn);
	//จาวาสคริปแสดงข้อความเมื่อบันทึกเสร็จและกระโดดกลับไปหน้าฟอร์ม
	
	if($result){
		echo "<script type='text/javascript'>";
		echo "alert('Edit Succesfuly');";
		echo "window.location = 'news.php'; ";
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
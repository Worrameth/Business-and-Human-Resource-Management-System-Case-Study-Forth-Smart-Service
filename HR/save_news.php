<?php
include('../connect.php');
$statusMsg = '';
$headline = $_REQUEST["headline"];
$targetDir = "uploads/";
$image = basename($_FILES["image"]["name"]);
$fileName = basename($_FILES["filename"]["name"]);
$targetFilePath = $targetDir . $fileName;
$targetImgPath = $targetDir . $image;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
$ImgType = pathinfo($targetImgPath,PATHINFO_EXTENSION);
$allowed = array('pdf', 'png', 'jpg');
if (!in_array($fileType, $allowed) && !in_array($ImgType, $allowed)) {
  echo "<script type='text/javascript'>";
	echo "alert('Wrong Type File To Insert');";
	echo "</script>";
}else{
  move_uploaded_file($_FILES["filename"]["tmp_name"], $targetFilePath);
  move_uploaded_file($_FILES["image"]["tmp_name"], $targetImgPath);
  $sql = "INSERT INTO news(headline,image,filename,upload_time) VALUES('$headline','$image','$fileName',Now())";
  $result = mysqli_query($conn, $sql) or die ("Error in query: $sql " . mysqli_error());
}
	//ปิดการเชื่อมต่อ database
	mysqli_close($conn);
	//จาวาสคริปแสดงข้อความเมื่อบันทึกเสร็จและกระโดดกลับไปหน้าฟอร์ม
	
	if($result){
	echo "<script type='text/javascript'>";
	echo "alert('Register Succesfuly');";
	echo "window.location = 'news.php'; ";
	echo "</script>";
	}
	else{
	echo "<script type='text/javascript'>";
	echo "alert('Error back to register again');";
	echo "</script>";
  }
?>
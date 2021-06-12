<?php
include_once 'news_edit_save.php';
$id = $_GET["id"];
$res = mysqli_query($conn, "SELECT * FROM news WHERE newsId = '$id'");
while ($_REQUEST = mysqli_fetch_array($res)) {
  $headline = $_REQUEST["headline"];
  $image = $_REQUEST["image"];
  $filename = $_REQUEST["filename"];
}
?>
<!DOCTYPE html>
<html lang="en"><!-- Basic -->
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="//cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" rel="stylesheet"/>   
   
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
   
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">    
	  <!-- Site CSS -->
    <link rel="stylesheet" href="../css/styleindex.css">    
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="../css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../css/custom.css">
</head>

<body style="font-family: 'Prompt', sans-serif;">
	<!-- Start header -->
	<header class="top-navbar">
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<div class="container">
				<a class="navbar-brand" href="index.php">
					<!-- <img src="img/logo.png" alt="" /> -->
					<img src="../img/logo.png" width="130" height="130"  alt="" />
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-rs-food" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
				  <span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbars-rs-food">
					<ul class="navbar-nav ml-auto">
          <li class="nav-item active"><a class="nav-link" href="news.php">เพิ่มกำหนดการ</a></li>
						<li class="nav-item"><a class="nav-link" href="index.php">หน้าหลัก</a></li>
            <li class="nav-item"><a class="nav-link" href="employee.php">จัดการข้อมูลพนักงาน</a></li>
						<li class="nav-item"><a class="nav-link" href="borrow.php">จัดการการยืม-คืน</a></li>
						<li class="nav-item"><a class="nav-link" href="show_leave.php">จัดการการลางาน</a></li>
						<li class="nav-item"><a class="nav-link" >ชื่อผู้ใช้งาน : <?php echo $_SESSION['username'];?></a></li>
            <li class="nav-item"><a class="nav-link" href="../logout.php">ออกจากระบบ</a></li>
					</ul>
				</div>
			</div>
		</nav>
	</header>
	<!-- End header -->
  <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
<form action="news_edit_save.php" method="post" enctype="multipart/form-data">
  <center><table width="500" border="1" style="width: 500px" class="table table-bordered">
    <tbody>
      <tr>
        <br><a style="text-align: center;"><h2>แก้ไขกำหนดการ</h2><br></a>
        <td width="130">&nbsp;รูปภาพ</td>
        <td width="150">
          <input name="image" class="form-control" type="file" id="image" size="20" value="<?=$image?>"><?=$image?></td>
      </tr>
      <tr>
        <td> &nbsp;หัวข้อความข่าวสาร</td>
        <td><input name="headline" type="text" class="form-control" id="headline" value="<?=$headline?>"></td>
      </tr>
      <tr>
        <td>&nbsp;ลิงค์ที่ไปยังไฟล์ PDF</td>
        <td><input name="filename" class="form-control" type="file" id="filename" size="35" value="<?=$filename?>"><?=$filename?></td>
      </tr>
      <tr>
    </tbody>
  </table>
        <br>
          <center><button type="submit" name="save" id="save" class="btn btn-info" style="width: 90px;">บันทึก</button>
          <button type="reset" class="btn btn-secondary">ล้างข้อมูล</button>
          <a href="news.php" class="btn btn-secondary" role="button">ยกเลิก</a>
</form>
</div>
</body>
</html>
<?php
include_once '../connect.php';
$acId = $_GET["id"];
?>
<!DOCTYPE html>
<html lang="en"><!-- Basic -->
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">   
   
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
				<a class="navbar-brand" href="index.html">
					<!-- <img src="img/logo.png" alt="" /> -->
					<img src="../img/logo.png" width="130" height="130"  alt="" />
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-rs-food" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
				  <span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbars-rs-food">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item active"><a class="nav-link" href="leave.php">แจ้งลางาน</a></li>
						<li class="nav-item"><a class="nav-link" href="index.php">หน้าหลัก</a></li>
						<li class="nav-item"><a class="nav-link" href="news.php">กำหนดการ</a></li>
						<li class="nav-item"><a class="nav-link" href="borrow.php">ยืม - คืนอุปกรณ์</a></li>
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
<body style="font-family: 'Prompt', sans-serif;">
<div class="container" style="background-color:#ffff; border:3px solid #dedede; width:850px; border-radius:10px; margin-top: 70px; height: 800px; margin-bottom: 70px;">
<h5 class="text-center text-success" id="update"></h5>
<form action="borrow_aircard_save.php?id=<?php echo $acId;?>" method="post" enctype="multipart/form-data">
  <center><table width="500" border="1" style="width: 500px" class="table table-bordered">
  <tbody>    
      <tr>
        <br><a style="text-align: center;"><h2>หน้าแบบฟอร์มยืมแอร์การ์ด</h2><br></a>
      </tr>
      <tr>
        <td> &nbsp;รหัสแอร์การ์ด</td>
        <td><input name="acId" id="acId" type="text" value="<?=$acId?>" READONLY></td>
       </tr>
      <tr>
        <td> &nbsp;ยืมที่วันที่</td>
        <td><input name="borrow_date" type="date" class="form-control" id="borrow_date" value="<?=$borrow_date?>" required></td>
      </tr>
      <tr>
        <td> &nbsp;คืนวันที่</td>
        <td><input name="return_date" type="date" class="form-control" id="return_date" value="<?=$return_date?>" required></td>
      </tr>
    </tbody>
  </table>
      <br>
          <center><button type="submit" id="save" name="save" class="btn btn-info" style="width: 90px;">บันทึก</button>
          <button type="reset" class="btn btn-secondary">ล้างข้อมูล</button>
          <a href="aircard.php" class="btn btn-secondary" role="button">ยกเลิก</a>
</form>
</div>
</body>
</html>
	
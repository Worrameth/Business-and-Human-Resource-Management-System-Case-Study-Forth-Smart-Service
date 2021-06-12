<?php
include_once '../connect.php';
$result = mysqli_query($conn, "SELECT * FROM employee");
$strSQL = "SELECT * FROM employee WHERE username = '".$_SESSION["username"]."'";
$objQuery = mysqli_query($conn,$strSQL);
$objResult = mysqli_fetch_array($objQuery);
if(!$objResult)
	{
		echo "<script language=\"JavaScript\">";
		echo "alert('กรุณาเข้าสู่ระบบ');window.location='../index.php'";
		echo "</script>";
	}
$_SESSION["username"] = $objResult["username"];
$_SESSION["role"] = $objResult["role"];
if (!$_SESSION["username"] || $_SESSION["role"] != "HR"){  //check session
	if($_SESSION["role"] == 'Manager'){
		Header("Location: ../Manager/index.php");
	}
	elseif($_SESSION["role"] == 'Employee'){
		Header("Location: ../Employee/index.php");
	}
	else{
		Header("Location: ../index.php");
	}
}else{ ?>

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
<form action="save_news.php" method="post" enctype="multipart/form-data">
  <center><table width="500" border="1" style="width: 500px" class="table table-bordered">
    <tbody>
      <tr>
        <br><a style="text-align: center;"><h2>เพิ่มกำหนดการ</h2><br></a>
        <td width="130">&nbsp;รูปภาพ</td>
        <td width="150">
          <input name="image" class="form-control" type="file" id="image" size="20" placeholder="Import รูปภาพใส่กล่อง" required></td>
      </tr>
      <tr>
        <td> &nbsp;หัวข้อความข่าวสาร</td>
        <td><input name="headline" type="text" class="form-control" id="headline" placeholder="จะไปอยู่ในส่วนหัวข้อข่าวสาร" required></td>
      </tr>
      <tr>
        <td>&nbsp;ลิงค์ที่ไปยังไฟล์ PDF</td>
        <td><input name="filename" class="form-control" type="file" id="filename" size="35" placeholder="Import ไฟล์PDF หรือลิงค์ที่เชื่อมไป" required></td>
      </tr>
      <tr>
    </tbody>
  </table>
        <br>
          <center><button type="submit" name="submit" class="btn btn-info" style="width: 90px;">บันทึก</button>
          <button type="reset" class="btn btn-secondary">ล้างข้อมูล</button>
          <a href="news.php" class="btn btn-secondary" role="button">ยกเลิก</a>
</form>
</div>
</body>
</html>
<?php }?>
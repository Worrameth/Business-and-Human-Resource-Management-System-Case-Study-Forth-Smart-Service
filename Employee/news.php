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
if (!$_SESSION["username"] || $_SESSION["role"] != "Employee"){  //check session
	if($_SESSION["role"] == 'Manager'){
		Header("Location: ../Manager/index.php");
	}
	elseif($_SESSION["role"] == 'HR'){
		Header("Location: ../HR/index.php");
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
   
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

	
   
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">    
	<!-- Site CSS -->
    <link rel="stylesheet" href="../css/stylesnewss.css">    
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
						<li class="nav-item active"><a class="nav-link" href="news.php">กำหนดการ</a></li>
						<li class="nav-item"><a class="nav-link" href="index.php">หน้าหลัก</a></li>
						<li class="nav-item"><a class="nav-link" href="borrow.php">ยืม - คืนอุปกรณ์</a></li>
						<li class="nav-item"><a class="nav-link" href="leave.php">แจ้งลางาน</a></li>
						<li class="nav-item"><a class="nav-link" >ชื่อผู้ใช้งาน : <?php echo $_SESSION['username'];?></a></li>
      			<li class="nav-item"><a class="nav-link" href="../logout.php">ออกจากระบบ</a></li>
					</ul>
				</div>
			</div>
		</nav>
	</header>
	<!-- End header -->
	
<!-- Start All Pages -->
<div class="all-page-title page-breadcrumb">
		<div class="container text-center">
			<div class="row">
				<div class="col-lg-12">
					<h1>ข่าวสาร</h1>
				</div>
			</div>
		</div>
	</div>

	<!-- End All Pages -->
	
	<div class="menu-box">
		<div class="container">
			<div class="row">
			</div>
			
			<div class="row inner-menu-box">
				<div class="col-2">
					<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
					</div>
				</div>
				<?php
				$sql = $conn->query("SELECT * FROM news ORDER BY newsId DESC Limit 3");
				while($row=$sql->fetch_assoc()){
				?>
				<div class="col-3">
						<div class="gallery-single fix">
							<a href=uploads/<?=$row['filename'];?> download><img style="width:100%; height:200px" class="card-img-top" src="../HR/uploads/<?php echo$row['image']; ?>" alt=""></a>
								<div class="why-text">
									<h4></h4>
									<p href="view_detail.php?id_product=<?php echo$row['newsId']; ?>"><?php echo$row['headline']; ?></p>
								<h6><a href=../HR/uploads/<?=$row['filename'];?> target="_blank" style="color: white;">อ่านเพิ่มเติม...</a></h6>
							</div>
						</div>
				</div>
				<?php } ?>

				
						<input type="button" value="ดูเพิ่มเติม" class="form-control">
					
					
							
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			
		</div>
	</div>
	<!-- End Menu -->
	

	

	
	
	
	<!-- Start Footer -->
	<footer class="footer-area">

		<div class="copyright">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
                        <p class="company-name">Prince of Songkla University</p>
					</div>
				</div>
			</div>
		</div>
	
	</footer>
	<!-- End Footer -->
	
	<!-- ALL JS FILES -->
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <!-- ALL PLUGINS -->
	<script src="js/jquery.superslides.min.js"></script>
	<script src="js/images-loded.min.js"></script>
	<script src="js/isotope.min.js"></script>
	<script src="js/baguetteBox.min.js"></script>
	<script src="js/form-validator.min.js"></script>
    <script src="js/contact-form-script.js"></script>
    <script src="js/custom.js"></script>

	
</body>
</html>
<?php }?>
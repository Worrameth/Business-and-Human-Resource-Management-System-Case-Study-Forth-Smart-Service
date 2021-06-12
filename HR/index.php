<?php
include_once '../connect.php';
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
   
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
     <!-- Site Metas -->
	 <title>หน้าหลัก</title>  
	 <meta name="keywords" content="">
	 <meta name="description" content="">
	 <meta name="author" content="">
 
	    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">    
	<!-- Site CSS -->
    <link rel="stylesheet" href="../css/stylepage.css">    
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="../css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../css/custom.css">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Prompt:wght@300&display=swap');
        </style>

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
						<li class="nav-item active"><a class="nav-link" href="index.php">หน้าหลัก</a></li>
						<li class="nav-item"><a class="nav-link" href="news.php">เพิ่มกำหนดการ</a></li>
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

	<!-- Start slides -->
	<div id="slides" class="cover-slides">
		<ul class="slides-container">
			<li class="text-left">
				<img src="../img/F_01.jpg" alt="">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<h1 class="m-b-20"><strong>ซ้อมอพยพหนีไฟ 2021 (สนามเป้า)</strong></h1>
							<p class="m-b-40">-------------------------------------------------</p>
							<p><a class="btn btn-lg btn-circle btn-outline-new-white" href="----------------------------------------" target="_blank">เพิ่มเติม</a></p>
						</div>
					</div>
				</div>
			</li>
			<li class="text-left">
				<img src="../img/F_02.jpg" alt="">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<h1 class="m-b-20"><strong>ประชุมผู้ถือหุ้น 2021</strong></h1>
							<p class="m-b-40">-------------------------------------------------</p>
							<p><a class="btn btn-lg btn-circle btn-outline-new-white" href="----------------------------------------"  target="_blank">เพิ่มเติม</a></p>
						</div>
					</div>
				</div>
			</li>
			<li class="text-left">
				<img src="../img/F_03.jpg" alt="">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
                            <h1 class="m-b-20"><strong>สงกรานต์ 2021</strong></h1>
                            <p class="m-b-40">-------------------------------------------------</p>
							<p><a class="btn btn-lg btn-circle btn-outline-new-white" href="----------------------------------------"  target="_blank">เพิ่มเติม</a></p>
						</div>
					</div>
				</div>
			</li>
		</ul>
		<div class="slides-navigation">
			<a href="#" class="next"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
			<a href="#" class="prev"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
		</div>
	</div>
	<!-- End slides -->
	
	<!-- Start QT -->
	<div class="qt-box qt-background">
		<div class="container">
			<div class="row">
				<div class="col-md-8 ml-auto mr-auto text-center">
					<p class="lead ">
						" If you're not the one cooking, stay out of the way and compliment the chef. "
					</p>
					<span class="lead">Michael Strahan</span>
				</div>
			</div>
		</div>
	</div>
	<!-- End QT -->
	
	<!-- Start Menu -->
	<div class="menu-box">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="heading-title text-center">
						<h2>ข่าวสาร</h2>
						<p></p>
					</div>
				</div>
			</div>
			
			<div class="row inner-menu-box">
				<div class="col-2">
					<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
					</div>
				</div>
				
				<div class="col-9">
					<div class="tab-content" id="v-pills-tabContent">
						<div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
							<div class="row">
								<div class="col-lg-4 col-md-6 special-grid drinks">
									<div class="gallery-single fix">
										<img src="../img/new01.jpg" class="img-fluid" alt="Image">
										<div class="why-text">
											<h4></h4>
											<p>-------------------------------------------</p>
											<h6><a href="-------------------------------------------" target="_blank" style="color: white;">อ่านเพิ่มเติม...</a></h6>
										</div>
									</div>
								</div>
								
								<div class="col-lg-4 col-md-6 special-grid drinks">
									<div class="gallery-single fix">
										<img src="../img/new02.jpg" class="img-fluid" alt="Image">
										<div class="why-text">
											<h4></h4>
											<p>-------------------------------------------</p>
											<h6><a href="-------------------------------------------" target="_blank" style="color: white;">อ่านเพิ่มเติม...</a></h6>
										</div>
									</div>
								</div>
								
								<div class="col-lg-4 col-md-6 special-grid drinks">
									<div class="gallery-single fix">
										<img src="../img/new03.jpg" class="img-fluid" alt="Image">
										<div class="why-text">
											<h4></h4>
											<p>-------------------------------------------</p>
											<h6><a href="-------------------------------------------" target="_blank" style="color: white;">อ่านเพิ่มเติม...</a></h6>

										</div>
									</div>
								</div>
								
								<div class="col-lg-4 col-md-6 special-grid drinks">
									<div class="gallery-single fix">
										<img src="../img/new04.jpg" class="img-fluid" alt="Image">
										<div class="why-text">
											<h4></h4>
											<p>-------------------------------------------</p>
											<h6><a href="-------------------------------------------" target="_blank" style="color: white;">อ่านเพิ่มเติม...</a></h6>

										</div>
									</div>
								</div>

								<div class="col-lg-4 col-md-6 special-grid drinks">
									<div class="gallery-single fix">
										<img src="../img/new05.jpg" class="img-fluid" alt="Image">
										<div class="why-text">
											<h4></h4>
											<p>-------------------------------------------</p>
											<h6><a href="-------------------------------------------" target="_blank" style="color: white;">อ่านเพิ่มเติม...</a></h6>

										</div>
									</div>
								</div>
								<div class="col-lg-4 col-md-6 special-grid drinks">
									<div class="gallery-single fix">
										<img src="../img/new06.jpg" class="img-fluid" alt="Image">
										<div class="why-text">
											<h4></h4>
											<p>-------------------------------------------</p>
											<h6><a href="-------------------------------------------" target="_blank" style="color: white;">อ่านเพิ่มเติม...</a></h6>

										</div>
									</div>
								</div>
								
							</div>
							
						</div>
	
						<a href="-------------------------------------------" class="btn form-control">ดูเพิ่มเติม</a>
					
					
							
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

								

	<!-- Start Customer Reviews -->
	<div class="customer-reviews-box">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="heading-title text-center">
						<h2>ยืน - อุปกกรณ์ Word From Home</h2>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-8 mr-auto ml-auto text-center">
					<div id="reviews" class="carousel slide" data-ride="carousel">
						<div class="carousel-inner mt-4">
							<div class="carousel-item text-center active">
								<div class="img-box p-1 border rounded-circle m-auto">
									<img class="d-block w-100 rounded-circle" src="../img/Q_1.PNG" alt="">
								</div>
								<h5 class="mt-4 mb-0"><strong class="text-warning text-uppercase">คจาคาร์</strong></h5>
								<h6 class="text-dark m-0">&nbsp;</h6>
								<h3>------------------------------</h3>
							</div>
							<div class="carousel-item text-center">
								<div class="img-box p-1 border rounded-circle m-auto">
									<img class="d-block w-100 rounded-circle" src="../img/Q_2.PNG" alt="">
								</div>
								<h5 class="mt-4 mb-0"><strong class="text-warning text-uppercase">นูเวอร์</strong></h5>
								<h6 class="text-dark m-0">&nbsp;</h6>
								<h3>------------------------------</h3>
							</div>
							
							<div class="carousel-item text-center">
								<div class="img-box p-1 border rounded-circle m-auto">
									<img class="d-block w-100 rounded-circle" src="../img/Q_3.PNG" alt="">
								</div>
								<h5 class="mt-4 mb-0"><strong class="text-warning text-uppercase">คารานด้า</strong></h5>
								<h6 class="text-dark m-0">&nbsp;</h6>
								<h3>------------------------------</h3>
							</div>
							<div class="carousel-item text-center">
								<div class="img-box p-1 border rounded-circle m-auto">
									<img class="d-block w-100 rounded-circle" src="../img/Q_4.PNG" alt="">
								</div>
								<h5 class="mt-4 mb-0"><strong class="text-warning text-uppercase">คุทูม</strong></h5>
								<h6 class="text-dark m-0">&nbsp;</h6>
								<h3>------------------------------ </h3>
							</div>
							<div class="carousel-item text-center">
                <div class="img-box p-1 border rounded-circle m-auto">
                  <img class="d-block w-100 rounded-circle" src="img/Q_5.PNG" alt="">
								</div>
								<h5 class="mt-4 mb-0"><strong class="text-warning text-uppercase">โอฟิน</strong></h5>
								<h6 class="text-dark m-0">&nbsp;</h6>
								<h3>------------------------------</h3>
							</div>
                            
              <div class="carousel-item text-center">
                <div class="img-box p-1 border rounded-circle m-auto">
                  <img class="d-block w-100 rounded-circle" src="../img/Q_6.PNG" alt="">
                </div>
                <h5 class="mt-4 mb-0"><strong class="text-warning text-uppercase">เบลล์</strong></h5>
                <h6 class="text-dark m-0">&nbsp;</h6>
                <h3>------------------------------</h3>
              </div>
              <div class="carousel-item text-center">
								<div class="img-box p-1 border rounded-circle m-auto">
									<img class="d-block w-100 rounded-circle" src="../img/Q_7.PNG" alt="">
								</div>
								<h5 class="mt-4 mb-0"><strong class="text-warning text-uppercase">กามอส</strong></h5>
								<h6 class="text-dark m-0">&nbsp;</h6>
								<h3>------------------------------</h3>
							</div>
						</div>

						<a class="carousel-control-prev" href="#reviews" role="button" data-slide="prev">
							<i class="fa fa-angle-left" aria-hidden="true"></i>
							<span class="sr-only">Previous</span>
						</a>
						<a class="carousel-control-next" href="#reviews" role="button" data-slide="next">
							<i class="fa fa-angle-right" aria-hidden="true"></i>
							<span class="sr-only">Next</span>
						</a>
                    </div>
				</div>
			</div>
		</div>
	</div>
	
	
	
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
	<script src="../js/jquery-3.2.1.min.js"></script>
	<script src="../js/popper.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
    <!-- ALL PLUGINS -->
	<script src="../js/jquery.superslides.min.js"></script>
	<script src="../js/images-loded.min.js"></script>
	<script src="../js/isotope.min.js"></script>
	<script src="../js/baguetteBox.min.js"></script>
	<script src="../js/form-validator.min.js"></script>
    <script src="../js/contact-form-script.js"></script>
    <script src="../js/custom.js"></script>
</body>
</html>
<?php }?>
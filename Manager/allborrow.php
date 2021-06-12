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
if (!$_SESSION["username"] || $_SESSION["role"] != "Manager"){  //check session
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
    <link rel="stylesheet" href="../css/styleborrow.css">    
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
						<li class="nav-item active"><a class="nav-link" href="allborrow.php">ดูประวัติการยืม - คืนทั้งหมด</a></li>
						<li class="nav-item"><a class="nav-link" href="index.php">หน้าหลัก</a></li>
						<li class="nav-item"><a class="nav-link" href="allleave.php">ดูประวัติการลางานทั้งหมด</a></li>
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
    
<!-- Start Menu -->
<div class="menu-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="heading-title text-center">
                    <h2>ยืม - คืนอุปกรณ์</h2>
                    <p>----------------------------------------------</p>
                </div>
            </div>
        </div>
            
        <div class="row inner-menu-box">
						<div class="col-9">
				<div class="tab-content">
					<div class="row">
					<table>
						<tbody>
						<tr>
							<table id="borrowTable" class="table table-striped table-bordered table-sm text-center" cellspacing="0"width="100%">
                <thead>
                    <tr>
                        <th>รหัสยืม/คืน</th>
                        <th>ชื่อผู้ยืม</th>
                        <th>แผนก</th>
												<th>อุปกรณ์ที่ยืม</th>
                        <th>ยืมวันที่</th>
                        <th>คืนวันที่</th>
                        <th>สถานะการยืม</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                  $result = mysqli_query($conn, "SELECT borrowId, employee.name, department.departmentName,borrowItem,date_format(borrow_date, '%d/%m/%Y') As borrow_date, date_format(return_date, '%d/%m/%Y') As return_date, tool_status.toolStatusName FROM borrow INNER JOIN employee ON borrow.userId = employee.userid INNER JOIN department ON borrow.departmentId = department.departmentId INNER JOIN tool_status ON borrow.toolStatusId = tool_status.toolStatusId");
                  while ($_REQUEST = mysqli_fetch_array($result)) {
                ?>
                <tr>
                <td><?=$_REQUEST['borrowId'];?></td>
                <td><?=$_REQUEST['name'];?></td>
                <td><?=$_REQUEST['departmentName'];?></td>
								<td><?=$_REQUEST['borrowItem'];?></td>
                <td><?=$_REQUEST['borrow_date'];?></td>
                <td><?=$_REQUEST['return_date'];?></td>
                <td><?=$_REQUEST['toolStatusName'];?></td>
                </tr>
                <?php
                }
                // close connection database
                mysqli_close($conn);
                ?>
                </tbody>
            </table>
    				</tbody>
  					</table>
				</div>
			</div>
		</div>
			
<!-- Start Footer -->
<footer>
            
</footer>
<!-- End Footer -->
<!-- AJAX -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="//cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready( function () {
					$('#borrowTable').DataTable( {
						pageLength : 10,
						"order": [[ 0, "desc" ]]
					});
				});
		</script>
</body>
</html>
<?php }?>
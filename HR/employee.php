<?php
include_once '../connect.php';

if (!$_SESSION["username"]){  //check session
    
    Header("Location: ../index.php"); //ไม่พบผู้ใช้กระโดดกลับไปหน้า login form 

}else{

$result = mysqli_query($conn, "SELECT * FROM employee");
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
				<a class="navbar-brand" href="index.html">
					<!-- <img src="img/logo.png" alt="" /> -->
					<img src="../img/logo.png" width="130" height="130"  alt="" />
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-rs-food" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
				  <span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbars-rs-food">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item active"><a class="nav-link" href="employee.php">จัดการข้อมูลพนักงาน</a></li>
						<li class="nav-item"><a class="nav-link" href="index.php">หน้าหลัก</a></li>
						<li class="nav-item"><a class="nav-link" href="">เพิ่มกำหนดการ</a></li>
						<li class="nav-item"><a class="nav-link" href="">จัดการการลางาน</a></li>
						<li class="nav-item"><a class="nav-link" >Hi, <?php echo $_SESSION['username'];?></a></li>
      			<li class="nav-item"><a class="nav-link" href="../logout.php">Logout</a></li>
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
<div class="container">
        <form method="post" action="excel.php">
            <input type="submit" name="excel" class="btn btn-success" value="Excel"/>
        </form></p>
        <div class="container-fluid">
        <a href="register.php">เพิ่มพนักงาน</a></br>
        <div>ข้อมูลพนักงาน</div>
            <table id="employeeTable" class="table table-striped table-bordered table-sm text-center" cellspacing="0"width="100%">
                <thead>
                    <tr>
                        <th>รหัสพนักงาน</th>
                        <th>Username</th>
                        <th>ชื่อ-สกุล</th>
                        <th>แผนก</th>
                        <th>เบอร์มือถือ</th>
                        <th>อีเมล์</th>
                        <th>ตำแหน่ง</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                <?php
                  while ($_REQUEST = mysqli_fetch_array($result)) {
                ?>
                <tr>
                <td><?=$_REQUEST['userid'];?></td>
                <td><?=$_REQUEST['username'];?></td>
                <td><?=$_REQUEST['name'];?></td>
                <td><?=$_REQUEST['departmentName'];?></td>
                <td><?=$_REQUEST['phone'];?></td>
                <td><?=$_REQUEST['email'];?></td>
                <td><?=$_REQUEST['role'];?></td>
                <td><a href="employee_edit.php?id=<?php echo $_REQUEST['userid']; ?>">แก้ไข</a>
                <a href="employee_delete.php?id=<?php echo $_REQUEST["userid"]; ?>" onClick="return confirm('คุณแน่ใจแล้วนะว่าจะลบ ?')">ลบ</a></td>
                </tr>
                <?php
                }
                // close connection database
                mysqli_close($conn);
                ?>
                </tbody>
            </table>
        </div>
    </div>
</footer>
	<!-- End Footer -->
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="//cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#employeeTable').DataTable();
        });
    </script>

</body>
</html>
<?php }?>
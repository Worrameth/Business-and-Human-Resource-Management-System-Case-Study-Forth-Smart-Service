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
						<li class="nav-item active"><a class="nav-link" href="show_leave.php">แจ้งลางาน</a></li>
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
    <br>
    <br>
    <br>
<div class="container">
        <div class="container-fluid">
        <a href="leave.php">แจ้งลาหยุด</a></br>
        <div>ข้อมูลการลาหยุด</div>
            <table id="leaveTable" class="table table-striped table-bordered table-sm text-center" cellspacing="0"width="100%">
                <thead>
                    <tr>
                        <th>ชื่อผู้ใช้งาน</th>
                        <th>ประเภท</th>
                        <th>ตั้งแต่ที่วันที่</th>
                        <th>ถึงวันที่</th>
                        <th>ลายละเอียดการลา</th>
                        <th>สถานะการลา</th>
                        <th></th>
                        <th>หมายเหตุ</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                  $result = mysqli_query($conn, "SELECT leaveId, employee.userId,employee.username, leave_type.leaveTypeName, date_format(leave_from, '%d/%m/%Y') As leave_from, date_format(leave_to, '%d/%m/%Y') As leave_to, leave_description, leave_status.leaveStatusId, leave_status.leaveStatusName, note  FROM leave_main INNER JOIN leave_type ON leave_main.leaveTypeId = leave_type.leaveTypeId INNER JOIN employee ON leave_main.userId = employee.userid INNER JOIN leave_status ON leave_main.leaveStatusId = leave_status.leaveStatusId WHERE employee.username = '".$_SESSION["username"]."'");
                  //$_SESSION["userId"] = $objResult["username"];
                  while ($_REQUEST = mysqli_fetch_array($result)) {
                ?>
                <tr>
                <td><?=$_REQUEST['username'];?></td>
                <td><?=$_REQUEST['leaveTypeName'];?></td>
                <td><?=$_REQUEST['leave_from'];?></td>
                <td><?=$_REQUEST['leave_to'];?></td>
                <td><?=$_REQUEST['leave_description'];?></td>
                <td><?=$_REQUEST['leaveStatusName'];?></td>
                <td><?php if($_REQUEST['leaveStatusName'] == 'รออนุมัติ'){?>
                    <a href="leave_edit.php?id=<?php echo $_REQUEST['leaveId']; ?>">แก้ไข</a>
                    <a href="leave_delete.php?id=<?php echo $_REQUEST["leaveId"]; ?>" onClick="return confirm('คุณแน่ใจแล้วนะว่าจะลบ ?')">ลบ</a>
                  <?php }else{?>
                    <a href="leave_edit.php?id=<?php echo $_REQUEST['leaveId']; ?>" hidden>แก้ไข</a>
                    <a href="leave_delete.php?id=<?php echo $_REQUEST["leaveId"]; ?>" onClick="return confirm('คุณแน่ใจแล้วนะว่าจะลบ ?')" hidden>ลบ</a>
                    <?php }?>
                </td>
                <td><?=$_REQUEST['note'];?></td>
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
            $('#leaveTable').DataTable( {
                "order": [[ 5, "asc" ]]
            });
        });
    </script>

</body>
</html>
<?php }?>
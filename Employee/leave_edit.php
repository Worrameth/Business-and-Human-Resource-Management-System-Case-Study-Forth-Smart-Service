<?php
include_once 'leave_edit_save.php';
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
				<a class="navbar-brand" href="index.php">
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
    <br>
    <br>
    <br>
<body style="font-family: 'Prompt', sans-serif;">
<div class="container" style="background-color:#ffff; border:3px solid #dedede; width:850px; border-radius:10px; margin-top: 70px; height: 800px; margin-bottom: 70px;">
<h5 class="text-center text-success" id="update"></h5>
<form action="leave_edit_save.php?id=<?php echo $id;?>" method="post">  
  <center><table width="500" border="1" style="width: 500px" class="table table-bordered">
    <tbody>    
      <tr>
        <br><a style="text-align: center;"><h2>แจ้งลางาน</h2><br></a>
      </tr>
      <tr>
        <td> &nbsp;ชื่อผู้ใช้งาน</td>
        <td><input name="userId" type="text" class="form-control" id="userId" value="<?=$username?>" READONLY></td>
      </tr>
      <tr>
        <td> &nbsp;ประเภทการลาป่วย</td>
        <td>
        <select name="leaveTypeId" id="leaveTypeId" class="btn dropdown-toggle" data-toggle="dropdown">
            <option value=<?=$leaveTypeId;?> selected><?=$leaveTypeName;?></option>
            <?php
            include('connect.php');
            $sqli = "SELECT * FROM leave_type ORDER BY leaveTypeId DESC";
            $result = mysqli_query($conn, $sqli);
            while ($row = mysqli_fetch_array($result)) {
              echo '<option value="'.$row["leaveTypeId"].'">'.$row["leaveTypeName"].'</option>';
            }  
              echo '</select>'; 
            ?>
      </tr>
      <tr>
        <td> &nbsp;ตั้งแต่ที่วันที่</td>
        <td><input name="leave_from" type="date" class="form-control" id="leave_from" value="<?=$leave_from?>"></td>
      </tr>
      <tr>
        <td> &nbsp;ขอลาตั้งแต่วันที่</td>
        <td><input name="leave_to" type="date" class="form-control" id="leave_to" value="<?=$leave_to?>"></td>
      </tr>
      <tr>
        <td> &nbsp;ลายละเอียดการลา</td>
        <td><input name="leave_description" type="text" class="form-control" id="leave_description" value="<?=$leave_description?>" required></td>
      </tr>
      <tr>
        <td>&nbsp;สถานะการลา</td>
        <td><select name="leaveStatusId" id="leaveStatusId" class="btn dropdown-toggle" data-toggle="dropdown">
            <option value=<?=$leaveStatusId;?> selected><?=$leaveStatusName;?></option></td>
      </tr>
    </tbody>
  </table>
        <br>
          <center><button type="submit" id="save" name="save" class="btn btn-info" style="width: 90px;">บันทึก</button>
          <button type="reset" class="btn btn-secondary">ล้างข้อมูล</button>
          <a href="show_leave.php" class="btn btn-secondary" role="button">ยกเลิก</a>
</form>
</div>
</body>
</html>
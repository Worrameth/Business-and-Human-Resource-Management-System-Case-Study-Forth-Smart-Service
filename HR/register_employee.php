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
 
   
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">    
	  <!-- Site CSS -->
    <link rel="stylesheet" href="../css/styleindex.css">    
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="../css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../css/custom.css">

<style>
body {
background-color: #008B8B;
 font-family: 'Itim', cursive;
 }
</style>

<body style="font-family: 'Prompt', sans-serif;">

<form action="save_register.php" method="POST">
<div class="container" style="background-color:#ffff; border:3px solid #dedede; width:850px; border-radius:10px; margin-top: 70px; height: 800px; margin-bottom: 70px;">
  
  <center><table width="500" border="1" style="width: 500px" class="table table-bordered">
    <tbody>
      <tr>
        <br><a style="text-align: center;"><h2>เพิ่มพนักงาน</h2><br></a>
        <td width="130">&nbsp;ชื่อผู้ใช้งาน</td>
        <td width="150">
          <input name="username" class="form-control" type="text" id="username" size="20" placeholder="กรุณากรอกชื่อผู้ใช้" required>
        </td>
      </tr>
      <tr>
        <td> &nbsp;รหัสผ่าน</td>
        <td><input name="password" type="password" class="form-control" id="password" placeholder="กรุณากรอกรหัสผ่าน" required></td>
      </tr>
      <tr>
        <td>&nbsp;ชื่อ-สกุล</td>
        <td><input name="name" class="form-control" type="text" id="name" size="35" placeholder="กรุณากรอกชื่อนามสกุล" required></td>
      </tr>
      <tr>
        <td> &nbsp;แผนก</td>
        <td>
          <select name="departmentId" id="departmentId" class="btn dropdown-toggle" data-toggle="dropdown" required>
          <option value="" selected>-----เลือกแผนก-----</option>
          <?php
            include('../connect.php');
            $sqli = "SELECT * FROM department";
            $result = mysqli_query($conn, $sqli);
            while ($row = mysqli_fetch_array($result)) {
              echo '<option value="'.$row["departmentId"].'">'.$row["departmentName"].'</option>';
            }  
              echo '</select>'; 
          ?>
          </select>
        </td>
        <tr>
        <td>&nbsp;เบอร์มือถือ</td>
          <td><input name="phone" type="text" class="form-control" id="phone" size="35" placeholder="กรุณากรอกเบอร์มือถือ" required></td> 
        </tr>
        <tr>
        <td>&nbsp;อีเมล์</td>
          <td><input name="email" type="email" class="form-control" id="email" size="35" placeholder="กรุณากรอกอีเมล์" required></td>
      <input name="status" type="hidden" class="form-control" id="status"value="user" size="35" readonly>
        </tr>
    </tbody>
  </table>
        <br>
          <center><button type="submit" class="btn btn-info" style="width: 90px;">ยืนยัน</button>
          <button type="reset" class="btn btn-secondary">ล้างข้อมูล</button>
          <a href="employee.php" class="btn btn-secondary" role="button">ยกเลิก</a>
</form>
</div>
</body>
</html>
<?php }?>
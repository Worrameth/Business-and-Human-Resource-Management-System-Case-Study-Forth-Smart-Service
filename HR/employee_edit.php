<?php
include_once 'employee_edit_save.php';
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

<style>
body {
background-color: #008B8B;
 font-family: 'Itim', cursive;
 }
</style>
<body style="font-family: 'Prompt', sans-serif;">
<div class="container" style="background-color:#ffff; border:3px solid #dedede; width:850px; border-radius:10px; margin-top: 70px; height: 800px; margin-bottom: 70px;">
<h5 class="text-center text-success" id="update"></h5>
<form action="employee_edit_save.php?id=<?php echo $id;?>" method="post">  
  <center><table width="500" border="1" style="width: 500px" class="table table-bordered">
    <tbody>
      <tr>
        <br><a style="text-align: center;"><h2>แก้ไขข้อมูลพนักงาน</h2><br></a>
        <td width="120">&nbsp;ชื่อผู้ใช้งาน</td>
        <td width="150">
          <input name="username" class="form-control" type="text" size="20" id="userid" value="<?=$username?>" READONLY>
          
        </td>
      </tr>
      <tr>
        <td> &nbsp;รหัสผ่าน</td>
        <td><input name="password" type="password" class="form-control" id="password" value="<?=$password?>" placeholder="กรุณากรอกรหัสผ่าน"></td>
      </tr>
      <tr>
        <td>&nbsp;ชื่อ-สกุล</td>
        <td><input name="name" class="form-control" type="text" id="name" size="35" value="<?=$name;?>"></td>
      </tr>
      <tr>
        <td> &nbsp;แผนก</td>
        <td>
          <select name="departmentId" id="departmentId" class="btn dropdown-toggle" data-toggle="dropdown">
            <option value=<?=$departmentId;?> selected><?=$departmentName;?></option>
            <?php
            include('connect.php');
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
          <td><input name="phone" type="text" class="form-control" id="phone" size="35" value="<?=$phone;?>"></td> 
        </tr>
        <tr>
        <td>&nbsp;อีเมล์</td>
          <td><input name="email" type="email" class="form-control" id="email" size="35" value="<?=$email?>"></td>
      <input name="status" type="hidden" class="form-control" id="status"value="user" size="35" readonly>
        </tr>
        <td> &nbsp;ตำแหน่ง</td>
        <td>
          <select name="role" id="role" class="btn dropdown-toggle" data-toggle="dropdown">
          <option value="<?=$role;?>" selected><?=$role;?></option>
          <?php
            include('../connect.php');
            $sqli = "SELECT * FROM role";
            $result = mysqli_query($conn, $sqli);
            while ($row = mysqli_fetch_array($result)) {
              echo '<option value="'.$row["roleName"].'">'.$row["roleName"].'</option>';
            }  
              echo '</select>'; 
          ?>
          </select>
        </td>
    </tbody>
  </table>
        <br>
          <center><button type="submit" id="save" name="save" class="btn btn-info" style="width: 90px;">ยืนยัน</button>
          <button type="reset" class="btn btn-secondary">ล้างข้อมูล</button>
          <a href="employee.php" class="btn btn-secondary" role="button">ยกเลิก</a>
</form>
</div>
</body>
</html>
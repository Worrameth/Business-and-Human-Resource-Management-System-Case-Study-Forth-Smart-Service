<?php
include_once 'borrow_edit_save.php';
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
<form action="borrow_edit_save.php?id=<?php echo $borrowId;?>" method="post">  
  <center><table width="500" border="1" style="width: 500px" class="table table-bordered">
    <tbody>
      <tr>
        <br><a style="text-align: center;"><h2>แก้ไขข้อมูลพนักงาน</h2><br></a>
        <td width="120">&nbsp;รหัสการยืม</td>
        <td width="150">
          <input name="borrowId" class="form-control" type="text" size="20" id="borrowId" value="<?=$borrowId?>" READONLY>
        </td>
      </tr>
      <tr>
        <td> &nbsp;ชื่อผู้ยืม</td>
        <td><input name="userId" type="text" class="form-control" id="userId" value="<?=$name?>" READONLY></td>
      </tr>
      <tr>
        <td>&nbsp;แผนก</td>
        <td><input name="departmentId" class="form-control" type="text" id="departmentId" size="35" value="<?=$departmentName;?>" READONLY></td>
      </tr>
      <tr>
        <td>&nbsp;รหัสอุปกรณ์</td>
        <td><input name="borrowItem" class="form-control" type="text" id="borrowItem" size="35" value="<?=$borrowItem;?>" READONLY></td>
      </tr>
      <tr>
        <td>&nbsp;วันที่ยืม</td>
        <td><input name="borrow_date" class="form-control" type="text" id="borrow_date" size="35" value="<?=$borrow_date;?>"READONLY></td>
      </tr>
      <tr>
        <td>&nbsp;กำหนดวันที่คืน</td>
        <td><input name="return_date" class="form-control" type="text" id="return_date" size="35" value="<?=$return_date;?>"READONLY></td>
      </tr>
      <tr>
        <td> &nbsp;สถานะการยืม</td>
        <td>
          <select name="toolStatusId" id="toolStatusId" class="btn dropdown-toggle" data-toggle="dropdown">
            <option value=<?=$toolStatusId;?> selected><?=$toolStatusName;?></option>
            <?php
            include_once ('../connect.php');
            $sqli = "SELECT * FROM tool_status";
            $result = mysqli_query($conn, $sqli);
            while ($row = mysqli_fetch_array($result)) {
              echo '<option value="'.$row["toolStatusId"].'">'.$row["toolStatusName"].'</option>';
            }  
              echo '</select>'; 
            ?>
          </select>
        </td>
    </tbody>
  </table>
        <br>
          <center><button type="submit" id="save" name="save" class="btn btn-info" style="width: 90px;">ยืนยัน</button>
          <a href="borrow.php" class="btn btn-secondary" role="button">ยกเลิก</a>
</form>
</div>
</body>
</html>
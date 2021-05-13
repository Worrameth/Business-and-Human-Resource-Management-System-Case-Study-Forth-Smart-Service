<!DOCTYPE html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="css/style.css" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"/>
  <link href="https://fonts.googleapis.com/css?family=Itim&display=swap" rel="stylesheet">
</head>
<style type="text/css">
 body {
background-color: #008B8B;
 font-family: 'Itim', cursive;
  } 

</style>

<body>

<form action="save_register.php" method="POST">

<div class="container" style="background-color:#ffff; border:3px solid #dedede; width:850px; border-radius:10px; margin-top: 70px; height: 800px; margin-bottom: 70px;">
  
  <center><table width="500" border="1" style="width: 500px" class="table table-bordered">
    <tbody>
      <tr>
        <br><a style="text-align: center;"><h2>สมัครสมาชิก</h2><br></a>
        <td width="120">&nbsp;ชื่อผู้ใช้งาน</td>
        <td width="150">
          <input name="username" class="form-control" type="text" id="username" size="20" placeholder="กรุณากรอกชื่อผู้ใช้" >
          
        </td>
      </tr>
      <tr>
        <td> &nbsp;รหัสผ่าน</td>
        <td><input name="password" type="password" class="form-control" id="password" placeholder="กรุณากรอกรหัสผ่าน"></td>
      </tr>
      <tr>
        <td>&nbsp;ชื่อ-สกุล</td>
        <td><input name="name" class="form-control" type="text" id="name" size="35" placeholder="กรุณากรอกชื่อนามสกุล"></td>
      </tr>
      <tr>
        <td> &nbsp;แผนก</td>
        <td>
          <select name="departmentName" id="departmentName" class="btn dropdown-toggle" data-toggle="dropdown">
          <option value="" selected>-----เลือกแผนก-----</option>
          <?php
            include('../connect.php');
            $sqli = "SELECT * FROM department";
            $result = mysqli_query($conn, $sqli);
            while ($row = mysqli_fetch_array($result)) {
              echo '<option>'.$row['departmentName'].'</option>';
            }  
              echo '</select>'; 
          ?>
          </select>
        </td>
        <tr>
        <td>&nbsp;เบอร์มือถือ</td>
          <td><input name="phone" type="text" class="form-control" id="phone" size="35" placeholder="กรุณากรอกเบอร์มือถือ"></td> 
        </tr>
        <tr>
        <td>&nbsp;อีเมล์</td>
          <td><input name="email" type="email" class="form-control" id="email" size="35" placeholder="กรุณากรอกอีเมล์"></td>
      <input name="status" type="hidden" class="form-control" id="status"value="user" size="35" readonly>
        </tr>
    </tbody>
  </table>
        <br>
          <center><button type="submit" class="btn btn-info" style="width: 90px;">ยืนยัน</button>
          <button type="reset" class="btn btn-secondary">ล้างข้อมูล</button>
          <a href="register.php" class="btn btn-secondary" role="button">ยกเลิก</a>
</form>
</div>
</body>
</html>
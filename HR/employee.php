<?php
include_once '../connect.php';

if (!$_SESSION["username"]){  //check session
    
    Header("Location: ../index.php"); //ไม่พบผู้ใช้กระโดดกลับไปหน้า login form 

}else{

$result = mysqli_query($conn, "SELECT * FROM employee");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="css/style.css" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"/>
  <link href="https://fonts.googleapis.com/css?family=Itim&display=swap" rel="stylesheet">
  <title>ข้อมูลพนักงาน</title>
</head>
<style type="text/css">
 body {
background-color: #008B8B;
 font-family: 'Itim', cursive;
 }
</style>
<body>
<div class="container">
        <div class="container-fluid">
        <a href="index.php">กลับไปหน้าหลัก</a>
        <a href="register.php">เพิ่มพนักงาน</a>
        <div><h5>ข้อมูลพนักงาน</h5></div>
            <table id="tableHorizontalWrapper" class="table table-striped table-bordered table-sm text-center" cellspacing="0"width="100%">
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
<a href="logout.php">Log out</a></strong></p>
</body>
</html>
<?php }?>
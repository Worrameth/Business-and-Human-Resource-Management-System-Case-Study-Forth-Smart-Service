<?php
include_once 'connect.php';
$update = '';
$delete = '';
$result = mysqli_query($objCon, "SELECT * FROM employee");
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
        <a href="admin.php">กลับไปหน้าหลัก</a>
        <a href="register.php">เพิ่มพนักงาน</a>
        <h5 class="text-center text-success" id="update"><?=$update;?></h5>
        <h5 class="text-center text-success" id="delete"><?=$delete;?></h5>
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
                <td><?=$_REQUEST['department'];?></td>
                <td><?=$_REQUEST['phone'];?></td>
                <td><?=$_REQUEST['email'];?></td>
                <td><a href="employee_edit.php?id=<?php echo $_REQUEST['userid']; ?>">แก้ไข</a>
                <a href="employee_delete.php?id=<?php echo $_REQUEST["userid"]; ?>" onClick="return confirm('คุณแน่ใจแล้วนะว่าจะลบ ?')">ลบ</a></td>
                </tr>
                <?php
                }
                // close connection database
                mysqli_close($objCon);
                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
}
</body>
</html>
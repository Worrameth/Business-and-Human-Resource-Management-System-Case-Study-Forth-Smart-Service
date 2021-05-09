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
                    </tr>
                </thead>
                <tbody>
                <?php
                  while ($row = mysqli_fetch_array($result)) {
                ?>
                <tr>
                <td><?=$row['userid'];?></td>
                <td><?=$row['username'];?></td>
                <td><?=$row['name'];?></td>
                <td><?=$row['department'];?></td>
                <td><?=$row['phone'];?></td>
                <td><?=$row['email'];?></td>
                <td><a href="employee_edit.php?id=<?php echo $row["userid"]; ?>">แก้ไข</a>
                <a href="employee_delete.php?id=<?php echo $row["userid"]; ?>" onClick="return confirm('คุณแน่ใจแล้วนะว่าจะลบ ?')">ลบ</a></td>
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
                
                    <!-- js -->
                    <script>
                        $(document).ready(function()
                        {
                            setTimeout(function()
                            {
                                $('#update').hide();
                            },3000);
                        });
                
                        $(document).ready(function()
                        {
                            setTimeout(function()
                            {
                                $('#delete').hide();
                            },3000);
                        });
}
</body>
</html>
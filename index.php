<?php 

    session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <title>หน้าแรก</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" charset="utf-8"></script>
    <link rel="shortcut icon" href="img/icon.ico" type="image/x-icon">
</head>
<body>
<form action="check_login.php" method="POST" class="login-form">
  <div align="center">
    <img src="img/logo.png" alt="" width="150" high="150">
  </div>
  <h2>เข้าสู่ระบบการใช้บริการ</h2>

<div class="txtb">
  <input type="text" name="username" autocomplete="off">
  <span data-placeholder="ชื่อผู้ใช้"></span>
</div>

<div class="txtb">
  <input type="password" name="password">
  <span data-placeholder="รหัสผ่าน"></span>
</div>

<input type="submit" class="logbtn" value="เข้าสู่ระบบ">


</form>

<script type="text/javascript">
$(".txtb input").on("focus",function(){
$(this).addClass("focus");
});

$(".txtb input").on("blur",function(){
if($(this).val() == "")
$(this).removeClass("focus");
});

</script>

</body>
</html>

<?php 

    if (isset($_SESSION['success']) || isset($_SESSION['error'])) {
        session_destroy();
    }

?>
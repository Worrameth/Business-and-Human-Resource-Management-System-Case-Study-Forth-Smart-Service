<?php
include_once 'news_edit_save.php';
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
<form action="news_edit_save.php?id=<?php echo $id;?>" method="post">  
  <center><table width="500" border="1" style="width: 500px" class="table table-bordered">
    <tbody>
      <tr>
        <br><a style="text-align: center;"><h2>แก้ไขกำหนดการ</h2><br></a>
        <td width="130">&nbsp;รูปภาพ</td>
        <td width="150">
          <input name="image" class="form-control" type="file" id="image" size="20" required><?php echo "<img src=uploads/".$image." height=200 width=200 />";?></td>
      </tr>
      <tr>
        <td> &nbsp;หัวข้อความข่าวสาร</td>
        <td><input name="headline" type="text" class="form-control" id="headline" value="<?=$headline?>" required></td>
      </tr>
      <tr>
        <td>&nbsp;ลิงค์ที่ไปยังไฟล์ PDF</td>
        <td><input name="filename" class="form-control" type="file" id="filename" size="35" required><a href=uploads/<?=$filename;?> download><?=$filename;?></a></td>
      </tr>
      <tr>
    </tbody>
  </table>
        <br>
          <center><button type="submit" id="save" name="save" class="btn btn-info" style="width: 90px;">ยืนยัน</button>
          <button type="reset" class="btn btn-secondary">ล้างข้อมูล</button>
          <a href="news.php" class="btn btn-secondary" role="button">ยกเลิก</a>
</form>
</div>
</body>
</html>
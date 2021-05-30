<?php 
require_once '../connect.php'; 

$output = '';
if(isset($_POST["excel"]))
{
 $query = "SELECT userid,username,name,depart.departmentName,phone,email,role FROM employee AS emp INNER JOIN department as depart ON emp.departmentId = depart.departmentId";
 $result = mysqli_query($conn, $query);
 if(mysqli_num_rows($result) > 0)
 {
  $output .='
   <table class="table" bordered="1">  
    <tr>  
      <th>รหัสพนักงาน</th>  
      <th>username</th>  
      <th>ชื่อ-สกุล</th>  
      <th>แผนก</th>
      <th>เบอร์มือถือ</th>
      <th>อีเมล์</th>
      <th>ตำแหน่ง</th>
    </tr>
  ';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
    <tr>  
      <td>'.$row["userid"].'</td>  
      <td>'.$row["username"].'</td>  
      <td>'.$row["name"].'</td>  
      <td>'.$row["departmentName"].'</td>  
      <td>'.$row["phone"].'</td>
      <td>'.$row["email"].'</td>
      <td>'.$row["role"].'</td>
    </tr>
   ';
  }
  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=download.xls');
  echo $output;
 }
}
?>
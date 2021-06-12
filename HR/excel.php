<?php 
require_once '../connect.php'; 

$output = '';
if(isset($_POST["excel"]))
{
 $query = "SELECT leaveId, employee.userId,employee.username, leave_type.leaveTypeName, date_format(leave_from, '%d/%m/%Y') As leave_from, date_format(leave_to, '%d/%m/%Y') As leave_to, leave_description, leave_status.leaveStatusId, leave_status.leaveStatusName, note  FROM leave_main INNER JOIN leave_type ON leave_main.leaveTypeId = leave_type.leaveTypeId INNER JOIN employee ON leave_main.userId = employee.userid INNER JOIN leave_status ON leave_main.leaveStatusId = leave_status.leaveStatusId";
 $result = mysqli_query($conn, $query);
 if(mysqli_num_rows($result) > 0)
 {
  $output .='
   <table class="table" bordered="1">  
    <tr>  
      <th>ชื่อผู้ใช้งาน</th>
      <th>ประเภท</th>
      <th>ตั้งแต่ที่วันที่</th>
      <th>ถึงวันที่</th>
      <th>ลายละเอียดการลา</th>
      <th>สถานะการลา</th>
      <th>หมายเหตุ</th>
    </tr>
  ';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
    <tr>  
      <td>'.$row["username"].'</td>  
      <td>'.$row["leaveTypeName"].'</td>  
      <td>'.$row["leave_from"].'</td>  
      <td>'.$row["leave_to"].'</td>  
      <td>'.$row["leave_description"].'</td>
      <td>'.$row["leaveStatusName"].'</td>
      <td>'.$row["note"].'</td>
    </tr>
   ';
  }
  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=ตารางการลางานของพนักงาน.xls');
  echo $output;
 }
}
?>
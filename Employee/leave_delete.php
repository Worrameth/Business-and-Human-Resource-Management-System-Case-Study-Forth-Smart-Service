<?php
include_once '../connect.php';
$sql = "DELETE FROM leave_main WHERE leaveId='" . $_GET["id"] . "'";
if (mysqli_query($conn, $sql)) {
    $delete = "ลบข้อมูลการลาเรียบร้อย";
    header('Location:show_leave.php');
} else {
    $delete = "Error deleting record: " . mysqli_error($conn);
}
mysqli_close($conn);
?>
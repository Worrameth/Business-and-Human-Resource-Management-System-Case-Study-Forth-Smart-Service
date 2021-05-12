<?php
include_once 'connect.php';
$sql = "DELETE FROM employee WHERE userid='" . $_GET["id"] . "'";
if (mysqli_query($conn, $sql)) {
    $delete = "ลบข้อมูลนักศึกษาเรียบร้อย";
    header('Location:employee.php');
} else {
    $delete = "Error deleting record: " . mysqli_error($conn);
}
mysqli_close($conn);
?>
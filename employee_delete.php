<?php
include_once 'connect.php';
$sql = "DELETE FROM employee WHERE userid='" . $_GET["id"] . "'";
if (mysqli_query($objCon, $sql)) {
    $delete = "ลบข้อมูลนักศึกษาเรียบร้อย";
    header('Location:employee.php');
} else {
    $delete = "Error deleting record: " . mysqli_error($objCon);
}
mysqli_close($objCon);
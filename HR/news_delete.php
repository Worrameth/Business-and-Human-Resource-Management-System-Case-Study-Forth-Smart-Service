<?php
include_once '../connect.php';
$sql = "DELETE FROM news WHERE newsId='" . $_GET["id"] . "'";
if (mysqli_query($conn, $sql)) {
    $delete = "ลบข้อมูลนักศึกษาเรียบร้อย";
    header('Location:news.php');
} else {
    $delete = "Error deleting record: " . mysqli_error($conn);
}
mysqli_close($conn);
?>
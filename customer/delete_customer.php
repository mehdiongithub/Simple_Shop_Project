<?php

require '../database/database.php';

$id = $_GET['id'];

$sql = "Delete From customer where cno = $id ";

$result = mysqli_query($conn, $sql);

if ($result) {
    header("location: http://localhost/shopping/TodayProject/customer/");
} else {
    echo '<div class="alert alert-danger alert-dismissible">
  <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
  <strong>Failed!</strong> becasue of thes error .<strong>' . mysqli_error($conn) . '
</strong></div>';
}
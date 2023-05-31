<?php

require '../database/database.php';

if ($_SERVER['REQUEST_METHOD'] == "POST"){

    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    $sql = "Insert into `customer`(`name`,`phone`,`address`) values ('$name','$phone','$address')";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("location: http://localhost/shopping/TodayProject/customer/");
    } else {
        echo '<div class="alert alert-danger alert-dismissible">
  <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
  <strong>Failed!</strong> becasue of thes error .<strong>' . mysqli_error($conn) . '
</strong></div>';
    }

}
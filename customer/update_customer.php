<h1>Update Customer</h1>

<?php

require '../database/database.php';

$id = $_POST['cnoEdit'];
$name = $_POST['customer_name'];
$phone = $_POST['customer_phone'];
$address = $_POST['customer_address'];

$sql = "update customer set name='$name',phone ='$phone', address = '$address' where cno = $id";

$result = mysqli_query($conn, $sql);

if ($result) {
    header("location: http://localhost/shopping/TodayProject/customer/");
} else {
    echo '<div class="alert alert-danger alert-dismissible">
  <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
  <strong>Failed!</strong> becasue of thes error .<strong>' . mysqli_error($conn) . '
</strong></div>';
}
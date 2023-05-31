<?php

require '../database/database.php';

if (isset($_FILES['photo'])) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $product = $_POST['name'];
        $price = $_POST['price'];

        $file_name = $_FILES['photo']['name'];
        $file_size = $_FILES['photo']['size'];
        $file_temp = $_FILES['photo']['tmp_name'];
        $file_type = $_FILES['photo']['type'];
        move_uploaded_file($file_temp, "upload_photo/$file_name");

        $sql = "INSERT INTO `product` (`name` ,`price`,`photo`) values ('$product','$price','$file_name')";

        $result = mysqli_query($conn, $sql);

        if ($result) {
            header("location: /../product/index.php");
        } else {
            echo '<div class="alert alert-danger alert-dismissible">
  <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
  <strong>Failed!</strong> becasue of thes error .<strong>' . mysqli_error($conn) . '
</strong></div>';
        }

    }
}
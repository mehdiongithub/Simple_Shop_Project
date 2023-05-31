<?php

require '../database/database.php';


if (isset($_FILES['photoEdit'])) {

    $file_name = $_FILES['photoEdit']['name'];
    $file_size = $_FILES['photoEdit']['size'];
    $file_temp = $_FILES['photoEdit']['tmp_name'];
    $file_type = $_FILES['photoEdit']['type'];
    move_uploaded_file($file_temp, 'upload_photo/' . $file_name);


    $id = $_POST['pnoEdit'];
    $name = $_POST['edit_product_name'];
    $price = $_POST['priceEdit'];


    $sql = "Update product set name ='$name',price='$price',photo='$file_name' where pno = $id";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("location: http://localhost/shopping/TodayProject/product/");
    } else {
        echo '<div class="alert alert-danger alert-dismissible">
  <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
  <strong>Failed!</strong> becasue of thes error .<strong>' . mysqli_error($conn) . '
</strong></div>';
    }

}
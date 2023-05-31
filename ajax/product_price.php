<?php


require '../database/database.php';

if ($_POST['type'] == ''){
    $sql = 'Select * from product';

    $result = mysqli_query($conn, $sql);

    $str = '';
    while ($row = mysqli_fetch_assoc($result)){
        $str .="<option value='{$row['pno']}'>{$row['name']}</option>";
    }

}
else if ($_POST['type'] == 'price'){
    $name = $_POST['name'];

    $sql = "Select price from product where pno ='$name'";

    $result = mysqli_query($conn, $sql);

    $str = '';
    while ($row = mysqli_fetch_assoc($result)) {
        $str .= "<option value='{$row['price']}'>{$row['price']}</option>";
    }

}
echo $str;
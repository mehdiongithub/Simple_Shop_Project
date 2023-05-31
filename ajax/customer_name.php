<?php


require '../database/database.php';

if ($_POST['type'] == '') {
    $sql = 'Select * from customer';

    $result = mysqli_query($conn, $sql);

    $str = '';
    while ($row = mysqli_fetch_assoc($result)) {
        $str .= "<option value='{$row['cno']}'>{$row['name']}</option>";
    }

}

echo $str;
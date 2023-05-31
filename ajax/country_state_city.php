<?php


require '../database/database.php';

if ($_POST['type']==''){
    $sql = "Select * from country";

    $result = mysqli_query($conn,$sql);



    $str = '';

    while ($row = mysqli_fetch_assoc($result)){
        $str.="<option value='{$row['cno']}'>{$row['name']}</option>";
    }

}
elseif ($_POST['type']== 'state'){
    $id = $_POST['id'];
    $sql = "Select * from state_country where cno = $id";

    $result = mysqli_query($conn,$sql);



    $str = '';
    ?>
    <option value="">Select State</option>
    <?php
    while ($row = mysqli_fetch_assoc($result)){
        $str.="<option value='{$row['sno']}'>{$row['name']}</option>";
    }
}

elseif ($_POST['type']== 'city'){
    $id = $_POST['id'];
    $sql = "Select * from city_state where sno = $id";

    $result = mysqli_query($conn,$sql);



    $str = '';
    ?>
    <option value="">Select City</option>
    <?php
    while ($row = mysqli_fetch_assoc($result)){
        $str.="<option value='{$row['cno']}'>{$row['name']}</option>";
    }
}
echo $str;

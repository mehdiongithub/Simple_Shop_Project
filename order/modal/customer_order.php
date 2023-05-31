<?php

require '../../database/database.php';

$sql = 'Select * from customer order by cno desc';
$result = mysqli_query($conn, $sql);
$str ='';

while ($row = mysqli_fetch_assoc($result)){
    $str .="<option value='{$row['cno']}'>{$row['name']}</option>";
}
echo $str;

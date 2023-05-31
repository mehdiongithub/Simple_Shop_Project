<?php

require '../database/database.php';

$sql = "CREATE TABLE `today_project`.`order_product` ( `oid` INT(11) NOT NULL , `product_id` INT(40) NOT NULL , `quantity` INT(15) NOT NULL , `price` INT(30) NOT NULL , `ammount` INT(25) NOT NULL )";

$result = mysqli_query($conn,$sql);

if ($result){
    echo 'table has created successfully';
}else{
    echo 'table already exist';
}
<?php

require '../database/database.php';

$sql = "CREATE TABLE `today_project`.`orders` ( `oid` INT(11) NOT NULL AUTO_INCREMENT , `customer_id` INT(40) NOT NULL , `country` INT(30) NOT NULL , `state` INT(30) NOT NULL , `city` INT(25) NOT NULL , `total` INT(25) NOT NULL , `pay_amount` INT(25) NOT NULL , `remaining_amount` INT(25) NOT NULL , PRIMARY KEY (`oid`))";

$result = mysqli_query($conn,$sql);

if ($result){
    echo "your database created";
}else{
    echo "your database already created";
}
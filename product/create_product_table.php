<?php

require '../database/database.php';

$sql = "CREATE TABLE `today_project`.`product` ( `pno` INT(11) NOT NULL AUTO_INCREMENT , `name` VARCHAR(40) NOT NULL , `price` INT(15) NOT NULL , `photo` VARCHAR(100) NOT NULL , PRIMARY KEY (`pno`))";

$result = mysqli_query($conn,$sql);

if ($result){
    echo "your database created";
}else{
    echo "your database already created";
}
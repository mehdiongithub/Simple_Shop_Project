<?php

require '../database/database.php';

$sql = "CREATE TABLE `today_project`.`customer` ( `cno` INT(11) NOT NULL AUTO_INCREMENT , `name` VARCHAR(40) NOT NULL , `phone` VARCHAR(30) NOT NULL , `address` VARCHAR(100) NOT NULL , PRIMARY KEY (`cno`))";

$result = mysqli_query($conn,$sql);
if ($result){
    echo "your database created";
}else{
    echo "your database already created";
}
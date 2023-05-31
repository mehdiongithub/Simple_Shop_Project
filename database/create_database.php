<?php

$conn = mysqli_connect('localhost','root','');

$sql = "CREATE DATABASE today_project";
$result = mysqli_query($conn,$sql);

if ($result){
    echo "your database created";
}else{
    echo "your database already created";
}
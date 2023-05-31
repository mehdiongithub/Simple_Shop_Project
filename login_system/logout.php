<?php

//What is session ?

//Used to manage information across difference Page

session_start();

if ((isset($_SESSION['loggedin']) == true) || isset($_SESSION['signup']) == true){
    header("location: login.php");
    exit;
}
session_unset();
session_destroy();


?>
<?php

session_start();

require_once __DIR__ . "/validation.php";
require_once __DIR__ . "/helper.php";
require_once __DIR__ . "/../database/connection.php";

if ($_SERVER['REQUEST_METHOD'] !== "POST"){
   
    error(405,"method not allowed");
}

$_SESSION['_old'] = $_POST;
$_SESSION['_errors'] = [];


editValidation();


$DB = connction();


$passEdit= "";

if(isset($_POST['password']) && !empty($_POST['password'])){
    $hashPass = password_hash($_POST['password'],PASSWORD_DEFAULT);
    $passEdit = "password = '{$hashPass}',";
};



$DB->exec("UPDATE students
            SET 
            first_name = '{$_POST['firstName']}',
            last_name = '{$_POST['lastName']}',
            email = '{$_POST['email']}',
             {$passEdit}
            age = '{$_POST['age']}',
            phone = '{$_POST['phone']}'
            WHERE id = '{$_POST['student_id']}'

 ");
unset($_SESSION['_old']);
 header("location: ../index.php");
 
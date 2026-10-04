<?php
require_once __DIR__ . "/helper.php";
require_once __DIR__ . "/../database/connection.php";

header('Content-Type: application/json; charset=UTF-8');



if ($_SERVER['REQUEST_METHOD'] !== "POST"){
   
    apiError(405,"method not allowed");
}

if(!isset($_POST['student_id'])){
    apiError(422,"unprocessable Entity");
};


$DB = connection();

$DB->exec("DELETE FROM students WHERE id = '{$_POST['student_id']}';");

apiError(200,"DELETE SUCCESS");













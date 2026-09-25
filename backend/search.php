<?php


require_once __DIR__ . "/getStudents.php";
require_once __DIR__ . "/helper.php";

header('Content-Type: application/json; charset=UTF-8');

if ($_SERVER['REQUEST_METHOD'] !== "POST"){
   
    apiError(405,"method not allowed");
}



if(!isset($_POST['search'])){
    apiError(422,"Unprocessable entity");
}

$students = getStudents($_POST['search']);






echo json_encode($students);



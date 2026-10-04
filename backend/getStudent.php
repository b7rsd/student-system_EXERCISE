<?php
session_start();
require_once __DIR__ . "/../database/connection.php";
require_once __DIR__ . "/helper.php";


if ($_SERVER['REQUEST_METHOD'] !== "GET"){
   
    error(405,"method not allowed");
}

if(!isset($_GET['student_id'])){
    error(422,"unprocessable Entity");
};

if(empty($_SESSION['_errors'])){
    $DB = connection();


$stmt = $DB->query("SELECT id as student_id,first_name as firsName,last_name as lastName,email,age,phone FROM students WHERE id = '{$_GET['student_id']}'
");


$student = $stmt->fetch();

if(empty($student)){
    error(422,"invalid id");
}
$_SESSION['_old'] = $student;

}
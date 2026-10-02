<?php
require_once __DIR__ . "/../database/connection.php" ;
function validation(){

foreach($_POST as $field => $value){
    validateRequired($field,$value);
    if($field === "email"){
        validateEmail($field,$value);
        validateUnique($field,$value,"students");
    }else if($field === "phone"){
        validatePhone($field,$value);
    validateUnique($field,$value,"students");
        }
    
}
if(!empty($_SESSION['_errors'])){
    
    back();
}

}



function editValidation(){

foreach($_POST as $field => $value){
    if($field != "password"  && $field != "student_id"){
        validateRequired($field,$value);
    }
    if($field === "email"){
        validateEmail($field,$value);
        validateUnique($field,$value,"students",(int)$_POST['student_id']);
    }else if($field === "phone"){
        validatePhone($field,$value);
    validateUnique($field,$value,"students",(int)$_POST['student_id']);
        }
    
}
if(!empty($_SESSION['_errors'])){
    back();
}

}







function validateRequired(string $field , mixed $value){
if($value === null || trim((string)$value) === ""){
    addError($field,"{$field} is required");
};
}

function addError(string $field , mixed $msg){


$_SESSION['_errors'][$field][] = $msg;
}

function validateEmail(String $field , mixed $value){

if(empty($value)){
return;}

$regex = "/^[A-Za-z_][A-Za-z_0-9\-\.]+@(gmail|yahoo)\.(com|org)$/";
if(preg_match($regex,$value) == 0 || preg_match($regex,$value) === false){
    addError($field,"it must be valid email");
}



}



function validatePhone(String $field , mixed $value){

if(empty($value)){return;}

$regex = "/^(02)?01(0|1|2|5)[0-9]{8}$/";

if(preg_match($regex,$value) == 0 ){
    addError($field,"it must be valid phone number");

    }
}
function validateUnique(String $field , mixed $value,string $tableName,?int $exceptid = null){

if(empty($value)){return;}


$DB = connction();

    $subquery = "";
    if ($exceptid !== null){
        $subquery = "AND id != '{$exceptid}'";
    }

    $stmt = $DB->query("SELECT * FROM {$tableName} WHERE {$field} = '{$value}' {$subquery};");

    $result = $stmt->fetchAll();

    if (!empty($result)) {
        addError($field, "{$field} already exists");
    }



}

<?php

function pr(mixed $r,bool $die = false) {
    echo "<pre>";
    print_r($r);
    echo "</pre>";
    if($die){
        exit;
    }
}

function error(int $code , string $message){
    http_response_code($code);
    echo $message;
    
}


function apiError(int $code , string $msg){
    http_response_code($code);
    echo json_encode([
        "status" => $code,
        "message" => $msg
    ]);
    exit;
}


function back(){

$path = $_SERVER['HTTP_REFERER'];
header("location: {$path}");
}

function getError(string $key){
$htmlErr = "" ;

if(isset($_SESSION['_errors'][$key])){
    $htmlErr = "  <p class='alert alert-danger mt-2'> {$_SESSION['_errors'][$key][0] }</p>";
    unset($_SESSION['_errors'][$key]);
    
}
return $htmlErr;
}

function old(string $key){
return $_SESSION['_old'][$key] ?? '';


}

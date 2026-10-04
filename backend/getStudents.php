<?php

require_once __DIR__ . "/../backend/helper.php";
require_once __DIR__ . "/../database/connection.php";



function getStudents(string $search = "",int $page = 1){

$DB = connection();

$offset = ($page * 10) -10;


$stmt = $DB->query("SELECT * FROM students WHERE first_name LIKE '%{$search}%'
 or last_name LIKE '%{$search}%' or email LIKE '%{$search}%' or age LIKE '%{$search}%'
  or phone LIKE '%{$search}%'
  LIMIT 10 OFFSET {$offset}



;");

$result = $stmt->fetchAll();



return $result;
}

function getStudentCount(string $search = ""){

        
      $DB = connection();

    if(isset($search) && $search !== ""){
$stmt = $DB->query("
    SELECT COUNT(*) AS total
    FROM students
    WHERE first_name LIKE '%{$search}%'
       OR last_name LIKE '%{$search}%'
       OR email LIKE '%{$search}%'
       OR age LIKE '%{$search}%'
       OR phone LIKE '%{$search}%'
");
    }else{
        $stmt = $DB->query("
    SELECT COUNT(*) AS total
    FROM students
");
}


    $res = $stmt->fetch();
    return $res['total'];

}
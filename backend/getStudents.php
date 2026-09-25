<?php



function getStudents(string $search = "",int $page = 1){
    
require_once __DIR__ . "/../backend/helper.php";
require_once __DIR__ . "/../database/connection.php";

$DB = connction();

$offset = ($page * 10) -10;


$stmt = $DB->query("SELECT * FROM students WHERE first_name LIKE '%{$search}%'
 or last_name LIKE '%{$search}%' or email LIKE '%{$search}%' or age LIKE '%{$search}%'
  or phone LIKE '%{$search}%'
  LIMIT 10 OFFSET {$offset}



;");

$result = $stmt->fetchAll();



return $result;
}

function getStudentCount(){
    $DB = connction();
    $stmt = $DB->query("SELECT COUNT(*) AS total FROM students;
    
    ");
    $res = $stmt->fetch();
    return $res['total'];
}

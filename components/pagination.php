<?php

require_once __DIR__ . "/../backend/getStudents.php";


function pagination(string $paginationSearch = ""){

if(isset($paginationSearch) && $paginationSearch !== ""){
    $paginationNum = ceil(getStudentCount($paginationSearch) / 10);

}else{
  $paginationNum = ceil(getStudentCount() / 10);
}
if($paginationNum < 1){

}else{
$currentPAge = 1 ;

if(isset($_GET['page']) && $_GET['page'] > 1){
    $currentPAge = (int)$_GET['page'];
}

$liHTML = "";
for($i = 0 ; $i <= $paginationNum + 1 ; $i++){


$isActive = ($i === $currentPAge) ? "active" : "";

if($i === 0){

$isDisabled = ($currentPAge == 1) ? "disabled" :false;
$previousPage = ($currentPAge >= 2) ? ($currentPAge - 1) : 1;
$liHTML .= "<li class='page-item'><a class='page-link {$isDisabled}' href='index.php?page={$previousPage}'>Previous</a></li>";
continue;
}elseif($i == $paginationNum + 1){


$isDisabled = ($currentPAge == $paginationNum) ? "disabled" :false;
$nextPage = ($currentPAge <= 5) ? ($currentPAge + 1) : 6;   
$liHTML .= "<li class='page-item'><a class='page-link {$isDisabled}' href='index.php?page={$nextPage}'>Next</a></li>";
continue;
};



$liHTML .=    " <li class='page-item'><a class='page-link {$isActive}' href='index.php?page={$i}'>{$i}</a></li>";

}
echo $liHTML;
}
}

if(isset($_POST['search'])){
    pagination($_POST['search']);
}
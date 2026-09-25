<?php

require_once __DIR__ . "/../backend/getStudents.php";

$PGNUM = ceil(getStudentCount() / 10);

$currentPAge = 1 ;

if(isset($_GET['page']) && $_GET['page'] > 1){
    $currentPAge = (int)$_GET['page'];
}

$liHTML = "";
for($i = 0 ; $i <= $PGNUM + 1 ; $i++){

$isActive = ($i === $currentPAge) ? "active" : "";

if($i === 0){

$isDisabled = ($currentPAge == 1) ? "disabled" :false;
$previousPage = ($currentPAge >= 2) ? ($currentPAge - 1) : 1;
$liHTML .= "<li class='page-item'><a class='page-link {$isDisabled}' href='index.php?page={$previousPage}'>Previous</a></li>";
continue;
}elseif($i == $PGNUM + 1){

$isDisabled = ($currentPAge == $PGNUM) ? "disabled" :false;
$nextPage = ($currentPAge <= 5) ? ($currentPAge + 1) : 6;   
$liHTML .= "<li class='page-item'><a class='page-link {$isDisabled}' href='index.php?page={$nextPage}'>Next</a></li>";
continue;
};



$liHTML .=    " <li class='page-item'><a class='page-link {$isActive}' href='index.php?page={$i}'>{$i}</a></li>";

}
echo $liHTML;

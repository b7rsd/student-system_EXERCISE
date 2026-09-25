<?php




 function connction(): PDO
 {



$DNS =  "mysql:host=localhost;dbname=register";
$USERNAME = "root";
$PASSWORD = "";


try {
    $DB = new PDO($DNS,$USERNAME,$PASSWORD);
    $DB->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Database connction Faild: {$e->getMessage()}";
    exit;
}

return $DB;

 } 









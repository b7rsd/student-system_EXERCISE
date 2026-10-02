<?php




 function connction(): PDO
 {



$DNS =  "mysql:host=fdb1029.awardspace.net;dbname=4793740_register";
$USERNAME = "4793740_register";
$PASSWORD = "Aa12345678";


try {
    $DB = new PDO($DNS,$USERNAME,$PASSWORD);
    $DB->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Database connction Faild: {$e->getMessage()}";
    exit;
}

return $DB;

 } 









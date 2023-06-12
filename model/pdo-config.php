<?php

//328/PizzaPlanet/model/pdo-config.php

//define connection variables
define("DB_DSN", "mysql:dbname=nathanwa_sdev328");
define("DB_USERNAME", "nathanwa_sdev328");
define("DB_PASSWORD", "nathanwa_sdev328");

//try {
//    //Instantiate a database object
//    $dbh = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
//    echo 'Connected to database!!';
//} catch (PDOException $e) {
//    echo $e->getMessage();
//}
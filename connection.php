<?php

$dbHost = "localhost";
$dbUser = "root";
$dbPass = "";
$dbName = "restaurant_project";


try {
    $conn = new PDO("mysql:host=$dbHost; dbname=$dbName"  ,$dbUser , $dbPass);
}catch (Exception $e)
{
    echo $e->getMessage();
    exit();
}

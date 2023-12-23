<?php

$dbHost = "localhost";
$dbUser = "root";
$dbPass = "";
$dbName = "restaurant_project";
$conn = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);
$id = $_GET["id"];

$sqlUpdate = "UPDATE cart_client SET quantity = quantity - 1 WHERE id = $id";
$sqlDelete = "DELETE FROM cart_client WHERE id = $id AND quantity = 0";


$result = mysqli_query($conn, $sqlUpdate);
$result = mysqli_query($conn , $sqlDelete);
header("location:checkout.php");


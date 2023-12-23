<?php
$dbHost = "localhost";
$dbUser = "root";
$dbPass = "";
$dbName = "restaurant_project";
$conn = mysqli_connect($dbHost,$dbUser , $dbPass , $dbName);
$id = $_GET["id"];

$sql = "UPDATE cart_client SET quantity = quantity + 1 WHERE id = $id";

$result = mysqli_query($conn , $sql);
header("location:checkout.php");


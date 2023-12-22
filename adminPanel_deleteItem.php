<?php
$dbHost = "localhost";
$dbUser = "root";
$dbPass = "";
$dbName = "restaurant_project";
$conn = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);
$id = $_GET["id"];

$sql = "DELETE FROM prouducts WHERE id_product = $id";

$result = mysqli_query($conn, $sql);

if ($result) {
    header("Location:adminPanel_products.php");
    exit();
} else {
    die(mysqli_error($conn));
}
?>

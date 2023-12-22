<?php
function calculateTotalPrice() {
    session_start();
    $dbHost = "localhost";
    $dbUser = "root";
    $dbPass = "";
    $dbName = "restaurant_project";
    $conn = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);
    if (isset($_SESSION['user'])) {
        $phone = $_SESSION['user']['phone'];
        $sql = "SELECT id_client FROM clients WHERE  phone = '$phone'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $id = $row['id_client'];

        // calculate total price from database;
        $sql = "SELECT SUM(c.quantity * p.price) AS total_price
                FROM cart_client c
                JOIN prouducts p ON c.id_product = p.id_product
                WHERE c.id_client = '$id'";

        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $total_price = $row["total_price"];
        return $total_price;
    }
    return "0.0";
}


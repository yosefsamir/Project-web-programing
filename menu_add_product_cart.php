<?php
    $dbHost = "localhost";
    $dbUser = "root";
    $dbPass = "";
    $dbName = "restaurant_project";
    $conn = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);

    $id_client = $_GET['id'];
    $id_product = $_GET['id_food'];

    // Check if the combination exists
    $checkSql = "SELECT * FROM cart_client WHERE id_client = $id_client AND id_product = $id_product";
    $checkResult = mysqli_query($conn, $checkSql);

    if (mysqli_num_rows($checkResult) > 0) {
        // If the combination exists, update the quantity
        $updateSql = "UPDATE cart_client SET quantity = quantity + 1 WHERE id_client = $id_client AND id_product = $id_product";
        mysqli_query($conn, $updateSql);
    } else {
        // If the combination doesn't exist, insert a new record
        $insertSql = "INSERT INTO cart_client (id_client, id_product, quantity) VALUES ($id_client, $id_product, 1)";
        mysqli_query($conn, $insertSql);
    }
    $response = array('success' => true);
    echo json_encode($response);
    exit();


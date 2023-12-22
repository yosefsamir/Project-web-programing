<?php

use function PHPSTORM_META\type;

    $dbHost = "localhost";
    $dbUser = "root";
    $dbPass = "";
    $dbName = "restaurant_project";
    $conn = mysqli_connect($dbHost,$dbUser , $dbPass , $dbName);
?>
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/control%20style%20product.css">
    <link rel="stylesheet" href="css/all.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Products</title>
</head>
<body>
<script src="js/all.js"></script>
<div class="header" style="height: 200px">
    <div class="content">
        <div class="top">
            <div class="logo">
                <h1 class="hp1">RES</h1>
                <h1 class="hp2">STO</h1>
                <div class="line"></div>
            </div>
            <ul class="navbar">
                <li><a href="adminPanel_products.php" >product</a></li>
                <li><a href="adminPanel_sales.php" class="f_item" >sales</a></li>
                <li><a href="adminPanel_clients.php">clients</a></li>
            </ul>
            <div class="icons">
                <a href="#"><i class="fa-solid fa-phone"></i></a>
                <a href="#"><i class="fa-brands fa-facebook"></i></a>
                <?php
                if(isset($_SESSION['user']))
                    echo '<a href="end_session.php"><i class="fa-solid fa-user"></i></a>';
                else
                    echo '<a href="login.php"><i class="fa-solid fa-right-from-bracket"></i></a>';
                ?>
            </div>
            <div class="clear"></div>
        </div>
    </div>
</div>
<!-- products -->
<!-- table -->
<table class="table table-hover ml-4 mr-4">
    <thead>
    <tr>
        <th scope="col">order id</th>
        <th scope="col">Client Name </th>
        <th scope="col">phone number</th>
        <th scope="col">address</th>
        <th scope="col">total price </th>
        <th scope="col">order time </th>
        
    </tr>
    </thead>
    <tbody>
    <?php
    $sql = "SELECT * FROM orders";
    $data = mysqli_query($conn, $sql);

    if ($data) {
        foreach ($data as $row) {
            $id_client = $row["id_client"];
            $sql_user = "SELECT first_name, last_name, phone FROM clients WHERE id_client = $id_client";
            $user_result = mysqli_query($conn, $sql_user);            
            if ($user_result) {
                $user = mysqli_fetch_assoc($user_result);
                $user_fullname = $user["first_name"] . " " . $user["last_name"];
                $phone_number = $user["phone"];  
            }
            $time_order = $row['time_order'];
            $payment_method = $row['payment_method'];
            $total_price = $row['total_price'];
            $order_id = $row["id_order"];
            $address = $row["address"];
            $order_time = $row["time_order"];
            $order_details_link = "order-details.php?order_id=$order_id";

            echo "<tr>
                <td><a href='$order_details_link'>$order_id</a></td>
                <td>$user_fullname</td>
                <td>$phone_number</td>
                <td>$address</td>
                <td>$total_price</td>
                <td>$order_time</td>
                </tr>";
        }
    }
    ?>
</tbody>

</table>
</body>
</html>
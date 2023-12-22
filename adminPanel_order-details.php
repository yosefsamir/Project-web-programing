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
<table class="table table-hover ml-4 mr-4">
    <thead>
    <tr>
        <th scope="col">Name</th>
        <th scope="col">Category</th>
        <th scope="col">quantity</th>
        <th scope="col">price</th>
        
    </tr>
    </thead>
    <tbody>
        
        <?php
if (isset($_GET['order_id'])) {
    $order_id = $_GET['order_id'];
    $sql = "SELECT * FROM details_order WHERE id_order = $order_id";
    $result = mysqli_query($conn, $sql);
    
    if ($result && mysqli_num_rows($result) > 0) {
        $orderDetails = mysqli_fetch_all(
            $result,
            MYSQLI_ASSOC 
        );
        $total_price = 0; 
        
        foreach ($orderDetails as $detail) {
            $name = $detail['name'];
            $category = $detail['category'];
            $quant = $detail['quantity'];
            $pri = $detail['price'] ;

            echo " <tr>
            <td> $name   </td>
            <td> $category   </td>
            <td> $quant  </td>
            <td> $pri </td>
            </tr>";
            $total_price += $detail['price']; 
            
        }
        echo " <tr>
            <td>  </td>
            <td>   </td>
            <td>  </td>
            <td> $total_price</td>
            </tr>";
    }
    mysqli_close($conn);
}
?>
</tbody>


</body>
</html>
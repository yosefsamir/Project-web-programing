<?php
    include "total_order.php";
    $total_price = calculateTotalPrice();
    // session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css"> 
    <link rel="stylesheet" href="css/checkout.css">
    <link rel="stylesheet" href="/css/all.css">
    <link href="menu">
    <link rel="stylesheet" href="/css/font-awesome.min.css">
    <script src="js/all.js"></script>
    <script src="js/bootstrap.bundle.js"></script>
    <title>Checkout </title>
</head>
<body>
    <div class="header">
        <div class="content">
            <div class="top">
                <div class="logo">
                        <h1 class="hp1">RES</h1>
                        <h1 class="hp2">STO</h1>
                        <div class="line"></div>
                </div>
                <ul class="navbar">
                <li><a class="f_item"  href="index.php">Home</a></li>
                    <li><a href="menu.php">menu</a></li>
                    <li><a href="#">Shop</a></li>
                </ul>
                <div class="icons">
                    <a href="#"><i class="fa-solid fa-phone"></i></a>
                    <a href="#"><i class="fa-brands fa-facebook"></i></a>

                </div>
                <div class="clear"></div>
            </div>

            <div class="container">
                <div class="bd-example">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th scope="col">Quantity</th>
                            <th scope="col">Food Name</th>
                            <th scope="col">more/less remove</th>
                            <th scope="col">Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- check if the user is logged in -->
                        <?php

$dbHost = "localhost";
$dbUser = "root";
$dbPass = "";
$dbName = "restaurant_project";
$conn = mysqli_connect($dbHost,$dbUser , $dbPass , $dbName);
if(!isset($_SESSION['user']))
{
    header("location: login.php");
}
else
{
    $phone = $_SESSION['user']['phone'];
    $sql = "SELECT id_client FROM clients WHERE  phone = '$phone'";
    $result = mysqli_query($conn , $sql);
    $row = mysqli_fetch_assoc($result);
    $id = $row['id_client'];
    // $id = 
    $sql = "SELECT * FROM cart_client WHERE id_client = $id";
    $result = mysqli_query($conn, $sql);
    $flag = true; 
    while ($row = mysqli_fetch_assoc($result)) {
        $flag = false;
        $id_product = $row["id_product"];
        $quantity = $row["quantity"];
        $id = $row["id"];
        $sql = "SELECT name, price FROM prouducts WHERE id_product = $id_product";
        $result_product = mysqli_query($conn , $sql);
        $product_row = mysqli_fetch_assoc($result_product);
        $price = $product_row["price"];
        $name = $product_row["name"];
        $final = $quantity * $price ;
        echo "<tr>
            <th scope='row'>$quantity</th>
            <td>$name</td>
                <td>
                <div class='p_m'>
                     <a href='plus_quantity.php?id=$id' class='a1'><i class='plus fa-regular fa-square-plus'></i></a>
                     <a href='minus_quantity.php?id=$id' class='a2'><i class='minus fa-regular fa-square-minus'></i></a>
                </div>           
            </td>
            <td>$quantity x $price = $final </td>
            </tr>" ; 
        }
        echo "<tr>
        <th></th><th></th>
        <td scope='row' colspan='3' style='font-weight: bold'> Total Price: $total_price</td>
        </tr>" ; 
        if ($flag) {
            // empty cart 
            echo '<script> alert("The Cart Is Empty "); 
            </script>';
            header("location: menu.php");
        }
        
        
    }
    
    
    ?>
    </tbody>
    </table>
    <form action="" method="POST">
        <div class="input-group mb-3">
            <span class="input-group-text" id="inputGroup-sizing-default">Phone Number</span>
            <input name="phone-number" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="inputGroup-sizing-default">Address</span>
            <input name="address" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
        </div>
        <div style="text-align: center;">
            <button type="submit" class="btn btn-success center" name="order-now">Order Now</button>
        </div>
    </form>
    
        <?php 
        
        if (isset($_POST["order-now"])) {
            $phone_number = $_POST["phone-number"];
            $address = $_POST["address"];
            $id;
            $current_time = date("h:i:sa"); 
            // insert record to orders 
            $sql = "insert into orders (id_client, total_price,	phone_number,	time_order,	address )
            values('$id', '$total_price', '$phone_number','$current_time', '$address'  )";
            $res  = mysqli_query($conn ,$sql);
            $last_order_id = $conn->insert_id; 
        
            $sql = "SELECT * FROM cart_client WHERE id_client = $id";
        $result = mysqli_query($conn, $sql);
        // insert record to details_order 
        while ($row = mysqli_fetch_assoc($result)) {
            $id_product = $row["id_product"];
            $quantity = $row["quantity"];
            $sql = "SELECT name, price, description,category  FROM prouducts WHERE id_product = $id_product";
            $result_product = mysqli_query($conn , $sql);
            
            $product_row = mysqli_fetch_assoc($result_product);
            $price = $product_row["price"];
            $name = $product_row["name"];
            $description = $product_row["description"];
            $category = $product_row["category"];
            $sql = "insert into details_order(id_order, quantity, name, description, price, category )
            values('$last_order_id', '$quantity', '$name' ,'$description','$price',  '$category');
             ";
             mysqli_query($conn , $sql);


        }

        // delete from cart 
        $sql = "delete from cart_client where id_client = $id ";
        mysqli_query($conn , $sql);
        header("location: index.php");
    }
        ?>

    </div>
    </div>
            
</body>
</html>
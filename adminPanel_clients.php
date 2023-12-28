<?php
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
    <link rel="stylesheet" href="css/all.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.css">
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
                <li><a href="adminPanel_sales.php" >sales</a></li>
                <li><a href="adminPanel_clients.php" class="f_item">clients</a></li>
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
<div class="content">
    <table class="table table-hover ml-4 mr-4">
    <thead>
    <tr>
        <th scope="col">client id</th>
        <th scope="col">Name</th>
        <th scope="col">phone-number</th>
        <th>information</th>
    </tr>
    </thead>
    <tbody>
    <?php
        $sql = "SELECT * FROM clients";
        $result = mysqli_query($conn , $sql);
        $id = 1;
        while ($row = mysqli_fetch_assoc($result))
        {
            $id_db = $row['id_client'];
            $name1 = $row['first_name'];
            $name2 = $row['last_name'];
            $phone = $row['phone'];
            echo "
                <tr>
                    <td>$id</td>
                    <td>$name1  $name2</td>
                    <td>$phone</td>
                    <td><a class='btn-info btn' href='adminPanel_view_client_orders.php?id=$id_db' style='color: white'>sales</a></td>
                </tr>      
            ";
            $id++;
        }
    ?>
    </tbody>
</table>
</div>
</body>
</html>
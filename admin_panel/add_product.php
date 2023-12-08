<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/control%20style%20product.css">
    <link rel="stylesheet" href="../css/all.css">
    <link rel="stylesheet" href="../css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="add.css">
    <title>Products</title>
</head>
<body>
<script src="../js/all.js"></script>
<div class="header" style="height: 200px">
    <div class="content">
        <div class="top">
            <div class="logo">
                <h1 class="hp1">RES</h1>
                <h1 class="hp2">STO</h1>
                <div class="line"></div>
            </div>
            <ul class="navbar">
                <li><a href="products.php" class="f_item">product</a></li>
                <li><a href="sales.php" >sales</a></li>
                <li><a href="clients.php">clients</a></li>
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
    <div class="add-form">
        <form action="add_product.php" method="POST">
        <div class="add-product">
            <input type="text" name="name" id="name" placeholder="Product Name"><br><br>
            <textarea name="Description" id="" cols="30"  placeholder="Description" rows="5"></textarea><br>
            <input type="text" name="price" id="price" placeholder="price"><br><br>
            <input type="file" placeholder="Product Image"><br><br>
            <select name="" id="">
                <option value="Pizza">Pizza</option>
                <option value="Meal">Meal</option>
                <option value="Burger">Burger</option>
                <option value="more">more</option>
            </select>
            <br><br>
            <button type="button" class="btn btn-success" data-mdb-ripple-init>Add Product</button>

        </div>
    </form>
    </div>
    
</div>
</body>
</html>
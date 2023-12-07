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
                <li><a href="products.php" >product</a></li>
                <li><a href="sales.php" >sales</a></li>
                <li><a href="clients.php" class="f_item">clients</a></li>
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
        <th scope="col">client id</th>
        <th scope="col">Name</th>
        <th scope="col">phone-number</th>
        
    </tr>
    </thead>
    <tbody>
    <tr>
        <th scope="row">1</th>
        <td>shawrma</td>
        <td>dlakfkdkkafoskaf</td>
     </tr>
    <tr>
        <th scope="row">2</th>
        <td>Jacob</td>
        <td>Thornton</td>
    </tr>
    </tbody>
</table>
</body>
</html>
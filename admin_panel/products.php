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
        </div>
        <!-- products -->
        <!-- add product btn -->
        <a type="button" class="btn btn-success ml-5 " href="add_product.php" data-mdb-ripple-init > Add Product</a>
        
        <!-- table -->

      <table class="table table-hover ml-4 mr-4">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Discritpion</th>
            <th scope="col">Picture</th>
            <th scope="col">Category</th>
            <th scope="col">price</th>
            <th scope="col">Edit / Delete</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">1</th>
            <td>shawrma</td>
            <td>dlakfkdkkafoskaf</td>
            <td><img src="../img/img-order.png" alt="" width="100" height="100"></td>
            <td>pizzs</td>
            
            <td>dlakfkdkkafoskaf</td>
            <td><button type="button" class="btn btn-info" data-mdb-ripple-init>Edit</button> <button type="button" class="btn btn-danger" data-mdb-ripple-init>Danger</button></td>
          </tr>
          <tr>
            <th scope="row">2</th>
            <td>Jacob</td>
            <td>Thornton</td>
            <td><img src="../img/img-order3.png" alt="" width="100" height="100"></td>

            <td>@fat</td>
            <td>Thornton</td>   
            <td><button type="button" class="btn btn-info" data-mdb-ripple-init>Edit</button> <button type="button" class="btn btn-danger" data-mdb-ripple-init>Danger</button></td>

          </tr>
        </tbody>
      </table>
    </body>
</html>
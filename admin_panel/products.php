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
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/controlstyleproduct.css">
    <link rel="stylesheet" href="../css/all.css">
    <link rel="stylesheet" href="../css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script src="../js/http_code.jquery.com_jquery-3.6.0.js"></script>
    <script src="../js/http_cdnjs.cloudflare.com_ajax_libs_popper.js_2.10.2_umd_popper.js"></script>
    <script src="../js/bootstrap.bundle.js"></script>
    <style>
        /* Customize the color of the primary button */
        .btn-primary{
            background-color: #ED7D31;
            border-color: #ED7D31;
        }
        /* Customize the color of the primary button on hover */
        .btn-primary:hover  , .btn-primary:active , .btn-primary:focus{
            background-color: #d97d43;
            border-color: #d97d43;
        }
        .btn-success{
            width: 200px;
        }
    </style>
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
                            echo '<a href="../end_session.php"><i class="fa-solid fa-user"></i></a>';
                        else
                            echo '<a href="../login.php"><i class="fa-solid fa-right-from-bracket"></i></a>';
                        ?>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
        </div>
        <!-- products -->
        <!-- table -->
    <div class="content" style="width: 90%">
        <!-- add product btn -->
        <a type="button" class="btn btn-success ml-5 " href="add_product.php " , style="margin-bottom:30px " data-mdb-ripple-init > Add Product</a>
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
        <?php
        $sql = "SELECT * FROM prouducts ";
        $data = mysqli_query($conn , $sql);
        if ($data)
        {
            $counter = 1;
            foreach ($data as $row)
            {
                $id = $row['id_product'];
                $name = $row['name'];
                $desc = $row['description'];
                $price = $row['price'];
                $category = $row['category'];
                $img = $row['img'];
                echo "<tr>
                            <td>$counter</td>
                            <td>$name</td>
                            <td>$desc</td>
                            <td>
                            <img src='..\upload_img/$img' alt='food' width='120' height='120'>
                            </td>
                            <td>$category</td>
                            <td>$price</td>
                            <td>
                            <a href='update_product.php?update=$id' class='btn btn-info'>Update</a>
                            <button type='button' class='btn btn-danger' data-toggle='modal' data-target='#exampleModalCenter_$id' style='color: white'>Delete</button>
                            <div class='modal fade' id='exampleModalCenter_$id' tabindex='-1' role='dialog' aria-labelledby='exampleModalCenterTitle' aria-hidden='true'>
                            <div class='modal-dialog modal-dialog-centered' role='document'>
                                <div class='modal-content'>
                                    <div class='modal-header'>
                                        <h5 class='modal-title' id='exampleModalLongTitle'>Are you sure to delete this product ? </h5>
                                        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                            <span aria-hidden='true'>&times;</span>
                                        </button>
                                    </div>
                                    <div class='modal-body'>
                                    </div>
                                    <div class='modal-footer'>
                                        <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
                                        <a type='button' class='btn btn-primary' style='color: white' href='deleteItem.php?id=$id'>Delete</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                            </td>
                      </tr>";
                $counter++;
            }
        }
        ?>
        </tbody>
      </table>
    </body>
</html>
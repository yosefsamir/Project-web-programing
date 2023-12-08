<?php

    $dbHost = "localhost";
    $dbUser = "root";
    $dbPass = "";
    $dbName = "restaurant_project";
    $conn = mysqli_connect($dbHost,$dbUser , $dbPass , $dbName);
     // insert product
    if (isset($_POST["submit"]))
    {
        $name = $_POST["name"];
        $description = $_POST["description"];
        $price = $_POST["price"];
        $category = $_POST["category"];
        if($_FILES["image"]["error"] === 4)
        {
            echo "<script> alert('Image Does Not Exist')</script>";
        }
        else{
            $fileName = $_FILES["image"]["name"];
            $fileSize = $_FILES["image"]["size"];
            $tmpName = $_FILES["image"]["tmp_name"];
            $validEX = ['jpg' , 'jpeg' , 'png'];
            $imageEX = explode('.' , $fileName);
            $imageEX = strtolower(end($imageEX));
            if(!in_array($imageEX , $validEX))
            {
                echo "<script> alert('Invalid Image Extension')</script>";
            }
            else if($fileSize > 1000000)
            {
                echo "<script> alert('Image Size Is too large')</script>";
            }
            else
            {
                $newImageName = uniqid();
                $newImageName .= '.' . $imageEX;
                move_uploaded_file($tmpName , '..\upload_img/' . $newImageName);
                $sql = "INSERT INTO prouducts (name , description , price , category , img) VALUES ('$name' , '$description' , '$price' , '$category' , '$newImageName')";
                mysqli_query($conn ,$sql);
                echo "<script> alert('Successfully Added')</script>";
                header("location:products.php");
            }

        }
    }

?>

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
    <title>Add Products</title>
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

    <div class="content">
        <h3 style="color: #4F4A45">Add Product</h3>
        <form method="post" action="" enctype="multipart/form-data">
            <div class="add-form my-5">
                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" class="form-control" placeholder="Name product" name="name">
                </div>
                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <input type="text" class="form-control" placeholder="description  product" name="description">
                </div>
                <div class="mb-3">
                    <label class="form-label">Price</label>
                    <input type="text" class="form-control" placeholder="Price  product" name="price">
                </div>
                <div class="mb-3">
                    <label class="form-label">Img</label>
                    <input type="file"  name="image" id ="image" accept=".png , .jpg , .jpeg">
                </div>
                <div class="mb-3">
                    <label class="form-select" style="padding: 20px">Category</label>
                        <select class="form-label form-select-lg mb-3" name="category" required>
                                    <option selected> Open this category menu </option>
                                    <option value="Pizza">Pizza</option>
                                    <option value="Meal">Meal</option>
                                    <option value="Burger">Burger</option>
                                    <option value="more">more</option>
                        </select>
                </div>
                <button type="submit" class="btn btn-success my-lg-3" name="submit">Add Product</button>
            </div>
        </form>
    </div>
</body>
</html>
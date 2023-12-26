<?php
    include "total_order.php";
    $total_price = calculateTotalPrice();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/all.css">
    <link href="menu">
    <link rel="stylesheet" href="/css/font-awesome.min.css">
    <title>Home</title>
</head>
<script>
    function goToMenu()
    {
        window.location.href = "menu.php";
    }
</script>
<body>
    <script src="js/all.js"></script>
    <script src="js/bootstrap.bundle.js"></script>
    <div class="header">
        <div class="content">
            <div class="draw">
                <div class="poll">
                    <div class="img_food">
                        <img src="/img/Food%20image%201.png" alt="food" id="rotateImage">
                    </div>
                </div>

                <script>
                    let rotationAngle = 0;
                    const rotationSpeed = 0.5; // You can adjust the rotation speed
                    function rotateImage() {
                        rotationAngle += rotationSpeed;
                        document.getElementById('rotateImage').style.transform = `rotate(${rotationAngle}deg)`;
                    }
                    // Rotate the image every 50 milliseconds (adjust as needed)
                    setInterval(rotateImage, 25);
                </script>
            </div>
            <div class="top">
                <div class="logo">
                        <h1 class="hp1">RES</h1>
                        <h1 class="hp2">TO</h1>
                        <div class="line"></div>
                </div>
                <ul class="navbar">
                    <li><a class="f_item"  href="index.php">Home</a></li>
                    <li><a href="menu.php">menu</a></li>
                    <li><a href="#">review</a></li>
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
            <!--middle of header-->
            <div class="middle">
                <div class="left">
                    <div class="items">
                        <h1>Order your</h1>
                        <h3 class="hp1">Favourite</h3>
                        <h3 class="hp2">Foods</h3>
                        <p class="p1">Order your Favourite Foods fresh and tasty dish here will be all the components
                           of the dish and all details</p>
                        <p class="total">Total Order : <?php echo "$total_price"; ?> <sub class="city">EGP</sub></p>

                        <button class="order-now" onclick="goToMenu()"><i class="fa-solid fa-cart-shopping i_order"></i>Order Now <?php
                            if(isset($_SESSION['user']))
                                echo $_SESSION['user']['name'];
                            else
                                echo "client";
                            ?></p></button>
                    </div>
                </div>
                <div class="right">
                </div>
            </div>
        </div>
    </div>   <!--header-->

        <!--section header-->
<!--    <div class="sectionHeader">-->
<!--        <div class="content">-->
<!--            <h2 class="sectionTitle">the best recommended</h2>-->
<!--            <span class="line"></span>-->
<!--        </div>-->
<!--    </div>-->
        <!--section recommended-->
    <div class="recommended pd-y">
        <div class="sectionHeader">
            <div class="content">
                <h2 class="sectionTitle">the best recommended</h2>
                <span class="line"></span>
            </div>
        </div>
        <div class="content">
            <div class="recommend-content">

                <div class="recommend-item">
                    <img src="/img/img-order.png" class="imgOrder" alt="imgOrder">
                    <h3 class="name-food">Dish name</h3>
                    <p class="description">fresh and tasty dish here will be all the components of the dish and all details</p>
                    <p class="price">85.30 <sub class="city">EGP</sub></p>
                    <button class="btn-order" type="submit">Order Now</button>
                </div>
                <div class="recommend-item mg">
                    <img src="/img/img-order3.png" class="imgOrder" alt="imgOrder">
                    <h3 class="name-food">Dish name</h3>
                    <p class="description">fresh and tasty dish here will be all the components of the dish and all details</p>
                    <p class="price">85.30 <sub class="city">EGP</sub></p>
                    <button class="btn-order">Order Now</button>
                </div>
                <div class="recommend-item">
                    <img src="/img/img-order2.png" class="imgOrder" alt="imgOrder">
                    <h3 class="name-food">Dish name</h3>
                    <p class="description">fresh and tasty dish here will be all the components of the dish and all details</p>
                    <p class="price">85.30 <sub class="city">EGP</sub></p>
                    <button class="btn-order">Order Now</button>
                </div>
                <div class="clear"></div>


            </div>
        </div>

    </div>
</body>
</html>
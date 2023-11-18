<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/all.css">
    <link rel="stylesheet" href="/css/font-awesome.min.css">
    <link href="/webfonts/f " rel="stylesheet" />

    <title>Home</title>
</head>
<body>
    <script src="js/all.js"></script>
    <script src="js/bootstrap.bundle.js"></script>
    
    <div class="header">
        <div class="content">
            <div class="draw">
                <div class="poll"></div>
                <div class="img_food">
                    <img src="/img/Food%20image%201.png" alt="food" id="rotateImage">
                </div>
                <script>
                    let rotationAngle = 0;
                    const rotationSpeed = 1.2; // You can adjust the rotation speed
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
                        <h1 class="hp2">STO</h1>
                        <div class="line"></div>
                </div>
                <ul class="navbar">
                    <li><a class="f_item"  href="#">Home</a></li>
                    <li><a href="#">menu</a></li>
                    <li><a href="#">Shop</a></li>
                </ul>
                <div class="icons">
                    <a href="#"><i class="fa-solid fa-phone"></i></a>
                    <a href="#"><i class="fa-solid fa-magnifying-glass"></i></a>
                    <a href="#"><i class="fa-brands fa-facebook"></i></a>
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
                        <p class="total">Total Order : 85.30 <sub class="city">EGP</sub></p>

                        <button class="order-now"><i class="fa-solid fa-cart-shopping i_order"></i>Order Now</button>
                    </div>
                </div>
                <div class="right">
                </div>
            </div>
        </div>
    </div>
</body>
</html>
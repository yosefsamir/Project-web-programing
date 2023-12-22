<?php
    session_start();
    $dbHost = "localhost";
    $dbUser = "root";
    $dbPass = "";
    $dbName = "restaurant_project";
    $conn = mysqli_connect($dbHost,$dbUser , $dbPass , $dbName);
    if(isset($_SESSION['user']))
    {
        $phone = $_SESSION['user']['phone'];
        $sql = "SELECT id_client FROM clients WHERE  phone = '$phone'";
        $result = mysqli_query($conn , $sql);
        $row = mysqli_fetch_assoc($result);
        $id = $row['id_client'];
        // calculate total price from data base;
        $sql = "SELECT SUM(c.quantity * p.price) AS total_price
                FROM cart_client c
                JOIN prouducts p ON c.id_product = p.id_product
                WHERE c.id_client = '$id'";

        $result = mysqli_query($conn , $sql);
        $row = mysqli_fetch_assoc($result);
        $total_price = $row["total_price"];
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/main.css">
    <title>menu</title>
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="/css/menu.css">
    <script src="/js/http_code.jquery.com_jquery-3.6.0.js"></script>
    <script>
        function redirectToSignIn() {
            window.location.href = 'login.php';
        }
    </script>
</head>
<body>
    <script src="js/all.js"></script>
    <header>
        <nav>

            <ul class="header_list">
                <li><a href="menu.php">Meals</a></li>
                <li><a href="menu.php?cat=pizza">Pizza</a></li>
                <li><a href="menu.php?cat=burger">Burger</a></li>
                <li><a href="menu.php?cat=more"> More</a></li>
            </ul>
        </nav>

    </header>
    <aside>
        <nav class="fix">
            <ul class="top">
                <li class="name">
                    <h1><span id="res">RES</span><span id="to">TO</span></h1>
                </li>

                <li class="hello_user">
                    <h6>
                        <?php
                            if(isset($_SESSION['user']))
                            {
                                $name = $_SESSION['user']['name'];
                                echo "Hello , $name";
                            }
                            else{
                                echo "Hello , User";
                            }
                        ?>
                    </h6>
                </li>
                <li class="open">
                    <h6>open now </h6>
                </li>

                <div class="account">
                    <li>
                        <a href="index.php"><i class="fa-solid fa-house"></i></a>
                    </li>
                </div>
            </ul>
            <!-- $$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$ -->

            <ul class="middel">


                <li class="list_middel">
                    <div id="selectfiled">
                        <p id="selecttext">select way</p>
                        <i id="icon1" class="fa-solid fa-angle-down"></i>
                    </div>
                    <ul id="list" class="hide">
                        <li class="options">
                            <i class="fa-solid fa-bicycle"></i>

                            <p id="mk">delivery</p>
                        </li>
                        <li class="options">
                            <i class="fa-solid fa-utensils"></i>
                            <p id="resto">in resto</p>
                        </li>
                    </ul>
                </li>

                <li id="add">
                    <input type="text" class="address" placeholder="Enter your Location  ">
                </li>

                <script>
                    var selectfiled = document.getElementById("selectfiled")
                    var selecttext = document.getElementById("selecttext")
                    var options = document.getElementsByClassName("options")
                    var list = document.getElementById("list")
                    selectfiled.onclick = function () {
                        list.classList.toggle("hide")

                    }

                    for (option of options) {
                        option.onclick = function () {
                            selecttext.innerHTML = this.textContent
                            list.classList.toggle("hide")

                        }
                    }
                </script>
            </ul>
            <!------------------------------------- cart details and orders ------------------------------------->
            <script> // this function create in cart to load only cart if user add element not download all page ;
                function addToCart(id_food) {
                    var idClient = <?php echo $id?>;
                    $.ajax({
                        type: "GET",
                        url: "menu_add_product_cart.php",
                        data: { id: idClient, id_food: id_food },
                        dataType: "json",
                        success: function (response) {
                            console.log(response);
                            $("#cartContent").load(location.href + " #cartContent");
                            $("#total").load(location.href + " #total");
                        }
                    });
                    return false;
                }
                $(document).ready(function () {
                    $("#addToCartButton").click(function () {
                        addToCart();
                    });
                });
            </script>
            <div class="order-container">
                <div class="order_titel">
                    <i class="fa-solid fa-cart-shopping cart"></i>
                    <span id="ur-order">Your Order</span>
                </div>

                <div class="order">
                    <ul id="cartContent">
                        <?php
                            if(!isset($_SESSION['user']))
                            {
                                echo "<button class='signInOrder' onclick='redirectToSignIn()'>sign in</button>";
                            }
                            else
                            {
                                $sql = "SELECT * FROM cart_client WHERE id_client = $id";
                                $result = mysqli_query($conn, $sql);

                                while ($row = mysqli_fetch_assoc($result)) {
                                    $id_product = $row["id_product"];
                                    $quantity = $row["quantity"];
                                    $sql = "SELECT name FROM prouducts WHERE id_product = $id_product";
                                    $result_product = mysqli_query($conn , $sql);
                                    $product_row = mysqli_fetch_assoc($result_product);
                                    $name = $product_row["name"];
                                    echo "<p class='details'>$quantity x $name</p> ";
                                }
                            }
                        ?>
                    </ul>
                    <div class="total" id="total">
                        <ul>
                            <li><span id="tot">Total : <?php echo "$total_price"?></span></li>
                        </ul>
                    </div>
                </div>
                    <button class="btn-check">Check out</button>
            </div>
        </nav>
    </aside>
    <!-------------------------------------- Menu details ----------------------------------------------->

    <?php
        if(!isset($_GET['cat']))
        {
            echo "
            <div class='section_of_meals' id='page1'>
                <div class='title' id='page1'>
                    <span> Meals</span>
                </div>
            <div class='recommended pd-y'>
                <div class='content'>
                    <div class='recommend-content'>
            ";
            $sql = "SELECT * FROM prouducts WHERE category = 'meal'";
            $result = mysqli_query($conn , $sql); // اتا
            while ($row = mysqli_fetch_assoc($result))
            {
                $id_food = $row['id_product'];
                $name = $row['name'];
                $description = $row['description'];
                $img = $row['img'];
                $price = $row['price'];
                echo "
                        <div class='recommend-item'>
                            <img src='upload_img/$img' class='imgOrder' alt='imgOrder' style='width: 100%; height: 250px;'>
                            <h3 class='name-food'>$name</h3>
                            <p class='description'>$description </p>
                            <p class='price'>$price<sub class='city'>EGP</sub></p>
                        ";
                        if(isset($_SESSION['user']))
                        {
                            echo "
                             <button id='addToCartButton' class='btn-order' type='submit' onclick='addToCart($id_food)'>Order Now</button>    
                             </div>
                            ";
                        }
                        else
                        {
                            echo "
                             <button id='addToCartButton' class='btn-order' type='submit'>Order Now</button>    
                             </div>
                            ";
                        }
            }
        }
        else
        {
            $cat = $_GET["cat"];
                echo "
            <div class='section_of_meals' id='page1'>
                <div class='title' id='page1'>
                    <span>$cat</span>
                </div>
            <div class='recommended pd-y'>
                <div class='content'>
                    <div class='recommend-content'>
            ";
                $sql = "SELECT * FROM prouducts WHERE category = '$cat'";
                $result = mysqli_query($conn , $sql);
            while ($row = mysqli_fetch_assoc($result))
            {
                $id_food = $row['id_product'];
                $name = $row['name'];
                $description = $row['description'];
                $img = $row['img'];
                $price = $row['price'];
                echo "
                        <div class='recommend-item'>
                            <img src='upload_img/$img' class='imgOrder' alt='imgOrder' style='width: 100%; height: 250px;'>
                            <h3 class='name-food'>$name</h3>
                            <p class='description'>$description </p>
                            <p class='price'>$price<sub class='city'>EGP</sub></p>
                        ";
                if(isset($_SESSION['user']))
                {
                    echo "
                             <button id='addToCartButton' class='btn-order' type='submit' onclick='addToCart($id_food)'>Order Now</button>    
                             </div>
                            ";
                }
                else
                {
                    echo "
                            <button id='addToCartButton' class='btn-order' type='submit'>Order Now</button>    
                             </div>
                            ";
                }
            }
        }
        echo "
                <div class='clear'></div>
                        </div>
                    </div>
                </div>
            </div>
            ";
    ?>
</body>

</html>
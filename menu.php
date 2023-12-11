<?php
    session_start();
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
    <link rel="stylesheet" href="/css/main.css">
    <title>menu</title>
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="/css/menu.css">
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
                        <h6>Account</h6>
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

                            <p id="mk">delivary</p>
                        </li>
                        <li class="options">
                            <i class="fa-solid fa-utensils"></i>
                            <p id="resto">in resto</p>
                        </li>


                    </ul>

                <li id="add">

                    <input type="text" class="address" placeholder="Enter your Location  ">

                </li>
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

            <!-- %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% -->

            <div class="order-container">
                <div class="order_titel">
                    <span id="ur-order">Your Order</span>
                </div>

                <div class="order">
                    <ul>
                        <li>1x Chicken Meal</li>
                        <li>2x Pasta meal</li>
                    </ul>
                    <div class="total">
                        <ul>
                            <li><span id="tot">Tax :</span>
                                <sapn id="tax">8%</sapn>
                            </li>
                            <li><span id="tot">Total : </span> <sapn class="result">200</sapn>
                            </li>
                        </ul>
                    </div>
                </div>

        </nav>
        </div>

    </aside>
    <!-- %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% -->

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
            $result = mysqli_query($conn , $sql);
            while ($row = mysqli_fetch_assoc($result))
            {
                $name = $row['name'];
                $description = $row['description'];
                $img = $row['img'];
                $price = $row['price'];
                echo "
                        <div class='recommend-item'>
                            <img src='../upload_img/$img' class='imgOrder' alt='imgOrder' style='width: 100%; height: 250px;'>
                            <h3 class='name-food'>$name</h3>
                            <p class='description'>$description </p>
                            <p class='price'>$price<sub class='city'>EGP</sub></p>
                            <button class='btn-order' type='submit'>Order Now</button>    
                        </div>
                ";
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
                    $name = $row['name'];
                    $description = $row['description'];
                    $img = $row['img'];
                    $price = $row['price'];
                    echo "
                        <div class='recommend-item'>
                            <img src='../upload_img/$img' class='imgOrder' alt='imgOrder' style='width: 100%; height: 250px;'>
                            <h3 class='name-food'>$name</h3>
                            <p class='description'>$description </p>
                            <p class='price'>$price<sub class='city'>EGP</sub></p>
                            <button class='btn-order' type='submit'>Order Now</button>    
                        </div>
                ";
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
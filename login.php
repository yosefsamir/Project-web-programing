<?php
    session_start();
    include "connection.php";
    include "functions.php";
    if(isset($_POST['submit']))
    {
        $phone_number = sanitizePhoneNumber($_POST["phone_number"]);
        $password   =  filter_var($_POST["password"] , FILTER_SANITIZE_STRING);
        if($phone_number == 123 && $password == 123)
        {
            header("location:adminPanel_products.php");
        }
        if(empty($phone_number) || empty($password))
        {
            echo "<script>alert ('Please Check All input') </script>";
        }
        else
        {
            $done = "SELECT * FROM clients WHERE phone = '$phone_number'";
            $q=$conn->prepare($done);
            $q->execute();
            $data=$q->fetch();
            if(!$data)
            {
                echo "<script>alert ('error in email or password') </script>";
            }
            else
            {
                $password_hash = $data['password'];
                if(!password_verify($password , $password_hash))
                {
                    echo "<script>alert ('error in email or password') </script>";
                }
                else
                {
                    $_SESSION['user'] = [
                        "name" =>$data['first_name'],
                        "phone"=>$phone_number,
                    ];
                    header("location:index.php");
                }
            }
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>login</title>
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/all.css">
    <link rel="stylesheet" href="/css/font-awesome.min.css">
    <link href="/webfonts/f " rel="stylesheet" />
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
<style>
    /*body {*/
    /*    background: rgba(255, 0, 0, 0.0) url('img/istockphoto-1173579665-612x612.jpg') center/cover no-repeat;*/
    /*}*/
    /*body {*/
    /*    background-image: url("img/istockphoto-1173579665-612x612.jpg");*/
    /*    opacity: .5;*/
    /*}*/
</style>
<script src="js/all.js"></script>
<script src="js/bootstrap.bundle.js"></script>
<div class="all-content">

</div>

<div class="header">
    <div class="content">
        <div class="draw">

        </div>
        <div class="top">
            <div class="logo">
                <h1 class="hp1">RES</h1>
                <h1 class="hp2">STO</h1>
                <div class="line"></div>
            </div>
            <ul class="navbar">
                <li><a class="f_item"  href="index.php">Home</a></li>
                <li><a href="menu.php">menu</a></li>
                <li><a href="#">Shop</a></li>
            </ul>
            <div class="icons">
                <a href="#"><i class="fa-solid fa-phone"></i></a>
                <a href="#"><i class="fa-solid fa-magnifying-glass"></i></a>
                <a href="#"><i class="fa-brands fa-facebook"></i></a>
            </div>
            <div class="clear"></div>
        </div>
    </div>
</div>
<div class="log-in-form">
    <h1>Login</h1>
    <br>
    <form action="" method="post">
        <div class="input-data">
            <input type="tel" required placeholder="phone" class="email-input" name = "phone_number">
        </div>
        <br>
        <br>
        <div class="input-data">
            <input type="password" required placeholder=" Password" class="password-input" name = "password">
        </div>
        <br><br>
        <input type="submit" value="Login"  class="submit-btn" name="submit">
        <br><br>

        <div class="forgot-password">
            <a href="#">Forgot Password?</a>
        </div>
        <br>
        <br>
        <div class="sign-up-page">
            Don't have an account?<a href="sign-up.php">Register here!</a>
        </div>
    </form>
</div>  
</body>
</html>
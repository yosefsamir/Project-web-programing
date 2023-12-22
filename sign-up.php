<?php
    session_start();
    include "connection.php";
    include "functions.php";
    if(isset($_POST["submit"]))
    {
        $first_name = filter_var($_POST["first_name"] , FILTER_SANITIZE_STRING);
        $last_name =  filter_var($_POST["last_name"] , FILTER_SANITIZE_STRING);
        $phone_number = sanitizePhoneNumber($_POST["phone_number"]); // function to check phone !!
        $password   =  filter_var($_POST["password"] , FILTER_SANITIZE_STRING);
        $confirm_password = filter_var($_POST["password_confirm"] , FILTER_SANITIZE_STRING);
        $done = "SELECT phone FROM clients WHERE phone = '$phone_number'";
        $q=$conn->prepare($done);
        $q->execute();
        $data=$q->fetch();
        if($data)
        {
            echo  "<script>alert('phone is used before')</script>";
        }
        else if(empty($first_name) || empty($last_name) || empty($phone_number) || empty($password) || empty($confirm_password))
            echo  "<script>alert('all input required')</script>";
        else
        {
            $password = password_hash($password , PASSWORD_DEFAULT);
            $done = "INSERT INTO clients (first_name , last_name ,phone, password) VALUES ('$first_name' , '$last_name' , '$phone_number' , '$password')";
            $conn->prepare($done)->execute();
            $_POST["first_name"] = "";
            $_POST["last_name"] = "";
            $_POST["phone_number"] = "";
            $_POST["password"] = "";
            $_POST["password_confirm"] = "";
            $_SESSION['user'] = [
                    "name" =>$first_name,
                    "phone"=>$phone_number,
            ];
            header("location:index.php");
        }
    }
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>page</title>
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/all.css">
    <link rel="stylesheet" href="/css/font-awesome.min.css">
    <link href="/webfonts/f " rel="stylesheet" />
    <link rel="stylesheet" href="css/sign-up.css">

</head>
<script>
    function validateForm() {
        const password = document.getElementById("password").value;
        const confirmPassword = document.getElementById("confirm_password").value;

        if (password !== confirmPassword) {
            alert("Error: Passwords do not match. Please try again.");
            return false;
        }
        else if(password.length < 4)
        {
            alert("password is short");
            return false;
        }
        return true;
    }
</script>
<body>
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
    </div>
</div>
<div class="log-in-form">
    <h1>Sign Up</h1>
    <br>
    <form method="post" onsubmit="return validateForm()">
        <div class="input-data-" >
            <input type="text" required placeholder=" First Name" class="Name-input" name="first_name">
            <input type="text" required placeholder=" Last Name" class="Name1-input" name = "last_name">
        </div>
    
        <br>
        <div class="input-data">
            <input type="tel" required placeholder=" Phone Number" class="Phone-input" name="phone_number" >
        </div>
        <br>
        <div class="input-data">
            <input type="password" required placeholder=" Password" class="Password-input" name="password" id="password">
        </div>
        <br>
        <div class="input-data">
            <input type="password" required placeholder=" Password Confirm" class="Password2-input" name = password_confirm id="confirm_password">
        </div>
        <br>
        
        <input type="submit" value="Sign Up" class="submit-btn" name = "submit">
        <br>
        <br>
        <div class="sign-up-page">
            Already have an account? <a href="login.php">Login!</a>
        </div>
    </form>
</div>  
</body>
</html>
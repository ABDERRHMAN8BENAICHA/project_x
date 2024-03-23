<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="./css/login.css">
    <title>Log In Page</title>
    <style>
        .alert {
            padding: 20px;
            background-color: #f44336;
            color: white;
            position: absolute;
            top: 0px;
            z-index: 80;
            border-radius: 10px;
            width: 50%;
        }

        .closebtn {
            margin-left: 15px;
            color: white;
            font-weight: bold;
            float: right;
            font-size: 22px;
            line-height: 20px;
            cursor: pointer;
            transition: 0.3s;
        }

        .closebtn:hover {
            color: black;
        }

        label {
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div class="logo"><a href="index.php">
            <h1>Project X</h1>
        </a></div>
    <div class="container" id="container">
        <div class="form-container sign-up">
            <form method="POST" enctype="multipart/form-data">
                <h1>Create Account</h1>
                <span>or use your email for registeration</span>
                <input type="text" required placeholder="Name" name="name">
                <input type="email" required placeholder="Email" name="email">
                <input type="number" required placeholder="Phone" name="phone">
                <input type="text" required placeholder="Address" name="address">
                <input type="password" required placeholder="Password" name="password">
                <input type="file" required placeholder="" name="photo">
                <div style="display: flex;gap: 10px; justify-content: center; aling-items:center;">
                    <label for="owner">Owner</label>
                    <input type="radio" required id="owner" name="radio" value="owner">
                    <label for="client">Client</label>
                    <input type="radio" required id="client" name="radio" value="client">
                </div>
                <button name="signup" type="submit">Sign Up</button>
            </form>
        </div>
        <div class="form-container sign-in">
            <form method="POST">
                <h1>Sign In</h1>
                <div class="social-icons">
                    <a href="#" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-github"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-linkedin-in"></i></a>
                </div>
                <span>or use your email password</span>
                <input type="email" required placeholder="Email" name="email">
                <input type="password" required placeholder="Password" name="password">
                <a href="#">Forget Your Password?</a>
                <div style="display: flex;gap: 10px; justify-content: center; aling-items:center;">
                    <label for="owner1">Owner</label>
                    <input type="radio" required id="owner1" name="radio" value="owner">
                    <label for="client1">Client</label>
                    <input type="radio" required id="client1" name="radio" value="client">
                    <label for="admin1">Admin</label>
                    <input type="radio" required id="admin1" name="radio" value="admin">
                </div>
                <button name="signin" type="submit">Sign In</button>
            </form>
        </div>
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h1>Welcome Back!</h1>
                    <p>Enter your personal details to use all of site features</p>
                    <button class="hidden" id="login">Sign In</button>
                </div>
                <div class="toggle-panel toggle-right">
                    <h1>Hello, Friend!</h1>
                    <p>Register with your personal details to use all of site features</p>
                    <button class="hidden" id="register">Sign Up</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        const container = document.getElementById('container');
        const registerBtn = document.getElementById('register');
        const loginBtn = document.getElementById('login');

        registerBtn.addEventListener('click', () => {
            container.classList.add("active");
        });

        loginBtn.addEventListener('click', () => {
            container.classList.remove("active");
        });
        ///////////////////////////////////////////////////
        let close = document.getElementsByClassName("closebtn");
        let i;
        for (i = 0; i < close.length; i++) {
            close[i].onclick = function () {
                let div = this.parentElement;
                div.style.opacity = "0";
                setTimeout(function () { div.style.display = "none"; }, 600);
            }
        }

    </script>
</body>

</html>


<?php


include "./includes/conn.php";


if (isset($_POST["signup"])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $address = $_POST["address"];
    $password = $_POST["password"];
    $file_name = "";
    if (isset($_FILES["photo"])) {
        $image = $_FILES["photo"]["name"];
        $file_name = uniqid() . $image;
        move_uploaded_file($_FILES["photo"]["tmp_name"], "./uploads/user-img/" . $file_name);
    }
    if ($_POST["radio"] == "client") {
        $chekEmail = "SELECT * FROM client WHERE email = '$email'";
        $res = $conn->query($chekEmail);
        if (mysqli_num_rows($res) > 0) {
            ?>
            <div class='alert'>
                <span class='closebtn' onclick='this.parentElement.style.display=`none`;'>&times;</span>
                This email is used, Try another One Please!
            </div>
            <?php
        }
        // $_SESSION["user"][] = ["name" => $name, "email" => $email, "password" => $password];
        $insert = "INSERT INTO client (name, email, password , address, phone,photo) values('$name','$email','$password','$address','$phone','$file_name') ";
        if ($conn->query($insert) === true) {
            $sql = "SELECT * FROM  client where name= '$name' and email ='$email' ";
            $result = $conn->query($sql);
            $row = mysqli_fetch_assoc($result);
            // $_SESSION["user"][] = ["id" => $row["id"], "email" => $row["email"], "name" => $row["name"]];
            $_SESSION["id"] = $row["id_client"];
            $_SESSION["name"] = $row["name"];
            $_SESSION["email"] = $row["email"];
            $_SESSION["address"] = $row["address"];
            $_SESSION["phone"] = $row["phone"];
            $_SESSION["type"] = "client";
            $_SESSION["photo"] = $row["photo"];
            echo "<script>location.href='index.php';</script>";
            exit();
        } else {
            echo "bad";
        }
    }
    if ($_POST["radio"] == "owner") {
        $chekEmail = "SELECT * FROM owner WHERE email = '$email'";
        $res = $conn->query($chekEmail);
        if (mysqli_num_rows($res) > 0) {
            ?>
            <div class='alert'>
                <span class='closebtn' onclick='this.parentElement.style.display=`none`;'>&times;</span>
                This email is used, Try another One Please!
            </div>
            <?php
        }
        // $_SESSION["user"][] = ["name" => $name, "email" => $email, "password" => $password];
        $insert = "INSERT INTO owner (name, email, password , address, phone,photo) values('$name','$email','$password','$address','$phone','$file_name') ";
        if ($conn->query($insert) === true) {
            $sql = "SELECT * FROM  owner where name= '$name' and email ='$email' ";
            $result = $conn->query($sql);
            $row = mysqli_fetch_assoc($result);
            // $_SESSION["user"][] = ["id" => $row["id"], "email" => $row["email"], "name" => $row["name"]];
            $_SESSION["id"] = $row["id_owner"];
            $_SESSION["name"] = $row["name"];
            $_SESSION["email"] = $row["email"];
            $_SESSION["address"] = $row["address"];
            $_SESSION["phone"] = $row["phone"];
            $_SESSION["type"] = "owner";
            $_SESSION["photo"] = $row["photo"];
            echo "<script>location.href='index.php';</script>";
            exit();
            
        }
    }
}

if (isset($_POST["signin"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];
    if ($_POST["radio"] == "client") {
        $sql = "SELECT * FROM client WHERE email = '$email' AND password = '$password'";
        $result = $conn->query($sql);
        if (mysqli_num_rows($result) == 1) {
            while ($row = mysqli_fetch_assoc($result)) {
                $_SESSION["id"] = $row["id_client"];
                $_SESSION["name"] = $row["name"];
                $_SESSION["email"] = $row["email"];
                $_SESSION["address"] = $row["address"];
                $_SESSION["phone"] = $row["phone"];
                $_SESSION["photo"] = $row["photo"];
                $_SESSION["type"] = "client";
                echo "<script>location.href='index.php';</script>";
                exit();
            }
        }
    }
    if ($_POST["radio"] == "owner") {
        $sql = "SELECT * FROM owner WHERE email = '$email' AND password = '$password'";
        $result = $conn->query($sql);
        if (mysqli_num_rows($result) == 1) {
            while ($row = mysqli_fetch_assoc($result)) {
                $_SESSION["id"] = $row["id_owner"];
                $_SESSION["name"] = $row["name"];
                $_SESSION["email"] = $row["email"];
                $_SESSION["address"] = $row["address"];
                $_SESSION["phone"] = $row["phone"];
                $_SESSION["photo"] = $row["photo"];
                $_SESSION["type"] = "owner";
                echo "<script>location.href='index.php';</script>";
                exit();
            }
        }
    }

    if ($_POST["radio"] == "admin") {
        $sql = "SELECT * FROM admin WHERE email = '$email' AND password = '$password'";
        $result = $conn->query($sql);
        if (mysqli_num_rows($result) == 1) {
            while ($row = mysqli_fetch_assoc($result)) {
                $_SESSION["id"] = $row["id_admin"];
                $_SESSION["name"] = $row["name"];
                $_SESSION["email"] = $row["email"];
                $_SESSION["address"] = $row["address"];
                $_SESSION["phone"] = $row["phone"];
                $_SESSION["photo"] = $row["photo"];
                $_SESSION["type"] = "admin";
                echo "<script>location.href='index.php';</script>";
                exit();
            }
        }
    }

    ?>
    <div class='alert'>
        <span class='closebtn' onclick='this.parentElement.style.display=`none`;'>&times;</span>
        Invalid login credentials
    </div>
    <?php

}
?>
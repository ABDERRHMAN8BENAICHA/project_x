

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="./css/admin.css">
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
    </style>
    <title> Add Client </title>
</head>

<body>
    <div class="container">
    <?php include "./includes/header-admin.php"?>
            <div class="add-user">
                <form method="POST" enctype="multipart/form-data">
                    <div><input required placeholder="name" type="text" name="name"></div>
                    <div><input required placeholder="email" type="email" name="email"></div>
                    <div><input required placeholder="password" type="password" name="password"></div>
                    <div><input required placeholder="address" type="text" name="address"></div>
                    <div><input required placeholder="phone" type="number" name="phone"></div>
                    <div><input required placeholder="your photo" type="file" name="photo"></div>
                    <button type="submit" name="add-client"> Add Client</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>


<?php

if (isset($_POST['add-client'])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $address = $_POST["address"];
    $phone = $_POST["phone"];
    $file_name = "";
    if(isset($_FILES["photo"])) {
        $image = $_FILES["photo"]["name"];
        $file_name = uniqid() . $image;
        move_uploaded_file($_FILES["photo"]["tmp_name"],"./uploads/user-img/".$file_name);
    }
    $chekEmail = "SELECT * FROM client WHERE email = '$email'";
    $res = $conn->query($chekEmail);
    if (mysqli_num_rows($res) > 0) {
        ?>
        <div class='alert'>
            <span class='closebtn' onclick='this.parentElement.style.display=`none`;'>&times;</span>
            This email is used, Try another One Please!
        </div>
        <?php
    } else{
        $insert = "INSERT INTO client (name, email, password , address, phone) values('$name','$email','$password','$address','$phone') ";
    
        if ($conn->query($insert) === true) {
            echo "<script>location.href='admin.php';</script>";
        }
    }
}

?>
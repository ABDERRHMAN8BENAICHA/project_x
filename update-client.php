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
    <title>Update User</title>
</head>

<body>
    <div class="container">
    <?php include "./includes/header-admin.php"?>
            <div class="add-user">
                <?php
                $id = $_GET['id'];
                $sql = "SELECT * FROM client WHERE id_client = $id";
                $res = $conn->query($sql);
                while ($data = mysqli_fetch_assoc($res)) {
                    $name = $data["name"];
                    $email = $data["email"];
                    $password = $data["password"];
                    $address = $data["address"];
                    $phone = $data["phone"];
                }
                ?>
                <form method="POST" enctype="multipart/form-data">
                    <div><input value="<?php echo $name?>" required placeholder="name" type="text" name="name"></div>
                    <div><input value="<?php echo $email?>" required placeholder="email" type="email" name="email"></div>
                    <div><input value="<?php echo $password?>" required placeholder="password" type="password" name="password"></div>
                    <div><input value="<?php echo $address?>" required placeholder="address" type="text" name="address"></div>
                    <div><input value="<?php echo $phone?>" required placeholder="phone" type="number" name="phone"></div>
                    <div><input  placeholder="your photo" type="file" name="photo"></div>
                    <button type="submit" name="update-client"> Update Client</button>
                </form>
            </div>

        </div>
    </div>
</body>

</html>


<?php 

if (empty($_POST["update-client"])){
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $address = $_POST["address"];
    $password = $_POST["password"];
    $file_name = "";
    if(empty($_FILES["photo"])) {
        $image = $_FILES["photo"]["name"];
        $file_name = uniqid() . $image;
        move_uploaded_file($_FILES["photo"]["tmp_name"],"./uploads/user-img/".$file_name);
        $sql = "UPDATE client SET name='$name', password='$password', address='$address', phone='$phone', photo='$file_name' WHERE email='$email'";
        $res = $conn->query($sql);
        echo "<script>location.href='admin.php';</script>";
    }else {
        $sql = "UPDATE client SET name='$name', password='$password', address='$address', phone='$phone' WHERE email='$email'";
        $res = $conn->query($sql);
        echo "<script>location.href='admin.php';</script>";
    }


}

?>
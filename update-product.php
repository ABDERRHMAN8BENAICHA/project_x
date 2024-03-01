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
        
.btn-cancel {
    display: inline-block;
    border: 1px solid white ;
    width: 80%;
    text-align: center;
    padding: 10px;
    border-radius: 10px;
    font-size: 20px;
    transition: transform 0.3s ease;
}
.btn-cancel:hover {
    transform: scale(1.05);
}
    </style>
    <title>Update Product</title>
</head>

<body>
    <div class="container">
        <?php include "./includes/header-admin.php" ?>
        <div class="add-user">
            <?php
            $id = $_GET['id'];
            $sql = "SELECT * FROM product WHERE id_product = $id";
            $res = $conn->query($sql);
            while ($data = mysqli_fetch_assoc($res)) {
                $name = $data["namePro"];
                $description = $data["description"];
                $evaluation = $data["evaluation"];
                $type = $data["type"];
                $price = $data["price"];
                $photo = $data["photo"];
            }
            ?>
            <form method="POST" enctype="multipart/form-data">
                <div><input value="<?php echo $name ?>" required placeholder="name" type="text" name="name"></div>
                <div><input value="<?php echo $description ?>" required placeholder="description" type="text"
                        name="description"></div>
                <div><input value="<?php echo $evaluation ?>" required placeholder="evaluation" type="number" max="5"
                        name="evaluation"></div>
                <div><input value="<?php echo $type ?>" required placeholder="type" type="text" name="type">
                </div>
                <div>
                    <select id="status" name="status">
                        <option value="acceptable">acceptable</option>
                        <option value="hanging">hanging</option>
                        <option value="unacceptable">unacceptable</option>
                    </select>
                </div>
                <div><input value="<?php echo $price ?>" required placeholder="price" type="number" name="price"></div>
                <div><input placeholder="your photo" type="file" name="photo" ></div>
                <button type="submit" name="update-product"> Update Product</button>
                <a  href="admin.php" class="btn-cancel" > Cancel</a>
            </form>
        </div>
    </div>
    </div>
</body>

</html>


<?php

if (isset($_POST["update-product"])) {
    $name = $_POST["name"];
    $description = $_POST["description"];
    $evaluation = $_POST["evaluation"];
    $type = $_POST["type"];
    $price = $_POST["price"];
    $status = $_POST["status"];
    $file_name = "";
    if (empty($_FILES["photo"])) {
        $image = $_FILES["photo"]["name"];
        $file_name = uniqid() . $image;
        move_uploaded_file($_FILES["photo"]["tmp_name"], "./uploads/product/" . $file_name);
        $sql = "UPDATE product SET namePro='$name', description='$description', evaluation=$evaluation, type='$type', price = $price , photo='$file_name', status = '$status'  WHERE id_product= $id";
        $res = $conn->query($sql);
        echo "<script>location.href='admin.php';</script>";
    }else {
        $sql = "UPDATE product SET namePro='$name', description='$description', evaluation=$evaluation, type='$type', price = $price , status = '$status'  WHERE id_product= $id";
        $res = $conn->query($sql);
        echo "<script>location.href='admin.php';</script>";
    }

}

?>
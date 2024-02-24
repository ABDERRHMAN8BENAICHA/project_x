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
                $name = $data["name"];
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
                <div><input value="<?php echo $price ?>" required placeholder="price" type="number" name="price"></div>
                <div><input required placeholder="your photo" type="file" name="photo"></div>
                <button type="submit" name="update-product"> Update Product</button>
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
    $photo = $_POST["photo"];
    $file_name = "";
    if (isset($_FILES["photo"])) {
        $image = $_FILES["photo"]["name"];
        $file_name = uniqid() . $image;
        move_uploaded_file($_FILES["photo"]["tmp_name"], "./uploads/product/" . $file_name);
    }
    $sql = "UPDATE product SET name='$name', description='$description', evaluation=$evaluation, type='$type', price = $price , photo='$file_name' WHERE id_product=$id";
    $res = $conn->query($sql);
    echo "<script>location.href='admin.php';</script>";

}

?>
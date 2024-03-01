<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="./css/admin.css">
    <title> Add Admin </title>
</head>
<style>
    .btn-cancel {
        display: inline-block;
        border: 1px solid white;
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

<body>
    <div class="container">
        <?php include "./includes/header-admin.php" ?>
        <div class="add-user">
            <form method="POST" enctype="multipart/form-data">
                <div><input required placeholder="name" type="text" name="name"></div>
                <div><input required placeholder="description" type="text" name="description"></div>
                <div><input required placeholder="evaluation" type="number" min="1" max="5" name="evaluation"></div>
                <div><input required placeholder="type" type="text" name="type"></div>
                <div><input required placeholder="price" type="number" name="price"></div>
                <div><input required placeholder="your photo" type="file" name="photo"></div>
                <button type="submit" name="add-product"> Add product</button>
                <a href="admin.php" class="btn-cancel"> Cancel</a>
            </form>
        </div>
    </div>
    </div>
</body>

</html>


<?php

if (isset($_POST['add-product'])) {
    $name = $_POST["name"];
    $description = $_POST["description"];
    $evaluation = $_POST["evaluation"];
    $type = $_POST["type"];
    $price = $_POST["price"];
    $file_name = "";
    if (isset($_FILES["photo"])) {
        $image = $_FILES["photo"]["name"];
        $file_name = uniqid() . $image;
        move_uploaded_file($_FILES["photo"]["tmp_name"], "./uploads/product/" . $file_name);
    }
    $insert = "INSERT INTO product (namePro, description, evaluation , type, price,photo , status) values('$name','$description',$evaluation,'$type',$price,'$file_name' , 'acceptable') ";
    if ($conn->query($insert) === true) {
        echo "<script>location.href='admin.php';</script>";
    }
}

?>
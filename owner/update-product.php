<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/admin.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
    <div class="add-user">
            <?php
            include "../includes/conn.php" ;
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
                <div><input value="<?php echo $price ?>" required placeholder="price" type="number" name="price"></div>
                <div><input  placeholder="your photo" type="file" name="photo"></div>
                <button type="submit" name="update-product"> Update Product</button>
            </form>
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
    if (empty($_FILES["photo"])) {
        $image = $_FILES["photo"]["name"];
        $file_name = uniqid() . $image;
        move_uploaded_file($_FILES["photo"]["tmp_name"], "../uploads/product/" . $file_name);
        $sql = "UPDATE product SET namePro='$name', description='$description', evaluation=$evaluation, type='$type', price = $price , photo='$file_name' WHERE id_product=$id";
        $res = $conn->query($sql);
        echo "<script>location.href='index.php';</script>";
    } else {
        $sql = "UPDATE product SET namePro='$name', description='$description', evaluation=$evaluation, type='$type', price = $price , WHERE id_product=$id";
        $res = $conn->query($sql);
        echo "<script>location.href='index.php';</script>";
    }
}

?>
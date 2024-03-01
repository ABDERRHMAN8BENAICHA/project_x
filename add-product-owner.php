<?php include "./includes/conn.php";
session_start();
?>
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
<body>
    <div class="container">
        <div class="add-user">
            <form method="POST" enctype="multipart/form-data">
                <div><input required placeholder="name" type="text" name="name"></div>
                <div><input required placeholder="description" type="text" name="description"></div>
                <div><input required placeholder="evaluation" type="number" min="1" max="5" name="evaluation"></div>
                <div><input required placeholder="type" type="text" name="type"></div>
                <div><input required placeholder="price" type="number" name="price"></div>
                <div><input required placeholder="your photo" type="file" name="photo"></div>
                <button type="submit" name="add-product"> Add product</button>
            </form>
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
    $owner_make = $_SESSION["id"];
    $insert = "INSERT INTO product (namePro, description, evaluation , type, price,photo ,owner_make, status) values('$name','$description',$evaluation,'$type',$price,'$file_name',$owner_make , 'hanging') ";
    if ($conn->query($insert) === true) {
        echo "<script>location.href='owner.php';</script>";
    }
}



?>
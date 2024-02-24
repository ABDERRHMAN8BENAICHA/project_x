<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./css/admin.css">
    <title>dachbord</title>
</head>

<body>
    <div class="container">
        <?php include "./includes/header-admin.php" ?>
        <a href="add-product.php" class="add-admin">add product</a>
        <table>
            <thead>
                <tr>
                    <th>id</th>
                    <th>name</th>
                    <th>description</th>
                    <th>evaluation</th>
                    <th>type</th>
                    <th>price</th>
                    <th>delete</th>
                    <th>update</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM `product`";
                $result = $conn->query($sql);
                while ($arr = mysqli_fetch_array($result)) {
                    echo "<tr>
                                <td><span>" . $arr['id_product'] . "</span></td>
                                <td><span>" . $arr['name'] . "</span></td>
                                <td><span>" . mb_strimwidth($arr['description'],0,20,"...") . "</span></td>
                                <td><span>" . $arr['evaluation'] . "</span> </td>
                                <td><span>" . $arr['type'] . "</span> </td>
                                <td><span>" . $arr['price'] . "</span> </td>
                                <td><a href='delete-product.php?id= " . $arr['id_product'] . "' class='delete'>delete</a> </td>
                                <td><a href='update-product.php?id= " . $arr['id_product'] . "' class='update'>update</a> </td>
                            </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    </div>
</body>

</html>
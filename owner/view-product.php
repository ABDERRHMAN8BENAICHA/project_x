<?php
include "../includes/chek.php";
include "../includes/conn.php";
if (!($_SESSION["type"] == "owner")) {
    echo "<script>location.href='./index.php';</script>";
    exit();
}

$id = $_SESSION["id"];

$sql = "SELECT COUNT(*) AS row_count FROM product JOIN owner ON product.owner_make = owner.id_owner WHERE owner.id_owner = $id ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $_SESSION["rowCount-product"] = $row['row_count'];
}

$sql = "SELECT SUM(product.price) AS total_price FROM product JOIN owner ON product.owner_make = owner.id_owner WHERE owner.id_owner = $id  ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $_SESSION["total_price"] = $row['total_price'];
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../css/admin.css">
    <title>dachbord</title>
</head>
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

<body>
    <div class="container">
        <div class="left">
            <div class="logo">
                <?php
                echo "<img src='../uploads/user-img/" . $_SESSION["user"]["photo"] . "' alt=''>";
                ?>
                <h2>
                    <?php echo $_SESSION["name"] ?>
                </h2>
            </div>
            <div id="img-hover">
            </div>

            <ul class="list">
                <a href="../index.php">
                    <li><i class="fa-solid fa-house"></i><span>Home</span></li>
                </a>
                <a href="view-product.php">
                    <li><i class="fa-solid fa-table"></i><span>products</span></li>
                </a>
                <li><i class="fa-solid fa-chart-pie"></i><span>charts</span></li>
                <li><i class="fa-solid fa-pen"></i><span>posts</span></li>
                <li><i class="fa-solid fa-star"></i><span>favorite</span></li>
                <li><i class="fa-solid fa-gear"></i><span>settings</span></li>
                <a href="../logout.php">
                    <li class="logout"><i class="fa-solid fa-arrow-right-from-bracket"></i><span>log out</span></li>
                </a>
            </ul>
        </div>
        <div class="right">
            <div class="head-1">
                <p>dashboard</p>
                <i class="fa-solid fa-notes-medical"></i>
            </div>
            <div class="boxs">
                <a href="view-product.php">
                    <div class="box">
                        <i class="fa-solid fa-table"></i>
                        <p name="products">
                            <?php
                            if (isset($_SESSION["rowCount-product"])) {
                                echo $_SESSION["rowCount-product"];
                            } else {
                                echo "0";
                            }
                            ?>
                        </p>
                    </div>
                </a>
                <a href="">
                    <div class="box">
                        <i class="fa-solid fa-dollar-sign"></i>
                        <p name="revenue">
                            <?php
                            if (isset($_SESSION["total_price"])) {
                                echo $_SESSION["total_price"] . "$";
                            } else {
                                echo "0$";
                            }
                            ?>
                        </p>
                    </div>
                </a>
            </div>
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
                    <th>status</th>
                    <th>delete</th>
                    <th>update</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM product JOIN owner ON product.owner_make =owner.id_owner  WHERE owner.id_owner = $id  ";
                $result = $conn->query($sql);
                while ($arr = mysqli_fetch_array($result)) {
                    echo "<tr>
                                    <td><span>" . $arr['id_product'] . "</span></td>
                                    <td><span>" . $arr['namePro'] . "</span></td>
                                    <td><span>" . mb_strimwidth($arr['description'], 0, 20, "...") . "</span></td>
                                    <td><span>" . $arr['evaluation'] . "</span> </td>
                                    <td><span>" . $arr['type'] . "</span> </td>
                                    <td><span>" . $arr['price'] . "</span> </td>
                                    <td><span>" . $arr['status'] . "</span> </td>
                                    <td><a href='delete-product.php?id= " . $arr['id_product'] . "' class='delete'>delete</a> </td>
                                    <td><a href='update-product.php?id= " . $arr['id_product'] . "' class='update'>update</a> </td>
                                </tr>";
                }
                ?>
            </tbody>
        </table>
        </div>
</body>

</html>
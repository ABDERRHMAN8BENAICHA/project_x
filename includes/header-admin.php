<?php
include "./includes/chek.php";
include "./includes/conn.php";
if (!($_SESSION["type"] == "admin")) {
    echo "<script>location.href='index.php';</script>";
    exit();
}
?>


<?php

$sql = "SELECT COUNT(*) AS row_count FROM client";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $_SESSION["rowCount-client"] = $row['row_count'];
}

$sql = "SELECT COUNT(*) AS row_count FROM admin";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $_SESSION["rowCount-admin"] = $row['row_count'];
}

$sql = "SELECT COUNT(*) AS row_count FROM product";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $_SESSION["rowCount-product"] = $row['row_count'];
}

$sql = "SELECT COUNT(*) AS row_count FROM owner";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $_SESSION["rowCount-owner"] = $row['row_count'];
}

$sql = "SELECT SUM(price) AS total_price FROM product";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $_SESSION["total_price"] = $row['total_price'];
}
?>

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
<div class="left">
    <div class="logo">
        <?php
        echo "<img src='./uploads/user-img/" . $_SESSION["user"]["photo"] . "' alt=''>";
        ?>
        <h2>
            <?php echo $_SESSION["name"] ?>
        </h2>
    </div>

    <div id="img-hover">
    </div>

    <ul class="list">
        <a href="index.php">
            <li><i class="fa-solid fa-house"></i><span>Home</span></li>
        </a>
        <a href="view-user.php">
            <li><i class="fa-solid fa-users"></i><span>clients</span></li>
        </a>
        <a href="view-product.php"><li><i class="fa-solid fa-table"></i><span>products</span></li></a>
        <li><i class="fa-solid fa-chart-pie"></i><span>charts</span></li>
        <li><i class="fa-solid fa-pen"></i><span>posts</span></li>
        <li><i class="fa-solid fa-star"></i><span>favorite</span></li>
        <li><i class="fa-solid fa-gear"></i><span>settings</span></li>
        <a href="logout.php"><li class="logout"><i class="fa-solid fa-arrow-right-from-bracket"></i><span>log out</span></li></a>
    </ul>
</div>
<div class="right">
    <div class="head-1">
        <p>dashboard</p>
        <i class="fa-solid fa-notes-medical"></i>
    </div>
    <div class="boxs">
        <a href="view-user.php">
            <div class="box">
                <i class="fa-solid fa-user"></i>
                <p name="users">
                    <?php
                    if (isset($_SESSION["rowCount-client"])) {
                        echo $_SESSION["rowCount-client"];
                    } else {
                        echo "0";
                    }
                    ?>
                </p>
            </div>
        </a>
        <a href="view-admin.php">
            <div class="box">
                <i class="fa-solid fa-chess-king"></i>
                <p name="admins">
                    <?php
                    if (isset($_SESSION["rowCount-admin"])) {
                        echo $_SESSION["rowCount-admin"];
                    } else {
                        echo "0";
                    }
                    ?>
                </p>
            </div>
        </a>
        <a href="view-product.php">
            <div class="box">
                <i class="fa-solid fa-table"></i>
                <p name="products"><?php
                    if (isset($_SESSION["rowCount-product"])) {
                        echo $_SESSION["rowCount-product"];
                    } else {
                        echo "0";
                    }
                    ?></p>
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
    <div class="head-1">
        <p>products</p>
        <i class="fa-solid fa-table"></i>
    </div>

<?php $pageis = "Home";
session_start();
include "./includes/conn.php";

if (isset($_SESSION['email'])) {
    $id = $_SESSION["id"];
    if ($_SESSION["type"] == "admin") {
        $sql = "SELECT * FROM admin WHERE id_admin = $id";
        $result = $conn->query($sql);
        if ($result) {
            $row = $result->fetch_assoc();
            $_SESSION["user"] = $row;
            // var_dump($_SESSION["user"]);
            // echo $_SESSION["user"]["photo"];
        }
    }

    if ($_SESSION["type"] == "client") {
        $sql = "SELECT * FROM client WHERE id_client = $id";
        $result = $conn->query($sql);
        if ($result) {
            $row = $result->fetch_assoc();
            $_SESSION["user"] = $row;
            // var_dump($_SESSION["user"]);
            // echo $_SESSION["user"]["photo"];
        }
    }
    if ($_SESSION["type"] == "owner"){
        $sql = "SELECT * FROM owner WHERE id_owner = $id";
        $result = $conn->query($sql);
        if ($result) {
            $row = $result->fetch_assoc();
            $_SESSION["user"] = $row;
            // var_dump($_SESSION["user"]);
            // echo $_SESSION["user"]["photo"];
        }
    }
}







?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./css/main.css">
    <title>HOME</title>
</head>

<body>
    <?php include "./includes/nav-bar.php" ?>
    <section>
        <h1>Welcome to our website <br> You can now book any room in record time</h1>
        <p>Houses, apartments, real estate and yards </p>
        <div class="btns">
            <button style="background-color: var(--Praymari);" class="btn"><a href="
                    <?php
                        if (isset($_SESSION["email"])) {
                            echo "shop.php";
                        }else {
                            echo "login.php";
                        }

                    ?>" style="color:white;">Get
                    Started</a></button>
            <button style="background-color: black;color: white;" class="btn"><a href="search.php"
                    style="color:white;">Search for an offer</a></button>
        </div>
    </section>
    <div class="container">
        <div class="features">
            <div>
                <img src="./img/features/f1.png" alt="">
                <p style="background-color: #ffdde4;">Free Shipping</p>
            </div>
            <div>
                <img src="./img/features/f2.png" alt="">
                <p style="background-color: #b2caa0;">Online Order</p>
            </div>
            <div>
                <img src="./img/features/f3.png" alt="">
                <p style="background-color: #b5c8d3;">Save Money</p>
            </div>
            <div>
                <img src="./img/features/f4.png" alt="">
                <p style="background-color: #b1b7db;">Promotions</p>
            </div>
            <div>
                <img src="./img/features/f5.png" alt="">
                <p style="background-color: #d7bdd5;">Happy Sell</p>
            </div>
            <div>
                <img src="./img/features/f6.png" alt="">
                <p style="background-color: #d6cdc3;">F24/7 Support</p>
            </div>
        </div>
        <h1 class="head">Featured Products</h1>
        <p>Summer Collection New Morden Design</p>
        <div class="products">
            <!-- <div class="box">
                <a href="demo_phpfile.php?subject=PHP&web=W3schools.com"><img src="./img/blogs/img1.jpg" alt=""></a>
                <span>adidas</span>
                <h4>Cartoon Astronaut T-Shirts</h4>
                <ul class="stars" style="display: flex; list-style: none;">
                    <li><i class="fa-solid fa-star" style="color: #ffd43b;"></i></li>
                    <li><i class="fa-solid fa-star" style="color: #ffd43b;"></i></li>
                    <li><i class="fa-solid fa-star" style="color: #ffd43b;"></i></li>
                    <li><i class="fa-solid fa-star" style="color: #ffd43b;"></i></li>
                    <li><i class="fa-solid fa-star" style="color: #ffd43b;"></i></li>
                </ul>
                <span class="price">
                    $78
                </span>
                <i class="fa-solid fa-cart-plus"></i>
            </div> -->
            <?php
            include "./includes/conn.php";
            $sql = "SELECT * FROM `product` WHERE status = 'acceptable'";
            $result = $conn->query($sql);
            if ($result) {
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        ?>
                        <div class="box">
                            <a href="view-this-product.php?id=<?php echo $row["id_product"] ?>"><img
                                    src="./uploads/product/<?php echo $row["photo"] ?>" alt=""></a>
                            <span>
                                <?php echo $row["type"] ?>
                            </span>
                            <h4>
                                <?php echo $row["namePro"] ?>
                            </h4>
                            <ul class="stars" style="display: flex; list-style: none;">
                                <?php
                                for ($i = 0; $i < $row["evaluation"]; $i++) {
                                    ?>
                                    <li><i class="fa-solid fa-star" style="color: #ffd43b;"></i></li>
                                    <?php
                                }
                                ?>
                            </ul>
                            <span class="price">
                                <?php echo "$" . $row["price"] ?>
                            </span>
                            <a href="view-this-product.php?id=<?php echo $row["id_product"] ?>"><i class="fa-solid fa-cart-plus"></i></a>
                        </div>
                        <?php
                    }
                } else {
                    echo "No products found.";
                }
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            ?>
        </div>
    </div>
    <?php include "./includes/subscription.php" ?>
    <?php include "./includes/footer.php" ?>
</body>

</html>
<?php $pageis = "view-product";

if (isset($_GET["id"])) {
    $pro_id = $_GET['id'];
    include "./includes/conn.php";
    $sql = "SELECT * FROM `product` WHERE id_product = $pro_id";
    $result = $conn->query($sql);
    $product = mysqli_fetch_assoc($result);
}
//$sql = "SELECT * FROM Orders LIMIT 4";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/main.css">
    <title>view-product</title>
</head>

<body id="page-prodact">
    <?php include "./includes/nav-bar.php" ?>
    <div class="container">
        <div class="pro" id="result-prodact">
            <div class="left">
                <img src="./uploads/product/<?php echo $product['photo']; ?>" alt="Product Image">
            </div>
            <div class="right">
                <h1>
                    <?php echo $product['name']; ?>
                </h1>
                <span class="price">$
                    <?php echo $product['price']; ?>
                </span>
                <div>
                    <input type="number" value="1" min="1">
                    <a href="https://www.poste.dz/">
                        <button>Proceed to checkout</button>
                    </a>
                </div>
                <h2>Product Details</h2>
                <p>
                    <?php echo $product['description']; ?>
                </p>
            </div>
        </div>
    </div>
    <?php include "./includes/subscription.php" ?>
    <div class="container">
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
            $sql = $sql = "SELECT * FROM product LIMIT 4 ";
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
                                <?php echo $row["name"] ?>
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
                            <i class="fa-solid fa-cart-plus"></i>
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
    <?php include "./includes/footer.php" ?>
</body>

</html>
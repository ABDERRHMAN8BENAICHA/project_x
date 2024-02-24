<?php $pageis = "Shop";
include "includes/conn.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/main.css">
    <title>SHOPE</title>
</head>

<body>
    <?php include "./includes/nav-bar.php" ?>
    <div class="container">
        <div class="products">
            <?php
            include "./includes/conn.php";
            $sql = "SELECT * FROM `product`";
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
    <?php include "./includes/subscription.php" ?>
    <?php include "./includes/footer.php" ?>
</body>

</html>
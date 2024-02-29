<?php $pageis = "" ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/main.css">
    <title>SEARCH</title>
</head>

<body>
    <?php include "./includes/nav-bar.php" ?>
    <div class="container">
        <h1 class="head">Featured Products</h1>
        <p>Summer Collection New Morden Design</p>
        <div>
            <form method="POST" class="form_search">
                <input required type="search" name="search" class="input_search" placeholder="search...">
                <button type="submit" name="btn_search" class="btn_search"><i
                        class="fa-solid fa-magnifying-glass"></i></button>
            </form>
        </div>
        <div class="products">
            <?php
            include "./includes/conn.php";
            if (isset($_POST["search"])) {
                $search = $_POST["search"];
                $sql = "SELECT * FROM product WHERE (namePro LIKE '%$search%' OR description LIKE '%$search%') AND status = 'acceptable';";
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
                                <a href="view-this-product.php?id=<?php echo $row["id_product"] ?>"><i
                                        class="fa-solid fa-cart-plus"></i></a>
                            </div>
                            <?php
                        }
                    } else {
                        echo "No products found.";
                    }
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            }
            ?>
        </div>
    </div>
    <?php include "./includes/footer.php" ?>
</body>

</html>


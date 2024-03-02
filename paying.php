<?php $pageis = "paying" ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/main.css">
    <title>Document</title>
</head>

<body>
    <?php include "./includes/nav-bar.php"; ?>
    <?php
    $date_start = strtotime($_POST["date-start"]);
    $date_end = strtotime($_POST["date-end"]);
    $number_client = $_POST["number-client"];
    $price = $_POST["price"];
    $days_diff = floor($number_client * ($price / 30));
    if($date_start !== false && $date_end !== false){
        $date_diff = $date_end - $date_start;
        $days_diff = floor(($date_diff / (60 * 60 * 24)) * $number_client * ($price / 30)); // price for one day
    }
    ?>
    <div class="container last-step">
        <div class="peyment">
            <div class="coupon">
                <h2>Apply Coupon</h2>
                <div>
                    <input type="text" placeholder="Enter Your Coupon">
                    <button>Apply</button>
                </div>
            </div>
        </div>

        <div class="cart-totals">
            <h2>Cart Totals</h2>
            <table>
                <tr>
                    <td>Cart Suptotal</td>
                    <td>$ <?php echo $days_diff ?></td>
                </tr>
                <tr>
                    <td>Shipping</td>
                    <td>FREE</td>
                </tr>
                <tr>
                    <td><b>Total</b></td>
                    <td>$ <?php echo $days_diff ?></td>
                </tr>
            </table>
            <button class="Proceed-to-checkout">Proceed to checkout</button>
        </div>
    </div>
    <?php include "./includes/subscription.php"; ?>
    <?php include "./includes/footer.php"; ?>
</body>

</html>
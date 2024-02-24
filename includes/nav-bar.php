<?php @session_start(); ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

<nav>
    <div class="logo">
        <a href="index.php"><h1 style="color: black;">Project X</h1></a>
    </div>
    <ul>
        <li><a href="index.php" <?php if ($pageis == "Home")
            echo "class='activ'" ?>>Home</a></li>
            <li><a href="shop.php" <?php if ($pageis == "Shop")
            echo "class='activ'" ?>>Shop</a></li>
            <li><a href="blog.php" <?php if ($pageis == "Blog")
            echo "class='activ'" ?>>Blog</a></li>
            <li><a href="about.php" <?php if ($pageis == "About")
            echo "class='activ'" ?>>About</a></li>
            <li><a href="contact.php" <?php if ($pageis == "Contact")
            echo "class='activ'" ?>>Contact</a></li>
            <li class="dropdown"><i id="user" class="fa-solid fa-user"></i>
                <ul class="dropdown-content" id="user-menu">
                    <?php
        if (!isset($_SESSION["email"])) {
            ?>
                    <li> <a href="login.php">login</a></li>
                    <?php
        }
        if (isset($_SESSION["email"])) {
            ?>
                    <li><a href="profile.php<?php
                        // if($_SESSION["type"] == "client"){
                        //     echo  $_SESSION['id']; 
                        // }
                        // if($_SESSION["type"] == "admin"){
                        //     echo  $_SESSION['id']; 
                        // }
                    ?>"> view profile </a></li>
                    <li> <a href="logout.php">Log out </a></li>
                    <?php
                    if ($_SESSION["type"] == "admin") {
                        ?>
                        <li><a href="admin.php">Admin Panel</a></li>
                        <?php
                    }
        }
        ?>
            </ul>
        </li>
    </ul>
</nav>

<script>


</script>
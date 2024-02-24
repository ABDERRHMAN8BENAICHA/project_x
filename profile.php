<?php
include "./includes/chek.php";
include "./includes/conn.php";

// if (isset($_GET["id"])) {
//     $id = $_GET["id"];
//     if ($_SESSION["type"] == "admin") {
//         $sql = "SELECT * FROM admin WHERE id_admin = $id";
//         $result = $conn->query($sql);
//         if ($result) {
//             $row = $result->fetch_assoc();
//             $_SESSION["user"] = $row;
//             // var_dump($_SESSION["user"]);
//             // echo $_SESSION["user"]["photo"];
//         }
//         if ($_SESSION["type"] == "client") {
//             $sql = "SELECT * FROM client WHERE id_client = $id";
//             $result = $conn->query($sql);
//             if ($result) {
//                 $row = $result->fetch_assoc();
//                 $_SESSION["user"] = $row;
//             }
//         }
//     }
// }







?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="./css/profile.css">
    <title> PROFILE </title>
</head>

<body>
    <div class="comtainer">
        <span class="bg"></span>
        <div class="photo">
            <?php
            if (isset($_SESSION["photo"])) {
                ?>
                    <img src="./uploads/user-img/<?php echo $_SESSION["photo"]?>" alt="">

                <?php
            } else {
                echo "No photo available";
            }
            ?>
        </div>
        <div class="text-data">
            <span class="name">
                <?php echo $_SESSION['name'] ?>
            </span>
            <span class="jop">
                <?php echo $_SESSION['email'] ?>
            </span>
        </div>
        <div class="coshile">
            <a href="https://www.facebook.com/profile.php?id=100029744113907"><i style="background-color: #00a;"
                    class='bx bxl-facebook'></i></a>
            <a href="https://www.instagram.com/7dx.d/"><i style="background-color: #ef2e68;"
                    class='bx bxl-instagram'></i></a>
            <a href="https://www.linkedin.com/in/abderrhmane-ben-aicha-16330527a/"><i style="background-color: #00f ;"
                    class='bx bxl-linkedin'></i></a>
        </div>
        <div class="btns">
            <a href="index.php" class="btn">go back</a>
            <a href="contact.php" class="btn">Message</a>
        </div>
        <div class="icons">
            <a href=""><i class='bx bx-like'></i> <span>69k</span></a>
            <a href=""><i class='bx bx-share'></i><span>20k</span></a>
            <a href=""><i class='bx bx-comment'></i> <span>33k</span></a>


        </div>
    </div>
</body>

</html>
<?php
session_start();
if(!isset($_SESSION["name"])) {
    echo "<script>location.href='login.php';</script>";
    exit();
}




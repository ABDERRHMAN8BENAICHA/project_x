<?php
    include "../includes/conn.php";
    $id = $_GET['id'];
    $sql = "DELETE FROM product WHERE id_product = $id";
    if ($conn->query($sql) === TRUE){
        echo "<script>location.href='index.php';</script>";
    }

<?php
    include "./includes/conn.php";
    $id = $_GET['id'];
    $sql = "DELETE FROM client WHERE id_client=$id";
    if ($conn->query($sql) === TRUE){
        echo "<script>location.href='admin.php';</script>";
    }

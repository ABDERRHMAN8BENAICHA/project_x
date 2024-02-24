<?php
    include "./includes/conn.php";
    $id = $_GET['id'];
    $sql = "DELETE FROM admin WHERE id_admin=$id";
    if ($conn->query($sql) === TRUE){
        echo "<script>location.href='admin.php';</script>";
    }

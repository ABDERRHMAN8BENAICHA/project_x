<?php
    include "./includes/conn.php";
    $id = $_GET['id'];
    $sql = "DELETE FROM owner WHERE id_owner = $id";
    if ($conn->query($sql) === TRUE){
        echo "<script>location.href='admin.php';</script>";
    }

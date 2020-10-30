<?php 

    require('config.php');

    $sql = "DELETE FROM todo WHERE id =".$_GET['id'];
    $stmt = $pdo->prepare($sql);

    $result = $stmt->execute();

    if ($result) {
        echo "<script>alert('record is already delete');window.location.href='index.php';</script>";
    }


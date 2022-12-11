<?php 
    require_once "config.php";

    $id = $_GET['id'];

    $sql = "DELETE FROM elmahdi WHERE id_pembeli = '$id'";
    $query = mysqli_query($conn, $sql);

    if ($query) header("location:index.php");
    echo "Something Went Wrong With The Delete";
?>
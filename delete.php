<?php
    include_once "funcs.php";

    $link = connect();

    $id = $_POST["id"];

    $sql = "DELETE FROM employee 
                WHERE id = $id";
    $link->query($sql);
    $link->close();

    $protocol = ($_SERVER['HTTPS'] == "") ? "http" : "https";
    $host  = $_SERVER['HTTP_HOST'];
    $extra = 'index.php';
    header("Location: $protocol://$host/$extra");
?>
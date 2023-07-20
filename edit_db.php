<?php
    include_once "funcs.php";

    $link = connect();

    $id = $_POST["id"];
    $name_last = $link->real_escape_string($_POST["name_last"]);
    $name_first = $_POST["name_first"];
    $birth_date = $_POST["birth_date"];
    $salary = $_POST["salary"];
    $department_id = $_POST["department_id"];

    $sql = "UPDATE employee
                SET
                    name_last = '$name_last', 
                    name_first = '$name_first', 
                    birth_date = '$birth_date', 
                    salary = $salary, 
                    department_id = $department_id
                WHERE id = $id";
    $link->query($sql);

    $link->close();

    //echo "<pre>" . print_r($_SERVER) . "</pre>";

    $protocol = ($_SERVER['HTTPS'] == "") ? "http" : "https";
    $host  = $_SERVER['HTTP_HOST'];
    $extra = 'index.php';
    header("Location: $protocol://$host/$extra");
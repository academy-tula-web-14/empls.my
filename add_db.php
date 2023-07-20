<?php
    include_once "funcs.php";

    $link = connect();

    $name_last = $link->real_escape_string($_POST["name_last"]);
    $name_first = $_POST["name_first"];
    $birth_date = $_POST["birth_date"];
    $salary = $_POST["salary"];
    $department_id = $_POST["department_id"];

    $sql = "INSERT INTO employee
                (name_last, name_first, birth_date, salary, department_id)
                VALUES
                ('$name_last', '$name_first', '$birth_date', $salary, $department_id)";
    $link->query($sql);

    $link->close();

    //echo "<pre>" . print_r($_SERVER) . "</pre>";

    $protocol = ($_SERVER['HTTPS'] == "") ? "http" : "https";
    $host  = $_SERVER['HTTP_HOST'];
    $extra = 'index.php';
    header("Location: $protocol://$host/$extra");

?>
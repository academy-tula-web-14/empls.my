<?php
function connect()
{
    $server = "localhost";
    $login = "root";
    $password = "";
    $database = "mybd";

    return new mysqli($server, $login, $password, $database);
}
?>
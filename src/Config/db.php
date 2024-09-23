<?php

$server = "localhost";
$user = "root";
$pass = "";
$db = "sicarios_pokemones";

$connection = new mysqli($server, $user, $pass, $db);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}
else {
    echo "Connected successfully";
}

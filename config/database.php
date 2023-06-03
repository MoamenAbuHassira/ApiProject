<?php

$servername = "localhost";
$username = "moamen";
$password = "123";
$dbname = "web_2023";

$connection = new mysqli($servername, $username, $password, $dbname);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

return $connection;
?>

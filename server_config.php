<?php
$server = "localhost";
$username = "root";
$password = "";
$dbname = "todolist";

$conn = new mysqli($server, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection fail" . $conn->connect_error);
}

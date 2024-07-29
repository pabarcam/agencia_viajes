<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "agencia";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Fallo de conexión: " . mysqli_connect_error());
}
?>
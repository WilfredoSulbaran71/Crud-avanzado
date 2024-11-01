<?php
$servername = "localhost";
$username = "root";
$password = "Wil@2024cs";
$dbname = "registros_usuarios";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>

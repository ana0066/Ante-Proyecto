<?php
$host = "localhost";
$user = "root"; // Cambia esto según tu configuración
$password = ""; // Contraseña de tu usuario MySQL
$dbname = "comentarios";

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>
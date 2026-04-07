<?php
include 'db.php';

$nombre = $_POST['nombre'];
$edad = $_POST['edad'];
$correo = $_POST['correo'];

// VALIDACIONES
if (empty($nombre) || empty($edad) || empty($correo)) {
    die("Todos los campos son obligatorios");
}

if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
    die("Correo inválido");
}

if (!is_numeric($edad) || $edad <= 0) {
    die("Edad inválida");
}

$sql = "INSERT INTO datos (nombre, edad, correo)
        VALUES ('$nombre', '$edad', '$correo')";

if ($conn->query($sql)) {
    header("Location: dashboard.php");
} else {
    echo "Error: " . $conn->error;
}
?>
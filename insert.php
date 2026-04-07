<?php
include 'ConectDB.php';

$nombre = $_POST['Nombre'];
$edad = $_POST['Edad'];
$correo = $_POST['Correo'];

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

$sql = "INSERT INTO datos (Nombre, Edad, Correo)
        VALUES ('$nombre', '$edad', '$correo')";

if ($conn->query($sql)) {
    header("Location: Dashboard.php");
} else {
    echo "Error: " . $conn->error;
}
?>
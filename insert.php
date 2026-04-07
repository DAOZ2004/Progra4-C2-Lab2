<?php
include 'ConectDB.php';

$Nombre = $_POST['Nombre'];
$Edad = $_POST['Edad'];
$Correo = $_POST['Correo'];

// VALIDACIONES
if (empty($Nombre) || empty($Edad) || empty($Correo)) {
    die("Todos los campos son obligatorios");
}

if (!filter_var($Correo, FILTER_VALIDATE_EMAIL)) {
    die("Correo inválido");
}

if (!is_numeric($Edad) || $Edad <= 0) {
    die("Edad inválida");
}

$sql = "INSERT INTO datos (Nombre, Edad, Correo)
        VALUES ('$Nombre', '$Edad', '$Correo')";

if ($conn->query($sql)) {
    header("Location: Dashboard.php");
} else {
    echo "Error: " . $conn->error;
}
?>
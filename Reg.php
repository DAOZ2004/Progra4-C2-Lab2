<?php
session_start();
include 'ConectDB.php';

$username = $_POST['Username'];
$password = md5($_POST['Password']);

$sql = "SELECT * FROM usuarios WHERE Username='$username' AND Password='$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $_SESSION['user'] = $username;
    header("Location: Dashboard.php");
} else {
    echo "Credenciales incorrectas";
}
?>
<?php
session_start();
include 'ConectDB.php';

$Username = $_POST['Username'];
$Password = md5($_POST['Password']);

$sql = "SELECT * FROM usuarios WHERE Username='$Username' AND Password='$Password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $_SESSION['user'] = $Username;
    header("Location: Dashboard.php");
} else {
    echo "Credenciales incorrectas";
}
?>
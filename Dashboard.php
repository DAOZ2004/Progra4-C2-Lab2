<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user'])) {
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<h2>Bienvenido <?php echo $_SESSION['user']; ?></h2>
<a href="logout.php">Cerrar sesión</a>

<h3>Ingresar datos</h3>

<form action="insert.php" method="POST">
    <input type="text" name="nombre" placeholder="Nombre" required>
    <input type="number" name="edad" placeholder="Edad" required>
    <input type="email" name="correo" placeholder="Correo" required>
    <button type="submit">Guardar</button>
</form>

<h3>Datos registrados</h3>

<table border="1">
    <tr>
        <th>Nombre</th>
        <th>Edad</th>
        <th>Correo</th>
    </tr>

    <?php
    $sql = "SELECT * FROM datos";
    $result = $conn->query($sql);

    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['nombre']}</td>
                <td>{$row['edad']}</td>
                <td>{$row['correo']}</td>
              </tr>";
    }
    ?>

</table>

</body>
</html>
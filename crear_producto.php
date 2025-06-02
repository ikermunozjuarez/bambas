<?php
session_start();
$conn = new mysqli("localhost", "iker", "1234", "bambas");

if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = floatval($_POST['precio']);

    $stmt = $conn->prepare("INSERT INTO productos (nombre, descripcion, precio) VALUES (?, ?, ?)");
    $stmt->bind_param("ssd", $nombre, $descripcion, $precio);
    $stmt->execute();

    header("Location: gestionar_productos.php");
    exit();
}
?>

<h1>Crear Producto</h1>
<form method="post">
    Nombre:<br>
    <input type="text" name="nombre" required><br>
    Descripción:<br>
    <textarea name="descripcion" required></textarea><br>
    Precio:<br>
    <input type="number" step="0.01" name="precio" required><br><br>
    <input type="submit" value="Crear">
</form>

<a href="gestionar_productos.php">Volver a lista</a>

<?php
session_start();
$conn = new mysqli("localhost", "iker", "1234", "bambas");

if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}

if (isset($_GET['borrar'])) {
    $id = intval($_GET['borrar']);
    $conn->query("DELETE FROM productos WHERE id = $id");
    header("Location: gestionar_productos.php");
    exit();
}

$result = $conn->query("SELECT id, nombre, precio FROM productos");
?>

<h1>Gestionar Productos</h1>
<a href="crear_producto.php">Crear producto</a>
<table border="1" cellpadding="5" cellspacing="0">
    <tr><th>ID</th><th>Nombre</th><th>Precio</th><th>Acciones</th></tr>
    <?php while($row = $result->fetch_assoc()): ?>
    <tr>
        <td><?= $row['id'] ?></td>
        <td><?= htmlspecialchars($row['nombre']) ?></td>
        <td><?= htmlspecialchars($row['precio']) ?> €</td>
        <td>
            <a href="editar_producto.php?id=<?= $row['id'] ?>">Editar</a> | 
            <a href="gestionar_productos.php?borrar=<?= $row['id'] ?>" onclick="return confirm('¿Seguro que quieres borrar?')">Borrar</a>
        </td>
    </tr>
    <?php endwhile; ?>
</table>

<a href="admin.php">Volver al panel</a>

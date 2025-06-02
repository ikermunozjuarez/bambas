<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Panel de administración</title>
</head>
<body>

<h2>Bienvenido, <?php echo $_SESSION['usuario']; ?></h2>

<p><a href="crear_usuario.php">Crear nuevo usuario</a></p>
<p><a href="gestionar_usuarios.php">Gestionar usuarios</a></p>
<p><a href="logout.php">Cerrar sesión</a></p>
<a href="crear_producto.php">Crear nuevo producto</a><br>
<a href="gestionar_productos.php">Gestionar productos</a><br>
<a href="productos_publicos.php" target="_blank">Ver productos públicos</a><br>

</body>
</html>

<?php
session_start();
$conn = new mysqli("localhost", "iker", "1234", "bambas");
$resultado = $conn->query("SELECT * FROM usuarios");
?>

<h2>Usuarios</h2>
<table border="1">
<tr><th>Nombre</th><th>Email</th><th>Rol</th><th>Acciones</th></tr>
<?php while ($fila = $resultado->fetch_assoc()) { ?>
<tr>
<td><?= $fila['nombre'] ?></td>
<td><?= $fila['email'] ?></td>
<td><?= $fila['rol'] ?></td>
<td>
<a href="modificar_usuario.php?id=<?= $fila['id'] ?>">Modificar</a>
<a href="eliminar_usuario.php?id=<?= $fila['id'] ?>">Eliminar</a>
</td>
</tr>
<?php } ?>
</table>
<a href="admin.php">Volver</a>

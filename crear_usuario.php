<?php
session_start();
$conn = new mysqli("localhost", "iker", "1234", "bambas");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $contraseña = $_POST['contraseña'];
    $rol = $_POST['rol'];

    $conn->query("INSERT INTO usuarios (nombre, email, contraseña, rol) VALUES ('$nombre', '$email', '$contraseña', '$rol')");
    echo "Usuario creado.";
}
?>

<form method="post">
    Nombre: <input name="nombre"><br>
    Email: <input name="email"><br>
    Contraseña: <input name="contraseña" type="password"><br>
    Rol: <input name="rol"><br>
    <input type="submit" value="Crear">
</form>
<a href="admin.php">Volver</a>

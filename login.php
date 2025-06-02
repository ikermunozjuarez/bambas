<?php
session_start();
$conn = new mysqli("localhost", "iker", "1234", "bambas");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $contraseña = $_POST['contraseña'];

    $sql = "SELECT * FROM usuarios WHERE email = ? LIMIT 1";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $resultat = $stmt->get_result();

    if ($usuario = $resultat->fetch_assoc()) {
        if ($contraseña === $usuario['contraseña']) {
            $_SESSION['usuario'] = $usuario['nombre'];
            $_SESSION['rol'] = $usuario['rol'];
            header("Location: admin.php");
            exit();
        } else {
            $error = "Contraseña incorrecta.";
        }
    } else {
        $error = "Usuario no encontrado.";
    }
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>

<h2>Inicio de sesion</h2>

<form method="POST" action="login.php">
    <label>Email:</label><br>
    <input type="email" name="email" required><br><br>

    <label>Contraseña:</label><br>
    <input type="password" name="contraseña" required><br><br>

    <button type="submit">Entrar</button>
</form>

<?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>

</body>
</html>

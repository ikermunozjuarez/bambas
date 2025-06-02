<?php
$conn = new mysqli("localhost", "iker", "1234", "bambas");

$result = $conn->query("SELECT nombre, descripcion, precio FROM productos");
?>

<h1>Productos Disponibles</h1>

<?php while($producto = $result->fetch_assoc()): ?>
    <div style="border:1px solid #ccc; padding:10px; margin-bottom:10px;">
        <h2><?= htmlspecialchars($producto['nombre']) ?></h2>
        <p><?= nl2br(htmlspecialchars($producto['descripcion'])) ?></p>
        <p><strong>Precio:</strong> <?= htmlspecialchars($producto['precio']) ?> €</p>
    </div>
<?php endwhile; ?>

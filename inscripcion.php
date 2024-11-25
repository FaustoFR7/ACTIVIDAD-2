<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Inscripción</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Formulario de Inscripción</h1>
    </header>
    <main>
    <?php
include 'conexion.php';

// Verificar si id_curso está presente en la URL
if (!isset($_GET['id_curso']) || empty($_GET['id_curso'])) {
    die("Error: No se especificó un curso para la inscripción.");
}

$id_curso = intval($_GET['id_curso']); // Convertir a entero para evitar inyección SQL

// Consultar el curso con el id especificado
$query = "SELECT nombre FROM cursos WHERE id_curso = $id_curso";
$result = $conn->query($query);

if ($result && $result->num_rows > 0) {
    $curso = $result->fetch_assoc();
    echo "<h2>Inscripción al curso: {$curso['nombre']}</h2>";
} else {
    die("Error: Curso no encontrado.");
}
?>
<form action="procesar_inscripcion.php" method="POST">
    <input type="hidden" name="id_curso" value="<?php echo $id_curso; ?>">
    <label for="nombre">Nombre completo:</label>
    <input type="text" name="nombre" id="nombre" required>
    <label for="email">Correo electrónico:</label>
    <input type="email" name="email" id="email" required>
    <button type="submit">Enviar Inscripción</button>
</form>
    </main>
</body>
</html>

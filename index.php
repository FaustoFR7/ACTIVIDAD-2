<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscripción a Cursos</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>LOS MEJORES CURSOS DE PROGRAMACIÓN</h1>
    </header>
    <main>
        <section>
            <h2>Cursos disponibles</h2>
            <?php
            include 'conexion.php';
            $query = "SELECT * FROM cursos";
            $result = $conn->query($query);
            if ($result->num_rows > 0) {
                while ($curso = $result->fetch_assoc()) {
                    echo "<div class='curso'>
                            <h3>{$curso['nombre']}</h3>
                            <p>{$curso['descripcion']}</p>
                            <p>Fecha de inicio: {$curso['fecha_inicio']}</p>
                            <p>Duración: {$curso['duracion']}</p>
                            <a href='inscripcion.php?id_curso={$curso['id_curso']}'>Inscribirse</a>
                          </div>";
                }
            } else {
                echo "<p>No hay cursos disponibles en este momento.</p>";
            }
            ?>
        </section>
    </main>
</body>
</html>

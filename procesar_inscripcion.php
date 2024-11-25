<?php
include 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_curso = intval($_POST['id_curso']);
    $nombre = $conn->real_escape_string($_POST['nombre']);
    $email = $conn->real_escape_string($_POST['email']);

    $query = "INSERT INTO inscripciones (id_curso, nombre_participante, email_participante) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("iss", $id_curso, $nombre, $email);

    if ($stmt->execute()) {
        echo "<p>Inscripción exitosa. Hemos enviado un correo de confirmación a $email.</p>";
    } else {
        echo "<p>Error al procesar la inscripción: " . $stmt->error . "</p>";
    }

    $stmt->close();
} else {
    echo "<p>Solicitud inválida.</p>";
}

$conn->close();
?>

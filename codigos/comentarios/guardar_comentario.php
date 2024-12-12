<?php

include 'conexion.php';

// Verificar si se reciben los datos correctamente
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? 'Anonymous'; // Nombre de usuario
    $comentario = $_POST['comentario'] ?? ''; // Comentario del usuario

    // Validar que los datos no estén vacíos
    if (empty($comentario)) {
        echo json_encode(["status" => "error", "message" => "El comentario está vacío."]);
        exit;
    }

    $stmt = $conn->prepare("INSERT INTO comentarios (username, comentario) VALUES (?, ?)");
    if (!$stmt) {
        echo json_encode(["status" => "error", "message" => "Error en la preparación de la consulta: " . $conn->error]);
        exit;
    }

    // Preparar y ejecutar la consulta
    $stmt = $conn->prepare("INSERT INTO comentarios (username, comentario) VALUES (?, ?)");
    $stmt->bind_param("ss", $username, $comentario);

    if ($stmt->execute()) {
        echo json_encode(["status" => "success", "message" => "Comentario guardado exitosamente."]);
    } else {
        echo json_encode(["status" => "error", "message" => "Error al guardar el comentario."]);
    }

    $stmt->close();
} else {
    echo json_encode(["status" => "error", "message" => "Método no permitido."]);
}

$conn->close();
?>

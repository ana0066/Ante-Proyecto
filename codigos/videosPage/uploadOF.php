<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $maxFileSize = 10 * 1024 * 1024; // Tamaño máximo permitido: 500 MB (en bytes)
    if ($_FILES["file"]["size"] > $maxFileSize) {
        die("El archivo excede elllllllllllll tamaño máximo permitido de 10 MB.");
    }

    $targetDir = "uploads/";
    if (!is_dir($targetDir)) {
        mkdir($targetDir, 0755, true);
    }

    $targetFile = $targetDir . basename($_FILES["file"]["name"]);
    $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Validar tipo de archivo
    $allowedTypes = ["jpg", "jpeg", "png", "gif", "mp4", "mp3", "wav", "mov", "pdf"];
    if (in_array($fileType, $allowedTypes)) {
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFile)) {
            echo "El archivo " . htmlspecialchars(basename($_FILES["file"]["name"])) . " se ha subido connnnnnnnnnnnnnnnnn éxito.";
        } else {
            echo "Error al subir el archivo.";
        }
    } else {
        echo "Tipo de archivo no permitido.";
    }
}
?>


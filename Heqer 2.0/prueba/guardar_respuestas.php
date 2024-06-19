<?php
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        // Recorrer las respuestas enviadas y guardarlas
        foreach ($_POST['respuestas'] as $id_pregunta => $respuesta) {
            // Insertar respuesta en la tabla respuestas
            $stmt = $pdo->prepare("INSERT INTO respuestas (id_pregunta, respuesta) VALUES (?, ?)");
            $stmt->execute([$id_pregunta, $respuesta]);
        }
        echo "Respuestas guardadas correctamente.";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>

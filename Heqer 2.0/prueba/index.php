<?php
require_once '../Database/Basedatos.php';

try {
    // Obtener preguntas de la base de datos
    $stmt = $pdo->query("SELECT * FROM preguntas");
    $preguntas = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
    die();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Formulario de respuestas</title>
</head>
<body>
    <h2>Formulario de respuestas</h2>
    <form action="guardar_respuestas.php" method="post">
        <?php foreach ($preguntas as $pregunta): ?>
            <label for="respuesta_<?php echo $pregunta['id']; ?>"><?php echo $pregunta['pregunta']; ?></label><br>
            <textarea id="respuesta_<?php echo $pregunta['id']; ?>" name="respuestas[<?php echo $pregunta['id']; ?>]"></textarea><br><br>
        <?php endforeach; ?>
        <input type="submit" value="Guardar respuestas">
    </form>
</body>
</html>

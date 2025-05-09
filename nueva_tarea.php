<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <title>Nueva Tarea</title>
</head>
<body>
    <h1>Añadir Nueva Tarea</h1>
    <form action="guardar_tarea.php" method="post">
        <label for="titulo">Título:</label>
        <input type="text" name="titulo" id="titulo" required>
        <br><br>
        <label for="descripcion">Descripción:</label><br>
        <textarea name="descripcion" id="descripcion" required></textarea>
        <br><br>
        <button type="submit">Guardar Tarea</button>
    </form>
    <br>
    <a href="tareas.php">Volver al listado</a>
</body>
</html>

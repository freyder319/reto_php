<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header("Location: index.php");
    exit;
}
$conexion = new mysqli("localhost", "root", "", "base1");
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}
$id_tarea = $_GET['id'];
$query = $conexion->prepare("SELECT titulo, descripcion FROM tareas WHERE id = ? AND usuario_id = ?");
$query->bind_param("ii", $id_tarea, $_SESSION['usuario_id']);
$query->execute();
$resultado = $query->get_result();
$tarea = $resultado->fetch_assoc();
if (!$tarea) {
    die("Error: La tarea no existe o no tienes permisos para editarla.");
}
$query->close();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Editar Tarea</title>
</head>
<body>
    <h1>Editar Tarea</h1>
    <form action="actualizar_tarea.php" method="post">
        <input type="hidden" name="id" value="<?php echo $id_tarea; ?>">

        <label for="titulo">Título:</label>
        <input type="text" name="titulo" id="titulo" value="<?php echo htmlspecialchars($tarea['titulo']); ?>" required>
        <br><br>
        <label for="descripcion">Descripción:</label>
        <br>
        <textarea name="descripcion" id="descripcion" required><?php echo htmlspecialchars($tarea['descripcion']); ?></textarea>
        <br><br>
        <button type="submit">Guardar Cambios</button>
    </form>
    <br>
    <a href="tareas.php">Volver al listado</a>
</body>
</html>

<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit;
}
$conexion = new mysqli("localhost", "root", "", "base1");
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}
$id_tarea = $_GET['id'];
$usuario_id = $_SESSION['usuario_id'];
$query = $conexion->prepare("DELETE FROM tareas WHERE id = ? AND usuario_id = ?");
$query->bind_param("ii", $id_tarea, $usuario_id);
$query->execute();
$query->close();
$conexion->close();
header("Location: tareas.php");
exit;
?>

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
$titulo = trim($_POST['titulo']);
$descripcion = trim($_POST['descripcion']);
$usuario_id = $_SESSION['usuario_id'];
$query = $conexion->prepare("INSERT INTO tareas (usuario_id, titulo, descripcion, completada) VALUES (?, ?, ?, 0)");
$query->bind_param("iss", $usuario_id, $titulo, $descripcion);
$query->execute();
$query->close();
$conexion->close();
header("Location: tareas.php");
exit;
?>

<?php
session_start();
include "config.php";

if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit;
}
$conexion = new mysqli("localhost", "root", "", "base1");
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}
$id_tarea = $_POST['id'];
$titulo = trim($_POST['titulo']);
$descripcion = trim($_POST['descripcion']);
$usuario_id = $_SESSION['usuario_id'];

// Actualizar la tarea
$query = $conexion->prepare("UPDATE tareas SET titulo = ?, descripcion = ? WHERE id = ? AND usuario_id = ?");
$query->bind_param("ssii", $titulo, $descripcion, $id_tarea, $usuario_id);
$query->execute();

$query->close();
$conexion->close();

header("Location: tareas.php");
exit;
?>

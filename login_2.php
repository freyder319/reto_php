<?php
session_start();
$conn = new mysqli('localhost', 'root', '', 'base1');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
 $correo = $_POST['correo'];
 $contrasena = $_POST['contrasena'];
 $stmt = $conn->prepare("SELECT id, nombre, contrasena FROM usuarios 
WHERE correo = ?");
 $stmt->bind_param("s", $correo);
 $stmt->execute();
 $result = $stmt->get_result();
 if ($result && $row = $result->fetch_assoc()) {
 if (password_verify($contrasena, $row['contrasena'])) {
 // Contraseña válida
 $_SESSION['usuario_id'] = $row['id'];
 $_SESSION['nombre'] = $row['nombre'];
 echo "Login exitoso. Bienvenido, " . $_SESSION['nombre'];
 // Redirigir a la página de tareas
 header("Location: tareas.php");
 exit;
 } else {
 echo "Contraseña incorrecta.";
 }
 } else {
 echo "Usuario no encontrado.";
 }
 $stmt->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php 
$contrasena=$_POST['contrasena'];
$confirmarcontra=$_REQUEST['confirmarcontra'];
if ($contrasena!=$confirmarcontra){
    header("Location: register.php?error=1");
}else{
    $conn = new mysqli('localhost', 'root', '', 'base1');
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nombre = $_POST['nombre'];
            $correo = $_POST['correo'];
            $contrasena = $_POST['contra'];
            $hash = password_hash($contrasena, PASSWORD_DEFAULT);
            $stmt = $conn->prepare("INSERT INTO usuarios (nombre, correo, 
            contrasena) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $nombre, $correo, $hash);
        if ($stmt->execute()) {
            header("Location: register.php?registrado=registrado");
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
}}
?>
</body>
</html>


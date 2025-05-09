<?php
session_start();
$conexion = new mysqli("localhost", "root", "", "base1");
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}
$usuario_id = $_SESSION['usuario_id'];
$resultado = $conexion->query("SELECT * FROM tareas WHERE usuario_id = '$usuario_id'");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Panel de Tareas</title>
</head>
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Mis Tareas</title>
</head>
<body>
    <h1>Lista de Tareas</h1>
    <a href="nueva_tarea.php">Añadir nueva tarea</a>
    <br><br>
    <div>
        <?php 
        $contador=1;
        while ($tarea = $resultado->fetch_assoc()) { ?>
            <br>
                <?php
                echo "Tarea N°". $contador;
                echo "<br>";
                $contador+=1
                ?>
                <?php echo $tarea['titulo']; ?> - <?php echo $tarea['descripcion']; ?>
                <br>
                Estado: <?php echo $tarea['completada'] ? " Completada" : " Pendiente"; ?>
                <br>
                <a href="editar_tarea.php?id=<?php echo $tarea['id']; ?>">Editar</a>
                <br>
                <a href="eliminar_tarea.php?id=<?php echo $tarea['id']; ?>">Eliminar</a>
                <br>
                <a href="completar_tarea.php?id=<?php echo $tarea['id']; ?>">Marcar como completada</a>
            <br>
        <?php } ?>
    </div>
    <br>
    -----------------------------------------
    <br>
    <a href="logout.php">Cerrar Session</a>
</body>
</html>
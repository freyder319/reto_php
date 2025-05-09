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
        <table border="1px solid black">
            <tr>
                <td>Id</td>
                <td>Titulo</td>
                <td>Descripcion</td>
                <td>Estado</td>
                <td>Editar</td>
                <td>Eliminar</td>
                <td>Marcar como completada</td>
            </tr>
        <?php 
        $contador=1;
        while ($tarea = $resultado->fetch_assoc()) { ?>
            <tr>
                <?php
                echo "<td>";
                echo "Tarea N°". $contador;
                echo "</td>";
                echo "<br>";
                $contador+=1
                ?>
                <?php echo "<td>"; echo $tarea['titulo'];  ?></td> <td> <?php echo $tarea['descripcion']; ?></td>
                
                <td>
                <?php echo $tarea['completada'] ? " Completada" : " Pendiente"; ?></td>
                <br>
                <td> <a href="editar_tarea.php?id=<?php echo $tarea['id']; ?>">Editar</a></td>
                <td> <a href="eliminar_tarea.php?id=<?php echo $tarea['id']; ?>">Eliminar</a></td>
                <td>
                <?php 
                    if ($tarea['completada']==1){

                    }else{
                        ?>
                         <a href="completar_tarea.php?id=<?php echo $tarea['id']; ?>">Marcar como completada</a>
                        <?php
                        
                    }
                ?>
                </td>
            </tr>
        <?php } ?>
        </table>
    </div>
    <br>
    -----------------------------------------
    <br>
    <a href="logout.php">Cerrar Session</a>
</body>
</html>
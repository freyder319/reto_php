<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="register_2.php" method="post">
    -----------------REGISTRO----------------- <br> <br>
    Nombre:
    <input type="text" name="nombre">
    <br><br>
    Correo Electronico:
    <input type="email" name="correo">
    <br><br>
    Contraseña:
    <input type="password" name="contra">
    <br><br>
    Confirmar Contraseña:
    <input type="password" name="confirmarcontra">
    <br><br>
    <?php
        if (isset($_REQUEST['error'])){
            echo "Contraseñas no coinciden";
        }elseif(isset($_REQUEST['registrado'])){
            echo "usuario Registrado";
        }
    ?>
    
    <br><br>
    <input type="submit" value="Registrar">
    </form>
    <br><br>
    Estas Registrado? <a href="login.php">Iniciar Sesion</a>
</body>
</html>


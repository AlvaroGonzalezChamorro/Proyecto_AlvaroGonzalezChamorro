<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
</head>
<body>

<?php

    $host="localhost";
    $user="root";
    $pwd="iaw";
    $nombreBD="alvarogonzalezchamorro_bd_final";

    $link=mysqli_connect($host,$user,$pwd);

    mysqli_select_db($link,$nombreBD);

?>

    <h1> Bienvenido a WikiGame </h1>

    <form action="" method="POST">

        <p>
            Usuario <br>
            <input type="text" name="usuario">
        </p>

        <p>
            Contraseña <br>
            <input type="text" name="contrasena">
        </p>

        <input type="submit" name="login" value="Acceder">
        <input type="reset" name="reset" value="Restablecer campos">

        <p>
            <a href="registro.php"> ¿Aún no se ha registrado? Pulse aquí </a>
        </p>

    </form>

<?php

    if(isset($_POST['login'])){

        $usuario = $_POST['usuario'];

        $contrasena = $_POST['contrasena'];

        $compUsuario = "SELECT * FROM usuario WHERE usuario='$usuario' AND contrasena='$contrasena';";

        $resulcompUsuario = mysqli_query($link, $compUsuario);

        if(mysqli_num_rows($resulcompUsuario) > 0){
            header("location: principal.php");
        }
        else {
            echo "Usuario <b>" . $usuario . "</b> y contrasena <b>" . $contrasena . "</b> no coinciden";
        }

    }

?>
        
    
</body>
</html>
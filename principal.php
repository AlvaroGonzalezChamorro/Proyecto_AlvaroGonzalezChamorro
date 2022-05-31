<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página principal</title>
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

    <h1> Bienvenido a Wikigame, <?php echo $_SESSION['usuario'] ?> </h1>

    <form action="" method="POST">

        <details>
            <summary> Ajustes de usuario </summary>
            <p><input type="submit" name="consultarUsuario" value="Ver datos de usuario"></p>
            <p><input type="submit" name="modificarUsuario" value="Modificar datos de usuario"></p>
            <p><input type="submit" name="eliminarUsuario" value="Eliminar datos de usuario"></p>
        </details>

        <h3>Videojuegos</h3>
            <p><input type="submit" name="consultarTodoVideojuego" value="Ver todos los videojuegos"></p>
            <p><input type="submit" name="ConsultarVideojuego" value="Buscar videojuego por nombre"></p>
            <p><input type="submit" name="agregarVideojuego" value="Agregar nuevo videojuego"></p>

<?php

    if(isset($_POST['consultarUsuario'])){

        $usuario = $_SESSION['usuario'];

        $consulUsuario = "SELECT * FROM usuario WHERE usuario='$usuario';";
        $resulUsuario = mysqli_query($link, $consulUsuario);

        if(mysqli_num_rows($resulUsuario) > 0){
            while($fila=mysqli_fetch_array($resulUsuario)){
                echo "DNI: " . $fila[0] . "<br>";
                echo "Usuario: " . $fila[1] . "<br>";
                echo "Contraseña: " . $fila[2] . "<br>";
                echo "Email: " . $fila[3] . "<br>";
                echo "Sexo: " . $fila[4] . "<br>";
                echo "Fecha de nacimiento: " . $fila[5] . "<br>";
                if($fila[6]){
                    echo "Está suscrito al boletín de noticias";
                }
                else {
                    echo "No está suscrito al boletín de noticias";
                }
            }
        }

    }

?>
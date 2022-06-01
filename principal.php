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
            <p><input type="submit" name="cerrarUsuario" value="Cerrar sesión"></p>
        </details>

        <h3>Videojuegos</h3>
            <p><input type="submit" name="consultarTodoVideojuego" value="Ver todos los videojuegos"></p>
            <p><input type="submit" name="ConsultarVideojuego" value="Buscar videojuego por nombre"></p>
            <p><input type="submit" name="agregarVideojuego" value="Agregar nuevo videojuego"></p>

            <p id="demo"></p>
    </form>

<?php

    if(isset($_POST['consultarUsuario'])){
        header('location: consultarUsuario.php');

    }

    if(isset($_POST['modificarUsuario'])){
        header('location: modificarUsuario.php');
    }

    if(isset($_POST['eliminarUsuario'])){
        header('location: eliminarUsuario.php');
    }

    if(isset($_POST['cerrarUsuario'])){

        session_destroy();

        echo '<script> alert("Se ha cerrado la sesión , será redirigid@ al inicio");
        window.location.href="index.php";
        </script>';
    }

    if(isset($_POST['consultarTodoVideojuego'])){
        header('location: consultarTodoVideojuego.php');
    }

    if(isset($_POST['ConsultarVideojuego'])){
        header('location: consultarVideojuego.php');
    }

    if(isset($_POST['agregarVideojuego'])){
        header('location: agregarVideojuego.php');
    }

?>



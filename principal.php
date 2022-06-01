<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/principal.css">
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
<div class="contenedor">
    <header>
        <h1> Bienvenido a Wikigame, <?php echo $_SESSION['usuario'] ?> </h1>
    </header>

    <form action="" method="POST">

    <aside>
        <article class="usuario">
            <h2>Ajustes de Usuario</h2>
            <hr>
            <ul>
                <li><p><input type="submit" name="consultarUsuario" value="Ver datos de usuario"></p></li>
                <li><p><input type="submit" name="modificarUsuario" value="Modificar datos de usuario"></p></li>
                <li><p><input type="submit" name="eliminarUsuario" value="Eliminar datos de usuario"></p></li>
                <li><p><input type="submit" name="cerrarUsuario" value="Cerrar sesión"></p></li>
            </ul>
        </article>
    </aside>

    <main>
        <article class="videojuego">
            <h2>Videojuegos</h2>
            <ul>
                <li><p><input type="submit" name="consultarTodoVideojuego" value="Ver todos los videojuegos"></p></li>
                <li><p><input type="submit" name="ConsultarVideojuego" value="Buscar videojuego por nombre"></p></li>
                <li><p><input type="submit" name="agregarVideojuego" value="Agregar nuevo videojuego"></p></li>
            </ul>
        </article>
    </main>

    </form>
</div>

</body>

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



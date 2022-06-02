<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/consultarUsuario.css">
    <title>Consultar usuario</title>
</head>
<body>

<div class="contenedor">

    <header>
        <h1> Datos del usuario </h1>
    </header>
    <main>

<?php

    $host="localhost";
    $user="root";
    $pwd="iaw";
    $nombreBD="alvarogonzalezchamorro_bd_final";

    $link=mysqli_connect($host,$user,$pwd);

    mysqli_select_db($link,$nombreBD);

    $usuario = $_SESSION['usuario'];

    $consulConsultar = "SELECT * FROM usuario WHERE usuario='$usuario';";
    $resulConsultar = mysqli_query($link, $consulConsultar);

    while($tupla = mysqli_fetch_array($resulConsultar)){

        echo "<b>DNI:</b> " . $tupla[0] . "<br>";
        echo "<b>Usuario:</b> " . $tupla[1] . "<br>";
        echo "<b>Contraseña:</b> " . $tupla[2] . "<br>";
        echo "<b>Email:</b> " . $tupla[3] . "<br>";
        echo "<b>Sexo:</b> " . $tupla[4] . "<br>";
        echo "<b>Fecha de nacimiento:</b> " . $tupla[5] . "<br>";
        if($tupla[6]){
            echo "<b>Está suscrito al boletín de noticias.</b>";
        }
        else {
            echo "<b>No está suscrito al boletín de noticias.</b>";
        }

    }

?>
    <form action="principal.php" method="POST">
        <p><input type="submit" name="volver" value="Volver"></p>
    </form>

<?php
    if(isset($_POST['volver'])){
        header('location: principal.php');
    }
?>
    </main>
</body>
</html>
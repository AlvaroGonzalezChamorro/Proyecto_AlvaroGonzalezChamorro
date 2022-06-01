<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultar usuario</title>
</head>
<body>

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

        echo "DNI: " . $tupla[0] . "<br>";
        echo "Usuario: " . $tupla[1] . "<br>";
        echo "Contraseña: " . $tupla[2] . "<br>";
        echo "Email: " . $tupla[3] . "<br>";
        echo "Sexo: " . $tupla[4] . "<br>";
        echo "Fecha de nacimiento: " . $tupla[5] . "<br>";
        if($tupla[6]){
            echo "Está suscrito al boletín de noticias";
        }
        else {
            echo "No está suscrito al boletín de noticias";
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
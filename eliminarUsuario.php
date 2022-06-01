<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar usuario</title>
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

    $consulModificar = "SELECT * FROM usuario WHERE usuario='$usuario';";
    $resulModificar = mysqli_query($link, $consulModificar);

    $tupla = mysqli_fetch_array($resulModificar);

    $dni = $tupla[0];

?>

    <h1> Eliminar usuario: <?php echo $usuario ?> </h1>

    <h4> Introduzca su DNI para confirmar </h4>

    <form action="" method="POST">
        <p><input type="text" name="dni"></p>
        <p><input type="submit" name="eliminar" value="Eliminar usuario"></p>
        <p><input type="submit" name="volver" value="Volver"></p>
    </form>

<?php

    if(isset($_POST['eliminar'])){
        $consulEliminar = "SELECT * FROM usuario WHERE dni='$dni' AND usuario='$usuario';";
        $resulEliminar = mysqli_query($link, $consulEliminar);

        if($_POST['dni'] == $dni){

            $eliminarUsuario = "DELETE FROM usuario WHERE dni='$dni';";

            mysqli_query($link, $eliminarUsuario);

            echo '<script> alert("Ha eliminado al usuario correctamente, será redirigid@ al inicio");
                window.location.href="index.php";
                </script>';

        }
        else {
?>
            <script>
                alert("No ha introducido el DNI correctamente");
            </script>
<?php
        }
    }

?>
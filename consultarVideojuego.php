<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/consultarVideojuego.css">
    <title>Consultar videojuego</title>
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
        <h1> Consultar videojuego </h1>
    </header>

    <main>
    <h4> Introduzca el nombre del videojuego </h4>

    <form action="" method="POST">
        <p><input type="text" name="videojuego"></p>
        <p><input type="submit" name="consultaVideojuego" value="Consultar"></p>
        <p><input type="submit" name="volver" value="Volver"></p>
    </form>

<?php

    if(isset($_POST['consultaVideojuego'])){

        $videojuego = $_POST['videojuego'];

        $consulVideojuego = "SELECT v.*, e.nombre, d.nombre 
        FROM videojuego v, estudio e, distribuidora d 
        WHERE v.estudio=e.id_estudio AND v.distribuidora=d.id_distribuidora AND v.nombre='$videojuego';";

        $resultVideojuego = mysqli_query($link, $consulVideojuego);

        if(mysqli_num_rows($resultVideojuego) > 0){
            while ($tuplaVideojuegos = mysqli_fetch_array($resultVideojuego)){
                echo "<p>";
                echo "<b>ID:</b> " . $tuplaVideojuegos[0] . "<br>";
                echo "<b>Nombre:</b> " . $tuplaVideojuegos[1] . "<br>";
                echo "<b>Fecha de salida:</b> " . $tuplaVideojuegos[2] . "<br>";
                echo "<b>Precio:</b> " . $tuplaVideojuegos[3] . "<br>";
                echo "<b>Estudio:</b> " . $tuplaVideojuegos[6] . " (" . $tuplaVideojuegos[4] . ")" . "<br>";
                echo "<b>Distribuidora:</b> " . $tuplaVideojuegos[7] . "(" . $tuplaVideojuegos[5] . ")" . "<br>";
                echo "</p>";
            }
        }
        else {
?>
            <script>
                alert("No se han encontrado videojuegos con ese nombre");
            </script>
<?php
        }
    }

    if(isset($_POST['volver'])){
        header('location: principal.php');
    }
?>
    </main>
</div>
</body>
</html>
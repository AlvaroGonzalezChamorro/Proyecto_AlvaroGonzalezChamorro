<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/agregarVideojuego.css">
    <title>Agregar videojuego</title>
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
        <h1> Agregar videojuego </h1>
    </header>
    
    <main>

    <form action="" method="POST">

        <p>
            <h4>ID del videojuego</h4> <br>
            <input type="text" name="id_videojuego">
        </p>

        <p>
            <h4>Nombre</h4> <br>
            <input type="text" name="nombre">
        </p>

        <p>
            <h4>Fecha de salida</h4> <br>
            <input type="text" name="fec_salida">
        </p>

        <p>
            <h4>Precio</h4> <br>
            <input type="text" name="precio">
        </p>

        <p>
        <h4>Estudio</h4> <br>
        <select name="estudio">
            <option value=""></option>
<?php
        mysqli_select_db($link,$nombreBD);
            $consulEstudio="SELECT id_estudio, nombre FROM estudio";
            $resulEstudio=mysqli_query($link,$consulEstudio);
            while($tupla=mysqli_fetch_array($resulEstudio)){
?>
            <option value="<?php echo $tupla[0] ?>"><?php echo $tupla[1] ?></option>
<?php
            }
?>
        </select>

        </p>

        <p>
        <h4>Distribuidora</h4> <br>
        <select name="distribuidora">
            <option value=""></option>
<?php
        mysqli_select_db($link,$nombreBD);
            $consulDistribuidora="SELECT id_distribuidora, nombre FROM distribuidora";
            $resulDistribuidora=mysqli_query($link,$consulDistribuidora);
            while($tupla=mysqli_fetch_array($resulDistribuidora)){
?>
            <option value="<?php echo $tupla[0] ?>"><?php echo $tupla[1] ?></option>
<?php
            }
?>
        </select>

        </p>

        <input type="submit" name="agregar" value="Agregar">
        <input type="submit" name="volver" value="Volver">
        <input type="reset" name="reset" value="Restablecer campos">

    </form>

<?php

    if(isset($_POST['agregar'])){
        $id_videojuego = $_POST['id_videojuego'];
        $nombre = $_POST['nombre'];
        $fec_salida = $_POST['fec_salida'];
        $precio = $_POST['precio'];
        $estudio = $_POST['estudio'];
        $distribuidora = $_POST['distribuidora'];

        $consulVideojuego = "SELECT * FROM videojuego WHERE id_videojuego=$id_videojuego;";
        $resulVideojuego = mysqli_query($link, $consulVideojuego);

        if(mysqli_num_rows($resulVideojuego) > 0){
?>

            <script>
                    alert("Este videojuego ya existe");
            </script>

<?php
        }
        else {

            $insertVideojuego = "INSERT INTO videojuego VALUES (
                $id_videojuego, '$nombre', '$fec_salida', $precio, $estudio, $distribuidora
            );";

            mysqli_query($link, $insertVideojuego);

            echo '<script> alert("Videojuego agregado correctamente, será redirigid@ a la página principal");
                window.location.href="principal.php";
                </script>';

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
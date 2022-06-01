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
    $contrasena = $tupla[2];
    $email = $tupla[3];
    $sexo = $tupla[4];
    $fec_nac = $tupla[5];
    $boletin = $tupla[6];

?>

    <h1> Modificar usuario: <?php echo $usuario ?> </h1>

    <h3> Modifique los campos deseados </h3>

    <form action="" method="POST">

        <p>
            DNI <br>
            <input type="text" name="dni" value="<?php echo $dni ?>" disabled>
        </p>

        <p>
            Usuario <br>
            <input type="text" name="usuario" value="<?php echo $usuario ?>">
        </p>

        <p>
            Contraseña <br>
            <input type="text" name="contrasena" value="<?php echo $contrasena ?>">
        </p>

        <p>
            Email <br>
            <input type="text" name="email" value="<?php echo $email ?>">
        </p>

<?php

    if($sexo == 'H'){
?>
        <p>
            Sexo <br>
            <input type="radio" name="sexo" value="H" checked> Hombre
            <input type="radio" name="sexo" value="M"> Mujer
        </p>
<?php
    } else {
?>
    <p>
        Sexo <br>
        <input type="radio" name="sexo" value="H"> Hombre
        <input type="radio" name="sexo" value="M" checked> Mujer
    </p>
<?php
    }
?>

        <p>
            Fecha de nacimiento <br>
            <input type="text" name="fec_nac" value="<?php echo $fec_nac ?>">
        </p>

        <p>
            <input type="hidden" name="boletin" value="false">
            <input type="checkbox" name="boletin" value="true" checked>
            ¿Desea suscribirse al boletín de noticias de WikiGame?
        </p>

        <input type="submit" name="modificar" value="Modificar usuario">
        <input type="submit" name="volver" value="Volver">
        <input type="reset" name="reset" value="Restablecer campos">

    </form>

<?php

    if(isset($_POST['modificar'])){

        $usuarioMod = $_POST['usuario'];
        $contrasenaMod = $_POST['contrasena'];
        $emailMod = $_POST['email'];
        $sexoMod = $_POST['sexo'];
        $fec_nacMod = $_POST['fec_nac'];
        $boletinMod = $_POST['boletin'];

        $modificarUsuario = "UPDATE usuario SET
            usuario = '$usuarioMod',
            contrasena = '$contrasenaMod',
            email = '$emailMod',
            sexo = '$sexoMod',
            fec_nac = '$fec_nacMod',
            boletin = $boletinMod
            WHERE dni='$dni'
        ;";

        mysqli_query($link, $modificarUsuario);

?>
<script>
        alert("Se ha modificado al usuario correctamente");
</script>
<?php
    }

    if(isset($_POST['volver'])){
        header('location: principal.php');
    }
?>

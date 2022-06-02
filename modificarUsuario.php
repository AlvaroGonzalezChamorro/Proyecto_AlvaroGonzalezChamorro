<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/modificarUsuario.css">
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
<div class="contenedor">

    <header>
        <h1> Modificar usuario: <?php echo $usuario ?> </h1>
    </header>

    <main>
    <h3> Modifique los campos deseados </h3>

    <form action="" method="POST">

        <p>
            <h4>DNI</h4> <br>
            <input type="text" name="dni" value="<?php echo $dni ?>" disabled>
        </p>

        <p>
            <h4>Usuario</h4> <br>
            <input type="text" name="usuario" value="<?php echo $usuario ?>">
        </p>

        <p>
            <h4>Contraseña</h4> <br>
            <input type="text" name="contrasena" value="<?php echo $contrasena ?>">
        </p>

        <p>
            <h4>Email</h4> <br>
            <input type="text" name="email" value="<?php echo $email ?>">
        </p>

<?php

    if($sexo == 'H'){
?>
        <p>
            <h4>Sexo</h4> <br>
            <input type="radio" name="sexo" value="H" checked> Hombre
            <input type="radio" name="sexo" value="M"> Mujer
        </p>
<?php
    } else {
?>
    <p>
        <h4>Sexo</h4> <br>
        <input type="radio" name="sexo" value="H"> Hombre
        <input type="radio" name="sexo" value="M" checked> Mujer
    </p>
<?php
    }
?>

        <p>
            <h4>Fecha de nacimiento</h4> <br>
            <input type="text" name="fec_nac" value="<?php echo $fec_nac ?>">
        </p>

        <p>
            <input type="hidden" name="boletin" value="false">
            <div class="check"><input type="checkbox" name="boletin" value="true" checked></div>
            <div class="checkText"><h4>¿Desea suscribirse al boletín de noticias de WikiGame?</h4></div>
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

        echo '<script> alert("Usuario modificado correctamente, será redirigid@ a la página principal");
        window.location.href="principal.php";
        </script>';
    }

    if(isset($_POST['volver'])){
        header('location: principal.php');
    }
?>
    </main>
</div>
</body>
</html>
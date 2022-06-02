<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/registro.css">
    <title>Registro</title>
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
        <h1> Bienvenido a WikiGame </h1>
    </header>

    <main>
    <p><h3> Introduzca los datos para registrarse </h3></p>

    <form action="" method="POST">

        <p>
            <h4>DNI</h4> <br>
            <input type="text" name="dni">
        </p>

        <p>
            <h4>Usuario</h4> <br>
            <input type="text" name="usuario">
        </p>

        <p>
            <h4>Contraseña</h4> <br>
            <input type="text" name="contrasena">
        </p>

        <p>
            <h4>Email</h4> <br>
            <input type="text" name="email">
        </p>

        <p>
            <h4>Sexo</h4> <br>
            <input type="radio" name="sexo" value="H"> Hombre
            <input type="radio" name="sexo" value="M"> Mujer
        </p>

        <p>
            <h4>Fecha de nacimiento</h4> <br>
            <input type="text" name="fec_nac" placeholder="1990-06-27">
        </p>

        
            <p>
                <input type="hidden" name="boletin" value="false">
                <div class="check"><input type="checkbox" name="boletin" value="true" checked></div>
                <div class="checkText"><h4>¿Desea suscribirse al boletín de noticias de WikiGame?</h4></div>
            </p>
        

        <input type="submit" name="registrar" value="Registrarse">
        <input type="submit" name="volver" value="Volver">
        <input type="reset" name="reset" value="Restablecer campos">

    </form>

<?php

    if(isset($_POST['registrar'])){
        $dni = $_POST['dni'];
        $usuario = $_POST['usuario'];
        $contrasena = $_POST['contrasena'];
        $email = $_POST['email'];
        $sexo = $_POST['sexo'];
        $fec_nac = $_POST['fec_nac'];
        $boletin = $_POST['boletin'];

        $consulUsuario = "SELECT * FROM usuario WHERE usuario='$usuario';";
        $resulUsuario = mysqli_query($link, $consulUsuario);

        if(mysqli_num_rows($resulUsuario) > 0){
?>

            <script>
                    alert("Ese nombre de usuario ya existe");
            </script>

<?php
        }
        else {

            $insertUsuario = "INSERT INTO usuario VALUES (
                '$dni', '$usuario', '$contrasena', '$email', '$sexo', '$fec_nac', $boletin
            );";

            mysqli_query($link, $insertUsuario);

            echo '<script> alert("Usuario registrado correctamente, será redirigid@ al inicio");
                window.location.href="index.php";
                </script>';

        }     
    }

    if(isset($_POST['volver'])){
        header('location: index.php');
    }
?>
    </main>
</div>
</body>
</html>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

    <h1> Bienvenido a WikiGame </h1>
    
    <p><h3> Introduzca los datos para registrarse </h3></p>

    <form action="" method="POST">

        <p>
            DNI <br>
            <input type="text" name="dni">
        </p>

        <p>
            Usuario <br>
            <input type="text" name="usuario">
        </p>

        <p>
            Contraseña <br>
            <input type="text" name="contrasena">
        </p>

        <p>
            Email <br>
            <input type="text" name="email">
        </p>

        <p>
            Sexo <br>
            <input type="radio" name="sexo" value="H"> Hombre
            <input type="radio" name="sexo" value="M"> Mujer
        </p>

        <p>
            Fecha de nacimiento <br>
            <input type="text" name="fec_nac" placeholder="1990-06-27">
        </p>

        <p>
            <input type="hidden" name="boletin" value="false">
            <input type="checkbox" name="boletin" value="true">
            ¿Desea suscribirse al boletín de noticias de WikiGame?
        </p>

        <input type="submit" name="registrar" value="Registrarse">
        <button><a href="index.php"> Volver </a></button>
        <input type="reset" name="reset" value="Restablecer campos">
        


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
            echo "El nombre de usuario <b>" . $usuario . "</b> ya ha sido registrado";
        }
        else {

            $insertUsuario = "INSERT INTO usuario VALUES (
                '$dni', '$usuario', '$contrasena', '$email', '$sexo', '$fec_nac', $boletin
            );";

            mysqli_query($link, $insertUsuario);

            echo "Usuario <b>" . $usuario . "</b> registrado correctamente";
        }
        
        

    }




?>
        
    
</body>
</html>
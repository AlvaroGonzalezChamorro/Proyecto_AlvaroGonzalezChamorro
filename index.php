<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css">
    <title>Inicio</title>
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

    <form action="" method="POST">

    <main>
        <article class="login">
            <p>
                <h4>Usuario</h4> <br>
                <input type="text" name="usuario">
            </p>

            <p>
                <h4>Contraseña</h4> <br>
                <input type="text" name="contrasena">
            </p>

            <input type="submit" name="login" value="Acceder">
            <input type="reset" name="reset" value="Restablecer campos">

            <p>
                <a href="registro.php"> ¿Aún no se ha registrado? Pulse aquí </a>
            </p>
        </article>
    </main>

    </form>
</div>
<?php

    if(isset($_POST['login'])){
        
        $_SESSION['usuario'] = $_POST['usuario'];

        $usuario = $_POST['usuario'];

        $contrasena = $_POST['contrasena'];

        $compUsuario = "SELECT * FROM usuario WHERE usuario='$usuario' AND contrasena='$contrasena';";

        $resulcompUsuario = mysqli_query($link, $compUsuario);

        if(mysqli_num_rows($resulcompUsuario) > 0){
            header("location: principal.php");
        }
        else {
?>
            <script>
                    alert("No coindice el usuario y la contraseña");
            </script>
<?php
        }

    }

?>
        
    
</body>
</html>
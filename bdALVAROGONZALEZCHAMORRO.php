<?php

    $host="localhost";
    $user="root";
    $pwd="iaw";
    $nombreBD="alvarogonzalezchamorro_bd_final";

    $link=mysqli_connect($host,$user,$pwd);

    $crearBD="CREATE DATABASE $nombreBD";

    mysqli_query($link,$crearBD);

    mysqli_select_db($link,$nombreBD);

    $crearUsuario="CREATE TABLE usuario (
        dni VARCHAR(9) PRIMARY KEY NOT NULL,
        usuario VARCHAR(50),
        contrasena VARCHAR(50),
        sexo CHAR(1),
        fec_nac DATE,
        boletin BOOLEAN
    );";

    $crearEstudio="CREATE TABLE estudio (
        id_estudio INT(9) PRIMARY KEY,
        nombre VARCHAR(100),
        presidente VARCHAR(100),
        fundador VARCHAR(100),
        pais VARCHAR(50),
        localidad VARCHAR(50)
    );";

    $crearDistribuidora="CREATE TABLE distribuidora (
        id_distribuidora INT(9) PRIMARY KEY,
        nombre VARCHAR(100),
        presidente VARCHAR(100),
        fundador VARCHAR(100),
        pais VARCHAR(50),
        localidad VARCHAR(50)
    );";

    $crearVideojuego="CREATE TABLE videojuego (
        id_videojuego INT(9) PRIMARY KEY,
        nombre VARCHAR(100),
        fec_salida DATE,
        precio DECIMAL(10,2),
        estudio INT(9),
        distribuidora INT(9),
        FOREIGN KEY (estudio) REFERENCES estudio(id_estudio),
        FOREIGN KEY (distribuidora) REFERENCES distribuidora(id_distribuidora)
    );";

    mysqli_query($link,$crearUsuario);
    mysqli_query($link,$crearEstudio);
    mysqli_query($link,$crearDistribuidora);
    mysqli_query($link,$crearVideojuego);

    $insertUsuario="INSERT INTO usuario VALUES 
        ('45654585F', 'alvaro', 'alvaropass', 'H', '1996-07-22', false),
        ('85236985T', 'eva', 'evapass', 'M', '1990-05-23', true),
        ('12345678D', 'pepe', 'pepepass', 'H', '1984-01-06', true)
    ;";

    $insertEstudio="INSERT INTO estudio VALUES 
        (123456789, 'From Software, Inc.', 'Hidetaka Miyazaki', 'Naotoshi Zin', 'Japón', 'Tokio'),
        (586548547, 'The Game Kitchen', 'Mauricio García', 'Mauricio García', 'España', 'Sevilla'),
        (987654321, 'Game Freak', 'Satoshi Taijiri', 'Satoshi Taijiri', 'Japón', 'Setagaya')
        
    ;";

    $insertDistribuidora="INSERT INTO distribuidora VALUES 
        (789456123, 'Bandai Namco Entertainment Inc.', 'Satoshi Oshita', 'Masaya Nakamura', 'Japón', 'Tokio'),
        (951623847, 'Activision', 'Robert Kotick', 'Robert Kotick', 'Estados Unidos', 'Los Ángeles'),
        (852963714, 'Electronic Arts Inc.', 'Andrew Wilson', 'Trip Hawkins', 'Redwood City', 'Estados Unidos')
    ;";

    $insertVideojuego="INSERT INTO videojuego VALUES 
        ('846957157', 'Bloodborne', '2015-03-24', 19.99, 123456789, 789456123),
        ('957851364', 'Blasphemous', '2019-09-10', 24.99, 586548547, 951623847),
        ('12345678D', 'Pokémon Diamante', '2006-09-28', 19.99, 987654321, 852963714)
    ;";

    mysqli_query($link,$insertUsuario);
    mysqli_query($link,$insertEstudio);
    mysqli_query($link,$insertDistribuidora);
    mysqli_query($link,$insertVideojuego);

?>
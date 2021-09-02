<?php
    $servidor="localhost";
    $usuario="root";
    $password="";
    $namDB="proyecto_final";


    $conn = mysqli_connect($servidor,$usuario,$password,$namDB);

    if(!$conn){
        die("Error de conexion". mysqli_connect_error());
    }

    else{
      //  echo 'Conectado';
    }
?>
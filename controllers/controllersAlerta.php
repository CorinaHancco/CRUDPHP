<?php
    include ('config/conexion.php');

    $consultaAlerta = "SELECT * FROM producto WHERE stock <= 3";

    $resultadoAlerta = mysqli_query($conn,$consultaAlerta);
    $numeroAlerta = mysqli_num_rows($resultadoAlerta);


?>
<?php
header("Content-Type:application/xls");
header("Content-Disposition:attachment; filename= productos.xls");

include '../config/conexion.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Descripcion</th>
                <th>Stock</th>
                <th>Precio</th>
                <th>IVA</th>
                <th>peso</th>
                <th>Proveedor</th>
                <th>Presentacion</th>
                <th>Marca</th>
                <th>Zona</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody>
        <?php
                    $consultaProductos = 'SELECT *  FROM  producto';
                    $resultadoProductos = mysqli_query($conn, $consultaProductos);

                    while ($fila = mysqli_fetch_array($resultadoProductos)) {
                    ?>
                        <tr>
                            <td><?php echo  $fila[0] ?></td>
                            <td><?php echo $fila[1] ?></td>
                            <td><?php echo  $fila[2] ?></td>
                            <td><?php echo  $fila[3] ?></td>
                            <td><?php echo $fila[4] ?></td>
                            <td><?php echo  $fila[5] ?></td>
                            <td>

                                <?php
                                //echo $fila[6];
                                $consultaProve = "SELECT  prov.descipcion
                                   FROM proveedor Prov 
                                   WHERE Prov.id = '$fila[6]'";
                                $ejecutarProve = mysqli_query($conn, $consultaProve);
                                $salidaProve = mysqli_fetch_assoc($ejecutarProve);
                                echo implode($salidaProve);

                                ?>

                            </td>
                            <td>
                                <?php
                                $consultaPres = "SELECT  pres.descipcion
                                FROM presentacion Pres 
                                WHERE Pres.id = '$fila[7]'";
                                $ejecutarPres = mysqli_query($conn, $consultaPres);
                                $salidaPres = mysqli_fetch_assoc($ejecutarPres);
                                echo implode($salidaPres);

                                //echo $fila[7]
                                ?>
                            </td>
                            <td>
                                <?php
                                $consultaMar = "SELECT  mar.descripcion
                                FROM marca mar 
                                WHERE mar.id = '$fila[8]'";
                                $ejecutarMar = mysqli_query($conn, $consultaMar);
                                $salidaMar = mysqli_fetch_assoc($ejecutarMar);
                                echo implode($salidaMar);
                                //echo $fila[8] 
                                ?>
                            </td>
                            <td>
                                <?php 
                                $consultaZon = "SELECT  zo.descipcion
                                FROM zona zo 
                                WHERE zo.id = '$fila[9]'";
                                $ejecutarZon = mysqli_query($conn, $consultaZon);
                                $salidaZon = mysqli_fetch_assoc($ejecutarZon);
                                echo implode($salidaZon);
                                //echo $fila[9] 
                                ?>
                            </td>
                        </tr>

                    <?php
                    }
                    ?>
        </tbody>
    </table>
</body>

</html>
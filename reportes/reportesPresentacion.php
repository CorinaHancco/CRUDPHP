<?php
header("Content-Type:application/xls");
header("Content-Disposition:attachment; filename= presentacion.xls");

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
                        <th>Precio</th>
                        <th>Costo</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Nombre</th>
                        <th>Precio</th>
                        <th>Costo</th>
                    </tr>
                </tfoot>
                <tbody>

                <?php
                    $consultaPresentacion = 'SELECT id,descipcion  FROM  presentacion';
                    $resultadoPresentacion = mysqli_query($conn, $consultaPresentacion);

                    while ($fila = mysqli_fetch_array($resultadoPresentacion)) {
                    ?>
                        <tr>
                            <td><?php echo $fila[0] ?></td>
                            <td><?php echo $fila[1] ?></td>
                        </tr>

                    <?php
                    }
                    ?>

                </tbody>
            </table>
</body>

</html>
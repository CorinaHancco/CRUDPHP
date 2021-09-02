<?php
include_once("../config/conexion.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body>
    <?php

    //PARA AGREGAR UNO NUEVO
    if (isset($_REQUEST['agregar'])) {
        //echo 'boton del formulario funcionando';
        $descripcionProducto = (isset($_POST['NombreProducto'])) ? $_POST['NombreProducto'] : 'no se encuentra el nombre';
        echo $descripcionProducto;

        $precioProducto = (isset($_POST['PrecioProducto'])) ? $_POST['PrecioProducto'] : 'no se encuentra el precio';
        echo $precioProducto;

        $stockProducto = (isset($_POST['StockProducto'])) ? $_POST['StockProducto'] : 'no se encuentra el stock';
        echo $stockProducto;
       
        $ivaProducto = (isset($_POST['IVAproducto'])) ? $_POST['IVAproducto'] : 'no se encuentra el IVA';
        echo $ivaProducto;

        $pesoProducto = (isset($_POST['PesoProducto'])) ? $_POST['PesoProducto'] : 'no se encuentra el peso';
        echo $pesoProducto;

        $proveedorProducto = (isset($_POST['ProveedorProducto'])) ? $_POST['ProveedorProducto'] : 'no se encuentra el proveedor';
        echo $proveedorProducto;

        $presentacionProducto = (isset($_POST['PresentacionProducto'])) ? $_POST['PresentacionProducto'] : 'no se encuentra la presentacion';
        echo $presentacionProducto;

        $marcaProducto = (isset($_POST['MarcaProducto'])) ? $_POST['MarcaProducto'] : 'no se encuentra la marca';
        echo $marcaProducto;

        $zonaProducto = (isset($_POST['ZonaProducto'])) ? $_POST['ZonaProducto'] : 'no se encuentra la zona';
        echo $zonaProducto;
        //echo $descripcion;
         $consulta = " INSERT INTO producto(descripcion,precio,stock,iva,peso,proveedor_id,presentacion_id,marca_id,zona_id) VALUES('$descripcionProducto','$precioProducto','$stockProducto','$ivaProducto','$pesoProducto','$proveedorProducto','$presentacionProducto','$marcaProducto','$zonaProducto')";
        echo 'Consulta ok';
        // $acction = mysqli_query($conn,$consulta);

        if (mysqli_query($conn, $consulta)) {
            echo '<script type="text/javascript">
            swal({
                title: "Registrado !",
                text: "Registrado exitosamente!",
                icon: "success",
                button: "Cofirmar!",
              }).then((velue)=>{
                  window.location.href="../productos.php";
              })
              
              </script>';
        } else {
            echo 'Error al registrar los datos';
        }
    }



    //EDITAR

    if (isset($_REQUEST['guardarCambios'])) {
        $id = (isset($_POST['txtId'])) ? $_POST['txtId'] : 'no se encuentra';
        $descripcion = (isset($_POST['textDescripcion'])) ? $_POST['textDescripcion'] : 'no se encuentra';
        echo $descripcion;
        $precio = (isset($_POST['textPrecio'])) ? $_POST['textPrecio'] : 'no se encuentra';
        echo $precio;
        $stock = (isset($_POST['textStock'])) ? $_POST['textStock'] : 'no se encuentra';
        $stock;
        $iva = (isset($_POST['textIVA'])) ? $_POST['textIVA'] : 'no se encuentra';
        echo $iva;
        $peso = (isset($_POST['textPeso'])) ? $_POST['textPeso'] : 'no se encuentra';
        echo $peso;
        $Proveedor_id = (isset($_POST['ProveedorProducto'])) ? $_POST['ProveedorProducto'] : 'no se encuentra';
        echo $Proveedor_id;
        $Presentacion_id = (isset($_POST['PresentacionProducto'])) ? $_POST['PresentacionProducto'] : 'no se encuentra';
        echo $Presentacion_id;
        $Marca_id = (isset($_POST['MarcaProducto'])) ? $_POST['MarcaProducto'] : 'no se encuentra';
        echo $Marca_id;
        $Zona_id = (isset($_POST['ZonaProducto'])) ? $_POST['ZonaProducto'] : 'no se encuentra';
        echo $Zona_id;
        

        $consulta = "UPDATE producto SET 
        descripcion='$descripcion',
        precio='$precio',
        stock='$stock',
        iva='$iva',
        peso='$peso',
        proveedor_id='$Proveedor_id',
        presentacion_id='$Presentacion_id',
        marca_id='$Marca_id',
        zona_id='$Zona_id'
        WHERE id='$id' ";

        if (mysqli_query($conn, $consulta)) {
            
            
            echo '<script type="text/javascript">
            swal({
                title: "Modificado !",
                text: "Modificado exitosamente!",
                icon: "success",
                button: "Cofirmar!",
              }).then((velue)=>{
                  window.location.href="../productos.php";
              })
              
              </script>';
        } else {
            echo  'Error al registrar los datos' . mysqli_error($conn) ;
        }
    }



    //  ELIMINAR

    if (isset($_REQUEST['confirmarEliminacion'])) {
        // echo 'encontrado';
        $id = (isset($_POST['txtIdEliminar'])) ? $_POST['txtIdEliminar'] : 'no se encuentra';
        echo $id;

        $consulta = "DELETE FROM producto WHERE id='$id' ";
        // echo 'ok';


        if (mysqli_query($conn, $consulta)) {
            echo '<script type="text/javascript">
            swal({
                title: "Eliminado !",
                text: "Eliminado exitosamente!",
                icon: "success",
                button: "Cofirmar!",
              }).then((velue)=>{
                  window.location.href="../productos.php";
              })
              
              </script>';
        } else {
            echo 'Error al registrar los datos';
        }
    }
    ?>
</body>

</html>
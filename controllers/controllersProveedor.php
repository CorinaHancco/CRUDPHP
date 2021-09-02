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
    if (isset($_REQUEST['btn_guardar'])) {
        $descripcion = (isset($_POST['textDescripcion'])) ? $_POST['textDescripcion'] : 'no se encuentra';
        //echo 'Se presiono';
        $consulta = " INSERT INTO proveedor(descipcion) VALUES('$descripcion')";

        if (mysqli_query($conn, $consulta)) {
            echo '<script type="text/javascript">
            swal({
                title: "Registrado !",
                text: "Registrado exitosamente!",
                icon: "success",
                button: "Cofirmar!",
              }).then((velue)=>{
                  window.location.href="../proveedor.php";
              })
              
              </script>';
        } else {
            echo 'Error al registrar los datos';
        }
    }



    //EDITAR

    if (isset($_REQUEST['botonEditar'])) {
        $id = (isset($_POST['txtId'])) ? $_POST['txtId'] : 'no se encuentra';
        $descripcion = (isset($_POST['textDescripcion'])) ? $_POST['textDescripcion'] : 'no se encuentra';
        //echo 'Se presiono';
        //echo $id;
        //echo $descripcion;

        $consulta = "UPDATE proveedor SET descipcion='$descripcion' WHERE id='$id' ";

        if (mysqli_query($conn, $consulta)) {
            echo '<script type="text/javascript">
            swal({
                title: "Modificado !",
                text: "Modificado exitosamente!",
                icon: "success",
                button: "Cofirmar!",
              }).then((velue)=>{
                  window.location.href="../proveedor.php";
              })
              
              </script>';
        } else {
            echo 'Error al registrar los datos';
        }      
    } 



    //  ELIMINAR

    //EDITAR

    if (isset($_REQUEST['confirmarEliminacion'])) {
       // echo 'encontrado';
        $id = (isset($_POST['txtIde'])) ? $_POST['txtIde'] : 'no se encuentra';
        echo $id;
        
        $consulta = "DELETE FROM proveedor WHERE id='$id' ";
      // echo 'ok';


        if (mysqli_query($conn, $consulta)) {
            echo '<script type="text/javascript">
            swal({
                title: "Eliminado !",
                text: "Eliminado exitosamente!",
                icon: "success",
                button: "Cofirmar!",
              }).then((velue)=>{
                  window.location.href="../proveedor.php";
              })
              
              </script>';
        } else {
            echo 'Error al registrar los datos';
        }      
    } 


    ?>
</body>

</html>
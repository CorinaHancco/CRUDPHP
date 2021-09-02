<?php
include 'includes/header.php';
include 'includes/template.php';

include 'config/conexion.php';
$consultaPresentacion = 'SELECT id, descipcion FROM presentacion ';
$resultadoPresentacion = mysqli_query($conn, $consultaPresentacion);

$consultaProveedor = 'SELECT id, descipcion FROM proveedor ';
$resultadoProveedor = mysqli_query($conn, $consultaProveedor);


$consultaMarca = 'SELECT id, descripcion FROM marca ';
$resultadoMarca = mysqli_query($conn, $consultaMarca);



$consultaZona = 'SELECT id, descipcion FROM zona ';
$resultadoZona = mysqli_query($conn, $consultaZona);

$resultadoProveedorEditar = mysqli_query($conn, $consultaProveedor);
$resultadoPresentacionEditar = mysqli_query($conn, $consultaPresentacion);
$resultadoMarcaEditar = mysqli_query($conn, $consultaMarca);
$resultadoZonaEditar =  mysqli_query($conn, $consultaZona);
?>

<div class="row">
    <div class="col-4">
        <div class="card">
            <div class="card-header bg-success">
                <h3 class="text-light text-center">Registrar Productos </h3>

            </div>
            <div class="card-body">
                <form action="controllers/controllersProducto.php" method="POST" class="needs-validation" novalidate>
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <input type="text" class="form-control" placeholder="Nombre del producto" name="NombreProducto" id="validationCustom01" required>
                            <div class="valid-feedback">
                                Ok
                            </div>
                            <div class="invalid-feedback">
                                Por favor Ingresar Descripción
                            </div>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col">
                            <input type="number" class="form-control" placeholder="Stock" name="StockProducto" id="validationCustom01" required>
                            <div class="valid-feedback">
                                Ok
                            </div>
                            <div class="invalid-feedback">
                                Por favor Ingresar Descripción
                            </div>
                        </div>
                        <div class="col">
                            <input type="number" class="form-control" placeholder="Precio" name="PrecioProducto" id="validationCustom01" required>
                            <div class="valid-feedback">
                                Ok
                            </div>
                            <div class="invalid-feedback">
                                Por favor Ingresar Descripción
                            </div>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col">
                            <input type="text" class="form-control" placeholder="IVA" value="18%" name="IVAproducto" id="validationCustom01" required>
                            <div class="valid-feedback">
                                Ok
                            </div>
                            <div class="invalid-feedback">
                                Por favor Ingresar Descripción
                            </div>
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" placeholder="Peso" name="PesoProducto" id="validationCustom01" required>
                            <div class="valid-feedback">
                                Ok
                            </div>
                            <div class="invalid-feedback">
                                Por favor Ingresar Descripción
                            </div>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col">
                            <label for="">Selecione proveedor</label>
                            <select name="ProveedorProducto" id="" class="form-control" id="validationCustom01" required>
                                <option value="">--SELECCIONE--</option>
                                <?php
                                while ($filaProveedor = mysqli_fetch_array($resultadoProveedorEditar)) {
                                ?>
                                    <option value='<?php echo $filaProveedor[0]; ?>'><?php echo $filaProveedor[1]; ?> </option>
                                <?php
                                }
                                ?>
                            </select>
                            <div class="valid-feedback">
                                Ok
                            </div>
                            <div class="invalid-feedback">
                                Seleccione alguna
                            </div>
                        </div>
                        <div class="col">
                            <label for="">Selecione Presentacion</label>
                            <select name="PresentacionProducto" id="" class="form-control" id="validationCustom01" required>
                                <option value="" hidden>--SELECCIONE--</option>
                                <?php
                                while ($fila =  mysqli_fetch_array($resultadoPresentacionEditar)) {
                                ?>
                                    <option value='<?php echo $fila[0]; ?>'><?php echo $fila[1]; ?> </option>
                                <?php
                                }
                                ?>
                            </select>
                            <div class="valid-feedback">
                                Ok
                            </div>
                            <div class="invalid-feedback">
                                Seleccione alguna
                            </div>
                        </div>
                    </div>



                    <div class="row form-group">
                        <div class="col">
                            <label for="">Selecione Marca</label>
                            <select name="MarcaProducto" id="" class="form-control" id="validationCustom01" required>
                                <option value="" hidden>--SELECCIONE--</option>
                                <?php
                                while ($filaMarca =  mysqli_fetch_array($resultadoMarcaEditar)) {
                                ?>
                                    <option value='<?php echo $filaMarca[0]; ?>'><?php echo $filaMarca[1]; ?> </option>
                                <?php
                                }
                                ?>
                            </select>
                            <div class="valid-feedback">
                                Ok
                            </div>
                            <div class="invalid-feedback">
                                Seleccione alguna
                            </div>
                        </div>

                        <div class="col">
                            <label for="">Selecione Zona</label>
                            <select name="ZonaProducto" id="" class="form-control" id="validationCustom01" required>
                                <option value="" hidden>--SELECCIONE--</option>
                                <?php
                                while ($filaZona =  mysqli_fetch_array($resultadoZona)) {
                                ?>
                                    <option value='<?php echo $filaZona[0]; ?>'><?php echo $filaZona[1]; ?> </option>
                                <?php
                                }
                                ?>
                            </select>
                            <div class="valid-feedback">
                                Ok
                            </div>
                            <div class="invalid-feedback">
                                Seleccione alguna
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary " name="agregar">Enviar</button>
                    </div>
                </form>

            </div>

        </div>
    </div>

    <div class="col-7">
        <a href="reportes/reportesProductos.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
        <div class="table-responsive">
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
                <tfoot>
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
                </tfoot>
                <tbody>
                    <?php
                    $consultaProductos = 'SELECT *  FROM  producto';
                    $resultadoProductos = mysqli_query($conn, $consultaProductos);

                    while ($fila = mysqli_fetch_array($resultadoProductos)) {
                        $datos = $fila[0] . ',' . $fila[1] . ',' . $fila[2] . ',' . $fila[3] . ',' . $fila[4] . ',' . $fila[5] . ',' . $fila[6] . ',' . $fila[7] . ',' . $fila[8] . ',' . $fila[9];


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
                            <td>
                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#ModalEditar" onclick="agregarDatos('<?php echo $datos ?>')">
                                    Editar
                                </button>

                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#ModalEliminar" onclick="agregarDatos('<?php echo $datos ?>')">
                                    Eliminar
                                </button>
                            </td>
                        </tr>

                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<!-- EDITAR -->
<div class="modal fade" id="ModalEditar" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Editar producto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="controllers/controllersProducto.php" method="POST" class="needs-validation" novalidate>
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <input type="text" name="txtId" id="txtId" hidden>
                            <label for="">Descripcion</label>
                            <input type="text" class="form-control" placeholder="Descripcion" name="textDescripcion" id="txtDescripcion" required>
                            <br>
                            <label for="">Stock</label>
                            <input type="number" class="form-control" placeholder="Stock" name="textStock" id="txtStock" required>
                            <br>
                            <label for="">Precio</label>
                            <input type="number" class="form-control" placeholder="Precio" name="textPrecio" id="txtPrecio" required>
                            <br>
                            <label for="">IVA</label>
                            <input type="text" class="form-control" placeholder="IVA" name="textIVA" id="txtIVA" required>
                            <br>
                            <label for="">Peso</label>
                            <input type="text" class="form-control" placeholder="Peso" name="textPeso" id="txtPeso" required>
                            <br>
                            <label for="">Selecione proveedor</label>
                            <select name="ProveedorProducto" class="form-control" id="txtProveedor_id">
                                <?php
                                while ($filaProveedor = mysqli_fetch_array($resultadoProveedor)) {
                                ?>
                                    <option value='<?php echo $filaProveedor[0]; ?>'><?php echo $filaProveedor[1]; ?> </option>
                                <?php
                                }
                                ?>
                            </select>
                            <br>
                            <label for="">Selecione Presentacion</label>
                            <select name="PresentacionProducto" class="form-control" id="txtPresentacion_id">

                                <?php
                                while ($fila =  mysqli_fetch_array($resultadoPresentacion)) {
                                ?>
                                    <option value='<?php echo $fila[0]; ?>'><?php echo $fila[1]; ?> </option>
                                <?php
                                }
                                ?>
                            </select>
                            <br>
                            <label for="">Selecione Marca</label>
                            <select name="MarcaProducto" class="form-control" id="txtMarca_id">
                                <?php
                                while ($filaMarca =  mysqli_fetch_array($resultadoMarca)) {
                                ?>
                                    <option value='<?php echo $filaMarca[0]; ?>'><?php echo $filaMarca[1]; ?> </option>
                                <?php
                                }
                                ?>
                            </select>
                            <br>
                            <label for="">Selecione Zona</label>
                            <select name="ZonaProducto" class="form-control" id="txtZona_id"> >
                                <?php
                                while ($filaZona =  mysqli_fetch_array($resultadoZonaEditar)) {
                                ?>
                                    <option value='<?php echo $filaZona[0]; ?>'><?php echo $filaZona[1]; ?> </option>
                                <?php
                                }
                                ?>
                            </select>
                            <br>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-secondary" data-dismiss="modal" name="botonCancelar">Cancelar</button>
                        <button type="submit" class="btn btn-primary" name="guardarCambios">Editar</button>
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>

<!--ELIMINAR-->
<div class="modal fade" id="ModalEliminar" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Eliminar proveedor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="controllers/controllersProducto.php" method="POST" class="needs-validation" novalidate>
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <input type="text" name="txtIdEliminar" id="txtIdEliminar" hidden>
                            <h1>Esta seguro de eliminar el producto?</h1>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-secondary" data-dismiss="modal" name="CancelarEliminacion">Cancelar</button>
                        <button type="submit" class="btn btn-primary" name="confirmarEliminacion">Eliminar</button>
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>


<!--VALIDACION DE LOS CAMPOS-->
<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
        'use strict';
        window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
</script>


<script type="text/javascript">
    function agregarDatos(datos) {
        indice = datos.split(",");

        $('#txtId').val(indice[0]);
        $('#txtIdEliminar').val(indice[0]);
        $('#txtDescripcion').val(indice[1]);
        $('#txtPrecio').val(indice[2]);
        $('#txtStock').val(indice[3]);
        $('#txtIVA').val(indice[4]);
        $('#txtPeso').val(indice[5]);
        $('#txtProveedor_id').val(indice[6]);
        $('#txtPresentacion_id').val(indice[7]);
        $('#txtMarca_id').val(indice[8]);
        $('#txtZona_id').val(indice[9]);

    }
</script>

<?php
include 'includes/footer.php';
?>
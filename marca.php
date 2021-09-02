<?php
include 'includes/header.php';
include 'includes/template.php';

include_once 'config/conexion.php';

?>

<div class="row">
    <div class="col-4">
        <div class="card">
            <div class="card-header bg-success">
                <h3 class="text-light text-center">Registrar Marca</h3>

            </div>
            <div class="card-body">
                <form action="controllers/controllersMarca.php" method="POST" class="needs-validation" novalidate>
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <input type="text" class="form-control" placeholder="Descripcion" name="textDescripcion" id="validationCustom01" required>
                            <div class="valid-feedback">
                                Datos Correctos
                            </div>
                            <div class="invalid-feedback">
                                Por favor Ingresar Descripción para la presentacion
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
        <a href="reportes/reportesMarca.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Descripcion</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Descripcion</th>
                        <th>Acciones</th>
                    </tr>
                </tfoot>
                <tbody>

                    <?php
                    $consultaMarca = 'SELECT id,descripcion  FROM  marca';
                    $resultadoMarca = mysqli_query($conn, $consultaMarca);

                    while ($fila = mysqli_fetch_array($resultadoMarca)) {
                        $datos = $fila[0] . ',' . $fila[1];
                    ?>
                        <tr>
                            <td><?php echo $fila[0] ?></td>
                            <td><?php echo $fila[1] ?></td>
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



<!-- MODIFICAR PRESENTACION -->
<div class="modal fade" id="ModalEditar" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Editar presentacion</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="controllers/controllersMarca.php" method="POST" class="needs-validation" novalidate>
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <input type="text" name="txtId" id="txtId" hidden>
                            <input type="text" class="form-control" placeholder="Descripcion" name="textDescripcion" id="txtDescripcion" required>
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
                <h5 class="modal-title" id="exampleModalCenterTitle">Eliminar presentacion</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="controllers/controllersMarca.php" method="POST" class="needs-validation" novalidate>
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <input type="text" name="txtIdEliminar" id="txtIdEliminar" hidden>
                            <h1>Esta seguro de eliminar la Marca?</h1>
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






<!--VALIDAR LOS DATOS DEL FORMULARIO-->
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
        $('#txtDescripcion').val(indice[1]);
        $('#txtIdEliminar').val(indice[0]);

    }
</script>




<?php
include 'includes/footer.php';
?>
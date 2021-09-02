<?php
include 'includes/header.php';
include 'includes/template.php';

include_once 'config/conexion.php';

?>

<div class="row">
    <div class="col-4">
        <div class="card">
            <div class="card-header bg-success">
                <h3 class="text-light text-center">Registrar Proveedor </h3>

            </div>
            <div class="card-body">
                <form action="controllers/controllersProveedor.php" method="POST" class="needs-validation" novalidate>
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <input type="text" class="form-control" placeholder="Descripcion" name="textDescripcion" id="validationCustom01" required>
                            <div class="valid-feedback">
                                Ok
                            </div>
                            <div class="invalid-feedback">
                                Por favor Ingresar Descripción
                            </div>
                        </div>

                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary " name="btn_guardar">Enviar</button>
                    </div>
                </form>

            </div>

        </div>
    </div>

    <div class="col-7">
        <a href="reportes/reportesProveedor.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
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
                    $consultaProveedor = 'SELECT id,descipcion  FROM  proveedor';
                    $resultadoProveedor = mysqli_query($conn, $consultaProveedor);



                    while ($fila = mysqli_fetch_array($resultadoProveedor)) {
                        $data = $fila[0] . ',' . $fila[1];
                    ?>
                        <tr>
                            <td><?php echo $fila[0] ?></td>
                            <td><?php echo $fila[1] ?></td>
                            <td>
                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#ModalEditar" onclick="agregarDatos('<?php echo $data ?>')">
                                    Editar
                                </button>
                                
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#ModalEliminar" onclick="agregarDatos('<?php echo $data ?>')">
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




<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="ModalEditar" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Editar proveedor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="controllers/controllersProveedor.php" method="POST" class="needs-validation" novalidate>
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <input type="text"   name="txtId" id="txtId" hidden>
                            <input type="text" class="form-control" placeholder="Descripcion" name="textDescripcion" id="txtDescripcion" required>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-secondary" data-dismiss="modal" name="botonCancelar">Cancelar</button>
                        <button type="submit" class="btn btn-primary" name="botonEditar">Editar</button>
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
                <form action="controllers/controllersProveedor.php" method="POST" class="needs-validation" novalidate>
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <input type="text"   name="txtIde" id="txtIde" hidden >
                            <h1>Esta seguro de eliminar el proveedor?</h1>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-secondary" data-dismiss="modal" name = "CancelarEliminacion">Cancelar</button>
                        <button type="submit" class="btn btn-primary" name = "confirmarEliminacion">Eliminar</button>
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>







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
        $('#txtIde').val(indice[0]);
        $('#txtDescripcion').val(indice[1]);
    }
</script>




<?php
include 'includes/footer.php';
?>
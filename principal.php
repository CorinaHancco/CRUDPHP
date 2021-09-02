<?php
include 'includes/header.php';
include 'includes/template.php';

include 'config/conexion.php';

$consultaProveedor = "SELECT * FROM proveedor";
$resultadoProveedor = mysqli_query($conn, $consultaProveedor);
$numProveedor = mysqli_num_rows($resultadoProveedor);

$consultaPresentacion = "SELECT * FROM presentacion";
$resultadoPresentacion = mysqli_query($conn, $consultaPresentacion);
$numeroPresentacion = mysqli_num_rows($resultadoPresentacion);

$consultaMarca = "SELECT * FROM marca";
$resultadoMarca = mysqli_query($conn, $consultaMarca);
$numeroMarca = mysqli_num_rows($resultadoMarca);

$consultaZona = "SELECT * FROM zona";
$resultadoZona = mysqli_query($conn, $consultaZona);
$numeroZona = mysqli_num_rows($resultadoZona);

$consultaProductos = "SELECT * FROM producto";
$resultadoProductos = mysqli_query($conn, $consultaProductos);
$numeroProductos = mysqli_num_rows($resultadoProductos);
?>

<div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            PROVEEDOR</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $numProveedor; ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-truck fa-2x text-dark"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            PRESENTACION</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $numeroPresentacion; ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-file-powerpoint fa-2x text-dark"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">MARCA
                        </div>
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $numeroMarca ?></div>
                            </div>
                            <div class="col">
                                <div class="progress progress-sm mr-2">
                                    <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-building fa-2x text-dark"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            ZONA</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"> <?php echo $numeroZona ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-map-marked-alt fa-2x text-dark"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            PRODUCTOS</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $numeroProductos ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fab fa-product-hunt fa-2x text-dark"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>




<?php
include 'includes/footer.php';

?>
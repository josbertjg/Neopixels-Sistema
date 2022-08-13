<div id="reportes" class="p-3">

    <h1>Reportes:</h1>
    <div class="row">
        <div class="col-6 d-flex flex-column">
            <h2>Reportes de Elección:</h2>

            <a class="btn btn-success rounded-pill fw-bold fs-4 mb-3" target="_blank" href="./admin/reportes/repor_usuarios.php">USUARIOS</a>

            <a class="btn btn-success rounded-pill fw-bold fs-4 mb-3" target="_blank" href="./admin/reportes/repor_servicios.php">SERVICIOS</a>

            <a class="btn btn-success rounded-pill fw-bold fs-4 mb-3" target="_blank" href="./admin/reportes/repor_pagos.php">PAGOS</a>
        </div>
        <div class="col-6 d-flex flex-column">
            <h2>Reportes de Toma de Decisión:</h2>

            <a class="btn btn-success rounded-pill fw-bold fs-4 mb-3" target="_blank" href="./admin/reportes/repor_serviciosComprados.php">SERVICIOS COMPRADOS</a>

            <a class="btn btn-success rounded-pill fw-bold fs-4 mb-3" target="_blank" href="./admin/reportes/repor_serviciosActivos.php">SERVICIOS ACTIVOS</a>

            <a class="btn btn-success rounded-pill fw-bold fs-4 mb-3" target="_blank" href="./admin/reportes/repor_serviciosInactivos.php">SERVICIOS INACTIVOS</a>

            <a class="btn btn-success rounded-pill fw-bold fs-4 mb-3" target="_blank" href="./admin/reportes/repor_clientes.php">CLIENTES</a>
        </div>
    </div>
    <div class="row">
        <span class="fw-bold fs-1">Reportes de Criterio:</span>
        <div class="col-6">
            <form action="./admin/reportes/repor_criterio_servicios.php" method="POST">
                <span class="fomr-label fs-4">Servicios por cliente:</span>
                <input class="form-control" type="email" name="correo" placeholer="Correo del cliente">
            </form>
        </div>
        <div class="col-6">
            <form action="./admin/reportes/repor_criterio_pagos.php" method="POST">
                <span class="fomr-label fs-4">Pagos por cliente:</span>
                <input class="form-control" type="email" name="correo" placeholer="Correo del cliente">
            </form>
        </div>
    </div>

</div>
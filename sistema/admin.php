<?php include "PHP/db.php";?>

<!DOCTYPE html>
<html lang="es">

<?php include "includes/head.php"; ?>

<body>
    <?php include "includes/header.php"; ?>
    <main>
    <nav class="navbar navbar-expand-lg navbar-light bg-light" id="menu">
            <div>
                <button class="navbar-toggler mt-3 ms-3" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                    <div class="offcanvas-header d-flex justify-content-end d-lg-none">
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body p-0">
                        <ul class="navbar-nav mb-lg-0">
                            <li class="nav-item">
                            <a class="nav-link menu-item" id="resumen" aria-current="page" href="#">
                                <img src="./img/resumen.png" alt="">
                                Resumen</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link menu-item" id="pagos" aria-current="page" href="#">
                                <!-- <img src="./img/servicios.png" alt=""> -->
                                Pagos</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link menu-item" id="usuarios" aria-current="page" href="#">
                                <!-- <img src="./img/comprar.png" alt=""> -->
                                Usuarios</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link menu-item" id="servicios" aria-current="page" href="#">
                                <!-- <img src="./img/comprar.png" alt=""> -->
                                Servicios</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link menu-item" id="Reportes" aria-current="page" href="#">
                                <!-- <img src="./img/comprar.png" alt=""> -->
                                Reportes</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link menu-item" id="mantenimiento" aria-current="page" href="#">
                                <!-- <img src="./img/comprar.png" alt=""> -->
                                Mantenimiento</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
        <section id="contenido">
                <!-- SCRIPT PARA CAMBIAR EL CONTENIDO DE MANERA DINAMICA -->
                <script>
                    $(document).ready(function(){
                        $("#contenido").load("./cliente/resumen.php");

                        $('#resumen').click(function(){
                            $("#contenido").load("./cliente/resumen.php");
                        });

                        //EL LLAMADO A PAGOS ESTA SIENDO EJECUTADO EN EL index.js

                        $('#pagos').click(function(){
                            $("#contenido").load("./admin/pagos.php",function(){
                                callBackPagos();
                            });
                        });

                        $('#usuarios').click(function(){
                            $("#contenido").load("./admin/usuarios.php",function(){
                                callBackUsuarios();
                            });
                        });

                        $('#servicios').click(function(){
                            $("#contenido").load("./admin/servicios_admin.php",function(){
                                callBackServicios();
                            });
                        });

                        $('#Reportes').click(function(){
                            $("#contenido").load("./admin/reportes.php");
                        });

                        $('#mantenimiento').click(function(){
                            $("#contenido").load("./mantenimiento/index.php");
                        });
                    });
		        </script>
        </section>
    </main>
    <?php include "includes/footer.php"; ?>
</body>
</html>
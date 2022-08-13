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
                            <a class="navbar-brand" href="#">
                                <img src="./img/user.png" alt="">
                                NeoPixels
                            </a>
                            <li class="nav-item">
                            <a class="nav-link menu-item" id="resumen" aria-current="page" href="#">
                                <img src="./img/resumen.png" alt="">
                                Resumen</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link menu-item" id="servicios" aria-current="page" href="#">
                                <img src="./img/servicios.png" alt="">
                                Mis Servicios</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link menu-item" id="comprar" aria-current="page" href="#">
                                <img src="./img/comprar.png" alt="">
                                Comprar Servicios</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
        <section id="contenido"></section>
    </main>
    <!-- SCRIPT PARA CAMBIAR EL CONTENIDO DE MANERA DINAMICA -->
    <script>
        $(document).ready(function(){
            $("#contenido").load("./cliente/resumen.php");

            $('#resumen').click(function(){
                $("#contenido").load("./cliente/resumen.php");
            });


            $('#servicios').click(function(){
                $("#contenido").load("./cliente/servicios_cliente.php");
            });

            $('#comprar').click(function(){
                if(<?php echo $_SESSION['acceder']; ?>)
                    $("#contenido").load("./cliente/comprar.php");
                else{
                    Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: '¡Debes culminar tu registro para acceder a esta seccion!',
                    });
                }
            });
        });
        //MOSTRANDO MENSAJES DEPENDIENDO DE LA VARIABLE DE SESION
        let aux='<?php echo $_SESSION['show'] ?>';
        switch(aux){
            case 'culminar_registro':
                Swal.fire({
                    icon: 'success',
                    title: '¡EXCELENTE!',
                    text: 'Has culminado tu registro con exito, ¡Ya tienes acceso a la seccion de compra de servicios!',
                });
                break;
            case 'bienvenida':
                Swal.fire({
                    icon: 'info',
                    title: '¡BIENVENIDO A LA FAMILIA!',
                    text: '¡Muchas gracias por iniciar sesion en nuestro sitio web!, recuerda culminar tu registro en la seccion de resumen para tener acceso a la compra de servicios',
                });
                break;
        }
        <?php $_SESSION['show']="none" ?>
    </script>
    <?php include "includes/footer.php"; ?>
</body>
</html>
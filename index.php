<?php
include "sistema/PHP/db.php";
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="¡Diseñamos tus sueños!, encuentra la mejor calidad de paginas web, posicionamiento SEO, branding, logos, todo lo que desees en marketing digital ¡Lo tenemos para ti!"/>
    <meta name="keywords" content="marketing, marketing digital, publicidad, publicidad digital, seo, paginas web, branding, diseño, logos, logo"/>
    <meta name="author" content="Josbert Guedez" />
    <meta name="copyright" content="Josbert Guedez" />
    <meta name="robots" content="index"/>
    <link rel="stylesheet" href="./css/styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    <link rel="icon" href="./img/Logo-azul-neopixels.ico">
    <link href="https://fonts.googleapis.com/css2?family=Dongle:wght@300&family=Lobster&family=Open+Sans:wght@300&family=Roboto:wght@100;400&display=swap" rel="stylesheet">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="./sistema/JS/index.js"></script>
    <title>NeoPixels</title>
</head>
<body>
    <header>
        <section>
            <article>
                <img src="./img/Logo-transparente-neopixels.png" alt="logo" id="logo">
            </article>
                                                    <!-- NAVBAR COLLAPSE -->
                <nav class="navbar navbar-expand-md navbar-dark">
                    <div class="container-fluid d-flex justify-content-center">
                        <a class="navbar-brand fw-bold d-md-none d-sm-block" href="#">NeoPixels</a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse flex-end" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                            <a id="btn-inicio" class="" aria-current="page" href="#">INICIO</a>
                            </li>
                            <hr>
                            <li class="nav-item">
                            <a class="" href="#container-servicios">SERVICIOS</a>
                            </li>
                            <hr>
                            <li class="nav-item">
                            <a class="" href="#aboutus">SOBRE NOSOTROS</a>
                            </li>
                            <hr>
                            <li class="nav-item">
                            <a class="" href="#diseños">DISEÑOS</a>
                            </li>
                            <hr>
                            <div id="container-cotizacion">
                                <li class="">
                                    <a id="btn-cotizacion" href="#grid-contactanos">SOLICITAR COTIZACIÓN</a>
                                </li>
                            </div>
                        </ul>
                        </div>
                    </div>
                    </nav>
                                                    <!-- FIN NAVBAR COLLAPSE -->
        </section>
        <label for="">NEOPIXELS</label>
        <p>Expertos en Publicidad y Marketing Digital, capaces de ofrecer todos los servicios digitales con la mayor calidad y rapidez.</p>
        <section>

                        <!-- ACTIVADOR DEL MODAL -->
            <button type="button" id="div-btn1" data-bs-toggle="modal" class="btn-fantasma" data-bs-target="#exampleModal">
                <a href="#">INICIAR SESIÓN</a>
            </button>
                        <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#iniciar" type="button" role="tab" aria-controls="home" aria-selected="true">Iniciar Sesión</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#registrar" type="button" role="tab" aria-controls="profile" aria-selected="false">Registrarse</button>
                                </li>
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="tab-content" id="myTabContent">
                                <!-- INICIAR SESION -->
                                <div class="tab-pane fade show active" id="iniciar" role="tabpanel" aria-labelledby="home-tab">
                                    <form action="sistema/PHP/log_usu.php" method="POST" name="form-iniciar">
                                        <label for="" class="form-label">Correo</label>
                                        <input type="email" name="correo1" class="form-control" placeholder="Ingresa tu Email:" required>

                                        <label for="" class="form-label">Contraseña:</label>
                                        <input type="password" name="clave1" class="form-control" placeholder="Ingresa tu Contraseña:" required>
                                        <!-- BOTON ENVIAR -->
                                        <section class="d-flex justify-content-center">
                                            <input type="submit" class="btn btn-lg btn-primary" name="log_usu" value="Iniciar Sesión">
                                        </section>
                                    </form>
                                </div>
                                <!-- REGISTRARSE -->
                                <div class="tab-pane fade" id="registrar" role="tabpanel" aria-labelledby="profile-tab">
                                    <form action="sistema/PHP/reg_usu.php" method="POST" name="form_registrar">
                                        <label for="nombre" class="form-label">Nombre:</label>
                                        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingresa tu nombre" required>
    
                                        <label for="correo" class="form-label">Correo:</label>
                                        <input type="email" class="form-control" id="correo2" name="correo2" placeholder="Ingresa tu Email:" required>

                                        <label for="clave" class="form-label">Clave:</label>
                                        <input type="password" class="form-control" id="clave2" name="clave2" placeholder="Ingresa tu clave" required>
                                        <!-- BOTON ENVIAR -->
                                        <section class="d-flex justify-content-center">
                                            <input class="btn btn-lg btn-primary" type="submit" name="reg_usu" value="Registrarse">
                                        </section>
                                        <!-- MANEJANDO EL EVENTO PARA MOSTRAR EL MODAL DE MENSAJES -->
                                        <script>
                                            window.onload=function(){
                                                <?php 
                                                    if(isset($_SESSION['mensaje']) || isset($_SESSION['titulo'])){
                                                        $mostrar=true;
                                                    }else $mostrar=false;
                                                ?>
                                                if('<?php echo $mostrar ?>'){
                                                    document.getElementById("btn-mensajes").click();
                                                }
                                            }
                                        </script>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- -------------------------------------------------------------------------- -->

            <div id="div-btn2">
                <a href="#grid-contactanos">CONTACTAR</a>
            </div>
        </section>

        <!-- MODAL QUE MUESTRA LOS MENSAJES -->
        <!-- ACTIVADOR DEL MODAL -->
        <button type="button" id="btn-mensajes" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#mensajes">
        BOTON OCULTO PARA MOSTRAR MENSAJES
        </button>

        <!-- Modal -->
        <div class="modal fade" id="mensajes" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><?php if(isset($_SESSION['titulo'])) echo $_SESSION['titulo']; ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <?php 
                        if(isset($_SESSION['mensaje'])) 
                           echo $_SESSION['mensaje']; 
                           session_unset();
                    ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                </div>
                </div>
            </div>
        </div>                                    
        <!-- FIN MODAL QUE MUESTRA LOS MENSAJES -->
    </header>
    <main id="container-servicios">
        <label for="" id="servicios">SERVICIOS</label>
        <section>
            <article class="card">
                <img src="./img/diseño-web.png" alt="diseño-web">
                <div>
                    <label class="card-label" for="">Diseño Web</label>
                    <p class="card-p">Disfruta de los mejores diseños y mas atractivas maquetas para tu pagina o sitio Web.</p>
                </div>
            </article>
            <article class="card">
                <img src="./img/social-media.png" alt="social-media">
                <div>
                    <label class="card-label" for="">Social Media</label>
                    <p class="card-p">¡Deja tus redes sociales en manos de profesionales! Solo danos tu idea y nosotros nos encargaremos del resto.</p>
                </div>
            </article>
            <article class="card">
                <img src="./img/seo.png" alt="seo">
                <div>
                    <label class="card-label" for="">SEO</label>
                    <p class="card-p">Nos encargamos del mejor posicionamiento SEO de tu pagina web para un mayor alcance.</p>
                </div>
            </article>
        </section>
    </main>
    <section class="gana">
        <label id="labgana" for=""><i>¡VENDE MÁS! ¡GANA MÁS!</i></label>
        <div class="btn-fantasma"><a href="#grid-contactanos">CONTACTAR</a></div>
    </section>
    <section>
        <label for="">NUESTROS CLIENTES</label>
        <section>
            <article>
                <a href="https://www.instagram.com/cserviciototal/" target="_blank">
                    <img src="./img/comercializadora.png" alt="comercializadora" id="comercializadora">
                </a>
            </article>
            <article>
                <a href="https://www.instagram.com/servifarmacos/" target="_blank">
                    <img src="./img/servi.png" alt="servi" id="servi">
                </a>
            </article>
            <article>
                <a href="https://www.instagram.com/farmalasaludbqto/" target="_blank">
                    <img src="./img/lasalud.png" alt="lasalud" id="lasalud">
                </a>
            </article>
            <article>
                <a href="https://www.instagram.com/insumedve/" target="_blank">
                    <img src="./img/insumed.png" alt="insumed" id="insumed">
                </a>
            </article>
            <article>
                <a href="https://www.instagram.com/repuestosrr78/" target="_blank">
                    <img src="./img/r&r78.png" alt="" id="r78">
                </a>
            </article>
        </section>
    </section>
                        <!-- NUESTROS DISEÑOS -->
    <section id="diseños">
        <label for="" id="label-diseños">Nuestros Diseños</label>
        <div id="container-diseños">
            <div>
                <img id="img-diseños" src="./img/diseños.png" alt="neo-diseños">
            </div>
                                <!-- CARRUSEL -->
            <div>
                  <div id="carouselExampleCaptions" class="carousel carousel-dark slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3" aria-label="Slide 4"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="4" aria-label="Slide 5"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="5" aria-label="Slide 6"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="6" aria-label="Slide 7"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="./img/DISEÑOS1.png" class="d-block w-100 carousel-img" alt="diseño1">
                          </div>
                          <div class="carousel-item">
                            <img src="./img/DISEÑOS2.png" class="d-block w-100 carousel-img" alt="diseño2">
                          </div>
                          <div class="carousel-item">
                            <img src="./img/DISEÑOS3.png" class="d-block w-100 carousel-img" alt="diseño3">
                          </div>
                          <div class="carousel-item">
                            <img src="./img/DISEÑOS4.png" class="d-block w-100 carousel-img" alt="diseño4">
                          </div>
                          <div class="carousel-item">
                            <img src="./img/DISEÑOS7.png" class="d-block w-100 carousel-img" alt="diseño5">
                          </div>
                          <div class="carousel-item">
                            <img src="./img/DISEÑOS6.png" class="d-block w-100 carousel-img" alt="diseño6">
                          </div>
                          <div class="carousel-item">
                            <img src="./img/DISEÑOS5.png" class="d-block w-100 carousel-img" alt="diseño7">
                          </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                      <span class="carousel-control-prev-icon p-4" aria-hidden="true"></span>
                      <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                      <span class="carousel-control-next-icon p-4" aria-hidden="true"></span>
                      <span class="visually-hidden">Next</span>
                    </button>
                  </div>
                                <!-- FIN CARUSEL -->
            </div>
        </div>
    </section>
                            <!-- SOBRE NOSOTROS -->
    <section id="aboutus">
        <div id="container-circle">
            <span id="circle"></span>
            <img id="img-about" src="./img/about.png" alt="">
        </div>
        <div id="container-about">
            <label for="" id="label1-about">NeoPixels</label>
            <label for="" id="label2-about">About Us</label>
            <p id="p-about">Somos dos jovenes venezolanos estudiantes de Informática, deseosos de emprender, trabajar y de brindar una increible calidad y una fascinante experiencia a todos nuestros clientes a través de conocimientos referentes a diseño, maquetación de Páginas Web y programación.</p>
            <div id="container-img-about" class="container-fluid">
                <a href="https://www.facebook.com/NeoPixelsVE/" target="_blank">
                    <img src="./img/facebook.png" alt="facebook">
                </a>
                <a href="https://www.instagram.com/neopixelsve/" target="_blank">
                    <img src="./img/instagram.png" alt="instagram">
                </a>
                <a href="https://api.whatsapp.com/send?phone=584125283663&app=facebook&entry_point=page_cta&fbclid=IwAR1OMvH7yfV8CavjZVCnd_nhRRUSifUMAZK9DeG3IyzRtHiS6jxbSVbvoHs" target="_blank">
                    <img src="./img/whatsapp.png" alt="whatsapp">
                                <!-- DROPDOWN -->
                            <!-- Default dropend button -->
            <!-- <div class="dropend">
                <button type="button" class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                </button>
                <ul class="dropdown-menu">
                    +58 414-5598216 | +58 412-5283663|
                </ul>
            </div> -->
                </a>
            </div>
            <div id="container-btn-about"><a href="#grid-contactanos" id="btn-about">Contáctanos</a></div>
            
        </div>
    </section>
    <section id="contacto">
        <div class="row container-fluid">
            <section class="col-lg-3 col" id="grid-hablemos">
                <span>¡HABLEMOS!</span>
                <P><b><i>¡Trabaja con nosotros! ¡que esperas!, somos profesionales que pueden brindarte la mejor calidad y experiencia.</i></b></P>
                <p>Nos especializamos en el diseño para marketing digital, diseño y maquetación de paginas web, branding, y todo lo que necesites para tu negocio!, contáctanos llenando este formulario o llamándonos a nuestros números de contacto, ¡estaremos complacidos de atenderte!</p>
                <a href="https://www.facebook.com/NeoPixelsVE/" target="_blank">
                    <img src="./img/facebook-contacto.png" alt="facebook">
                </a>
                <a href="https://www.instagram.com/neopixelsve/" target="_blank">
                    <img src="./img/instagram-contacto.png" alt="instagram">
                </a>
                <a href="https://api.whatsapp.com/send?phone=584125283663&app=facebook&entry_point=page_cta&fbclid=IwAR1OMvH7yfV8CavjZVCnd_nhRRUSifUMAZK9DeG3IyzRtHiS6jxbSVbvoHs" target="_blank">
                    <img src="./img/whatsapp-contacto.png" alt="whatsapp">
                </a>
            </section>
            <section class="col-lg-2 col" id="grid-llamanos">
                <span>LLÁMANOS</span>
                <p>+58 414-5598216</p>
                <p>+58 412-5283663</p>
                <span>UBICACIÓN</span>
                <p>Barquisimeto, Edo Lara, Venezuela</p>
                <span>SERVICIOS TOP</span>
                <ul>
                    <li>- Social Media</li>
                    <li>- Diseño Web</li>
                </ul>
            </section>
            <section class="col-lg-4 col" id="grid-contactanos">
                <span>CONTÁCTANOS Sin Registro</span>
                <form action="https://formsubmit.co/neopixelsve@gmail.com" method="POST" class="form" name="form-contactanos">
                    <div>
                        <input type="checkbox" name="Marketing Digital (Redes Sociales)" class="form-check-input"> Marketing Digital (Redes Sociales)
                    </div>
                    <div>
                        <input type="checkbox" name="Desarrollo de Página Web" class="form-check-input"> Desarrollo de Página Web
                    </div>
                    <div>
                        <input type="checkbox" name="Branding (Diseño y Animaciones)" class="form-check-input"> Branding (Diseño y Animaciones)
                    </div>
                    <select name="presupuesto" class="form-select">
                        <option value="No Selecciono el Presupuesto" selected hidden>- Rango del presupuesto -</option>
                        <option value="20$-50$">20$(Us) a 50$(Us)</option>
                        <option value="50$-100$">50$(Us) a 100$(Us)</option>
                        <option value="100$-200$">100$(Us) a 200$(Us)</option>
                    </select>
                    <textarea name="descripcion" class="form-control" id="" cols="30" rows="3" placeholder="Escriba las Especificaciones de su Proyecto:" required></textarea>
                    <input type="text" class="form-control" name="nombre-contacto" placeholder="Ingrese su Nombre y Apellido:" required>
                    <input type="email" class="form-control" name="correo" placeholder="E-mail:" required>

                    <div>
                        <select name="prenum" id="prenum" class="">
                            <option value="+58">+58</option>
                            <option value="+1">+1</option>
                            <option value="+52">+52</option>
                            <option value="+501">+501</option>
                            <option value="+502">+502</option>
                            <option value="+503">+503</option>
                            <option value="+504">+504</option>
                            <option value="+505">+505</option>
                            <option value="+506">+506</option>
                            <option value="+507">+507</option>
                            <option value="+51">+51</option>
                            <option value="+54">+54</option>
                            <option value="+55">+55</option>
                            <option value="+56">+56</option>
                            <option value="+57">+57</option>
                            <option value="+591">+591</option>
                            <option value="+592">+592</option>
                            <option value="+593">+593</option>
                            <option value="+594">+594</option>
                            <option value="+595">+595</option>
                            <option value="+597">+597</option>
                            <option value="+598">+598</option>
                        </select>
                        <input type="text" class="form-control" name="whatsapp" placeholder="WhatsApp (Solo Números):" pattern="[0-9]+" required>
                    </div>
                    <input type="submit" class="btn btn-lg btn-primary" value="¡Hablemos!">
                </form>
                <!-- <a href="mailto:neopixelsve@gmail.com"></a> -->
            </section>
        </div>
    </section>
    <footer>
        <div>
                <img src="./img/Logo-transparente-neopixels.png" alt="logo">
        </div>
        <p>Todos los derechos reservados para <strong>©Josbert Guedez</strong></p>
    </footer>
    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
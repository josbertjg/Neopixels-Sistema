<?php include "../PHP/db.php";?>
<?php include "../includes/head.php"; ?>
<div id="contenido_comprar">
    <!-- CARD 1 -->
    <div class="card">
        <div class="card-header">
            <img src="./img/diseño-web.png" class="card-img-top" alt="...">
        </div>
        <div class="card-body">
            <h5 class="card-title">Desarrollo de Página Web</h5>
            <p class="card-text">¡Disfruta de los mejores y mas atractivos diseños para tu pagina o sitio web!</p>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">CREACIÓN Y MAQUETACIÓN DE PÁGINA WEB</li>
            <li class="list-group-item">RESPONSIVE</li>
            <li class="list-group-item">5 IMÁGENES PERSONALIZABLES</li>
            <li class="list-group-item">¡HOSTING GRATIS DE POR VIDA!</li>
        </ul>
        <div class="card-footer">
            <a href="#" id="pagina" type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="btn btn-success btn-modal">COMPRAR</a>                                           
        </div>
    </div>
    <!-- CARD 2 -->
    <div class="card">
        <div class="card-header">
            <img src="./img/social-media.png" class="card-img-top" alt="...">
        </div>
        <div class="card-body">
            <h5 class="card-title">Marketing Digital (Redes Sociales)</h5>
            <p class="card-text">¡Deja tus redes sociales en manos de profesionales! Solo danos tu idea y nosotros nos encargaremos del resto.</p>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">POST DIARIOS</li>
            <li class="list-group-item">HISTORIAS DIARIAS</li>
            <li class="list-group-item">FULL VIDEOS</li>
            <li class="list-group-item">HISTORIAS DESTACADAS</li>
            <li class="list-group-item">SESIONES DE FOTOS</li>
        </ul>
        <div class="card-footer">
            <a href="#" id="redes" type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="btn btn-success btn-modal">COMPRAR</a>
        </div>
    </div>
    <!-- CARD 3 -->
    <div class="card">
        <div class="card-header">
            <img src="./img/seo.png" class="card-img-top" alt="...">
        </div>
        <div class="card-body">
            <h5 class="card-title">Branding (Diseño y Animaciones)</h5>
            <p class="card-text">¿Quieres que diseñemos tu logo?, que diseñemos tu marca? o quieres algun flayer publicitario? entonces, ¡este es el paquete ideal para ti!</p>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">CREACION DE LOGOS</li>
            <li class="list-group-item">BRANDING</li>
            <li class="list-group-item">FLAYERS E IMAGENES PUBLICITARIAS</li>
        </ul>
        <div class="card-footer">
            <a href="#" id="branding" type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="btn btn-success btn-modal">COMPRAR</a>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered  modal-lg">
    <div class="modal-content">
        <h5 class="modal-title" id="staticBackdropLabel">Pasarela de Pago</h5>
        <div class="modal-header">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="pago-tab" data-bs-toggle="tab" data-bs-target="#pago" type="button" role="tab" aria-controls="pago" aria-selected="true">Método de Pago</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="Pagar-tab" data-bs-toggle="tab" data-bs-target="#Pagar" type="button" role="tab" aria-controls="Pagar" aria-selected="false">Pagar</button>
                </li>
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="pago" role="tabpanel" aria-labelledby="pago-tab">
                    <div class="containter-fluid row">
                        <div id="transferencia" class="col-6 met-pago">
                            <img src="./img/banco.png" alt="">
                            <span>Transferencia Bancaria</span>
                        </div>
                        <div id="pagomovil" class="col-6 met-pago">
                            <img src="./img/pagomovil.png" alt="">
                            <span>Pago Móvil</span>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="Pagar" role="tabpanel" aria-labelledby="Pagar-tab">


                <!-- TRANSFERENCIA BANCARIA -->
                    <section id="neopixels_banco">
                        <div class="container">
                            <h1>Cuenta a donde realizar la transferencia:</h1>
                            <label for="" class="form-label">Banco:</label>
                            <input type="text" disabled class="form-control" value="BANESCO CUENTA CORRIENTE">
                            <label for="" class="form-label">Nro. de Cuenta:</label>
                            <input type="text" disabled class="form-control" value="0134-0447-0544-7105-5751">
                            <label for="" class="form-label">Titular:</label>
                            <input type="text" disabled class="form-control" value="Josbert Guédez">
                            <label for="" class="form-label">Cédula:</label>
                            <input type="text" disabled class="form-control" value="28.150.010">
                            <label for="" class="form-label">Monto a Transferir (Equivalente en Dólares)</label>
                            <input class="monto form-control" type="text" disabled>
                        </div>
                    </section>

                    <!-- PAGO MOVIL -->
                    <section id="neopixels_pagomovil">
                        <div class="container">
                            <h1>Cuenta a donde realizar el pago móvil:</h1>
                            <label for="" class="form-label">Banco:</label>
                            <input type="text" disabled class="form-control" value="BANESCO CUENTA CORRIENTE">
                            <label for="" class="form-label">Titular:</label>
                            <input type="text" disabled class="form-control" value="Josbert Guédez">
                            <label for="" class="form-label">Cédula:</label>
                            <input type="text" disabled class="form-control" value="28.150.010">
                            <label for="" class="form-label">Nro. de Teléfono:</label>
                            <input type="text" disabled class="form-control" value="0414-5598216">
                            <label for="" class="form-label">Monto a Transferir (Equivalente en Dólares)</label>
                            <input class="monto form-control" type="text" disabled>
                        </div>
                    </section>

                    <form action="PHP/reg_compras.php" name="form_comprar" method="POST" enctype="multipart/form-data">
                        <h1>Rellenar estos datos:</h1>
                        <label for="" class="form-label">Nombre del Titular:</label>
                        <input id="comprar_nombre" type="text" class="form-control" name="comprar_nombre" placeholder="Nombre:">

                        <label for="" class="form-label">Cédula del Titular:</label>
                        <input id="comprar_cedula" type="text" class="form-control" name="comprar_cedula" placeholder="Cedula:">

                        <label for="" class="form-label">Número de Referencia de la transferencia:</label>
                        <input id="comprar_referencia" type="text" class="form-control" name="comprar_referencia" placeholder="Nro de Referencia:">

                        <label for="" class="form-label">Tipo de Banco</label>
                        <select name="comprar_banco" class="form-select" id="comprar_banco">
                            <option value="0" selected hidden>Seleccione el Tipo de Banco</option>
                            <option value="Banesco">Banesco</option>
                            <option value="Venezuela">Venezuela</option>
                            <option value="Provincial">Provincial</option>
                            <option value="Mercantil">Mercantil</option>
                            <option value="Otro">Otro.</option>
                        </select>

                        <label for="" class="form-label">Capture de la transferencia:</label>
                        <div class="input-group mb-3">
                            <input id="img_pago" type="file" class="form-control" name="img_pago" value="Subir Capture">
                            <label class="input-group-text" for="img-negocio">OBLIGATORIO</label>
                        </div>
                        
                        <div class="mb-3">
                            <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                                OPCIONAL
                            </a>
                        </div>

                        <div class="collapse" id="collapseExample">
                            <label class="form-label">¡DÉJANOS CONOCER MÁS ACERCA DE TU NEGOCIO!</label>
                            <textarea name="descripcion_negocio" id="descripcion-negocio" class="form-control text-start" cols="30" rows="2" placeholder="¿A que se dedica tu negocio? ¿que es lo que vendes?"></textarea>
    
                            <label class="form-label">¿Tienes alguna referencia visual?,paleta de colores, logo, etc. (OPCIONAL)</label>
                            <div class="input-group mb-3">
                                <input name="img_negocio" type="file" class="form-control" id="img-negocio">
                                <label class="input-group-text" for="img-negocio">OPCIONAL</label>
                            </div>
                        </div>


                        <input type="text" name="comprar_correo" hidden value="<?php 
                                        if(isset($_SESSION['correo'])) 
                                            echo strtolower($_SESSION['correo']); 
                                    ?>">
                        <input type="text" name="comprar_servicio" hidden value="">
                        
                        <input type="button" class="btn btn-success" id="comprar-serv" value="Comprar">
                    </form>

                </div>
            </div>
        </div>
        <div class="modal-footer">
        </div>
    </div>
  </div>
</div>
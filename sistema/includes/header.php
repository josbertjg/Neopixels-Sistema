<header>
    <section>
        <article>
            <img src="../img/Logo-transparente-neopixels.png" alt="logo" id="logo">
        </article>
        <article id="header-usuario">
            <img src="./img/header-user.png" alt="">
            <div>
                <p><b><?php 
                        if(isset($_SESSION['nombre'])){
                            $nombreArray = explode(" ",$_SESSION['nombre']);
                        } 
                           echo strtoupper($nombreArray[0]); 
                    ?></b></p>
                <p><?php 
                        if(isset($_SESSION['tipo'])) 
                           if($_SESSION['tipo']==0) 
                                echo "Usuario";
                            else echo "Admin";
                    ?></p>
            </div>
            <div id="circle"></div>
        </article>
    </section>
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
                        //    session_unset();
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
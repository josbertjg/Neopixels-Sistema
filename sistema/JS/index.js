//FALTA CORREGIR QUE EL BOTON DEL FORMULARIO DE DATOS FALTANTES DESAPAREZCA CUANDO YA SE HAYAN INGRESADO DATOS Y VUELVA A APARECER CUANDO LOS DATOS FALTEN POR PEDIRSE

/* ******************** RESUMEN *********************** */

//FUNCION PARA DAR ESTILO A LOS INPUTS
function darEstilos(input){
    input.style.cssText = "border: rgb(255, 145, 145) 5px solid !important;transition:all 0.5s;background-color: rgb(255, 208, 208);";
}
//FUNCION PARA QUITARLE EL ESTILO A LOS INPUTS
function quitarEstilos(input){
    input.style.cssText = "border: rgb(206, 212, 218) 1px solid !important;transition:all 0.5s;background-color: white;";
}
//FUNCION PARA CAMBIAR DE PAGINA
function darClick(id){
    document.getElementById(id).click();
}

//VALIDANDO EL SPAN QUE DICE NOMBRE COMPLETO
if($("#telefono").val()==''){
    $("#label-nombre").text("Nombre de Usuario:");
}else{
    $("#label-nombre").text("Nombre Completo:");
}

//OCULTANDO EL COLLAPSE SEGUN EL CASO Y DESABILITANDO LOS BOTONES DE EDICION
if($("#direccion").val()==0){
    document.getElementsByClassName("btn-editar").disabled=true;
    $("#btnCollapse").show();
}else{
    document.getElementsByClassName("btn-editar").disabled=false;
    $("#btnCollapse").hide();
}

$("#mensajeCliente").hide();

//REALIZANDO LAS PETICIONES DE AJAX CON LOS BOTONES DE EDITAR
$(".btn-editar").click((event)=>{
    let data = new FormData(event.target.parentNode);
    fetch("./PHP/AJAX.php",{
        method:'POST',
        body: data
    })
    .then((response)=>{
        if(response.ok){
            return response.text();
        }else{
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: '¡No se pudo enviar la solicitud, revisa tu conexión e intentalo más tarde!',
            });
        }
    })
    .then((response)=>{
        if(response){
            Swal.fire({
                icon: 'success',
                title: 'Excelente',
                text: '¡Tu solicitud se ha realizado exitosamente!',
            });
        }else{
            Swal.fire({
                icon: 'error',
                title: 'Ups...',
                text: '¡Tu solicitud no ha podido ser realizada, intentalo mas tarde!',
            });
        }
    })
    .catch((error)=>{
        Swal.fire({
            icon: 'error',
            title: 'Ups...',
            text: '¡Tu solicitud no ha podido ser realizada, intentalo mas tarde!',
        });
        console.log(error)
    })
});

//EVENTOS
//OCULTANDO LA ETIQUETA P QUE VA A CONTENER LOS MENSAJES DE ERROR
$("#error").hide();
//ENVIANDO AL USUARIO AL INDEX.PHP CUANDO QUIERA CERRAR SESION
$("#cerrar").click(function (){
    window.location = "../index.php"
});
//LAS FUNCIONES USADAS A CONTINUACION SE ENCUENTRAN EN EL ARCHIVO validaciones.js
//RESTRINGIENDO NUMEROS EN EL INPUT DE NOMBRE
$("[name='nombre']").keydown((event)=>{
    console.log(event)
    if(validarLength(form_collapse.nombre.value,255) && event.keyCode != 13 && event.keyCode != 8 && event.keyCode != 9 && event.keyCode != 32)
        return false;
    else
        return soloLetras(event);
});
//RESTRINGIENDO LETRAS EN EL INPUT DE CEDULA
$("[name='cedula']").keydown((event)=>{
    if(validarLength(form_collapse.cedula.value,15) && event.keyCode != 13 && event.keyCode != 8 && event.keyCode != 9)
        return false;
    else
        return soloNumeros(event);
});
//VALIDANDO QUE LA CEDULA TENGA MINIMO 6 DIGITOS
$("[name='cedula']").blur(function(){
    if(validarLength(form_collapse.cedula.value,1)){
        if(!validarLength(form_collapse.cedula.value,6)){
            darEstilos(form_collapse.cedula);
            error.innerText="Error: la Cécula no puede tener menos de 6 dígitos";
            error.style.display="block"
        }else{
            quitarEstilos(form_collapse.cedula)
            error.style.display="none";
        }
    }
});

//RESTRINGIENDO CANTIDAD DE 255 CARACTERES EN EL INPUT DE DIRECCION
$("[name='direccion']").keydown(function(event){
    if(validarLength(form_collapse.direccion.value,255) && event.keyCode != 13 && event.keyCode != 8 && event.keyCode != 9)
        return false;
});

//RESTRINGIENDO CANTIDAD DE 40 CARACTEES EN EL INPUT DE TELEFONO
$("[name='telefono']").keydown(function(event){
    if(validarLength(form_collapse.telefono.value,40) && event.keyCode != 13 && event.keyCode != 8 && event.keyCode != 9)
        return false;
});

//VERIFICANDO QUE EL FORMATO DEL NUMERO DE TELEFONO SE HAYA ESCRITO CORRECTAMENTE AL SALIR DEL INPUT
$("[name='telefono']").blur(function(){
    if(validarLength(form_collapse.telefono.value,1)){
        if(!validarTelefono(form_collapse.telefono.value)){
            error.innerText="Error: Ingrese un número de teléfono con un formato Correcto:\n"+"(123) 456-7890\n"+
            "+(123) 456-7890\n"+
            "+(123)-456-7890\n"+
            "+(123) - 456-7890\n"+
            "+(123) - 456-78-90\n"+
            "123-456-7890\n"+
            "123.456.7890\n"+
            "1234567890\n"+
            "+31636363634\n"+
            "075-63546725"
            error.style.display="block";
            darEstilos(form_collapse.telefono);
        }else
            if(!validarLength(form_collapse.telefono.value,8)){
                error.innerText="Error: El número telefónico no puede menos de 8 dígitos.";
                error.style.display="block";
                darEstilos(form_collapse.telefono);
            }else{
                error.style.display="none";
                quitarEstilos(form_collapse.telefono);
            }
    }
});
//VALIDANDO QUE TODO ESTE BIEN EN ELFORMULARIO ANTES DE ENVIAR LA INFORMACION
$("[name='culminar']").click(function(){
    // event.preventDefault();
    let valido = true;
    if(!validarLength(form_collapse.nombre.value,1)){
        darEstilos(form_collapse.nombre)
        valido=false
    }else quitarEstilos(form_collapse.nombre)

    if(!validarLength(form_collapse.cedula.value,1)){
        darEstilos(form_collapse.cedula)
        valido=false
    }else quitarEstilos(form_collapse.cedula)

    if(!validarLength(form_collapse.direccion.value,1)){
        darEstilos(form_collapse.direccion)
        valido=false
    }else quitarEstilos(form_collapse.direccion)

    
    if(!validarLength(form_collapse.telefono.value,1)){
        darEstilos(form_collapse.telefono)
        valido=false
    }else
        if(!validarTelefono(form_collapse.telefono.value)){
            error.innerText="Error: Ingrese un número de teléfono con un formato Correcto:\n"+"(123) 456-7890\n"+
            "+(123) 456-7890\n"+
            "+(123)-456-7890\n"+
            "+(123) - 456-7890\n"+
            "+(123) - 456-78-90\n"+
            "123-456-7890\n"+
            "123.456.7890\n"+
            "1234567890\n"+
            "+31636363634\n"+
            "075-63546725";
            error.style.display="block";
            darEstilos(form_collapse.telefono);
        }else{
            quitarEstilos(form_collapse.telefono);
            error.style.display="none";
            valido=true;
        }
    if(!valido){
        error.innerText="Error: Ninguno de los Campos Deben estar Vacíos";
        error.style.display="block";
    }else
        if(valido && validarTelefono(form_collapse.telefono.value)){
            form_collapse.submit();
        }
});
//QUITANDO LOS ESTILOS DE ERROR A LOS INPUTS CUANDO SE CUMPLEN LOS REQUERIMIENTOS
$("[name='nombre']").keyup(function(){
    if(validarLength(form_collapse.nombre.value,1))
        quitarEstilos(form_collapse.nombre)
});
$("[name='cedula']").keyup(function(){
    if(validarLength(form_collapse.cedula.value,1))
        quitarEstilos(form_collapse.cedula)
});
$("[name='direccion']").keyup(function(){
    if(validarLength(form_collapse.direccion.value,1))
        quitarEstilos(form_collapse.direccion)
});
let tablas= document.getElementsByClassName("table");
for(let i=0; i<tablas.length;i++){
    if(tablas[i].rows.length<=1)
        $(tablas[i].parentNode).html("<h2>No hay registros aún</h2>");
}
/* ****************** COMPRAR ********************* */
//CARGANDO EL CONTENIDO EN EL MODAL
$(document).ready(function(){
    $(".btn-modal").click(function(){
        $(".modal-dialog").removeClass("modal-dialog-scrollable");

        $("#pago-tab").click(()=>$(".modal-dialog").removeClass("modal-dialog-scrollable"));

        $('#Pagar-tab').attr('disabled', true);

        document.getElementById("pago-tab").click();
    });
        
});
/* ELIGIENDO EL METODO DE PAGO */
$('#transferencia').click(function(){
    $('#Pagar-tab').attr('disabled', false);
    document.getElementById("Pagar-tab").click();
    $('#Pagar-tab').attr('disabled', true);
    $("#neopixels_pagomovil").hide();
    $("#neopixels_banco").show();
    $(".modal-dialog").addClass("modal-dialog-scrollable");
});

$('#pagomovil').click(function(){
    $('#Pagar-tab').attr('disabled', false);
    document.getElementById("Pagar-tab").click();
    $('#Pagar-tab').attr('disabled', true);
    $("#neopixels_banco").hide();
    $("#neopixels_pagomovil").show();
    $(".modal-dialog").addClass("modal-dialog-scrollable");
});

/* SETEANDO EL PRECIO DEL SERVICIO AL SERVICIO */
$("#pagina").click(()=>{
    $(".monto").val("20$");
    $("[name='comprar_servicio']").val("Pagina Web")
});
$("#redes").click(()=>{
    $(".monto").val("50$");
    $("[name='comprar_servicio']").val("Social Media")
});
$("#branding").click(()=>{
    $(".monto").val("30$");
    $("[name='comprar_servicio']").val("Diseño de Branding")
});

//VALIDANDO EL FORMULARIO
$("#comprar_nombre").keydown((event)=>{
    return soloLetras(event);
});
$("#comprar_cedula").keydown((event)=>{
    return soloNumeros(event);
});

//SUBMIT PARA COMPRAR
$("#comprar-serv").click(function (){
    //VALIDACIONES
    if(!validarLength($("#comprar_nombre").val()) || !validarLength($("#comprar_cedula").val()) || !validarLength($("#comprar_referencia").val())){
        alert("Estos campos no pueden estar vacíos: (Titular, Cedula, Nro de Referencia)");
    }else
        if($("#comprar_banco").val()==0){
            alert("Debe seleccionar un tipo de banco.");
        }else
            if($("#img_pago").val()==''){
                alert("Debe subir el capture de la transferencia");
            }else{
                if($("#descripcion-negocio").val()==''){
                    $("#descripcion-negocio").val("Sin descripción.")
                }
                $("[name='form_comprar']").submit();
            }
});


/* ****************** PAGOS ********************* */
//ESTA FUNCION SE LLAMA EN admin.php
function callBackPagos(){
    let tabla=document.getElementById("tabla-pagos")
    for(let i = 1;i<tabla.rows.length;i++){
        $(tabla.rows[i].cells[tabla.rows[i].cells.length-1]).html("<input type='button' class='btn btn-warning btn-procesar' value='Procesar'>")
    }
    $(".btn-procesar").click(function(event){
        let tr=event.target.parentNode.parentNode
        let id=tr.cells[0].innerText;
        let correo=tr.cells[1].innerText;
        let nombre=tr.cells[2].innerText;
        let cedula=tr.cells[3].innerText;
        let referencia=tr.cells[4].innerText;
        let banco=tr.cells[5].innerText;
        let servicio=tr.cells[6].innerText;
        let pago_ruta=tr.cells[7].innerText;
        let descripcion_negocio=tr.cells[8].innerText;
        let img_negocio=tr.cells[9].innerText;
        $("#label-pagos").text("ID de la Solicitud: "+id);
        $("[name='correo-pagos']").val(correo);
        $("[name='nombre-pagos']").val(nombre);
        $("[name='cedula-pagos']").val(cedula);
        $("[name='referencia-pagos']").val(referencia);
        $("[name='banco-pagos']").val(banco);
        $("[name='servicio-pagos']").val(servicio);
        if(servicio == "Pagina Web")
            $("[name='monto-pago']").val("20$");
        else
            if(servicio == "Social Media")
                $("[name='monto-pago']").val("50$");
            else 
                if(servicio == "Diseño de Branding")
                    $("[name='monto-pago']").val("30$");
        $("[name='soporte-pagos']").attr("href",pago_ruta);
        $("[name='descripcion-negocio-pagos']").val(descripcion_negocio);
        $("#img_negocio_pagos").attr("href",img_negocio);
        $("[name='img-negocio-pagos']").val(img_negocio);
        $("[name='id-pagos']").val(id);
        $("#btn-modal-pagos").trigger("click")
    });    
    $("#btnProcesar-pago").click(function(){
        let enviar = confirm("¿Seguro que quieres procesar el pago?");
        if(enviar)
            $("#form-pagos").submit();
    });
}
/* ****************** USUARIOS ********************* */
//ESTA FUNCION ES LLAMADA EN admin.php
function callBackUsuarios(){
    let tabla=document.getElementById("tabla-usuarios");
    for(let i = 1;i<tabla.rows.length;i++){
        if($(tabla.rows[i].cells[tabla.rows[i].cells.length-2]).text()=="Usuario"){
            $(tabla.rows[i].cells[tabla.rows[i].cells.length-1]).html("<input type='button' class='btn btn-success btn-darPermisos' value='Dar Permisos'>");
        }else
            if($(tabla.rows[i].cells[tabla.rows[i].cells.length-2]).text()=="Admin"){
                $(tabla.rows[i].cells[tabla.rows[i].cells.length-1]).html("<input type='button' class='btn btn-danger btn-quitarPermisos' value='Quitar Permisos'>");
            }
    }
    $(".btn-darPermisos").click(function(event){
        let tr=event.target.parentNode.parentNode;
        console.log(tr)
        let id=tr.cells[0].innerText;
        console.log(id)
        let continuar=confirm("¿Estas seguro de que quieres darle permisos de administrador a este usuario?");
        if(continuar){
            $("[name='id-usuario']").val(id);
            $("[name='tipo-usuario']").val("1");
            $("#form-usuarios").submit();
        }
    });
    $(".btn-quitarPermisos").click(function(event){
        let tr=event.target.parentNode.parentNode;
        console.log(tr)
        let id=tr.cells[0].innerText;
        console.log(id)
        let continuar=confirm("¿Estas seguro de que quieres quitarle los permisos de administrador a este usuario?");
        if(continuar){
            $("[name='id-usuario']").val(id);
            $("[name='tipo-usuario']").val("0");
            $("#form-usuarios").submit();
        }
    });
}
/* ****************** SERVICIOS ********************* */
//ESTA FUNCION SE LLAMA EN admin.php
function callBackServicios(){
    let tabla=document.getElementById("tabla-servicios")
    for(let i = 1;i<tabla.rows.length;i++){
        if($(tabla.rows[i].cells[tabla.rows[i].cells.length-3]).text()=="INACTIVO"){
            $(tabla.rows[i].cells[tabla.rows[i].cells.length-1]).html("<input type='button' class='btn btn-primary btn-gestionar' value='Gestionar'> <input type='button' class='btn btn-success btn-activar' value='Activar'>");
        }else
            if($(tabla.rows[i].cells[tabla.rows[i].cells.length-3]).text()=="ACTIVO"){
                $(tabla.rows[i].cells[tabla.rows[i].cells.length-1]).html("<input type='button' class='btn btn-primary btn-gestionar' value='Gestionar'> <input type='button' class='btn btn-danger btn-desactivar' value='Desactivar'>");
            }
    }
    $(".btn-gestionar").click(function(event){
        $("#btn-accion").hide();
        $("#btn-aceptar").hide();
        $("#collapse-accion").hide();
        let tr=event.target.parentNode.parentNode
        let id=tr.cells[0].innerText;
        let correo=tr.cells[1].innerText;
        let servicio=tr.cells[2].innerText;
        let descripcion=tr.cells[3].innerText;
        let estado=tr.cells[4].innerText;
        let img_ruta_negocio=tr.cells[5].innerText;
        $("#id-servicios").text("ID Servicio "+id+", Estado: "+estado);
        $("[name='id-servicios']").val(id)
        $("[name='correo-servicios']").val(correo);
        $("[name='servicio-servicios']").val(servicio);
        $("[name='descripcion-servicios']").val(descripcion);
        $("#imagen-servicios").attr("href",img_ruta_negocio);
        $("#btn-modal-servicios").trigger("click")
    });
    $(".btn-activar").click(function(event){
        $("#btn-accion").show();
        $("#collapse-accion").show();
        $("#btn-aceptar").show();
        let tr=event.target.parentNode.parentNode
        let id=tr.cells[0].innerText;
        let correo=tr.cells[1].innerText;
        let servicio=tr.cells[2].innerText;
        let descripcion=tr.cells[3].innerText;
        let estado=tr.cells[4].innerText;
        let img_ruta_negocio=tr.cells[5].innerText;
        $("#id-servicios").text("ID Servicio "+id+", Estado: "+estado);
        $("[name='id-servicios']").val(id)
        $("[name='correo-servicios']").val(correo);
        $("[name='servicio-servicios']").val(servicio);
        $("[name='descripcion-servicios']").val(descripcion);
        $("#imagen-servicios").attr("href",img_ruta_negocio);
        $("[name='estado-servicios']").val("ACTIVO")
        $("#btn-modal-servicios").trigger("click")
    });
    $(".btn-desactivar").click(function(){
        $("#btn-accion").show();
        $("#collapse-accion").hide();
        $("#btn-aceptar").show();
        let tr=event.target.parentNode.parentNode
        let id=tr.cells[0].innerText;
        let correo=tr.cells[1].innerText;
        let servicio=tr.cells[2].innerText;
        let descripcion=tr.cells[3].innerText;
        let estado=tr.cells[4].innerText;
        let img_ruta_negocio=tr.cells[5].innerText;
        $("#id-servicios").text("ID Servicio "+id+", Estado: "+estado);
        $("[name='id-servicios']").val(id)
        $("[name='correo-servicios']").val(correo);
        $("[name='servicio-servicios']").val(servicio);
        $("[name='descripcion-servicios']").val(descripcion);
        $("#imagen-servicios").attr("href",img_ruta_negocio);
        $("[name='estado-servicios']").val("INACTIVO")
        $("#btn-modal-servicios").trigger("click")
    });
    $("#btn-aceptar").click(function(){
        let continuar=confirm("¿Estas seguro de que quieres continuar?");
        if(continuar)
            $("#form-servicios").submit();
    });
}
/* ****************** MANTENIMIENTO ********************* */
$("#restaurar").click((event)=>{
    event.preventDefault();
    if($("[name='restorePoint']").val()==0)
        alert("Debe seleccionar un punto de restauración")
    else{
        let restaurar = confirm("¿Seguro que quiere restaurar la base de datos a este punto?");
        if(restaurar)
            $("#form_restaurar").submit();
    }
});

$("#btnCopia").click(()=>{
    let hacerCopia = confirm("¿Desea realizar la copia de seguridad?");
    if(hacerCopia)
        window.location = "./mantenimiento/Backup.php";
});
{{-- @extends('layouts.version2.modulos') --}}
@extends('layouts.app')
@section('titulo','Denuncia Digital')

@section('contenido')

@if($errors ->any())
<li class="list-group-item list-group-item-danger" style="text-align:center">
    <h6>Para continuar con el registro corrige los siguientes errores:</h6>
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
</li>
@endif
<link rel="stylesheet" href="{{ asset('lib/pnotify/pnotify.custom.min.css') }}">
<link rel="stylesheet" href="assetsWizard/css/form-elements.css">
<link rel="stylesheet" href="assetsWizard/css/style.css">
<link rel="stylesheet" href="assetsWizard/fontawesome-pro-5.10.2-web/css/all.css">
{{--
<link rel="stylesheet" type="text/css" href="{{ asset('plugins/sweetalert2/sweetalert2.min.css') }}"> --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<style>
    .card-bodys {
        background-image: url('{{asset("img/denuncia/Tarjeta Registro Exitoso.png")}}');
        background-size: cover;
    }

    .input-denuncia {
        background-color:rgba(230, 238, 250, 0.5);
    }
    .txt-conclusion {
        font: var(--unnamed-font-style-normal) normal var(--unnamed-font-weight-normal) var(--unnamed-font-size-60)/var(--unnamed-line-spacing-69) var(--unnamed-font-family-labrador-a);
        letter-spacing: var(--unnamed-character-spacing-0);
        color: var(--unnamed-color-707070);
        text-align: center;
        font: normal normal normal 40px/69px Labrador A;
        letter-spacing: 0px;
        color: #707070;
        width: 100%;
    }

    .txt-dato {
        /* UI Properties */
        font: var(--unnamed-font-style-normal) normal var(--unnamed-font-weight-bold) var(--unnamed-font-size-60)/var(--unnamed-line-spacing-69) var(--unnamed-font-family-labrador-a);
        letter-spacing: var(--unnamed-character-spacing-0);
        color: var(--unnamed-color-77bcc0);
        text-align: center;
        font: normal normal bold 50px/69px Labrador A;
        letter-spacing: 0px;
        color: #77BCC0;
        width: 100%;
    }

    .custom-file-label::after {
        content: "Elegir";
    }

    .f1-step {
        width: 50%;
    }
</style>

<div class="modal fade" id="ModalFormalizar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-xl">
            <div class="modal-header text-center">
                <h3 class="modal-title w-100 font-weight-bold">CONDICIONES DE USO</h3>
            </div>
            <div class="modal-body mx-2 " style="text-align: justify;">
                La Denuncia digital es una herramienta tecnológica que facilita a la ciudadanía la presentación de
                denuncias o querellas y permite su seguimiento; no obstante, a efecto de agotar los requisitos de
                procedibilidad a que hacen referencia los artículos 221, 223, 224 y 225 del Código Nacional de
                Procedimientos Penales, se debe acudir ante el agente del Ministerio Público más cercano para el
                reconocimiento de su contenido y firma o, en su caso, plasmar la huella digital, previa lectura de la
                misma.

                La falta de estos requisitos dará lugar a la improcedencia de la denuncia o querella, sin que ello sea
                impedimento para volver a presentarla una vez cumplidos los requisitos señalados en el Código Nacional
                de Procedimientos Penales.
                <br>
                <br>
                <label for="acepto">Acepto</label>
                <input type="checkbox" name="acepto" id="acepto">

            </div>
            <div class="modal-footer d-flex justify-content-center">
                <button class="btn btn-default" style="background: #394049;"
                    onclick="window.location.href='/'">Cancelar</button>
                <button class="btn btn-default" id="boton-acepto" data-dismiss="modal" aria-label="Close"
                    style="background: #394049;" disabled>Continuar</button>
            </div>
        </div>
    </div>
</div>


<div class="top-content">

    <div class="container" style="font-weight: bold; color: Black;" id="registro">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-12 text-left ">
                <img src="{{ asset('img/denuncia/logo.png') }}" height="150" width="auto"><br>
            </div>

            <div class="col-lg-4  col-md-4 col-sm-12 text-rigth ">
                <a href="{{asset('documentos/Denuncia_ayuda.png')}}"><img src="{{ asset('img/denuncia/Ayuda.png') }}"
                        data-toggle="modal" data-target="#ModalAyuda" height="50" width="auto"
                        style="margin-top: 80px;"></a>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-10 col-sm-offset-1 col-md-12 col-lg-12 col-lg-offset-0 form-box">
                <form action="{{ route('denuncia.store') }}" method="POST" enctype="multipart/form-data" class="f1"
                    id="form_denuncia">
                    @csrf
                    <!-- <form role="form" action="" method="post" class="f1"> -->
                    <input type="hidden" name="id_policia" value="" class="form-control" maxlength="50"
                        style="display: none;">
                    <div class="f1-steps" style="text-align: center;">
                        <div class="f1-progress">
                            {{-- <div class="f1-progress-line" data-now-value="16.66" data-number-of-steps="3"
                                style="width: 16.66%;"></div> --}}
                            <div class="f1-progress-line" data-now-value="50" data-number-of-steps="2"
                                style="width: 50%;"></div>
                        </div>
                        <div class="f1-step active">
                            <div class="f1-step-icon"><i class="fal fa-user-circle"></i></div>
                            <p>Denunciante</p>
                        </div>
                        <div class="f1-step">
                            <div class="f1-step-icon"><i class="fal fa-pen-alt"></i></div>
                            <p>Hechos</p>
                        </div>
                        {{-- <div class="f1-step ">
                            <div class="f1-step-icon"><i class="fal fa-fingerprint"></i></div>
                            <p>Evidencias/Testigos</p>
                        </div> --}}
                    </div>
                    <div class="form-row col-lg-12" id="campos_faltantes" style="display: none">
                        <div class="form-group col-md-6.5" style="background-color: #f8d7da;">
                            <label for="nombre" style="color: #721c24;">* Por favor verifique que los campos requeridos
                                se encuentren ingresados.</label>
                        </div>
                    </div>
                    <fieldset id="datos-denunciante" class="d-non">
                        @include('Denuncia.DatosDenunciante')
                        {{-- @include('DenunciaDigital.DatosDenunciante') --}}
                    </fieldset>
                    <fieldset class="d-bloc">

                        <div class="row ">
                            <div class="col-md-12">
                                <h1 class="mb-2">¿Qué ha sucedido?</h1>
                                <input class="form-control input-denuncia" placeholder="Descripción breve de qué ha sucedido">
                            </div>
                        </div>
                        
                        @include('Denuncia.Victima')
                        @include('Denuncia.Responsable')
                        @include('Denuncia.LugarFechaHecho')
                        @include('Denuncia.Hecho')
                        @include('Denuncia.Testigos')
                       


                        {{-- @include('Denuncia.Hechos') --}}
                        {{-- @include('DenunciaDigital.LugarHechos') --}}
                        <div class="fa-4x d-none" id="div_spin">
                            <center>
                                <i class="fas fa-circle-notch fa-spin" style="color:#002b49;"></i>
                            </center>
                        </div>
                        <div class="f1-buttons" id="botones_finalizacion">
                            <button type="button" class="btn btn-previous " id="btn_atras">Atrás</button>
                            <button type="button" onclick="guardarDenuncia(this)" class="btn btn-success"
                                id="finalizar_denuncia"><i class="fa-solid fa-floppy-disk"></i> Registrar
                                Denuncia</button>
                        </div>


                        {{-- <div class="f1-buttons">
                            <button type="button" class="btn btn-previous">Atrás</button>
                            <button type="button" class="btn btn-next">Siguiente</button>
                        </div> --}}
                        
                    </fieldset>
                    {{-- <fieldset class="">
                        <h1>Evidencias:</h1>
                        {{-- @include('DenunciaDigital.evidencia') --}}

                        {{-- <h1>Testigos:</h1> --}}
                        {{-- @include('DenunciaDigital.testigos') --}}


                  

                       

                        {{-- </div> --}}

                        {{-- <div class="f1-buttons">
                            <button type="button" class="btn btn-previous">Atrás</button>
                            <button type="button" class="btn btn-next">Siguiente</button>
                        </div> --}}
                    {{-- </fieldset>  --}}


                </form>
                <!-- </form> -->
            </div>
        </div>


    </div>{{-- container --}}





    <div class="container d-none" id="registro_exitoso">

        <div class="row justify-content-center">
            <div class="col-md text-center">

                <form action="{{ route('denuncia.consultaDenuncia') }}" method="POST">
                    @csrf
                    <div class="d-none">
                        <input type="hidden" id="folio" name="folio"><br><br>

                        <input type="hidden" id="token" name="token"><br><br>
                    </div>
                    <button class="btn btn-info" style="
                background-color: #c09f77;
                font-family: Labrador A;  font-size: x-large;" type="submit">Consultar denuncia</button>
                </form>

            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md">
                <div class="card  bg-light border-dark mt-5">
                    <img class="card-img" src="{{asset(" img/denuncia/Tarjeta Registro Exitoso.png")}}"
                        alt="Card image cap">


                    <div class="card-img-overlay text-center" style="
                    font: var(--unnamed-font-style-normal) normal var(--unnamed-font-weight-900) var(--unnamed-font-size-90)/var(--unnamed-line-spacing-103) var(--unnamed-font-family-labrador-a);
                    letter-spacing: var(--unnamed-character-spacing-0);
                    color: var(--unnamed-color-cf8e1d);
                    text-align: left;
                    font: normal normal 900 60px/103px Labrador A;
                    letter-spacing: 0px;
                    color: #CF8E1D;
                    opacity: 1;
                    top: 175px;
                    width: 100%;">
                        ¡REGISTRO EXITOSO!
                    </div>
                    <div class="card-img-overlay  text-center txt-conclusion" style="    top: 250px;">
                        Su denuncia se registró con el
                    </div>

                    <div class="card-img-overlay text-center txt-conclusion" style="    top: 285px;">
                        Folio único:
                    </div>


                    <div class="card-img-overlay  text-center txt-dato" style="    top: 330px;" id="txt_folio">

                    </div>

                    <div class="card-img-overlay  text-center txt-conclusion" style="    top: 380px;">
                        Clave de seguimiento:
                    </div>

                    <div class="card-img-overlay  text-center txt-dato" style="    top: 425px;"
                        id="txt_clave_seguimiento">

                    </div>


                </div>



            </div>
        </div>
    </div>




</div>

<div class="modal fade" id="modalpolicia" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="false">
    <form class="form-horizontal form-bordered" method="POST" action="{{ url("/policia_registro_denuncia") }}"
        enctype="multipart/form-data">
        @csrf
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h3 class="modal-title w-100 font-weight-bold">¿Es Policía?</h3>
                </div>
                <div class="modal-body mx-3">
                    <select id="Respuestapolicia" name="Respuestapolicia" class="form-control selectpicker"
                        data-live-search="true">
                        <option value="0" selected disabled>Seleccione una opción</option>
                        <option value="1">Sí</option>
                        <option value="2">No</option>
                    </select>
                </div>
                <div class="modal-body mx-3" id="modaldatospol" name="modaldatospol" style="display: none;">
                    <div class="form-row col-lg-12">
                        <div class="form-group col-md-12">
                            <div class="form-ic-cmp">
                                <i class="fad fa-id-card"></i>&nbsp;
                                <label for="NombrePol">Nombre</label>
                            </div>
                            <input type="text" id="NombrePol" name="NombrePol" class="form-control" maxlength="50"
                                style="background-color:rgba(230, 238, 250, 0.5);">
                        </div>
                    </div>
                    <div class="form-row col-lg-12">
                        <div class="form-group col-md-6">
                            <div class="form-ic-cmp">
                                <i class="fal fa-at"></i>&nbsp;
                                <label for="EmailPol">Correo</label>
                            </div>
                            <input type="email" id="EmailPol" name="EmailPol" class="form-control" maxlength="50"
                                style="background-color:rgba(230, 238, 250, 0.5);">
                        </div>
                        <div class="form-group col-md-6">
                            <div class="form-ic-cmp">
                                <i class="fal fa-phone-alt"></i>&nbsp;
                                <label for="TelPol">Teléfono</label>
                            </div>
                            <input type="number" id="TelPol" name="TelPol" class="form-control" maxlength="10"
                                style="background-color:rgba(230, 238, 250, 0.5);">
                        </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-center">
                        <button class="btn btn-next" type="submit">Guardar</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>




@endsection

@section('js')
<script src="assetsWizard/js/scripts.js"></script>
<script src="lib/pnotify/pnotify.custom.min.js"></script>

<script>
    jQuery(document).ready( function(){
    //$("#modalpolicia").modal("show");
    // regresar al url de denuncia con el id del policia validar si existe id no se mostrara el modal
});

$("#Respuestapolicia").on('change', function(){
    var respuestapolicia = $('#Respuestapolicia').val();
    if (respuestapolicia == 1){
        $("#modaldatospol").css("display","block");
    }else if(respuestapolicia == 2){
        $("#modalpolicia").modal("hide");
    } else{
        $("#modaldatospol").css("display","none");
    }
});

$("#video").on('change', function(){
            validarVideo();
});

$( '#acepto' ).on( 'click', function() {
    if( $(this).is(':checked') ){
       $("#boton-acepto").prop('disabled', false);
    } else {
        $("#boton-acepto").prop('disabled', true);
    }
});

  	jQuery(document).ready( function(){

        // $("#ModalFormalizar").modal("show");
        $("#video").on('change', function(){
            validarVideo();
        });

        $("#fecha_exacta").on('change', function(){
            validarFechaMenorActual($("#fecha_exacta").val());
        });

        // $("#select_lugar").select2({
        //     placeholder: 'Selecciona un lugar',
        //     theme: 'bootstrap4'
        // });

        $('#imageModal').on('hidden.bs.modal', function (e) {
            // alert("cerrado");
           $("#imageInput").val("").trigger("change");
        });

    });



function validarFechaMenorActual(date){
    var x=new Date().toISOString().slice(0,10);
    var fecha = date.split("/");

    if(fecha > x){
        alertas('Fecha invalida, la fecha no puede ser mayor a la actual');
    }

}

function validarVideo() {

    var fileSize = $('#video')[0].files[0].size;
    var siezekiloByte = parseInt(fileSize / 1024);
    //alert(siezekiloByte);
    if (siezekiloByte >  250000) {
        alertas('El video excede el tamaño permitido(250MB)');
    }
}

function alertas(msg)
{
    new PNotify({
        title: 'Error:',
        text: msg,
        type: 'error',
        addclass: "stack-bottomright"
    });
}
        // $('#ModalFormalizar').modal({
        //     backdrop: 'static',
        //     keyboard: false
        // })

        // Funcion para pintar el mapa
        var centreGot = false;


        // funcion para los municipios de michoacan
        $( document ).ready(function() {
            // municipios_michoacan(16);

            /*municipios(16);*/
            // entidad = $('#entidad').val();
            // if(entidad != ''){
            // municipios_residencia(entidad);
            // }
            $("#entre_fechas").css("display","none");
            $("#fecha_exacta_div").css("display","none");
            pais = $('#pais').val();
            if(pais == 118){
                $("#extranjero").css("display","none");
                $("#mexico").css("display","block");
                $("#domicilio_extranjero").val('');
            }else{
                $("#extranjero").css("display","block");
                $("#mexico").css("display","none");
                $("#municipio").val('');
                $("#calle").val('');
                $("#numext").val('');
                $("#numint").val('');
                $("#CP").val('');
                if($("#ciudadId").val()!='')
                {
                  $("#municipio").val(0);
                }
            }

        });


        //funcion para el domicilio
        $("#pais").on('change', function(){
        pais = $('#pais').val();
        if(pais == 118){
            $("#extranjero").css("display","none");
            $("#mexico ").css("display","block");
            $("#domicilio_extranjero").val('');

            $("#domicilio_extranjero").removeClass("required");
            $("#CP").addClass("required");
            $("#calle").addClass("required");
            $("#numext").addClass("required");
            $("#asentamiento_residencia").addClass("required");
        }else{
            $("#extranjero").css("display","block");
            $("#mexico ").css("display","none");
            $("#municipio").val('');
            $("#calle").val('');
            $("#numext").val('');
            $("#numint").val('');
            $("#CP").val('');

            $("#domicilio_extranjero").addClass("required");
            $("#CP").removeClass("required");
            $("#calle").removeClass("required");
            $("#numext").removeClass("required");
            $("#asentamiento_residencia").removeClass("required");
        }
        });
        //catalogos
        $("#entidad").on('change', function(e){
            entidad = $('#entidad').val();
            municipios(entidad);
        });

        function guardarDenuncia(boton){

    // Código que puede generar errores

    var nacionalidad = $("#nacionalidad").val();
    var credencial = $("#credencial").val();
    if(credencial == "sfs"){
        Swal.fire({
                title: "¡Cuidado!",
                text: "Ingresa la imagen de tu credencia para poder continuar",
                icon: "error"
            });
    }else{

    // var formData = new FormData(document.getElementById("form_denuncia"));
    var formData = new FormData(document.getElementById("form_denuncia"));
    formData.append("nacionalidad", nacionalidad);
    console.log($("#form_denuncia").serializeArray());
    // alert(formData);
    Swal.fire({
        title: "¿Está seguro de querer registrar la denuncia?",
        showDenyButton: true,
        confirmButtonText: "Si, registrar",
        denyButtonText: `No, cancelar`,
        reverseButtons: true,
        confirmButtonColor: '#008000',
        }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                    $(boton).attr("disabled",true);
                    $("#botones_finalizacion").addClass("d-none");
                    $("#div_spin").removeClass("d-none");
                    try {

                        $.ajax({
                            url: "{{ route('denuncia.store') }}",
                            type: "post",
                            data: formData,
                            cache: false,
                            contentType: false,
                            processData: false
                        })
                        .done(function(res) {
                            var data = JSON.parse(res);
                            if(data.respuesta){
                                Swal.fire({
                                    icon: "success",
                                    title: "Tu denuncia se ha registrado exitosamente",
                                    showConfirmButton: false,
                                    timer: 3000
                                });
                                $("#txt_folio").html(data.folio);
                                $("#txt_clave_seguimiento").html(data.token);
                                $("#folio").val(data.folio);
                                $("#token").val(data.token);
                                $("#registro_exitoso").removeClass("d-none");
                                $("#registro").addClass("d-none");
                                // Aquí puedes realizar otras acciones según la respuesta HTML recibida
                            } else {
                                $(boton).attr("disabled", false);
                                $("#botones_finalizacion").removeClass("d-none");
                                $("#div_spin").addClass("d-none");
                                Swal.fire({
                                    icon: "error",
                                    title: "Ha ocurrido un error",
                                    text: "Comuníquese con el administrador del sistema",
                                    showConfirmButton: true
                                });
                            }
                        }).fail(function(xhr, status, error) {
                            $(boton).attr("disabled",false);
                            $("#botones_finalizacion").removeClass("d-none");
                            $("#div_spin").addClass("d-none");
                            Swal.fire({
                                icon: "error",
                                title: "Ha ocurrido un error",
                                text: "Comuniquese con el administrador del sistema",
                                showConfirmButton: true
                            });
                            console.error('Error en la solicitud AJAX:', error);
                        });
                    } catch (error) {
                            $(boton).attr("disabled",false);
                            $("#botones_finalizacion").removeClass("d-none");
                            $("#div_spin").addClass("d-none");
                            Swal.fire({
                                icon: "error",
                                title: "Ha ocurrido un error",
                                text: "Comuniquese con el administrador del sistema",
                                showConfirmButton: true
                            });

                    }
                    }else{
                        $(boton).attr("disabled",false);
                    }
                });
        }

        }

        function justNumbers(e)
        {
            var keynum = window.event ? window.event.keyCode : e.which;
            if ((keynum == 8) || (keynum == 46))
                return true;

            return /\d/.test(String.fromCharCode(keynum));
        }


        function municipios(entidad){
            $.get('DenunciaDigital/municipios/'+entidad+"/catalogo", function(respuesta){
                $('#municipio').empty();
                $('#municipio').append('<option value="0">Seleccione un municipio</option>');
                $.each(respuesta, function(index,dato){
                    $('#municipio').append('<option value="'+dato.id+'">'+dato.nombre_municipio+'</option>');
                });
                // if($("#ciudadId").val()!='')
                // {
                //   $("#municipio").val(0);
                // }
            });

        }
        function municipios_residencia(entidad){
            // $.get('DenunciaDigital/municipios/'+entidad+"/catalogo", function(respuesta){
            $.get('{{config("app.url")}}/DenunciaDigital/municipios/'+entidad+"/catalogo", function(respuesta){
                $('#municipio').empty();
                $('#municipio').append('<option selected value="0">Seleccione un municipio</option>');
                $.each(respuesta, function(index,dato){
                    $('#municipio').append('<option value="'+dato.id+'">'+dato.nombre_municipio+'</option>');
                });
                // if($("#ciudadId").val()!='')
                // {
                //   $("#municipio").val(0);
                // }
            });

        }
        function municipios_michoacan(entidad){
            $.get('DenunciaDigital/municipios/'+entidad+"/catalogo", function(respuesta){
                $('#municipio_hechos').empty();
                $('#municipio_hechos').append('<option value="0">Seleccione un municipio</option>');
                $.each(respuesta, function(index,dato){
                    $('#municipio_hechos').append('<option value="'+dato.id+'">'+dato.nombre_municipio+'</option>');
                });
                municipio = $('#pivote_municipio').val();

                setTimeout(function() {
                    $('#municipio').val(municipio).attr('selected','selected');},1000);
            });
        }
        // funcionalidad fechas

        $('#fecha_hechos').on('change', function() {
           var fecha_hechos = $('#fecha_hechos').val();

           if(fecha_hechos == '1'){

               $("#entre_fechas").css("display","none");
               $("#fecha_exacta_div").css("display","flex");
               $("#fecha_inicio").val('');
               $("#hora_inicio").val('');
               $("#fecha_fin").val('');
               $("#hora_fin").val('');
           }
           else{
               $("#entre_fechas").css("display","none");
               $("#fecha_exacta_div").css("display","none");
               $("#fecha_exacta").val('');
               $("#hora_exacta").val('');
               $("#fecha_inicio").val('');
               $("#hora_inicio").val('');
               $("#fecha_fin").val('');
               $("#hora_fin").val('');
           }
        });

        //Funcionalidad delitos de robo

        $('#delito').on('change', function() {
           var delito = $('#delito').val();

           if(delito == '6'){

               $("#delito_robo_div").css("display","block");
           }
           else{
               $("#delito_robo_div").css("display","none");
               $("#folio_911_div").css("display","none");
               $("#modalidad_div").css("display","none");
               $('#delito_robo').val('0');
               $('#modalidad').val('0');
               $('#folio_911').val('');
           }
        });

        //Funcionalidad delitos de robo modalidad

        $('#delito_robo').on('change', function() {
           var delito = $('#delito_robo').val();

           if(delito == '8' || delito == '9'){

               $("#modalidad_div").css("display","block");
               $("#folio_911_div").css("display","block");
           }
           else{
               $("#modalidad_div").css("display","none");
               $("#folio_911_div").css("display","none");
               $('#modalidad').val('0');
               $('#folio_911').val('');
           }
        });

               //Funcionalidad select evidencias

        $('#evidencias').on('change', function() {
           var delito = $('#evidencias').val();

           if(delito == '1'){

               $("#evidencias_div").css("display","flex");
           }
           else{
               $("#evidencias_div").css("display","none");
               $('#info_testigo').val('');
           }
        });

        //Funcionalidad testigos

                $('#carretera').on('change', function() {
           var carretera = $('#carretera').val();

           if(carretera == '2'){

               $(".lugarhechos").css("display","flex");
               $(".lugarhechos2").css("display","block");
               $(".lugarhechos_carretera").css("display","none");
               $(".lugarhechos_observaciones").css("display","none");
           }
           else{
               $(".lugarhechos").css("display","none");
               $(".lugarhechos2").css("display","none");
               $(".lugarhechos_carretera").css("display","flex");
               $(".lugarhechos_observaciones").css("display","flex");
           }
        });

        //Funcionalidad select evidencias

        // $('#evidencias').on('change', function() {
        //    var delito = $('#evidencias').val();

        //    if(delito == '1'){

        //        $("#evidencias_div").css("display","flex");
        //    }
        //    else{
        //        $("#evidencias_div").css("display","none");
        //        $('#info_testigo').val('');
        //    }
        // });

        //funcionalidad mapa

        function municipio_mapa(municipio){
            $.get('DenunciaDigital/municipio/mapa/'+municipio+"/catalogo", function(respuesta1){
                //alert(respuesta1);
                $('select[name=municipio_hechos]').val(respuesta1);
            });

        }

        function geocodificacion_ubicacion_mapa(ubicacion){

            $.get('DenunciaDigital/geocodificacion_ubicacion/'+ubicacion, function(respuesta){
                //alert(respuesta);
                $("input[name='coordenadas']").val(respuesta['lat']+','+respuesta['lng']);
                $("input[name='calle_hechos']").val(respuesta['calle']);
                $("input[name='numext_hechos']").val(respuesta['numero']);
                $("input[name='colonia_hechos']").val(respuesta['colonia']);
                $("input[name='CP_hechos']").val(respuesta['codigo_postal']);

                $.get('DenunciaDigital/estado/mapa/'+respuesta['estado']+"/catalogo", function(respuestax){
                    //alert(respuestax);
                    $('select[name=entidad_hechos]').val(respuestax);
                    //municipios_michoacan(respuestax);
                    municipio_mapa(respuesta['municipio']);
                });
            });

        }

        // $("#municipio_hechos").on('change', function(e){
        //     var municipio = $('#municipio_hechos').val();
        //     var calle = $('#calle_hechos').val();
        //     var numero_ext = $('#numext_hechos').val();
        //     var colonia_evento = $('#colonia_hechos').val();
        //     var entidad = $('#entidad_hechos option:selected').text();
        //     var municipio = $('#municipio_hechos option:selected').text();
        //     var ubicacion = (calle+' '+numero_ext+', '+colonia_evento+', '+municipio+', '+entidad+', Mexico');
        //     if(calle != '' && numero_ext != '' && colonia_evento != '' && entidad != '' && municipio !=''){
        //         geocodificacion_ubicacion(ubicacion);
        //         //alert(ubicacion);
        //     }
        // });

        // $('#calle_hechos').on('change', function() {
        //     var calle = $('#calle_hechos').val();
        //     var numero_ext = $('#numext_hechos').val();
        //     var colonia_evento = $('#colonia_hechos').val();
        //     var entidad = $('#entidad_hechos option:selected').text();
        //     var municipio = $('#municipio_hechos option:selected').text();
        //     var ubicacion = (calle+' '+numero_ext+', '+colonia_evento+', '+municipio+', '+entidad+', Mexico');
        //     if(calle != '' && numero_ext != '' && colonia_evento != '' && entidad != '' && municipio !=''){
        //         geocodificacion_ubicacion(ubicacion);
        //        //alert(ubicacion);
        //     }
        // });

        // $('#numext_hechos').on('change', function() {
        //     var calle = $('#calle_hechos').val();
        //     var numero_ext = $('#numext_hechos').val();
        //     var colonia_evento = $('#colonia_hechos').val();
        //     var entidad = $('#entidad_hechos option:selected').text();
        //     var municipio = $('#municipio_hechos option:selected').text();
        //     var ubicacion = (calle+' '+numero_ext+', '+colonia_evento+', '+municipio+', '+entidad+', Mexico');
        //     if(calle != '' && numero_ext != '' && colonia_evento != '' && entidad != '' && municipio !=''){
        //         geocodificacion_ubicacion(ubicacion);
        //         //alert(ubicacion);
        //     }
        // });

        // $('#colonia_hechos').on('change', function() {
        //     //alert('colonia');
        //     var calle = $('#calle_hechos').val();
        //     var numero_ext = $('#numext_hechos').val();
        //     var colonia_evento = $('#colonia_hechos').val();
        //     var entidad = $('#entidad_hechos option:selected').text();
        //     var municipio = $('#municipio_hechos option:selected').text();
        //     var ubicacion = (calle+' '+numero_ext+', '+colonia_evento+', '+municipio+', '+entidad+', Mexico');
        //     if(calle != '' && numero_ext != '' && colonia_evento != '' && entidad != '' && municipio !=''){
        //         geocodificacion_ubicacion(ubicacion);
        //        //alert(ubicacion);
        //     }
        // });

        function geocodificacion_ubicacion(ubicacion){
            //alert('geocodificacion_ubicacion');
            $.get('DenunciaDigital/geocodificacion_ubicacion/'+ubicacion, function(respuesta){

                $("input[name='coordenadas']").val(respuesta['lat']+','+' '+respuesta['lng']);

                if(respuesta['calle']){
                    $("input[name='calle_hechos']").val(respuesta['calle']);
                }
                if(respuesta['numero']){
                    $("input[name='numext_hechos']").val(respuesta['numero']);
                }
                if(respuesta['colonia']){
                    $("input[name='colonia_hechos']").val(respuesta['colonia']);
                }
                if(respuesta['codigo_postal']){
                    $("input[name='CP_hechos']").val(respuesta['codigo_postal']);}
            });

        }

        // document.getElementById("imagen").onchange = function(e) {
        //     // Creamos el objeto de la clase FileReader
        //     let reader = new FileReader();

        //     // Leemos el archivo subido y se lo pasamos a nuestro fileReader
        //     reader.readAsDataURL(e.target.files[0]);

        //     // Le decimos que cuando este listo ejecute el código interno
        //     reader.onload = function(){
        //         let preview = document.getElementById('preview_imagen'),
        //             image = document.createElement('img');

        //         image.src = reader.result;

        //         preview.innerHTML = '';
        //         preview.append(image);
        //     };
        // }

        document.getElementById("credencial").onchange = function(e) {
            // Creamos el objeto de la clase FileReader
            let reader = new FileReader();
            

            // Leemos el archivo subido y se lo pasamos a nuestro fileReader
            reader.readAsDataURL(e.target.files[0]);

            // Le decimos que cuando este listo ejecute el código interno
            reader.onload = function(){
                let preview = document.getElementById('preview_credencial'),
                    image = document.createElement('img');

                image.src = reader.result;
                image.style.maxWidth = '150px';

                preview.innerHTML = '';
                preview.append(image);
            };
        }

        // document.getElementById("identificacion_victima").onchange = function(e) {
        //     // Creamos el objeto de la clase FileReader
        //     let reader = new FileReader();
            

        //     // Leemos el archivo subido y se lo pasamos a nuestro fileReader
        //     reader.readAsDataURL(e.target.files[0]);

        //     // Le decimos que cuando este listo ejecute el código interno
        //     reader.onload = function(){
        //         let preview = document.getElementById('preview_identificacion_victima'),
        //             image = document.createElement('img');

        //         image.src = reader.result;
        //         image.style.maxWidth = '150px';

        //         preview.innerHTML = '';
        //         preview.append(image);
        //     };
        // }

        document.getElementById("identificacion_responsable").onchange = function(e) {
            // Creamos el objeto de la clase FileReader
            let reader = new FileReader();
            

            // Leemos el archivo subido y se lo pasamos a nuestro fileReader
            reader.readAsDataURL(e.target.files[0]);

            // Le decimos que cuando este listo ejecute el código interno
            reader.onload = function(){
                let preview = document.getElementById('preview_identificacion_responsable'),
                    image = document.createElement('img');

                image.src = reader.result;
                image.style.maxWidth = '150px';

                preview.innerHTML = '';
                preview.append(image);
            };
        }
        

        // document.getElementById("audio").onchange = function(e) {

        //     if($("#audio").val() == ''){
        //         $("#preview_audio").css("display","none");
        //     }else{
        //         $("#preview_audio").css("display","");
        //     }


        // }

        // document.getElementById("video").onchange = function(e) {

        //     if($("#video").val() == ''){
        //         $("#preview_video").css("display","none");
        //     }else{
        //         $("#preview_video").css("display","");
        //     }
        // }

        $('#boton-enviar').on('click', function(){
            $('#loaderdd').css('display', 'inline-block');
            $('#boton-enviar').prop('disabled', true);
        });

        function spiner() {
            // $('#btn_atras').css("display", "none");
            // $('#finalizar_denuncia').css("display", "none");
            if($('#file2').files.length > 0){
                $('#div_spin').css("display", "block");
            }
        }


</script>
<script src="{{ asset('js/testigos.js') }}"></script>
{{-- <script src="{{ asset('plugins/sweetalert2/sweetalert2.all.min.js') }}"></script> --}}
@endsection

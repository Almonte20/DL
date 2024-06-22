@extends('layouts.sitio-principal')

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
    <link rel="stylesheet" href= "{{ asset('lib/pnotify/pnotify.custom.min.css') }}">
    <link rel="stylesheet" href= "assetsWizard/css/form-elements.css">
    <link rel="stylesheet" href= "assetsWizard/css/style.css">
    <link rel="stylesheet" href= "assetsWizard/fontawesome-pro-5.10.2-web/css/all.css">
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('plugins/sweetalert2/sweetalert2.min.css') }}"> --}}

		<div class="modal fade" id="ModalFormalizar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
		aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content modal-xl">
				<div class="modal-header text-center">
					<h3 class="modal-title w-100 font-weight-bold">CONDICIONES DE USO</h3>
				</div>
				<div class="modal-body mx-2 " style="text-align: justify;">
                    La Denuncia digital es una herramienta tecnológica que facilita a la ciudadanía la presentación de denuncias o querellas y permite su seguimiento; no obstante, a efecto de agotar los requisitos de procedibilidad a que hacen referencia los artículos 221, 223, 224 y 225 del Código Nacional de Procedimientos Penales, se debe acudir ante el agente del Ministerio Público más cercano para el reconocimiento de su contenido y firma o, en su caso, plasmar la huella digital, previa lectura de la misma.

                    La falta de estos requisitos dará lugar a la improcedencia de la denuncia o querella, sin que ello sea impedimento para volver a presentarla una vez cumplidos los requisitos señalados en el Código Nacional de Procedimientos Penales.
                    <br>
                    <br>
                    <label for="acepto">Acepto</label>
                    <input type="checkbox" name="acepto" id="acepto">

				</div>
				<div class="modal-footer d-flex justify-content-center">
                    <button class="btn btn-default" style="background: #394049;" onclick="window.location.href='/'">Cancelar</button>
					<button class="btn btn-default"  id="boton-acepto" data-dismiss="modal" aria-label="Close" style="background: #394049;" disabled>Continuar</button>
				</div>
			</div>
		</div>
    </div>

    <div class="modal fade" id="ModalInstrucciones" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
		aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content modal-xl">
				<div class="modal-header text-center">
					<h3 class="modal-title w-100 font-weight-bold">INSTRUCCIONES DE LLENADO DE HECHOS</h3>
				</div>
				<div class="modal-body mx-2 " style="text-align: justify;">

I N S T R U C C I O N E S:
<br><br>
Estimado denunciante, trate de responder al mayor número de las siguientes preguntas para una mejor narrativa de los hechos.
<br>
<br>1.-<b>¿Qué?</b> Narrar lo que sucedió lo más claro posible, especificando detalles.
<br>2.-<b>¿Cuándo?</b> Deberá establecer la fecha en que ocurrió el hecho o en que tuvo conocimiento del mismo (día, mes y año), si no sabe con exactitud establezca una hora y fecha aproximada en que ocurrió.
<br>3.-<b>¿Cómo?</b> En este campo deberá describir la manera o forma en que cometieron el delito (manera, forma, modo).
<br>4.-<b>¿Dónde?</b> Deberá ubicar el lugar, calle, número, colonia y/o referencia, entre qué calles, señalando establecimientos, escuelas, que nos acerquen o ubiquen el lugar).
<br>5.-<b>¿Quién?</b> Deberá especificar si conoce a la persona o personas que cometieron el delito (nombre con apellidos si los sabe, alias, domicilio donde puede ser localizado, señas particulares, tatuajes, perforaciones, o cualquier otra característica que puede ayudar a su reconocimiento).
<br>6.-<b>¿Por qué?</b> Deberá de  señalar si conoce el motivo por el cual cometieron el delito.
<br>7.-<b>¿Con qué?</b> En este campo deberá de precisar y describir el objeto por ejemplo: (arma, cuchillo, navaja, piedra, palo, etc),  con alguna parte del cuerpo ejemplo: (mano, pie, puño, cabeza etc.), o vehiculo, ejemplo (motocicleta, automóvil, camión,  bicicleta, etc.)
<br><br>
EJEMPLO DE LLENADO
<br>
Que el día     (_____),     siendo aproximadamente las    (____),  encontrándome en _________), sucedió ________ <br>(respondiendo a las siguientes preguntas: <br><b>¿Qué?</b><br> <b>¿Cuándo?</b><br> <b>¿Cómo?</b><br> <b>¿Dónde?</b><br> <b>¿Quién?</b><br> <b>¿Por qué?</b><br> <b>¿Con quién?</b><br>
<br><br>


                    <br>

				</div>
				<div class="modal-footer d-flex justify-content-center">
					<button class="btn btn-default" data-dismiss="modal" aria-label="Close" style="background: #394049;">Cerrar</button>
				</div>
			</div>
		</div>
	</div>

<div class="top-content">

    <div class="container" style = "font-weight: bold; color: Black;">
        <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-12 text-left ">
            <img src="{{ asset('img/denuncia/logo.png') }}" height="150" width="auto"><br>
        </div>
         
        <div class="col-lg-4  col-md-4 col-sm-12 text-rigth ">
            <a href="{{asset('documentos/Denuncia_ayuda.png')}}" ><img src="{{ asset('img/denuncia/Ayuda.png') }}" data-toggle="modal" data-target="#ModalAyuda" height="50" width="auto" style="margin-top: 80px;"></a>
        </div>
    </div>

          <div class="row">
            <div class="col-sm-10 col-sm-offset-1 col-md-12 col-lg-12 col-lg-offset-0 form-box">
                {!! Form::open(['route' => 'denuncia.store', 'method' => 'POST', 'files' => true,'class' => 'f1']) !!}
                <!--<form role="form" action="" method="post" class="f1"> -->
                {!! Form::text('id_policia', '', ['class' => 'form-control', 'maxlength'=> '50','style' => 'display: none;']) !!}
                    <div class="f1-steps" style="text-align: center;">
                        <div class="f1-progress">
                            {{-- <div class="f1-progress-line" data-now-value="16.66" data-number-of-steps="3" style="width: 16.66%;"></div> --}}
                            <div class="f1-progress-line" data-now-value="16.66" data-number-of-steps="2" style="width: 16.66%;"></div>
                        </div>
                        <div class="f1-step active">
                            <div class="f1-step-icon"><i class="fal fa-user-circle"></i></div>
                            <p>Generales</p>
                        </div>
                        <div class="f1-step">
                            <div class="f1-step-icon"><i class="fal fa-pen-alt"></i></div>
                            <p>Hechos</p>
                        </div>
                        <div class="f1-step">
                            <div class="f1-step-icon"><i class="fal fa-fingerprint"></i></div>
                            <p>Evidencias</p>
                        </div>
                        <div class="f1-step">
                            <div class="f1-step-icon"><i class="fal fa-check"></i></div>
                            <p>Conclusión</p>
                        </div>

                    </div>
                    <div class="form-row col-lg-12" id="campos_faltantes" style="display: none">
                        <div class="form-group col-md-6.5" style="background-color: #f8d7da;">
                            {!! Form::label('nombre', '* Por favor verifique que los campos requeridos se encuentren ingresados.',['style' => 'color: #721c24']) !!}
                        </div>
                    </div>
                    <fieldset>
                        @include('DenunciaDigital.DatosDenunciante')
                    </fieldset>

                    <fieldset>
                        @include('DenunciaDigital.DatosDenuncia')

                    </fieldset>

                    <fieldset>
                    <h1>Evidencias:</h1>
                    <div class="form-row col-lg-12">
                        <div class="form-group col-md-4">
                            <div class="form-ic-cmp">
                                <i class="fal fa-list"></i>&nbsp;
                            {!! Form::label('evidencias', '¿Cuenta con Evidencias? (Opcional)') !!}
                            </div>
                            {!! Form::select('evidencias',['1' => 'Sí', '2' => 'No'],0, ['class' => 'form-control','value' => "{{ old('modalidad') }}" ,'placeholder' => 'Seleccione una opción', 'style' => 'background-color:rgba(230, 238, 250, 0.5);']) !!}
                            <div style="color:#FF0000;">
                                {{ $errors->first('tipo_denuncia') }}
                            </div>
                        </div>
                    </div>

                    <div class="form-row col-lg-12" id="evidencias_div" style="display: none;">
                    <div class="form-group col-md-6">
                        <div class="form-ic-cmp">
                            <i class="fal fa-file"></i>&nbsp;
                        {!! Form::label('documento', 'Documental') !!}
                        </div>
                        {!! Form::file('documento',['class' =>'file_multi_image' ,'id' => 'documento','accept'=>'application/pdf']); !!}

                    </div>


                    <div class="form-group col-md-6">
                        <div class="form-ic-cmp">
                            <i class="fal fa-camera"></i>&nbsp;
                        {!! Form::label('image', 'Fotográfica') !!}
                        </div>
                        {!! Form::file('image',['class' =>'file_multi_image' ,'id' => 'file','accept'=>'image/*']); !!}

                    </div>

                    <div class="form-group col-md-6">
                        <div class="form-ic-cmp">
                            <i class="fal fa-video"></i>&nbsp;
                            {!! Form::label('video', 'Video') !!}
                        </div>
                          {!! Form::file('video',['id' => 'video','accept'=>'video/*']); !!}

                    </div>

                    <div class="form-group col-md-6">
                        <div class="form-ic-cmp">
                            <i class="fal fa-volume-up"></i>&nbsp;
                        {!! Form::label('audio', 'Audio') !!}
                        </div>
                        {!! Form::file('audio',['id' => 'audio','accept'=>'audio/*']); !!}
                    </div>
                    <br>
                    </div>

                    <div class="form-row col-lg-12">
                        <div class="form-group col-md-4">
                        <div id="preview_imagen"></div>
                        </div>

                        <div class="form-group col-md-4" id="preview_video" style="display: none">
                            <img src="img/video_adjunto.png" />
                        </div>

                        <div class="form-group col-md-4" id="preview_audio" style="display: none">
                                <img src="img/audio_adjunto.png" />
                        </div>

                    </div>


                    <h1>Testigos:</h1>
                    @include('DenunciaDigital.testigos')

                    <div class="f1-buttons">
                            <button type="button" class="btn btn-previous">Atrás</button>
                            <button type="button" class="btn btn-next">Siguiente</button>
                    </div>

                </fieldset>

                <fieldset>
                @include('DenunciaDigital.ConcluirDenuncia')
                </fieldset>

                {!! Form::close()!!}
                <!-- </form> -->
            </div>
        </div>

    </div>
</div>
<div class="modal fade" id="modalpolicia" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
		aria-hidden="false">
        <form class="form-horizontal form-bordered" method="POST" action="{{ url("/policia_registro_denuncia") }}" enctype="multipart/form-data">
        {!! csrf_field(); !!}
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header text-center">
					<h3 class="modal-title w-100 font-weight-bold">¿Es Policia?</h3>
				</div>
				<div class="modal-body mx-3">
                <select id="Respuestapolicia" name="Respuestapolicia" class="form-control selectpicker" data-live-search="true">
							<option value="0" selected disabled>Seleccione una opción</option>
							<option value="1">Sí</option>
							<option value="2">No</option>
						</select>
				</div>
                <div class="modal-body mx-3" id="modaldatospol" name="modaldatospol" style="display: none;">
                <div class="form-row col-lg-12">
                <div class="form-group col-md-12">
                    <div class="form-ic-cmp" >
                        <i class="fad fa-id-card"></i>&nbsp;
                        {!! Form::label('NombrePol', 'Nombre') !!}
                    </div>
                    {!! Form::text('NombrePol', '', ['class' => 'form-control', 'maxlength'=> '50','style' => 'background-color:rgba(230, 238, 250, 0.5);']) !!}
                               
                </div>
                </div>
                <div class="form-row col-lg-12">
                <div class="form-group col-md-6">
                    <div class="form-ic-cmp" >
                        <i class="fal fa-at"></i>&nbsp;
                        {!! Form::label('EmailPol', 'Correo') !!}
                    </div>
                    {!! Form::email('EmailPol', '', ['class' => 'form-control', 'maxlength'=> '50','style' => 'background-color:rgba(230, 238, 250, 0.5);']) !!}
                               
                </div>
                <div class="form-group col-md-6">
                    <div class="form-ic-cmp" >
                        <i class="fal fa-phone-alt"></i>&nbsp;
                        {!! Form::label('TelPol', 'Teléfono') !!}
                    </div>
                    {!! Form::number('TelPol', '', ['class' => 'form-control', 'maxlength'=> '10','style' => 'background-color:rgba(230, 238, 250, 0.5);']) !!}
                               
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
    <script src= "assetsWizard/js/scripts.js"></script>
    <script src= "lib/pnotify/pnotify.custom.min.js"></script>

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
            municipios_michoacan(16);
            /*municipios(16);*/
            entidad = $('#entidad').val();
            if(entidad != ''){
            municipios_residencia(entidad);
            }
            $("#entre_fechas").css("display","none");
            $("#fecha_exacta_div").css("display","none");
            pais = $('#pais').val();
            if(pais == 165){
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
                  $("#municipio").val(839);
                }
            }

        });


        //funcion para el domicilio
        $("#pais").on('change', function(){
        pais = $('#pais').val();
        if(pais == 165){
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
        }
        });
        //catalogos
        $("#entidad").on('change', function(e){
            entidad = $('#entidad').val();
            municipios(entidad);
        });
        $( "#municipio" ).change(function() {
    		  $("#ciudadId").val($("#municipio").val());
    		});

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
                $('#municipio').append('<option value="0">Seleccione una ciudad</option>');
                $.each(respuesta, function(index,dato){
                    $('#municipio').append('<option value="'+dato.ID+'">'+dato.DESCRIPCION+'</option>');
                });
                if($("#ciudadId").val()!='')
                {
                  $("#municipio").val(839);
                }
            });

        }
        function municipios_residencia(entidad){
            $.get('DenunciaDigital/municipios/'+entidad+"/catalogo", function(respuesta){
                $('#municipio').empty();
                $.each(respuesta, function(index,dato){
                    $('#municipio').append('<option value="'+dato.ID+'">'+dato.DESCRIPCION+'</option>');
                });
                if($("#ciudadId").val()!='')
                {
                  $("#municipio").val(839);
                }
            });

        }
        function municipios_michoacan(entidad){
            $.get('DenunciaDigital/municipios/'+entidad+"/catalogo", function(respuesta){
                $('#municipio_hechos').empty();
                $('#municipio_hechos').append('<option value="0">Seleccione una ciudad</option>');
                $.each(respuesta, function(index,dato){
                    $('#municipio_hechos').append('<option value="'+dato.ID+'">'+dato.DESCRIPCION+'</option>');
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

        $("#municipio_hechos").on('change', function(e){
            var municipio = $('#municipio_hechos').val();
            var calle = $('#calle_hechos').val();
            var numero_ext = $('#numext_hechos').val();
            var colonia_evento = $('#colonia_hechos').val();
            var entidad = $('#entidad_hechos option:selected').text();
            var municipio = $('#municipio_hechos option:selected').text();
            var ubicacion = (calle+' '+numero_ext+', '+colonia_evento+', '+municipio+', '+entidad+', Mexico');
            if(calle != '' && numero_ext != '' && colonia_evento != '' && entidad != '' && municipio !=''){
                geocodificacion_ubicacion(ubicacion);
                //alert(ubicacion);
            }
        });

        $('#calle_hechos').on('change', function() {
            var calle = $('#calle_hechos').val();
            var numero_ext = $('#numext_hechos').val();
            var colonia_evento = $('#colonia_hechos').val();
            var entidad = $('#entidad_hechos option:selected').text();
            var municipio = $('#municipio_hechos option:selected').text();
            var ubicacion = (calle+' '+numero_ext+', '+colonia_evento+', '+municipio+', '+entidad+', Mexico');
            if(calle != '' && numero_ext != '' && colonia_evento != '' && entidad != '' && municipio !=''){
                geocodificacion_ubicacion(ubicacion);
               //alert(ubicacion);
            }
        });

        $('#numext_hechos').on('change', function() {
            var calle = $('#calle_hechos').val();
            var numero_ext = $('#numext_hechos').val();
            var colonia_evento = $('#colonia_hechos').val();
            var entidad = $('#entidad_hechos option:selected').text();
            var municipio = $('#municipio_hechos option:selected').text();
            var ubicacion = (calle+' '+numero_ext+', '+colonia_evento+', '+municipio+', '+entidad+', Mexico');
            if(calle != '' && numero_ext != '' && colonia_evento != '' && entidad != '' && municipio !=''){
                geocodificacion_ubicacion(ubicacion);
                //alert(ubicacion);
            }
        });

        $('#colonia_hechos').on('change', function() {
            //alert('colonia');
            var calle = $('#calle_hechos').val();
            var numero_ext = $('#numext_hechos').val();
            var colonia_evento = $('#colonia_hechos').val();
            var entidad = $('#entidad_hechos option:selected').text();
            var municipio = $('#municipio_hechos option:selected').text();
            var ubicacion = (calle+' '+numero_ext+', '+colonia_evento+', '+municipio+', '+entidad+', Mexico');
            if(calle != '' && numero_ext != '' && colonia_evento != '' && entidad != '' && municipio !=''){
                geocodificacion_ubicacion(ubicacion);
               //alert(ubicacion);
            }
        });

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

        document.getElementById("file").onchange = function(e) {
            // Creamos el objeto de la clase FileReader
            let reader = new FileReader();

            // Leemos el archivo subido y se lo pasamos a nuestro fileReader
            reader.readAsDataURL(e.target.files[0]);

            // Le decimos que cuando este listo ejecute el código interno
            reader.onload = function(){
                let preview = document.getElementById('preview_imagen'),
                    image = document.createElement('img');

                image.src = reader.result;

                preview.innerHTML = '';
                preview.append(image);
            };
        }

        document.getElementById("file2").onchange = function(e) {
            // Creamos el objeto de la clase FileReader
            let reader = new FileReader();

            // Leemos el archivo subido y se lo pasamos a nuestro fileReader
            reader.readAsDataURL(e.target.files[0]);

            // Le decimos que cuando este listo ejecute el código interno
            reader.onload = function(){
                let preview = document.getElementById('preview_credencial'),
                    image = document.createElement('img');

                image.src = reader.result;

                preview.innerHTML = '';
                preview.append(image);
            };
        }

        document.getElementById("audio").onchange = function(e) {

            if($("#audio").val() == ''){
                $("#preview_audio").css("display","none");
            }else{
                $("#preview_audio").css("display","flex");
            }


        }

        document.getElementById("video").onchange = function(e) {

            if($("#video").val() == ''){
                $("#preview_video").css("display","none");
            }else{
                $("#preview_video").css("display","flex");
            }
        }

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
    <script src= "{{ asset('js/testigos.js') }}"></script>
    {{-- <script src="{{ asset('plugins/sweetalert2/sweetalert2.all.min.js') }}"></script> --}}
@endsection

<div class="seccion text-center mb-3">
    <div class="circle-title">
        <div class="circle-number ">1</div>
    </div>
    <h1>
        DATOS GENERALES DEL DENUNCIANTE:
    </h1>
</div>


@php
use Carbon\Carbon;
$Colonia = $denunciante->address()->first()->colony()->first()->nombre_asentamiento;
$Calle = $denunciante->address()->first()->calle;
$NumExt = $denunciante->address()->first()->numero_exterior;
$NumInt = $denunciante->address()->first()->numero_interior;
$CodigoPostal = $denunciante->address()->first()->codigo_postal;
$Entidad = $denunciante->address()->first()->colony()->first()->municipio()->first()->estado()->first()->nombre_estado;
$Municipio = $denunciante->address()->first()->colony()->first()->municipio()->first()->nombre_municipio;
$Nacionalidad = null;
if(!empty($denunciante->id_nacionalidad))
    $Nacionalidad = $denunciante->first()->country()->first()->nacionalidad;

if($denunciante->id_nacionalidad == 118){
    $busquedaCurp = true;
}else{
    $busquedaCurp = false;
}



@endphp

<div class="container">
    <!-- curp api -->
    <div class="form-row col-lg-12 align-items-end justify-content-start">
        <div class="form-group col-md-4">
            <div class="form-ic-cmp">
                <i class="fad fa-id-card"></i>&nbsp;
                <label for="nacionalidad_denunciante">Nacionalidad</label>
                <label for="nacionalidad_denunciante" style="font-size: 7px;" class="text-danger">Requerido</label>
            </div>
            <select name="nacionalidad_denunciante" id="nacionalidad_denunciante" onchange="validarNacionalidad(this,'denunciante')"
                class=" form-control " data-curp="divCurp_denunciante"  @if ($busquedaCurp)  {{'disabled'}} @endif>
                <option value="0">Seleccione la nacionalidad</option>
                @foreach ($countries as $country)

                <option @if ($country->id == $denunciante->id_nacionalidad)
                    {{'selected'}}
                    @endif value="{{$country->id}}">{{$country->nacionalidad}}</option>
                @endforeach
            </select>
            <div style="color:#FF0000;">
                {{ $errors->first('nacionalidad') }}
            </div>
        </div>

        <div class="form-group col-md-4 " id="divCurp_denunciante">
            <div class="form-ic-cmp">
                <i class="fad fa-id-card"></i>&nbsp;
                <label for="curp">CURP</label>
                <label for="nombre" style="font-size: 7px;" class="text-danger">Requerido</label>
            </div>
            <input type="text" name="curp_denunciante" id="curp_denunciante" class=" form-control  @if (!$busquedaCurp)  {{'d-none'}} @endif"
                value="{{$denunciante->curp}}" maxlength="18" placeholder="CURP"  @if ($busquedaCurp)  {{'readonly'}} @endif>
            <div style="color:#FF0000;">
                {{ $errors->first('curp') }}
            </div>
        </div>

        <div class="form-group col-md-4">
            <button class="btn-sm btn-search btn-buscar-curp d-none" onclick="consultarCurp(this,'denunciante')"
                id="btnConsultarCurp_denunciante"> BUSCAR</button>
            <button type="button" class="btn-sm btn-search  @if (!$busquedaCurp)  {{'d-none'}} @endif" data-destino="denunciante" onclick="consultarOtraCurp(this)"
                        style="background: #002b49;" id="btn-consultar-otra-curp-denunciante"> CAMBIAR DATOS DEL DENUNCIANTE</button>
            <img src="{{asset("img/denuncia/loading.gif")}}" class="img-responsive d-none" width="10%"
                id="imgLoading_denunciante">
        </div>

    </div>

</div>

<div id="DatosGenerales_denunciante" class="d-non">
    <input class="d-none" type="hidden" value="{{$denunciante->id}}" />
    <div class="container">
        <div class="form-row col-lg-12">
            <div class="form-group col-md-4">
                <div class="form-ic-cmp">
                    <i class="fad fa-id-card"></i>&nbsp;
                    <label for="nombre">Nombre (s)</label>
                    <label for="nombre" style="font-size: 7px;" class="text-danger">Requerido</label>
                </div>
                <input type="text" name="nombre_denunciante" id="Nombre_denunciante" class=" form-control required"
                    value="{{$denunciante->nombre}}" data-message-error='"NOMBRE" es requerido.' required
                    maxlength="50"  placeholder="Nombre"
                    @if ($busquedaCurp){{'readonly'}}  @endif>
                <div style="color:#FF0000;">
                    {{ $errors->first('nombre') }}
                </div>
            </div>
            <div class="form-group col-md-4">
                <div class="form-ic-cmp">
                    <i class="fad fa-id-card"></i>&nbsp;
                    <label for="PrimerApellido">Primer Apellido</label>
                    <label for="nombre" style="font-size: 7px;" class="text-danger">Requerido</label>
                </div>
                <input type="text" name="PrimerApellido_denunciante" id="PrimerApellido_denunciante"
                    class=" form-control required" data-message-error='"PRIMER APELLIDO" es requerido.'
                    value="{{$denunciante->primer_apellido}}" maxlength="50"
                    placeholder="Primer apellido"  @if ($busquedaCurp)  {{'readonly'}} @endif>
                <div style="color:#FF0000;">
                    {{ $errors->first('PrimerApellido') }}
                </div>
            </div>
            <div class="form-group col-md-4">
                <div class="form-ic-cmp">
                    <i class="fad fa-id-card"></i>&nbsp;
                    <label for="SegundoApellido">Segundo Apellido</label>
                </div>
                <input type="text" name="SegundoApellido_denunciante" id="SegundoApellido_denunciante"
                    class=" form-control " value="{{$denunciante->segundo_apellido}}" maxlength="50"
                    placeholder="Segundo apellido"  @if ($busquedaCurp)  {{'readonly'}} @endif>
                <div style="color:#FF0000;">
                    {{ $errors->first('SegundoApellido') }}
                </div>
            </div>
        </div>

        <div class="form-row col-lg-12">
            <div class="form-group col-md-4">
                <div class="form-ic-cmp">
                    <i class="fal fa-calendar"></i>&nbsp;
                    <label for="fnacimiento">Fecha de Nacimiento</label>
                    <label for="nombre" style="font-size: 7px;" class="text-danger">Requerido</label>

                </div>

                @php
                    $fechaNac_denunciante = new DateTime($denunciante->fecha_nacimiento);
                    $fechaNacimiento_denunciante = $fechaNac_denunciante->format('Y-m-d');
                @endphp
                <input type="date" name="fnacimiento_denunciante" id="fnacimiento_denunciante"
                    class=" form-control required " data-message-error='"FECHA DE NACIMIENTO" es requerido.'
                    value="{{$fechaNacimiento_denunciante}}"  @if ($busquedaCurp)  {{'readonly'}} @endif>
                <div style="color:#FF0000;">
                    {{ $errors->first('fnacimiento') }}
                </div>
            </div>
            {{-- <div class="form-group col-md-4">
                <div class="form-ic-cmp">
                    <i class="fal fa-at"></i>&nbsp;
                    <label for="correo">CORREO ELECTRÓNICO</label>

                    <i class="fad fa-question-circle" data-toggle="tooltip" data-placement="top"
                        title="Capture un correo electrónico vigente, a esta cuenta llegará su acceso para realizar el seguimiento puntual a su denuncia"></i>&nbsp;
                    <label for="nombre" style="font-size: 7px;" class="text-danger">Requerido</label>


                </div>
                <input type="email" name="correo" id="correo" class=" form-control required "
                    value="{{ old('correo') }}" data-message-error='"CORREO ELECTRÓNICO" es requerido.'
                    maxlength="50" placeholder="correo@dominio.com">
                <div style="color:#FF0000;">
                    {{ $errors->first('correo') }}
                </div>
            </div> --}}
            <div class="form-group col-md-4">
                <div class="form-ic-cmp">
                    <i class="fal fa-phone-alt"></i>&nbsp;
                    <label for="telefono">Teléfono (Whatsapp)</label>
                    <label for="nombre" style="font-size: 7px;" class="text-danger">Requerido</label>
                    <i class="fad fa-question-circle" data-toggle="tooltip" data-placement="top"
                        title="Capture un número celular que permita contactarlo vía WhatsApp"></i>&nbsp;
                </div>
                <input type="text" name="telefono" class=" form-control required" value="{{$denunciante->telefono }}"
                    data-message-error='"TELÉFONO (WHATSAPP)" es requerido.' maxlength="10"
                    onkeypress="return justNumbers(event);" placeholder="1234567890">
                <div style="color:#FF0000;">
                    {{ $errors->first('telefono') }}
                </div>
            </div>
        </div>

        <div class="form-row col-lg-12 justify-content-center">

            <div class="form-group col-md-8">
                <div class="form-ic-cmp">
                    <i class="fal fa-file"></i>&nbsp;
                    <label for="credencial">Identificación oficial (INE o Pasaporte) *<font style="font-size: 8px">
                            Formato aceptado: .jpg/.jpeg/.png </font>*<font style="font-size: 8px">Tamaño máximo: 3mb
                        </font></label>
                    <label for="credencial" style="font-size: 7px;" class="text-danger">Requerido</label>

                </div>
                {{-- <input type="file" name="credencial" class="file_multi_image required credencial" id="credencial"
                    accept="image/*" required> --}}
                 @php
                    $url = $denunciante->url_identificacion;
                    $file = Storage::disk('buffalo')->get($url);
                    $mimetype = Storage::disk('buffalo')->mimeType($url);
                    $data = 'data:' . $mimetype . ';base64,' . base64_encode($file) . '';
                @endphp
                <div class="input-group mb-3" role='button'>
                    <div class="input-group-prepend"> </div>
                    <div class="custom-file">
                        <input style="cursor:pointer;" type="file" class="custom-file-input " id="credencial"
                            name="credencial" data-message-error='"IDENTIFICACIÓN OFICIAL" es requerido.'>
                        <label class="custom-file-label" id="custom-file-label-credencial" for="inputGroupFile01">Buscar
                            Archivo</label>  
                    </div>
                </div>
            </div>
            <div class="form-group col-md-4 text-center">
                <div id="preview_credencial">
                <img src="{{ $data }}"style="max-width: 150px;" alt="">
                </div>
            </div>
        </div>


        <div class="card alert alert-warning w-100">

            <div class="card-body pb-0">
                <div class="form-row col-lg-12 mb-0">
                    <div class="form-group col-md-8">
                        <div class="form-ic-cmp">
                            <i class="fal fa-at"></i>&nbsp;
                            <label for="correo">CORREO ELECTRÓNICO</label>

                            <label for="nombre" style="font-size: 7px;" class="text-danger">Requerido</label>

                        </div>
                        <input type="email" name="correo" id="correo" class=" form-control required "
                            value="{{$denunciante->email}}" data-message-error='"CORREO ELECTRÓNICO" es requerido.'
                            maxlength="50" placeholder="correo@dominio.com">
                        <div style="color:#FF0000;">
                            {{ $errors->first('correo') }}
                        </div>
                    </div>
                </div>
                
              
            </div>
            <div class="card-footer">
                <h6 class="h6" for="correo">Por favor, ingrese un correo electrónico vigente. A dicha cuenta se le enviará la información de acceso para el seguimiento puntual de su denuncia</h6>
                <input name="correo_guardado" type="hidden" class="d-none" value="{{$denunciante->email}}">
              </div>
        </div>

    {{-- </div> --}}
</div>

<div class="seccion text-center mt-4 mb-3">
    <div class="circle-title">
        <div class="circle-number ">2</div>
    </div>
    <h1>DOMICILIO DEL DENUNCIANTE:</h1>
</div>

<div class="container">
    <div class="form-row col-lg-12">
        <div class="form-group col-md-4">
            <div class="form-ic-cmp">
                <i class="fal fa-globe-americas"></i>&nbsp;
                <label for="pais">País de residencia</label>
                <label for="nombre" style="font-size: 7px;" class="text-danger">Requerido</label>

            </div>
            <select name="pais" id="pais" class=" form-control required">
                <option value="0">Seleccione un país</option>
                @foreach ($countries as $country)

                <option @if ($country->id == $domicilio_denunciante->id_pais)
                    {{'selected'}}
                    @endif value="{{$country->id}}">{{$country->pais}}</option>
                @endforeach
            </select>
            <div style="color:#FF0000;">
                {{ $errors->first('pais') }}
            </div>
        </div>
       
        <div class="form-group col-md-8" id="extranjero">
            <div class="form-ic-cmp">
                <i class="fal fa-home"></i>&nbsp;
                <label for="domicilio_extranjero">Domicilio</label>
                <label for="nombre" style="font-size: 7px;" class="text-danger">Requerido</label>

            </div>
            <input type="text" name="domicilio_extranjero" id="domicilio_extranjero" class=" form-control "
                value=" @if ($denunciante->address()->first()->id_pais =! 118)  {{$domicilio_denunciante->otro_domicilio}}   @endif" maxlength="250" placeholder="Ciudad Extrajera">
            <div style="color:#FF0000;">
                {{ $errors->first('domicilio_extranjero') }}
            </div>
        </div>
    </div>
    <div id="mexico">
        <div class="form-row col-lg-12">
            <div class="form-group col-md-4">
                <div class="form-ic-cmp">
                    <i class="fal fa-envelope"></i>&nbsp;
                    <label for="CP">Código Postal</label>
                    <label for="nombre" style="font-size: 7px;" class="text-danger">Requerido</label>

                </div>
                <input class=" form-control required" maxlength="5" onkeypress="return justNumbers(event);"
                    data-message-error='"CÓDIGO POSTAL" es requerido.' name="CP" type="text" id="CP"
                    placeholder="Ingrese CP" maxlength="5" value="{{$domicilio_denunciante->codigo_postal}}"
                    onblur="validarCP(this,'entidad_residencia','municipio_residencia','asentamiento_residencia')">

                <div style="color:#FF0000;">

                </div>
            </div>
            <div class="form-group col-md-4">
                <div class="form-ic-cmp">
                    <i class="fal fa-map"></i>&nbsp;
                    <label for="entidad">Estado de residencia</label>
                </div>
                <select class=" form-control " value="{{(old('entidad'))}}" id="entidad_residencia"
                    name="entidad_residencia" disabled>
                    <option value="0">{{$Entidad}}</option>
                </select>
                <div style="color:#FF0000;">

                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12" style="display: none">
                <input class=" form-control " id="municipio" name="municipio" type="text" value="">
            </div>

            <input class=" form-control " id="ciudadId" value="" name="ciudadId" type="hidden">

            <div class="form-group col-md-4">
                <div class="form-ic-cmp">
                    <i class="fad fa-map-marker-alt"></i>&nbsp;
                    <label for="municipio">Municipio</label>
                </div>
                <select class=" form-control " value="<?php echo e(old('municipio')); ?>" id="municipio_residencia"
                    name="municipio_residencia" disabled>
                    <option value="0">{{$Municipio}}</option>
                    {{-- @foreach ($municipios as $country)

                    <option @if ($country->id == 118)
                        {{'selected'}}
                        @endif value="{{$country->id}}">{{$country->pais}}</option>
                    @endforeach --}}
                </select>
                <div style="color:#FF0000;">

                </div>
            </div>



        </div>
      
        <div class="form-row col-lg-12">
            <div class="form-group col-md-4">
                <div class="form-ic-cmp">
                    <i class="fal fa-map-pin"></i>&nbsp;
                    <label for="colonia">Colonia</label>
                    <label for="colonia" style="font-size: 7px;" class="text-danger">Requerido</label>

                </div>
                <select class=" form-control required" value="<?php echo e(old('municipio')); ?>"
                    data-message-error='"COLONIA" es requerido.' name="asentamiento_residencia"
                    id="asentamiento_residencia">
                    <option value="0">Seleccione una colonia</option>
                    @foreach ($colonies as $colony)
                        <option @if ($colony->id == $denunciante->address()->first()->id_asentamiento)
                            {{'selected'}}
                        @endif value="{{$colony->id}}">{{$colony->nombre_asentamiento}}</option>
                    @endforeach
                </select>
                {{-- <input class=" form-control " maxlength="250" value="" name="colonia" type="text" id="colonia">
                --}}
                <div style="color:#FF0000;">

                </div>
            </div>
            <div class="form-group col-md-4">
                <div class="form-ic-cmp">
                    <i class="fas fa-map-signs"></i>&nbsp;
                    <label for="calle">Calle</label>
                    <label for="calle" style="font-size: 7px;" class="text-danger">Requerido</label>

                </div>
                <input class=" form-control required " value="{{$denunciante->address()->first()->calle}}" maxlength="250"
                    data-message-error='"CALLE" es requerido.' name="calle" type="text" id="calle"
                    placeholder="Ingrese la calle">
                <div style="color:#FF0000;">

                </div>
            </div>
            <div class="form-group col-md-2">
                <div class="form-ic-cmp">
                    <i class="fal fa-hashtag"></i>&nbsp;
                    <label for="numext">No. Exterior <span style="font-size: 7px;" class="text-danger">Requerido</span></label>
                </div>
                <input class=" form-control required" value="{{$denunciante->address()->first()->numero_exterior}}" maxlength="6"
                    data-message-error='"NÚMERO EXTERIOR" es requerido.' name="numext" type="text" id="numext"
                    placeholder="Número exterior">
                <div style="color:#FF0000;">

                </div>
            </div>
            <div class="form-group col-md-2">
                <div class="form-ic-cmp">
                    <i class="fal fa-hashtag"></i>&nbsp;
                    <label for="numint">No. Interior</label>
                </div>
                <input class=" form-control " placeholder="Opcional" value="{{$denunciante->address()->first()->numero_interior}}" maxlength="6" name="numint" type="text"
                    id="numint">
                <div style="color:#FF0000;">

                </div>
            </div>

        </div>
    </div>
</div>

<div class="text-center mt-3 {{-- f1-buttons --}} f1">
    <button type="button" id="btn-step-one" class="btn-sm btn-next">
        SIGUIENTE &nbsp;&nbsp; <i class="fa-solid fa-chevron-right"></i>
    </button>
</div>


</div>

<script type="text/javascript">
    window.__be = window.__be || {};
    window.__be.id = "5ff72f137ad4d00007db3b16";
    (function() {
        var be = document.createElement('script'); be.type = 'text/javascript'; be.async = true;
        be.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'cdn.chatbot.com/widget/plugin.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(be, s);
    })();

    function validarNacionalidad(select,destino){
        var valor = $(select).val();
        var divcurp = $(select).data("curp");

        if(valor == 118){
            $("#"+divcurp).removeClass("d-none");
            if(divcurp == "divCurp_victima"){
                $("#DatosGenerales_victima").addClass("d-none");
                $("#btnConsultarCurp_victima").removeClass("d-none");
                $('#btnConsultarCurp_victima').attr("disabled",false);
            }
           
            $("#DatosGenerales_"+destino).addClass("d-none");
            $("#btnConsultarCurp_"+destino).removeClass("d-none");
            $('#btnConsultarCurp_'+destino).attr("disabled",false);
            

            $('btnConsultarCurp_'+destino).text('BUSCAR');

            // $('#Nombre_victima').removeClass('required')
            // $('#PrimerApellido_victima').removeClass('required')
            // $('#fnacimiento_victima').removeClass('required')
        }else{
            $("#"+divcurp).addClass("d-none");
            if(divcurp == "divCurp_victima"){
                $("#btnConsultarCurp_victima").addClass("d-none");
                $('#btnConsultarCurp_victima').attr("disabled",true);

                $("#DatosGenerales_victima").removeClass("d-none");
            }
           
            $("#btnConsultarCurp_"+destino).addClass("d-none");
            $('#btnConsultarCurp_'+destino).attr("disabled",true);

            $("#DatosGenerales_"+destino).removeClass("d-none");
        

            $('#Nombre_'+destino).addClass('required')
            $('#PrimerApellido_'+destino).addClass('required')
            $('#fnacimiento_'+destino).addClass('required')

            $('btnConsultarCurp_'+destino).html('SIGUIENTE &nbsp;&nbsp; <i class="fa-solid fa-chevron-right"></i>');
        }
    }

    function consultarCurp(botton,destino){

        var nacionalidad = $("#nacionalidad_"+destino).val();
        var curp = $("#curp_"+destino).val();


        if(nacionalidad == "0" && destino == "denunciante"){
            Swal.fire({
                title: "¡Cuidado!",
                text: "Selecciona la nacionalidad para poder continuar",
                icon: "warning"
            });
        }else if( nacionalidad == "118" && curp == "" && destino == "denunciante"){
            Swal.fire({
                title: "¡Cuidado!",
                text: "Ingresa la CURP del denunciante para poder continuar",
                icon: "warning"
            });
        }else if(destino == "victima" && curp == ""){
            Swal.fire({
                title: "¡Cuidado!",
                text: "Ingresa la CURP de la víctima para poder continuar",
                icon: "warning"
            });
        }else{
            // $('#btnConsultarCurp').prop('disabled', true);
            $('#btnConsultarCurp_'+destino).addClass("d-none");
            $('#btnConsultarCurp_'+destino).attr("disabled",true);
            $('#imgLoading_'+destino).removeClass("d-none");

            $('#nacionalidad_'+destino).attr('disabled',true);
            $('#curp_'+destino).attr('readonly',true);
            if(nacionalidad == "118"){
                if(validarCURP(curp)){
                    RenapoCURP(curp,destino);

                }else{
                    Swal.fire({
                        title: "¡CURP inválida!",
                        text: "Revisa que hayas ingresado la CURP correctamente",
                        icon: "warning"
                    });
                    // $('#btnConsultarCurp').remove();;
                    $('#imgLoading_'+destino).addClass("d-none");
                    $('#btnConsultarCurp_'+destino).removeClass("d-none");
                    $('#btnConsultarCurp_'+destino).attr("disabled",true);

                    $('#nacionalidad_'+destino).attr('disabled',false);
                    $('#curp_'+destino).attr('readonly',false);
                }
            }else{
                $("#DatosGenerales_"+destino).removeClass("d-none");
                $('#imgLoading_'+destino).addClass("d-none");
                $('#nacionalidad_'+destino).attr('disabled',false);

            }
        }
    }



    function RenapoCURP(curp,destino){


        $.ajax(
            {
                method: 'GET',
                url: '{{config("app.url")}}/get-curp/' + curp,
            }
        ).done( function( res ) {
            // alert(res);
            console.log( res );


            if ( res.statusOper === "EXITOSO" ) {

                // $('#btnConsultarCurp').prop('disabled', true);

                Swal.fire({
                    // imageUrl: "{{ asset('img/renapo.png') }}",
                    icon: 'success',
                    imageWidth: 200,
                    html: '<b>CURP encontrada en el Registro Nacional de Población</b>',
                    confirmButtonText: 'CONTINUAR',
                    // confirmButtonColor: '#152F4A',
                    customClass: {
                        confirmButton: 'swal2-deny' // Clase CSS personalizada para el botón "Confirm" de la segunda ventana
                    },
                    width: 450,
                });
                $('#imgLoading_'+destino).addClass("d-none");

               // input-hidden
                $('#curp_'+destino).val( curp );
                $('#Nombre_'+destino).val( res.nombres );
                $('#PrimerApellido_'+destino).val( res.apellido1);
                $('#SegundoApellido_'+destino).val( res.apellido2 );
                $('#fnacimiento_'+destino).val( res.fechaNacF ).trigger('change');


                $('#Nombre_'+destino).attr('readonly',true);
                $('#PrimerApellido_'+destino).attr('readonly',true);
                $('#SegundoApellido_'+destino).attr('readonly',true);
                $('#fnacimiento_'+destino).attr('readonly',true);


                $("#DatosGenerales_"+destino).removeClass("d-none");


                $('#btn-consultar-otra-curp-'+destino).removeClass('d-none');

            }else{
                Swal.fire({
                    imageUrl: "{{ asset('img/renapo.png') }}",
                    imageWidth: 200,
                    html: 'La CURP no fue encontrada en el Registro Nacional De Población. Revisa tu CURP en: ' + '<br>' + '<strong>' + '<br>' + '<a style="text-decoration: underline;" href="https://www.gob.mx/curp/" target="_blank">https://www.gob.mx/curp/</a> ' +'' + '</strong>',
                    confirmButtonText: 'Enterado',
                    confirmButtonColor: '#152F4A',
                    width: 450,
                });
                $('#btnConsultarCurp_'+destino).removeClass("d-none");
                $('#btnConsultarCurp_'+destino).attr("disabled",false);

                $('#imgLoading_'+destino).addClass("d-none");
                $('#nacionalidad_'+destino).attr('disabled',false);
                $('#curp_'+destino).attr('readonly',false);

            }

        });

    }

    function validarCURP(curp) {
    // Expresión regular para validar el formato de CURP
    var regexCURP = /^[A-Za-z]{4}\d{6}[A-Za-z]{6}[A-Za-z\d]\d$/;

    if (!regexCURP.test(curp)) {
        // Si el formato no coincide, retorna falso
        return false;
    }

    // Se obtienen los valores de la CURP
    var primerLetra = curp.charAt(0);
    var segundaLetra = curp.charAt(1);
    var fechaNacimiento = curp.substr(4, 6);
    var sexo = curp.charAt(10);
    var estado = curp.substr(11, 2);

    // Validación de la fecha de nacimiento
    var anio = fechaNacimiento.substr(0, 2);
    var mes = fechaNacimiento.substr(2, 2);
    var dia = fechaNacimiento.substr(4, 2);

    // Se obtiene el código del estado de la CURP
    var estadosCURP = "ASBCDFGHLKMNPQRSTVWXYZ";
    var codigoEstado = estadosCURP.indexOf(estado.charAt(0)) + 1;

    // Verificar que la fecha de nacimiento sea válida
    if (anio < 0 || anio > 99 || mes < 1 || mes > 12 || dia < 1 || dia > 31) {
        return false;
    }

    // Verificar que el código del estado sea válido
    if (codigoEstado < 1 || codigoEstado > 32) {
        return false;
    }

    // Verificar que el sexo sea válido
    if (sexo !== 'H' && sexo !== 'M') {
        return false;
    }

    // Si todas las validaciones pasan, retorna verdadero
    return true;
}

function validarCP(input,select_estado,select_municipio,select_asentamiento){
    var valor = $(input).val();
    var longitud = valor.length ;
    if(longitud < 5){
        $('#'+select_asentamiento).empty();
        $('#'+select_estado).empty();
        $('#'+select_municipio).empty();
        $('#'+select_estado).append('<option>Estado</option>');
        $('#'+select_municipio).append('<option>Municipio</option>');
        $('#'+select_asentamiento).append('<option value="0">Seleccione una colonia</option>');
    }else if(longitud == 5){
        console.log('colonias');
        $.ajax(
            {
                method: 'GET',
                url: '{{config("app.url")}}/getColonias/' + valor,
            }
        ).done( function( res ) {
            // alert(res);
            console.log( res );
            let count = res.colonias.length;
            if(count > 0){

                $('#'+select_asentamiento).empty();
                $('#'+select_estado).empty();
                $('#'+select_municipio).empty();
                $('#'+select_asentamiento).append('<option value="0">Seleccione una colonia</option>');
                $.each(res.colonias, function(index,dato){
                    $('#'+select_asentamiento).append('<option value="'+dato.id+'">'+dato.nombre_asentamiento+'</option>');
                });
                $('#'+select_municipio).append('<option value="'+res.municipio+'">'+res.municipio+'</option>');
                $('#'+select_estado).append('<option value="'+res.estado+'">'+res.estado+'</option>');
            }else{
                $('#'+select_asentamiento).empty();
                $('#'+select_estado).empty();
                $('#'+select_municipio).empty();
                $('#'+select_estado).append('<option>Estado</option>');
                $('#'+select_municipio).append('<option>Municipio</option>');
                $('#'+select_asentamiento).append('<option value="0">Seleccione una colonia</option>');
                Swal.fire({
                    icon: 'warning',
                    title: '¡Código postal no válido!',
                    text: 'Ingrese un código postal correcto para continuar con el proceso.',
                    confirmButtonText: 'Aceptar',
                    confirmButtonColor: '#152F4A',
                });
            }
        });
    }else{
        Swal.fire({
            icon: 'warning',
            title: '¡Código postal no válido!',
            text: 'Ingrese un código postal correcto para continuar con el proceso.',
            confirmButtonText: 'Aceptar',
            confirmButtonColor: '#152F4A',
        });
    }

}


const consultarOtraCurp = (boton) => {
        var destino = $(boton).data("destino");
      
        $('#nacionalidad_'+destino).prop('disabled', false);
        $('#nacionalidad_'+destino).prop('disabled', false);
        $('#curp_'+destino).prop('readonly', false);

        $('#btn-consultar-otra-curp-'+destino).addClass('d-none');
        $('#DatosGenerales_'+destino).addClass('d-none');

        $('#btnConsultarCurp_'+destino).removeClass('d-none');
        $('#btnConsultarCurp_'+destino).prop('disabled', false);

        $('#Nombre_'+destino).val('');
        $('#Nombre_'+destino).prop('readonly', false);

        $('#PrimerApellido_'+destino).val('');
        $('#PrimerApellido_'+destino).prop('readonly', false);

        $('#SegundoApellido_'+destino).val('');
        $('#SegundoApellido_'+destino).prop('readonly', false);

        $('#fnacimiento_'+destino).val('');
        $('#fnacimiento_'+destino).prop('readonly', false);

        $('input[name="mayor_edad_'+destino+'"]').prop('checked', false);
    }



</script>
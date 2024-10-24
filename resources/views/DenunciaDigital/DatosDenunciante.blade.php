

<h1>Datos Generales del Denunciante:</h1>

<div class="form-row col-lg-12 align-items-end justify-content-start">
    <div class="form-group col-md-4">
        <div class="form-ic-cmp">
            <i class="fad fa-id-card"></i>&nbsp;
            <label for="nacionalidad">Nacionalidad</label>
            <label for="nacionalidad" style="font-size: 7px;">Requerido</label>
        </div>
        <select name="nacionalidad" id="nacionalidad" onchange="validarNacionalidad(this)" class=" form-control "
            style="background-color:rgba(230, 238, 250, 0.5);">
            <option value="0">Seleccione la nacionalidad</option>
            @foreach ($countries as $country)

            <option @if ($country->id == 118)
                {{'selected'}}
                @endif value="{{$country->id}}">{{$country->nacionalidad}}</option>
            @endforeach
        </select>
        <div style="color:#FF0000;">
            {{ $errors->first('nacionalidad') }}
        </div>
    </div>

    <div class="form-group col-md-4 " id="divCurp">
        <div class="form-ic-cmp">
            <i class="fad fa-id-card"></i>&nbsp;
            <label for="curp">CURP</label>
            <label for="nombre" style="font-size: 7px;">Requerido</label>
        </div>
        <input type="text" name="curp" id="curp" class=" form-control " value="{{ old('curp') }}AOAA960320HMNLCL04"
            maxlength="18" placeholder="CURP" style="background-color:rgba(230, 238, 250, 0.5);">
        <div style="color:#FF0000;">
            {{ $errors->first('curp') }}
        </div>
    </div>

    <div class="form-group col-md-2">
        <button class="btn btn-sm align-bottom" onclick="consultarCurp(this)" style="background: #002b49;"
            id="btnConsultarCurp"> Siguiente</button>
        <img src="{{asset("img/denuncia/loading.gif")}}" class="img-responsive d-none" width="30%" id="imgLoading">
    </div>

</div>



<div id="DatosGenerales" class="d-none">

    <div class="form-row col-lg-12">
        <div class="form-group col-md-4">
            <div class="form-ic-cmp">
                <i class="fad fa-id-card"></i>&nbsp;
                <label for="nombre">Nombre (s)</label>
                <label for="nombre" style="font-size: 7px;">Requerido</label>
            </div>
            <input type="text" name="nombre" id="Nombre" class=" form-control required" value="{{ old('nombre') }}"
                required maxlength="50" style="background-color:rgba(230, 238, 250, 0.5);" placeholder="Nombre">
            <div style="color:#FF0000;">
                {{ $errors->first('nombre') }}
            </div>
        </div>
        <div class="form-group col-md-4">
            <div class="form-ic-cmp">
                <i class="fad fa-id-card"></i>&nbsp;
                <label for="PrimerApellido">Primer Apellido</label>
                <label for="nombre" style="font-size: 7px;">Requerido</label>
            </div>
            <input type="text" name="PrimerApellido" id="PrimerApellido" class=" form-control required "
                value="{{ old('PrimerApellido') }}" maxlength="50" style="background-color:rgba(230, 238, 250, 0.5);"
                placeholder="Primer apellido">
            <div style="color:#FF0000;">
                {{ $errors->first('PrimerApellido') }}
            </div>
        </div>
        <div class="form-group col-md-4">
            <div class="form-ic-cmp">
                <i class="fad fa-id-card"></i>&nbsp;
                <label for="SegundoApellido">Segundo Apellido</label>
            </div>
            <input type="text" name="SegundoApellido" id="SegundoApellido" class=" form-control "
                value="{{ old('SegundoApellido') }}" maxlength="50" style="background-color:rgba(230, 238, 250, 0.5);"
                placeholder="Segundo apellido">
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
            <label for="nombre" style="font-size: 7px;">Requerido</label>

            </div>
            <input type="date" name="fnacimiento" id="fnacimiento" class=" form-control required "
                value="{{ old('fnacimiento') }}" style="background-color:rgba(230, 238, 250, 0.5);">
            <div style="color:#FF0000;">
                {{ $errors->first('fnacimiento') }}
            </div>
        </div>
        <div class="form-group col-md-4">
            <div class="form-ic-cmp">
                <i class="fal fa-at"></i>&nbsp;
                <label for="correo">Correo</label>
                
                <i class="fad fa-question-circle" data-toggle="tooltip" data-placement="top"
                    title="Capture un correo electrónico vigente, a esta cuenta llegará su acceso para poder realizar el seguimiento puntual a su denuncia"></i>&nbsp;
            <label for="nombre" style="font-size: 7px;">Requerido</label>

                    
            </div>
            <input type="email" name="correo" id="correo" class=" form-control required " value="{{ old('correo') }}"
                maxlength="50" placeholder="correo@dominio.com" style="background-color:rgba(230, 238, 250, 0.5);">
            <div style="color:#FF0000;">
                {{ $errors->first('correo') }}
            </div>
        </div>
        <div class="form-group col-md-4">
            <div class="form-ic-cmp">
                <i class="fal fa-phone-alt"></i>&nbsp;
                <label for="telefono">Teléfono (Whatsapp)</label>
                <label for="nombre" style="font-size: 7px;">Requerido</label>
                <i class="fad fa-question-circle" data-toggle="tooltip" data-placement="top"
                    title="Capture un número celular que permita contactarlo vía WhatsApp"></i>&nbsp;
            </div>
            <input type="text" name="telefono" class=" form-control required" value="{{ old('telefono') }}"
                maxlength="10" onkeypress="return justNumbers(event);" placeholder="1234567890"
                style="background-color:rgba(230, 238, 250, 0.5);">
            <div style="color:#FF0000;">
                {{ $errors->first('telefono') }}
            </div>
        </div>
    </div>
    <div class="form-row col-lg-12">
        <h1>Domicilio del Denunciante:</h1>
    </div>

    <div class="form-row col-lg-12">
        <div class="form-group col-md-4">
            <div class="form-ic-cmp">
                <i class="fal fa-globe-americas"></i>&nbsp;
                <label for="pais">País de residencia</label>
            <label for="nombre" style="font-size: 7px;">Requerido</label>

            </div>
            <select name="pais" id="pais" class=" form-control required"
                style="background-color:rgba(230, 238, 250, 0.5);">
                <option value="0">Seleccione un país</option>
                @foreach ($countries as $country)

                <option @if ($country->id == 118)
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
                <label for="nombre" style="font-size: 7px;">Requerido</label>

            </div>
            <input type="text" name="domicilio_extranjero" id="domicilio_extranjero" class=" form-control "
                value="{{ old('domicilio_extranjero') }}" maxlength="250" placeholder="Ciudad Extrajera"
                style="background-color:rgba(230, 238, 250, 0.5);">
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
                    <label for="nombre" style="font-size: 7px;">Requerido</label>

                </div>
                <input class=" form-control required" value="" maxlength="5" onkeypress="return justNumbers(event);"
                    style="background-color:rgba(230, 238, 250, 0.5);" name="CP" type="text" id="CP"
                    placeholder="Ingrese CP" maxlength="5" onblur="validarCP(this,'entidad_residencia','municipio_residencia','asentamiento_residencia')">

                <div style="color:#FF0000;">

                </div>
            </div>
            <div class="form-group col-md-4">
                <div class="form-ic-cmp">
                    <i class="fal fa-map"></i>&nbsp;
                    <label for="entidad">Estado de residencia</label>
                </div>
                <select class=" form-control " value="{{(old('entidad'))}}"
                    style="background-color:rgba(230, 238, 250, 0.5);" id="entidad_residencia" name="entidad_residencia"
                    disabled>
                    <option value="0">Estado</option>
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
                    style="background-color:rgba(230, 238, 250, 0.5);" name="municipio_residencia" disabled>
                    <option value="0">Municipio</option>
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
                    <label for="colonia" style="font-size: 7px;">Requerido</label>

                </div>
                <select class=" form-control required" value="<?php echo e(old('municipio')); ?>"
                    style="background-color:rgba(230, 238, 250, 0.5);" name="asentamiento_residencia"
                    id="asentamiento_residencia">
                    <option value="0">Seleccione una colonia</option>
                </select>
                {{-- <input class=" form-control " maxlength="250" value=""
                    style="background-color:rgba(230, 238, 250, 0.5);" name="colonia" type="text" id="colonia"> --}}
                <div style="color:#FF0000;">

                </div>
            </div>
            <div class="form-group col-md-4">
                <div class="form-ic-cmp">
                    <i class="fas fa-map-signs"></i>&nbsp;
                    <label for="calle">Calle</label>
                    <label for="calle" style="font-size: 7px;">Requerido</label>

                </div>
                <input class=" form-control required " value="" maxlength="250"
                    style="background-color:rgba(230, 238, 250, 0.5);" name="calle" type="text" id="calle"
                    placeholder="Ingrese la calle">
                <div style="color:#FF0000;">

                </div>
            </div>
            <div class="form-group col-md-2">
                <div class="form-ic-cmp">
                    <i class="fal fa-hashtag"></i>&nbsp;
                    <label for="numext">Número Exterior</label>

                </div>
                <input class=" form-control required" value="" maxlength="6"
                    style="background-color:rgba(230, 238, 250, 0.5);" name="numext" type="text" id="numext"
                    placeholder="Número exterior">
                <div style="color:#FF0000;">

                </div>
            </div>
            <div class="form-group col-md-2">
                <div class="form-ic-cmp">
                    <i class="fal fa-hashtag"></i>&nbsp;
                    <label for="numint">Número Interior</label>
                </div>
                <input class=" form-control " placeholder="Opcional" value="" maxlength="6"
                    style="background-color:rgba(230, 238, 250, 0.5);" name="numint" type="text" id="numint">
                <div style="color:#FF0000;">

                </div>
            </div>

        </div>
    </div>

    <div class="f1-buttons">
        <button type="button" class="btn btn-sm btn-next">Siguiente</button>
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

    function validarNacionalidad(select){
        var valor = $(select).val();
        if(valor == 118){
            $(divCurp).removeClass("d-none");
        }else{
            $(divCurp).addClass("d-none");
        }
    }

    function consultarCurp(botton){

        var nacionalidad = $("#nacionalidad").val();
        var curp = $("#curp").val();
        

        if(nacionalidad == "0"){
            Swal.fire({
                title: "¡Cuidado!",
                text: "Selecciona la nacionalidad para poder continuar",
                icon: "warning"
            });
        }else if( nacionalidad == "118" && curp == ""){
            Swal.fire({
                title: "¡Cuidado!",
                text: "Ingresa la CURP para poder continuar",
                icon: "warning"
            });
        }else{
            // $('#btnConsultarCurp').prop('disabled', true);
            $('#btnConsultarCurp').addClass("d-none");
            $('#imgLoading').removeClass("d-none");

            $('#nacionalidad').attr('disabled',true);
            $('#curp').attr('readonly',true);
            if(nacionalidad == "118"){
                if(validarCURP(curp)){
                    RenapoCURP(curp);
                    
                }else{
                    Swal.fire({
                        title: "¡CURP inválida!",
                        text: "Revisa que hayas ingresado la CURP correctamente",
                        icon: "warning"
                    });
                    // $('#btnConsultarCurp').remove();;
                    $('#imgLoading').addClass("d-none");
                    $('#btnConsultarCurp').removeClass("d-none");
                    $('#nacionalidad').attr('disabled',false);
                    $('#curp').attr('readonly',false);
                }
            }else{
                $("#DatosGenerales").removeClass("d-none");
            }
        }
    }

    function RenapoCURP(curp){
      

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
                    html: 'CURP encontrada en el Registro Nacional de Población', 
                    confirmButtonText: 'Continuar',
                    confirmButtonColor: '#152F4A',
                    width: 450,
                });
                $('#imgLoading').addClass("d-none");

               
                // input-hidden
                $('#curp').val( curp );
                $('#Nombre').val( res.nombres );
                $('#PrimerApellido').val( res.apellido1 );
                $('#SegundoApellido').val( res.apellido2 );
                $('#fnacimiento').val( res.fechaNacF );    
                
                
                $('#Nombre').attr('readonly',true);
                $('#PrimerApellido').attr('readonly',true);
                $('#SegundoApellido').attr('readonly',true);
                $('#fnacimiento').attr('readonly',true);
                

                if ( res.nacionalidad == 'MEX' ) {
                    // input hidden
                    $('#input-hidden-pais-nacimiento').val( res.pais_id );
                    $('#input-hidden-entidad-nacimiento').val( res.entidad_id );
                    $('#input-hidden-municipio-nacimiento').val( res.municipio_id );

                    // pais
                    $('#curp-pais-nacimiento').append( res.pais_nombre );
                    // entidad
                    $('#curp-entidad-nacimiento').append( res.entidad_nombre );
                    // municipio
                    if(res.municipio_id != null){
                        $('#curp-municipio-nacimiento').append( res.municipio_nombre );
                    }
                    else{
                        $('.listado-curp-municipio').addClass('d-none');
                        $('#nacional_nacimiento').removeClass('d-none');
                    }

                }else{
                    $('.listado-curp-pais').addClass( 'd-none' );
                    $('.listado-curp-entidad').addClass( 'd-none' );
                    $('.listado-curp-municipio').addClass( 'd-none' );
                }

                $("#DatosGenerales").removeClass("d-none");

            }else{
                Swal.fire({
                    imageUrl: "{{ asset('img/renapo.png') }}",
                    imageWidth: 200,
                    html: 'La CURP no fue encontrada en el Registro Nacional De Población. Revisa tu CURP en: ' + '<br>' + '<strong>' + '<br>' + '<a style="text-decoration: underline;" href="https://www.gob.mx/curp/" target="_blank">https://www.gob.mx/curp/</a> ' +'' + '</strong>', 
                    confirmButtonText: 'Enterado',
                    confirmButtonColor: '#152F4A',
                    width: 450,
                });
                $('#btnConsultarCurp').removeClass("d-none");
                $('#imgLoading').addClass("d-none");
                $('#nacionalidad').attr('disabled',false);
                $('#curp').attr('readonly',false);

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



</script>
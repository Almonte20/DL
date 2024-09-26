<div>
    <div class="seccion text-center mb-3">
        <div class="circle-title">
            <div class="circle-number ">3</div>
        </div>
        <h1>DATOS DE LA VÍCTIMA:</h1>
    </div>

    <div class="container">
        <div id="YoVictimaDiv" class="">
            <div class="form-row col-lg-12 text-center">
                <div class="form-group col-md-4">
                    <div class="form-ic-cmp">
                        <i class="fad fa-id-card"></i>&nbsp;
                        <label class="mb-0" >Nombre (s)</label>
                    </div>
                    <label class="mt-0 txtVictima" id="nombre-victima-denunciante"></label>

                </div>
                <div class="form-group col-md-4">
                    <div class="form-ic-cmp">
                        <i class="fad fa-id-card"></i>&nbsp;
                        <label  class="mb-0">Primer Apellido</label>
                    </div>
                    <label class="mt-0 txtVictima" id="primer-apellido-victima-denunciante"></label>
                </div>
                <div class="form-group col-md-4">
                    <div class="form-ic-cmp">
                        <i class="fad fa-id-card"></i>&nbsp;
                        <label class="mb-0">Segundo Apellido</label>&nbsp;
                    </div>
                    <label class="mt-0 txtVictima" id="segundo-apellido-victima-denunciante"></label>
                </div>
            </div>
        </div>

        <div id="OtraPersonaDiv" class="d-none">


            <div class="form-row col-lg-12 align-items-end justify-content-start">
                <div class="form-group  col-md-4">
                    <div class="form-ic-cmp">
                        <i class="fad fa-id-card"></i>&nbsp;
                        <label for="nacionalidad_victima">Nacionalidad de la víctima</label>
                        <label for="nacionalidad_victima" style="font-size: 7px;">Requerido</label>
                    </div>
                    <select name="nacionalidad_victima" id="nacionalidad_victima" data-curp="divCurp_victima"
                        onchange="validarNacionalidad(this)" class=" form-control "
                        >
                        <option value="0">Seleccione la nacionalidad</option>
                        @foreach ($countries as $country)

                        <option @if ($country->id == 118) {{'selected'}}
                            @endif value="{{$country->id}}">{{$country->nacionalidad}}</option>
                        @endforeach
                    </select>
                    <div style="color:#FF0000;">
                        {{ $errors->first('nacionalidad') }}
                    </div>
                </div>

                <div class="form-group col-md-4 " id="divCurp_victima">
                    <div class="form-ic-cmp">
                        <i class="fad fa-id-card"></i>&nbsp;
                        <label for="curp">CURP de la víctima</label>
                        <label for="nombre" style="font-size: 7px;">Requerido</label>
                        <br>
                    </div>
                    <input type="text" name="curp_victima" id="curp_victima" class=" form-control "
                        value="AOAA960320HMNLCL04" maxlength="18" placeholder="CURP"
                        >
                    {{-- <label for="curp" style="font-size: 8px;"><a target="_blank" href="https://www.gob.mx/curp/">Saber
                            cuál
                            es
                            mi CURP</a></label> --}}

                    <div style="color:#FF0000;">
                        {{ $errors->first('curp') }}
                    </div>
                </div>

                <div class="form-group col-md-4">
                    <button type="button" class="btn-sm btn-search" onclick="consultarCurp(this,'victima')"
                        style="background: #002b49;" id="btnConsultarCurp_victima"> BUSCAR</button>
                    <button type="button" class="btn-sm btn-search d-none" onclick="consultarOtraCurp()"
                        style="background: #002b49;" id="btn-consultar-otra-curp"> CAMBIAR DATOS DE LA VÍCTIMA</button>
                    <img src="{{asset("img/denuncia/loading.gif")}}" class="img-responsive d-none" width="10%"
                        id="imgLoading_victima">
                </div>
            </div>

            <div id="DatosGenerales_victima" class="d-none">

                <div class="form-row col-lg-12">
                    <div class="form-group col-md-4">
                        <div class="form-ic-cmp">
                            <i class="fad fa-id-card"></i>&nbsp;
                            <label for="nombre">Nombre (s)</label>
                            <label for="nombre" style="font-size: 7px;">Requerido</label>
                        </div>
                        <input type="text" name="nombre_victima" id="Nombre_victima" class=" form-control"
                            value="{{ old('nombre') }}" required maxlength="50"
                             placeholder="Nombre"
                             data-message-error='El dato "NOMBRE DE LA VÍCTIMA" es requerido.'>
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
                        <input type="text" name="PrimerApellido_victima" id="PrimerApellido_victima"
                            class=" form-control" value="{{ old('PrimerApellido') }}" maxlength="50"
                            data-message-error='El dato "PRIMER APELLIDO DE LA VÍCTIMA" es requerido.'
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
                        <input type="text" name="SegundoApellido_victima" id="SegundoApellido_victima"
                            class=" form-control " value="{{ old('SegundoApellido') }}" maxlength="50"
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
                        <input type="date" name="fnacimiento_victima" id="fnacimiento_victima"
                            class=" form-control" data-destino="victima" onchange="esMayorDeEdad(this)"
                            data-message-error='El dato "FECHA DE NACIMIENTO DE LA VÍCTIMA" es requerido.'
                            >
                        <div style="color:#FF0000;">
                            {{ $errors->first('fnacimiento') }}
                        </div>
                    </div>
                    <div class="form-group col-md-4 text-center">
                            <label for="fnacimiento">¿Es Mayor de edad?</label>
                        <div class="col-md-12 text-center">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="mayor_edad_victimaS" name="mayor_edad_victima" class="custom-control-input"
                                    value="1" onchange="mayoriaEdad()">
                                <label class="custom-control-label" for="mayor_edad_victimaS">Sí </label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="mayor_edad_victimaN" name="mayor_edad_victima" class="custom-control-input" value="0" onchange="mayoriaEdad()">
                                <label class="custom-control-label" for="mayor_edad_victimaN">No</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-row col-lg-12 justify-content-center d-non" id="div_identificación_victima">

                    <div class="form-group col-md-8">
                        <div class="form-ic-cmp">
                            <i class="fal fa-file"></i>
                            <label for="credencial">&nbsp; Identificación oficial de la víctima (INE o Pasaporte)</label>
                            <label for="credencial" style="font-size: 7px;">Requerido</label>
        
                        </div>
                        {{-- <input type="file" name="credencial" class="file_multi_image required credencial" id="credencial"
                            accept="image/*" required> --}}
                        <div class="input-group mb-3" role='button'>
                            <div class="input-group-prepend"> </div>
                            <div class="custom-file">
                                <input style="cursor:pointer;" type="file" class="custom-file-input" id="identificacion_victima" name="identificacion_victima" data-message-error='El dato "IDENTIFICACIÓN OFICIAL DE LA VÍCTIMA" es requerido.'>
                                <label class="custom-file-label" id="custom-file-label-identificacion-victima" for="identificacion_victima">Buscar
                                    Archivo</label>  
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-4 text-center">
                        <div class="preview_victima" id="preview_identificacion_victima"></div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<script>
    function otraPersona(){
        var valor = $('input:radio[name=victimadenunciante]:checked').val();
        if(valor == 0){
            $("#OtraPersonaDiv").removeClass("d-none");
            $("#YoVictimaDiv").addClass("d-none");
        }else{
            $("#OtraPersonaDiv").addClass("d-none");
            $("#YoVictimaDiv").removeClass("d-none");
            $("#mayor_edad_victimaN").prop('checked', true).trigger("change");
        }
    }


    function mayoriaEdad(){
        var valor = $('input:radio[name=mayor_edad_victima]:checked').val();
        if(valor == 0){
            $("#div_identificación_victima").addClass("d-none");
            $("#identificacion_victima").removeClass("required");
        }else{
            $("#div_identificación_victima").removeClass("d-none");
            $("#identificacion_victima").addClass("required");
        }
    }

    const consultarOtraCurp = () => {
        $('#nacionalidad_victima').prop('disabled', false);
        $('#curp_victima').prop('readonly', false);

        $('#btn-consultar-otra-curp').addClass('d-none');
        $('#DatosGenerales_victima').addClass('d-none');

        $('#btnConsultarCurp_victima').removeClass('d-none');
        $('#btnConsultarCurp_victima').prop('disabled', false);

        $('#Nombre_victima').val('');
        $('#Nombre_victima').prop('readonly', false);

        $('#PrimerApellido_victima').val('');
        $('#PrimerApellido_victima').prop('readonly', false);

        $('#SegundoApellido_victima').val('');
        $('#SegundoApellido_victima').prop('readonly', false);

        $('#fnacimiento_victima').val('');
        $('#fnacimiento_victima').prop('readonly', false);

        $('input[name="mayor_edad_victima"]').prop('checked', false);
    }

</script>

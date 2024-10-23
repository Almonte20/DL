<div>

    @php
    if($victimaDenunciante == 0){
        if($victima->id_nacionalidad == 118){
            $busquedaCurpVicitma = true;
        }else{
            $busquedaCurpVicitma = false;
        }
    }else{
        $busquedaCurpVicitma = false;
    }

    @endphp 
    <div class="form-row col-lg-12 text-center  mb-3">

        <div class="col-md-12 mt-3 text-center">
            <p class="mb-2 txt-preguntas">¿QUIÉN ES LA
                VÍCTIMA?</p>
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="radiodenunciante" name="victimadenunciante"
                    class="custom-control-input required" value="1" @if ($victimaDenunciante == 1)  {{'checked'}} @endif
                    data-message-error='"¿QUIÉN ES LA VÍCTIMA?" es requerido.' onchange="otraPersona()">
                <label class="custom-control-label" for="radiodenunciante">Yo</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="radiovictima" name="victimadenunciante" class="custom-control-input required"
                    value="0" data-message-error='"¿QUIÉN ES LA VÍCTIMA?" es requerido.' onchange="otraPersona()" @if ($victimaDenunciante == 0)  {{'checked'}} @endif>
                <label class="custom-control-label" for="radiovictima">Otra
                    persona</label>
            </div>
            <!-- Aquí se agrega el mensaje de error -->
            <div id="quien-es-victima-mensaje-error" class="text-danger mt-1 d-none" style=" font-size: 14px;">
                Indique una opción.
            </div>
        </div>
    </div>



    <div class="seccion text-center mb-3">
        <div class="circle-title">
            <div class="circle-number ">3</div>
        </div>
        <h1>DATOS DE LA VÍCTIMA:</h1>
    </div>

    <div class="container">
        <div id="YoVictimaDiv" class="@if ($victimaDenunciante == 0)  {{'d-none'}} @endif">
            <div class="form-row col-lg-12 text-center">
                <div class="form-group col-md-4">
                    <div class="form-ic-cmp">
                        <i class="fad fa-id-card"></i>&nbsp;
                        <label class="mb-0">Nombre (s)</label>
                    </div>
                    <label class="mt-0 txtVictima" id="nombre-victima-denunciante">@if ($victimaDenunciante == 1)  {{$denunciante->nombre}} @endif</label>

                </div>
                <div class="form-group col-md-4">
                    <div class="form-ic-cmp">
                        <i class="fad fa-id-card"></i>&nbsp;
                        <label class="mb-0">Primer Apellido</label>
                    </div>
                    <label class="mt-0 txtVictima" id="primer-apellido-victima-denunciante">@if ($victimaDenunciante == 1)  {{$denunciante->primer_apellido}} @endif</label>
                </div>
                <div class="form-group col-md-4">
                    <div class="form-ic-cmp">
                        <i class="fad fa-id-card"></i>&nbsp;
                        <label class="mb-0">Segundo Apellido</label>&nbsp;
                    </div>
                    <label class="mt-0 txtVictima" id="segundo-apellido-victima-denunciante">@if ($victimaDenunciante == 1)  {{$denunciante->segundo_apellido}} @endif</label>
                </div>
            </div>
        </div>

        <div id="OtraPersonaDiv" class="@if ($victimaDenunciante == 1)  {{'d-none'}} @endif">


            <div class="form-row col-lg-12 align-items-end justify-content-start">
                <div class="form-group  col-md-4">
                    <div class="form-ic-cmp">
                        <i class="fad fa-id-card"></i>&nbsp;
                        <label for="nacionalidad_victima">Nacionalidad de la víctima</label>
                        <label for="nacionalidad_victima" style="font-size: 7px;" class="text-danger">Requerido</label>
                    </div>
                    <select name="nacionalidad_victima" id="nacionalidad_victima" data-curp="divCurp_victima"
                        onchange="validarNacionalidad(this,'victima')" class=" form-control "  @if ($victimaDenunciante == 0 && $busquedaCurpVicitma)  {{'disabled'}} @endif>
                        <option value="0">Seleccione la nacionalidad</option>
                        @foreach ($countries as $country)

                        <option @if ($victimaDenunciante == 0 && $country->id == $victima->id_nacionalidad) {{'selected'}}
                            @endif value="{{$country->id}}">{{$country->nacionalidad}}</option>
                        @endforeach
                    </select>
                    <div style="color:#FF0000;">
                        {{ $errors->first('nacionalidad') }}
                    </div>
                </div>

              
               
                <div class="form-group col-md-4 @if ($victimaDenunciante == 0 && $busquedaCurpVicitma){{'d-none'}} @endif" id="divCurp_victima">
                    <div class="form-ic-cmp">
                        <i class="fad fa-id-card"></i>&nbsp;
                        <label for="curp">CURP de la víctima</label>
                        <label for="nombre" style="font-size: 7px;" class="text-danger">Requerido</label>
                        <br>
                    </div>
                    <input type="text" name="curp_victima" id="curp_victima" class=" form-control " value="@if($busquedaCurpVicitma){{$victima->curp}}@endif"
                        maxlength="18" placeholder="CURP"  @if ($victimaDenunciante == 0 && $busquedaCurpVicitma)  {{'readonly'}} @endif>
                    {{-- <label for="curp" style="font-size: 8px;"><a target="_blank"
                            href="https://www.gob.mx/curp/">Saber
                            cuál
                            es
                            mi CURP</a></label> --}}

                    <div style="color:#FF0000;">
                        {{ $errors->first('curp') }}
                    </div>
                </div>
               

                <div class="form-group col-md-4">
                    <button type="button" class="btn-sm btn-search @if($busquedaCurpVicitma){{'d-none'}}@endif" onclick="consultarCurp(this,'victima')"
                        style="background: #002b49;" id="btnConsultarCurp_victima"> BUSCAR</button>
                    <button type="button" class="btn-sm btn-search @if($victimaDenunciante == 1 && !$busquedaCurpVicitma){{'d-none'}}@endif" data-destino="victima" onclick="consultarOtraCurp(this)"
                        style="background: #002b49;" id="btn-consultar-otra-curp-victima"> CAMBIAR DATOS DE LA VÍCTIMA</button>
                    <img src="{{asset("img/denuncia/loading.gif")}}" class="img-responsive d-none" width="10%"
                        id="imgLoading_victima">
                </div>
             
            </div>
          
            <div id="DatosGenerales_victima" class="@if ($victimaDenunciante == 1) {{'d-none'}} @endif">

                <div class="form-row col-lg-12">
                    <div class="form-group col-md-4">
                        <div class="form-ic-cmp">
                            <i class="fad fa-id-card"></i>&nbsp;
                            <label for="nombre">Nombre (s)</label>
                            <label for="nombre" style="font-size: 7px;" class="text-danger">Requerido</label>
                        </div>
                        <input type="text" name="nombre_victima" id="Nombre_victima" class=" form-control"
                            value="@if ($victimaDenunciante == 0){{$victima->nombre}}@endif" required maxlength="50" placeholder="Nombre"
                            data-message-error='"NOMBRE DE LA VÍCTIMA" es requerido.' @if ($victimaDenunciante == 0 && $busquedaCurpVicitma)  {{'readonly'}} @endif>
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
                        <input type="text" name="PrimerApellido_victima" id="PrimerApellido_victima"
                            class=" form-control" value="@if ($victimaDenunciante == 0){{$victima->primer_apellido}}@endif" maxlength="50"
                            data-message-error='"PRIMER APELLIDO DE LA VÍCTIMA" es requerido.'
                            placeholder="Primer apellido"  @if ($victimaDenunciante == 0 && $busquedaCurpVicitma)  {{'readonly'}} @endif>
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
                            class=" form-control " value="@if ($victimaDenunciante == 0){{$victima->segundo_apellido}}@endif" maxlength="50"
                            placeholder="Segundo apellido" @if ($victimaDenunciante == 0 && $busquedaCurpVicitma)  {{'readonly'}} @endif>
                        <div style="color:#FF0000;">
                            {{ $errors->first('SegundoApellido') }}
                        </div>
                    </div>
                </div>

                <div class="form-row col-lg-12">
                    <div class="form-group col-md-4">

                        @php
                            if($victimaDenunciante == 0){
                                $fechaNac_victima = new DateTime($victima->fecha_nacimiento);
                                $fechaNacimiento_victima = $fechaNac_victima->format('Y-m-d');
                            }
                        @endphp
                        <div class="form-ic-cmp">
                            <i class="fal fa-calendar"></i>&nbsp;
                            <label for="fnacimiento">Fecha de Nacimiento</label>
                            <label for="nombre" style="font-size: 7px;" class="text-danger">Requerido</label>

                        </div>
                        <input type="date" name="fnacimiento_victima" id="fnacimiento_victima" class=" form-control"
                            data-destino="victima" onchange="esMayorDeEdad(this)"
                            data-message-error='"FECHA DE NACIMIENTO DE LA VÍCTIMA" es requerido.' value="@if ($victimaDenunciante == 0){{$fechaNacimiento_victima}}@endif"  @if ($victimaDenunciante == 0 && $busquedaCurpVicitma)  {{'readonly'}} @endif>
                        <div style="color:#FF0000;">
                            {{ $errors->first('fnacimiento') }}
                        </div>
                    </div>
                    <div class="form-group col-md-4 text-center">
                        <label for="fnacimiento">¿Es Mayor de edad?</label>
                        <div class="col-md-12 text-center">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="mayor_edad_victimaS" name="mayor_edad_victima"
                                    class="custom-control-input" value="1" onchange="mayoriaEdad()" @if ($victimaDenunciante == 0 && $victima->mayor_edad == 1)  {{'checked'}} @endif>
                                <label class="custom-control-label" for="mayor_edad_victimaS">Sí </label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="mayor_edad_victimaN" name="mayor_edad_victima"
                                    class="custom-control-input" value="0" onchange="mayoriaEdad()" @if ($victimaDenunciante == 0 && $victima->mayor_edad == 0)  {{'checked'}} @endif>
                                <label class="custom-control-label" for="mayor_edad_victimaN">No</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-row col-lg-12 justify-content-center d-non" id="div_identificación_victima">

                    <div class="form-group col-md-8">
                        <div class="form-ic-cmp">
                            <i class="fal fa-file"></i>
                            <label for="credencial">&nbsp; Identificación oficial de la víctima (INE o
                                Pasaporte)</label>
                            <label for="credencial" style="font-size: 7px;" class="text-danger">Requerido</label>

                        </div>
                        {{-- <input type="file" name="credencial" class="file_multi_image required credencial"
                            id="credencial" accept="image/*" required> --}}
                        <div class="input-group mb-3" role='button'>
                            <div class="input-group-prepend"> </div>
                            <div class="custom-file">
                                <input style="cursor:pointer;" type="file" class="custom-file-input"
                                    id="identificacion_victima" name="identificacion_victima"
                                    data-message-error='"IDENTIFICACIÓN OFICIAL DE LA VÍCTIMA" es requerido.'>
                                <label class="custom-file-label" id="custom-file-label-identificacion-victima"
                                    for="identificacion_victima">Buscar
                                    Archivo</label>  
                            </div>
                        </div>
                    </div>
                    @php
                      if($victimaDenunciante == 0 && $victima->mayor_edad == 1){
                        $url_victima = $victima->url_identificacion;
                        $file_victima = Storage::disk('buffalo')->get($url_victima);
                        $mimetype_victima = Storage::disk('buffalo')->mimeType($url_victima);
                        $data_victima = 'data:' . $mimetype_victima . ';base64,' . base64_encode($file_victima) . '';
                      }
                    @endphp
                    <div class="form-group col-md-4 text-center">
                        <div class="preview_victima" id="preview_identificacion_victima">
                            @if ($victimaDenunciante == 0  && $victima->mayor_edad == 1)
                            <img src="{{ $data_victima }}"style="max-width: 150px;" alt="">
                                
                            @endif
                        </div>
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
            $("#nacionalidad_victima").val(118).trigger("change");
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


</script>
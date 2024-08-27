<div>
    <div class="seccion text-center mb-3">
        <div class="circle-title">
            <div class="circle-number ">3</div>
        </div>
        <h1>DATOS DE LA VÍCTIMA:</h1>
    </div>

    <div class="container">
        <div id="YoVictimaDiv" class="">
            <div class="form-row col-lg-12">
                <div class="form-group col-md-4">
                    <div class="form-ic-cmp">
                        <i class="fad fa-id-card"></i>&nbsp;
                        <label class="mb-0" >Nombre (s)</label>
                    </div>
                    <label><span class="mt-0 txtVictima" id="nombre-victima"></label>

                </div>
                <div class="form-group col-md-4">
                    <div class="form-ic-cmp">
                        <i class="fad fa-id-card"></i>&nbsp;
                        <label  class="mb-0">Primer Apellido</label>
                    </div>
                    <label class="mt-0 txtVictima" id="primer-apellido-victima"></label>
                </div>
                <div class="form-group col-md-4">
                    <div class="form-ic-cmp">
                        <i class="fad fa-id-card"></i>&nbsp;
                        <label class="mb-0">Segundo Apellido</label>&nbsp;
                    </div>
                    <label class="mt-0 txtVictima" id="segundo-apellido-victima"></label>
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
                        style="background-color:rgba(230, 238, 250, 0.5);">
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
                        style="background-color:rgba(230, 238, 250, 0.5);">
                    {{-- <label for="curp" style="font-size: 8px;"><a target="_blank" href="https://www.gob.mx/curp/">Saber
                            cuál
                            es
                            mi CURP</a></label> --}}

                    <div style="color:#FF0000;">
                        {{ $errors->first('curp') }}
                    </div>
                </div>

                <div class="form-group col-md-2">
                    <button type="button" class="btn-sm btn-search" onclick="consultarCurp(this,'victima')"
                        style="background: #002b49;" id="btnConsultarCurp_victima"> BUSCAR</button>
                    <img src="{{asset(" img/denuncia/loading.gif")}}" class="img-responsive d-none" width="30%"
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
                        <input type="text" name="nombre_victima" id="Nombre_victima" class=" form-control required"
                            value="{{ old('nombre') }}" required maxlength="50"
                            style="background-color:rgba(230, 238, 250, 0.5);" placeholder="Nombre">
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
                            class=" form-control required " value="{{ old('PrimerApellido') }}" maxlength="50"
                            style="background-color:rgba(230, 238, 250, 0.5);" placeholder="Primer apellido">
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
                            style="background-color:rgba(230, 238, 250, 0.5);" placeholder="Segundo apellido">
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
                            class=" form-control required " value="{{ old('fnacimiento') }}"
                            style="background-color:rgba(230, 238, 250, 0.5);">
                        <div style="color:#FF0000;">
                            {{ $errors->first('fnacimiento') }}
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
        }else{
            $("#OtraPersonaDiv").addClass("d-none");
            $("#YoVictimaDiv").removeClass("d-none");

        }
    }


    function limpiarVictima(){
        
    }

</script>

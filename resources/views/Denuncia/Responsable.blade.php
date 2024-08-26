

{{-- <div class="row mt-3">
    <div class="col-md-12">
        <h1 class="mb-4">¿Quién es el responsable?</h1>
    </div>
</div> --}}

<div class="seccion text-center mb-3">
    <div class="circle-title">
        <div class="circle-number ">4</div>
    </div>
    <h1>DATOS DEL RESPONSABLE:</h1>
</div>

<div class="container">
    <div id="ResponsableDiv" class="pl-3">
        <div class="form-row col-lg-12">
            <div class="form-group col-md-4">
                <div class="form-ic-cmp">
                    <i class="fad fa-id-card"></i>&nbsp;
                    <label for="nombre">Nombre del responsable</label>
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
                    <label for="PrimerApellido">Primer Apellido del responsable</label>
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
                    <label for="SegundoApellido">Segundo Apellido del responsable</label>
                </div>
                <input type="text" name="SegundoApellido" id="SegundoApellido" class=" form-control "
                    value="{{ old('SegundoApellido') }}" maxlength="50" style="background-color:rgba(230, 238, 250, 0.5);"
                    placeholder="Segundo apellido">
                <div style="color:#FF0000;">
                    {{ $errors->first('SegundoApellido') }}
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-12 text-center">
                <label>¿Dispone usted de alguna información sobre rasgos físicos distintivos del responsable?</label>
            </div>
        {{-- </div>

        <div class="row "> --}}
            <div class="col-md-12 text-center">
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="radioIdentificacionResponsableS" name="radioIdentificacionResponsable" class="custom-control-input"
                        value="1"  onchange="identificacionResponsable()">
                    <label class="custom-control-label" for="radioIdentificacionResponsableS">Si </label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="radioIdentificacionResponsableN" name="radioIdentificacionResponsable" class="custom-control-input" value="0"  onchange="identificacionResponsable()">
                    <label class="custom-control-label" for="radioIdentificacionResponsableN">No</label>
                </div>
            </div>
        </div>
        <div class="form-row col-lg-12 justify-content-center d-none" id="divIdentifiacionResponsable">

            <div class="form-group col-md-8">
                <div class="form-ic-cmp">
                    <i class="fal fa-file"></i>&nbsp;
                    <label for="identificacion_responsable">Identificación oficial del responsable<font style="font-size: 8px">Formato
                            aceptado: .jpg/.jpeg/.png </font>*<font style="font-size: 8px">Tamaño máximo: 3mb </font>
                        </label>
                    <label class="mt-0" for="identificacion_responsable" style="font-size: 7px;">Requerido</label>

                </div>
                <input type="file" name="identificacion_responsable" class="file_multi_image required" id="identificacion_responsable" accept="image/*"
                    required>
            </div>
            <div class="form-group col-md-4 text-center">
                <div id="preview_identificacion_responsable"></div>
            </div>
        </div>
    </div>
</div>


<script>
    function identificacionResponsable(){
        var valor = $('input:radio[name=radioIdentificacionResponsable]:checked').val();
        if(valor == 0){
            $("#divIdentifiacionResponsable").addClass("d-none");
        }else{

            $("#divIdentifiacionResponsable").removeClass("d-none");
        }
    }

</script>

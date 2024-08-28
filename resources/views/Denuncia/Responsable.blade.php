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
        <div class="row ">
            <div class="col-md-12 text-center">
                <p class="mb-2" style="font-weight: bold; font-size: 22px;">¿CONOCE AL RESPONSABLE?</p>
            </div>
        </div>

        <div class="row ">
            <div class="col-md-12 text-center">
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="conozcoResponsableS" name="conoce_responsable"
                        class="custom-control-input" value="1" onchange="conozco_responsable()"
                        data-message-error='El campo "¿CONOCE AL RESPONSABLE?" es requerido.'>
                    <label class="custom-control-label" for="conozcoResponsableS">SÍ </label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="conozcoResponsableN" name="conoce_responsable"
                        class="custom-control-input" value="0" onchange="conozco_responsable()"
                        data-message-error='El campo "¿CONOCE AL RESPONSABLE?" es requerido.'>
                    <label class="custom-control-label" for="conozcoResponsableN">NO</label>
                </div>
                <div id="conoce-responsable-mensaje-error" class="text-danger mt-1 d-none" style=" font-size: 14px;">
                    Indique una opción.
                </div>
            </div>
        </div>
        <div class="form-row col-lg-12 d-none" id="conozcoResponsableDiv">
            <div class="form-group col-md-6">
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
            <div class="form-group col-md-6">
                <div class="form-ic-cmp">
                    <i class="fad fa-id-card"></i>&nbsp;
                    <label for="PrimerApellido">Primer Apellido del responsable</label>
                </div>
                <input type="text" name="PrimerApellido" id="PrimerApellido" class=" form-control required "
                    value="{{ old('PrimerApellido') }}" maxlength="50"
                    style="background-color:rgba(230, 238, 250, 0.5);" placeholder="Primer apellido">
                <div style="color:#FF0000;">
                    {{ $errors->first('PrimerApellido') }}
                </div>
            </div>
            <div class="form-group col-md-6">
                <div class="form-ic-cmp">
                    <i class="fad fa-id-card"></i>&nbsp;
                    <label for="SegundoApellido">Segundo Apellido del responsable</label>
                </div>
                <input type="text" name="SegundoApellido" id="SegundoApellido" class=" form-control "
                    value="{{ old('SegundoApellido') }}" maxlength="50"
                    style="background-color:rgba(230, 238, 250, 0.5);" placeholder="Segundo apellido">
                <div style="color:#FF0000;">
                    {{ $errors->first('SegundoApellido') }}
                </div>
            </div>
            <div class="form-group col-md-6">
                <div class="form-ic-cmp">
                    <i class="fad fa-id-card"></i>&nbsp;
                    <label for="SegundoApellido">Alias</label>
                </div>
                <input type="text" name="AliasResponsable" id="AliasResponsable" class=" form-control "
                    value="" maxlength="50"
                    style="background-color:rgba(230, 238, 250, 0.5);" placeholder="Alias">

            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-12 text-center">
                <p class="mb-2" style="font-weight: bold; font-size: 22px;">¿DISPONE USTED DE ALGUNA INFORMACIÓN SOBRE RASGOS FÍSICOS DISTINTIVOS DEL RESPONSABLE?</p>
            </div>
            <div class="col-md-12 text-center">
                <div class="custom-control custom-radio custom-control-inline">
                    <input
                      type="radio"
                      id="radioIdentificacionResponsableS"
                      class="custom-control-input required"
                      name="conoce_rasgos_responsable"
                      value="1"
                      data-message-error='El dato "¿DISPONE USTED DE ALGUNA INFORMACIÓN SOBRE RASGOS FÍSICOS DISTINTIVOS DEL RESPONSABLE?" es requerido.'
                      onchange="identificacionResponsable()">
                    <label class="custom-control-label" for="radioIdentificacionResponsableS">SÍ </label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input
                      type="radio"
                      id="radioIdentificacionResponsableN"
                      name="conoce_rasgos_responsable"
                      class="custom-control-input required"
                      value="0"
                      data-message-error='El dato "¿DISPONE USTED DE ALGUNA INFORMACIÓN SOBRE RASGOS FÍSICOS DISTINTIVOS DEL RESPONSABLE?" es requerido.'
                      onchange="identificacionResponsable()">
                    <label class="custom-control-label" for="radioIdentificacionResponsableN">NO</label>
                </div>

                <div id="rasgos-responsable-mensaje-error" class="text-danger mt-1 d-none" style=" font-size: 14px;">
                    Indique una opción.
                </div>

            </div>
        </div>
        <div class="form-row col-lg-12 justify-content-center d-none mt-2" id="divIdentifiacionResponsable">
            <div class="form-group col-md-12">
                <textarea rows="6" class="form-control input-denuncia"
                    placeholder="Ejemplos: Tatuajue en el rostro, cabello largo, ojos café claro, etc..."></textarea>
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

    function conozco_responsable(){
        var valor = $('input:radio[name=conozcoResponsable]:checked').val();
        if(valor == 0){
            $("#conozcoResponsableDiv").addClass("d-none");
        }else{

            $("#conozcoResponsableDiv").removeClass("d-none");
        }
    }



</script>

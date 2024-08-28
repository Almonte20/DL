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
        <div class="form-row col-lg-12 d-none justify-content-center" id="conozcoResponsableDiv">
            <div class="form-group col-md-10 ">
                <div class="form-ic-cmp">
                    <i class="fad fa-id-card"></i>&nbsp;
                    <label for="nombre">Nombre y/o alias del responsable</label>
                </div>
                <input type="text" name="nombre" id="Nombre" class=" form-control required" value="{{ old('nombre') }}"
                    required maxlength="50" placeholder="Nombre y/o alias del responsable">
                <div style="color:#FF0000;">
                    {{ $errors->first('nombre') }}
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-12 text-center">
                <p class="mb-2" style="font-weight: bold; font-size: 22px;">¿DISPONE USTED DE ALGUNA INFORMACIÓN SOBRE
                    RASGOS FÍSICOS DISTINTIVOS DEL RESPONSABLE?</p>
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
                <textarea rows="6" class="form-control"
                    placeholder="Ejemplos: Tatuajue en el rostro, cabello largo, ojos café claro, etc..."></textarea>
            </div>



            <div class="col-md-12 text-center">
                <p class="mb-2" style="font-weight: bold; font-size: 22px;">¿CONOCE LA DIRECCIÓN DEL RESPONSABLE?
                </p>
            </div>



            <div class="col-md-12 text-center">
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="radioDireccionS" name="radioDireccion" class="custom-control-input"
                        value="1" onchange="direccion_responsable()">
                    <label class="custom-control-label" for="radioDireccionS">Sí </label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="radioDireccionN" name="radioDireccion" class="custom-control-input"
                        value="0" onchange="direccion_responsable()">
                    <label class="custom-control-label" for="radioDireccionN">No</label>
                </div>
            </div>
        </div>

        <div class="form-row col-lg-12 justify-content-center d-none mt-2" id="divDireccionResponsable">
            <div class="form-group col-md-12">
                Dirección del Responsable
                <textarea name="direccionResponsable" id="direccioonResponsable" rows="6" class="form-control"
                    placeholder="Ejemplos: Calle Madero #556, Col. Centro, Morelia, Michoacán."></textarea>
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

    function direccion_responsable(){
        var valor = $('input:radio[name=radioDireccion]:checked').val();
        if(valor == 0){
            $("#divDireccionResponsable").addClass("d-none");
            $("#direccioonResponsable").removeClass("required");
        }else{
            $("#divDireccionResponsable").removeClass("d-none");
            $("#direccioonResponsable").addClass("required");
        }
    }




</script>

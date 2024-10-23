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

@php
    if($responsable->get()->isNotEmpty()){
       

        if(!empty($responsable->first()->descripcion_involucrado)){
            $rasgosFisicos = true;
        }else{
            $rasgosFisicos = false;
        }

        if($responsable->first()->nombre != "Desconocido"){
            $conoceResponsable = true;
            $responsable = $responsable->first();
        }else{
            $conoceResponsable = false;
        }

       
    }else{
        $conoceResponsable = false;
        $rasgosFisicos = false;
    }
    
    if($rasgosFisicos && $responsable->address()->get()->isNotEmpty()){
        $conoceDireccion = true;
    }else{
        $conoceDireccion = false;
    }
   
  
@endphp
<div class="container">
    <div id="ResponsableDiv" class="pl-3">
        <div class="row ">
            <div class="col-md-12 text-center">
                <p class="mb-2 txt-preguntas">¿CONOCE AL RESPONSABLE?</p>
            </div>
        </div>

        <div class="row ">
            <div class="col-md-12 text-center">
                <div class="custom-control custom-radio custom-control-inline">
                    <input
                      type="radio"
                      id="conozcoResponsableS"
                      class="custom-control-input requiered"
                      name="conoce_responsable"
                      value="1"
                      onchange="conozco_responsable()"
                      data-message-error='"¿CONOCE AL RESPONSABLE?" es requerido.'
                      @if ($conoceResponsable)  {{'checked'}} @endif
                      >
                    <label class="custom-control-label" for="conozcoResponsableS">SÍ </label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input
                      type="radio"
                      id="conozcoResponsableN"
                      name="conoce_responsable"
                      class="custom-control-input required"
                      value="0"
                      onchange="conozco_responsable()"
                      data-message-error='"¿CONOCE AL RESPONSABLE?" es requerido.'
                      @if (!$conoceResponsable)  {{'checked'}} @endif
                      >
                    <label class="custom-control-label" for="conozcoResponsableN">NO</label>
                </div>
                <div id="conoce-responsable-mensaje-error" class="text-danger mt-1 d-none" style=" font-size: 14px;">
                    Indique una opción.
                </div>
            </div>
        </div>
        <div class="form-row col-lg-12 @if (!$conoceResponsable)  {{'d-none'}} @endif justify-content-center" id="conozcoResponsableDiv">
            <div class="form-group col-md-10 ">
                <div class="form-ic-cmp">
                    <i class="fad fa-id-card"></i>&nbsp;
                    <label for="nombre">Nombre y/o alias del responsable</label>
                </div>
                <input
                  type="text"
                  id="nombre-alias-responsable"
                  class=" form-control"
                  required
                  maxlength="50"
                  name="nombre_alias_responsable"
                  data-message-error='"NOMBRE Y/O ALIAS DEL RESPONSALE" es requerido.'
                  placeholder="Nombre y/o alias del responsable"
                 value=" @if ($conoceResponsable)  {{$responsable->nombre}} @endif">
                <div style="color:#FF0000;">
                    {{ $errors->first('nombre') }}
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-12 text-center">
                <p class="mb-2  txt-preguntas">¿DISPONE USTED DE ALGUNA INFORMACIÓN SOBRE
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
                      data-message-error='"¿DISPONE USTED DE ALGUNA INFORMACIÓN SOBRE RASGOS FÍSICOS DISTINTIVOS DEL RESPONSABLE?" es requerido.'
                      onchange="identificacionResponsable()"
                      @if ($rasgosFisicos)  {{'checked'}} @endif>
                    <label class="custom-control-label" for="radioIdentificacionResponsableS">SÍ </label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input
                      type="radio"
                      id="radioIdentificacionResponsableN"
                      name="conoce_rasgos_responsable"
                      class="custom-control-input required"
                      value="0"
                      data-message-error='"¿DISPONE USTED DE ALGUNA INFORMACIÓN SOBRE RASGOS FÍSICOS DISTINTIVOS DEL RESPONSABLE?" es requerido.'
                      onchange="identificacionResponsable()"
                      @if (!$rasgosFisicos)  {{'checked'}} @endif>
                    <label class="custom-control-label" for="radioIdentificacionResponsableN">NO</label>
                </div>

                <div id="rasgos-responsable-mensaje-error" class="text-danger mt-1 d-none" style=" font-size: 14px;">
                    Indique una opción.
                </div>

            </div>
        </div>

        <div class="form-row col-lg-12 justify-content-center @if (!$rasgosFisicos)  {{'d-none'}} @endif mt-2" id="divIdentificacionResponsable">
            <div class="form-group col-md-12">
                <textarea id="rasgos-distintivos-responsable" rows="6" class="form-control" name="rasgos_fisicos_responsable"
                    placeholder="Ejemplos: Tatuajue en el rostro, cabello largo, ojos café claro, etc..."
                    data-message-error='"DESCRIPCIÓN SOBRE RASGOS FÍSICOS DISTINTIVOS DEL RESPONSABLE" es requerido.'>@if($rasgosFisicos){{$responsable->descripcion_involucrado}}@endif</textarea>
            </div>



            <div class="col-md-12 text-center">
                <p class="mb-2 txt-preguntas" >¿CONOCE LA DIRECCIÓN DEL RESPONSABLE?
                </p>
            </div>
            


            <div class="col-md-12 text-center">
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="radioDireccionS" name="conoce_direccion_responsable" class="custom-control-input"
                        value="1" onchange="direccion_responsable()"
                        data-message-error='"¿CONOCE LA DIRECCIÓN DEL RESPONSABLE?" es requerido.' @if ($conoceDireccion )  {{'checked'}} @endif>
                    <label class="custom-control-label" for="radioDireccionS">Sí </label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="radioDireccionN" name="conoce_direccion_responsable" class="custom-control-input"
                        value="0" onchange="direccion_responsable()"
                        data-message-error='"¿CONOCE LA DIRECCIÓN DEL RESPONSABLE?" es requerido.' @if (!$conoceDireccion )  {{'checked'}}@endif>
                    <label class="custom-control-label" for="radioDireccionN">No</label>
                </div>
                <div id="conoce-direccion-responsable-mensaje-error" class="text-danger mt-1 d-none" style=" font-size: 14px;">
                    Indique una opción.
                </div>
            </div>
        

        <div class="form-row col-lg-12 justify-content-center @if (!$conoceDireccion){{'d-none'}}@endif mt-2" id="divDireccionResponsable">
            <div class="form-group col-md-12">
                <label for="direccion-responsable">Dirección del Responsable</label >
                <textarea name="direccionResponsable" id="direccion-responsable" rows="6" class="form-control"
                    placeholder="Ejemplos: Calle Madero #556, Col. Centro, Morelia, Michoacán."
                    data-message-error='"DIRECCIÓN DEL RESPONSABLE" es requerido.'>@if ($conoceDireccion){{$responsable->address()->first()->otro_domicilio}}@endif</textarea>
            </div>
        </div>
    </div>

    </div>
</div>



<script>
    function identificacionResponsable(){
        var valor = $('input:radio[name=conoce_rasgos_responsable]:checked').val();
        if(valor == 0){
            $("#divIdentificacionResponsable").addClass("d-none");
            $('input[name="conoce_direccion_responsable"]').prop('checked', false);
            $("#divDireccionResponsable").addClass("d-none");
            $("#direccion-responsable").removeClass("required");
        }else{

            $("#divIdentificacionResponsable").removeClass("d-none");
        }
    }

    function conozco_responsable(){
        var valor = $('input:radio[name=conoce_responsable]:checked').val();
        if(valor == 0){
            $("#conozcoResponsableDiv").addClass("d-none");
        }else{
            $("#conozcoResponsableDiv").removeClass("d-none");
        }
    }

    function direccion_responsable(){
        var valor = $('input:radio[name=conoce_direccion_responsable]:checked').val();
        if(valor == 0){
            $("#divDireccionResponsable").addClass("d-none");
            $("#direccion-responsable").removeClass("required");
        }else{
            $("#divDireccionResponsable").removeClass("d-none");
            $("#direccion-responsable").addClass("required");
        }
    }




</script>

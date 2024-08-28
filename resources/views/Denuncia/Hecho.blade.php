<div class="container">
    <div class="row">
        <div class="col-md-12 text-center">
            <p class="mb-2" style="font-weight: bold; font-size: 22px;">INDIQUE DE QUÉ MANERA SE COMETIÓ EL HECHO</p>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <textarea class="form-control required" name="narrativa" id="narrativa" rows="7" maxlength="3980"
                    style="background-color:rgba(230, 238, 250, 0.5);">{{ old('narrativa','') }}</textarea>
                <div style="color:#FF0000;">
                    {{ $errors->first('narrativa') }}
                </div>
            </div>
        </div>
        {{-- <div class="col-md-12 text-center">
        </div> --}}
        <div class="col-md-12 text-center">
            <div>
                <p class="mb-2" style="font-weight: bold; font-size: 22px;">¿EXISTIÓ VIOLENCIA?</p>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
                <input
                  type="radio"
                  id="existioviolenciaS"
                  name="existio_violencia"
                  class="custom-control-input required"
                  data-message-error='El dato "¿EXISTIÓ VIOLENCIA?" es requerido.'
                  value="1"
                  onchange="ExistioViolencia()">
                <label class="custom-control-label" for="existioviolenciaS">Si </label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
                <input
                  type="radio"
                  id="existioviolenciaN"
                  name="existio_violencia"
                  class="custom-control-input required"
                  value="0"
                  data-message-error='El dato "¿EXISTIÓ VIOLENCIA?" es requerido.'
                  onchange="ExistioViolencia()">
                <label class="custom-control-label" for="existioviolenciaN">No</label>
            </div>
            <div id="existio-violencia-mensaje-error" class="text-danger mt-1 d-none" style=" font-size: 14px;">
                Indique una opción.
            </div>
        </div>

        <div class="col-md-12 d-none text-center" id="ExplicacionViolencia">
            <p class="mb-2" style="font-weight: bold; font-size: 18px;">EXPLIQUE DE QUÉ MANERA SE COMETIÓ LA VIOLENCIA</p>
            <textarea rows="2" class="form-control input-denuncia" name="expliqueViolencia" placeholder="Explique de que manera fue la violencia"></textarea>
        </div>
    </div>
</div>


<script>
    function ExistioViolencia(){
        var valor = $('input:radio[name=existioviolencia]:checked').val();
        if(valor == 0){
            $("#ExplicacionViolencia").addClass("d-none");
        }else{

            $("#ExplicacionViolencia").removeClass("d-none");
        }
    }

</script>

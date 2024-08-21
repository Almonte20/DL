<div class="row mt-3">
    <div class="col-md-12">
        <h1 class="mb-4">Explique de qué manera se cometió el hecho </h1>
    </div>
</div>

<div id="HechosDiv" class="pl-3">
    <div class="form-group col-lg-12">
        <div class="form-ic-cmp">
            {{-- <i class="fal fa-file-alt"></i>&nbsp; --}}
            {{-- <label for="narrativa">Narrativa de hechos</label>
            <label for="narrativa" style="font-size: 7px;">Requerido</label>
            <a href="#" class="btn img-llenado" onclick="LlenadoHechos()">
            </a> --}}
        </div>
        <textarea class="form-control required" name="narrativa" id="narrativa" rows="7" maxlength="3980"
            style="background-color:rgba(230, 238, 250, 0.5);">{{ old('narrativa','') }}</textarea>
        <div style="color:#FF0000;">
            {{ $errors->first('narrativa') }}
        </div>
    </div>

    <div class="row mt-3 ml-2">
        <div class="col-md-12">
            <label>¿Existió violencia?</label>
        </div>
    </div>

    <div class="row ">
        <div class="col-md-10 pl-5">
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="existioviolenciaS" name="existioviolencia" class="custom-control-input"
                    value="1">
                <label class="custom-control-label" for="existioviolenciaS">Si </label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="existioviolenciaN" name="existioviolencia" class="custom-control-input" value="0">
                <label class="custom-control-label" for="existioviolenciaN">No</label>
            </div>
        </div>
    </div>
</div>
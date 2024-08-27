<div class="container">
    <div class="row">
        <div class="col-md-12 text-center">
            <p class="mb-2" style="font-weight: bold; font-size: 22px;">EXPLIQUE DE QUÉ MANERA SE COMETIÓ LA VIOLENCIA</p>
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
                <label>¿Existió violencia?</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="existioviolenciaS" name="existioviolencia" class="custom-control-input"
                    value="1">
                <label class="custom-control-label" for="existioviolenciaS">SÍ </label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="existioviolenciaN" name="existioviolencia" class="custom-control-input" value="0">
                <label class="custom-control-label" for="existioviolenciaN">NO</label>
            </div>
        </div>
    </div>
</div>

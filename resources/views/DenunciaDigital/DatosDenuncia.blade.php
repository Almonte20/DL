<h1>Datos generales de la Denuncia:</h1>

<div class="form-group col-lg-12">
    <div class="form-ic-cmp">
        <i class="fal fa-file-alt"></i>&nbsp;
        <label for="narrativa">Narrativa de hechos</label>
        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#ModalInstrucciones" style="padding: 0rem 0rem; font-size: .6rem; line-height: 1; border-radius: .2rem; color: #000; background: #C09F77; min-width: 110px; height: 28px;">Instrucciones de llenado</button> <br>
    </div>
    <textarea class="form-control" name="narrativa" id="narrativa" rows="7" maxlength="3980" style="background-color:rgba(230, 238, 250, 0.5);">{{ old('narrativa','') }}</textarea>
    <div style="color:#FF0000;">
        {{ $errors->first('narrativa') }}
    </div>
</div>

<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12" style="display: none">
    <input type="text" name="coordenadas" class="form-control">
</div>

<h1>Lugar de los Hechos:</h1>


<div class="form-row col-lg-12">
    <div class="form-group col-md-6" id="carretera_div">
        <div class="form-ic-cmp">
            <i class="fal fa-list"></i>&nbsp;
            <label for="carretera">¿Dónde ocurrieron los hechos?</label>
        </div>
        <select name="carretera" class="form-control" style="background-color:rgba(230, 238, 250, 0.5);">
            <option value="0">Seleccione una opción</option>
            <option value="2">Domicilio</option>
            <option value="1">Tramo carretero</option>
        </select>
        <div style="color:#FF0000;">
            {{ $errors->first('carretera') }}
        </div>
    </div>
</div>

<div class="form-row col-lg-12 lugarhechos" style="display: none;">
    <div class="form-group col-md-4">
        <div class="form-ic-cmp">
            <i class="fal fa-map"></i>&nbsp;
            <label for="entidad_hechos">Estado</label>
        </div>
        <select name="entidad_hechos" class="form-control" style="background-color:rgba(230, 238, 250, 0.5);">
            <option value="">Seleccione una opcion</option>
            <!-- Aquí debes agregar las opciones del select -->
        </select>
        <div style="color:#FF0000;">
            {{ $errors->first('entidad_hechos') }}
        </div>
    </div>
    <!-- Otros elementos del formulario -->
</div>


<div class="form-group col-lg-12 lugarhechos_carretera" style="display: flex;">
    <div class="form-group col-md-12">
        <div class="form-ic-cmp">
            <i class="fas fa-road"></i>&nbsp;
            <label for="km_hechos">Km donde ocurrieron los hechos</label>
        </div>
        <input class="form-control" name="km_hechos" type="text" id="km_hechos">
        <div style="color:#FF0000;">
            
        </div>
    </div>
</div>

<div class="form-group col-lg-12 lugarhechos_observaciones" style="display: flex;">
    <div class="form-group col-lg-12">
        <div class="form-ic-cmp">
            <i class="fal fa-file-alt"></i>&nbsp;
            <label for="descripcion_lugar">Descripcion del lugar de los hechos</label>
            <i class="fad fa-question-circle" data-toggle="tooltip" data-placement="top" title="" data-original-title="Recuerda colocar todos los datos conocidos del lugar donde sucedieron los hechos. Ej. municipio más cerc, lugar conocido más cerca, etc."></i>&nbsp;
        </div>
        <textarea class="form-control" name="descripcion_lugar" id="descripcion_lugar" rows="7" maxlength="1990" style="background-color:rgba(230, 238, 250, 0.5);"></textarea>
    <!-- <textarea class="form-control" value="&lt;?php echo e(old(&#039;descripcion_lugar&#039;,&#039;&#039;)); ?&gt;" maxlength="4000" placeholder="Recuerda que debes ingresar una descripcion del lugar de los hechos." rows="7" style="background-color:rgba(230, 238, 250, 0.5);" name="descripcion_lugar" cols="50" id="descripcion_lugar"></textarea> -->
        <div style="color:#FF0000;">
            
        </div>
    </div>
</div>
<!-- Otros elementos del formulario -->

<div class="f1-buttons">
    <button type="button" class="btn btn-previous">Atrás</button>
    <button type="button" class="btn btn-next">Siguiente</button>
</div>

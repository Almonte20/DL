<input type="hidden" name="arrayTestigos" id="arrayTestigos" value="{{ isset($arrayTestigos) ? $arrayTestigos : '' }}" readonly>

<br>

<div id="div-tablaTestigo" style="display:block">
    <div class="row">
        <div class="col-md-12 py-3 px-md-.25">
            <div>
                <label for="arrayTestigos">Lista de Testigos</label>
                @if ($errors->has('arrayTestigos'))
                    <div class="skinAlert">
                        <span class="icon-exclamation-triangle">
                            {{ $errors->first('arrayTestigos') }}
                        </span>
                    </div>
                @endif
                <table class="table table-striped table-responsive-sm" id="tablaTestigo">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Atestiguante</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="3"><center><a style="cursor:pointer; color: #1c426a;" onclick="showForm('#div-formTestigo', '#div-tablaTestigo')"><i class="icon-line-circle-plus"></i> Haz clic aquí para agregar un testigo</a></center></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div id="div-formTestigo" style="display: none;">
    <div class="form-row col-lg-12">
        <div class="form-group col-md-4">
            <div class="form-ic-cmp">
                <i class="fad fa-id-card"></i>&nbsp;
                <label for="nombreTestigo">Nombre</label>
            </div>
            <input type="text" name="nombreTestigo" id="nombreTestigo" class="form-control" maxlength="50" style="background-color:rgba(230, 238, 250, 0.5);">
            <div style="color:#FF0000;">
                <!-- Error message -->
            </div>
        </div>
        <div class="form-group col-md-4">
            <div class="form-ic-cmp">
                <i class="fad fa-id-card"></i>&nbsp;
                <label for="paternoTestigo">Primer Apellido</label>
            </div>
            <input type="text" name="paternoTestigo" id="paternoTestigo" class="form-control" maxlength="50" style="background-color:rgba(230, 238, 250, 0.5);">
            <div style="color:#FF0000;">
                <!-- Error message -->
            </div>
        </div>
        <div class="form-group col-md-4">
            <div class="form-ic-cmp">
                <i class="fad fa-id-card"></i>&nbsp;
                <label for="maternoTestigo">Segundo Apellido</label>
            </div>
            <input type="text" name="maternoTestigo" id="maternoTestigo" class="form-control" maxlength="50" style="background-color:rgba(230, 238, 250, 0.5);">
            <div style="color:#FF0000;">
                <!-- Error message -->
            </div>
        </div>
        <!-- Otros campos -->
    </div>
    
    <div class="form-row col-lg-12">
        <div class="form-group col-md-12">
            <div class="form-ic-cmp">
                <i class="fal fa-file-alt"></i>&nbsp;
                <label for="adicionalTestigo">Información adicional</label>
            </div>
            <textarea name="adicionalTestigo" id="adicionalTestigo" class="form-control" maxlength="1950" placeholder="Ingrese información adicional del testigo como lo son: descripción de la persona, datos de localización, datos de contacto, etc." rows="4" style="background-color:rgba(230, 238, 250, 0.5);"></textarea>
            <div style="color:#FF0000;">
                <!-- Error message -->
            </div>
        </div>
    </div>

    <div class="f1-buttons">
        <button type="button" class="btn btn-danger" onclick="cancelar_testigo()" id="cancelarTestigo">Cancelar</button>
        <button type="button" class="btn btn-success" style="display:none;" onclick="button_editar_testigo()" id="editarTestigo">Actualizar</button>
        <button type="button" class="btn btn-success" onclick="registrar_testigo()" id="registrarTestigo">Agregar</button>
    </div>
    <hr>
</div>




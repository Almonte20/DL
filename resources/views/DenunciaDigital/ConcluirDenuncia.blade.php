<h1>Confirmar denuncia:</h1>

<div class="form-row col-lg-12 justify-content-center">
   
    <div class="form-group col-md-8">
        <div class="form-ic-cmp">
            <i class="fal fa-file"></i>&nbsp;
            <label for="credencial">Identificación oficial (INE o Pasaporte) *<font style="font-size: 8px">Formato aceptado: .jpg/.jpeg/.png </font>*<font style="font-size: 8px">Tamaño máximo: 3mb </font></label>
            <label for="credencial" style="font-size: 7px;">Requerido</label>

        </div>
        <input type="file" name="credencial" class="file_multi_image required" id="credencial" accept="image/*" required>
    </div>
    <div class="form-group col-md-4">
        <div id="preview_credencial"></div>
    </div>
</div>

<div class="form-row col-lg-12">
   
</div>

<div class="fa-4x d-none" id="div_spin">
    <center>
        <i class="fas fa-circle-notch fa-spin" style="color:#002b49;"></i>
    </center>
</div>

<div class="f1-buttons" id="botones_finalizacion">
    <button type="button" class="btn btn-previous " id="btn_atras">Atrás</button>
    <button type="button" onclick="guardarDenuncia(this)" class="btn btn-success" id="finalizar_denuncia"><i class="fa-solid fa-floppy-disk"></i> Registrar Denuncia</button>
    
</div>

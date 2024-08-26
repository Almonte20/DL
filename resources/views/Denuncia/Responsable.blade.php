<div class="row mt-3">
    <div class="col-md-12">
        <h1 class="mb-4">¿Quién es el responsable?</h1>
    </div>
</div>

<div class="row ">
    <div class="col-md-10 pl-5">
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="conozcoS" name="conozco" class="custom-control-input" value="1"
                onchange="conozcoResponsable()">
            <label class="custom-control-label" for="conozcoS">Lo conozco </label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="conozcoN" name="conozco" class="custom-control-input" value="0"
                onchange="conozcoResponsable()">
            <label class="custom-control-label" for="conozcoN">No lo conozco</label>
        </div>
    </div>
</div>

<div id="ResponsableDiv" class="pl-3 d-none">
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
</div>
<div class="pl-3">
    <div class="row mt-3 pl-3">
        <div class="col-md-12">
            <label>¿Existen datos de identificación del responsable?</label>
        </div>
    </div>

    <div class="row ">
        <div class="col-md-10 pl-5">
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="radioIdentificacionResponsableS" name="radioIdentificacionResponsable"
                    class="custom-control-input" value="1" onchange="identificacionResponsable()">
                <label class="custom-control-label" for="radioIdentificacionResponsableS">Si </label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="radioIdentificacionResponsableN" name="radioIdentificacionResponsable"
                    class="custom-control-input" value="0" onchange="identificacionResponsable()">
                <label class="custom-control-label" for="radioIdentificacionResponsableN">No</label>
            </div>
        </div>
    </div>

    <div class="form-row mt-3 col-lg-12 justify-content-center d-none" id="divIdentifiacionResponsable">

        <div class="form-group col-md-12">
            <textarea rows="6" class="form-control input-denuncia"
                placeholder="Ejemplos: Tatuajue en el rostro, cabello largo, ojos café claro, etc..."></textarea>
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

    function conozcoResponsable(){
        var valor = $('input:radio[name=conozco]:checked').val();
        if(valor == 0){
            $("#ResponsableDiv").addClass("d-none");
        }else{
            
            $("#ResponsableDiv").removeClass("d-none");
        }
    }

</script>
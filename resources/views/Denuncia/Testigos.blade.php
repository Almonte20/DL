<div class="col-md-12 text-center">
    <div>
        <p class="mb-2 txt-preguntas" >¿EXISTEN TESTIGOS DEL HECHO?</label>
    </div>
    <div class="custom-control custom-radio custom-control-inline">
        <input
          type="radio"
          id="existentestigosS"
          name="existen_testigos"
          class="custom-control-input required"
          value="1"
          data-message-error='"¿EXISTEN TESTIGOS DEL HECHO?" es requerido.'
          onchange="existenTestigos()">
        <label class="custom-control-label" for="existentestigosS">SÍ </label>
    </div>
    <div class="custom-control custom-radio custom-control-inline">
        <input
          type="radio"
          id="existentestigosN"
          name="existen_testigos"
          class="custom-control-input required"
          value="0"
          data-message-error='"¿EXISTEN TESTIGOS DEL HECHO?" es requerido.'
          onchange="existenTestigos()">
        <label class="custom-control-label" for="existentestigosN">NO</label>
    </div>
    <!-- mensaje error -->
    <div id="existen-testigos-mensaje-error" class="text-danger mt-1 d-none" style=" font-size: 14px;">
        Indique una opción.
    </div>
</div>

{{-- <div class="row mt-3">
    <div class="col-md-12">
        <h1 class="mb-4">¿Existen testigos del hecho?</h1>
    </div>
</div> --}}

<div id="testigosDiv" class="container pl-3">

    <div id="DivTestigos" class="d-none">

        <input class="d-none" type="hidden" name="arrayTestigos" id="arrayTestigos"
            value="{{ isset($arrayTestigos) ? $arrayTestigos : '' }}" readonly>


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
                                    <td colspan="3">
                                        <center><a style="cursor:pointer; color: #1c426a;"
                                                onclick="showForm('#div-formTestigo', '#div-tablaTestigo')"><i
                                                    class="icon-line-circle-plus"></i> Haz clic aquí para agregar un
                                                testigo</a></center>
                                    </td>
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
                        <label for="nombreTestigo">Nombre del testigo</label>
                    </div>
                    <input type="text" placeholder="Nombre" name="nombreTestigo" id="nombreTestigo" class="form-control" maxlength="50"
                        >
                    <div style="color:#FF0000;">
                        <!-- Error message -->
                    </div>
                </div>
                <div class="form-group col-md-4">
                    <div class="form-ic-cmp">
                        <i class="fad fa-id-card"></i>&nbsp;
                        <label for="paternoTestigo">Primer Apellido del testigo</label>
                    </div>
                    <input type="text" placeholder="Primer apellido" name="paternoTestigo" id="paternoTestigo" class="form-control" maxlength="50"
                        >
                    <div style="color:#FF0000;">
                        <!-- Error message -->
                    </div>
                </div>
                <div class="form-group col-md-4">
                    <div class="form-ic-cmp">
                        <i class="fad fa-id-card"></i>&nbsp;
                        <label for="maternoTestigo">Segundo Apellido del testigo</label>
                    </div>
                    <input type="text" placeholder="Segundo apellido" name="maternoTestigo" id="maternoTestigo" class="form-control" maxlength="50"
                        >
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
                    <textarea name="adicionalTestigo" id="adicionalTestigo" class="form-control" maxlength="1950"
                        placeholder="Ingrese información adicional del testigo como lo son: descripción de la persona, datos de localización, datos de contacto, etc."
                        rows="4" ></textarea>
                    <div style="color:#FF0000;">
                        <!-- Error message -->
                    </div>
                </div>
            </div>

            <div class="f1-buttons">
                <button type="button" class="btn-sm btn-cancel" onclick="cancelar_testigo()"
                    id="cancelarTestigo">CANCELAR</button>
                <button type="button" class="btn-sm btn-success-two" style="display:none;" onclick="button_editar_testigo()"
                    id="editarTestigo">ACTUALIZAR</button>
                <button type="button" class="btn-sm btn-success-two" onclick="registrar_testigo()"
                    id="registrarTestigo">AGREGAR</button>
            </div>
            <hr>
        </div>


    </div>
</div>

<script>
    function existenTestigos(){
        var valor = $('input:radio[name=existen_testigos]:checked').val();
        if(valor == 0){
            $("#DivTestigos").addClass("d-none");
        }else{

            $("#DivTestigos").removeClass("d-none");
        }
    }

</script>

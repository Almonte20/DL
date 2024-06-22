{{-- <div class="form-row col-lg-12">
    <div class="form-group col-md">
        <div class="form-ic-cmp">
            <i class="fal fa-list"></i>&nbsp;
            <label for="evidencias">Si no cuentas con evidencias, no es necesario agregar ninguna</label>
        </div>
    </div>
</div> --}}

<div class="form-row col-lg-12">
    <div class="form-group col-md-4">
        <div class="form-ic-cmp">
            <i class="fal fa-list"></i>&nbsp;
            <label for="evidencias">¿Cuenta con Evidencias? (Opcional)</label>
        </div>
        <select name="evidencias" onchange="Evidencias(this)" class="form-control required" style="background-color:rgba(230, 238, 250, 0.5);">
            <option value="1">Sí</option>
            <option value="2" selected>No</option>
        </select>
        <div style="color:#FF0000;">
            <!-- Aquí iría el mensaje de error -->
        </div>
    </div>
</div>
<div class="form-row col-lg-12 d-none" id="evidencias_div">
    <div class="form-group col-md-6">
        <div class="form-ic-cmp">
            <i class="fal fa-file"></i>&nbsp;
            <label for="documento">Documental</label>
        </div>
        <input type="file" name="documento" class="file_multi_image" id="documento" accept="application/pdf">
    </div>
    <div class="form-group col-md-6">
        <div class="form-ic-cmp">
            <i class="fal fa-camera"></i>&nbsp;
            <label for="image">Fotográfica</label>
        </div>
        <input type="file" name="image" class="file_multi_image" id="imagen" accept="image/*">
    </div>
    <div class="form-group col-md-6">
        <div class="form-ic-cmp">
            <i class="fal fa-video"></i>&nbsp;
            <label for="video">Video</label>
        </div>
        <input type="file" name="video" id="video" accept="video/*">
    </div>
    <div class="form-group col-md-6">
        <div class="form-ic-cmp">
            <i class="fal fa-volume-up"></i>&nbsp;
            <label for="audio">Audio</label>
        </div>
        <input type="file" name="audio" id="audio" accept="audio/*">
    </div>
    <br>
</div>
<div class="form-row col-lg-12">
    <div class="form-group col-md-4">
        <div id="preview_imagen"></div>
    </div>
    <div class="form-group col-md-4" id="preview_video" style="display: none">
        <img src="{{asset("img/denuncia/video_adjunto.png")}}" alt="Video Adjunto">
    </div>
    <div class="form-group col-md-4" id="preview_audio" style="display: none">
        <img src="{{asset("img/denuncia/audio_adjunto.png")}}" alt="Audio Adjunto">
    </div>
</div>

<script>

    function Evidencias(select){
        var valor = $(select).val();
        if(valor == 2){
            $("#evidencias_div").addClass("d-none");
        }else{
            $("#evidencias_div").removeClass("d-none");
        }
    }
</script>

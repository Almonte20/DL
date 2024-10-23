<div class="col-md-12 text-center">
    <div>
        <p class="mb-2 txt-preguntas">¿CUENTA CON PRUEBAS O EVIDENCIAS?</p>
    </div>

    @php
    
    $existenEvidencias = $evidencias->isNotEmpty();
    
    @endphp
    <div class="custom-control custom-radio custom-control-inline">
        <input
          type="radio"
          id="existenEvidenciasS"
          name="existen_evidencias"
          class="custom-control-input required"
          value="1"
          data-message-error='"¿CUENTA CON EVIDENCIAS?" es requerido.'
          onchange="existenEvidencias()"
          @if ($existenEvidencias){{'checked'}}@endif>
        <label class="custom-control-label" for="existenEvidenciasS">SÍ </label>
    </div>
    <div class="custom-control custom-radio custom-control-inline">
        <input
          type="radio"
          id="existenEvidenciasN"
          name="existen_evidencias"
          class="custom-control-input required"
          value="0"
          data-message-error='"¿CUENTA CON EVIDENCIAS?" es requerido.'
          onchange="existenEvidencias()"
          @if (!$existenEvidencias){{'checked'}}@endif>
        <label class="custom-control-label" for="existenEvidenciasN">NO</label>
    </div>
    <!-- mensaje de error -->
    <div id="existen-evidencias-mensaje-error" class="text-danger mt-1 d-none" style=" font-size: 14px;">
        Indique una opción.
    </div>
</div>

<div id="DivEvidencias" class="container pl-3 @if (!$existenEvidencias){{'d-none'}}@endif">

    <div class="form-row col-lg-12 d-none">
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

    <div id="ListaEvidenciasDiv">

        <div class="row justify-content-end">

            <div class="col-md text-end">
                <label>Lista de Evidencias</label>
            </div>

            <div class="col-md-4 text-center">
                <button type="button" class="btn-sm btn-search" onclick="agregar_evidencia()">
                    AGREGAR EVIDENCIA &nbsp;&nbsp; <i class="fa-solid fa-plus"></i>
                </button>
            </div>
        </div>

        <div class="row" id="DivTablaEvidencias">
            <div class="col-md-12 py-3 px-md-.25">
                <div>

                    <table class="table table-striped table-responsive-sm" id="tablaEvidencia">
                        <thead>
                            <tr>
                                <th style="width: 10%;" class="text-center">#</th>
                                <th class="text-center">Evidencia</th>
                                <th class="text-center">Tipo</th>
                                <th class="text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody id="evidencias_tbody">
                            @php
                                $count = 0;
                            @endphp
                            @if ($existenEvidencias)
                                
                            @foreach ($evidencias as $evidencia)
                                @php
                                    $count++;
                                    $info = new SplFileInfo($evidencia->url);
                                    $fileName = $info->getBasename();
                                @endphp
                                <tr class="text-center ev">
                                    <td>{{$count}}</td>
                                    <td class="filename">{{$fileName}}</td>
                                    <td></td>
                                    <td class="text-center"> 
                                        {{-- <i style="cursor:pointer;" data-toggle="tooltip" data-placement="bottom" title="Eliminar" class="fas fa-trash-alt icon-trash-alt" onclick="eliminar_evidencia(this);"></i> --}}
                                    </td>
                                </tr>  
                            @endforeach

                            @else
                            <tr><td colspan="4"><center><a style="cursor:pointer; color: #1c426a;" onclick="agregar_evidencia()"><i class="icon-line-circle-plus"></i> Haz clic aquí para agregar una evidencia</a></center></td></tr>
                            @endif

                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>



{{-- <input id="count_files" value="0"> --}}
<script>
    var count = {{$count}};
    var btn_evidencias = '<tr><td colspan="4"><center><a style="cursor:pointer; color: #1c426a;" onclick="agregar_evidencia()"><iclass="icon-line-circle-plus"></i> Haz clic aquí para agregar una </center> </td></tr>';

    
    function existenEvidencias(){
        var valor = $('input:radio[name=existen_evidencias]:checked').val();
        // alert(valor);
        if(valor == '0'){
            $("#DivEvidencias").addClass("d-none");
        }else{

            $("#DivEvidencias").removeClass("d-none");
        }
    }

    function llenarTipoArchivo(){
       
        $("#tablaEvidencia td.filename").each(function(){
            // var td_nombre = tr.find('td').eq(2).text();
            var td_nombre = $(this).text();
            var tr = $(this).parents("tr");
            var td_archivo = tr.find('td').eq(2);
            $(td_archivo).text(tipoArchivo(td_nombre));
        })
    }

    function Evidencias(select){
        var valor = $(select).val();
        if(valor == 2){
            $("#evidencias_div").addClass("d-none");
        }else{
            $("#evidencias_div").removeClass("d-none");
        }
    }

    function modal_evidencia(){
        $("#imageModal").modal("show");
    }
    function tipoArchivo(fileName){
        var fileExtension = fileName.split('.').pop().toLowerCase();

        // Determinar el tipo de archivo basado en la extensión
        var fileType;
        switch (fileExtension) {
            case 'jpg':
            case 'jpeg':
            case 'png':
                fileType = 'Imagen';
                break;
            case 'pdf':
                fileType = 'Documento PDF';
                break;
            case 'doc':
            case 'docx':
                fileType = 'Documento de Word';
                break;
            case 'csv':
            case 'xls':
            case 'xlsx':
                fileType = 'Hoja de cálculo de Excel';
                break;
            case 'ppt':
            case 'pptx':
                fileType = 'Presentación de PowerPoint';
                break;
            case 'txt':
                fileType = 'Archivo de texto';
                break;
            default:
                fileType = 'Desconocido';
        }
        return fileType;
    }

    function cargarArchivo(input){

        var td = $(input).parents("td");
        var tr = $(input).parents("tr");
        var td_tipo = tr.find('td').eq(2);
        var inputGroup = $(input).parents(".input-group");
        var valor = $(input).val();
        var fileName = $(input).prop('files')[0].name;
        $(inputGroup).addClass("d-none");
        $(td).append(fileName);
        // Obtener la extensión del archivo
      
        $(td_tipo).html(tipoArchivo(fileName));
       
    }

     function agregar_evidencia(){
        var bandera = true;
        var inputVacio;
        $('input[name="evidencias[]"]').each(function(){
            if($(this).val() == ""){
                bandera = false;
                inputVacio = $(this);
            }
        });

        if(bandera){

            count++;
           
            var tr = '<tr> ';
                tr += '<td class="text-center">'+count+'</td>';
            tr += '<td class="text-center"><div class="input-group mb-3">  <div class="input-group-prepend">  </div>  <div class="custom-file">    <input type="file" class="custom-file-input" onchange="cargarArchivo(this)" name="evidencias[]">    <label class="custom-file-label" for="inputGroupFile01">Buscar Archivo</label>  </div></div></td>';
            tr += '<td class="text-center"></td>';
            tr += ' <td class="text-center"> <i style="cursor:pointer;" data-toggle="tooltip" data-placement="bottom" title="Eliminar" class="fas fa-trash-alt icon-trash-alt" onclick="eliminar_evidencia(this);"></i></td>';
            tr += '</tr>';
            if(count == 1){
                btn_evidencias = $("#evidencias_tbody").html();
                $("#evidencias_tbody").html(tr);
            }else{
                $("#evidencias_tbody").append(tr);
            }
        }else{
            // Swal.fire("Ingresa primero la evidencia antes de agregar otra", "", "warning");

            Swal.fire({
                    icon: "warning",
                    title: "",
                    text: "INGRESA PRIMERO LA EVIDENCIA ANTES DE AGREGAR OTRA.",
                    confirmButtonText: "ACEPTAR",
                    customClass: {
                        confirmButton: 'swal2-deny' // Clase CSS personalizada para el botón "Confirm" de la segunda ventana
                    },
                });
        }
    }



    function AgregarEvidencia(){

        const originalInput = document.getElementById('imageInput');
        var nombre = "";
        if (originalInput.files.length > 0) {
            // Obtener el nombre del primer archivo
            const fileName = originalInput.files[0].name;
            // Mostrar el nombre del archivo en el párrafo
            const fileExtension = fileName.split('.').pop();

            const clonedInput = originalInput.cloneNode(true);
            // var count_evidencia = document.querySelectorAll('input[name="evidencias[]"]').length + 1;
            var count_evidencia = parseInt(document.getElementById('count_files').value) + 1;
            clonedInput.id = 'evidenciaInput' + count_evidencia;
            clonedInput.name = 'evidencias[]';
            var table = "<tr><td class='d-none' id='tr_input"+count_evidencia+"'></td><td >"+ count_evidencia + "</td><td >"+fileName+"</td> <td>"+fileExtension+"</td> <td> <i style='cursor:pointer;' data-toggle='tooltip' data-placement='bottom' title='Eliminar' class='fas fa-trash-alt icon-trash-alt' onclick='eliminar_evidencia(this);''></i></td>  <td></td> </tr>";
            if(count_evidencia == 1){
                document.getElementById("evidencias_tbody").innerHTML = table;
            }else{
                document.getElementById("evidencias_tbody").innerHTML += table;
            }
            document.getElementById("tr_input"+count_evidencia).appendChild(clonedInput);
            document.getElementById("count_files").value = count_evidencia;
            var htmlTags = '<tr>' + '<td colspan="3"><center><a style="cursor:pointer; color: #1c426a;" onclick="showForm(&#34;#div-formTestigo&#34;, &#34;#div-tablaTestigo&#34;)"><i class="icon-line-circle-plus"></i> Haz clic aquí para agregar un registro</a></center></td>' + '</tr>';

            $('#imageModal').modal('hide');
        }
    }

    function eliminar_evidencia(boton){
        // var sinEvidencias = ' <tr><td colspan="4"><center><a style="cursor:pointer; color: #1c426a;" onclick="modal_evidencia()"><iclass="icon-line-circle-plus"></i> Haz clic aquí para agregar una evidencia</a></center></td></tr>';
        Swal.fire({
            title: "¿Está seguro de que quiere eliminar esta evidencia?",
            showDenyButton: true,
            showCancelButton: false,
            confirmButtonText: "Si, eliminar",
            denyButtonText: `Cancelar`
        }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                var tr = $(boton).parents("tr");
                Swal.fire("¡Evidencia eliminada!", "", "success");
                $(tr).remove();
                var count_evidencia = document.querySelectorAll('input[name="evidencias[]"]').length;

                if(count_evidencia == 0){
                    $("#evidencias_tbody").html(btn_evidencias);
                    count = 0;
                }
            }
        });
    }



</script>

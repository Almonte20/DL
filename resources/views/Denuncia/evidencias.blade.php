<div class="col-md-12 text-center">
    <div>
        <p class="mb-2" style="font-weight: bold; font-size: 22px;">¿CUENTA CON EVIDENCIAS?</p>
    </div>
    <div class="custom-control custom-radio custom-control-inline">
        <input type="radio" id="existenEvidenciasS" name="existenEvidencias" class="custom-control-input"
            value="1" onchange="existen_evidencias()">
        <label class="custom-control-label" for="existenEvidenciasS">SÍ </label>
    </div>
    <div class="custom-control custom-radio custom-control-inline">
        <input type="radio" id="existenEvidenciasN" name="existenEvidencias" class="custom-control-input"
            value="0" onchange="existen_evidencias()">
        <label class="custom-control-label" for="existenEvidenciasN">NO</label>
    </div>
</div>

<div id="DivEvidencias" class="container pl-3 d-none">

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
    <div class="form-row col-lg-12 d-none">
        <div class="form-group col-md-4">
            <div id="preview_imagen"></div>
        </div>
        <div class="form-group col-md-4" id="preview_video" style="display: none">
            <img src="{{asset(" img/denuncia/video_adjunto.png")}}" alt="Video Adjunto">
        </div>
        <div class="form-group col-md-4" id="preview_audio" style="display: none">
            <img src="{{asset(" img/denuncia/audio_adjunto.png")}}" alt="Audio Adjunto">
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
                            <tr>
                                <td colspan="4">
                                    <center><a style="cursor:pointer; color: #1c426a;" onclick="agregar_evidencia()"><i
                                                class="icon-line-circle-plus"></i> Haz clic aquí para agregar una
                                            evidencia</a>
                                    </center>
                                </td>
                            </tr>
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content ">
            <div class="modal-header">
                <h5 class="modal-title" id="imageModalLabel">Agregar
                    Evidencia</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-center">
                    <div class=" col-md-8">
                        <form id="imageForm">
                            <div class="form-group">
                                <input type="file" name="files[]" class="form-control-file" id="imageInput">
                            </div>
                        </form>
                    </div>
                </div>
                <div class="form-row col-lg-12">
                    <div class="form-group col-md-4 d-none">
                        <div id="preview_imagen"></div>
                    </div>
                    <div class="form-group col-md-4 d-none text-center" id="preview_video">
                        <img src="{{asset(" img/denuncia/video_adjunto.png")}}" alt="Video Adjunto">
                    </div>
                    <div class="form-group col-md-4 d-none" id="preview_audio">
                        <img src="{{asset(" img/denuncia/audio_adjunto.png")}}" alt="Audio Adjunto">
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id="addImage"
                    onclick="AgregarEvidencia()">Agregar</button>
            </div>
        </div>
    </div>
</div>
{{-- <input id="count_files" value="0"> --}}
<script>
    var count = 0;
    var btn_evidencias = "";


    function existen_evidencias(){
        var valor = $('input:radio[name=existenEvidencias]:checked').val();
        // alert(valor);
        if(valor == 0){
            $("#DivEvidencias").addClass("d-none");
        }else{

            $("#DivEvidencias").removeClass("d-none");
        }
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
        // alert(fileName);
        $(td_tipo).html(fileType);
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

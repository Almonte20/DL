var array_testigo = new Array();
var id_editar_testigo = '';

function showForm(elementoHTMLDivShow, elementoHTMLDivHide) {
    displayDivShow(elementoHTMLDivShow);
    displayDivHide(elementoHTMLDivHide);

}

function hideForm(elementoHTMLDivHide, elementoHTMLDivShow) {
    displayDivHide(elementoHTMLDivHide);
    displayDivShow(elementoHTMLDivShow);
}

function displayDivShow(elementoHTML) {
    $(elementoHTML).show();
}

function displayDivHide(elementoHTML) {
    $(elementoHTML).hide();
}

function limpiarForm_Testigo() {
    $('#nombreTestigo').val('');
    $('#paternoTestigo').val('');
    $('#maternoTestigo').val('');
    $('#adicionalTestigo').val('');
}

function cancelar_testigo() {
    hideForm('#div-formTestigo', '#div-tablaTestigo');
    $("#registrarTestigo").css("display", "inline-block");
    $("#editarTestigo").css("display", "none");
    limpiarForm_Testigo();
}

function registrar_testigo() {
    var nombre = $("#nombreTestigo").val();
    var paterno = $("#paternoTestigo").val();
    var materno = $("#maternoTestigo").val();
    var adicional = $("#adicionalTestigo").val();
    if (nombre != '' || paterno != '' || materno != '' || adicional != '') {
        array_testigo.push({ "nombreTestigo": nombre, "paternoTestigo": paterno, "maternoTestigo": materno, "adicionalTestigo": adicional });
        crear_tabla_testigo();
    } else {
        Swal.fire(
            '¡Advertencia!',
            'Es necesario indicar un nombre, un apellido o describir al testigo',
            'error'
        )
    }
}

function crear_tabla_testigo() {
    limpiarForm_Testigo();
    $('#tablaTestigo tbody').html('');
    if (array_testigo.length > 0) {
        $('#arrayTestigos').val(JSON.stringify(array_testigo));
    } else {
        $('#arrayTestigos').val('');
    }
    for (var a = 0; a < array_testigo.length; a++) {
        var nombre = '';
        var aux = '';
        if (array_testigo[a]["nombreTestigo"] != '') {
            nombre = array_testigo[a]["nombreTestigo"] + " " + array_testigo[a]["paternoTestigo"] + " " + array_testigo[a]['maternoTestigo'];
            aux = "Nombre del testigo";
        } else {
            aux = array_testigo[a]["adicionalTestigo"];
            nombre = array_testigo[a]["adicionalTestigo"].substring(0, 20) + "...";
        }
        var num = a + 1;
        var htmlTags = "<tr>" +
            "<td>" + num + "</td>" +
            "<td data-toggle='tooltip' data-placement='top' title='" + aux + "'>" + nombre + "</td>" +
            "<td><i style='cursor:pointer;' data-toggle='tooltip' data-placement='bottom' title='Editar' class='fal fa-edit' onclick='editar_testigo(" + a + "); '></i>&nbsp; &nbsp;" +
            "<i style='cursor:pointer;' data-toggle='tooltip' data-placement='bottom' title='Eliminar' class='fas fa-trash-alt icon-trash-alt' onclick='eliminar_testigo(" + a + ");'></i>" + "</td>" +
            "</tr>";
        $('#tablaTestigo tbody').append(htmlTags);

    }
    var htmlTags = '<tr>' + '<td colspan="3"><center><a style="cursor:pointer; color: #1c426a;" onclick="showForm(&#34;#div-formTestigo&#34;, &#34;#div-tablaTestigo&#34;)"><i class="icon-line-circle-plus"></i> Haz clic aquí para agregar un registro</a></center></td>' + '</tr>';

    $('#tablaTestigo tbody').append(htmlTags);

    hideForm('#div-formTestigo', '#div-tablaTestigo');
}

function editar_testigo(id) {
    id_editar_testigo = id;
    $("#nombreTestigo").val(array_testigo[id]["nombreTestigo"]);
    $("#paternoTestigo").val(array_testigo[id]["paternoTestigo"]);
    $("#maternoTestigo").val(array_testigo[id]["maternoTestigo"]);
    $("#adicionalTestigo").val(array_testigo[id]["adicionalTestigo"]);
    showForm('#div-formTestigo', '#div-tablaTestigo');
    $("#editarTestigo").css("display", "inline-block");
    $("#registrarTestigo").css("display", "none");
}

function button_editar_testigo() {
    if ($("#nombreTestigo").val() != '' || $("#paternoTestigo").val() != '' || $("#maternoTestigo").val() != '' || $("#adicionalTestigo").val() != '') {
        array_testigo[id_editar_testigo]["nombreTestigo"] = $("#nombreTestigo").val();
        array_testigo[id_editar_testigo]["paternoTestigo"] = $("#paternoTestigo").val();
        array_testigo[id_editar_testigo]["maternoTestigo"] = $("#maternoTestigo").val();
        array_testigo[id_editar_testigo]["adicionalTestigo"] = $("#adicionalTestigo").val();
        crear_tabla_testigo();

        $("#registrarTestigo").css("display", "inline-block");
        $("#editarTestigo").css("display", "none");
    } else {
        Swal.fire(
            '¡Advertencia!',
            'Es necesario indicar un nombre, un apellido o describir al testigo',
            'error'
        )
    }
}

function eliminar_testigo(elemento) {
    Swal.fire({
        title: '¡Advertencia!',
        text: "¿Desea eliminar el testigo?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'No',
        confirmButtonText: 'Sí'
    }).then((result) => {
        if (result.value) {
            array_testigo.splice(elemento, 1);
            crear_tabla_testigo();
            Swal.fire(
                '¡Éxito!',
                'Testigo eliminado correctamente.',
                'success'
            )
        }
    })

}
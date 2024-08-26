function scroll_to_class(element_class, removed_height) {
    var scroll_to = $(element_class).offset().top - removed_height;
    if ($(window).scrollTop() != scroll_to) {
        $('html, body').stop().animate({ scrollTop: scroll_to }, 0);
    }
}


function bar_progress(progress_line_object, direction) {
    var number_of_steps = progress_line_object.data('number-of-steps');
    var now_value = progress_line_object.data('now-value');
    var new_value = 0;
    if (direction == 'right') {
        new_value = now_value + (100 / number_of_steps);
    } else if (direction == 'left') {
        new_value = now_value - (100 / number_of_steps);
    }
    progress_line_object.attr('style', 'width: ' + new_value + '%;').data('now-value', new_value);
}

const generarCodigoVerificacion = () => {
    return Math.floor(100000 + Math.random() * 90000);
}

const enviarCodigoVerificacion = async(correo, whatsapp, codigoVerificacion) => {
    try {
        // Realizar la solicitud usando fetch y esperar la respuesta
        const response = await fetch('api/enviar-codigo-verificacion', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                correo,
                whatsapp,
                codigo: codigoVerificacion
            })
        });

        // Verificar si la respuesta fue exitosa
        if (!response.ok) {
            throw new Error('Error en la solicitud: ' + response.statusText);
        }

        // Convertir la respuesta a JSON
        const data = await response.json();

        // Trabajar con los datos recibidos
        console.log(data);

    } catch (error) {
        // Manejar errores de red u otros
        console.error('Hubo un problema con la solicitud:', error);
    }
}

var msg = "";

jQuery(document).ready(function() {
/*
    Form
*/

let correoNotification;
let whatsappNotification;

$('.f1 fieldset:first').fadeIn('slow');

$('.f1 input[type="text"], .f1 input[type="password"], .f1 textarea').on('focus', function() {
$(this).removeClass('input-error');
});

$('#btn-atras').on('click', function() {
    console.log('boton atras');


    $('#step-hechos').removeClass('active');
    $('#datos-hechos').addClass('d-none');
    $('#step-denunciante').addClass('active');
    $('#datos-denunciante').removeClass('d-none');
});

// next step
$('.f1 .btn-next').on('click', function() {

console.log('siguientte');


var parent_fieldset = $(this).parents('section');
console.log(parent_fieldset);

var next_step = true;
// navigation steps / progress steps
var current_active_step = $(this).parents('.f1').find('.f1-step.active');
// var progress_line = $(this).parents('.f1').find('.f1-progress-line');

let errores_validacion = 0;



// fields validation
parent_fieldset.find('.required').each(function() {


    // if ($('#pais').val() != '165') {
    //     parent_fieldset.find('#domicilio_extranjero').each(function() {
    //         if ($(this).val() == "") {
    //             $("#campos_faltantes").css("display", "flex");
    //             $(this).addClass('input-error');
    //             next_step = false;
    //             msg = 'Faltan campos por llenar...';
    //         } else {
    //             $(this).removeClass('input-error');
    //         }
    //     });
    // } else {
    //     if ($('#pais').val() == '165') {
    //         parent_fieldset.find('#entidad,#municipio,#calle,#numext,#CP').each(function() {
    //             if ($(this).val() == "") {
    //                 $("#campos_faltantes").css("display", "flex");
    //                 $(this).addClass('input-error');
    //                 next_step = false;
    //                 msg = 'Faltan campos por llenar...';
    //             } else {
    //                 $(this).removeClass('input-error');
    //             }
    //         });
    //     }
    // }
    // if ($('#fecha_hechos').val() == 1) {

    //     parent_fieldset.find('#fecha_exacta,#hora_exacta').each(function() {
    //         if ($(this).val() == "") {
    //             $("#campos_faltantes").css("display", "flex");
    //             $(this).addClass('input-error');
    //             next_step = false;
    //             msg = 'Faltan campos por llenar...';
    //         } else {
    //             $(this).removeClass('input-error');
    //         }
    //     });
    // } //else{
    // if($('#fecha_hechos').val() == 2){
    // parent_fieldset.find('#fecha_inicio,#hora_inicio,#fecha_fin,#hora_fin').each(function() {
    //     if( $(this).val() == "" ) {
    //         $("#campos_faltantes").css("display","flex");
    //         $(this).addClass('input-error');
    //         next_step = false;
    //     }
    //     else {
    //         $(this).removeClass('input-error');
    //     }
    // });
    // }
    //}

    // // VALIDACION LUGAR DE LOS HECHOS
    // if ($('#carretera').val() != 2) {
    //     parent_fieldset.find('#descripcion_lugar').each(function() {
    //         if ($(this).val() == "") {
    //             $("#campos_faltantes").css("display", "flex");
    //             $(this).addClass('input-error');
    //             next_step = false;
    //             msg = 'Faltan campos por llenar...';

    //         } else {
    //             $(this).removeClass('input-error');
    //         }
    //     });
    // } else {
    //     if ($('#carretera').val() == 2) {
    //         parent_fieldset.find('#km_hechos').each(function() {
    //             if ($(this).val() == "") {
    //                 $("#campos_faltantes").css("display", "flex");
    //                 $(this).addClass('input-error');
    //                 next_step = false;
    //                 msg = 'Faltan campos por llenar...';
    //             } else {
    //                 $(this).removeClass('input-error');
    //             }
    //         });
    //     }
    // }

    //------------------------------

    var elemento = $(this);
    // Obtener el nombre del tipo de elemento HTML

    var nombreInput = elemento.attr('name');
    var tipoElemento = elemento.prop("nodeName"); // O $elemento.attr("nodeName");



    if (elemento.val() == "" || (tipoElemento == "SELECT" && elemento.val() == "0")) {
        // $("#campos_faltantes").css("display", "flex");
        $("#campos_faltantes").removeClass("d-none");
        $(this).addClass('input-error');
        next_step = false;
        msg = 'FALTAN CAMPOS POR LLENAR...';
        errores_validacion += 1;
    } else {
        $(this).removeClass('input-error');
    }

    if (nombreInput == "correo") {
        if (!validarFormatoCorreo(elemento.val())) {
            $(this).addClass('input-error');
            next_step = false;
            msg = 'El correo no cuenta con un formato válido';
            errores_validacion += 1;
        }
    } else if (nombreInput == "evidencias") {
        var documento = $("#documento").val();
        var audio = $("#audio").val();
        var video = $("#video").val();
        var imagen = $("#image").val();
        if (elemento.val() == 1 && (documento == "" && audio == "" && video == "" && imagen == "")) {
            next_step = false;
            msg = 'Seleccionaste que cuentas con evidencias, agrega por lo menos una evidencia';

        }
    }




});



if ((parent_fieldset.attr('id') === 'datos-denunciante') && (errores_validacion == 0)) {
    console.log(`Errores: ${errores_validacion}`);
    console.log(`Correo: ${correoNotification}`);
    console.log(`Telefono: ${whatsappNotification}`);

    next_step = false;

    // medios de notificacion
    const correo = $('[name="correo"]').val();
    const whatsapp = $('[name="telefono"]').val();

    if (correoNotification != correo || whatsappNotification != whatsapp) {

        // se genera numero aleatorio
        let codigoVerificacion = generarCodigoVerificacion();
        console.log(`Código verificación: ${codigoVerificacion}`);
        // se envia codigo de verificacion
        enviarCodigoVerificacion(correo, whatsapp, codigoVerificacion);

        Swal.fire({
            title: "CÓDIGO DE VERIFICACIÓN",
            html: `
                <p style="font-size: 22px;">PARA VALIDAR SU IDENTIDAD. SE HA ENVIADO UN <b>CÓDIGO DE VERIFICACIÓN</b> DE SEIS DÍGITOS AL CORREO <b>${correo}</b></p>
                <br>
                <div style="display: flex; justify-content: space-between; gap: 10px; padding: 0 20px;">
                <input type="text" id="input1" class="swal2-input" maxlength="1" style="width: 45px; text-align: center; font-size: 24px;" />
                <input type="text" id="input2" class="swal2-input" maxlength="1" style="width: 45px; text-align: center; font-size: 24px;" />
                <input type="text" id="input3" class="swal2-input" maxlength="1" style="width: 45px; text-align: center; font-size: 24px;" />
                <input type="text" id="input4" class="swal2-input" maxlength="1" style="width: 45px; text-align: center; font-size: 24px;" />
                <input type="text" id="input5" class="swal2-input" maxlength="1" style="width: 45px; text-align: center; font-size: 24px;" />
                <input type="text" id="input6" class="swal2-input" maxlength="1" style="width: 45px; text-align: center; font-size: 24px;" />
                </div>
                <br>
            `,
            allowOutsideClick: false,
            confirmButtonText: "VERIFICAR CÓDIGO",
            confirmButtonColor: "#008f39",
            showLoaderOnConfirm: true,
            showDenyButton: true,
            denyButtonText: "REENVIAR CÓDIGO",
            denyButtonColor: "#142f4a",
            showCancelButton: true,
            cancelButtonText: "EDITAR DATOS",
            cancelButtonColor: "#808080",
            customClass: {
                confirmButton: 'btn-verificar-codigo' // Clase CSS personalizada para el botón "Confirm" de la segunda ventana
              },
            didOpen: () => {
                const inputs = ['input1', 'input2', 'input3', 'input4', 'input5', 'input6'];

                inputs.forEach((inputId, index) => {
                    const inputElement = document.getElementById(inputId);

                    inputElement.addEventListener('input', () => {
                        if (inputElement.value.length === 1 && index < inputs.length - 1) {
                            document.getElementById(inputs[index + 1]).focus(); // Mover el foco al siguiente input
                        }
                    });

                    inputElement.addEventListener('keydown', (e) => {
                        if (e.key === 'Backspace' && inputElement.value === '' && index > 0) {
                          document.getElementById(inputs[index - 1]).focus(); // Mover el foco al input anterior
                        }
                    });
                });
            },
            preConfirm: () => {
                const input1 = document.getElementById('input1').value;
                const input2 = document.getElementById('input2').value;
                const input3 = document.getElementById('input3').value;
                const input4 = document.getElementById('input4').value;
                const input5 = document.getElementById('input5').value;
                const input6 = document.getElementById('input6').value;

                const codigoIngresado = `${input1}${input2}${input3}${input4}${input5}${input6}`;
                console.log(codigoIngresado);

                // Validar el código de verificación
                if (codigoVerificacion != codigoIngresado) {
                    Swal.showValidationMessage('El código ingresado es incorrecto.');
                    return false;
                }

                correoNotification = correo;
                whatsappNotification = whatsapp;

                Swal.fire({
                    icon: "success",
                    title: "VERIFICACIÓN EXITOSA",
                    text: "EL CÓDIGO ES CORRECTO.",
                    confirmButtonText: "ACEPTAR",
                    customClass: {
                        confirmButton: 'swal2-deny' // Clase CSS personalizada para el botón "Confirm" de la segunda ventana
                    },
                });

                // Continuar con el flujo del formulario
                // parent_fieldset.fadeOut(400, function() {
                //     $("#campos_faltantes").css("display", "none");
                //     current_active_step.removeClass('active').addClass('activated').next().addClass('active');
                //     bar_progress(progress_line, 'right');
                //     $(this).next().fadeIn();
                //     scroll_to_class($('.f1'), 20);
                // });

                $('#step-denunciante').removeClass('active');
                $('#datos-denunciante').addClass('d-none');
                $('#step-hechos').addClass('active');
                $('#datos-hechos').removeClass('d-none');

                var nombre = $("#Nombre_denunciante").val();
                    var primerAp = $("#PrimerApellido_denunciante").val();
                    var SegundoAp = $("#SegundoApellido_denunciante").val();

                    $("#nombre-victima").html(nombre);
                    $("#primer-apellido-victima").html(primerAp);
                    $("#segundo-apellido-victima").html(SegundoAp);

                return true;
            },
            preDeny: () => {
                /** REENVIO DEL CÓDIGO DE VALIDACIÓN */
                // Lógica para reenviar el código
                //   Swal.fire("Código reenviado", "Hemos reenviado el código a tu correo y WhatsApp.", "info");
                console.log(`Código verificación antes: ${codigoVerificacion}`);
                codigoVerificacion = generarCodigoVerificacion();
                console.log(`Código verificación despues: ${codigoVerificacion}`);
                // se envia codigo de verificacion nuevamente
                enviarCodigoVerificacion(correo, whatsapp, codigoVerificacion);

                toastr.success('Se reenvió el código de validacón con exito.')

                // Retorna false para evitar que el cuadro de diálogo se cierre
                return false;
                // Reenvío del código de verificación
                console.log(`Código verificación antes: ${codigoVerificacion}`);
                codigoVerificacion = generarCodigoVerificacion();
                console.log(`Código verificación después: ${codigoVerificacion}`);
                enviarCodigoVerificacion(correo, whatsapp, codigoVerificacion);
                toastr.success('Se reenvió el código de validación con éxito.');
                return false;
            },
        });

    } else {
        // parent_fieldset.fadeOut(400, function() {
        //     //quita el mensaje de error
        //     $("#campos_faltantes").css("display", "none");
        //     // change icons
        //     current_active_step.removeClass('active').addClass('activated').next().addClass('active');
        //     // progress bar
        //     bar_progress(progress_line, 'right');
        //     // show next step
        //     $(this).next().fadeIn();
        //     // scroll window to beginning of the form
        //     scroll_to_class($('.f1'), 20);


        // });

        var nombre = $("#Nombre_denunciante").val();
                    var primerAp = $("#PrimerApellido_denunciante").val();
                    var SegundoAp = $("#SegundoApellido_denunciante").val();

                    $("#nombre-victima").html(nombre);
                    $("#primer-apellido-victima").html(primerAp);
                    $("#segundo-apellido-victima").html(SegundoAp);

        $('#step-denunciante').removeClass('active');
        $('#datos-denunciante').addClass('d-none');
        $('#step-hechos').addClass('active');
        $('#datos-hechos').removeClass('d-none');
    }






} else {

    // fields validation

    if (next_step) {
        parent_fieldset.fadeOut(400, function() {
            var nombre = $("#Nombre_denunciante").val();
            var primerAp = $("#PrimerApellido_denunciante").val();
            var SegundoAp = $("#SegundoApellido_denunciante").val();

            $("#nombre-victima-txt").html(nombre);
            $("#primer-apellido-victima-txt").html(primerAp);
            $("#segundo-apellido-victima-txt").html(SegundoAp);
            //quita el mensaje de error
            $("#campos_faltantes").css("display", "none");
            // change icons
            current_active_step.removeClass('active').addClass('activated').next().addClass('active');
            // progress bar
            bar_progress(progress_line, 'right');
            // show next step
            $(this).next().fadeIn();
            // scroll window to beginning of the form
            scroll_to_class($('.f1'), 20);
        });
    } else {
        Swal.fire({
            title: "¡CUIDADO!",
            text: msg,
            icon: "error",
            confirmButtonText: "ACEPTAR",
            customClass: {
                confirmButton: 'swal2-deny' // Clase CSS personalizada para el botón "Confirm" de la segunda ventana
            },
        });
        // alertas(msg);
    }
}


$('html,body').animate({ scrollTop: 0 }, 900);
return false;
});

function alertas(msg) {
new PNotify({
    title: 'Error:',
    text: msg,
    type: 'error',
    addclass: "stack-bottomright"
});
}

function validarFormatoCorreo(correo) {
// Expresión regular para validar el formato del correo electrónico
var regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

// Verificar si el correo cumple con la expresión regular
return regex.test(correo);
}

// previous step
$('.f1 .btn-previous').on('click', function() {
// navigation steps / progress steps
var current_active_step = $(this).parents('.f1').find('.f1-step.active');
var progress_line = $(this).parents('.f1').find('.f1-progress-line');

$(this).parents('fieldset').fadeOut(400, function() {
    // change icons
    current_active_step.removeClass('active').prev().removeClass('activated').addClass('active');
    // progress bar
    bar_progress(progress_line, 'left');
    // show previous step
    $(this).prev().fadeIn();
    // scroll window to beginning of the form
    scroll_to_class($('.f1'), 20);
});
});

// submit
$('.f1').on('submit', function(e) {
e.preventDefault();

// fields validation
$(this).find('.required').each(function() {
    if ($(this).val() == "") {
        $(this).addClass('input-error');
    } else {
        $(this).removeClass('input-error');
    }
});
// fields validation

});


});

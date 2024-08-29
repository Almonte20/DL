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
        // console.log(data);

    } catch (error) {
        // Manejar errores de red u otros
        console.error('Hubo un problema con la solicitud:', error);
    }
}

var msg = "";

jQuery(document).ready(function() {

    $('input[name="conoce_responsable"]').on('change', () => {
        $('#conoce-responsable-mensaje-error').addClass('d-none');

        if( $('input[name="conoce_responsable"]:checked').val() == '1')
            $('#nombre-alias-responsable').addClass('required');
        else
            $('#nombre-alias-responsable').removeClass('required');
    })

    $('input[name="conoce_rasgos_responsable"]').on('change', () => {
        $('#rasgos-responsable-mensaje-error').addClass('d-none');
        // Comprobar si hay un valor seleccionado
        if ($('input[name="conoce_rasgos_responsable"]:checked').val() == '1') {
            $('#rasgos-distintivos-responsable').addClass('required');
        } else {
            $('#rasgos-distintivos-responsable').removeClass('required');
        }

        // Obtener los radios de 'conoce_direccion_responsable'
        const radios = document.getElementsByName('conoce_direccion_responsable');
        // Recorrer los radios para agregar o quitar la clase 'required'
        for (let i = 0; i < radios.length; i++) {
            if ($('input[name="conoce_rasgos_responsable"]:checked').val() == '1') {
                $(radios[i]).addClass('required'); // Convertir a jQuery para usar addClass
            } else {
                $(radios[i]).removeClass('required'); // Convertir a jQuery para usar removeClass
            }
        }
    });

    $('input[name="conoce_direccion_responsable"]').on('change', () => {
        $('#conoce-direccion-responsable-mensaje-error').addClass('d-none');

        if($('input[name="conoce_direccion_responsable"]:checked').val() == '1')
            $('#direccion-responsable').addClass('required')
        else
            $('#direccion-responsable').removeClass('required')
    })

    $('input[name="existio_violencia"]').on('change', () => {
        $('#existio-violencia-mensaje-error').addClass('d-none');

        if($('input[name="existio_violencia"]:checked').val() == '1')
            $('#narrativa-violencia').addClass('required')
        else
            $('#narrativa-violencia').removeClass('required')
    })










    // variables para seter correo y telefono proporcionado y realizar comparaciones y acciones en caso de que el usuario los cambie
    let correoNotification;
    let whatsappNotification;


$('.f1 input[type="text"], .f1 input[type="password"], .f1 textarea').on('focus', function() {
$(this).removeClass('input-error');
});


    $('#btn-atras').on('click', function() {
        $('#step-hechos').removeClass('active');
        $('#datos-hechos').addClass('d-none');
        $('#step-denunciante').addClass('active');
        $('#datos-denunciante').removeClass('d-none');
    });

    // validaciones DENUNCIANTE
    $('#btn-step-one').on('click', function() {
        let elementSection = $('#datos-denunciante'); // elemento section en donde estan los inputs a validar
        let erroresValidacion = false; // bandera que define si hay campos sin llenar
        var messageError; // mensaje de error a desplegar de acuerdo al input

        // validación de inpiuts
        elementSection.find('.required').each(function() {
            let elemento = $(this);
            let tipoElemento = elemento.prop("nodeName");

            console.log( tipoElemento );


            if (elemento.val() == "" || (tipoElemento == "SELECT" && elemento.val() == "0")) {
                // al elemento se agrega la clase para mostar error
                $(this).addClass('input-error');
                // asignacion del primer mensaje de error y banderas de validación
                if ( messageError == undefined ) {
                    messageError = elemento.attr('data-message-error');
                    nextStep = false;
                    erroresValidacion = true;
                }
            } else {
                $(this).removeClass('input-error');
            }
        });

        // sweetalert mostrar error
        if ( erroresValidacion == true ) {
            Swal.fire({
                title: "¡FALTAN DATOS POR LLENAR!",
                html: `<p style="font-size:26px !important;"><b>${messageError}</b></p>`,
                icon: "error",
                confirmButtonText: "ACEPTAR",
                customClass: {
                    confirmButton: 'swal2-deny' // Clase CSS personalizada para el botón "Confirm" de la segunda ventana
                },
            });

            return;
        }

        // medios de notificacion
        const correo = $('[name="correo"]').val();
        const whatsapp = $('[name="telefono"]').val();

        // en caso de que el usuario cambie el correo se volvera a enviar el codigo de verificación
        if (correoNotification != correo /* || whatsappNotification != whatsapp */) {
            // se genera numero aleatorio
            let codigoVerificacion = generarCodigoVerificacion();
            console.log(`Código verificación: ${codigoVerificacion}`);
            // se envia codigo de verificacion
            enviarCodigoVerificacion(correo, whatsapp, codigoVerificacion);

            // ventana para validar el codigo de verificacion enviado
            Swal.fire({
                title: "CÓDIGO DE VERIFICACIÓN",
                html: `
                    <p style="font-size: 22px;">PARA VALIDAR QUE TIENES ACCESO AL CORREO PROPORCIONADO, SE HA ENVIADO UN <b>CÓDIGO DE VERIFICACIÓN</b> DE SEIS DÍGITOS AL CORREO <b>${correo}</b></p>
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

                    // Validar el código de verificación
                    if (codigoVerificacion != codigoIngresado) {
                        Swal.showValidationMessage('El código ingresado es incorrecto.');
                        return false;
                    }

                    // esta asignacion de variables se debe al que si el usuario regresa al step-1
                    // y cuando quiere ir al step-2 se evalua que el correo o whatsapp sean los miismos
                    // proporcionados al priincipio para no volver a mandar el codigo de verificacion
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

                    // se establece el nombre del denunciante como nombre de opcion de victima
                    let nombre = $("#Nombre_denunciante").val();
                    let primerAp = $("#PrimerApellido_denunciante").val();
                    let SegundoAp = $("#SegundoApellido_denunciante").val();
                    $("#nombre-victima").html(nombre);
                    $("#primer-apellido-victima").html(primerAp);
                    $("#segundo-apellido-victima").html(SegundoAp);

                    // se oculta el primer step para mostrar el segundo step
                    $('#step-denunciante').removeClass('active');
                    $('#datos-denunciante').addClass('d-none');
                    $('#step-hechos').addClass('active');
                    $('#datos-hechos').removeClass('d-none');

                    return true;
                },
                preDeny: () => {
                    /** REENVIO DEL CÓDIGO DE VALIDACIÓN */

                    // se reenvia el código de verificación
                    codigoVerificacion = generarCodigoVerificacion();
                    // se envia codigo de verificacion nuevamente
                    enviarCodigoVerificacion(correo, whatsapp, codigoVerificacion);

                    toastr.success('Se reenvió el código de validacón con exito.')

                    // Retorna false para evitar que la ventana de sweetalert se cierre
                    return false;
                },
            });

        } else {
            /** SE PASA AL SEGUNDO STEP (HECHOS) */

            // se establece el nombre del denunciante como nombre de opcion de victima
            let nombre = $("#Nombre_denunciante").val();
            let primerAp = $("#PrimerApellido_denunciante").val();
            let SegundoAp = $("#SegundoApellido_denunciante").val();
            $("#nombre-victima").html(nombre);
            $("#primer-apellido-victima").html(primerAp);
            $("#segundo-apellido-victima").html(SegundoAp);

            // se oculta el primer step para mostrar el segundo step
            $('#step-denunciante').removeClass('active');
            $('#datos-denunciante').addClass('d-none');
            $('#step-hechos').addClass('active');
            $('#datos-hechos').removeClass('d-none');
        }


    $('html,body').animate({ scrollTop: 0 }, 900);
    return false;
    });

    // validaciones HECHOS
    $('#btn-step-two').on('click', function() {
        console.log('que ondas');
        let elementSection = $('#datos-hechos'); // elemento section en donde estan los inputs a validar
        let erroresValidacion = false; // bandera que define si hay campos sin llenar
        let mensajeError; // mensaje de error a desplegar de acuerdo al input

        elementSection.find('.required').each(function() {
            let elemento = $(this);
            let tipoElemento = elemento.prop("nodeName");
            let tipoInput = elemento.attr('type'); // Verificar el tipo de input

            if (elemento.val() == "" ||
                (tipoElemento == "SELECT" && elemento.val() == "0") ||
                (tipoInput == "radio" && $('input[name="' + elemento.attr('name') + '"]:checked').length == 0)) { // Verificar si es radio button

                // Al elemento o contenedor se agrega la clase para mostrar error
                $(this).addClass('input-error');

                // Asignación del primer mensaje de error y banderas de validación
                if (mensajeError == undefined) {
                    console.log("elemento error:", elemento);
                    mensajeError = elemento.attr('data-message-error');
                    erroresValidacion = true;
                }
            } else {
                $(this).removeClass('input-error');
            }
        });



        /** radio-buttons */
        // ¿QUIÉN ES LA VÍCTIMA?
        let radios = document.getElementsByName('victimadenunciante');
        let radioSeleccionado = false;

        for (let i = 0; i < radios.length; i++) {
            if (radios[i].checked) {
                radioSeleccionado = true;
                break;
            }
        }

        // toggle para el mensaje de error
        radioSeleccionado
            ? $('#quien-es-victima-mensaje-error').addClass('d-none')
            : $('#quien-es-victima-mensaje-error').removeClass('d-none');

        // ¿CONOCE AL RESPONSABLE?
        radios = document.getElementsByName('conoce_responsable');
        radioSeleccionado = false;

        for (let i = 0; i < radios.length; i++) {
            if (radios[i].checked) {
                radioSeleccionado = true;
                break;
            }
        }
        // toggle para el mensaje de error
        radioSeleccionado
            ? $('#conoce-responsable-mensaje-error').addClass('d-none')
            : $('#conoce-responsable-mensaje-error').removeClass('d-none');

        // ¿DISPONE USTED DE ALGUNA INFORMACIÓN SOBRE RASGOS FÍSICOS DISTINTIVOS DEL RESPONSABLE?
        radios = document.getElementsByName('conoce_rasgos_responsable');
        radioSeleccionado = false;

        for (let i = 0; i < radios.length; i++) {
            if (radios[i].checked) {
                radioSeleccionado = true;
                break;
            }
        }
        // toggle para el mensaje de error
        radioSeleccionado
            ? $('#rasgos-responsable-mensaje-error').addClass('d-none')
            : $('#rasgos-responsable-mensaje-error').removeClass('d-none');

            // ¿CONOCE LA DIRECCIÓN DEL RESPONSABLE?
            radios = document.getElementsByName('conoce_direccion_responsable');
            radioSeleccionado = false;

            for (let i = 0; i < radios.length; i++) {
                if (radios[i].checked) {
                    radioSeleccionado = true;
                    break;
                }
            }
            // toggle para el mensaje de error
            radioSeleccionado
                ? $('#conoce-direccion-responsable-mensaje-error').addClass('d-none')
                : $('#conoce-direccion-responsable-mensaje-error').removeClass('d-none');



        // ¿EXISTIÓ VIOLENCIA?
        radios = document.getElementsByName('existio_violencia');
        radioSeleccionado = false;

        for (let i = 0; i < radios.length; i++) {
            if (radios[i].checked) {
                radioSeleccionado = true;
                break;
            }
        }
        // toggle para el mensaje de error
        radioSeleccionado
            ? $('#existio-violencia-mensaje-error').addClass('d-none')
            : $('#existio-violencia-mensaje-error').removeClass('d-none');

        // ¿EXISTEN TESTIGOS DEL HECHO?
        radios = document.getElementsByName('existen_testigos');
        radioSeleccionado = false;

        for (let i = 0; i < radios.length; i++) {
            if (radios[i].checked) {
                radioSeleccionado = true;
                break;
            }
        }
        // toggle para el mensaje de error
        radioSeleccionado
            ? $('#existen-testigos-mensaje-error').addClass('d-none')
            : $('#existen-testigos-mensaje-error').removeClass('d-none');

        // ¿CUENTA CON EVIDENCIAS?
        radios = document.getElementsByName('existen_evidencias');
        radioSeleccionado = false;

        for (let i = 0; i < radios.length; i++) {
            if (radios[i].checked) {
                radioSeleccionado = true;
                break;
            }
        }
        // toggle para el mensaje de error
        radioSeleccionado
            ? $('#existen-evidencias-mensaje-error').addClass('d-none')
            : $('#existen-evidencias-mensaje-error').removeClass('d-none');

        // sweetalert mostrar error
        if ( erroresValidacion == true ) {
            console.log('entraasdsad');

            Swal.fire({
                title: "¡FALTAN DATOS POR LLENAR!",
                html: `<p style="font-size:26px !important;"><b>${mensajeError}</b></p>`,
                icon: "error",
                confirmButtonText: "ACEPTAR",
                customClass: {
                    confirmButton: 'swal2-deny' // Clase CSS personalizada para el botón "Confirm" de la segunda ventana
                },
            });

            return;
        }

        if ( $('#narrativa-hecho').val().length < 150 ) {
            Swal.fire({
                title: "¡FALTAN DATOS POR LLENAR!",
                html: `<p style="font-size:26px !important;"><b>AMPLIÉ UN POCO MÁS LA MANERA EN QUE SE COMETIÓ EL HECHO</b></p>`,
                icon: "error",
                confirmButtonText: "ACEPTAR",
                customClass: {
                    confirmButton: 'swal2-deny' // Clase CSS personalizada para el botón "Confirm" de la segunda ventana
                },
            });

            return;
        }

        if($('input[name="existio_violencia"]:checked').val() == '1'){
            if ( $('#narrativa-violencia').val().length < 50 ) {
                Swal.fire({
                    title: "¡FALTAN DATOS POR LLENAR!",
                    html: `<p style="font-size:26px !important;"><b>AMPLIÉ UN POCO MÁS LA MANERA EN QUE SE COMETIÓ LA VIOLENCIA</b></p>`,
                    icon: "error",
                    confirmButtonText: "ACEPTAR",
                    customClass: {
                        confirmButton: 'swal2-deny' // Clase CSS personalizada para el botón "Confirm" de la segunda ventana
                    },
                });

                return;
            }
        }

        if($('input[name="existen_testigos"]:checked').val() == '1'){
            if($('#tablaTestigo tbody tr td').length < 2){
                Swal.fire({
                    title: "¡FALTAN DATOS POR LLENAR!",
                    html: `<p style="font-size:26px !important;"><b>AGREGUE EL REGISTRO DEL TESTIGO </b></p>`,
                    icon: "error",
                    confirmButtonText: "ACEPTAR",
                    customClass: {
                        confirmButton: 'swal2-deny' // Clase CSS personalizada para el botón "Confirm" de la segunda ventana
                    },
                });

                return;
            }
        }

        if($('input[name="existen_evidencias"]:checked').val() == '1'){
            if($('#tablaEvidencia tbody tr td').length < 2){
                Swal.fire({
                    title: "¡FALTAN DATOS POR LLENAR!",
                    html: `<p style="font-size:26px !important;"><b>AGREGUE EL REGISTRO DE EVIDENCIA </b></p>`,
                    icon: "error",
                    confirmButtonText: "ACEPTAR",
                    customClass: {
                        confirmButton: 'swal2-deny' // Clase CSS personalizada para el botón "Confirm" de la segunda ventana
                    },
                });

                return;
            }
        }

        Swal.fire({
            icon: "question",
            title: "¿ESTÁ SEGURO DE QUERER REGISTRAR LA DENUNCIA?",
            showDenyButton: true,
            confirmButtonText: "SI, REGISTRAR DENUNCIA",
            denyButtonText: `NO, CANCELAR`,
            reverseButtons: true,
            // confirmButtonColor: '#008000',
            // confirmButtonText: "ACEPTAR",
            customClass: {
                confirmButton: 'btn-success',
                denyButton: 'btn-cancel', // Clase CSS personalizada para el botón "Confirm" de la segunda ventana
            },
        });

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

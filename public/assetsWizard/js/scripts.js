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
        const response = await fetch('/api/enviar-codigo-verificacion', {
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

    // next step
    $('.f1 .btn-next').on('click', function() {

        var parent_fieldset = $(this).parents('fieldset');
        console.log(parent_fieldset);

        var next_step = true;
        // navigation steps / progress steps
        var current_active_step = $(this).parents('.f1').find('.f1-step.active');
        var progress_line = $(this).parents('.f1').find('.f1-progress-line');

        let errores_validacion = 0;



        // fields validation
        parent_fieldset.find('.requirede').each(function() {


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

            var elemento = $(this);
            // Obtener el nombre del tipo de elemento HTML

            var nombreInput = elemento.attr('name');
            var tipoElemento = elemento.prop("nodeName"); // O $elemento.attr("nodeName");



            if (elemento.val() == "" || (tipoElemento == "SELECT" && elemento.val() == "0")) {
                $("#campos_faltantes").css("display", "flex");
                $(this).addClass('input-error');
                next_step = false;
                msg = 'Faltan campos por llenar...';
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



        if ((parent_fieldset.attr('id') === 'datos-denunciantee') && (errores_validacion == 0)) {
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
                    title: "Código de verificación",
                    html: `<b>Para continuar con el registro de Denuncia en Línea ingrese el código de verificación.</b> <br><br> Te hemos enviado un código de verificación que se compone de 6 números al correo ${$('[name="correo"]').val()} y al número de WhatsApp ${$('[name="telefono"]').val()}.`,
                    input: "text",
                    allowOutsideClick: false,
                    inputAttributes: {
                        autocapitalize: "off",
                        maxlength: 6, // Limitar a 5 caracteres
                        pattern: "[0-9]{6}", // Solo permitir 5 dígitos numéricos
                        placeholder: "1 2 3 4 5 6"
                    },
                    // confirm btn
                    confirmButtonText: "Verificar código",
                    confirmButtonColor: "#008f39",
                    showLoaderOnConfirm: true,
                    // confirm btn
                    showDenyButton: true,
                    denyButtonText: "Reenviar código",
                    denyButtonColor: "#142f4a",
                    // confirm btn
                    showCancelButton: true,
                    cancelButtonText: "Editar datos",
                    cancelButtonColor: "#808080",
                    preConfirm: (inputValue) => {
                        /** VERIFICACIÓN DEL CÓDIGO */

                        console.log(`código ingresado: ${inputValue}`);
                        console.log(`código verificación a comparar: ${codigoVerificacion}`);

                        // Validar el código de verificación
                        if (codigoVerificacion != inputValue) {
                            Swal.showValidationMessage('El código ingresado es incorrecto.'); // Mostrar mensaje de error
                            return false; // Evitar que se cierre el SweetAlert
                        }


                        // En caso de que el usuario regrese al "step" de los datos generales
                        // comprobaremos si las via de notifiicacion las modifico comparando con las variables
                        // correoNotiificacion y whatsappNotificion
                        correoNotification = correo;
                        whatsappNotification = whatsapp;


                        Swal.fire({
                            icon: "success",
                            title: "Verificación exitosa",
                            text: "El código es correcto."
                        });

                        parent_fieldset.fadeOut(400, function() {
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
                    },
                    // allowOutsideClick: () => !Swal.isLoading()
                });

            } else {
                parent_fieldset.fadeOut(400, function() {
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
            }






        } else {

            // fields validation

            if (next_step) {
                parent_fieldset.fadeOut(400, function() {
                    var nombre = $("#Nombre_denunciante").val();
                    var primerAp = $("#PrimerApellido_denunciante").val();
                    var SegundoAp = $("#SegundoApellido_denunciante").val();

                    $("#txt_nombre_victima").html(nombre);
                    $("#txt_PrimerApellido_victima").html(primerAp);
                    $("#txt_SegundoApellido_victima").html(SegundoAp);
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
                    title: "¡Cuidado!",
                    text: msg,
                    icon: "error"
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
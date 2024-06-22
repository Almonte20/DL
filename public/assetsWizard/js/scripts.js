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

var msg = "";

jQuery(document).ready(function() {
    /*
        Form
    */
    $('.f1 fieldset:first').fadeIn('slow');

    $('.f1 input[type="text"], .f1 input[type="password"], .f1 textarea').on('focus', function() {
        $(this).removeClass('input-error');
    });

    // next step
    $('.f1 .btn-next').on('click', function() {

        var parent_fieldset = $(this).parents('fieldset');
        var next_step = true;
        // navigation steps / progress steps
        var current_active_step = $(this).parents('.f1').find('.f1-step.active');
        var progress_line = $(this).parents('.f1').find('.f1-progress-line');



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


            var elemento = $(this);
            // Obtener el nombre del tipo de elemento HTML

            var nombreInput = elemento.attr('name');
            var tipoElemento = elemento.prop("nodeName"); // O $elemento.attr("nodeName");



            if (elemento.val() == "" || (tipoElemento == "SELECT" && elemento.val() == "0")) {
                $("#campos_faltantes").css("display", "flex");
                $(this).addClass('input-error');
                next_step = false;
                msg = 'Faltan campos por llenar...';
            } else {
                $(this).removeClass('input-error');
            }

            if (nombreInput == "correo") {
                if (!validarFormatoCorreo(elemento.val())) {
                    $(this).addClass('input-error');
                    next_step = false;
                    msg = 'El correo no cuenta con un formato válido';

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

        // fields validation

        if (next_step) {
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
        } else {
            Swal.fire({
                title: "¡Cuidado!",
                text: msg,
                icon: "error"
            });
            // alertas(msg);
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
function scroll_to_class(element_class, removed_height) {
	var scroll_to = $(element_class).offset().top - removed_height;
	if($(window).scrollTop() != scroll_to) {
		$('html, body').stop().animate({scrollTop: scroll_to}, 0);
	}
}


function bar_progress(progress_line_object, direction) {
	var number_of_steps = progress_line_object.data('number-of-steps');
	var now_value = progress_line_object.data('now-value');
	var new_value = 0;
	if(direction == 'right') {
		new_value = now_value + ( 100 / number_of_steps );
	}
	else if(direction == 'left') {
		new_value = now_value - ( 100 / number_of_steps );
	}
	progress_line_object.attr('style', 'width: ' + new_value + '%;').data('now-value', new_value);
}
function maxLengthCheck(object)
{
  if (object.value.length > object.maxLength)
    object.value = object.value.slice(0, object.maxLength)
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
        var form = $(this).parents('.f1');
    	var current_active_step = $(this).parents('.f1').find('.f1-step.active');
        var progress_line = $(this).parents('.f1').find('.f1-progress-line');
        $('.btn-next').prop('disabled', true);
        $('.btn-previous').prop('disabled', true);


    	// fields validation
    	parent_fieldset.find('#ActaNacimiento, #IdentificacionOficial,#ComprobanteDomicilio,#EscanCURP,#FotoInfantil,#OficioSolicitud,#Nombre,#PrimerApellido,#SegundoApellido,#FechaNacimiento,pais_nacimiento,domicilio_extranjero_nacimiento,entidad,#municipio,#CURP,#INE,#Telefono,#Correo' +
            ',#Correo_validacion,#NombrePadre,#NombreMadre,#pais,#domicilio_extranjero,#HuellasConsulado,#IdentificacionFamiliar,#entidad_domicilio,#municipio_domicilio,#CalleDomicilio,#AsentamientoDomicilio,#NumExtDomicilio,#NumIntDomicilio,#CP,#motivo_solicitud').each(function() {


            // PRIMERA PARTE DEL FORM
            parent_fieldset.find('#motivo_solicitud').each(function() {
                if( $(this).val() == "" ) {
                    $("#campos_faltantes").css("display","flex");
                    $(this).addClass('input-error');
                    next_step = false;
                    msg = 'Ingrese el motivo de su solicitud.';
                }else{
                    $(this).removeClass('input-error');
                }
            });
            parent_fieldset.find('#FotoInfantil').each(function() {
                if( $(this).val() == "" ) {
                    $("#campos_faltantes").css("display","flex");
                    $(this).addClass('input-error');
                    next_step = false;
                    msg = 'Adjunte una foto infantil reciente.';
                }else{
                    $(this).removeClass('input-error');
                }
            });
            parent_fieldset.find('#OficioSolicitud').each(function() {
                if( $(this).val() == "" ) {
                    $("#campos_faltantes").css("display","flex");
                    $(this).addClass('input-error');
                    next_step = false;
                    msg = 'Adjunte el oficio de solicitud.';
                }else{
                    $(this).removeClass('input-error');
                }
            });
            parent_fieldset.find('#EscanCURP').each(function() {
                if( $(this).val() == "" ) {
                    $("#campos_faltantes").css("display","flex");
                    $(this).addClass('input-error');
                    next_step = false;
                    msg = 'Adjunte la CURP.';
                }else{
                    $(this).removeClass('input-error');
                }
            });
            parent_fieldset.find('#ComprobanteDomicilio').each(function() {
                if( $(this).val() == "" ) {
                    $("#campos_faltantes").css("display","flex");
                    $(this).addClass('input-error');
                    next_step = false;
                    msg = 'Adjunte el comprobante de domicilio.';
                }else{
                    $(this).removeClass('input-error');
                }
            });
            parent_fieldset.find('#IdentificacionOficialReverso').each(function() {
                if( $(this).val() == "" ) {
                    $("#campos_faltantes").css("display","flex");
                    $(this).addClass('input-error');
                    next_step = false;
                    msg = 'Adjunte el reverso identificacción oficial.';
                }else{
                    $(this).removeClass('input-error');
                }
            });
            parent_fieldset.find('#IdentificacionOficialFrente').each(function() {
                if( $(this).val() == "" ) {
                    $("#campos_faltantes").css("display","flex");
                    $(this).addClass('input-error');
                    next_step = false;
                    msg = 'Adjunte el frente identificacción oficial.';
                }else{
                    $(this).removeClass('input-error');
                }
            });
            parent_fieldset.find('#ActaNacimiento').each(function() {
                if( !$(this).val() ) {
                    $("#campos_faltantes").css("display","flex");
                    $(this).addClass('input-error');
                    next_step = false;
                    msg = 'Adjunte el acta de nacimientoS.';
                }else{
                    $(this).removeClass('input-error');
                }
            });


            // SEGUNDA PARTE DEL FORM
            if($('#pais').val() != '165'){
                parent_fieldset.find('#IdentificacionOficialFamiliarFrente').each(function() {
                    if( $(this).val() == "" ) {
                        $("#campos_faltantes").css("display","flex");
                        $(this).addClass('input-error');
                        next_step = false;
                        msg = 'Adjunte el frente identificación oficial de quién recibe.';
                    }else{
                        $(this).removeClass('input-error');
                    }
                });
                parent_fieldset.find('#IdentificacionOficialFamiliarReverso').each(function() {
                    if( $(this).val() == "" ) {
                        $("#campos_faltantes").css("display","flex");
                        $(this).addClass('input-error');
                        next_step = false;
                        msg = 'Adjunte el reverso identificación oficial de quién recibe.';
                    }else{
                        $(this).removeClass('input-error');
                    }
                });
                parent_fieldset.find('#HuellasConsulado').each(function() {
                    if( $(this).val() == "" ) {
                        $("#campos_faltantes").css("display","flex");
                        $(this).addClass('input-error');
                        next_step = false;
                        msg = 'Adjunte las huellas dactilares.';
                    }else{
                        $(this).removeClass('input-error');
                    }
                });

                parent_fieldset.find('#domicilio_extranjero').each(function() {
                    if( $(this).val() == "" ) {
                        $("#campos_faltantes").css("display","flex");
                        $(this).addClass('input-error');
                        next_step = false;
                        msg = 'El domicilio es obligatorio.';
                    }else{
                        $(this).removeClass('input-error');
                    }
                });
            }else{
                if($('#pais').val() == '165'){
                    parent_fieldset.find('#CP').each(function() {
                        if( $(this).val() == "" || $(this).val() == 0 ) {
                            $("#campos_faltantes").css("display","flex");
                            $(this).addClass('input-error');
                            next_step = false;
                            msg = 'El código postal es obligatorio.';
                        }else{
                            $(this).removeClass('input-error');
                        }
                    });

                    parent_fieldset.find('#NumExtDomicilio').each(function() {
                        if( $(this).val() == "" || $(this).val() == 0 ) {
                            $("#campos_faltantes").css("display","flex");
                            $(this).addClass('input-error');
                            next_step = false;
                            msg = 'El número exterior es obligatorio.';
                        }else{
                            $(this).removeClass('input-error');
                        }
                    });

                    parent_fieldset.find('#AsentamientoDomicilio').each(function() {
                        if( $(this).val() == "" || $(this).val() == 0 ) {
                            $("#campos_faltantes").css("display","flex");
                            $(this).addClass('input-error');
                            next_step = false;
                            msg = 'La colonia es obligatoria.';
                        }else{
                            $(this).removeClass('input-error');
                        }
                    });

                    parent_fieldset.find('#CalleDomicilio').each(function() {
                        if( $(this).val() == "" || $(this).val() == 0 ) {
                            $("#campos_faltantes").css("display","flex");
                            $(this).addClass('input-error');
                            next_step = false;
                            msg = 'La calle es obligatoria.';
                        }else{
                            $(this).removeClass('input-error');
                        }
                    });

                    parent_fieldset.find('#municipio_domicilio').each(function() {
                        if( $(this).val() == "" || $(this).val() == 0 ) {
                            $("#campos_faltantes").css("display","flex");
                            $(this).addClass('input-error');
                            next_step = false;
                            msg = 'La ciudad de residencia es obligatoria.';
                        }else{
                            $(this).removeClass('input-error');
                        }
                    });

                    parent_fieldset.find('#entidad_domicilio').each(function() {
                        if( $(this).val() == "" || $(this).val() == 0 ) {
                            $("#campos_faltantes").css("display","flex");
                            $(this).addClass('input-error');
                            next_step = false;
                            msg = 'El estado de residencia es obligatorio.';
                        }else{
                            $(this).removeClass('input-error');
                        }
                    });
                }
            }

            parent_fieldset.find('#pais').each(function() {
                if( $(this).val() == "" ) {
                    $("#campos_faltantes").css("display","flex");
                    $(this).addClass('input-error');
                    next_step = false;
                    msg = 'El país de residencia es obligatorio.';
                }else{
                    $(this).removeClass('input-error');
                }
            });

            parent_fieldset.find('#NombreMadre').each(function() {
                if( $(this).val() == "" ) {
                    $("#campos_faltantes").css("display","flex");
                    $(this).addClass('input-error');
                    next_step = false;
                    msg = 'El nombre de la Madre es obligatorio.';
                }else{
                    $(this).removeClass('input-error');
                }
            });

            parent_fieldset.find('#NombrePadre').each(function() {
                if( $(this).val() == "" ) {
                    $("#campos_faltantes").css("display","flex");
                    $(this).addClass('input-error');
                    next_step = false;
                    msg = 'El nombre del Padre es obligatorio.';
                }else{
                    $(this).removeClass('input-error');
                }
            });

            parent_fieldset.find('#Correo_validacion').each(function() {
                if( $(this).val() == "" ) {
                    $("#campos_faltantes").css("display","flex");
                    $(this).addClass('input-error');
                    next_step = false;
                    msg = 'La confirmación del correo es obligatorio.';
                }else{
                    if($(this).val().indexOf("@") > 0  && ($(this).val().indexOf(".com") > 0 || $(this).val().indexOf(".COM") > 0 || $(this).val().indexOf(".es") > 0 || $(this).val().indexOf(".ES") > 0)){
                        if($(this).val() == $('#Correo').val()){
                            $(this).removeClass('input-error');
                        }else{
                            $("#campos_faltantes").css("display","flex");
                            $(this).addClass('input-error');
                            next_step = false;
                            msg = 'Los correos son diferentes.';
                        }
                    }else{
                        $("#campos_faltantes").css("display","flex");
                        $(this).addClass('input-error');
                        next_step = false;
                        msg = 'El correo es invalido, Ej. correo@gmail.com';
                    }
                }
            });

            parent_fieldset.find('#Correo').each(function() {
                if( $(this).val() == "" ) {
                    $("#campos_faltantes").css("display","flex");
                    $(this).addClass('input-error');
                    next_step = false;
                    msg = 'El correo es obligatorio.';
                }else{
                    if($(this).val().indexOf("@") > 0  && ($(this).val().indexOf(".com") > 0 || $(this).val().indexOf(".COM") > 0 || $(this).val().indexOf(".es") > 0 || $(this).val().indexOf(".ES") > 0 )){
                        $(this).removeClass('input-error');
                    }else{
                        $("#campos_faltantes").css("display","flex");
                        $(this).addClass('input-error');
                        next_step = false;
                        msg = 'El correo es invalido, Ej. correo@gmail.com';
                    }
                }
            });

            parent_fieldset.find('#Telefono').each(function() {
                if( $(this).val() == "" ) {
                    $("#campos_faltantes").css("display","flex");
                    $(this).addClass('input-error');
                    next_step = false;
                    msg = 'El teléfono es obligatorio.';
                }else{
                    $(this).removeClass('input-error');
                }
            });

            parent_fieldset.find('#INE').each(function() {
                if( $(this).val() == "" ) {
                    $("#campos_faltantes").css("display","flex");
                    $(this).addClass('input-error');
                    next_step = false;
                    msg = 'El INE es obligatorio.';
                }else{
                    $(this).removeClass('input-error');
                }
            });

            parent_fieldset.find('#CURP').each(function() {
                if( $(this).val() == "" ) {
                    $("#campos_faltantes").css("display","flex");
                    $(this).addClass('input-error');
                    next_step = false;
                    msg = 'La CURP es obligatorio.';
                }else{
                    $(this).removeClass('input-error');
                }
            });

            if($('#pais_nacimiento').val() != '165'){
                parent_fieldset.find('#domicilio_extranjero_nacimiento').each(function() {
                    if( $(this).val() == "" ) {
                        $("#campos_faltantes").css("display","flex");
                        $(this).addClass('input-error');
                        next_step = false;
                        msg = 'El domicilio de nacimiento es obligatorio.';
                    }else{
                        $(this).removeClass('input-error');
                    }
                });
            }else{
                if($('#pais_nacimiento').val() == '165'){
                    parent_fieldset.find('#municipio').each(function() {
                        if( $(this).val() == "" || $(this).val() == 0) {
                            $("#campos_faltantes").css("display","flex");
                            $(this).addClass('input-error');
                            next_step = false;
                            msg = 'La ciudad de nacimiento es obligatorio.';
                        }else{
                            $(this).removeClass('input-error');
                        }
                    });
                    parent_fieldset.find('#entidad').each(function() {
                        if( $(this).val() == "" || $(this).val() == 0) {
                            $("#campos_faltantes").css("display","flex");
                            $(this).addClass('input-error');
                            next_step = false;
                            msg = 'El estado de nacimiento es obligatoria.';
                        }else{
                            $(this).removeClass('input-error');
                        }
                    });
                }
            }

            parent_fieldset.find('#pais_nacimiento').each(function() {
                if( $(this).val() == "" ) {
                    $("#campos_faltantes").css("display","flex");
                    $(this).addClass('input-error');
                    next_step = false;
                    msg = 'El pais de nacimiento es obligatorio.';
                }else{
                    $(this).removeClass('input-error');
                }
            });

            parent_fieldset.find('#FechaNacimiento').each(function() {
                if( $(this).val() == "" ) {
                    $("#campos_faltantes").css("display","flex");
                    $(this).addClass('input-error');
                    next_step = false;
                    msg = 'La fecha de nacimiento es obligatoria.';
                }else{
                    $(this).removeClass('input-error');
                }
            });

            parent_fieldset.find('#PrimerApellido').each(function() {
                if( $(this).val() == "" ) {
                    $("#campos_faltantes").css("display","flex");
                    $(this).addClass('input-error');
                    next_step = false;
                    msg = 'El primer apellido es obligatorio.';
                }else{
                    $(this).removeClass('input-error');
                }
            });

            parent_fieldset.find('#Nombre').each(function() {
                if( $(this).val() == "" ) {
                    $("#campos_faltantes").css("display","flex");
                    $(this).addClass('input-error');
                    next_step = false;
                    msg = 'El Nombre es obligatorio.';
                }else{
                    $(this).removeClass('input-error');
                }
            });
        });

    	// fields validation

    	if( next_step ) {
            //alert('aqui 1');
            if(current_active_step.hasClass('final-step')){
                console.log("Alex + Cartas");
                form.submit();
                setTimeout(function(){
                    Command: toastr["error"]("Ocurrio un error intentalo de nuevo.", "Error");
                    $('.btn-next').prop('disabled', false);
                    $('.btn-previous').prop('disabled', false);
                    $('.loader').css('display', 'none');
                }, 30000);
            }else{
                //alert(this);
                parent_fieldset.fadeOut(400, function() {
                    //quita el mensaje de error
                    $("#campos_faltantes").css("display","none");
                    // change icons
                    current_active_step.removeClass('active').addClass('activated').next().addClass('active');
                    // progress bar
                    bar_progress(progress_line, 'right');
                    // show next step
	    		    $("#campos_usuario").css("display","block");
	    		    // scroll window to beginning of the form
    			    scroll_to_class( $('.f1'), 20 );
                });
                $('.btn-next').prop('disabled', false);
                $('.btn-previous').prop('disabled', false);
                $('.loader').css('display', 'none');
            }
    	}else{
            //alert('aqui 2');
            $('.btn-next').prop('disabled', false);
            $('.btn-previous').prop('disabled', false);
            $('.loader').css('display', 'none');
            alertas(msg);
        }
        $('html,body').animate({ scrollTop: 0 }, 900);
        return false;
    });

    function alertas(msg)
    {
        new PNotify({
            title: 'Error:',
            text: msg,
            type: 'error',
            addclass: "stack-bottomright"
          });
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
			scroll_to_class( $('.f1'), 20 );
    	});
        $('#f1-documentacion').css("display", "block");
    });

    // submit
    $('.f1').on('submit', function(e) {

    	// fields validation
    	$(this).find('').each(function() {
    		if( $(this).val() == "" ) {
    			e.preventDefault();
    			$(this).addClass('input-error');
    		}
    		else {
    			$(this).removeClass('input-error');
    		}
    	});
    });


});

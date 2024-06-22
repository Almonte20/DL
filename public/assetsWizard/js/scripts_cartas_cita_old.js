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
        $('.btn-next').prop('disabled', true);
        $('.btn-previous').prop('disabled', true);
        $('.loader').css('display', 'inline-block');
    	var parent_fieldset = $(this).parents('fieldset');
    	var next_step = true;
        // navigation steps / progress steps
        var form = $(this).parents('.f1');
    	var current_active_step = $(this).parents('.f1').find('.f1-step.active');
        var progress_line = $(this).parents('.f1').find('.f1-progress-line');



    	// fields validation
    	parent_fieldset.find('#ComprobantePago, #LineaPago, #region_sede, #fecha_evento, #hora_evento').each(function() {
            console.log("dddd");

            // PRIMERA PARTE DEL FORM
            parent_fieldset.find('#hora').each(function() {
                if( $(this).val() == 0 ) {
                    $("#campos_faltantes").css("display","flex");
                    $(this).addClass('input-error');
                    next_step = false;
                    msg = 'Ingrese la hora de la cita.';
                }else{
                    $(this).removeClass('input-error');
                }
            });
            parent_fieldset.find('#fecha').each(function() {
                if( $(this).val() == 0 ) {
                    $("#campos_faltantes").css("display","flex");
                    $(this).addClass('input-error');
                    next_step = false;
                    msg = 'Ingrese la fecha para su cita.';
                }else{
                    $(this).removeClass('input-error');
                }
            });
            parent_fieldset.find('#region_sede').each(function() {
                if( $(this).val() == "" ) {
                    $("#campos_faltantes").css("display","flex");
                    $(this).addClass('input-error');
                    next_step = false;
                    msg = 'Seleccione la región para su cita.';
                }else{
                    $(this).removeClass('input-error');
                }
            });
            parent_fieldset.find('#LineaPago').each(function() {
            console.log("linea");
                
                if( $(this).val() == "" ) {
                    $("#campos_faltantes").css("display","flex");
                    $(this).addClass('input-error');
                    next_step = false;
                    msg = 'Ingrese el folio de pago.';
                }else{
                    $(this).removeClass('input-error');
                }
            });
            parent_fieldset.find('#ComprobantePago').each(function() {
                if( $(this).val() == "" ) {
                    $("#campos_faltantes").css("display","flex");
                    $(this).addClass('input-error');
                    next_step = false;
                    msg = 'Adjunte el comprobante de pago.';
                }else{
                    $(this).removeClass('input-error');
                }
            });
        });

    	// fields validation

    	if( next_step ) {
            if(current_active_step.hasClass('final-step')){
                form.submit();
                setTimeout(function(){
                    Command: toastr["error"]("Ocurrio un error intentalo de nuevo.", "Error");
                    $('.btn-next').prop('disabled', false);
                    $('.btn-previous').prop('disabled', false);
                    $('.loader').css('display', 'none');
                }, 30000);
            }else{
                parent_fieldset.fadeOut(400, function() {
                    //quita el mensaje de error
                    $("#campos_faltantes").css("display","none");
                    // change icons
                    current_active_step.removeClass('active').addClass('activated').next().addClass('active');
                    // progress bar
                    bar_progress(progress_line, 'right');
                    // show next step
                    $(this).next().fadeIn();
                    // scroll window to beginning of the form
                    scroll_to_class( $('.f1'), 20 );
                });
                $('.btn-next').prop('disabled', false);
                $('.btn-previous').prop('disabled', false);
                $('.loader').css('display', 'none');
            }
    	}else{
            $('.btn-next').prop('disabled', false);
            $('.btn-previous').prop('disabled', false);
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

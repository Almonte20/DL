<!DOCTYPE html>
{{--Menu de la pagina oficial y principal--}}
<html lang="es">

<head>
  <meta charset="utf-8">
  <title>@yield('titulo')</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta name="description" content="Fiscalía General del Estado de Michoacán">

  <!-- Facebook Opengraph integration: https://developers.facebook.com/docs/sharing/opengraph -->
  <meta property="og:title" content="">
  <meta property="og:image" content="">
  <meta property="og:url" content="">
  <meta property="og:site_name" content="">
  <meta property="og:description" content="">

  <!-- Twitter Cards integration: https://dev.twitter.com/cards/  -->
  <meta name="twitter:card" content="summary">
  <meta name="twitter:site" content="">
  <meta name="twitter:title" content="">
  <meta name="twitter:description" content="">
  <meta name="twitter:image" content="">

  @include('layouts.librerias_css')

	<style>


    .tp-static-layers {
      z-index: 1;
    }
    ul.tp-revslider-mainul > li {
      z-index: unset !important;
    }

    .swiper-container {
      width: 90%;
      padding-top: 50px;
      padding-bottom: 50px;
    }

    .swiper-slide {
      background: #fff;
      background-repeat:no-repeat !important;
      background-size:cover !important;
      width: 600px;
      height: 350px;
    }

        /* ----------------------------------------------------------------
        Top Search
    -----------------------------------------------------------------*/
    #top-search,
    #top-cart,
    #side-panel-trigger,
    #top-account {
        float: right;
        margin: 10px 15px 10px 15px;
    }

    #top-cart { position: relative; }

    #top-search a,
    #top-cart > a,
    #side-panel-trigger a {
        display: block;
        position: relative;
        width: 14px;
        height: 14px;
        font-size: 14px;
        line-height: 20px;
        text-align: center;
        color: #333;
        -webkit-transition: color .3s ease-in-out;
        -o-transition: color .3s ease-in-out;
        transition: color .3s ease-in-out;
    }

    #top-search a { z-index: 11; }

    #top-search a i {
        position: absolute;
        top: 0;
        left: 0;
        -webkit-transition: opacity .3s ease;
        -o-transition: opacity .3s ease;
        transition: opacity .3s ease;
    }

    body.top-search-open #top-search a i.icon-search3,
    #top-search a i.icon-line-cross { opacity: 0; }

    body.top-search-open #top-search a i.icon-line-cross {
        opacity: 1;
        z-index: 11;
        font-size: 16px;
    }

    #top-cart > a:hover { color: #C09F77; }

    #top-search form {
        background-color: #152F4A;
        opacity: 0;
        z-index: -2;
        position: absolute;
        width: 100% !important;
        height: 100% !important;
        padding: 0 15px;
        margin: 0;
        top: 0;
        left: 0;
        -webkit-transition: opacity .3s ease-in-out;
        -o-transition: opacity .3s ease-in-out;
        transition: opacity .3s ease-in-out;
    }

    body.top-search-open #top-search form {
        opacity: 1;
        z-index: 10;
    }



    #top-search form input{
        box-shadow: none !important;
        pointer-events: none;
        border-radius: 0;
        border: 0;
        outline: 0 !important;
        font-size: 15px;
        padding: 10px 80px 10px 0;
        height: 100%;
        background-color: transparent;
        color: #fff;
        font-weight: 700;
        margin-top: 0 !important;
        font-family: 'Raleway', sans-serif;
        letter-spacing: 2px;
    }


    #top-search form input ::placeholder{
        color: #fff;
    }

    body:not(.device-md):not(.device-sm):not(.device-xs) #header.full-header #top-search form input { padding-left: 40px; }

    body:not(.device-md):not(.device-sm):not(.device-xs) .container-fullwidth #top-search form input { padding-left: 60px; }

    body.top-search-open #top-search form input { pointer-events: auto; }

    body:not(.device-md):not(.device-sm):not(.device-xs) #header.transparent-header:not(.sticky-header):not(.full-header):not(.floating-header) #top-search form input { border-bottom: 2px solid rgba(0,0,0,0.1); }

    #top-search form input::-moz-placeholder {
        color: white;
        opacity: 1;
        text-transform: uppercase;
    }
    #top-search form input:-ms-input-placeholder {
        color: white;
        text-transform: uppercase;
    }
    #top-search form input::-webkit-input-placeholder {
        color: white;
        text-transform: uppercase;
    }

    #primary-menu .container #top-search form input,
    .sticky-header #top-search form input { border: none !important; }

    #top-search,
    #top-cart {
        -webkit-transition: margin .4s ease, opacity .3s ease;
        -o-transition: margin .4s ease, opacity .3s ease;
        transition: margin .4s ease, opacity .3s ease;


 /*responsivo*/
    /* For mobile phones: */
    [class*="col-"] {
      width: 100%;
    }
    }

    @media (max-width: 1400px) {

        .nav-menu-item  a{
           font-size:16px!important;
        }
        a .nav-menu-item{
           font-size:16px!important;
        }
    }
    @media (max-width: 900px) {

        .nav-menu-item  a{
        font-size:10px!important;
        }
        a .nav-menu-item{
        font-size:10px!important;
        }
    }
    /*
    @media (min-width: 1940px) {
       .menu-has-children a{
           font-size: 8px;
           color :green;
        }
        .nav-menu-item a{
           font-size: 8px;
           color :green;
        }
        .menu-has-children a .nav-menu-item{
            font-size: 8px;
            color :green;
        }
    }


*/

  </style>
    <script>
        //alert("La resolución de tu pantalla es: " + screen.width + " x " + screen.height)
        //1920 * 1080
    </script>
</head>
<body class="">

  @yield ('pre_contenido')


  <div class="" style="min-height: calc(100vh - 50px);">
      @yield ('contenido')
  </div>
  
  <!-- Footer -->
<footer class="site-footer">

</footer>
  <!-- #footer -->
  <!-- IconoScrollTop -->
  <a class="scrolltop" href="#"><span class="fa fa-angle-up"></span></a>
  <!-- #IconoScrollTop -->

  <div id="modal" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content text-center">
            <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" style="color: white;">&times;</span>
                    </button>
                </div>
        <h2>Aviso de Privacidad</h2>
        <text style="margin: 0 20px 50px 20px; text-align:justify;">
                La Fiscalía General del Estado de Michoacán, es el sujeto obligado y responsable del tratamiento de los datos personales que se recaban a través de <a style="color:#C09F77 !important;" href="https://fiscaliamichoacan.gob.mx/" target="_blank">https://fiscaliamichoacan.gob.mx/</a> los cuales serán protegidos conforme a lo dispuesto por la Ley de Protección de Datos Personales en Posesión de Sujetos Obligados, y demás normatividad que resulte aplicable.
                <br><br>Los datos personales recabados son: nombre, correo electrónico, domicilio, teléfono particular, teléfono celular, estado civil, firma, registro federal de contribuyentes (RFC), cédula única del registro de población (CURP), lugar y fecha de nacimiento. La finalidad principal de la recolección y posterior tratamiento de los datos personales es garantizar la debida protección de su integridad física y patrimonial mediante la pronta, expedita y debida procuración de justicia. Sin embargo, dicha información también podrá ser utilizada para la generación de información estadística y la persecución de delitos descritos en la normatividad aplicable en la entidad, así como para dirimir trámites administrativos o de naturaleza laboral.
                <br><br>Para solicitar la revocación del consentimiento para el tratamiento de sus datos personales, deberá realizar un escrito libre, dirigido a la Unidad de Transparencia de la Fiscalía General del Estado de Michoacán, o al correo electrónico <a href="mailto:transparencia@fiscaliamichoacan.gob.mx" target="_blank">transparencia@fiscaliamichoacan.gob.mx</a>
                <br><br>Usted podrá consultar el aviso de privacidad integral en la siguiente dirección electrónica: <a href="{{ url('/Aviso-de-privacidad')}}" target="_blank">https://fiscaliamichoacan.gob.mx/Aviso-de-privacidad</a>
                <br><br>O bien de manera presencial en las instalaciones de la Fiscalía General, con domicilio en Periférico Independencia número 5000, Colonia Sentimientos de la Nación, C.P. 58170, Morelia Michoacán.

        </text>
      </div>
    </div>
  </div>


   <div id="ModalGaleria" class="modal fade ModalGaleria" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="height: 60vh; margin-top: 10%;">
    <div class="modal-dialog modal-lg" >
      <div class="modal-content text-center">
        <img src="" id="imagen_galeria" alt="" style="height: 60vh;">
      </div>
    </div>
  </div>

  @include('layouts.librerias_js') <!-- Librerias js-->



<script>
  /* Start of ChatBot (www.chatbot.com) code */
     window.__be = window.__be || {};
    window.__be.id = "5ff72f137ad4d00007db3b16";
    (function() {
        var be = document.createElement('script'); be.type = 'text/javascript'; be.async = true;
        be.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'cdn.chatbot.com/widget/plugin.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(be, s);
    })();
    /*End of ChatBot code */


  jQuery(function($) {

    $('#rev_slider_143_1').off('touchstart click');
    $('#rev_slider_143_1').on('touchstart click', function(e) {

      e.preventDefault();

      $('html, body').animate({
        scrollTop: $('#rev_slider_143_1').outerHeight()
      }, 850, 'easeInOutExpo');

    });

  });



  var revapi143,
  tpj;
  (function() {
    if (!/loaded|interactive|complete/.test(document.readyState)) document.addEventListener("DOMContentLoaded",onLoad); else onLoad();

    function onLoad() {
      if (tpj===undefined) { tpj = jQuery; if("off" == "on") tpj.noConflict();}
          if(tpj("#rev_slider_143_1").revolution == undefined){
            revslider_showDoubleJqueryError("#rev_slider_143_1");
          }else{
            revapi143 = tpj("#rev_slider_143_1").show().revolution({
              sliderType:"standard",
              jsFileLocation:"include/rs-plugin/js",
              sliderLayout:"fullscreen",
              dottedOverlay:"none",
              delay:7000,
              navigation: {
                keyboardNavigation:"off",
                keyboard_direction: "horizontal",
                mouseScrollNavigation:"on",
                mouseScrollReverse:"default",
                onHoverStop:"off",
                arrows: {
                  style:"uranus",
                  enable:false,
                  hide_onmobile:false,
                  hide_onleave:false,
                  tmp:'',
                  left: {
                    h_align:"left",
                    v_align:"center",
                    h_offset:20,
                    v_offset:0
                  },
                  right: {
                    h_align:"right",
                    v_align:"center",
                    h_offset:20,
                    v_offset:0
                  }
                }
              },
              responsiveLevels:[1240,1024,778,480],
              visibilityLevels:[1240,1024,778,480],
              gridwidth:[1240,1024,778,480],
              gridheight:[868,768,960,720],
              lazyType:"none",
              parallax: {
                type:"3D",
                origo:"slidercenter",
                speed:400,
                speedbg:0,
                speedls:0,
                levels:[5,10,15,20,25,30,35,40,-2,-4,-6,-8,-10,-12,-14,55],
                ddd_shadow:"off",
                ddd_bgfreeze:"on",
                ddd_overflow:"hidden",
                ddd_layer_overflow:"hidden",
                ddd_z_correction:150,
                disable_onmobile:"on"
              },
              spinner:"on",
                          stopLoop: "off",
                          stopAfterLoops: -1,
                          stopAtSlide: -1,
              shuffle:"off",
              autoHeight:"off",
              fullScreenAutoWidth:"off",
              fullScreenAlignForce:"off",
              fullScreenOffsetContainer: "",
              fullScreenOffset: "",
              disableProgressBar:"on",
              hideThumbsOnMobile:"off",
              hideSliderAtLimit:0,
              hideCaptionAtLimit:0,
              hideAllCaptionAtLilmit:0,
              debugMode:false,
              fallbacks: {
                simplifyAll:"off",
                nextSlideOnWindowFocus:"off",
                disableFocusListener:false,
              }
            });
          }; /* END OF revapi call */

        if(typeof ExplodingLayersAddOn !== "undefined") ExplodingLayersAddOn(tpj, revapi143);

        RevSliderPaintBrush(tpj, revapi143);
    }; /* END OF ON LOAD FUNCTION */
  }()); /* END OF WRAPPING FUNCTION */

      var swiper = new Swiper('.swiper-container', {
      effect: 'coverflow',
      grabCursor: true,
      centeredSlides: true,
      slidesPerView: 'auto',
       loop: true,
      coverflowEffect: {
        rotate: 20,
        stretch: 0,
        depth: 70,
        modifier: 1,
        slideShadows : true,
      },
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
    });

            var swiper = new Swiper('.swiper-container2', {
      effect: 'coverflow',
      grabCursor: true,
      centeredSlides: true,
              nextButton: '.swiper-button-next',
        prevButton: '.swiper-button-prev',
      slidesPerView: '3',
       loop: true,
      coverflowEffect: {
        rotate: 0,
        stretch: 0,
        depth: 0,
        modifier: 3,
        slideShadows : true,
      },
      pagination: {
        el: '.swiper-pagination2',
        clickable: true,
      },
            navigation: {
        nextEl: '.slider-arrow-right',
        prevEl: '.slider-arrow-left',
      },
        autoplay: {
    delay: 5000,
  },
    });

    function aviso(){
        $('#modal').modal('show');
    }


</script>
@yield('js')
</body>
</html>

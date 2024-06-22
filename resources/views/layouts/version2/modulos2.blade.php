


<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>@yield('titulo')</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

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
    .filled-stars, .rating-input, .clear-rating{
        display: none;
    }
    #rev_slider_143_1 .uranus.tparrows{width:50px; height:50px; background:rgba(255,255,255,0)}#rev_slider_143_1 .uranus.tparrows:before{width:50px; height:50px; line-height:50px; font-size:40px; transition:all 0.3s;-webkit-transition:all 0.3s}#rev_slider_143_1 .uranus.tparrows:hover:before{opacity:0.75}
    #prensa .prensa-item img {
        height: 330px !important;
    }
    #prensa .prensa-item .contenido {
        height: 330px;

    }
    #prensa .prensa-item .details {
        text-align: center;
        height: 330px;
        position: absolute;
        width: 95%;
        margin-left: 14px;
        bottom: -290px;
        transition: all 300ms cubic-bezier(0.645, 0.045, 0.355, 1);

    }
    .details span{
    font-size: 18px !important;
    color: #fff;
    }
    .details h3{
    color: #fff;
    font-size: 19px !important;
    }
    .prensa-item{

        padding-bottom: 35px !important;
    }
    .swiper-container {
      width: 100%;
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
    .mfp-wrap{
        display: none;
    }
    ol, p{
        font-size: 20px;
        font-family: "labrador_aregular";
    }
    select2-container--default .select2-search--inline .select2-search__field {
    margin-left: 10px !important;
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
    }
  </style>
</head>
<body>

  @yield ('pre_contenido')

 <!-- Header -->
 <header id="header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12" id="header1">
                <div id="logo" class="pull-left">
                    <a href="/" onclick="window.location.href = 'https://fiscaliamichoacan.gob.mx/';" style="font-weight: 900 !important; color: #C09F77; font-size: 22px;">FGE</a>
                </div>
                <nav id="nav-menu-container">
                    <ul class="nav-menu">
                        <li class="menu-has-children nav-menu-item"><a  href="{{ url('/#Mensaje_PPD') }}">¿Quiénes somos?</a>
                            <ul>
                                <li><a href="{{ url('/#Mision_Vision_Valores') }}">&nbsp;&nbsp;Misión, Visión y Valores</a></li>
                                <li><a href="{{ url('/#Mensaje_PPD') }}">&nbsp;&nbsp;Plan de Persecución de Delitos</a></li>
                            </ul>
                        </li>
                        <li><a class="nav-menu-item" href="{{ url('/#prensa') }}">Comunicación</a></li>
                        <li class="menu-has-children nav-menu-item"><a href="#">Transparencia</a>
                            <ul>
                                <li><a href="https://transparencia.fiscaliamichoacan.gob.mx/" target="_blank"><img src="{{ asset('img/iconos/transparencia.png/') }}" height="30px">&nbsp;&nbsp;Transparencia</a></li>

                                <li><a href="https://consultapublicamx.plataformadetransparencia.org.mx/vut-web/faces/view/consultaPublica.xhtml?idEntidad=MTY=&idSujetoObligado=MjE1NTc=#inicio" target="_blank"><img src="{{ asset('img/iconos/icono_quejasydenuncias.png/') }}" height="30px">&nbsp&nbspObligaciones de Transparencia</a></li>
                                <li><a href="https://fiscaliamichoacan.gob.mx/disciplinafinanciera" target="_blank"><img src="{{ asset('img/iconos/tramites_b.png/') }}" height="30px">&nbsp;&nbsp;Disciplina Financiera</a></li>
                                <li><a href="https://fiscaliamichoacan.gob.mx/cuentaPublica" target="_blank"><img src="{{ asset('img/iconos/Icono menu portal Cuenta Publica.png/') }}" height="30px">&nbsp;&nbsp;Cuenta Pública</a></li>
                                <li><a href="https://fiscaliamichoacan.gob.mx/conac" target="_blank"><img src="{{ asset('img/iconos/icono menu  CONAC.png/') }}" height="30px">&nbsp;&nbsp;Información Financiera CONAC</a></li>

                                <li><a href="https://directorio.fiscaliamichoacan.gob.mx/" target="_blank"><img src="{{ asset('img/iconos/directorio_b.png/') }}" height="30px">&nbsp;&nbsp;Directorio</a></li>
                            </ul>
                        </li>
                        <li class="menu-has-children nav-menu-item"><a href="#">Trámites</a>
                            <ul>
                            <li><a href="{{ url('/denuncia') }}"><img src="{{ asset('img/iconos/denuncia_digital.png/') }}" height="30px">&nbsp&nbspDenuncia en Línea</a></li>
                            <li><a href="{{ url('/cartas') }}" target="_blank"><img src="{{ asset('img/cartas/icono_cartas_menu.png/') }}" height="30px">&nbsp;&nbsp;Cartas en Línea</a></li>
                                <li><a href="{{ url('/tramites') }}" target="_blank"><img src="{{ asset('img/iconos/tramites_b.png/') }}" height="30px">&nbsp&nbspTrámites</a></li>
                                <li><a href="/VehiculosRecuperados" target="_blank"><img src="{{ asset('img/iconos/vehículos_b.png/') }}" height="30px">&nbsp&nbspVehículos Recuperados</a></li>
                                <li><a href="/quejasydenuncias" target="_blank"><img src="{{ asset('img/iconos/icono_quejasydenuncias.png/') }}" height="30px">&nbsp&nbspQuejas y Denuncias</a></li>
                                <li><a href="{{ asset('/documentos/CATÁLOGO DE SERVICIOS FGE.pdf') }}" target="_blank"><img src="{{ asset('img/iconos/eitca_conducta_b.png/') }}" height="30px">&nbsp;&nbsp;Catálogo de Servicios Periciales</a></li>
                            </ul>
                        </li>
                        {{-- <li class="menu-has-children nav-menu-item"><a href="#servicios">Información</a>
                            <ul>
                                <li><a href="https://juridico.fiscaliamichoacan.gob.mx/plataformanormativa/" target="_blank"><img src="{{ asset('img/iconos/plataforma_virtual_narrativa_b.png/') }}" height="30px">&nbsp&nbspNormativa</a></li>
                                <li><a href="{{ url('/acuerdos') }}"><img src="{{ asset('img/iconos/acuerdos.png/') }}" height="30px">&nbsp&nbspAcuerdos</a></li>
                                <li><a href="{{ url('/convocatorias_y_consultas') }}"><img src="{{ asset('img/iconos/convocatorias_b.png/') }}" height="30px">&nbsp&nbspConvocatorias y Consultas</a></li>
                                <li><a href="{{ url('/medidas_proteccion') }}"><img src="{{ asset('img/iconos/proteccion_para_mujeres_b.png/') }}" height="30px">&nbsp&nbspMedidas de Protección a Mujeres</a></li>
                                <li><a href="{{ asset('/documentos/codigo_nacional/CNPP_090819.pdf')}}" target="_blank"><img src="{{ asset('img/iconos/nacional_penal.png/') }}" height="30px">&nbsp&nbspCódigo Nacional de Procedimientos Penales</a></li>
                                <li><a href="{{ asset('/documentos/etica/etica-y-buena-conducta.pdf')}}" target="_blank"><img src="{{ asset('img/iconos/eitca_conducta_b.png/') }}" height="30px">&nbsp&nbspCódigo de Ética</a></li>
                            </ul>
                        </li> --}}
                        <li class="menu-has-children nav-menu-item"><a href="{{ url('#informacion') }}">Consultas</a>
                            <ul>


                                <li><a href="{{ url('/convocatorias_y_consultas') }}" target="_blank"><img src="{{ asset('img/iconos/convocatorias_b.png/') }}" height="30px">&nbsp&nbspConvocatorias y Consultas</a></li>

                                <li><a href="{{ asset('/documentos/etica/6a-9190.pdf')}}" target="_blank"><img src="{{ asset('img/iconos/eitca_conducta_b.png/') }}" height="30px">&nbsp&nbspCódigo de Ética</a></li>
                                <li><a href="{{ url('/avisos') }}" target="_blank"><img src="{{ asset('img/iconos/convocatorias_b.png/') }}" height="30px">&nbsp;&nbsp;Avisos</a></li>
                                <li><a href="{{ asset('/informes')}}" target="_blank"><img src="{{ asset('img/iconos/Icono Informe.png/') }}" height="30px">&nbsp&nbspInformes</a></li>
                                <li><a href="{{ asset('/edictos')}}" target="_blank"><img src="{{ asset('img/iconos/edictos.png/') }}" height="30px">&nbsp&nbspEdictos</a></li>


                            </ul>
                        </li>
                        <li class="menu-has-children nav-menu-item"><a href="{{ url('#informacion') }}">Personas Desaparecidas</a>
                            <ul>
                              <li><a class="menu-has-children nav-menu-item"   target="_blank"><img src="{{ asset('img/iconos/hasvisto_b.png/') }}" height="30px">&nbsp&nbsp¿Has Visto A?</a>
                                <ul>
                                    <li><a href="https://www.facebook.com/AlertaAmberMich" target="_blank"><img src="{{ asset('img/iconos/alerta_amber.png/') }}" height="30px">&nbsp&nbspAlerta Amber</a></li>
                                    <li><a href="https://www.facebook.com/AlertaAlbaMichoacan/" target="_blank"><img src="{{ asset('img/iconos/alerta_amber.png/') }}" height="30px">&nbsp&nbspAlerta Alba</a></li>
                                    <li><a href="{{ url('/medidas_proteccion') }}" target="_blank"><img src="{{ asset('img/iconos/proteccion_para_mujeres_b.png/') }}" height="30px">&nbsp&nbspMedidas de Protección a Mujeres</a></li>
                                    <li><a href="https://hasvistoa.fiscaliamichoacan.gob.mx/" target="_blank"><img src="{{ asset('img/iconos/hasvisto_b.png/') }}" height="30px">&nbsp&nbsp¿Has visto a...?</a></li>
                                </ul></li>
                                <li><a class="menu-has-children nav-menu-item" href="https://identifica.fiscaliamichoacan.gob.mx/"  target="_blank"><img src="{{ asset('img/iconos/icono_identificas.png/') }}" height="30px">&nbsp&nbsp¿Identifica A?</a></li>

                            </ul>
                        </li>
                        <li class="menu-has-children nav-menu-item"><a href="{{ url('#informacion') }}">Micrositios</a>
                            <ul>
                            <li><a href="https://cmasc.fiscaliamichoacan.gob.mx/" target="_blank"><img src="{{ asset('img/iconos/nacional_penal.png/') }}" height="30px">&nbsp;&nbsp;Justicia Alternativa</a></li>
                                      <li><a href="https://cjim.fiscaliamichoacan.gob.mx/" target="_blank"><img src="{{ asset('img/iconos/cjim_b.png/') }}" height="30px">&nbsp;&nbsp;Justicia para la Mujer</a></li>
                                      <li><a href="https://adquisiciones.fiscaliamichoacan.gob.mx/" target="_blank"><img src="{{ asset('img/iconos/tramites_b.png/') }}" height="30px">&nbsp;&nbsp;Comité de Adquisiciones</a></li>
                                      <li><a href="https://asuntosinternos.fiscaliamichoacan.gob.mx/" target="_blank"><img src="{{ asset('img/iconos/tramites_b.png/') }}" height="30px">&nbsp;&nbsp;Asuntos Internos</a></li>
                                      {{-- <li><a href="http://juridico.fiscaliamichoacan.gob.mx/" target="_blank"><img src="{{ asset('img/iconos/nacional_penal.png/') }}" height="30px">&nbsp;&nbsp;Normatividad y Derechos Humanos</a></li> --}}
                                      <li><a href="https://contraloria.fiscaliamichoacan.gob.mx/" target="_blank"><img src="{{ asset('img/iconos/nacional_penal.png/') }}" height="30px">&nbsp;&nbsp;Contraloría Interna</a></li>
                                      <li><a href="https://mapgi.fiscaliamichoacan.gob.mx" target="_blank"><img src="{{ asset('img/iconos/plataforma_virtual_narrativa_b.png/') }}" height="30px">&nbsp&nbspModelo de Actuación con Perspectiva de Género (MAPGI)</a></li>
                            </ul>
                        </li>

                        <li class="menu-has-children nav-menu-item"><a href="{{ url('/descargas') }}" target="_blank">Descargas</a>

                        </li>

                        <li class="nav-menu-item"><a href="#contacto">Contacto</a></li>

                        <div id="top-search" style="float: right;">
							<a href="#" id="top-search-trigger" title="Buscar..."><i style="color: #FFFFFF; " class="icon-search3"></i> <i style="color: #FFFFFF;" class="icon-line-cross" ></i></a>
                            <form action="{{ url("/busqueda/") }}" method="post" id="form-busqueda">
                                {!! csrf_field(); !!}
                                <input type="text" name="busqueda" id="busqueda" class="form-control" value="" placeholder="Ingresa tu busqueda..." required>
							</form>
                        </div><!-- #top-search end -->
                        <li class="nav-menu-item" style="float: right;"><a href="https://www.facebook.com/FiscaliaMich/" target="_blank"><i class="fa fa-facebook"></i></a></li>
                        <li class="nav-menu-item" style="float: right;"><a href="https://twitter.com/FiscaliaMich?lang=es" target="_blank"><i class="fa fa-twitter"></i></a></li>


                        <li class="menu-has-children nav-menu-item" style="float: right;"><a style="color: white !important;"> <img src="{{ asset('img/denuncia/logo_blanco.png') }}" alt="" height="30px;" style="margin-top: -5px;"> Denuncia en Línea&nbsp;&nbsp;</a>
                            <ul>
                                <li><a href="/denuncia" target="_blank"><img src="{{ asset('img/denuncia/logo_blanco.png') }}" height="30px">&nbsp;&nbsp;Presentar Denuncia</a></li>
                                <li><a href="{{asset('documentos/ayuda_denuncia.pdf')}}" target="_blank"><img src="{{ asset('img/iconos/help2.png') }}" height="30px">&nbsp;&nbsp;¿Cómo Presentar Denuncia?</a></li>
                                <li><a href="/consulta" target="_blank"><img src="{{ asset('img/iconos/consulta_digital.png') }}" height="30px">&nbsp;&nbsp;Consultar Denuncia</a></li>
                                <li><a href="{{ url('/login') }}" ><img src="{{ asset('img/Denuncia_policia/icono_micrositio.png') }}" height="30px">&nbsp;&nbsp;Acceso a Policía Estatal</a></li>
                                <li><a href="{{ url('/login') }}" ><img src="{{ asset('img/Denuncia_policia/icono_micrositio.png') }}" height="30px">&nbsp;&nbsp;Acceso a Policía Municpal</a></li>
                            </ul>
                        </li>
                        <li class="nav-menu-item" style="float: right;"><a href="https://juridico.fiscaliamichoacan.gob.mx/plataformanormativa/" target="_blank"><img src="{{ asset('img/iconos_productos/plat_norm.png') }}"height="30px;" style="margin-top: -5px;"> Plataforma Virtual Normativa </a></li>

                        {{-- @guest
                            <li class="nav-menu-item"  style="float: right;">
                                <a href="{{ url('/Predenuncia') }}">&nbsp&nbspPredenuncia</a>
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Iniciar sesión') }}</a>
                            </li>
                            <li class="nav-menu-item"  style="float: right;">
                                <a class="nav-link" href="http://comunicacion.fiscaliamichoacan.gob.mx/login" target="_blank">{{ __('Iniciar sesión') }}</a>
                            </li>
                        @else
                            <li class="menu-has-children nav-menu-item" style="float: right; "><a href="#">{{ Auth::user()->name }}</a>
                                <ul >
                                <!-- <li>
                                    <a href="http://cjim.fiscaliamichoacan.gob.mx/">Perfil</a>
                                </li> -->
                                <li>
                                <a  href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                        {{ __('Cerrar sesión') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown" style="float: right; background-color: #152F4A !important;">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret" style="color: #666"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                        {{ __('Cerrar sesión') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest --}}

                    </ul>
                </nav>
            </div>
            {{-- <div class="col-lg-2 text-center" id="header3">
                <a class="boton-denuncia" href="{{ url('verificarSesion') }}"><i class="fa fa-exclamation-circle"></i>&nbsp;&nbsp;Predenuncia</a>
                <a class="boton-busqueda"><i class="fa fa-search"></i></a>
            </div> --}}
        </div>
        {{-- <nav class="nav button-nav pull-right d-none d-lg-inline">
            <div class="d-xl-inline d-none">
            <a class="boton1 " href="{{ url('/DenunciaDigital/create') }}">&nbsp<i class="fa fa-exclamation"></i>&nbspDenuncia aquí</a>&nbsp&nbsp&nbsp
            <a class="boton2 "  data-toggle="modal" data-target="#ModalBusqueda">&nbsp<i class="fa fa-search"></i>&nbsp¿Buscas algo?</a>&nbsp&nbsp&nbsp
            </div>
            <a href="#" data-toggle="dropdown" id="dropdown-button"><img src="{{ asset('img/mia_logo_color.png') }}" class="boton-mia"></a>&nbsp&nbsp&nbsp
            @guest
                <div class="dropdown-menu menu-emergente" aria-labelledby="dropdownMenuLink" style="margin-top:30px; margin-right:50px;">
                    <div class="text-center">
                    <img src="{{ asset('img/mia_color.png') }}" height="auto" width="100px">
                    </div>

                    {!! Form::open(['url' => 'login', 'method' => 'POST', 'class' => 'px-4 py-3']) !!}
                    <div class="dropdown-divider"></div>
                    <div class="form-group text-center">
                    <label>Usuario</label>
                    <input type="text" id="usuario" name="usuario" class="form-control" placeholder="Escribe tu usuario">
                    </div>
                    <div class="form-group text-center">
                    <label >Contraseña</label>
                    <input type="password" id="password" name="password" class="form-control" placeholder="Escribe tu contraseña">
                    </div>
                    <div class="text-center">
                    <button type="submit" class="btn btn-primary">Iniciar sesión</button>
                    </div>
                    {!! Form::close() !!}
                </div>
            @else
                <div class="dropdown-menu menu-emergente" aria-labelledby="dropdownMenuLink" style="margin-top:30px; margin-right:50px; width:40vw; height:80vh;">
                    <div class="row" style="margin-left:10px; margin-top:10px; margin-right:10px;">
                    <div class="col-lg-2 text-left">
                        <b style="text-transform: uppercase;">{{ Auth::user()->name }}</b>
                        <br>
                        <a href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                            {{ __('Salir') }}
                        </a>
                    </div>
                    <div class="col-lg-10 text-right">
                        <img src="{{ asset('img/mia_color.png') }}" height="auto" width="70px">
                    </div>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    </div>
                    <div class="dropdown-divider"></div>
                    <div class="row" style="margin-left:10px; margin-top:10px; margin-right:10px; margin-bottom:10px;">
                    <!-- B1 -->
                    <div class="row" style="width: 100%;">
                        <div class="col-lg-3 text-center">
                        <a href="http://dgtipe.pgje.michoacan.gob.mx/accesos_mia/acceso_producto.php?pbi=MjQ=">
                            <img src="{{ asset('img/iconos_productos/mun_prior.png') }}" height="80px" width="auto">
                            <br>50 municipios prioritarios
                        </a>
                        </div>
                        <div class="col-lg-3 text-center">
                        <a href="http://dgtipe.pgje.michoacan.gob.mx/accesos_mia/acceso_producto.php?pbi=MjA=">
                            <img src="{{ asset('img/iconos_productos/alert_gen.png') }}" height="80px" width="auto">
                            <br>Alerta de Género
                        </a>
                        </div>
                        <div class="col-lg-3 text-center">
                        <a href="http://dgtipe.pgje.michoacan.gob.mx/accesos_mia/acceso_producto.php?pbi=MjM=">
                            <img src="{{ asset('img/iconos_productos/carp_inv.png') }}" height="80px" width="auto">
                            <br>Carpetas de Investigación
                        </a>
                        </div>
                        <div class="col-lg-3 text-center">
                        <a href="http://dgtipe.pgje.michoacan.gob.mx/accesos_mia/acceso_producto.php?pbi=MzM=">
                            <img src="{{ asset('img/iconos_productos/empre.png') }}" height="80px" width="auto">
                            <br>Empresarial
                        </a>
                        </div>
                    </div>

                    <div class="row" style="width: 100%;">
                        <div class="col-lg-3 text-center">
                        <a href="http://dgtipe.pgje.michoacan.gob.mx/accesos_mia/acceso_producto.php?pbi=NDQ=">
                            <img src="{{ asset('img/iconos_productos/geo_homi.png') }}" height="80px" width="auto">
                            <br>Georeferencia de homicidios
                        </a>
                        </div>
                        <div class="col-lg-3 text-center">
                        <a href="http://dgtipe.pgje.michoacan.gob.mx/accesos_mia/acceso_producto.php?pbi=MzA=">
                            <img src="{{ asset('img/iconos_productos/geo_aut.png') }}" height="80px" width="auto">
                            <br>Georeferencia de delitos en autopista
                        </a>
                        </div>
                        <div class="col-lg-3 text-center">
                        <a href="http://dgtipe.pgje.michoacan.gob.mx/accesos_mia/acceso_producto.php?pbi=MzE=">
                            <img src="{{ asset('img/iconos_productos/del_prel.png') }}" height="80px" width="auto">
                            <br>Georeferencia de delitos preliminares
                        </a>
                        </div>
                        <div class="col-lg-3 text-center">
                        <a href="http://dgtipe.pgje.michoacan.gob.mx/accesos_mia/acceso_producto.php?pbi=MjU=">
                            <img src="{{ asset('img/iconos_productos/alto_imp.png') }}" height="80px" width="auto">
                            <br>Georeferencia de alto impacto
                        </a>
                        </div>
                    </div>

                    <div class="row" style="width: 100%;">
                        <div class="col-lg-3 text-center">
                        <a href="http://dgtipe.pgje.michoacan.gob.mx/accesos_mia/acceso_producto.php?pbi=Mjc=">
                            <img src="{{ asset('img/iconos_productos/tod_del.png') }}" height="80px" width="auto">
                            <br>Georeferencia de todos los delitos
                        </a>
                        </div>
                        <div class="col-lg-3 text-center">
                        <a href="http://dgtipe.pgje.michoacan.gob.mx/accesos_mia/acceso_producto.php?pbi=MjE=">
                            <img src="{{ asset('img/iconos_productos/agrav_muj.png') }}" height="80px" width="auto">
                            <br>Homicidio en agravio de la mujer
                        </a>
                        </div>
                        <div class="col-lg-3 text-center">
                        <a href="http://dgtipe.pgje.michoacan.gob.mx/accesos_mia/acceso_producto.php?pbi=MTg=">
                            <img src="{{ asset('img/iconos_productos/del_est.png') }}" height="80px" width="auto">
                            <br>Incidencia delictiva estatal
                        </a>
                        </div>
                        <div class="col-lg-3 text-center">
                        <a href="http://dgtipe.pgje.michoacan.gob.mx/accesos_mia/acceso_producto.php?pbi=MTc=">
                            <img src="{{ asset('img/iconos_productos/del_nac.png') }}" height="80px" width="auto">
                            <br>Incidencia delictiva nacional
                        </a>
                        </div>
                    </div>

                    <div class="row" style="width: 100%;">
                        <div class="col-lg-3 text-center">
                        <a href="http://dgtipe.pgje.michoacan.gob.mx/accesos_mia/acceso_producto.php?pbi=MzI=">
                            <img src="{{ asset('img/iconos_productos/nac_vic.png') }}" height="80px" width="auto">
                            <br>Incidencia nacional de victimas
                        </a>
                        </div>
                        <div class="col-lg-3 text-center">
                        <a href="http://dgtipe.pgje.michoacan.gob.mx/accesos_mia/acceso_producto.php?pbi=Mjk=">
                            <img src="{{ asset('img/iconos_productos/ind_des.png') }}" height="80px" width="auto">
                            <br>Indicadores de desempeño
                        </a>
                        </div>
                        <div class="col-lg-3 text-center">
                        <a href="http://dgtipe.pgje.michoacan.gob.mx/accesos_mia/acceso_producto.php?pbi=MjY=">
                            <img src="{{ asset('img/iconos_productos/ejec_est.png') }}" height="80px" width="auto">
                            <br>Informe ejecutivo estadístico
                        </a>
                        </div>
                        <div class="col-lg-3 text-center">
                        <a href="http://dgtipe.pgje.michoacan.gob.mx/accesos_mia/acceso_producto.php?pbi=MjI=">
                            <img src="{{ asset('img/iconos_productos/inf_veh.png') }}" height="80px" width="auto">
                            <br>Infraestructura vehicular
                        </a>
                        </div>
                    </div>

                    <div class="row" style="width: 100%;">
                        <div class="col-lg-3 text-center left">
                        <a href="http://dgtipe.pgje.michoacan.gob.mx/accesos_mia/acceso_producto.php?pbi=MTk=">
                            <img src="{{ asset('img/iconos_productos/per_no.png') }}" height="80px" width="auto">
                            <br>Personas no localizadas
                        </a>
                        </div>
                    </div>

                    </div>
                </div>
            @endguest
        </nav> --}}
    </div>
</header>
  <!-- #header -->

{{-- <div class="modal fade" id="ModalBusqueda" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="TituloModal">¿Que estás buscando?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="input-group mb-3 search-form">
                    <input type="text" class="form-control" placeholder="Escribe lo que necesites encontrar" aria-label="Escribe lo que necesites encontrar" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="button"><i class="fa fa-search"></i> Buscar</button>
                    </div>
                </div>

                <div class="row">
                    <input type="text" class="form-control" id="formBusqueda" placeholder="Escribe lo que estes buscando...">
                    <button type="button" name="button"><i class="fa fa-search"></i></button>
                </div>
            </div>
        </div>
    </div>
</div> --}}



<div style=" background-image: url('{{ asset('img/bg_fiscalia.png') }}'); background-repeat: no-repeat; background-attachment: fixed; background-position: right;">
    @yield ('contenido')
</div>
  <!-- Footer -->

        <footer id="footer" class="site-footer">
         
            @yield('contadores')
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-8 col-8" style="background-color: #C6C6C6; height: 10px;"></div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-1" style="background-color: #C09F77; height: 10px;"></div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-3" style="background-color: #152F4A; height: 10px;"></div>
            </div>
            <div class="container-fluid bottom">
                <div class="row">
                    <div class="col-lg-3  col-xs-12 text-lg-center text-sm-center text-center list-inline">
                        <span>AVISO DE PRIVACIDAD</span><br>
                        <a class="footer-boton" onclick="aviso();">Consulta aquí</a>
                    </div>
                    <div class="col-lg-2 col-xs-12 text-lg-center text-sm-center text-center list-inline">
                        <span>DIRECTORIO</span><br>
                        <a class="footer-boton" href="https://directorio.fiscaliamichoacan.gob.mx" target="_blank">Consulta aquí</a>
                    </div>
                    <div class="col-lg-5 col-xs-12 text-lg-center text-sm-center text-center list-inline">
                        <span>ASISTENCIA Y EMERGENCIA | 24 / 7</span><br>
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <a href="tel:4433223600">Urgencia Fiscalía - 322 3600 </a>
                            </li>

                            <li class="list-inline-item">
                                <a href="tel:4432996698">Fiscalía Desaparecidos - 299 66 98 </a>

                            </li>

                            <li class="list-inline-item">
                                <a href="tel:4433223600">Fiscalía Secuestros - 322 3600 </a>
                            </li>

                            <li class="list-inline-item">
                                <a href="tel:911">911</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-2 col-xs-12 text-lg-center text-sm-center text-center list-inline">
                        <span>SÍGUENOS</span><br>
                        <a href="https://www.facebook.com/FiscaliaMich/" target="_blank"><i class="fa fa-facebook-square"></i>&nbsp&nbspFacebook</a>
                        <a href="https://twitter.com/FiscaliaMich" target="_blank"><i class="fa fa-twitter-square"></i>&nbsp&nbspTwitter</a>
                    </div>
                </div><br>
                <hr>
                <div class="row copyright">
                    <div class="col-lg-12 text-lg-center text-sm-center text-center">
                        <span>2019 FISCALÍA GENERAL DEL ESTADO DE MICHOACÁN ©</span><br>
                        <span>Periférico Paseo de la República #5000 Col. Sentimientos de la Nación, CP 58170 Morelia, Michoacán.</span><br>
                        <a href="https://dgtipe.fiscaliamichoacan.gob.mx">&nbsp&nbspDGTIPE</a>&nbsp&nbsp|
                        <a href="https://tecnologias.fiscaliamichoacan.gob.mx">&nbsp&nbspDTI</a>
                    </div>
                </div>

            </div>



            </div>

              
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
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
            <h2>Aviso de Protección de Datos</h2>
            <text style="margin: 0 20px 50px 20px; text-align:justify;">
                   La Fiscalía General del Estado de Michoacán, es el sujeto obligado y responsable del tratamiento de los datos personales que se recaban a través de <a href="https://fiscaliamichoacan.gob.mx/" target="_blank">https://fiscaliamichoacan.gob.mx/</a> los cuales serán protegidos conforme a lo dispuesto por la Ley de Protección de Datos Personales en Posesión de Sujetos Obligados, y demás normatividad que resulte aplicable.
                <br><br>Los datos personales recabados son: nombre, correo electrónico, domicilio, teléfono particular, teléfono celular, estado civil, firma, registro federal de contribuyentes (RFC), cédula única del registro de población (CURP), lugar y fecha de nacimiento. La finalidad principal de la recolección y posterior tratamiento de los datos personales es garantizar la debida protección de su integridad física y patrimonial mediante la pronta, expedita y debida procuración de justicia. Sin embargo, dicha información también podrá ser utilizada para la generación de información estadística y la persecución de delitos descritos en la normatividad aplicable en la entidad, así como para dirimir trámites administrativos o de naturaleza laboral.
                <br><br>Para solicitar la revocación del consentimiento para el tratamiento de sus datos personales, deberá realizar un escrito libre, dirigido a la Unidad de Transparencia de la Fiscalía General del Estado de Michoacán, o al correo electrónico <a href="mailto:transparencia@fiscaliamichoacan.gob.mx" target="_blank">transparencia@fiscaliamichoacan.gob.mx</a>
                <br><br>Usted podrá consultar el aviso de privacidad integral en la siguiente dirección electrónica: <a href="{{ url('/Aviso-de-privacidad')}}" target="_blank">https://fiscaliamichoacan.gob.mx/Aviso-de-privacidad</a>
                <br><br>O bien de manera presencial en las instalaciones de la Fiscalía General, con domicilio en Periférico Independencia número 5000, Colonia Sentimientos de la Nación, C.P. 58170, Morelia Michoacán.
            </text>
          </div>
        </div>
      </div>

  @include('layouts.version2.librerias_js') <!-- Librerias js-->

<script>
    function aviso(){
        $('#modal').modal('show');
    }
</script>
<script>
var $window = $(window),
    $body = $('body'),
    $topSearch = $('#top-search'),
    $topCart = $('#top-cart'),
    $pagemenu = $('#page-menu');


$(document).on('click', function(event) {
    if (!$(event.target).closest('#top-search').length) { $body.toggleClass('top-search-open', false); }
    if (!$(event.target).closest('#top-cart').length) { $topCart.toggleClass('top-cart-open', false); }
    if (!$(event.target).closest('#page-menu').length) { $pagemenu.toggleClass('pagemenu-active', false); }
    if (!$(event.target).closest('#side-panel').length) { $body.toggleClass('side-panel-open', false); }
    if (!$(event.target).closest('#primary-menu').length) { $('#primary-menu.on-click > ul').find('.d-block').removeClass('d-block'); }
    if (!$(event.target).closest('#primary-menu.mobile-menu-off-canvas > ul').length) { $('#primary-menu.mobile-menu-off-canvas > ul').toggleClass('d-block', false); }
    if (!$(event.target).closest('#primary-menu.mobile-menu-off-canvas > div > ul').length) { $('#primary-menu.mobile-menu-off-canvas > div > ul').toggleClass('d-block', false); }
});

$("#top-search-trigger").off( 'click' ).on( 'click', function(e){
    $body.toggleClass('top-search-open');
    $topCart.toggleClass('top-cart-open', false);
    $( '#primary-menu > ul, #primary-menu > div > ul' ).toggleClass('d-block', false);
    $pagemenu.toggleClass('pagemenu-active', false);
    if ($body.hasClass('top-search-open')){
        $topSearch.find('input').focus();
    }
    e.stopPropagation();
    e.preventDefault();
});

$("#busqueda").onfocus = function(event) {
    if(event.keyCode == 13) {
        alert('asd');
        event.preventDefault();
        return false;
    }
};


function aviso(){
        $('#modal').modal('show');
    }



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
						delay:9000,
						navigation: {
							keyboardNavigation:"off",
							keyboard_direction: "horizontal",
							mouseScrollNavigation:"off",
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
									h_offset:500,
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
						spinner:"off",
						stopLoop:"on",
						stopAfterLoops:0,
						stopAtSlide:1,
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
        depth: 170,
        modifier: 2,
        slideShadows : true,
      },
      pagination: {
        el: '.swiper-pagination',
      },
    });


    </script>
  @yield('js')
</body>
</html>

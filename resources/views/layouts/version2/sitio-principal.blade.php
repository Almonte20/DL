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

  @include('layouts.version2.librerias_css')

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
                        <a href="{{ url('/') }}" onclick="location.href='http://fiscaliamichoacan.gob.mx/';" style="font-weight: 900 !important; color: #C09F77; font-size: 22px;">FGE</a>
                    </div>
                    <nav id="nav-menu-container">

                            <ul class="nav-menu">

                                <li><a class="nav-menu-item" href="{{ url('/#prensa') }}">Comunicación </a></li>
                                <li class="menu-has-children nav-menu-item"><a href="{{ url('#informacion') }}">Transparencia</a>
                                    <ul>
                                        <li><a href="https://transparencia.fiscaliamichoacan.gob.mx/" target="_blank"><img src="{{ asset('img/iconos/transparencia.png/') }}" height="30px">&nbsp;&nbsp;Transparencia</a></li>
                                        <li><a href="https://directorio.fiscaliamichoacan.gob.mx/" target="_blank"><img src="{{ asset('img/iconos/directorio_b.png/') }}" height="30px">&nbsp;&nbsp;Directorio</a></li>
                                    </ul>
                                </li>
                                <li class="menu-has-children nav-menu-item"><a href="#servicios">Servicios</a>
                                    <ul>
                                @php /* <li><a href="{{ url('/verificarSesion') }}"><img src="{{ asset('img/iconos/denuncia_digital.png/') }}" height="30px">&nbsp&nbspPredenuncia</a></li> */ @endphp
                                <li><a href="{{ url('/cartas') }}" target="_blank"><img src="{{ asset('img/cartas/icono_cartas_menu.png/') }}" height="30px">&nbsp;&nbsp;Cartas de No Antecedentes Penales en Línea</a></li>
                                        <li><a href="http://codigo.michoacan.gob.mx/busq_dep.php?id_dep=15" target="_blank"><img src="{{ asset('img/iconos/tramites_b.png/') }}" height="30px">&nbsp&nbspTrámites</a></li>
                                        <li><a href="https://www.facebook.com/AlertaAmberMich" target="_blank"><img src="{{ asset('img/iconos/alerta_amber.png/') }}" height="30px">&nbsp&nbspAlerta Amber</a></li>
                                        <li><a href="https://hasvistoa.fiscaliamichoacan.gob.mx/" target="_blank"><img src="{{ asset('img/iconos/hasvisto_b.png/') }}" height="30px">&nbsp&nbsp¿Has visto a...?</a></li>
                                        <li><a href="/VehiculosRecuperados" target="_blank"><img src="{{ asset('img/iconos/vehículos_b.png/') }}" height="30px">&nbsp&nbspVehículos Recuperados</a></li>
                                    </ul>
                                </li>
                                <li class="menu-has-children nav-menu-item"><a href="#servicios">Información</a>
                                    <ul>
                                      <li><a href="https://juridico.fiscaliamichoacan.gob.mx/plataformanormativa/" target="_blank"><img src="{{ asset('img/iconos/plataforma_virtual_narrativa_b.png/') }}" height="30px">&nbsp&nbspNormativa</a></li>
                                        <li><a href="{{ url('/acuerdos') }}"><img src="{{ asset('img/iconos/acuerdos.png/') }}" height="30px">&nbsp&nbspAcuerdos</a></li>
                                        <li><a href="{{ url('/convocatorias_y_consultas') }}"><img src="{{ asset('img/iconos/convocatorias_b.png/') }}" height="30px">&nbsp&nbspConvocatorias</a></li>
                                        <li><a href="{{ url('/medidas_proteccion') }}"><img src="{{ asset('img/iconos/proteccion_para_mujeres_b.png/') }}" height="30px">&nbsp&nbspMedidas de Protección a Mujeres</a></li>
                                        <li><a href="{{ asset('/documentos/codigo_nacional/CNPP_090819.pdf')}}" target="_blank"><img src="{{ asset('img/iconos/nacional_penal.png/') }}" height="30px">&nbsp&nbspCódigo Nacional de Procedimientos Penales</a></li>
                                        <li><a href="{{ asset('/documentos/etica/etica-y-buena-conducta.pdf')}}" target="_blank"><img src="{{ asset('img/iconos/eitca_conducta_b.png/') }}" height="30px">&nbsp&nbspCódigo de Ética</a></li>
                                    </ul>
                                </li>
                                <li class="menu-has-children nav-menu-item"><a href="{{ url('#informacion') }}">Micrositios</a>
                                    <ul><li><a href="http://cjim.fiscaliamichoacan.gob.mx/"><img src="{{ asset('img/iconos/cjim_b.png/') }}" height="30px">&nbsp&nbspCJIM</a></li>
                                    </ul>
                                </li>
                                <li class="nav-menu-item"><a href="#contacto">Contacto</a></li>
                                
                                
                                <li class="nav-menu-item" style="float: right;"><a href="https://www.facebook.com/FiscaliaMich/" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                <li class="nav-menu-item" style="float: right;"><a href="https://twitter.com/FiscaliaMich?lang=es" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                @guest
                                <!-- <li class="nav-menu-item"  style="float: right;">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Iniciar sesión') }}</a>
                                </li> -->
                            @else
                                <li class="menu-has-children nav-menu-item" style="float: right; "><a href="#">{{ Auth::user()->name }}</a>
                                    <ul >
                                     <!--  <li>
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
                                <!-- <li class="nav-item dropdown" style="float: right; background-color: #152F4A !important;">
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
                                </li> -->
                            @endguest

                            </ul>
                        </nav>
                    
                </div>

                @php
                /*
                <div class="col-lg-2 text-center" id="header3">
                    <a class="boton-denuncia" href="{{ url('verificarSesion') }}"><i class="fa fa-exclamation-circle"></i>&nbsp;&nbsp;Predenuncia</a>
                    <a class="boton-busqueda"><i class="fa fa-search"></i></a>
                </div>
                */
                @endphp

            </div>



        <nav class="nav button-nav pull-right d-none d-lg-inline">
          {{-- <div class="d-xl-inline d-none">
            <a class="boton1 " href="{{ url('/DenunciaDigital/create') }}">&nbsp<i class="fa fa-exclamation"></i>&nbspDenuncia aquí</a>&nbsp&nbsp&nbsp
            <a class="boton2 "  data-toggle="modal" data-target="#ModalBusqueda">&nbsp<i class="fa fa-search"></i>&nbsp¿Buscas algo?</a>&nbsp&nbsp&nbsp
          </div>
          <a href="#" data-toggle="dropdown" id="dropdown-button"><img src="{{ asset('img/mia_logo_color.png') }}" class="boton-mia"></a>&nbsp&nbsp&nbsp --}}
            @guest
            {{-- <div class="dropdown-menu menu-emergente" aria-labelledby="dropdownMenuLink" style="margin-top:30px; margin-right:50px;">
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
            </div> --}}
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
                {{-- <div class="col-lg-10 text-right">
                  <img src="{{ asset('img/mia_color.png') }}" height="auto" width="70px">
                </div> --}}
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

        </nav>



    </div>

  </header>
  <!-- #header -->
  <div class="modal fade" id="ModalBusqueda" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

          {{-- <div class="row">
            <input type="text" class="form-control" id="formBusqueda" placeholder="Escribe lo que estes buscando...">
            <button type="button" name="button"><i class="fa fa-search"></i></button>
          </div> --}}
        </div>
      </div>
    </div>
  </div>

  <div style="min-height: calc(100vh - 50px);">
      @yield ('contenido')
  </div>
  <!-- Footer -->
<footer class="site-footer">
    <div class="container-fluid bottom">
        <div class="row">
            <div class="col-lg-3 col-xs-12 text-lg-center text-sm-center text-center list-inline">
                <span>AVISO DE PRIVACIDAD Y PROTECCIÓN DE DATOS PERSONALES</span><br>
                <a class="footer-boton" onclick="aviso();">Consulta aquí</a>
            </div>
            <div class="col-lg-2 col-xs-12 text-lg-center text-sm-center text-center list-inline">
                <span>DIRECTORIO</span><br>
                <a class="footer-boton" href="https://directorio.fiscaliamichoacan.gob.mx" target="_blank">Consulta aquí</a>
            </div>
            <div class="col-lg-5 col-xs-12 text-lg-center text-sm-center text-center list-inline">
                <span>ASISTENCIA Y EMERGENCIA</span><br>
                <ul class="list-inline">
                    <li class="list-inline-item">
                        <a href="tel:4433223600">322 3600 CAD</a>
                    </li>

                    <li class="list-inline-item">
                        <a href="tel:070">070</a>
                    </li>

                    <li class="list-inline-item">
                        <a href="tel:065">065 Cruz Roja</a>
                    </li>

                    <li class="list-inline-item">
                        <a href="tel:066">066 Emergencias</a>
                    </li>

                    <li class="list-inline-item">
                        <a href="tel:089">089 Denuncia anónima</a>
                    </li>
                </ul>
            </div>
            <div class="col-lg-2 col-xs-12 text-lg-center text-sm-center text-center list-inline">
                <span>SÍGUENOS</span><br>
                <a href="https://www.facebook.com/FiscaliaMich/"><i class="fa fa-facebook-square"></i>&nbsp&nbspFacebook</a>
                <a href="https://twitter.com/FiscaliaMich"><i class="fa fa-twitter-square"></i>&nbsp&nbspTwitter</a>
            </div>
        </div><br>
        <hr>
        <div class="row copyright">
            <div class="col-lg-12 text-lg-center text-sm-center text-center">
                <span>2019 FISCALÍA GENERAL DEL ESTADO DE MICHOACÁN ©</span><br>
                <a href="https://dgtipe.fiscaliamichoacan.gob.mx">&nbsp&nbspDGTIPE</a>&nbsp&nbsp|
                <a href="https://tecnologias.fiscaliamichoacan.gob.mx">&nbsp&nbspDTI</a>
            </div>
        </div>

    </div>


        {{-- <div class="">


            <div class="row">

                <div class="col-lg-4 col-xs-12 text-lg-center text-sm-center text-center list-inline">
                    <p>Aviso de privacidad y protección de datos</p>
                    <a href="http://michoacan.gob.mx/aviso-proteccion-datos/">Consúltalo aquí</a>
                </div>

                <div class="col-lg-4 col-xs-12 text-lg-center text-center">
                    <p>Asistencia y Emergencia</p>
                    <ul class="list-inline">
                        <li class="list-inline-item">
                            <a href="tel:018004554500">01 (800) 455 4500</a>
                        </li>

                        <li class="list-inline-item">
                            <a href="tel:070">070</a>
                        </li>

                        <li class="list-inline-item">
                            <a href="tel:065">065 Cruz Roja</a>
                        </li>

                        <li class="list-inline-item">
                            <a href="tel:066">066 Emergencias</a>
                        </li>

                        <li class="list-inline-item">
                            <a href="tel:089">089 Denuncia anónima</a>
                        </li>
                    </ul>
                </div>

                <div class="col-lg-4 col-xs-12 text-lg-center text-sm-center text-center">
                    <p>Síguenos en Redes Sociales</p>
                    <div class="social-media">
                        <a class="twitter" href="https://twitter.com/FiscaliaMich?lang=es"><i class="fa fa-twitter"></i></a>&nbsp&nbsp
                        <a class="facebook" href="https://www.facebook.com/FiscaliaMich/"><i class="fa fa-facebook-square"></i></a>&nbsp&nbsp
                        <a class="mail" href="mailto:pgjecomsoc@michoacan.gob.mx"><i class="fa fa-envelope"></i></a>
                    </div>
                </div>

            </div>
            <hr>
            <div class="row">

                <div class="col-lg-4 col-md-12 col-12 text-lg-center text-center d-none d-lg-block">
                    <img src="{{ asset('img/escudo_mich.png')}}" alt="Estado de Michoacán" class="image_footer_mich">
                </div>

                <div class="col-lg-4 col-md-12 col-12 text-lg-center text-center">
                    <div class="credits">
                    <p class="copyright-text">
                        © 2019 Fiscalía General de Michoacán
                    </p>
                        <a href="http://dgtipe.pgje.michoacan.gob.mx">DGTIPE</a> | <a href="http://dgtipe.pgje.michoacan.gob.mx/tics/">DTI</a>
                    </div>
                </div>

                <div class="col-lg-4 col-md-12 col-12 text-lg-center text-center">
                    <img src="{{ asset('img/escudo_mich.png')}}" alt="Estado de Michoacán" class="image_footer2 d-inline d-lg-none efecto-gris">
                    <img src="{{ asset('img/dgtipe.png')}}" alt="Dirección General de Tecnologias de la Información, Planeación y Estadistica" class="image_footer2 efecto-gris">
                    <img src="{{ asset('img/dti.png')}}" alt="Dirección de Tecnologias de la Información" class="image_footer efecto-gris">
                </div>

            </div>

        </div> --}}
    </div>
</footer>
  <!-- #footer -->
  <!-- IconoScrollTop -->
  <a class="scrolltop" href="#"><span class="fa fa-angle-up"></span></a>
  <!-- #IconoScrollTop -->
<!--Aviso de privacidad-->
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
                Los datos personales recabados, serán protegidos, incorporados y tratados en el banco de datos de la Fiscalía General del Estado, de conformidad con lo dispuesto en el artículo Sexto Transitorio de la Ley de Transparencia, Acceso a la Información Pública y Protección de Datos Personales del Estado de Michoacán de Ocampo.

                Su finalidad es la de contar con la información necesaria que permita brindar el servicio y/o la toma de decisión para el otorgamiento, inclusión o autorización en los programas o trámites solicitados, por lo que únicamente serán utilizados para ese efecto y para fines estadísticos.

                Estos datos tienen el carácter de obligatorio y en caso de no proporcionarlos no podrá participar en la inclusión al programa, apoyo o trámite solicitado.
        </text>
      </div>
    </div>
  </div>

@include('layouts.version2.librerias_js') <!-- Librerias js-->
<script>
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
						delay:5000,
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

    function aviso(){
        $('#modal').modal('show');
    }


</script>
  @yield('js')
</body>
</html>

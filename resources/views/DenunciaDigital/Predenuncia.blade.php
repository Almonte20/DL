@extends('layouts.version2.modulos')

@section('titulo','Predenuncia')

@section('contenido')

    @if($errors ->any())
        <li class="list-group-item list-group-item-danger" style="text-align:center">
            <h6>Para continuar con el registro corrige los siguientes errores:</h6>
        </li>
    @endif

    <link rel="stylesheet" href= "assetsWizard/css/form-elements.css">
    <link rel="stylesheet" href= "assetsWizard/css/style.css">
    <link rel="stylesheet" href= "assetsWizard/fontawesome-pro-5.10.2-web/css/all.css">


<div class="top-content">


    
    <div class="container">

 

          <div class="row">
            <div class="col-sm-10 col-sm-offset-1 col-md-12 col-lg-12 col-lg-offset-0 form-box">
                {!! Form::open(['route' => 'Predenuncia.store', 'method' => 'POST', 'files' => true,'class' => 'f1']) !!}
                <!--<form role="form" action="" method="post" class="f1"> -->

                    <div class="f1-steps" style="text-align: center;">
                        <div class="f1-progress">
                            <div class="f1-progress-line" data-now-value="16.66" data-number-of-steps="3" style="width: 16.66%;"></div>
                        </div>
                        <div class="f1-step active">
                            <div class="f1-step-icon"><i class="fal fa-user-circle"></i></div>
                            <p>Generales</p>
                        </div>
                        <div class="f1-step">
                            <div class="f1-step-icon"><i class="fal fa-pen-alt"></i></div>
                            <p>Hechos</p>
                        </div>
                        <div class="f1-step">
                            <div class="f1-step-icon"><i class="fal fa-fingerprint"></i></div>
                            <p>Evidencias</p>
                        </div>
                    </div>
                    <div class="form-row col-lg-12" id="campos_faltantes" style="display: none">
                        <div class="form-group col-md-6.5" style="background-color: #f8d7da;">
                            {!! Form::label('nombre', '* Por favor verifique que los campos requeridos se encuentren ingresados.',['style' => 'color: #721c24']) !!}
                        </div>
                    </div>
                    <fieldset>

                        <h1>Datos personales:</h1>
                        <div class="form-row col-lg-12">
                            <div class="form-group col-md-4">
                                <div class="form-ic-cmp">
                                    <i class="fad fa-id-card"></i>&nbsp;
                                {!! Form::label('nombre', 'Nombre') !!}
                                </div>
                                {!! Form::text('nombre', $datos_usuario[0]->name, ['class' => 'form-control','maxlength'=> '50', 'style' => 'background-color:rgba(230, 238, 250, 0.5);']) !!}
                                <div style="color:#FF0000;">
                                    {{ $errors->first('nombre') }}
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <div class="form-ic-cmp">
                                    <i class="fad fa-id-card"></i>&nbsp;
                                {!! Form::label('PrimerApellido', 'Primer Apellido') !!}
                                </div>
                                {!! Form::text('PrimerApellido', $datos_usuario[0]->PrimerApellido, ['class' => 'form-control','maxlength'=> '50', 'style' => 'background-color:rgba(230, 238, 250, 0.5);']) !!}
                                <div style="color:#FF0000;">
                                    {{ $errors->first('PrimerApellido') }}
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <div class="form-ic-cmp">
                                    <i class="fad fa-id-card"></i>&nbsp;
                                {!! Form::label('SegundoApellido', 'Segundo Apellido') !!}
                                </div>
                                {!! Form::text('SegundoApellido', $datos_usuario[0]->SegundoApellido, ['class' => 'form-control', 'maxlength'=> '50','style' => 'background-color:rgba(230, 238, 250, 0.5);']) !!}
                                <div style="color:#FF0000;">
                                    {{ $errors->first('SegundoApellido') }}
                                </div>
                            </div>
                        </div>

                        <div class="form-row col-lg-12">
                            <div class="form-group col-md-4">
                                <div class="form-ic-cmp">
                                    <i class="fad fa-id-card"></i>&nbsp;
                                {!! Form::label('curp', 'CURP') !!}
                                </div>
                                {!! Form::text('curp', $datos_usuario[0]->CURP, ['class' => 'form-control', 'maxlength'=> '18','style' => 'background-color:rgba(230, 238, 250, 0.5);']) !!}
                                <div style="color:#FF0000;">
                                    {{ $errors->first('curp') }}
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <div class="form-ic-cmp">
                                    <i class="fal fa-at"></i>&nbsp;
                                {!! Form::label('correo', 'Correo') !!}
                                </div>
                                {!! Form::email('correo', $datos_usuario[0]->email, ['class' => 'form-control', 'maxlength'=> '50','readonly' => 'true','placeholder' => 'example@dominio.com','style' => 'background-color:rgba(178, 173, 173, 0.5);']) !!}
                                <div style="color:#FF0000;">
                                    {{ $errors->first('correo') }}
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <div class="form-ic-cmp">
                                    <i class="fal fa-phone-alt"></i>&nbsp;
                                {!! Form::label('telefono', 'Teléfono') !!}
                                </div>
                                {!! Form::text('telefono', $datos_usuario[0]->Telefono, ['class' => 'form-control','maxlength'=> '10','onkeypress'=>'return justNumbers(event);','style' => 'background-color:rgba(230, 238, 250, 0.5);']) !!}
                                <div style="color:#FF0000;">
                                    {{ $errors->first('telefono') }}
                                </div>
                            </div>
                        </div>

                        <h1>Datos del domicilio:</h1>

                        <div class="form-row col-lg-12">
                            <div class="form-group col-md-4">
                                <div class="form-ic-cmp">
                                    <i class="fal fa-globe-americas"></i>&nbsp;
                                {!! Form::label('pais', 'País de residencia') !!}
                                </div>
                                {!! Form::select('pais',$paises,$datos_usuario[0]->Pais, ['class' => 'form-control','placeholder' => 'Seleccione una opcion', 'style' => 'background-color:rgba(230, 238, 250, 0.5);',]) !!}
                                <div style="color:#FF0000;">
                                    {{ $errors->first('pais') }}
                                </div>
                            </div>
                            <div class="form-group col-md-8" id = "extranjero" style="display: none">
                                <div class="form-ic-cmp">
                                    <i class="fal fa-home"></i>&nbsp;
                                    {!! Form::label('domicilio_extranjero', 'Domicilio') !!}
                                </div>
                                {!! Form::text('domicilio_extranjero',  $datos_usuario[0]->DomicilioExtranjero, ['class' => 'form-control', 'maxlength'=> '255','placeholder' => 'Ciudad Extrajera','style' => 'background-color:rgba(230, 238, 250, 0.5);']); !!}
                                <div style="color:#FF0000;">
                                    {{ $errors->first('domicilio_extranjero') }}
                                </div>
                            </div>
                        </div>
                        <div id = "mexico" style="display: none">
                        <div class="form-row col-lg-12">
                            <div class="form-group col-md-4">
                                <div class="form-ic-cmp">
                                    <i class="fal fa-map"></i>&nbsp;
                                {!! Form::label('entidad', 'Estado de residencia') !!}
                                </div>
                                {!! Form::select('entidad',$estados, $datos_usuario[0]->Entidad, ['class' => 'form-control','placeholder' => 'Seleccione una opcion', 'style' => 'background-color:rgba(230, 238, 250, 0.5);']) !!}
                                <div style="color:#FF0000;">
                                    {{ $errors->first('entidad') }}
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12" style="display: none">
                                {!! Form::text('pivote_municipio', $datos_usuario[0]->Municipio, ['class' => 'form-control','id' => 'pivote_municipio']); !!}
                            </div>
                            <div class="form-group col-md-4">
                                <div class="form-ic-cmp">
                                    <i class="fad fa-map-marker-alt"></i>&nbsp;
                                {!! Form::label('municipio', 'Ciudad de residencia') !!}
                                </div>
                                {!! Form::select('municipio', array(), 0, ['class' => 'form-control', 'placeholder' => 'Seleccione un estado primero', 'style' => 'background-color:rgba(230, 238, 250, 0.5);']) !!}
                                <div style="color:#FF0000;">
                                    {{ $errors->first('municipio') }}
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <div class="form-ic-cmp">
                                    <i class="fas fa-map-signs"></i>&nbsp;
                                {!! Form::label('calle', 'Calle') !!}
                                </div>
                                {!! Form::text('calle',  $datos_usuario[0]->Calle, ['class' => 'form-control', 'maxlength'=> '100','style' => 'background-color:rgba(230, 238, 250, 0.5);']) !!}
                                <div style="color:#FF0000;">
                                    {{ $errors->first('calle') }}
                                </div>
                            </div>
                        </div>

                        <div class="form-row col-lg-12">
                            <div class="form-group col-md-4">
                                <div class="form-ic-cmp">
                                    <i class="fal fa-hashtag"></i>&nbsp;
                                {!! Form::label('numext', 'Número Exterior') !!}
                                </div>
                                {!! Form::text('numext',  $datos_usuario[0]->NumExt, ['class' => 'form-control', 'maxlength'=> '6','style' => 'background-color:rgba(230, 238, 250, 0.5);']) !!}
                                <div style="color:#FF0000;">
                                    {{ $errors->first('numext') }}
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <div class="form-ic-cmp">
                                    <i class="fal fa-hashtag"></i>&nbsp;
                                {!! Form::label('numint', 'Número Interior') !!}
                                </div>
                                {!! Form::text('numint',  $datos_usuario[0]->NumInt, ['class' => 'form-control', 'maxlength'=> '6','style' => 'background-color:rgba(230, 238, 250, 0.5);']) !!}
                                <div style="color:#FF0000;">
                                    {{ $errors->first('numint') }}
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <div class="form-ic-cmp">
                                    <i class="fal fa-envelope"></i>&nbsp;
                                {!! Form::label('CP', 'Código Postal') !!}
                                </div>
                                {!! Form::text('CP',  $datos_usuario[0]->CodigoPostal, ['class' => 'form-control', 'maxlength'=> '5','onkeypress'=>'return justNumbers(event);','style' => 'background-color:rgba(230, 238, 250, 0.5);']) !!}
                                <div style="color:#FF0000;">
                                    {{ $errors->first('CP') }}
                                </div>
                            </div>
                        </div>
                        </div>


                        <div class="f1-buttons">
                            <button type="button" class="btn btn-next">Siguiente</button>
                        </div>

                    </fieldset>

                    <fieldset>

                        <h1>Datos generales de la Predenuncia:</h1>

                        <!-- campos del lugar de los hechos -->
                        <div class="form-row col-lg-12">
                            <div class="form-group col-md-4">
                                <div class="form-ic-cmp">
                                    <i class="fal fa-list"></i>&nbsp;
                                {!! Form::label('tipo_denuncia', 'Tipo de Pre-denuncia') !!}
                                </div>
                                {!! Form::select('tipo_denuncia',$tipo_denuncia,0, ['class' => 'form-control','placeholder' => 'Seleccione una opción', 'style' => 'background-color:rgba(230, 238, 250, 0.5);']) !!}
                                <div style="color:#FF0000;">
                                    {{ $errors->first('tipo_denuncia') }}
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <div class="form-ic-cmp">
                                    <i class="fal fa-list"></i>&nbsp;
                                {!! Form::label('delito', 'Delito') !!}
                                </div>
                                {!! Form::select('delito', $delitos, 0, ['class' => 'form-control', 'placeholder' => 'Seleccione un delito', 'style' => 'background-color:rgba(230, 238, 250, 0.5);']) !!}
                                <div style="color:#FF0000;">
                                    {{ $errors->first('delito') }}
                                </div>
                            </div>

                            <div class="form-group col-md-4">
                                <div class="form-ic-cmp">
                                    <i class="fal fa-calendar"></i>&nbsp;
                                {!! Form::label('fecha_hechos', 'Fecha') !!}
                                </div>
                                {!! Form::select('fecha_hechos', ['1' => 'Fecha Exacta', '2' => 'Entre Fechas'], 0, ['class' => 'form-control', 'placeholder' => 'Seleccione un tipo', 'style' => 'background-color:rgba(230, 238, 250, 0.5);']) !!}
                                <div style="color:#FF0000;">
                                    {{ $errors->first('fecha_hechos') }}
                                </div>
                            </div>

                        </div>


                        <div class="form-row col-lg-12" id = "entre_fechas">
                            <div class="form-group col-md-3">
                                <div class="form-ic-cmp">
                                    <i class="fal fa-calendar"></i>&nbsp;
                                {!! Form::label('fecha_inicio', 'Fecha Inicio') !!}
                                </div>
                                {!! Form::date('fecha_inicio','', ['class' => 'form-control', 'style' => 'background-color:rgba(230, 238, 250, 0.5);']) !!}
                                <div style="color:#FF0000;">
                                    {{ $errors->first('fecha_inicio') }}
                                </div>
                            </div>

                            <div class="form-group col-md-3">
                                <div class="form-ic-cmp">
                                    <i class="fal fa-clock"></i>&nbsp;
                                {!! Form::label('hora_inicio', 'Hora Inicio') !!}
                                </div>
                                {!! Form::time('hora_inicio', '', ['class' => 'form-control', 'style' => 'background-color:rgba(230, 238, 250, 0.5);']) !!}
                                <div style="color:#FF0000;">
                                    {{ $errors->first('hora_inicio') }}
                                </div>
                            </div>

                            <div class="form-group col-md-3">
                                <div class="form-ic-cmp">
                                    <i class="fal fa-calendar"></i>&nbsp;
                                {!! Form::label('fecha_fin', 'Fecha Fin') !!}
                                </div>
                                {!! Form::date('fecha_fin',  '', ['class' => 'form-control', 'style' => 'background-color:rgba(230, 238, 250, 0.5);']) !!}
                                <div style="color:#FF0000;">
                                    {{ $errors->first('fecha_fin') }}
                                </div>
                            </div>

                            <div class="form-group col-md-3">
                                <div class="form-ic-cmp">
                                    <i class="fal fa-clock"></i>&nbsp;
                                {!! Form::label('hora_fin', 'Hora Fin') !!}
                                </div>
                                {!! Form::time('hora_fin', '', ['class' => 'form-control', 'style' => 'background-color:rgba(230, 238, 250, 0.5);']) !!}
                                <div style="color:#FF0000;">
                                    {{ $errors->first('hora_fin') }}
                                </div>
                            </div>
                        </div>
                        <div class="form-row col-lg-12" id = "fecha_exacta_div">
                            <div class="form-group col-md-3">
                                <div class="form-ic-cmp">
                                    <i class="fal fa-calendar"></i>&nbsp;
                                {!! Form::label('fecha_exacta', 'Fecha') !!}
                                </div>
                                {!! Form::date('fecha_exacta','', ['class' => 'form-control', 'style' => 'background-color:rgba(230, 238, 250, 0.5);']) !!}
                                <div style="color:#FF0000;">
                                    {{ $errors->first('fecha_exacta') }}
                                </div>
                            </div>

                            <div class="form-group col-md-3">
                                <div class="form-ic-cmp">
                                    <i class="fal fa-clock"></i>&nbsp;
                                {!! Form::label('hora_exacta', 'Hora') !!}
                                </div>
                                {!! Form::time('hora_exacta', '', ['class' => 'form-control', 'style' => 'background-color:rgba(230, 238, 250, 0.5);']) !!}
                                <div style="color:#FF0000;">
                                    {{ $errors->first('hora_exacta') }}
                                </div>
                            </div>
                        </div>

                        <div class="form-group col-lg-12">
                            <div class="form-ic-cmp">
                                <i class="fal fa-file-alt"></i>&nbsp;
                            {!! Form::label('narrativa', 'Narrativa de hechos') !!}
                            </div>
                            {!! Form::textarea('narrativa', null, ['class' => 'form-control', 'maxlength'=> '4000','placeholder' => 'Recuerda que en la narrativa debes dar una descripción de los  hechos ocurridos.', 'rows' => '7', 'style' => 'background-color:rgba(230, 238, 250, 0.5);'])  !!}
                            <div style="color:#FF0000;">
                                {{ $errors->first('narrativa') }}
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12" style="display: none">
                            {!! Form::text('coordenadas', null, ['class' => 'form-control']); !!}
                        </div>

                        <h1>Lugar de los Hechos:</h1>
                        <div class="form-group col-lg-12">
                        <div class="row" id = "mapa">
                            <div class="col-lg-12 col-md-4 col-sm-4 col-xs-12">
                                {!! $map['js'] !!}
                            </div>
                            <div class="col-12" >
                                {!! $map['html'] !!}
                            </div>
                        </div>
                        </div>
                        <br>
                        <div class="form-row col-lg-12">
                            <div class="form-group col-md-4">
                                <div class="form-ic-cmp">
                                    <i class="fal fa-map"></i>&nbsp;
                                {!! Form::label('entidad_hechos', 'Estado') !!}
                                </div>
                                {!! Form::select('entidad_hechos',$michoacan,16, ['class' => 'form-control','placeholder' => 'Seleccione una opcion', 'style' => 'background-color:rgba(230, 238, 250, 0.5);']) !!}
                                <div style="color:#FF0000;">
                                    {{ $errors->first('entidad_hechos') }}
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <div class="form-ic-cmp">
                                    <i class="fad fa-map-marker-alt"></i>&nbsp;
                                {!! Form::label('municipio_hechos', 'Ciudad de residencia') !!}
                                </div>
                                {!! Form::select('municipio_hechos', array(), 0, ['class' => 'form-control', 'placeholder' => 'Seleccione un estado primero', 'style' => 'background-color:rgba(230, 238, 250, 0.5);']) !!}
                                <div style="color:#FF0000;">
                                    {{ $errors->first('municipio_hechos') }}
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <div class="form-ic-cmp">
                                    <i class="fas fa-map-signs"></i>&nbsp;
                                {!! Form::label('calle_hechos', 'Calle') !!}
                                </div>
                                {!! Form::text('calle_hechos', null, ['class' => 'form-control', 'maxlength'=> '100','style' => 'background-color:rgba(230, 238, 250, 0.5);','id' => 'calle_hechos']) !!}
                                <div style="color:#FF0000;">
                                    {{ $errors->first('calle_hechos') }}
                                </div>
                            </div>
                        </div>

                        <div class="form-row col-lg-12">
                            <div class="form-group col-md-6 col-sm-12">
                                <div class="form-ic-cmp">
                                    <i class="fal fa-map-pin"></i>&nbsp;
                                {!! Form::label('colonia_hechos', 'Colonia') !!}
                                </div>
                                {!! Form::text('colonia_hechos', null, ['class' => 'form-control', 'maxlength'=> '100','style' => 'background-color:rgba(230, 238, 250, 0.5);']) !!}
                                <div style="color:#FF0000;">
                                    {{ $errors->first('colonia_hechos') }}
                                </div>
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <div class="form-ic-cmp">
                                    <i class="fal fa-hashtag"></i>&nbsp;
                                {!! Form::label('numext_hechos', 'Número Exterior') !!}
                                </div>
                                {!! Form::text('numext_hechos', null, ['class' => 'form-control', 'maxlength'=> '6','style' => 'background-color:rgba(230, 238, 250, 0.5);']) !!}
                                <div style="color:#FF0000;">
                                    {{ $errors->first('numext_hechos') }}
                                </div>
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <div class="form-ic-cmp">
                                    <i class="fal fa-hashtag"></i>&nbsp;
                                {!! Form::label('numint_hechos', 'Número Interior') !!}
                                </div>
                                {!! Form::text('numint_hechos', null, ['class' => 'form-control', 'maxlength'=> '6','style' => 'background-color:rgba(230, 238, 250, 0.5);']) !!}
                                <div style="color:#FF0000;">
                                    {{ $errors->first('numint_hechos') }}
                                </div>
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <div class="form-ic-cmp">
                                    <i class="fal fa-envelope"></i>&nbsp;
                                {!! Form::label('CP_hechos', 'Código Postal') !!}
                                </div>
                                {!! Form::text('CP_hechos', null, ['class' => 'form-control', 'maxlength'=> '5','onkeypress'=>'return justNumbers(event);','style' => 'background-color:rgba(230, 238, 250, 0.5);']) !!}
                                <div style="color:#FF0000;">
                                    {{ $errors->first('CP_hechos') }}
                                </div>
                            </div>
                        </div>

                        <div class="f1-buttons">
                            <button type="button" class="btn btn-previous">Atras</button>
                            <button type="button" class="btn btn-next">Siguiente</button>
                        </div>
                    </fieldset>

                    <fieldset>
                        <div class="form-row col-lg-12">
                        <div class="form-group col-md-4">
                            <div class="form-ic-cmp">
                                <i class="fal fa-camera"></i>&nbsp;
                            {!! Form::label('image', 'Evidencia en imagen') !!}
                            </div>
                            {!! Form::file('image',['class' =>'file_multi_image' ,'id' => 'file','accept'=>'image/*']); !!}

                        </div>

                        <div class="form-group col-md-4">
                            <div class="form-ic-cmp">
                                <i class="fal fa-video"></i>&nbsp;
                                {!! Form::label('video', 'Evidencia en video') !!}
                            </div>
                              {!! Form::file('video',['id' => 'video','accept'=>'video/*']); !!}

                        </div>

                        <div class="form-group col-md-4">
                            <div class="form-ic-cmp">
                                <i class="fal fa-volume-up"></i>&nbsp;
                            {!! Form::label('audio', 'Evidencia en audio') !!}
                            </div>
                            {!! Form::file('audio',['id' => 'audio','accept'=>'audio/*']); !!}
                        </div>

                        </div>

                        <div class="form-row col-lg-12">
                            <div class="form-group col-md-4">
                            <div id="preview_imagen"></div>
                            </div>

                            <div class="form-group col-md-4" id="preview_video" style="display: none">
                                <img src="img/video_adjunto.png" />
                            </div>

                            <div class="form-group col-md-4" id="preview_audio" style="display: none">
                                    <img src="img/audio_adjunto.png" />
                            </div>

                        </div>

                        <div class="f1-buttons">
                            <button type="button" class="btn btn-previous">Atras</button>
                            {!! Form::submit('Registrar', ['class' => 'btn_wizard btn-submit']) !!}
                        </div>
                    </fieldset>
                {!! Form::close()!!}
                <!-- </form> -->
            </div>
        </div>

    </div>
</div>



@endsection

@section('js')
    <script src= "assetsWizard/js/scripts.js"></script>

    <script>


        // Funcion para pintar el mapa
        var centreGot = false;


        // funcion para los municipios de michoacan
        $( document ).ready(function() {
            
            municipios_michoacan(16);
            entidad = $('#entidad').val();
            if(entidad != ''){
            municipios_residencia(entidad);
            }
            $("#entre_fechas").css("display","none");
            $("#fecha_exacta_div").css("display","none");
            pais = $('#pais').val();
            if(pais == 165){
                $("#extranjero").css("display","none");
                $("#mexico").css("display","block");
                $("#domicilio_extranjero").val('');
            }else{
                $("#extranjero").css("display","block");
                $("#mexico").css("display","none");
                $("#municipio").val('');
                $("#calle").val('');
                $("#numext").val('');
                $("#numint").val('');
                $("#CP").val('');
            }
        });

        //funcion para el domicilio
        $("#pais").on('change', function(){
        pais = $('#pais').val();
        if(pais == 165){
            $("#extranjero").css("display","none");
            $("#mexico").css("display","block");
            $("#domicilio_extranjero").val('');
        }else{
            $("#extranjero").css("display","block");
            $("#mexico").css("display","none");
            $("#municipio").val('');
            $("#calle").val('');
            $("#numext").val('');
            $("#numint").val('');
            $("#CP").val('');
        }
        });
        //catalogos
        $("#entidad").on('change', function(e){
            entidad = $('#entidad').val();
            municipios(entidad);
        });

        function justNumbers(e)
        {
            var keynum = window.event ? window.event.keyCode : e.which;
            if ((keynum == 8) || (keynum == 46))
                return true;

            return /\d/.test(String.fromCharCode(keynum));
        }


        function municipios(entidad){
            $.get('DenunciaDigital/municipios/'+entidad+"/catalogo", function(respuesta){
                $('#municipio').empty();
                $('#municipio').append('<option value="0">Seleccione una ciudad</option>');
                $.each(respuesta, function(index,dato){
                    $('#municipio').append('<option value="'+dato.ID+'">'+dato.DESCRIPCION+'</option>');
                });
            });
        }
        function municipios_residencia(entidad){
            $.get('DenunciaDigital/municipios/'+entidad+"/catalogo", function(respuesta){
                $('#municipio').empty();
                $.each(respuesta, function(index,dato){
                    $('#municipio').append('<option value="'+dato.ID+'">'+dato.DESCRIPCION+'</option>');
                });
            });
        }
        function municipios_michoacan(entidad){
            $.get('DenunciaDigital/municipios/'+entidad+"/catalogo", function(respuesta){
                $('#municipio_hechos').empty();
                $('#municipio_hechos').append('<option value="0">Seleccione una ciudad</option>');
                $.each(respuesta, function(index,dato){
                    $('#municipio_hechos').append('<option value="'+dato.ID+'">'+dato.DESCRIPCION+'</option>');
                });
                municipio = $('#pivote_municipio').val();

                setTimeout(function() {
                    $('#municipio').val(municipio).attr('selected','selected');},1000);
            });
        }
        // funcionalidad fechas

        $('#fecha_hechos').on('change', function() {
           var fecha_hechos = $('#fecha_hechos').val();

           if(fecha_hechos == '1'){

               $("#entre_fechas").css("display","none");
               $("#fecha_exacta_div").css("display","flex");
               $("#fecha_inicio").val('');
               $("#hora_inicio").val('');
               $("#fecha_fin").val('');
               $("#hora_fin").val('');
           }else{
               $("#entre_fechas").css("display","flex");
               $("#fecha_exacta_div").css("display","none");
               $("#fecha_exacta").val('');
               $("#hora_exacta").val('');
           }
        });

        //funcionalidad mapa

        function municipio_mapa(municipio){
            $.get('DenunciaDigital/municipio/mapa/'+municipio+"/catalogo", function(respuesta1){
                //alert(respuesta1);
                $('select[name=municipio_hechos]').val(respuesta1);
            });

        }

        function geocodificacion_ubicacion_mapa(ubicacion){

            $.get('DenunciaDigital/geocodificacion_ubicacion/'+ubicacion, function(respuesta){
                //alert(respuesta);
                $("input[name='coordenadas']").val(respuesta['lat']+','+respuesta['lng']);
                $("input[name='calle_hechos']").val(respuesta['calle']);
                $("input[name='numext_hechos']").val(respuesta['numero']);
                $("input[name='colonia_hechos']").val(respuesta['colonia']);
                $("input[name='CP_hechos']").val(respuesta['codigo_postal']);

                $.get('DenunciaDigital/estado/mapa/'+respuesta['estado']+"/catalogo", function(respuestax){
                    //alert(respuestax);
                    $('select[name=entidad_hechos]').val(respuestax);
                    //municipios_michoacan(respuestax);
                    municipio_mapa(respuesta['municipio']);
                });
            });

        }

        $("#municipio_hechos").on('change', function(e){
            var municipio = $('#municipio_hechos').val();
            var calle = $('#calle_hechos').val();
            var numero_ext = $('#numext_hechos').val();
            var colonia_evento = $('#colonia_hechos').val();
            var entidad = $('#entidad_hechos option:selected').text();
            var municipio = $('#municipio_hechos option:selected').text();
            var ubicacion = (calle+' '+numero_ext+', '+colonia_evento+', '+municipio+', '+entidad+', Mexico');
            if(calle != '' && numero_ext != '' && colonia_evento != '' && entidad != '' && municipio !=''){
                geocodificacion_ubicacion(ubicacion);
                //alert(ubicacion);
            }
        });

        $('#calle_hechos').on('change', function() {
            var calle = $('#calle_hechos').val();
            var numero_ext = $('#numext_hechos').val();
            var colonia_evento = $('#colonia_hechos').val();
            var entidad = $('#entidad_hechos option:selected').text();
            var municipio = $('#municipio_hechos option:selected').text();
            var ubicacion = (calle+' '+numero_ext+', '+colonia_evento+', '+municipio+', '+entidad+', Mexico');
            if(calle != '' && numero_ext != '' && colonia_evento != '' && entidad != '' && municipio !=''){
                geocodificacion_ubicacion(ubicacion);
               //alert(ubicacion);
            }
        });

        $('#numext_hechos').on('change', function() {
            var calle = $('#calle_hechos').val();
            var numero_ext = $('#numext_hechos').val();
            var colonia_evento = $('#colonia_hechos').val();
            var entidad = $('#entidad_hechos option:selected').text();
            var municipio = $('#municipio_hechos option:selected').text();
            var ubicacion = (calle+' '+numero_ext+', '+colonia_evento+', '+municipio+', '+entidad+', Mexico');
            if(calle != '' && numero_ext != '' && colonia_evento != '' && entidad != '' && municipio !=''){
                geocodificacion_ubicacion(ubicacion);
                //alert(ubicacion);
            }
        });

        $('#colonia_hechos').on('change', function() {
            //alert('colonia');
            var calle = $('#calle_hechos').val();
            var numero_ext = $('#numext_hechos').val();
            var colonia_evento = $('#colonia_hechos').val();
            var entidad = $('#entidad_hechos option:selected').text();
            var municipio = $('#municipio_hechos option:selected').text();
            var ubicacion = (calle+' '+numero_ext+', '+colonia_evento+', '+municipio+', '+entidad+', Mexico');
            if(calle != '' && numero_ext != '' && colonia_evento != '' && entidad != '' && municipio !=''){
                geocodificacion_ubicacion(ubicacion);
               //alert(ubicacion);
            }
        });

        function geocodificacion_ubicacion(ubicacion){
            //alert('geocodificacion_ubicacion');
            $.get('DenunciaDigital/geocodificacion_ubicacion/'+ubicacion, function(respuesta){

                $("input[name='coordenadas']").val(respuesta['lat']+','+' '+respuesta['lng']);

                if(respuesta['calle']){
                    $("input[name='calle_hechos']").val(respuesta['calle']);
                }
                if(respuesta['numero']){
                    $("input[name='numext_hechos']").val(respuesta['numero']);
                }
                if(respuesta['colonia']){
                    $("input[name='colonia_hechos']").val(respuesta['colonia']);
                }
                if(respuesta['codigo_postal']){
                    $("input[name='CP_hechos']").val(respuesta['codigo_postal']);}
            });

        }

        document.getElementById("file").onchange = function(e) {
            // Creamos el objeto de la clase FileReader
            let reader = new FileReader();

            // Leemos el archivo subido y se lo pasamos a nuestro fileReader
            reader.readAsDataURL(e.target.files[0]);

            // Le decimos que cuando este listo ejecute el código interno
            reader.onload = function(){
                let preview = document.getElementById('preview_imagen'),
                    image = document.createElement('img');

                image.src = reader.result;

                preview.innerHTML = '';
                preview.append(image);
            };
        }

        document.getElementById("audio").onchange = function(e) {

            if($("#audio").val() == ''){
                $("#preview_audio").css("display","none");
            }else{
                $("#preview_audio").css("display","flex");
            }


        }

        document.getElementById("video").onchange = function(e) {

            if($("#video").val() == ''){
                $("#preview_video").css("display","none");
            }else{
                $("#preview_video").css("display","flex");
            }

        }
    </script>
@endsection

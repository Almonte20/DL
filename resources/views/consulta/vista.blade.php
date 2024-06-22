<style media="screen">
.table-fge,
.table-fge > th,
.table-fge > td {
  background-color: #152f4a;
  color: white;
}

</style>
@extends('layouts.version2.modulos')

@section('titulo','Consulta De Denuncia')

@section('css')
  <link rel="stylesheet" href="{{ URL::asset('plugins/sweetalert2/sweetalert2.min.css') }}">
@endsection

@section('contenido')

<link rel="stylesheet" href= "assetsWizard/fontawesome-pro-5.10.2-web/css/all.css">

<div class="container">
  <br>
  <span style="font-size: 25px">Información de la denuncia</span>
  <h5>Formulario de Consulta</h5>
  <hr>
  <blockquote>
    <p class="text-justify font-weight-light">Módulo de consulta de denuncia.</p>
  </blockquote>
  <!-- tabs -->
  @if(session()->has('fail'))
     <div class="alert alert-danger alert-dismissible fade show" role="alert">
         <strong>¡Error!</strong> {{ session()->get('fail') }}
         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
             <span aria-hidden="true">&times;</span>
         </button>
     </div>
  @endif
  {{-- <div class="form-row col-lg-12" >

    <div class="form-group col-md-4">
        <div class="form-ic-cmp">
            <i class="fal fa-hashtag"></i>&nbsp;
        {!! Form::label('folio1', 'Folio') !!}
        </div>
        {!! Form::text('folio', '', ['id' => 'folio', 'class' => 'form-control','maxlength'=> '50', 'style' => 'background-color:rgba(230, 238, 250, 0.5);']) !!}
        <div style="color:#FF0000;">
            {{ $errors->first('folio') }}
        </div>
    </div>
    <div class="form-group col-md-4">
        <div class="form-ic-cmp">
            <i class="fal fa-fingerprint"></i>&nbsp;
        {!! Form::label('token1', 'Clave De Seguimiento') !!}
        </div>
      {!! Form::text('token', '', ['id' => 'token', 'class' => 'form-control','maxlength'=> '50', 'style' => 'background-color:rgba(230, 238, 250, 0.5);']) !!}

    </div>
    <div class="form-group col-md-4">
        {!! Form::submit('Buscar', [  'class' => 'btn_wizard btn-submit', 'style'=> 'margin-top: 30px', 'onclick' => 'buscar_denuncia()']) !!}
    </div>
  </div> --}}

  <form action="{{ route('denuncia.consultaDenuncia') }}" method="POST">
    @csrf <!-- Agrega el token CSRF de Laravel -->

    <div class="form-row col-lg-12">
        <div class="form-group col-md-4">
            <div class="form-ic-cmp">
                <i class="fal fa-hashtag"></i>&nbsp;
                <label for="folio">Folio</label>
            </div>
            <input type="text" id="folio" name="folio" class="form-control" maxlength="15" minlength="5" required style="background-color:rgba(230, 238, 250, 0.5);">
            <div style="color:#FF0000;">
                <span id="folio-error"></span>
            </div>
        </div>
        <div class="form-group col-md-4">
            <div class="form-ic-cmp">
                <i class="fal fa-fingerprint"></i>&nbsp;
                <label for="token">Clave De Seguimiento</label>
            </div>
            <input type="text" id="token" name="token" class="form-control" maxlength="20" minlength="20" required style="background-color:rgba(230, 238, 250, 0.5);">
        </div>
        <div class="form-group col-md-4">
            <button type="submit" class="btn_wizard btn-submit" style="margin-top: 30px;">Buscar</button>
        </div>
    </div>
</form>

  


	<div class="line"></div>
  <!-- fin tabs -->
  </div>
</div>

@endsection

@section('js')
  <script src="{{  URL::asset('plugins/sweetalert2/sweetalert2.all.min.js') }}"></script>

  <script>
    function buscar_denuncia()
    {
      var folio = $( "#folio" ).val();
      var token = $( "#token" ).val();
      if(folio == '' || token == ''){
           //validacion de campos
           Swal.fire(
            'Verifique la Informción',
            'Los campos no pueden estar vacios',
            'warning'
            )
       }else{
        window.location.href = "/consulta/"+btoa(folio)+"/"+token;
       }
    }
    </script>
@endsection
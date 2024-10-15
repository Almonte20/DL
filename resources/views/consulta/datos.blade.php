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

@section('contenido')

<link rel="stylesheet" href= "assetsWizard/fontawesome-pro-5.10.2-web/css/all.css">

<div class="container">
  <br>
  <span style="font-size: 25px">Información de la denuncia</span>
  <h5>Formulario de Consulta</h5>
  <hr>
  <blockquote>
    <p class="text-justify font-weight-light">Módulo que contiene la información correspondiente a la denuncia.</p>
  </blockquote>
  <!-- tabs -->
	<div class="tabs clearfix" id="tab-3">

		<ul class="tab-nav tab-nav2 clearfix">
      <li><a href="#tabs-1">Formalización</a></li>
			<li><a href="#tabs-2">Denunciante</a></li>
      @if($victimaDenunciante == 0)
			<li><a href="#tabs-3">Víctima</a></li>
      @endif
      <li><a href="#tabs-4">Hechos</a></li>
      <li><a href="#tabs-5">Evidencias</a></li>
      <li><a href="#tabs-6">Testigo(s)</a></li>
      <li><a href="#tabs-7">Conclusión</a></li>
		</ul>

		<div class="tab-container">

			<div class="tab-content clearfix" id="tabs-1">
        @include('consulta.tabla_formalizacion')
			</div>
      <div class="tab-content clearfix" id="tabs-2">
        @include('consulta.tabla_generales')
      </div> 
      @if($victimaDenunciante == 0)
      <div class="tab-content clearfix" id="tabs-3">
        @include('consulta.tabla_victima')
      </div>
      @endif
       <div class="tab-content clearfix" id="tabs-4">
        @include('consulta.tabla_hechos')
      </div>
      <div class="tab-content clearfix" id="tabs-5">
        @include('consulta.tabla_evidencias')
      </div>
      <div class="tab-content clearfix" id="tabs-6">
        @include('consulta.tabla_testigos')
			</div>
      <div class="tab-content clearfix" id="tabs-7">
        @include('consulta.tabla_conclusion')
			</div>
		</div>

	</div>
  <br>
  <hr>
  <div class="row justify-content-end">
      <div class="col-md-2 py-3 px-md-.25">
          <a href="https://fiscaliamichoacan.gob.mx/" class="btn btn-danger btn-block" >Salir</a>
      </div>
  </div>
	<div class="line"></div>
  <!-- fin tabs -->
  </div>
</div>
@endsection

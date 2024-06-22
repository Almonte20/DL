
<div class="table-responsive">
	<table class="table table-bordered ">
		<thead>
		  <tr>
			<th colspan="6" class="table-fge"><center>Datos Generales<center></th>
		  </tr>
		</thead>
		<tbody>

		@php
		use Carbon\Carbon;
		$Colonia = $denunciante->address()->first()->colony()->first()->nombre_asentamiento;
		$Calle = $denunciante->address()->first()->calle;
		$NumExt = $denunciante->address()->first()->numero_exterior;
		$NumInt = $denunciante->address()->first()->numero_interior;
		$CodigoPostal = $denunciante->address()->first()->codigo_postal;
		$Entidad = $denunciante->address()->first()->colony()->first()->municipio()->first()->estado()->first()->nombre_estado;
		$Municipio =$denunciante->address()->first()->colony()->first()->municipio()->first()->nombre_municipio;
		$DomicilioExtranjero = $denunciante->address()->first()->otro_domicilio;
		$Nacionalidad = null;
		if(!empty($denunciante->id_nacionalidad))
			$Nacionalidad = $denunciante->first()->country()->first()->nacionalidad;
		
		

		
		@endphp
		
	  @if($denunciante)
		  <tr>
  			<td class="table-secondary"><b>Nombre:</b></td>
  			<td>{{$denunciante->nombre.' '.$denunciante->primer_apellido.' '.$denunciante->segundo_apellido}}</td>
			  <td class="table-secondary"><b>Fecha nacimiento:</b></td>
			  <td>{{Carbon::parse($denunciante->fecha_nacimiento)->format('d/m/Y');}}</td>

			  <td class="table-secondary"><b>CURP:</b></td>
			  <td>{{$denunciante->curp}}</td>
  			
			</tr>

  			<tr>
				<td class="table-secondary"><b>Nacionalidad:</b></td>
				<td>{{ !empty($Nacionalidad ) ? $Nacionalidad : 'N/P'}}</td>
				<td class="table-secondary"><b>Correo:</b></td>
				<td>{{ !empty($denunciante->email ) ? $denunciante->email : 'N/P'}}</td>
				<td class="table-secondary"><b>Télefono:</b></td>
				<td>{{ !empty($denunciante->telefono ) ? $denunciante->telefono : 'N/P'}}</td>
			</tr>



      <tr>
        <td colspan="6" class="table-fge"><center><b>Datos del Domicilio</b></center></td>
      </tr>
      <tr>
  			<td class="table-secondary"><b>País:</b></td>
  			<td>{{$denunciante->address()->first()->country()->first()->pais}}</td>
			  @if($denunciante->address()->first()->country()->first()->id==118)
  			<td class="table-secondary"><b>Estado:</b></td>
			  {{-- @dd($denunciante->address()->first()->colony()->first()->municipio()->first()->estado()->first()->nombre_estado) --}}
  			<td>{{ $Entidad}}</td>
  			<td class="table-secondary"><b>Ciudad:</b></td>
  			<td>{{ $Municipio}}</td>
      </tr>
	
      <tr>
        <td class="table-secondary"><b>Colonia:</b></td>
  			<td>{{ !empty($Colonia) ? $Colonia : 'N/P' }}</td>
  			<td class="table-secondary"><b>Calle:</b></td>
  			<td>{{ !empty($Calle) ? $Calle : 'N/P'}}</td>
  			<td class="table-secondary"><b>Número exterior:</b></td>
  			<td>{{ !empty($NumExt) ? $NumExt : 'N/P'}}</td>
      </tr>
      <tr>
        <td class="table-secondary"><b>Número interior:</b></td>
  			<td>{{ !empty($NumInt) ? $NumInt : 'N/P' }}</td>
  			<td class="table-secondary"><b>Código postal:</b></td>
  			<td>{{ !empty($CodigoPostal) ? $CodigoPostal : 'N/P'}}</td>
      </tr>
        @else
        <td class="table-secondary"><b>Domicilio extranjero:</b></td>
  			<td colspan="3">{{ $DomicilioExtranjero}}</td>
        @endif
			</tr>
			@else
			<tr>
				<td colspan="6"><center><b>No existen registros.</b></center></td>
			</tr>
      @endif
		</tbody>
	</table>
</div>

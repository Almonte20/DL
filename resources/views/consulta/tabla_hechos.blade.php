<div class="table-responsive">
	<table class="table table-bordered ">
		<thead>
			<tr>
				<th colspan="6" class="table-fge">
					<center>Datos de los Hechos<center>
				</th>
			</tr>
		</thead>
		<tbody>

			@php
			if(!empty($delito)){
				
				$Delito = $delito->first()->delito;
			}else{
				$Delito = null;
			}
			
				$Narrativa = $hechos->narrativa;
				if($hechos->es_tramo_carretero==0){
					$Colonia = $hechos->colony()->first()->nombre_asentamiento;
					$CodigoPostal = $hechos->codigo_postal;
					$Calle = $hechos->calle;
					$NumExt = $hechos->numero_exterior;
					$Municipio =$hechos->colony()->first()->municipio()->first()->nombre_municipio;
					$Entidad = $hechos->colony()->first()->municipio()->first()->estado()->first()->nombre_estado;
					
				}else{
					$DescripcionHecho = $hechos->descripcion_lugar;
					$KM = $hechos->km_carretero;
				}
			@endphp

			<tr>
				{{-- @if(!empty($delito_aux))
					<td class="table-secondary"><b>Delito:</b></td>
					<td>{{ !empty($delito_aux[0]->Delito) ? $delito_aux[0]->Delito : 'N/P' }}</td>
					<td class="table-secondary"><b>Tipo:</b></td>
					<td>{{ !empty($delito_aux[0]->TipoRobo) ? $delito_aux[0]->TipoRobo : 'N/P'}}</td>
					<td class="table-secondary"><b>Fecha y hora:</b></td>
					@if(!empty($hechos[0]->FechaExacta))
					<td>{{ Carbon\Carbon::parse($hechos[0]->FechaExacta.' '.$hechos[0]->HoraExacta)->format('d/m/Y h:i a')}}
					</td>
					@else
					<td>N/P</td>
				@endif --}}
				
			<tr>
				<td class="table-secondary"><b>Delito:</b></td>
				<td colspan="5">{{!empty($Delito) ? $Delito : 'N/P' }}</td>
				{{-- <td class="table-secondary"><b>Tipo:</b></td>
				<td>{{!empty($delito[0]->TipoRobo) ? $delito[0]->TipoRobo : 'N/P' }}</td> --}}
			</tr>
			{{-- <tr>
				<td class="table-secondary"><b>¿Fue con violencia?:</b></td>
				@php
				$modalidad='N/P';
				@endphp
				@if(!empty($delito[0]->IdModalidad))
				@if($delito[0]->IdModalidad==1)
				@php
				$modalidad='Sí';
				@endphp
				@else
				@php
				$modalidad='No';
				@endphp
				@endif
				@endif
				<td>{{ $modalidad }}</td>
				<td class="table-secondary"><b>Folio 911:</b></td>
				<td>{{!empty($delito[0]->Folio911) ? $delito[0]->Folio911 : 'N/P' }}</td>
			</tr> --}}
			
			</tr>
			@if(!empty($hechos))
			<tr>
				<td colspan="6" class="table-secondary">
					<center><b>Narrativa:</b></center>
				</td>
			</tr>
			<tr>
				<td colspan="6" style="text-align: justify; text-justify: inter-word;">{{$Narrativa}}</td>
			</tr>
			<tr>
				<td colspan="6" class="table-fge">
					<center><b>¿Dónde Ocurrió?</b></center>
				</td>
			</tr>
			@if($hechos->es_tramo_carretero==0)
			<tr>
				<td class="table-secondary"><b>Estado:</b></td>
				<td>{{ $Entidad}}</td>
				<td class="table-secondary"><b>Ciudad:</b></td>
				<td>{{ $Municipio}}</td>
				<td class="table-secondary"><b>Colonia:</b></td>
				<td>{{ !empty($Colonia) ? $Colonia : 'N/P' }}</td>
			</tr>
			<tr>
				<td class="table-secondary"><b>Calle:</b></td>
				<td>{{ !empty($Calle) ? $Calle : 'N/P'}}</td>
				<td class="table-secondary"><b>Número exterior:</b></td>
				<td>{{ !empty($NumExt) ? $NumExt : 'N/P'}}</td>

				<td class="table-secondary"><b>Código postal:</b></td>
				<td>{{ !empty($CodigoPostal) ? $CodigoPostal : 'N/P'}}</td>
				{{-- <td class="table-secondary"><b>Número interior:</b></td>
				<td>{{ !empty($hechos[0]->NumeroInt) ? $hechos[0]->NumeroInt : 'N/P' }}</td> --}}
			</tr>
		
			@else
			<tr>
				<td class="table-secondary"><b>Kilometro:</b></td>
				<td>{{ !empty($KM) ? $KM : 'N/E'}}</td>
				<td class="table-secondary"><b>Descripción Del Lugar:</b></td>
				<td>{{ $DescripcionHecho}}</td>
			</tr>
			@endif
			@endif
		</tbody>
	</table>
</div>
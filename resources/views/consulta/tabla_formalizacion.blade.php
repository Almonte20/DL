

<div class="table-responsive">
	<table class="table table-bordered ">
		<thead>
		  <tr>
			<th colspan="6" class="table-fge"><center>Datos de Formalización<center></th>
		  </tr>
		</thead>
		<tbody>
		  <tr>
  			<td class="table-secondary" colspan="2"><b>Número Único de Caso:</b></td>
  			<td colspan="4">{{ !empty($NumeroCaso) ? $NumeroCaso : 'En proceso...'}}</td>
			</tr>
			<tr>
				<td class="table-fge" colspan="6"><b><center>Notificaciones</center></b></td>
			</tr>
			@if(!empty($notificaciones[0]->created_at))
			@php
			$tipo='';
			$descripcion='';
			$asunto='';
			@endphp
			@foreach($notificaciones as $notificacion)
				<tr>
	  			<td colspan="6"><center>{{ Carbon\Carbon::parse($notificacion->created_at)->format('d/m/Y h:i a')}}</center></td>
				</tr>
				<tr>
					@php
					$descripcion=$notificacion->Descripcion;
					$asunto=$notificacion->Asunto;
					@endphp
					@switch($notificacion->TipoNotificacion)
					    @case(1)
					        @php
									$tipo='Llamada';
									@endphp
					    @break
					    @case(2)
									@php
									$tipo='Cita';
									@endphp
					    @break
							@case(3)
									@php
									$tipo='E-mail';
									@endphp
					    @break
							@case(4)
									@php
									$tipo='Comunicarse a oficina';
									$descripcion='Teléfono de atención: 4433223600';
									@endphp
							@break
							@case(5)
									@php
									$tipo='Devolución';
									@endphp
					@endswitch
	  			<td class="table-secondary"><b>Tipo de notificación:</b></td>
	  			<td >{{$tipo}}</td>
	  			<td class="table-secondary"><b>Asunto:</b></td>
	  			<td >{{$asunto}}</td>
					<td class="table-secondary"><b>Descripción:</b></td>
	  			<td >{{$descripcion}}</td>
				</tr>
			@endforeach
			@else
			<tr>
				<td colspan="6"><b><center>No existen registros.</center></b></td>
			</tr>
			@endif
		</tbody>
	</table>
</div>

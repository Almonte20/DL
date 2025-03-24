<div class="table-responsive">
	<table class="table table-bordered  mb-0">
		<thead>
			<tr>
				<th colspan="6" class="table-fge">
					<center>Datos de Formalización<center>
				</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td class="table-secondary" style="width: 27%;"><b>Carpeta de investigación:</b></td>
				<td>{{ !empty($NumeroCaso) ? $NumeroCaso : 'En proceso...'}}</td>
			</tr>
			{{-- <tr>
				<td class="table-fge" colspan="6"><b>
						<center>Notificaciones</center>
					</b></td>
			</tr> --}}

			<div class="table-responsive d-none">
				<table class="table table-bordered d-none">
					<thead class="table-secondary text-center">
						<th style="width: 7%">#</th>
						<th style="width: 20%">Fecha de notificación</th>
						<th>Descripción</th>
					</thead>

					<tbody>
						@if($notificaciones->isNotEmpty())
						@php
							$count = 0;
						@endphp
						@foreach($notificaciones as $notificacion)

						<tr>
							<td class="text-center font-weight-bold">{{++$count}}</td>
							<td class="text-center font-weight-bold">
								{{ Carbon\Carbon::parse($notificacion->created_at)->format('d/m/Y h:i a')}}
								
							</td>
							<td>{{$notificacion->mensaje}}</td>
						</tr>
						@endforeach
						@else
						<tr>
							<td colspan="3"><b>
									<center>No existen registros de notificaciones</center>
								</b></td>
						</tr>
						@endif
					</tbody>
				</table>
					</div>
					
		</tbody>
	</table>
</div>
<div class="table-responsive">
	<table class="table table-bordered ">
		<thead>
			<tr>
				<th colspan="6" class="table-fge">
					<center>Datos de las Evidencias<center>
				</th>
			</tr>
		</thead>
		<tbody>
			@if(count($evidencias) > 0)
			@php
			$num=1;
			$aux='';
			@endphp
			@foreach($evidencias as $evidencia)
			{{-- @dd($evidencia->type()->first()->tipo) --}}
			<tr>
				<td colspan="2" class="table-secondary"><b>Evidencia {{$num}}</b> </td>
				@php
				$aux=substr($evidencia->ruta, -5);
				$aux=explode('.',$aux);
				@endphp
				<td colspan="4">{{".".$aux[1]}}</td>
			<tr>
				@php
				$num++;
				@endphp
				@endforeach
				@else
			<tr>
				<td colspan="6">
					<center><b>No existen registros</b></center>
				</td>
			</tr>
			@endif
		</tbody>
	</table>
</div>
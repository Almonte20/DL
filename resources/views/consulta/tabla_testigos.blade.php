
<div class="table-responsive">
	<table class="table table-bordered ">
		<thead>
		  <tr>
			<th colspan="6" class="table-fge"><center>Datos del (los) Testigo(s)<center></th>
		  </tr>
		</thead>
		<tbody>
		@if(count($testigos) > 0)
		@foreach ($testigos as $testigo)
			
		
		  <tr>
  			<td class="table-secondary" colspan="2"><b>Nombre:</b></td>
  			<td colspan="4"> {{ !empty($testigo->nombre) ? $testigo->nombre." ".$testigo->primer_apellido." ".$testigo->segundo_apellido : 'N/P' }}</td>
			</tr>
      <tr>
        <td colspan="6" class="table-secondary"><center><b>Información adicional:</b></center></td>
      </tr>
      <tr>
        <td colspan="6" style="text-align: justify; text-justify: inter-word;">{{$testigo->descripcion_involucrado}}</td>
      </tr>
	  @endforeach
      @else
      <tr>
        <td colspan="6"><b><center>No existen registros</center></b></td>
      </tr>
      @endif
		</tbody>
	</table>
</div>

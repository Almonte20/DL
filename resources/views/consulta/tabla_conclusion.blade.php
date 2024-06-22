<div class="table-responsive">
	<table class="table table-bordered ">
		<thead>
		  <tr>
			<th colspan="6" class="table-fge"><center>Datos de Conclusión<center></th>
		  </tr>
		</thead>
		<tbody>
	  @if($denunciante)
		  <tr>
  			<td class="table-secondary" ><b>Curp:</b></td>
  			<td colspan="2">{{$denunciante->curp}}</td>
        <td class="table-secondary" ><b>Identificación:</b></td>
  			<td colspan="2">¡Adjuntada correctamente!</td>
			</tr>
      @else
      <tr>
        <td colspan="6"><b><center>No existen registros</center></b></td>
      </tr>
      @endif
		</tbody>
	</table>
</div>

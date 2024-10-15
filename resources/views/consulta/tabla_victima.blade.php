
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
		
		$Nacionalidad = null;
		if(!empty($denunciante->id_nacionalidad))
			$Nacionalidad = $victima->first()->country()->first()->nacionalidad;
		
		

		
		@endphp
		
	  @if($victima)
		  <tr>
  			<td class="table-secondary"><b>Nombre:</b></td>
  			<td>{{$victima->nombre.' '.$victima->primer_apellido.' '.$victima->segundo_apellido}}</td>
			  <td class="table-secondary"><b>Fecha nacimiento:</b></td>
			  <td>{{Carbon::parse($victima->fecha_nacimiento)->format('d/m/Y');}}</td>
              <td class="table-secondary"><b>Nacionalidad:</b></td>
              <td>{{ !empty($Nacionalidad ) ? $Nacionalidad : 'N/P'}}</td>
			</tr>

  			<tr>
                @if ($denunciante->id_nacionalidad == 118)
                    
                <td class="table-secondary"><b>CURP:</b></td>
                <td>{{$denunciante->curp}}</td>
                @endif
				
				<td class="table-secondary"><b>¿Es Mayor de edad?:</b></td>
				<td>{{ !empty($victima->mayor_edad ) ? "Sí" : 'No'}}</td>
				
			</tr>

      @endif
		</tbody>
	</table>
</div>

@php
		use Carbon\Carbon;
		if($denunciante->address()->first()->id_pais == 118){

			$Colonia = $denunciante->address()->first()->colony()->first()->nombre_asentamiento;
			$Calle = $denunciante->address()->first()->calle;
			$NumExt = $denunciante->address()->first()->numero_exterior;
			$NumInt = $denunciante->address()->first()->numero_interior;
			$CodigoPostal = $denunciante->address()->first()->codigo_postal;
			$Entidad = $denunciante->address()->first()->colony()->first()->municipio()->first()->estado()->first()->nombre_estado;
			$Municipio =$denunciante->address()->first()->colony()->first()->municipio()->first()->nombre_municipio;
		}else{

			$DomicilioExtranjero = $denunciante->address()->first()->otro_domicilio;
		}
		$Nacionalidad = null;
		if(!empty($denunciante->id_nacionalidad))
			$Nacionalidad = $denunciante->first()->country()->first()->nacionalidad;
@endphp


<div class="row">
    <div class="col-md text-center">
        <h4 class="h4"> Datos generales</h4>
    </div>

</div>

<div class="row mt-5">
    <div class="col-md-5 text-center">
            <h5 class="h5"><span class="text-muted h6">Nombre:</span> {{$denunciante->nombre.' '.$denunciante->primer_apellido.' '.$denunciante->segundo_apellido}}
            </h5>
    </div>
    <div class="col-md-4 text-center">
        <h6 class="h6 text-muted">Fecha de nacimiento:</h4>
            <h5 class="h5">{{$denunciante->fecha_nacimiento}}</h5>
    </div>
    <div class="col-md-4 text-center">
        <h6 class="h6 text-muted">CURP:</h4>
            <h5 class="h5 text-blue">{{$denunciante->curp}}</h5>
    </div>
</div>
<div class="row mt-2">
    <div class="col-md-4 text-center">
        <h6 class="h6 text-muted">Nacionalidad:</h4>
            <h5 class="h5 text-blue">{{ !empty($Nacionalidad ) ? $Nacionalidad : 'N/P'}}</h5>
    </div>
</div>
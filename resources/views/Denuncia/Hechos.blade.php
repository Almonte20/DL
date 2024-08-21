<div class="row ">
    <div class="col-md-12">
        <h1 class="mb-2">¿Qué ha sucedido?</h1>
        <input class="form-control input-denuncia" placeholder="Descripción breve de qué ha sucedido">
    </div>
</div>


<div class="row mt-3">
    <div class="col-md-12">
        <h1 class="mb-4">¿Quién es la víctima?</h1>
    </div>
</div>

<div class="row mt-3">
    <div class="col-md-10 pl-5">
        <div class="custom-control custom-radio custom-control">
            <input type="radio" id="radiodenunciante" name="victimadenunciante" class="custom-control-input" value="1"
                checked>
            <label class="custom-control-label" for="radiodenunciante">Yo: <span id="nombre" class="text-info">Alejandro
                    almonte</span></label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="radiovictima" name="victimadenunciante" class="custom-control-input" value="0">
            <label class="custom-control-label" for="radiovictima">Otra persona</label>
        </div>
    </div>
</div>

<h3 class="h4"><label>Datos de la víctima:</label></h3>

<div class="form-row col-lg-12 align-items-end justify-content-start">
    <div class="form-group col-md-4">
        <div class="form-ic-cmp">
            <i class="fad fa-id-card"></i>&nbsp;
            <label for="nacionalidad">Nacionalidad</label>
            <label for="nacionalidad" style="font-size: 7px;">Requerido</label>
        </div>
        <select name="nacionalidad" id="nacionalidad" onchange="validarNacionalidad(this)" class=" form-control "
            style="background-color:rgba(230, 238, 250, 0.5);">
            <option value="0">Seleccione la nacionalidad</option>
            @foreach ($countries as $country)

            <option @if ($country->id == 118)
                {{'selected'}}
                @endif value="{{$country->id}}">{{$country->nacionalidad}}</option>
            @endforeach
        </select>
        <div style="color:#FF0000;">
            {{ $errors->first('nacionalidad') }}
        </div>
    </div>

    <div class="form-group col-md-4 " id="divCurp">
        <div class="form-ic-cmp">
            <i class="fad fa-id-card"></i>&nbsp;
            <label for="curp">CURP</label>
            <label for="nombre" style="font-size: 7px;">Requerido</label>
        </div>
        <input type="text" name="curp" id="curp" class=" form-control " value="{{ old('curp') }}AOAA960320HMNLCL04"
            maxlength="18" placeholder="CURP" style="background-color:rgba(230, 238, 250, 0.5);">
        <div style="color:#FF0000;">
            {{ $errors->first('curp') }}
        </div>
    </div>

    <div class="form-group col-md-2">
        <button class="btn btn-sm align-bottom" onclick="consultarCurp(this)" style="background: #002b49;"
            id="btnConsultarCurp"> Buscar</button>
        <img src="{{asset("img/denuncia/loading.gif")}}" class="img-responsive d-none" width="30%" id="imgLoading">
    </div>
</div>




<div class="row mt-3">
    <div class="col-md-12">
        <h1 class="mb-4">¿Quién es el responsable?</h1>
    </div>
</div>

<div class="form-row col-lg-12">
    <div class="form-group col-md-4">
        <div class="form-ic-cmp">
            <i class="fad fa-id-card"></i>&nbsp;
            <label for="nombre">Nombre (s)</label>
            <label for="nombre" style="font-size: 7px;">Requerido</label>
        </div>
        <input type="text" name="nombre" id="Nombre" class=" form-control required" value="{{ old('nombre') }}"
            required maxlength="50" style="background-color:rgba(230, 238, 250, 0.5);" placeholder="Nombre">
        <div style="color:#FF0000;">
            {{ $errors->first('nombre') }}
        </div>
    </div>
    <div class="form-group col-md-4">
        <div class="form-ic-cmp">
            <i class="fad fa-id-card"></i>&nbsp;
            <label for="PrimerApellido">Primer Apellido</label>
            <label for="nombre" style="font-size: 7px;">Requerido</label>
        </div>
        <input type="text" name="PrimerApellido" id="PrimerApellido" class=" form-control required "
            value="{{ old('PrimerApellido') }}" maxlength="50" style="background-color:rgba(230, 238, 250, 0.5);"
            placeholder="Primer apellido">
        <div style="color:#FF0000;">
            {{ $errors->first('PrimerApellido') }}
        </div>
    </div>
    <div class="form-group col-md-4">
        <div class="form-ic-cmp">
            <i class="fad fa-id-card"></i>&nbsp;
            <label for="SegundoApellido">Segundo Apellido</label>
        </div>
        <input type="text" name="SegundoApellido" id="SegundoApellido" class=" form-control "
            value="{{ old('SegundoApellido') }}" maxlength="50" style="background-color:rgba(230, 238, 250, 0.5);"
            placeholder="Segundo apellido">
        <div style="color:#FF0000;">
            {{ $errors->first('SegundoApellido') }}
        </div>
    </div>
</div>

<div class="row mt-3">
    <div class="col-md-12">
        <h1 class="mb-4">Indique lugar y fecha en que sucede el hecho a denunciar</h1>
    </div>
</div>

<div class="row">
    <div class="col-md text-center">
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="fechaintervalo" id="fecha" value="1" checked
                onchange="fechaIntervalo(this)">
            <label class="form-check-label" for="fecha">Fecha específica</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="fechaintervalo" id="intervalo" value="2"
                onchange="fechaIntervalo(this)">
            <label class="form-check-label" for="intervalo">Lapso de tiempo</label>
        </div>
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-md-4">
        <div class="form-group">
            <div class="form-ic-cmp">
                <i class="fal fa-file-alt"></i>&nbsp;
                <label for="fecha_inicial">Fecha <span class="spanintervalo d-none">inicial</span> de los hechos</label>
                <label for="fecha_inicial" style="font-size: 7px;">Requerido</label>
            </div>
            <input type="date" class="form-control required" name="fecha_inicial" id="fecha_inicial">
            <div style="color:#FF0000;">
                {{ $errors->first('fechainicial') }}
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            <div class="form-ic-cmp">
                <i class="fal fa-file-alt"></i>&nbsp;
                <label for="hora_inicial">Hora <span class="spanintervalo d-none">inicial</span> de los hechos</label>
            </div>
            <input type="time" class="form-control" name="hora_inicial">
            <div style="color:#FF0000;">
                {{ $errors->first('hora_inicial') }}
            </div>
        </div>
    </div>
</div>


<div id="lugarhechos_domicilio" class="d-non">
    <div class="row">
        <div class="col-md-12">
            <i class="fad fa-map-marker-alt "></i>&nbsp;
            <label for="municipio_hechos" class="mb-0">Domicilio</label>
            <input type="text" name="domicilio_mapa" id="search" class="form-control mb-3 mt-1"
                placeholder="Buscar dirección en México">
        </div>

    </div>

    <div class="row">
        <div class="col-md-12">
            <div id="map"></div>
        </div>
    </div>

    <div class="form-row col-lg-12">
        <div class="form-group col-md-4">
            <div class="form-ic-cmp">
                <i class="fal fa-envelope"></i>&nbsp;
                <label for="CP_hechos">Código Postal</label>
                <label for="CP_hechos" style="font-size: 7px;">Requerido</label>

            </div>
            <input class=" form-control required" value="" maxlength="5" onkeypress="return justNumbers(event);"
                style="background-color:rgba(230, 238, 250, 0.5);" name="CP_hechos" type="text" id="CP_hechos"
                placeholder="Ingrese CP" maxlength="5"
                onblur="validarCP(this,'entidad_hechos','municipio_hechos','asentamiento_hechos')"
                onchange="validarCP(this,'entidad_hechos','municipio_hechos','asentamiento_hechos')">

            <div style="color:#FF0000;">

            </div>
        </div>
        <div class="form-group col-md-4">
            <div class="form-ic-cmp">
                <i class="fal fa-map"></i>&nbsp;
                <label for="entidad_hechos">Estado</label>
            </div>
            <select class=" form-control " value="{{(old('entidad'))}}"
                style="background-color:rgba(230, 238, 250, 0.5);" id="entidad_hechos" name="entidad_hechos" disabled>
                <option value="0">Estado</option>
            </select>
            <div style="color:#FF0000;">

            </div>
        </div>

        <div class="form-group col-md-4">
            <div class="form-ic-cmp">
                <i class="fad fa-map-marker-alt"></i>&nbsp;
                <label for="municipio_hechos">Municipio</label>
            </div>
            <select class=" form-control " value="<?php echo e(old('municipio')); ?>" id="municipio_hechos"
                style="background-color:rgba(230, 238, 250, 0.5);" name="municipio_hechos" disabled>
                <option value="0">Municipio</option>
                {{-- @foreach ($municipios as $country)

                <option @if ($country->id == 118)
                    {{'selected'}}
                    @endif value="{{$country->id}}">{{$country->pais}}</option>
                @endforeach --}}
            </select>
            <div style="color:#FF0000;">

            </div>
        </div>
    </div>

    <div class="form-row col-lg-12">
        <div class="form-group col-md-4">
            <div class="form-ic-cmp">
                <i class="fal fa-map-pin"></i>&nbsp;
                <label for="colonia">Colonia</label>
                <label for="colonia" style="font-size: 7px;">Requerido</label>

            </div>
            <select class=" form-control required" value="<?php echo e(old('municipio')); ?>"
                style="background-color:rgba(230, 238, 250, 0.5);" name="asentamiento_hechos" id="asentamiento_hechos">
                <option value="0">Seleccione una colonia</option>
            </select>
            {{-- <input class=" form-control " maxlength="250" value=""
                style="background-color:rgba(230, 238, 250, 0.5);" name="colonia" type="text" id="colonia"> --}}
            <div style="color:#FF0000;">

            </div>
        </div>
        <div class="form-group col-md-4">
            <div class="form-ic-cmp">
                <i class="fas fa-map-signs"></i>&nbsp;
                <label for="calle_hechos">Calle</label>
                <label for="calle_hechos" style="font-size: 7px;">Requerido</label>

            </div>
            <input class=" form-control required " value="" maxlength="250"
                style="background-color:rgba(230, 238, 250, 0.5);" name="calle_hechos" type="text" id="calle_hechos"
                placeholder="Ingrese la calle">
            <div style="color:#FF0000;">

            </div>
        </div>

        <div class="form-group col-md-2">
            <div class="form-ic-cmp">
                <i class="fal fa-hashtag"></i>&nbsp;
                <label for="numext_hechos">Número Exterior</label>

            </div>
            <input class=" form-control required" value="" maxlength="6"
                style="background-color:rgba(230, 238, 250, 0.5);" name="numext_hechos" type="text" id="numext_hechos"
                placeholder="Número exterior">
            <div style="color:#FF0000;">

            </div>
        </div>




        <div class="form-group col-md-2">
            <div class="form-ic-cmp">
                <i class="fal fa-hashtag"></i>&nbsp;
                <label for="numext_hechos">Número Interior</label>

            </div>
            <input class=" form-control" value="" maxlength="6" style="background-color:rgba(230, 238, 250, 0.5);"
                name="numint_hechos" type="text" id="numint_hechos" placeholder="Número interior">
            <div style="color:#FF0000;">

            </div>
        </div>

        <div class="form-row col-lg-12">
            <div class="form-group col-md-4">
                <div class="form-ic-cmp">
                    <i class="fal fa-home"></i>&nbsp;
                    <label for="numext_hechos">Lugar</label>

                </div>
                <select name="lugar_descripcion" style="background-color:rgba(230, 238, 250, 0.5);" id="select_lugar" class=" form-control required" data-show-subtext="true"
                    data-live-search="true">
                    <option value="0">Seleccione un lugar</option>

                    @foreach ($lugares as $lugar)

                    <option value="{{$lugar->id}}">{{$lugar->lugar}}</option>
                    @endforeach

                </select>
                <div style="color:#FF0000;">

                </div>
            </div>

        </div>

    </div>

</div>


<div class="row justify-content-center d-none" id="DivIntervalo">
    <div class="col-md-4">
        <div class="form-group">
            <div class="form-ic-cmp">
                <i class="fal fa-file-alt"></i>&nbsp;
                <label for="fecha_final">Fecha <span class="spaninicial">final de los hechos</label>
                <label for="fecha_final" style="font-size: 7px;">Requerido</label>

            </div>
            <input type="date" class="form-control" name="fecha_final" id="fecha_final">
            <div style="color:#FF0000;">
                {{ $errors->first('fecha_final') }}
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            <div class="form-ic-cmp">
                <i class="fal fa-file-alt"></i>&nbsp;
                <label for="hora_final">Hora final de los hechos</label>
            </div>
            <input type="time" class="form-control" name="hora_final">
            <div style="color:#FF0000;">
                {{ $errors->first('hora_final') }}
            </div>
        </div>
    </div>
</div>


<div class="row mt-3">
    <div class="col-md-12">
        <h1 class="mb-4">Explique de qué manera se cometió el hecho </h1>
    </div>
</div>

<div class="row mt-3">
    <div class="col-md-12">
        <h1 class="mb-4">¿Existió violencia?</h1>
    </div>
</div>



<div class="row mt-3">
    <div class="col-md-12">
        <h1 class="mb-4">¿Existen testigos del hecho?</h1>
    </div>
</div>




<script src="https://maps.googleapis.com/maps/api/js?key={{config('app.api_google')}}&callback=initMap&libraries=places,marker,drawing,geometry&loading=async&v=beta"  async defer>
</script>

<script>
    let map;
			let marker;
			let infoWindow;

			function initMap() {
				const mexicoBounds = new google.maps.LatLngBounds(
					new google.maps.LatLng(14.3895, -118.449591), // southwest
					new google.maps.LatLng(32.718653, -86.5891) // northeast
				);

				map = new google.maps.Map(document.getElementById("map"), {
					center: {
						// lat: 23.6345,
						// lng: -102.5528
                        lat: 19.5665,
            lng: -101.7068
					},
					restriction: {
						latLngBounds: mexicoBounds,
						strictBounds: true
					},
					zoom: 8,
					mapId: 'DEMO_MAP_ID',
					gestureHandling: 'greedy'
				});

                marker = new google.maps.marker.AdvancedMarkerElement({

                    map: map,
                    title: 'Ubicación Actual',
                    gmpDraggable: true
                });

				infoWindow = new google.maps.InfoWindow();

				// const searchInput = document.getElementById("search");
				// const postalCodeInput = document.getElementById("CP_mapa");
				// const latitudeInput = document.getElementById("latitude");
				// const longitudeInput = document.getElementById("longitude");
				// const streetInput = document.getElementById("calle_mapa");
				// const municipioInput = document.getElementById("municipio_mapa");
				// const estadoInput = document.getElementById("estado_mapa");
				// const numeroInput = document.getElementById("numero_mapa");


                const searchInput = document.getElementById("search");
				const postalCodeInput = document.getElementById("CP_hechos");
				const latitudeInput = document.getElementById("latitude");
				const longitudeInput = document.getElementById("longitude");
				const streetInput = document.getElementById("calle_hechos");
				// const municipioInput = document.getElementById("municipio_hechos");
				// const estadoInput = document.getElementById("estado_hechos");
				const numeroInput = document.getElementById("numext_hechos");


                

				const searchBox = new google.maps.places.SearchBox(searchInput, {
					componentRestrictions: {
						country: 'MX'
					} // Restringe la búsqueda al país de México
				});

				function updateFields(position) {
					postalCodeInput.value = "";
					latitudeInput.value = position.lat();
					longitudeInput.value = position.lng();

					// Obtener el código postal utilizando la API de Geocoding
					const geocoder = new google.maps.Geocoder();
					geocoder.geocode({
						location: position
					}, (results, status) => {
						if (status === "OK") {
							if (results[0]) {
                                let street;
                                let municipality;
                                let number;
                                let state;
								for (let i = 0; i < results[0].address_components.length; i++) {

                                    const component = results[0].address_components[i];
                
                                    if (component.types.includes("route")) {
                                        street = component.long_name;
                                    }
                                    
                                    if (component.types.includes("locality")) {
                                        municipality = component.long_name;
                                    }

                                    if (component.types.includes("street_number")) {
                                        number = component.long_name;
                                    }
                                    
                                    if (component.types.includes("administrative_area_level_1")) {
                                        state = component.long_name;
                                    }
                                    
                                    if (results[0].address_components[i].types.includes("postal_code")) {
                                        postalCodeInput.value = results[0].address_components[i].long_name;
                                        const blurEvent = new Event('blur');
                                        postalCodeInput.dispatchEvent(blurEvent);
                                        break;
                                    }

                                     // Asignar los valores a los campos de entrada correspondientes
                                    if (street) {
                                        // Asignar el nombre de la calle al campo de entrada
                                        // Aquí debes reemplazar 'streetInput' con el ID o nombre de tu campo de entrada para la calle
                                        streetInput.value = street;
                                    }

                                    if (municipality) {
                                        // Asignar el municipio al campo de entrada
                                        // Aquí debes reemplazar 'municipalityInput' con el ID o nombre de tu campo de entrada para el municipio
                                        // municipioInput.value = municipality;
                                    }

                                    if (number) {
                                        // Asignar el número exterior al campo de entrada
                                        // Aquí debes reemplazar 'numberInput' con el ID o nombre de tu campo de entrada para el número exterior
                                        numeroInput.value = number;
                                    }

                                    if (state) {
                                        // estadoInput.value = state;
                                    }

								}
							} else {
								console.log("No se encontraron resultados de geocodificación");
							}
						} else {
							console.log("Error de geocodificación: " + status);
						}
					});
				}

				function updateMarkerPositionAndCenter(position) {
                    if (!mexicoBounds.contains(position)) {
                        console.log("La posición está fuera de los límites de México");
                        return;
                    }
                    // marker.setPosition(position);
                    marker.setAttribute('position', position.lat() + ',' + position.lng());
                    map.setCenter(position); // Posiciona el mapa en el centro
                    map.setZoom(17); // Establece el nivel de zoom deseado (por ejemplo, 17)
                    updateFields(position);
					showInfoWindow(position);

                }
				function showInfoWindow(position) {
					infoWindow.setContent("<strong>Latitud:</strong> " + position.lat() + "<br><strong>Longitud:</strong> " + position.lng());
					infoWindow.open(map, marker);
				}


                marker.addListener("dragend", () => {
                    // const position = marker.getPosition();
                    const getPosition = marker.getAttribute('position');
                    const parts = getPosition.split(',');

                    const position = {
                        lat: function() {
                            return parseFloat(parts[0]); // La primera parte es la latitud
                        },
                        lng: function() {
                            return parseFloat(parts[1]); // La segunda parte es la longitud
                        }
                    };

					const newLatLng = new google.maps.LatLng(parseFloat(position.lat()), parseFloat(position
                        .lng()));
                    updateMarkerPositionAndCenter(newLatLng);
                });

				searchBox.addListener("places_changed", () => {
					const places = searchBox.getPlaces();

					if (places.length === 0) {
						return;
					}

					const place = places[0];

					if (!place.geometry || !mexicoBounds.contains(place.geometry.location)) {
						console.log("No se pudo encontrar la ubicación o está fuera de México");
						return;
					}

					updateMarkerPositionAndCenter(place.geometry.location);
				});

				google.maps.event.addListener(map, "click", (event) => {
					const position = event.latLng;
					updateMarkerPositionAndCenter(position);
				});
			}
</script>


<script>
    function LlenadoHechos(){
        $("#ModalInstrucciones").modal("show");
    }

    function LugarHechos(select){
        var valor = $(select).val();
        if(valor == 1){
            $("#lugarhechos_domicilio").addClass("d-none")
            $("#lugarhechos_carretera").removeClass("d-none");

            // $("#search").removeClass("required");
            $("#CP_hechos").removeClass("required");
            $("#calle_hechos").removeClass("required");
            $("#numext_hechos").removeClass("required");
            $("#asentamiento_hechos").removeClass("required");


            $("#km_hechos").addClass("required");
            $("#descripcion_lugar").addClass("required");
        }else if(valor == 2){
            $("#lugarhechos_carretera").addClass("d-none")
            $("#lugarhechos_domicilio").removeClass("d-none");

            $("#CP_hechos").addClass("required");
            $("#calle_hechos").addClass("required");
            $("#numext_hechos").addClass("required");
            $("#asentamiento_hechos").addClass("required");

            // $("#search").addClass("required");
            $("#km_hechos").removeClass("required");
            $("#descripcion_lugar").removeClass("required");
        }
    }

    function fechaIntervalo(radio){
        var valor = $(radio).val();
        if(valor == 2){
            $("#DivIntervalo").removeClass("d-none");
            $(".spanintervalo").removeClass("d-none");

            $("#fecha_final").addClass("required");
        }else{
            $("#DivIntervalo").addClass("d-none");
            $(".spanintervalo").addClass("d-none");
            $("#fecha_final").removeClass("required");

        }
    }

</script>
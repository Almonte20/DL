<div class="seccion text-center mb-3">
    <div class="circle-title">
        <div class="circle-number ">5</div>
    </div>
    <h1>LUGAR Y FECHA DE LOS HECHOS:</h1>
</div>

<div class="text-center mb-3">
    <p class="mb-2 txt-preguntas">INDIQUE LA FECHA Y HORA EN QUE SUCEDIÓ EL HECHO A DENUNCIAR</p>
    {{-- <div class="col-md text-center"> --}}
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="fecha_especifica_lapso" id="fecha" value="0" checked
                onchange="fechaIntervalo(this)">
            <label class="form-check-label" for="fecha">Fecha y hora específica</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="fecha_especifica_lapso" id="intervalo" value="1"
                onchange="fechaIntervalo(this)">
            <label class="form-check-label" for="intervalo">Lapso de tiempo</label>
        </div>
    {{-- </div> --}}
</div>

<div id="ResponsableDiv" class="container pl-3">
    {{-- <div id="fecha-especifica" class="row justify-content-center">
        <div class="col-md-4">
            <div class="form-group">
                <div class="form-ic-cmp">
                    <i class="fal fa-file-alt"></i>&nbsp;
                    <label for="fecha_inicial">Fecha y hora <span class="spanintervalo d-none">inicial</span> de los
                        hechos</label>
                    <label for="fecha_inicial" style="font-size: 7px;">Requerido</label>
                </div>
                <input type="datetime-local" id="input-fecha-especifica-hechos" class="form-control required" name="fecha_inicial" max="{{ date('Y-m-d H:i') }}"
                data-message-error='El dato "FECHA Y HORA DE LOS HECHOS" es requerido.'
                >

                <div style="color:#FF0000;">
                    {{ $errors->first('fechainicial') }}
                </div>
            </div>
        </div>
    </div> --}}

    <div class="row justify-content-center" id="">
        <div class="col-md-4">
            <div class="form-group">
                <div class="form-ic-cmp">
                    <i class="fal fa-file-alt"></i>&nbsp;
                    <label for="fecha_inicial">Fecha y hora <span class="spaninicial d-none">inicial</span> de los
                        hechos</label>
                    <label for="fecha_inicial" style="font-size: 7px;">Requerido</label>
                </div>
                <input type="datetime-local" id="input-fecha-inicial-hechos" class="form-control" name="fecha_inicial" id="fecha_inicial" max="{{ date('Y-m-d H:i') }}"
                data-message-error='El dato "FECHA Y HORA INICIAL DE LOS HECHOS" es requerido.'>
                <div style="color:#FF0000;">
                    {{ $errors->first('fechainicial') }}
                </div>
            </div>
        </div>
        <div class="col-md-4 d-none" id="DivIntervalo">
            <div class="form-group">
                <div class="form-ic-cmp">
                    <i class="fal fa-file-alt"></i>&nbsp;
                    <label for="fecha_final">Fecha y hora final de los hechos</label>
                    <label for="fecha_final" style="font-size: 7px;">Requerido</label>

                </div>
                <input type="datetime-local" id="input-fecha-final-hechos" class="form-control" name="fecha_final" id="fecha_final" max="{{ date('Y-m-d H:i') }}"
                data-message-error='El dato "FECHA Y HORA FINAL DE LOS HECHOS" es requerido.'>
                <div style="color:#FF0000;">
                    {{ $errors->first('fecha_final') }}
                </div>
            </div>
        </div>

        {{-- <div class="col-md-4">
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
        </div> --}}
    </div>


    <div class="text-center mt-5">
        <p class="mb-2 txt-preguntas">INDIQUE EL LUGAR DONDE SUCEDIÓ EL HECHO A DENUNCIAR</p>
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
                     name="CP_hechos" type="text" id="CP_hechos"
                    placeholder="Ingrese C.P." maxlength="5"
                    data-message-error='El dato "CÓDIGO POSTAL DONDE SUCEDIÓ EL HECHO" es requerido.'
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
                    id="entidad_hechos" name="entidad_hechos" disabled>
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
                     name="municipio_hechos" disabled>
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
                     name="asentamiento_hechos"
                     data-message-error='El dato "COLIONIA DONDE SUCEDIÓ EL HECHO" es requerido.'
                    id="asentamiento_hechos">

                    <option value="0">Seleccione una colonia</option>
                </select>
                {{-- <input class=" form-control " maxlength="250" value=""
                     name="colonia" type="text" id="colonia"> --}}
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
                     name="calle_hechos" type="text" id="calle_hechos"
                     data-message-error='El dato "CALLE DONDE SUCEDIÓ EL HECHO" es requerido.'
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
                    name="numext_hechos" type="text"
                    data-message-error='El dato "NÚMERO EXTERIOR DONDE SUCEDIÓ EL HECHO" es requerido.'
                    id="numext_hechos" placeholder="Número exterior">
                <div style="color:#FF0000;">

                </div>
            </div>




            <div class="form-group col-md-2">
                <div class="form-ic-cmp">
                    <i class="fal fa-hashtag"></i>&nbsp;
                    <label for="numext_hechos">Número Interior</label>

                </div>
                <input class=" form-control" value="" maxlength="6"
                    name="numint_hechos" type="text" id="numint_hechos" placeholder="Número interior">
                <div style="color:#FF0000;">

                </div>
            </div>

            <div class="form-row col-lg-12">
                <div class="form-group col-md-4">
                    <div class="form-ic-cmp">
                        <i class="fal fa-home"></i>&nbsp;
                        <label for="select_lugar">Lugar</label>

                    </div>
                    <select name="lugar_descripcion"
                        id="select_lugar" class=" form-control required" data-show-subtext="true"
                        data-live-search="true" onchange="lugarReferencia(this)"
                        data-message-error='El dato "LUGAR DONDE SUCEDIÓ EL HECHO" es requerido.'>
                        <option value="0">Seleccione un lugar</option>

                        @foreach ($lugares as $lugar)

                        <option value="{{$lugar->id}}">{{$lugar->lugar}}</option>
                        @endforeach

                    </select>
                    <div style="color:#FF0000;">

                    </div>
                </div>

                <div class="form-group col-md-8 d-none" id="referenciaLugar">
                    <div class="form-ic-cmp">
                        <i class="fal fa-home"></i>&nbsp;
                        <label for="numext_hechos">Referencia del lugar (<span id="txt_lugar_referencia"></span>)</label>

                    </div>
                    <textarea name="referencia_lugar" class="form-control" placeholder="Referencia del lugar" id="descripcion-referencia-lugar"
                    data-message-error='El dato "REFERENCIA DEL LUGAR DONDE SUCEDIÓ EL HECHO" es requerido.'></textarea>
                </div>

            </div>

        </div>
    </div>

</div>

<style>
    #map {
        height: 400px;
        width: 100%;
        margin-bottom: 20px;
        /* Agregar espacio debajo del mapa */
    }

    .img-llenado {
        /* Layout Properties */
        top: 576px;
        left: 541px;
        width: 31px;
        height: 31px;
        /* UI Properties */
        background: transparent url('{{asset("img/denuncia/Llenado de hechos.svg")}}') 0% 0% no-repeat padding-box;
        opacity: 1;
    }

    .txt-modal {

        font-weight: 100;
        text-align: left;
        font-size: 20px;
        letter-spacing: 0px;
        color: #000000;
    }

    .modal-body b {
        text-align: left;
        font: normal normal 800 27px/31px Labrador A;
        letter-spacing: 0px;
        color: #000000;
    }
</style>









<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12" style="display: none">
    <input type="text" name="coordenadas" class="form-control">
</div>





<div id="lugarhechos_carretera" class="d-none">
    <div class="form-group col-lg-12">
        <div class="form-group col-md-12">
            <div class="form-ic-cmp">
                <i class="fas fa-road"></i>&nbsp;
                <label for="km_hechos">Km donde ocurrieron los hechos</label>
                <label for="colonia" style="font-size: 7px;">Requerido</label>
            </div>
            <input class="form-control" name="km_hechos" type="text" id="km_hechos">
            <div style="color:#FF0000;">

            </div>
        </div>
    </div>

    <div class="form-group col-lg-12" id="lugarhechos_observaciones">
        <div class="form-group col-lg-12">
            <div class="form-ic-cmp">
                <i class="fal fa-file-alt"></i>&nbsp;
                <label for="descripcion_lugar">Descripcion del lugar de los hechos</label>
                <i class="fad fa-question-circle" data-toggle="tooltip" data-placement="top" title=""
                    data-original-title="Recuerda colocar todos los datos conocidos del lugar donde sucedieron los hechos. Ej. municipio más cerc, lugar conocido más cerca, etc."></i>&nbsp;
                <label for="colonia" style="font-size: 7px;">Requerido</label>
            </div>
            <textarea class="form-control" name="descripcion_lugar" id="descripcion_lugar" rows="7" maxlength="1990"
                ></textarea>
            <!-- <textarea class="form-control" value="&lt;?php echo e(old(&#039;descripcion_lugar&#039;,&#039;&#039;)); ?&gt;" maxlength="4000" placeholder="Recuerda que debes ingresar una descripcion del lugar de los hechos." rows="7"  name="descripcion_lugar" cols="50" id="descripcion_lugar"></textarea> -->
            <div style="color:#FF0000;">

            </div>
        </div>
    </div>

</div>


<div id="lugarhechos_mapa" class="d-none">

    <div class="row d-none">
        <div class="d-none">
            <input type="text" name="latitud" id="latitude" class="form-control mb-3" placeholder="Latitud" readonly>
            <input type="text" name="longitud" id="longitude" class="form-control mb-3" placeholder="Longitud" readonly>
        </div>
        <div class="col-md-3">
            Código Postal
            <input type="text" name="CP_mapa" id="CP_mapa" class="form-control mb-3" placeholder="Código Postal">
        </div>
        <div class="col-md-3">
            Entidad
            <input type="text" name="estado_mapa" id="estado_mapa" class="form-control mb-3" placeholder="Estado"
                readonly>
        </div>
        <div class="col-md-3">
            Municipio
            <input type="text" name="municipio_mapa" id="municipio_mapa" class="form-control mb-3"
                placeholder="Municipio" readonly>
        </div>
        <div class="col-md-3">
            Número exterior
            <input type="text" name="numero_mapa" id="numero_mapa" class="form-control mb-3" placeholder="Número">
        </div>

        <div class="col-md-3">
            <input type="text" name="calle_mapa" id="calle_mapa" class="form-control mb-3" placeholder="Calle">
        </div>


    </div>
    <!-- Otros elementos del formulario -->
</div>


<div class="modal fade" id="ModalInstrucciones" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content ">
            <div class="modal-header text-center">
                <h3 class="modal-title w-100 font-weight-bold">INSTRUCCIONES DE LLENADO DE HECHOS</h3>
            </div>
            <div class="modal-body ">
                <div class="row mb-4 d-none">
                    <div class="col-md  text-center">
                        <b class="text-center">I N S T R U C C I O N E S:</b>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md txt-modal">
                        <span>

                            Estimado denunciante, trate de responder al mayor número de las siguientes preguntas
                            para
                            una mejor
                            narrativa de los hechos.
                            <br>
                            <br><b> 1.-¿Qué?</b> Narrar lo que sucedió lo más claro posible, especificando
                            detalles.
                            <br><b> 2.-¿Cuándo?</b> Deberá establecer la fecha en que ocurrió el hecho o en que tuvo
                            conocimiento
                            del mismo (día, mes y año), si no sabe con exactitud establezca una hora y fecha
                            aproximada
                            en que
                            ocurrió.
                            <br> <b>3.-¿Cómo?</b> En este campo deberá describir la manera o forma en que cometieron
                            el
                            delito
                            (manera, forma, modo).
                            <br><b>4.¿Dónde?</b> Deberá ubicar el lugar, calle, número, colonia y/o referencia,
                            entre
                            qué
                            calles, señalando establecimientos, escuelas, que nos acerquen o ubiquen el lugar).
                            <br><b>5.¿Quién?</b> Deberá especificar si conoce a la persona o personas que cometieron
                            el
                            delito
                            (nombre con apellidos si los sabe, alias, domicilio donde puede ser localizado, señas
                            particulares,
                            tatuajes, perforaciones, o cualquier otra característica que puede ayudar a su
                            reconocimiento).
                            <br><b>6.¿Por qué?</b> Deberá de señalar si conoce el motivo por el cual cometieron el
                            delito.
                            <br><b>7.¿Con qué?</b> En este campo deberá de precisar y describir el objeto por
                            ejemplo:
                            (arma,
                            cuchillo, navaja, piedra, palo, etc), con alguna parte del cuerpo ejemplo: (mano, pie,
                            puño,
                            cabeza
                            etc.), o vehiculo, ejemplo (motocicleta, automóvil, camión, bicicleta, etc.)
                            <br><br>
                            <b>EJEMPLO DE LLENADO</b>
                            <br>
                            Que el día (_____), siendo aproximadamente las (____), encontrándome en _________),
                            sucedió
                            ________
                            <br>(respondiendo a las siguientes preguntas: <br><b>¿Qué?</b><br> <b>¿Cuándo?</b><br>
                            <b>¿Cómo?</b><br> <b>¿Dónde?</b><br> <b>¿Quién?</b><br> <b>¿Por qué?</b><br> <b>¿Con
                                quién?</b><br>


                        </span>
                        <br>
                    </div>
                </div>
            </div>
            <div class="modal-footer d-flex justify-content-center">
                <button class="btn btn-default" data-dismiss="modal" aria-label="Close"
                    style="background: #394049;">Cerrar</button>
            </div>
        </div>
    </div>
</div>



<script
    src="https://maps.googleapis.com/maps/api/js?key={{config('app.api_google')}}&callback=initMap&libraries=places,marker,drawing,geometry&loading=async&v=beta"
    async defer>
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
        console.log('llega');

        var valor = $(radio).val();
        if(valor == 1){
            $("#DivIntervalo").removeClass("d-none");
            // $(".spanintervalo").removeClass("d-none");

            // $("#fecha_final").addClass("required");

            $('.spaninicial').removeClass('d-none');


            // $('#input-fecha-especifica-hechos').removeClass('required');
            // $('#input-fecha-inicial-hechos').addClass('required');
            // $('#input-fecha-final-hechos').addClass('required');

        }else{
            $("#DivIntervalo").addClass("d-none");
            // $(".spanintervalo").addClass("d-none");
            // $("#fecha_final").removeClass("required");

            // $('#fecha-especifica').removeClass('d-none');
            $('.spaninicial').addClass('d-none');


            // $('#input-fecha-especifica-hechos').addClass('required');
            // $('#input-fecha-inicial-hechos').removeClass('required');
            // $('#input-fecha-final-hechos').removeClass('required');


        }
    }

    function lugarReferencia(select){
        var valor = $(select).val();
        var texto = $(select).find('option:selected').text();
        if(valor == 0){
            $("#referenciaLugar").addClass("d-none");
        }else{
            $("#referenciaLugar").removeClass("d-none");
            $("#txt_lugar_referencia").text(texto);
            $('#descripcion-referencia-lugar').addClass('required');
            $('#descripcion-referencia-lugar').attr('required');
        }

    }

</script>

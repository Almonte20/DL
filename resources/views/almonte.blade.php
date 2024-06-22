@extends('layouts.app')


    @section('title', 'listado de usuarios')
@section('contenido')

    <style>
        #map {
            height: 400px;
            width: 100%;
            margin-bottom: 20px;
            /* Agregar espacio debajo del mapa */
        }
    </style>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <input type="text" id="search" class="form-control mb-3" placeholder="Buscar dirección en México">
            </div>

        </div>
        <div class="row">
            <div class="col-md-12">
                <div id="map"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <input type="text" id="postal_code" class="form-control mb-3" placeholder="Código Postal" readonly>
            </div>
            <div class="col-md-4">
                <input type="text" id="latitude" class="form-control mb-3" placeholder="Latitud" readonly>
            </div>
            <div class="col-md-4">
                <input type="text" id="longitude" class="form-control mb-3" placeholder="Longitud" readonly>
            </div>
        </div>
    </div>
@endsection

    @section('js')
        <script
            src="https://maps.googleapis.com/maps/api/js?key={{ config('app.api_google') }}&callback=initMap&libraries=places,marker,drawing,geometry&loading=async&v=beta">
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
						lat: 23.6345,
						lng: -102.5528
					},
					restriction: {
						latLngBounds: mexicoBounds,
						strictBounds: true
					},
					zoom: 5,
					mapId: 'DEMO_MAP_ID',
					gestureHandling: 'greedy'
				});

                marker = new google.maps.marker.AdvancedMarkerElement({

                    map: map,
                    title: 'Ubicación Actual',
                    gmpDraggable: true
                });

				infoWindow = new google.maps.InfoWindow();

				const searchInput = document.getElementById("search");
				const postalCodeInput = document.getElementById("postal_code");
				const latitudeInput = document.getElementById("latitude");
				const longitudeInput = document.getElementById("longitude");

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
								for (let i = 0; i < results[0].address_components.length; i++) {
									if (results[0].address_components[i].types.includes("postal_code")) {
										postalCodeInput.value = results[0].address_components[i].long_name;
										break;
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

    @endsection


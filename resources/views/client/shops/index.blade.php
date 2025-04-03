
<x-app-layout>
    <div class="container mx-auto my-4">
        <h2 class="text-2xl font-semibold text-gray-800 mb-4">Boutiques Disponibles</h2>

        <!-- Bouton pour basculer entre la vue en grille et la carte -->
        <div class="flex justify-end mb-4">
            <button id="toggleView"
                class="bg-[#e38407] hover:bg-[#e38407e7] text-white text-sm font-semibold py-2 px-4 rounded-full transition duration-300 ease-in-out transform hover:scale-105">
                Voir la Carte
            </button>
        </div>

        <!-- Vue en grille des boutiques -->
        <div id="gridView" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 transition-opacity duration-500">
            @foreach ($shops as $shop)
                <div
                    class="max-w-xs bg-white rounded-lg shadow hover:shadow-lg transition transform hover:-translate-y-1">
                    <!-- Image de profil en cercle -->
                    <div class="flex justify-center mt-4">
                        <img src="{{ $shop->image ?? asset('images/default-shop.png') }}"
                            alt="Image de {{ $shop->name }}"
                            class="w-24 h-24 object-cover rounded-full border border-gray-200">
                    </div>

                    <!-- Contenu de la carte -->
                    <div class="p-4 text-center">
                        <h3 class="text-lg font-bold text-gray-800">{{ $shop->name }}</h3>
                        <p class="text-gray-600 text-sm mt-1">
                            {!! substr($shop->description, 0, 100) !!}
                        </p>
                        <div class="flex items-center justify-center mt-2">
                            <svg class="w-4 h-4 text-gray-500 mr-1" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                </path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            <span class="text-gray-600 text-xs">{{ $shop->address }}</span>
                        </div>
                        <a href="{{ route('shops.show', $shop->_id) }}"
                            class="mt-4 block bg-[#e38407] hover:bg-[#e38407e7] text-white text-sm font-semibold py-2 px-4 rounded-full transition duration-300 ease-in-out transform hover:scale-105">
                            Visit Store
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Vue de la carte -->
        <div id="mapView" class="hidden h-screen transition-opacity duration-500"></div>
    </div>

    <!-- footer-area-start -->
    @include('partials.home-partials.footer')
    <!-- footer-area-end -->

    <!-- Inclure les fichiers CSS et JS de Leaflet et Leaflet Routing Machine -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine/dist/leaflet-routing-machine.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script src="https://unpkg.com/leaflet-routing-machine/dist/leaflet-routing-machine.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var toggleButton = document.getElementById('toggleView');
            var gridView = document.getElementById('gridView');
            var mapView = document.getElementById('mapView');
            var map;
            var userLocationMarker;
            var userLocation;

            // Obtenir la position de l'utilisateur
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    userLocation = [position.coords.latitude, position.coords.longitude];
                    if (map) {
                        userLocationMarker = L.marker(userLocation).addTo(map)
                            .bindPopup("Vous êtes ici").openPopup();
                        map.setView(userLocation, 13);
                    }
                });
            }

            toggleButton.addEventListener('click', function() {
                if (gridView.classList.contains('hidden')) {
                    gridView.classList.remove('hidden');
                    mapView.classList.add('hidden');
                    toggleButton.textContent = 'Voir la Carte';
                } else {
                    gridView.classList.add('hidden');
                    mapView.classList.remove('hidden');
                    toggleButton.textContent = 'Voir la Grille';

                    if (!map) {
                        map = L.map('mapView').setView([0, 0], 2);
                        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                        }).addTo(map);

                        var bounds = [];
                        @foreach ($shops as $shop)
                            @if ($shop->latitude && $shop->longitude)
                                var shopIcon = L.icon({
                                    iconUrl: 'https://cdn-icons-png.flaticon.com/512/11084/11084893.png', // Remplacez par le chemin de votre icône
                                    iconSize: [50, 50], // Taille de l'icône
                                    iconAnchor: [16, 32], // Point d'ancrage de l'icône
                                    popupAnchor: [0, -32] // Point d'ancrage du popup
                                });

                                var marker = L.marker([{{ $shop->latitude }}, {{ $shop->longitude }}], {
                                    icon: shopIcon
                                }).addTo(map);
                                marker.bindPopup(
                                    "<a href='{{ route('shops.show', $shop->_id) }}'>{{ $shop->name }}</a><br><button onclick='getRoute({{ $shop->latitude }}, {{ $shop->longitude }})'>Itinéraire</button>"
                                    );
                                bounds.push([{{ $shop->latitude }}, {{ $shop->longitude }}]);
                            @endif
                        @endforeach
                        if (bounds.length > 0) {
                            map.fitBounds(bounds);
                        }

                        // Ajouter la position de l'utilisateur si disponible
                        if (userLocation) {
                            userLocationMarker = L.marker(userLocation).addTo(map)
                                .bindPopup("Vous êtes ici").openPopup();
                            map.setView(userLocation, 13);
                        }
                    }
                }
            });

            window.getRoute = function(lat, lng) {
                if (userLocation) {
                    L.Routing.control({
                        waypoints: [
                            L.latLng(userLocation[0], userLocation[1]),
                            L.latLng(lat, lng)
                        ],
                        routeWhileDragging: true
                    }).addTo(map);
                } else {
                    alert('Impossible d\'obtenir votre position.');
                }
            };
        });
    </script>
</x-app-layout>

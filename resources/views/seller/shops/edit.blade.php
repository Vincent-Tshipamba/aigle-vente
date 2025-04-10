@extends('seller.layouts.app')

@section('content')


    <div class="container">

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="max-w-2xl mx-auto p-4">
            <h1 class="text-2xl font-bold text-gray-800 dark:text-white">Modifier la boutique {{ old('name', $shop->name) }}
            </h1>

            <form action="{{ route('shops.update', $shop->_id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-6">
                    <label for="name" class="block text-lg font-medium text-gray-800 mb-1">Nom de la boutique</label>
                    <input type="text" id="name" name="name"
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-[#e38407]"
                        required value="{{ old('name', $shop->name) }}">
                </div>

                <div class="col-span-2 auto-search-wrapper mb-4">
                    <label for="address" class="block text-lg font-medium text-gray-800 mb-1">
                        Adresse de la boutique
                    </label>

                    <div id="map" style="height: 300px;"></div> <!-- Carte ici -->

                    <input type="text" id="address" name="address"
                        class="mt-4 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        required readonly value="{{ old('address', $shop->address) }}">

                    <input type="hidden" id="latitude" name="latitude" required>
                    <input type="hidden" id="longitude" name="longitude" required>

                    @error('address')
                        <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="categories" class="block text-lg font-medium text-gray-800 mb-1">Catégories de la
                        boutique</label>
                    <select name="categories[]" id="categories" multiple="multiple"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm js-example-basic-multiple">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ in_array($category->id, $shopCategories) ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label for="contenu" class="block text-lg font-medium text-gray-800 mb-1">Contenu de l'article</label>
                    <div id="quill-editor"
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-[#e38407]"
                        style="height: 300px;">{!! old('contenu', $shop->description) !!}</div>

                    <textarea id="quill-editor-area" name="contenu" class="hidden">{{ old('contenu', $shop->description) }}</textarea>

                    @error('contenu')
                        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Image de profil de la boutique -->
                <div class="mb-6">
                    <label for="image" class="block text-lg font-medium text-gray-800 mb-1">Image de profil</label>

                    <!-- Affichage de l'image actuelle si elle existe -->
                    @if ($shop->image)
                        <div class="mb-3">
                            <img id="current-image" src="{{ asset(str_replace('public/', 'storage/', $shop->image)) }}"
                                alt="Image actuelle" class="w-32 h-32 rounded-md object-cover border">
                        </div>
                    @endif

                    <!-- Upload d'une nouvelle image -->
                    <input type="file" id="image" name="image" accept="image/*"
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-[#e38407]"
                        onchange="previewImage(event)">

                    <!-- Aperçu de la nouvelle image -->
                    <div id="image-preview-container" class="mt-3 hidden">
                        <img id="image-preview" class="w-32 h-32 rounded-md object-cover border">
                    </div>

                    @error('image')
                        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex justify-end">
                    <button type="submit"
                        class="px-6 py-2 bg-[#e38407] text-white font-semibold rounded-md hover:bg-orange-700 focus:outline-none">
                        Mettre à jour
                    </button>
                </div>
            </form>

        </div>

        @push('scripts')
            <script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"></script>
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    if (document.getElementById('quill-editor-area')) {
                        var editor = new Quill('#quill-editor', {
                            modules: {
                                toolbar: [
                                    [{
                                        'header': [1, 2, false]
                                    }],
                                    ['bold', 'italic', 'underline', 'strike'],
                                    ['blockquote', 'code-block'],
                                    [{
                                        'list': 'ordered'
                                    }, {
                                        'list': 'bullet'
                                    }],
                                    ['link', 'image', 'video'],
                                    ['clean']
                                ]
                            },
                            theme: 'snow'
                        });
                        var quillEditor = document.getElementById('quill-editor-area');
                        editor.on('text-change', function() {
                            quillEditor.value = editor.root.innerHTML;
                        });
                        quillEditor.addEventListener('input', function() {
                            editor.root.innerHTML = quillEditor.value;
                        });
                    }
                });
            </script>

            <script>
                function previewImage(event) {
                    var reader = new FileReader();
                    reader.onload = function() {
                        var preview = document.getElementById('image-preview');
                        preview.src = reader.result;
                        document.getElementById('image-preview-container').classList.remove('hidden');
                    };
                    reader.readAsDataURL(event.target.files[0]);
                }

                @if (session('success'))
                    Swal.fire({
                        icon: 'success',
                        title: 'Succès',
                        text: '{{ session('success') }}',
                        toast: true,
                        position: 'top-end',
                        timer: 3000,
                        showConfirmButton: false,
                        timerProgressBar: true,
                    });
                @endif

                @if (session('error'))
                    Swal.fire({
                        icon: 'error',
                        title: 'Erreur',
                        text: '{{ session('error') }}',
                        toast: true,
                        position: 'top-end',
                        timer: 7000,
                        showConfirmButton: false,
                        timerProgressBar: true,
                    });
                @endif
            </script>

            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    // Récupérer les coordonnées actuelles de la boutique
                    var currentLat = {{ $shop->latitude ?? -4.4419 }};
                    var currentLng = {{ $shop->longitude ?? 15.2663 }};

                    // Initialiser la carte avec les coordonnées actuelles ou par défaut (Kinshasa)
                    var map = L.map('map').setView([currentLat, currentLng], 13);

                    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                        attribution: '&copy; OpenStreetMap contributors'
                    }).addTo(map);

                    // Ajouter un marqueur draggable aux coordonnées actuelles
                    var marker = L.marker([currentLat, currentLng], {
                        draggable: true
                    }).addTo(map);

                    // Fonction pour obtenir l'adresse depuis les coordonnées via l'API Nominatim
                    function getAddressFromCoordinates(lat, lng) {
                        var url =
                            `https://nominatim.openstreetmap.org/reverse?lat=${lat}&lon=${lng}&format=json&addressdetails=1`;

                        fetch(url)
                            .then(response => response.json())
                            .then(data => {
                                if (data && data.display_name) {
                                    // Mise à jour du champ adresse
                                    let address = data.display_name || "Adresse inconnue";
                                    document.getElementById("address").value = address;
                                }
                            })
                            .catch(error => console.error('Erreur lors de la récupération de l\'adresse :', error));
                    }

                    // Mettre à jour les champs latitude, longitude et adresse lorsque le marqueur est déplacé
                    marker.on('dragend', function() {
                        var lat = marker.getLatLng().lat;
                        var lng = marker.getLatLng().lng;
                        document.getElementById("latitude").value = lat;
                        document.getElementById("longitude").value = lng;
                        getAddressFromCoordinates(lat, lng);
                    });

                    // Mettre à jour les champs latitude, longitude et adresse lorsque la carte est cliquée
                    map.on('click', function(e) {
                        var lat = e.latlng.lat;
                        var lng = e.latlng.lng;
                        marker.setLatLng([lat, lng]); // Déplace le marqueur
                        document.getElementById("latitude").value = lat;
                        document.getElementById("longitude").value = lng;
                        getAddressFromCoordinates(lat, lng); // Met à jour l'adresse
                    });

                    // Initialiser les champs latitude, longitude et adresse avec les valeurs actuelles
                    document.getElementById("latitude").value = currentLat;
                    document.getElementById("longitude").value = currentLng;
                    getAddressFromCoordinates(currentLat, currentLng);
                });
            </script>

            <script type="module">
                document.addEventListener('DOMContentLoaded', function() {
                    console.log("jQuery:", $.fn.jquery);
                    console.log("Select2:", typeof $.fn.select2); // doit être "function"
                    if (typeof $.fn.select2 === 'function') {
                        $('.js-example-basic-multiple').select2();
                    } else {
                        console.error("Select2 n'est pas chargé !");
                    }
                });
            </script>
        @endpush

    @endsection

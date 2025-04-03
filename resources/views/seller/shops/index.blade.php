@extends('seller.layouts.app')


@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white dark:bg-gray-800  shadow-lg transition-all duration-300 mb-4">
        <div class="p-6 space-y-4">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                <div class="space-y-1">
                    <div class="flex items-center gap-3">
                        <div class="p-2 bg-orange-100 dark:bg-orange-900/30 rounded-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                <path fill="currentColor" fill-rule="evenodd"
                                    d="M6.066 5.5a.5.5 0 0 0-.43.243L3.383 9.5h17.234l-2.254-3.757a.5.5 0 0 0-.429-.243zm-2.684 5H4v8A1.5 1.5 0 0 0 5.5 20H6a1.5 1.5 0 0 0 1.5-1.5v-5H10v5a1.5 1.5 0 0 0 1.5 1.5h7a1.5 1.5 0 0 0 1.5-1.5v-8h.616a1 1 0 0 0 .858-1.514l-2.255-3.758a1.5 1.5 0 0 0-1.286-.728H6.066a1.5 1.5 0 0 0-1.287.728L2.525 8.986a1 1 0 0 0 .857 1.514M5 18.5v-8h14v8a.5.5 0 0 1-.5.5h-7a.5.5 0 0 1-.5-.5v-5.3a.7.7 0 0 0-.7-.7H7.2a.7.7 0 0 0-.7.7v5.3a.5.5 0 0 1-.5.5h-.5a.5.5 0 0 1-.5-.5m8-2.5v-2.75h4V16zm-.083-3.75a.917.917 0 0 0-.917.917v2.916c0 .507.41.917.917.917h4.166c.507 0 .917-.41.917-.917v-2.916a.917.917 0 0 0-.917-.917z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                        <h2 class="text-2xl font-bold text-gray-800 dark:text-white">Boutique </h2>
                    </div>
                    <p class="text-sm text-gray-600 dark:text-gray-400">
                        Gérez vos Boutique, créez, modifiez et exportez facilement.
                    </p>
                </div>
            </div>
            <!-- Header Section -->
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                <div>
                    <!-- View Toggle -->
                    <div class="relative">
                        <input type="search" onclick="openModal()"
                            class="w-64 pl-10 pr-4 py-2 text-sm text-gray-700 bg-white dark:bg-gray-700 border border-gray-200 dark:border-gray-600 rounded-lg focus:border-orange-500 focus:ring-2 focus:ring-orange-200 dark:focus:ring-orange-900 dark:text-white transition-colors duration-200"
                            placeholder="Rechercher des activités..." data-modal-target="search-activities"
                            data-modal-toggle="search-activities" />
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Actions Section -->
                <div class="flex flex-wrap items-center gap-3">


                    <!-- Export Dropdown -->
                    {{-- <div class="relative inline-block">
                    <button id="dropdownBgHoverButton" data-dropdown-toggle="dropdownBgHover"
                        class="inline-flex items-center px-4 py-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:bg-gray-600 transition-all duration-200">
                        <svg class="mr-2" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M6 12C7.10457 12 8 11.1046 8 10C8 8.89543 7.10457 8 6 8C4.89543 8 4 8.89543 4 10C4 11.1046 4.89543 12 6 12Z"
                                stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path d="M6 4V8" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path d="M6 12V20" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path
                                d="M12 18C13.1046 18 14 17.1046 14 16C14 14.8954 13.1046 14 12 14C10.8954 14 10 14.8954 10 16C10 17.1046 10.8954 18 12 18Z"
                                stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path d="M12 4V14" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path d="M12 18V20" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path
                                d="M18 9C19.1046 9 20 8.10457 20 7C20 5.89543 19.1046 5 18 5C16.8954 5 16 5.89543 16 7C16 8.10457 16.8954 9 18 9Z"
                                stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path d="M18 4V5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path d="M18 9V20" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                        Filtrer
                    </button>

                    <div id="dropdownBgHover" class="z-10 hidden w-48 bg-white rounded-lg shadow-sm dark:bg-gray-700">
                        <ul class="p-3 space-y-1 text-sm text-gray-700 dark:text-gray-200"
                            aria-labelledby="dropdownBgHoverButton">
                            <li>
                                <div class="flex items-center p-2 rounded-sm hover:bg-gray-100 dark:hover:bg-gray-600">
                                    <input id="recent-products" type="checkbox" value="recent"
                                        class="filter-checkbox w-4 h-4">
                                    <label for="recent-products" class="ms-2 text-sm font-medium">Produits
                                        récents</label>
                                </div>
                            </li>
                            <li>
                                <div class="flex items-center p-2 rounded-sm hover:bg-gray-100 dark:hover:bg-gray-600">
                                    <input id="active-products" type="checkbox" value="is_active"
                                        class="filter-checkbox w-4 h-4" checked>
                                    <label for="active-products" class="ms-2 text-sm font-medium">Produits
                                        actifs</label>
                                </div>
                            </li>

                        </ul>
                    </div>
                </div> --}}

                    <!-- Create Activity Button -->
                    <button data-modal-target="crud-modal" data-modal-toggle="crud-modal" type="button"
                        class="inline-flex items-center px-4 py-2 text-sm font-medium rounded-lg bg-[#e38407] text-white hover:bg-orange-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500 transition-all duration-200">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                        </svg>
                        Ajoute une boutique
                    </button>
                </div>
            </div>
        </div>
    </div>

@section('modal')
    <!-- Main modal -->
    <div id="crud-modal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                        Ajouter une boutique
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-toggle="crud-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <form class="p-4 md:p-5" action="{{ route('shops.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="grid gap-4 mb-4 grid-cols-2">
                        <div class="col-span-2">
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Nom de la boutique
                            </label>
                            <input type="text" name="name" id="name"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Nom de la boutique" required value="{{ old('name') }}">
                            @error('name')
                                <div class="text-red-500 text-sm">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-span-2 auto-search-wrapper">
                            <label for="address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Adresse de la boutique
                            </label>
                            <div id="autocomplete"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            </div>
                            <input type="hidden" id="address" name="address" required>
                            <input type="hidden" id="latitude" name="latitude">
                            <input type="hidden" id="longitude" name="longitude">
                            @error('address')
                                <div class="text-red-500 text-sm">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-span-2">
                            <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Description de la boutique
                            </label>
                            <textarea id="description" rows="4" name="description"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Écrire une description de la boutique ici">{{ old('description') }}</textarea>
                            @error('description')
                                <div class="text-red-500 text-sm">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Champ d'upload d'image -->
                        <div class="col-span-2">
                            <label for="image" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Image de la boutique
                            </label>
                            <input type="file" name="image" id="image" accept="image/*"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                onchange="previewImage(event)">
                            @error('image')
                                <div class="text-red-500 text-sm">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Zone pour afficher la prévisualisation de l'image -->
                        <div class="col-span-2 mt-4">
                            <label for="preview" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Prévisualisation de l'image
                            </label>
                            <img id="preview" src="" alt="Prévisualisation de l'image"
                                class="w-full h-auto hidden">
                        </div>
                    </div>


                    <button type="submit"
                        class="text-white inline-flex items-center bg-[#e38407] hover:bg-[#e38407] focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                clip-rule="evenodd"></path>
                        </svg>
                        Ajouter
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Main modal -->
    <div id="search-activities" data-modal-backdrop="static" tabindex="-1" aria-hidden="true"
        class="hidden overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full transition-opacity duration-300 ease-in-out">
        <div class="relative p-4 w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700" style="max-height: 80vh; overflow: hidden;">
                <!-- Modal header -->
                <div class="sticky top-0 bg-white dark:bg-gray-700 z-10 border-b dark:border-gray-600">
                    <div class="flex items-center justify-between p-4 md:p-5">
                        <input type="search" id="search"
                            class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-200 focus:border-orange-500 focus:ring-2 focus:ring-orange-200 dark:focus:ring-orange-900 dark:placeholder-gray-400"
                            placeholder="Rechercher des Activites ..." required aria-label="Rechercher des Activités" />
                        <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-hide="search-activities" aria-label="Fermer le modal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5 space-y-4 relative overflow-y-auto" id="resultsContainer"
                    style="max-height: calc(80vh - 100px);">
                    <p class="text-gray-500">Chargement des résultats...</p>
                    <!-- Indication de chargement -->
                </div>
            </div>
        </div>
    </div>
@endsection

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    @if ($shops->isEmpty())
        <p class="col-span-full text-center text-gray-500">Vous n'avez pas encore de boutique.</p>
    @else
        @foreach ($shops as $key => $shop)
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg overflow-hidden">
                <!-- Image de Profil -->
                <img src="{{ asset($shop->image) ?? asset('images/default-shop.png') }}"
                    alt="Photo de {{ $shop->name }}" class="w-full h-40 object-cover">

                <div class="p-4">
                    <!-- Nom et Adresse -->
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white flex items-center gap-2">
                        {{ $shop->name }}
                    </h3>
                    <p class="text-sm text-gray-500 dark:text-gray-400 flex items-center gap-2 mt-1">
                        <svg class="w-5 h-5 text-[#e38407]" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M12 2C8.13 2 5 5.13 5 9c0 5 7 13 7 13s7-8 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5S10.62 6.5 12 6.5s2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z" />
                        </svg>
                        {{ $shop->address }}
                    </p>

                    <!-- Description -->
                    <p class="mt-2 text-sm text-gray-700 dark:text-gray-300">
                        {{ Str::limit($shop->description, 100) }}
                    </p>

                    <!-- Actions -->
                    <div class="flex items-center justify-between mt-4">
                        <a href="{{ route('seller.shops.products.index', $shop->_id) }}"
                            class="px-3 py-1 text-white text-sm rounded-lg bg-[#e38407] hover:bg-[#c36d06] transition flex items-center gap-1">
                            <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M3 3h18v2H3V3zm0 14h18v2H3v-2zm0-7h18v2H3V10z" />
                            </svg>
                            Produits
                        </a>

                        <div class="relative">
                            <button id="dropdownMenuIconButton{{ $key }}"
                                data-dropdown-toggle="dropdownDots{{ $key }}"
                                class="p-2 rounded-full bg-gray-100 dark:bg-gray-700 hover:bg-gray-200 dark:hover:bg-gray-600 transition">
                                <svg class="w-6 h-6 text-gray-700 dark:text-white" fill="currentColor"
                                    viewBox="0 0 4 15">
                                    <path
                                        d="M3.5 1.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 6.041a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 5.959a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z" />
                                </svg>
                            </button>
                            <div id="dropdownDots{{ $key }}"
                                class="hidden absolute right-0 mt-2 w-40 bg-white dark:bg-gray-700 shadow-md rounded-lg">
                                <a href="{{ route('shops.edit', $shop->_id) }}"
                                    class="flex items-center gap-2 px-4 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-600">
                                    <svg class="w-5 h-5 text-[#e38407]" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M14.06 9l1.41 1.41L5.41 20H4v-1.41L14.06 9M16.37 4.63a1 1 0 0 1 1.41 0l2.59 2.59a1 1 0 0 1 0 1.41l-1.17 1.17-4-4 1.17-1.17z" />
                                    </svg>
                                    Modifier
                                </a>
                                <form action="{{ route('shops.destroy', $shop->_id) }}" method="POST"
                                    class="delete-form">
                                    @csrf
                                    @method('delete')
                                    <button type="submit"
                                        class="flex items-center gap-2 w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-gray-100 dark:hover:bg-gray-600">
                                        <svg class="w-5 h-5 text-red-600" fill="currentColor" viewBox="0 0 24 24">
                                            <path
                                                d="M6 19a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V7H6v12zM19 4h-3.5l-1-1h-5l-1 1H5v2h14V4z" />
                                        </svg>
                                        Supprimer
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endif
</div>

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://unpkg.com/@geoapify/geocoder-autocomplete@^1/dist/index.min.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const autocomplete = new autocomplete.GeocoderAutocomplete(
                document.getElementById("autocomplete"),
                "YOUR_GEOAPIFY_API_KEY", // Remplace par ta clé API Geoapify
                {
                    placeholder: "Adresse de la boutique",
                    countryCodes: ["FR", "BE"]
                }
            );

            autocomplete.on('select', (location) => {
                if (location) {
                    document.getElementById("address").value = location.properties.formatted;
                    document.getElementById("latitude").value = location.properties.lat;
                    document.getElementById("longitude").value = location.properties.lon;
                }
            });
        });
    </script>


    <script>
        if (document.getElementById("search-table") && typeof simpleDatatables.DataTable !== 'undefined') {
            const dataTable = new simpleDatatables.DataTable("#search-table", {
                searchable: true,
                sortable: false
            });
        }
    </script>

    <script>
        function previewImage(event) {
            const preview = document.getElementById('preview');
            const file = event.target.files[0];

            if (file) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.classList.remove('hidden'); // Affiche l'image
                };

                reader.readAsDataURL(file);
            }
        }
    </script>

    <script>
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
        document.querySelectorAll('.delete-form').forEach(form => {
            form.addEventListener('submit', function(e) {
                e.preventDefault(); // Empêche l'envoi du formulaire
                const form = this; // Référence au formulaire

                Swal.fire({
                    title: 'Êtes-vous sûr ?',
                    text: "Vous ne pourrez pas revenir en arrière !",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Oui, supprimer !',
                    cancelButtonText: 'Annuler'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit(); // Soumet le formulaire si l'utilisateur confirme
                    }
                });
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            var typingTimer;
            var doneTypingInterval = 500;

            $('#search').on('keyup', function() {
                clearTimeout(typingTimer);
                typingTimer = setTimeout(searchActivites);

            });

            $('#search').on('keydown', function() {
                clearTimeout(typingTimer);
            });

            function searchActivites() {
                var formData = $('#search').serialize();
                var searchInput = $('#search').val()
                    .trim();

                if (searchInput === '') {

                    $('#resultsContainer').html('<p>Veuillez entrer un terme de recherche.</p>');
                    return;
                }
                if (searchInput.length < 3) {

                    $('#resultsContainer').html('<p>Veuillez entrer au moins 3 caractères.</p>');
                    return;
                }

                $.ajax({
                    url: "{{ route('shop.search') }}",
                    method: 'GET',
                    data: {
                        search: searchInput
                    },
                    success: function(response) {
                        var resultsContainer = $('#resultsContainer');
                        resultsContainer.html('');

                        if (response.length == 0) {
                            resultsContainer.html(
                                '<p class=" text-red-500">Aucun résultat trouvé.</p>');
                        } else {
                            var htmlContent = '';

                            let host = window.location.origin;


                            response.forEach(function(activite) {
                                htmlContent += `
                <div class="mb-3 transform transition-all hover:scale-[1.01]">
                    <a href="${host}/seller/shops/${activite._id}/products"
                    class="flex items-center p-4 bg-white dark:bg-gray-800 rounded-lg shadow hover:shadow-md transition-all">

                        <!-- Image -->
                        <div class="flex-shrink-0 h-16 w-16 rounded-lg overflow-hidden">
                            <img src="${host}/${activite.image || `${host}/img/placeholder-event.webp`}"
                                alt="${activite.name}"
                                class="h-full w-full object-cover">
                        </div>

                        <!-- Content -->
                        <div class="ml-4 flex-grow">
                            <div class="flex items-center justify-between">
                                <h3 class="text-lg font-semibold text-gray-800 dark:text-white">
                                    ${activite.name}
                                </h3>

                            </div>

                            <div class="mt-2 flex items-center text-sm text-gray-500 dark:text-gray-400">
                                <div class="flex items-center mr-4">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    ${new Date(activite.created_at).toLocaleDateString('fr-FR', {
                                        day: 'numeric',
                                        month: 'short',
                                        year: 'numeric'
                                    })}
                                </div>

                                <div class="flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                    ${activite.is_active || 'Lieu non spécifié'}
                                </div>
                            </div>
                        </div>

                        <!-- Arrow -->
                        <div class="ml-4 flex-shrink-0">
                            <svg class="w-6 h-6 text-gray-400 transition-transform group-hover:translate-x-1"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7" />
                            </svg>
                        </div>
                    </a>
                </div>
            `;
                            });
                            resultsContainer.html(htmlContent);
                        }
                    },
                    error: function(xhr) {
                        console.error('Erreur de la requête AJAX', xhr);
                    }
                });
            }
        });

        function openModal() {
            const modal = document.getElementById('search-activities').classList.remove('hidden')
            const inputField = document.getElementById('search').focus()
        }
    </script>
@endsection
@endsection

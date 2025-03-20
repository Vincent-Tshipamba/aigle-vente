@extends('seller.layouts.app')

@section('content')


    <style>
        /*@apply bg-white text-blue-400 rounded-full;*/
        .active {
            background: white;
            border-radius: 4px;
            color: #e38407;
        }
    </style>

    <div class="bg-white dark:bg-gray-800  shadow-lg transition-all duration-300">
        <div class="p-6 space-y-4">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                <div class="space-y-1">
                    <div class="flex items-center gap-3">
                        <div class="p-2 bg-orange-100 dark:bg-orange-900/30 rounded-lg">
                            <svg class="w-6 h-6 text-[#e38407] dark:text-orange-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                            </svg>
                        </div>
                        <h2 class="text-2xl font-bold text-gray-800 dark:text-white">Product {{ $shop->name }} </h2>
                    </div>
                    <p class="text-sm text-gray-600 dark:text-gray-400">
                        Gérez vos Produits, créez, modifiez et exportez facilement.
                    </p>
                </div>
            </div>
            <!-- Header Section -->
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                <div>
                    <!-- View Toggle -->
                    <div class="inline-flex rounded-lg shadow-sm bg-gray-100 dark:bg-gray-700 p-1">
                        <button id="gridViewBtn"
                            class="inline-flex items-center px-3 py-2 text-sm font-medium rounded-md transition-all duration-200   text-gray-800 dark:text-white active">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                            </svg>
                            Grille
                        </button>
                        <button id="listViewBtn"
                            class="inline-flex items-center px-3 py-2 text-sm font-medium rounded-md transition-all duration-200 text-gray-600 dark:text-gray-300 hover:bg-white dark:hover:bg-gray-600">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                            Liste
                        </button>
                    </div>
                </div>

                <!-- Actions Section -->
                <div class="flex flex-wrap items-center gap-3">


                    <!-- Search Bar -->
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

                @section('modal')
                    <!-- Main modal -->
                    <div id="search-activities" data-modal-backdrop="static" tabindex="-1" aria-hidden="true"
                        class="hidden overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full transition-opacity duration-300 ease-in-out">
                        <div class="relative p-4 w-full max-w-2xl max-h-full">
                            <!-- Modal content -->
                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700"
                                style="max-height: 80vh; overflow: hidden;">
                                <!-- Modal header -->
                                <div class="sticky top-0 bg-white dark:bg-gray-700 z-10 border-b dark:border-gray-600">
                                    <div class="flex items-center justify-between p-4 md:p-5">
                                        <input type="search" id="search"
                                            class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-200 focus:border-orange-500 focus:ring-2 focus:ring-orange-200 dark:focus:ring-orange-900 dark:placeholder-gray-400"
                                            placeholder="Rechercher des Activites ..." required
                                            aria-label="Rechercher des Activités" />
                                        <button type="button"
                                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                            data-modal-hide="search-activities" aria-label="Fermer le modal">
                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 14 14">
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

                <!-- Export Dropdown -->
                <div class="relative inline-block">
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
                </div>

                <!-- Create Activity Button -->
                <a href="{{ route('seller.shops.products.create', $shop->_id) }}"
                    class="inline-flex items-center px-4 py-2 text-sm font-medium rounded-lg bg-[#e38407] text-white hover:bg-orange-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500 transition-all duration-200">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg>
                    Créer un Produits
                </a>
            </div>
        </div>
    </div>
</div>

<div id="listView" class="hidden w-full rounded-lg shadow-md overflow-hidden">
    <div class="overflow-x-auto">
        <table id="" class="w-full whitespace-nowrap">
            <thead>
                <tr class="bg-gray-50 dark:bg-gray-700 border-b dark:border-gray-600">
                    <th class="group px-6 py-3 text-left">
                        <div class="flex items-center gap-2">
                            <span
                                class="text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-wider">N°</span>
                            <svg class="w-4 h-4 text-gray-400 opacity-0 group-hover:opacity-100 transition-opacity"
                                viewBox="0 0 20 20" fill="currentColor">
                                <path d="M5 12l5-5 5 5H5z" />
                            </svg>
                        </div>
                    </th>
                    <th class="group px-6 py-3 text-left">
                        <div class="flex items-center gap-2">
                            <span
                                class="text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-wider">Titre</span>
                            <svg class="w-4 h-4 text-gray-400 opacity-0 group-hover:opacity-100 transition-opacity"
                                viewBox="0 0 20 20" fill="currentColor">
                                <path d="M5 12l5-5 5 5H5z" />
                            </svg>
                        </div>
                    </th>
                    <th class="group px-6 py-3 text-left">
                        <div class="flex items-center gap-2">
                            <span
                                class="text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-wider">Catégorie</span>
                        </div>
                    </th>
                    <th class="group px-6 py-3 text-left">
                        <div class="flex items-center gap-2">
                            <span
                                class="text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-wider">Date</span>
                        </div>
                    </th>
                    <th class="group px-6 py-3 text-left">
                        <div class="flex items-center gap-2">
                            <span
                                class="text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-wider">Status</span>
                        </div>
                    </th>
                    <th class="px-6 py-3 text-left">
                        <span
                            class="text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-wider">Actions</span>
                    </th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 dark:divide-gray-700 bg-white dark:bg-gray-800">

            </tbody>
        </table>
    </div>

    @if ($products->hasPages())
        <div class="mt-6 p-4">
            {{ $products->links() }}
        </div>
    @endif
</div>

<div id="gridView" class="w-full rounded-lg shadow-md overflow-hidden p-4">
    <div id="grid" class="w-full grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 xl:grid-cols-5 gap-6 mt-8 ">

    </div>
</div>

@if ($products->hasPages())
    <div class="mt-6">
        {{ $products->links() }}
    </div>
@endif


@section('script')
    <script src="https://code.jquery.com/jquery-3.7.1.slim.min.js"
        integrity="sha256-kmHvs0B+OpCW5GVHUNjv9rOmY0IvSIRcf7zGUDTDQM8=" crossorigin="anonymous"></script>

    <script>
        let host = window.location.origin;
        document.addEventListener("DOMContentLoaded", () => {
            loadProducts();
            document.querySelectorAll(".filter-checkbox").forEach(checkbox => {
                checkbox.addEventListener("change", () => {
                    applyFilters();
                });
            });
        });

        function applyFilters() {
            let params = new URLSearchParams();
            document.querySelectorAll(".filter-checkbox:checked").forEach(checkbox => {
                params.append(checkbox.value, "1");
            });

            loadProducts(params.toString());
        }

        function loadProducts(queryString = "") {
            let url = "{{ route('products.fetch',$shop->_id) }}";
            if (queryString) {
                url += "?" + queryString;
            }

            fetch(url)
                .then(response => response.json())
                .then(data => {
                    let tbody = document.querySelector("#listView tbody");
                    let gridview = document.querySelector("#gridView #grid");
                    tbody.innerHTML = "";
                    gridview.innerHTML = "";

                    data.products.data.forEach(product => {
                        let row = `
                <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                    <td class="px-6 py-4">${product.id}</td>
                    <td class="px-6 py-4">${product.name}</td>
                    <td class="px-6 py-4">${product.category_product?.name ?? "N/A"}</td>
                    <td class="px-6 py-4">${new Date(product.created_at).toLocaleDateString()}</td>
                    <td class="px-6 py-4">${product.is_active ? '<span class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-sm dark:bg-green-900 dark:text-green-300">Publier</span>' : '<span class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-sm dark:bg-red-900 dark:text-red-300">Non Publier</span>'}</td>
                    <td class="px-6 py-4">
                       <button id="dropdownMenuIconHorizontalButton" data-dropdown-toggle="dropdownDotsHorizontal${product.id}" class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-900 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none dark:text-white focus:ring-gray-50 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-600" type="button">
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 3">
                            <path d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z"/>
                        </svg>
                        </button>

                        <!-- Dropdown menu -->
                        <div id="dropdownDotsHorizontal${product.id}" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow-sm w-44 dark:bg-gray-700 dark:divide-gray-600">
                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownMenuIconHorizontalButton">
                            <li>
                                <a href="${host}/seller/shops/product/${product._id}/detail" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Voir</a>
                            </li>
                            <li>
                                <a href="${host}/shops/${product.shop._id}/products/${product._id}/edit" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Mofifier</a>
                            </li>
                             <li>

                                 <form action="${host}/products/${product.id}/toggle-status" method="POST">
                                    @csrf
                                    <button type="submit" class="block w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600  text-left  ${product.is_active ? 'text-red-500' : 'text-green-500'} rounded"">
                                         ${product.is_active ? 'Désactiver' : 'Activer'}
                                    </button>
                                </form>
                            </li>
                            <li>
                                <a href="${host}/stocks/${product._id}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Eventaire</a>
                            </li>
                            </ul>

                            <div class="py-2">
                                <form action="${host}/seller/shops/${product.id}" method="POST" onsubmit="return confirm('Voulez-vous vraiment supprimer ce produit ?')">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="block text-left w-full px-4 py-2 text-sm text-red hover:bg-gray-100 dark:hover:bg-gray-600  dark:hover:text-white">
                                        Supprimer
                                    </button>
                                </form>
                            </div>
                        </div>
                    </td>
                </tr>`;
                        tbody.innerHTML += row;
                        let firstImage = product.photos.length > 0 ? product.photos[0].image :
                            "products_media/images.jpg";
                        console.log(firstImage);

                        let gridItem = `
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden hover:scale-110">
                    <a href="${host}/seller/shops/product/${product._id}/detail" class="block">
                        <div class="relative">
                            <img src="${host}/${firstImage}" alt="${product.name}" class="w-full h-48 object-cover">
                            <div class="absolute top-0 right-0 m-2">
                                <span class="px-2 py-1 text-xs font-semibold text-white bg-orange-500 rounded-full">
                                    ${product.category_product?.name ?? "N/A"}
                                </span>
                            </div>
                        </div>
                        <div class="p-4">
                            <h3 class="text-lg font-semibold text-gray-800 dark:text-white mb-2 line-clamp-2">
                                ${product.name}
                            </h3>
                            <div class="flex items-center justify-between mt-3">
                                <span class="text-sm text-gray-500 dark:text-gray-400">
                                    <i class="far fa-calendar mr-1"></i>
                                    ${new Date(product.created_at).toLocaleDateString()}
                                </span>
                            </div>
                            <div class="flex items-center justify-between mt-4">
                                ${product.is_active ? '<span class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-sm dark:bg-green-900 dark:text-green-300">Publier</span>' : '<span class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-sm dark:bg-red-900 dark:text-red-300">Non Publier</span>'}
                            </div>
                        </div>
                    </a>
                </div>`;

                        gridview.innerHTML += gridItem;
                    });
                })
                .catch(error => console.error("Erreur de chargement :", error));
        }
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
        document.addEventListener("DOMContentLoaded", () => {
            const gridViewBtn = document.getElementById("gridViewBtn");
            const listViewBtn = document.getElementById("listViewBtn");
            const gridView = document.getElementById("gridView");
            const listView = document.getElementById("listView");

            gridViewBtn.addEventListener("click", () => {
                gridView.classList.remove("hidden");
                listView.classList.add("hidden");
                gridViewBtn.classList.add("active");
                listViewBtn.classList.remove("active");
            });

            listViewBtn.addEventListener("click", () => {
                listView.classList.remove("hidden");
                gridView.classList.add("hidden");
                listViewBtn.classList.add("active");
                gridViewBtn.classList.remove("active");
            });
        });


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
                timer: 3000,
                showConfirmButton: false,
                timerProgressBar: true,
            });
        @endif
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
                    url: "{{ route('product.search') }}",
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
                    <a href="${host}/seller/shops/product/${activite._id}/detail"
                    class="flex items-center p-4 bg-white dark:bg-gray-800 rounded-lg shadow hover:shadow-md transition-all">

                        <!-- Image -->
                        <div class="flex-shrink-0 h-16 w-16 rounded-lg overflow-hidden">
                            <img src="${activite.thumbnail_url || `${host}/img/placeholder-event.webp`}"
                                alt="${activite.name}"
                                class="h-full w-full object-cover">
                        </div>

                        <!-- Content -->
                        <div class="ml-4 flex-grow">
                            <div class="flex items-center justify-between">
                                <h3 class="text-lg font-semibold text-gray-800 dark:text-white">
                                    ${activite.name}
                                </h3>
                                <span class="px-2 py-1 text-xs font-medium text-orange-700 bg-orange-100 rounded-full dark:bg-orange-900 dark:text-orange-300">
                                    ${activite.category_product?.name || 'Non catégorisé'}
                                </span>
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



        document.addEventListener("DOMContentLoaded", () => {
            const gridViewBtn = document.getElementById("gridViewBtn");
            const listViewBtn = document.getElementById("listViewBtn");
            const gridView = document.getElementById("gridView");
            const listView = document.getElementById("listView");

            // Fonction pour changer la vue
            function switchView(view) {
                if (view === 'grid') {
                    gridView.classList.remove("hidden");
                    listView.classList.add("hidden");
                    gridViewBtn.classList.add("active");
                    listViewBtn.classList.remove("active");
                    localStorage.setItem('selectedView', 'grid');
                } else {
                    listView.classList.remove("hidden");
                    gridView.classList.add("hidden");
                    listViewBtn.classList.add("active");
                    gridViewBtn.classList.remove("active");
                    localStorage.setItem('selectedView', 'list');
                }
            }

            // Restaurer la vue précédemment sélectionnée
            const savedView = localStorage.getItem('selectedView') || 'grid';
            switchView(savedView);

            // Gestionnaires d'événements pour les boutons
            gridViewBtn.addEventListener("click", () => switchView('grid'));
            listViewBtn.addEventListener("click", () => switchView('list'));
        });
    </script>
@endsection





@endsection

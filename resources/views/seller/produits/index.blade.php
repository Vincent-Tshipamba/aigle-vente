@extends('seller.layouts.app')

@section('content')



    {{-- <ul class="flex flex-wrap text-sm font-medium text-center text-gray-500 dark:text-gray-400">
        <li class="me-2">
            <a href="#" class="inline-block px-4 py-3 text-white bg-blue-600 rounded-lg active" aria-current="page">Tab
                1</a>
        </li>
        <li class="me-2">
            <a href="#"
                class="inline-block px-4 py-3 rounded-lg hover:text-gray-900 hover:bg-gray-100 dark:hover:bg-gray-800 dark:hover:text-white">Tab
                2</a>
        </li>
        <li class="me-2">
            <a href="#"
                class="inline-block px-4 py-3 rounded-lg hover:text-gray-900 hover:bg-gray-100 dark:hover:bg-gray-800 dark:hover:text-white">Tab
                3</a>
        </li>
        <li class="me-2">
            <a href="#"
                class="inline-block px-4 py-3 rounded-lg hover:text-gray-900 hover:bg-gray-100 dark:hover:bg-gray-800 dark:hover:text-white">Tab
                4</a>
        </li>
        <li>
            <a class="inline-block px-4 py-3 text-gray-400 cursor-not-allowed dark:text-gray-500">Tab 5</a>
        </li>
    </ul> --}}

    <style>
        /*@apply bg-white text-blue-400 rounded-full;*/
        .active {
            background: white;
            border-radius: 9999px;
            color: #e38407;
        }
    </style>

    <div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
        <h2 class="text-title-md2 font-bold text-black dark:text-white">
            Details
        </h2>

        <nav>
            <ol class="flex items-center gap-2">
                <li>
                    <a class="font-medium" href="{{ route('seller.shops.products.index', $shop->_id) }}">Produits
                        /</a>
                </li>
                <li class="text-primary">Detail</li>
            </ol>
        </nav>
    </div>

    <div class="">
        <h1 class="text-2xl font-bold mb-4">Nos Produits</h1>
        <!-- Bascule entre la vue grille et liste -->
        <div class="my-12 flex flex-wrap justify-between items-center">
            <div>
                <a class="flex gap-2 items-center text-white bg-[#e38407] hover:bg-[#E38407EE]  focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:[#E38407EE] dark:hover:[#e38407] dark:focus:[#e38407]"
                    href="{{ route('seller.shops.products.create', $shop->_id) }}">
                    <svg class="" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 7.757v8.486M7.757 12h8.486M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>

                    Ajoute un Produits

                </a>
            </div>
            <div
                class="bg-gray-200 dark:bg-gray-600 text-sm text-gray-500 dark:text-gray-200 leading-none border-2 border-gray-200 dark:border-gray-800 rounded-full inline-flex mt-4 ">
                <button
                    class="inline-flex items-center transition-colors duration-800 ease-in focus:outline-none hover:text-[#e38407] focus:text-[#e38407] rounded-l-full py-4 px-10  active"
                    id="gridViewBtn">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="fill-current w-4 h-4 mr-2">
                        <rect x="3" y="3" width="7" height="7"></rect>
                        <rect x="14" y="3" width="7" height="7"></rect>
                        <rect x="14" y="14" width="7" height="7"></rect>
                        <rect x="3" y="14" width="7" height="7"></rect>
                    </svg>
                    <span>Grid</span>
                </button>
                <button
                    class="inline-flex items-center transition-colors duration-800 ease-in focus:outline-none hover:text-[#e38407] focus:text-[#e38407] rounded-r-full px-10  py-4"
                    id="listViewBtn">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="fill-current w-4 h-4 mr-2">
                        <line x1="8" y1="6" x2="21" y2="6"></line>
                        <line x1="8" y1="12" x2="21" y2="12"></line>
                        <line x1="8" y1="18" x2="21" y2="18"></line>
                        <line x1="3" y1="6" x2="3.01" y2="6"></line>
                        <line x1="3" y1="12" x2="3.01" y2="12"></line>
                        <line x1="3" y1="18" x2="3.01" y2="18"></line>
                    </svg>
                    <span>List</span>
                </button>
            </div>
        </div>

        <!-- Vue Grille -->
        <div id="gridView">
            <div
                class="w-full  grid grid-cols-1 lg:grid-cols-3 md:grid-cols-2 justify-items-center justify-center gap-y-20 gap-x-14 mt-10 mb-5">
                @if (empty($products))
                    <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                        role="alert">
                        <span class="font-medium">Aucune produit disponible.</span> Change a few things up and try
                        submitting again.
                    </div>
                @else
                    @foreach ($products as $product)
                        @php
                            $firstPhoto = $product->photos->first();
                        @endphp

                        <!--   ✅ Product card 1 - Starts Here 👇 -->
                        <div class="w-72 bg-white shadow-md rounded-xl duration-500 hover:scale-105 hover:shadow-xl">
                            <a href="{{ route('seller.shops.products.show', $product->_id) }}">
                                @if ($firstPhoto)
                                    <img src="{{ asset($firstPhoto->image) }}" alt="{{ $product->name }}"
                                        class="h-80 w-72 object-cover rounded-t-xl" />
                                @else
                                    <p>Aucune image disponible pour ce produit.</p>
                                @endif

                                <div class="px-4 py-3 w-72">
                                    <span
                                        class="text-gray-400 mr-3 uppercase text-xs">{{ $product->category_product->name }}</span>
                                    <p class="text-lg font-bold text-black truncate block capitalize">{{ $product->name }}
                                    </p>
                                    <div class="flex items-center">
                                        <p class="text-lg font-semibold text-black cursor-auto my-3">
                                            ${{ $product->unit_price }} </p>
                                        <del>
                                            <p class="text-sm text-gray-600 cursor-auto ml-2">$199</p>
                                        </del>
                                        <a href="{{ route('seller.shops.products.edit', ['shop' => $shop->_id, 'product' => $product->_id]) }}"
                                            class="ml-auto"><svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                height="20" fill="currentColor" class="bi bi-bag-plus"
                                                viewBox="0 0 16 16">
                                                <path fill-rule="evenodd"
                                                    d="M8 7.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V12a.5.5 0 0 1-1 0v-1.5H6a.5.5 0 0 1 0-1h1.5V8a.5.5 0 0 1 .5-.5z" />
                                                <path
                                                    d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z" />
                                            </svg></a>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <!--   🛑 Product card 1 - Ends Here  -->
                    @endforeach
                    <div class="mt-4">
                        {{ $products->links() }}
                    </div>
                @endif



                <!-- Pagination -->

            </div>

        </div>

        <!-- Vue Liste -->
        <div id="listView" class="hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400" id="search-table">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="p-4">
                                <div class="flex items-center">
                                    <input id="checkbox-all" type="checkbox"
                                        class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="checkbox-all" class="sr-only">checkbox</label>
                                </div>
                            </th>
                            <th scope="col" class="px-4 py-3">Image</th>
                            <th scope="col" class="px-4 py-3">Produits</th>
                            <th scope="col" class="px-4 py-3">Stock</th>
                            <th scope="col" class="px-4 py-3">Prix</th>
                            {{-- <th scope="col" class="px-4 py-3">Sales/Month</th>
                            <th scope="col" class="px-4 py-3">Rating</th>
                            <th scope="col" class="px-4 py-3">Sales</th>
                            <th scope="col" class="px-4 py-3">Revenue</th> --}}
                            <th scope="col" class="px-4 py-3">Last Update</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (empty($products))
                        @else
                            @foreach ($products as $i => $product)
                                <tr class="border-b dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700">
                                    <td class="w-4 px-4 py-3">
                                        <div class="flex items-center">
                                            <input id="checkbox-table-search-1" type="checkbox"
                                                onclick="event.stopPropagation()"
                                                class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                            <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                                        </div>
                                    </td>
                                    <th scope="row"
                                        class="flex items-center px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        @php
                                            $firstPhoto = $product->photos->first();
                                        @endphp

                                        @if ($firstPhoto)
                                            <img loading="lazy" src="{{ asset($firstPhoto->image) }}"
                                                alt="Image de {{ $product->name }}" class="w-auto h-8 mr-3">
                                        @else
                                            <p>Aucune image disponible pour ce produit.</p>
                                        @endif


                                    </th>
                                    <td class="px-4 py-2">
                                        <span
                                            class="bg-primary-100 text-primary-800 text-xs font-medium px-2 py-0.5 rounded dark:bg-primary-900 dark:text-primary-300">{{ substr($product->name, 0, 50) }} ....</span>
                                    </td>
                                    <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        <div class="flex items-center">
                                            @if (empty($product->stocks->quantity))
                                                <div class="inline-block w-4 h-4 mr-2 bg-red-700 rounded-full">
                                                </div>
                                            @else
                                                <div class="inline-block w-4 h-4 mr-2 bg-green-800 rounded-full">
                                                </div>
                                            @endif


                                        </div>
                                    </td>
                                    <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $product->unit_price }}</td>
                                    {{-- <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        0.47</td>
                                    <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        <div class="flex items-center">
                                            <svg aria-hidden="true" class="w-5 h-5 text-yellow-400" fill="currentColor"
                                                viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                            </svg>
                                            <svg aria-hidden="true" class="w-5 h-5 text-yellow-400" fill="currentColor"
                                                viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                            </svg>
                                            <svg aria-hidden="true" class="w-5 h-5 text-yellow-400" fill="currentColor"
                                                viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                            </svg>
                                            <svg aria-hidden="true" class="w-5 h-5 text-yellow-400" fill="currentColor"
                                                viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                            </svg>
                                            <svg aria-hidden="true" class="w-5 h-5 text-yellow-400" fill="currentColor"
                                                viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                            </svg>
                                            <span class="ml-1 text-gray-500 dark:text-gray-400">5.0</span>
                                        </div>
                                    </td>
                                    <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        <div class="flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 24 24"
                                                fill="currentColor" class="w-5 h-5 mr-2 text-gray-400"
                                                aria-hidden="true">
                                                <path
                                                    d="M2.25 2.25a.75.75 0 000 1.5h1.386c.17 0 .318.114.362.278l2.558 9.592a3.752 3.752 0 00-2.806 3.63c0 .414.336.75.75.75h15.75a.75.75 0 000-1.5H5.378A2.25 2.25 0 017.5 15h11.218a.75.75 0 00.674-.421 60.358 60.358 0 002.96-7.228.75.75 0 00-.525-.965A60.864 60.864 0 005.68 4.509l-.232-.867A1.875 1.875 0 003.636 2.25H2.25zM3.75 20.25a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0zM16.5 20.25a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0z" />
                                            </svg>
                                            1.6M
                                        </div>
                                    </td>
                                    <td class="px-4 py-2">$3.2M</td> --}}
                                    <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        <button id="dropdownMenuIconButton"
                                            data-dropdown-toggle="dropdownDots{{ $i }}"
                                            class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-900 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none dark:text-white focus:ring-gray-50 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                                            type="button">
                                            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                fill="currentColor" viewBox="0 0 4 15">
                                                <path
                                                    d="M3.5 1.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 6.041a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 5.959a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z" />
                                            </svg>
                                        </button>

                                        <!-- Dropdown menu -->
                                        <div id="dropdownDots{{ $i }}"
                                            class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                                                aria-labelledby="dropdownMenuIconButton">
                                                <li>
                                                    <a href="{{ route('seller.shops.products.show', $product->_id) }}"
                                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Produits</a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('stocks.edit', $product->_id) }}"
                                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Mouvement
                                                        de stock</a>
                                                </li>
                                                <li>
                                                    <a href="#"
                                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Modifier
                                                        Produits</a>
                                                </li>
                                            </ul>
                                            <div class="py-2">
                                                <form action="{{ route('seller.shops.products.destroy', $product->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <input type="submit" value="supprimer"
                                                        class="block px-4 py-2 w-full text-left text-sm text-red-600 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @endif

                    </tbody>
                </table>
            </div>

        </div>



    </div>

    @if (empty($product))
    @else
    @endif



@section('script')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const imageInput = document.getElementById('images');
            const previewContainer = document.getElementById('image-preview');

            // Vérifiez si les éléments existent
            if (!imageInput || !previewContainer) {
                console.error("L'élément #images ou #image-preview est manquant dans le DOM.");
                return;
            }

            imageInput.addEventListener('change', function(event) {
                const files = event.target.files;
                previewContainer.innerHTML = ''; // Efface les aperçus existants

                Array.from(files).forEach((file, index) => {
                    const fileReader = new FileReader();

                    fileReader.onload = function(e) {
                        const previewDiv = document.createElement('div');
                        previewDiv.classList.add('relative', 'w-24', 'h-24', 'border',
                            'rounded', 'overflow-hidden');

                        const img = document.createElement('img');
                        img.src = e.target.result;
                        img.alt = 'Selected Image';
                        img.classList.add('object-cover', 'w-full', 'h-full');

                        const closeButton = document.createElement('button');
                        closeButton.innerHTML = '&times;';
                        closeButton.classList.add('absolute', 'top-0', 'right-0', 'text-white',
                            'bg-black', 'rounded-full', 'w-6', 'h-6', 'flex',
                            'items-center', 'justify-center');
                        closeButton.style.cursor = 'pointer';

                        closeButton.onclick = () => {
                            previewDiv.remove();
                            removeImage(index);
                        };

                        previewDiv.appendChild(img);
                        previewDiv.appendChild(closeButton);
                        previewContainer.appendChild(previewDiv);
                    };

                    fileReader.readAsDataURL(file);
                });
            });

            function removeImage(index) {
                const dataTransfer = new DataTransfer();

                Array.from(imageInput.files).forEach((file, i) => {
                    if (i !== index) dataTransfer.items.add(file);
                });

                imageInput.files = dataTransfer.files;
            }
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
@endsection





@endsection

@extends('seller.layouts.app')

@section('content')

    <!-- Modal toggle -->



    <div class=" mt-4">
        <h1 class="text-2xl font-bold mb-4">Nos Produits</h1>
        <!-- Bascule entre la vue grille et liste -->
        <div class="flex justify-between md:justify-end mb-4">
            <a class="block text-white bg-[#e38407] hover:bg-[#E38407EE]  focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:[#E38407EE] dark:hover:[#e38407] dark:focus:[#e38407]"
                href="{{ route('seller.shops.products.create', $shop->_id) }}">
                Ajoute un Produits
            </a>
            <button id="gridViewBtn" class="px-4 py-2 text-black dark:text-gray-100 rounded-lg text-6xl">
                <svg class="" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                    fill="currentColor" viewBox="0 0 24 24">
                    <path fill-rule="evenodd"
                        d="M4.857 3A1.857 1.857 0 0 0 3 4.857v4.286C3 10.169 3.831 11 4.857 11h4.286A1.857 1.857 0 0 0 11 9.143V4.857A1.857 1.857 0 0 0 9.143 3H4.857Zm10 0A1.857 1.857 0 0 0 13 4.857v4.286c0 1.026.831 1.857 1.857 1.857h4.286A1.857 1.857 0 0 0 21 9.143V4.857A1.857 1.857 0 0 0 19.143 3h-4.286Zm-10 10A1.857 1.857 0 0 0 3 14.857v4.286C3 20.169 3.831 21 4.857 21h4.286A1.857 1.857 0 0 0 11 19.143v-4.286A1.857 1.857 0 0 0 9.143 13H4.857Zm10 0A1.857 1.857 0 0 0 13 14.857v4.286c0 1.026.831 1.857 1.857 1.857h4.286A1.857 1.857 0 0 0 21 19.143v-4.286A1.857 1.857 0 0 0 19.143 13h-4.286Z"
                        clip-rule="evenodd" />
                </svg>

            </button>
            <button id="listViewBtn" class="px-4 py-2 text-black dark:text-gray-100 rounded-lg text-6xl">
                <svg class="" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                    fill="currentColor" viewBox="0 0 24 24">
                    <path fill-rule="evenodd"
                        d="M2 6a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V6Zm4.996 2a1 1 0 0 0 0 2h.01a1 1 0 1 0 0-2h-.01ZM11 8a1 1 0 1 0 0 2h6a1 1 0 1 0 0-2h-6Zm-4.004 3a1 1 0 1 0 0 2h.01a1 1 0 1 0 0-2h-.01ZM11 11a1 1 0 1 0 0 2h6a1 1 0 1 0 0-2h-6Zm-4.004 3a1 1 0 1 0 0 2h.01a1 1 0 1 0 0-2h-.01ZM11 14a1 1 0 1 0 0 2h6a1 1 0 1 0 0-2h-6Z"
                        clip-rule="evenodd" />
                </svg>

            </button>
        </div>

        <!-- Vue Grille -->
        <div id="gridView">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                @if (empty($products))
                    <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                        role="alert">
                        <span class="font-medium">Aucune produit disponible.</span> Change a few things up and try
                        submitting again.
                    </div>
                @else
                    @foreach ($products as $product)
                        <div class="bg-white dark:bg-gray-800 p-4 rounded-lg shadow-md">
                            @php
                                $firstPhoto = $product->photos->first();
                            @endphp
                            @if ($firstPhoto)
                                <img src="{{ asset('storage/' . $firstPhoto->image) }}" alt="{{ $product->name }}"
                                    class="w-full h-40 object-cover rounded-md mb-4">
                            @else
                                <p>Aucune image disponible pour ce produit.</p>
                            @endif

                            <h2 class="text-lg font-bold">{{ $product->name }}</h2>
                            <p class="text-gray-600">Prix : {{ $product->unit_price }} USD</p>
                            <p class="text-gray-600">Stock : {{ $product->stocks->quantity ?? 0 }}</p>
                            <a href="{{ route('seller.shops.products.show', $product->_id) }}"
                                class="text-blue-500 mt-2 inline-block">Voir
                                Détails</a>
                        </div>
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
            <div class="">
                <div class="relative overflow-hidden bg-white shadow-md dark:bg-gray-800 sm:rounded-lg">
                    {{-- <div
                        class="flex flex-col px-4 py-3 space-y-3 lg:flex-row lg:items-center lg:justify-between lg:space-y-0 lg:space-x-4">
                        <div class="flex items-center flex-1 space-x-4">
                            <h5>
                                <span class="text-gray-500">All Products:</span>
                                <span class="dark:text-white">123456</span>
                            </h5>
                            <h5>
                                <span class="text-gray-500">Total sales:</span>
                                <span class="dark:text-white">$88.4k</span>
                            </h5>
                        </div>
                        <div
                            class="flex flex-col flex-shrink-0 space-y-3 md:flex-row md:items-center lg:justify-end md:space-y-0 md:space-x-3">
                            <button type="button"
                                class="flex items-center justify-center px-4 py-2 text-sm font-medium text-white rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">
                                <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                    <path clip-rule="evenodd" fill-rule="evenodd"
                                        d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                                </svg>
                                Add new product
                            </button>
                            <button type="button"
                                class="flex items-center justify-center flex-shrink-0 px-3 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg focus:outline-none hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                                <svg class="w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"
                                    fill="none" viewbox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99" />
                                </svg>
                                Update stocks 1/250
                            </button>
                            <button type="button"
                                class="flex items-center justify-center flex-shrink-0 px-3 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg focus:outline-none hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                                <svg class="w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewbox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5" />
                                </svg>
                                Export
                            </button>
                        </div>
                    </div> --}}
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
                                    <th scope="col" class="px-4 py-3">Product</th>
                                    <th scope="col" class="px-4 py-3">Category</th>
                                    <th scope="col" class="px-4 py-3">Stock</th>
                                    <th scope="col" class="px-4 py-3">Sales/Day</th>
                                    <th scope="col" class="px-4 py-3">Sales/Month</th>
                                    <th scope="col" class="px-4 py-3">Rating</th>
                                    <th scope="col" class="px-4 py-3">Sales</th>
                                    <th scope="col" class="px-4 py-3">Revenue</th>
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
                                                    <img src="{{ asset('storage/' . $firstPhoto->image) }}"
                                                        alt="Image de {{ $product->name }}" class="w-auto h-8 mr-3">
                                                @else
                                                    <p>Aucune image disponible pour ce produit.</p>
                                                @endif


                                            </th>
                                            <td class="px-4 py-2">
                                                <span
                                                    class="bg-primary-100 text-primary-800 text-xs font-medium px-2 py-0.5 rounded dark:bg-primary-900 dark:text-primary-300">{{ $product->name }}</span>
                                            </td>
                                            <td
                                                class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
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
                                            <td
                                                class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{ $product->unit_price }}</td>
                                            <td
                                                class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                0.47</td>
                                            <td
                                                class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                <div class="flex items-center">
                                                    <svg aria-hidden="true" class="w-5 h-5 text-yellow-400"
                                                        fill="currentColor" viewbox="0 0 20 20"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                                    </svg>
                                                    <svg aria-hidden="true" class="w-5 h-5 text-yellow-400"
                                                        fill="currentColor" viewbox="0 0 20 20"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                                    </svg>
                                                    <svg aria-hidden="true" class="w-5 h-5 text-yellow-400"
                                                        fill="currentColor" viewbox="0 0 20 20"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                                    </svg>
                                                    <svg aria-hidden="true" class="w-5 h-5 text-yellow-400"
                                                        fill="currentColor" viewbox="0 0 20 20"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                                    </svg>
                                                    <svg aria-hidden="true" class="w-5 h-5 text-yellow-400"
                                                        fill="currentColor" viewbox="0 0 20 20"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                                    </svg>
                                                    <span class="ml-1 text-gray-500 dark:text-gray-400">5.0</span>
                                                </div>
                                            </td>
                                            <td
                                                class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
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
                                            <td class="px-4 py-2">$3.2M</td>
                                            <td
                                                class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                <button id="dropdownMenuIconButton"
                                                    data-dropdown-toggle="dropdownDots{{ $i }}"
                                                    class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-900 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none dark:text-white focus:ring-gray-50 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                                                    type="button">
                                                    <svg class="w-5 h-5" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                        viewBox="0 0 4 15">
                                                        <path
                                                            d="M3.5 1.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 6.041a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 5.959a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z" />
                                                    </svg>
                                                </button>

                                                <!-- Dropdown menu -->

                                            </td>
                                        </tr>
                                    @endforeach
                                @endif

                            </tbody>
                        </table>
                    </div>
                    
                </div>
            </div>

        </div>


    </div>

    @if (empty($product))
    @else
        <div id="dropdownDots{{ $i }}"
            class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownMenuIconButton">
                <li>
                    <a href="{{ route('seller.shops.products.show', $product->_id) }}"
                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Produits</a>
                </li>
                <li>
                    <a href="{{ route('stocks.edit', $product->_id) }}"
                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Settings</a>
                </li>
                <li>
                    <a href="#"
                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Earnings</a>
                </li>
            </ul>
            <div class="py-2">
                <form action="{{ route('seller.shops.products.destroy', $product->id) }}" method="POST">
                    @csrf
                    @method('delete')
                    <input type="submit" value="supprimer"
                        class="block px-4 py-2 text-sm text-red-600 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                </form>
            </div>
        </div>
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
            });

            listViewBtn.addEventListener("click", () => {
                listView.classList.remove("hidden");
                gridView.classList.add("hidden");
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

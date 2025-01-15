<div class="main-content container ab">
    <div class="flex bg-white p-4 justify-between items-center gap-4 px-20">
        <!-- Bouton précédent -->
        <!-- Bouton précédent (masqué sur petits écrans) -->
        <div class="custom-next p-2 bg-gray-100 rounded-full w-8 h-8 hover:bg-gray-200 transition-all duration-300  hover:scale-125 drop-shadow-md sm:block hidden">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-600" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
        </div>

        <!-- Swiper avec grille responsive -->
        <div class="swiper w-full sm:w-auto">
            <div class="swiper-wrapper grid grid-cols-2 sm:grid-cols-4 md:grid-cols-6 gap-4">
                @foreach ($categories as $item)
                    <div class="swiper-slide relative">
                        <a href="#" onclick="document.getElementById('filter-{{$item->id}}').click();" class="flex flex-col items-center text-center space-y-2 hover:scale-105  ">
                            <div class="p-2  rounded-full ">
                                <img src="{{ $item->image }}" alt="{{ $item->name }}"
                                    class="w-8 h-8 max-w-full">
                            </div>
                            <span
                                class="text-xs sm:text-sm font-medium text-gray-500 hover:text-gray-700">{{ $item->name }} <input type="checkbox" id="filter-{{$item->id}}" value="{{ $item->id }}" class="w-5 h-5 text-[#e38407]" /></span>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Bouton suivant -->
        <div
            class="custom-prev p-2 bg-gray-100 rounded-full w-8 h-8 hover:bg-gray-200 transition-all duration-300  hover:scale-125 drop-shadow-md sm:block hidden">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-800" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
        </div>

        <!-- Bouton Filtre avec responsive -->
        <button onclick="showFilters()"
            class="border border-gray-800 bg-white text-gray-600 dark:hover:bg-gray-100 py-2 px-3 text-sm sm:text-base font-normal rounded-lg  items-center hover:bg-gray-200 transition-all duration-300  hover:scale-110 drop-shadow-md sm:flex hidden">
            <svg class="mr-2" width="24" height="24" viewBox="0 0 24 24" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M6 12C7.10457 12 8 11.1046 8 10C8 8.89543 7.10457 8 6 8C4.89543 8 4 8.89543 4 10C4 11.1046 4.89543 12 6 12Z"
                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M6 4V8" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                    stroke-linejoin="round" />
                <path d="M6 12V20" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                    stroke-linejoin="round" />
                <path
                    d="M12 18C13.1046 18 14 17.1046 14 16C14 14.8954 13.1046 14 12 14C10.8954 14 10 14.8954 10 16C10 17.1046 10.8954 18 12 18Z"
                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M12 4V14" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                    stroke-linejoin="round" />
                <path d="M12 18V20" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                    stroke-linejoin="round" />
                <path
                    d="M18 9C19.1046 9 20 8.10457 20 7C20 5.89543 19.1046 5 18 5C16.8954 5 16 5.89543 16 7C16 8.10457 16.8954 9 18 9Z"
                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M18 4V5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                    stroke-linejoin="round" />
                <path d="M18 9V20" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                    stroke-linejoin="round" />
            </svg>

            Filters
        </button>
    </div>

    {{-- @if(count($filters['categories']) > 0)
        <div class="mt-2">
            <div class="flex space-x-4">
                @foreach ($filters['categories'] as $categoryId)
                    @php
                        $category = $categories->firstWhere('id', $categoryId);
                    @endphp
                    <div class="bg-blue-200 text-blue-800 px-4 py-2 rounded-full flex items-center">
                        <span>{{ $category->name }}</span>
                        <button wire:click="toggleCategory({{ $category->id }})" class="ml-2 text-red-600">x</button>
                    </div>
                @endforeach
            </div>
        </div>
    @endif --}}

    <!-- Filter Modal -->
    <div id="filterSection" tabindex="-1" aria-hidden="true"
        class="hidden fixed inset-0 z-50 flex items-center justify-center bg-gray-900 bg-opacity-50">
        <div class="relative w-full max-w-4xl bg-white rounded-lg shadow-lg dark:bg-gray-800">
            <!-- Header -->
            <div class="flex justify-between items-center p-5 border-b dark:border-gray-700">
                <h3 class="text-lg font-medium text-gray-900 dark:text-white">Filtrer les résultats</h3>
                <button type="button" class="text-gray-400 hover:text-gray-900 dark:hover:text-white"
                    onclick="toggleModal('filterSection')">
                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <!-- Body -->
            <div class="py-10 px-6 bg-gray-50 dark:bg-gray-800">
                <!-- Colors Section -->
                <section>
                    <div class="flex space-x-2 text-gray-800 dark:text-white mb-6">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M19 3H15..." stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                        <p class="lg:text-2xl text-xl font-medium">Colors</p>
                    </div>
                    <div class="grid grid-cols-3 gap-y-8">
                        <div class="flex items-center space-x-2">
                            <div class="w-4 h-4 bg-white shadow rounded-full"></div>
                            <p>White</p>
                        </div>
                        <!-- More color options -->
                    </div>
                </section>

                <!-- Materials Section -->
                <section class="mt-8">
                    <div class="flex space-x-2 text-gray-800 dark:text-white mb-6">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M9.5 16C13..." stroke="currentColor" stroke-width="1.5" />
                        </svg>
                        <p class="lg:text-2xl text-xl font-medium">Material</p>
                    </div>
                    <div class="grid grid-cols-3 gap-y-8">
                        <div class="flex items-center space-x-2">
                            <input type="checkbox" id="Leather" name="Leather" value="Leather" class="w-4 h-4" />
                            <label for="Leather" class="text-sm font-normal text-gray-600">Leather</label>
                        </div>
                        <!-- More material options -->
                    </div>
                </section>

                <!-- Submit Button -->
                <div class="flex justify-end mt-6">
                    <div class="hidden md:block absolute right-0 bottom-0 md:py-10 lg:px-20 md:px-6 py-9 px-4">
                        <button onclick="applyFilters()"
                            class="hover:bg-gray-700 dark:bg-white dark:text-gray-800 dark:hover:bg-gray-100 focus:ring focus:ring-offset-2 focus:ring-gray-800 text-base leading-4 font-medium py-4 px-10 text-white bg-gray-800">Apply
                            Filter</button>
                    </div>

                    <!-- Apply Filter Button (Table or lower Screen) -->

                    <div class="block md:hidden w-full mt-10">
                        <button onclick="applyFilters()"
                            class="w-full hover:bg-gray-700 dark:bg-white dark:text-gray-800 dark:hover:bg-gray-100 focus:ring focus:ring-offset-2 focus:ring-gray-800 text-base leading-4 font-medium py-4 px-10 text-white bg-gray-800">Apply
                            Filter</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ✅ Grid Section - Starts Here 👇 -->
    <section id="Products"
        class="grid grid-cols-1 lg:grid-cols-4 md:grid-cols-2 justify-items-center justify-center gap-y-20 gap-x-14  mb-5 my-20">
        @if ($products && $products->count() == 0)
            <div class="p-4 text-center justify-center w-[100%] mx-auto text-sm text-gray-800 rounded-lg bg-gray-50 dark:bg-gray-800 dark:text-gray-300"
                role="alert">
                <span class="font-medium">Oups désolé !</span> Aucun produit disponible pour le moment. Essayez de
                rafraichir la page s'il vous plait.
            </div>
        @else
            @foreach ($products as $index => $product)
                <div class="w-72 rounded-xl duration-500">
                    <a href="{{ route('products.show', $product->_id) }}">
                        <div class="image swiper-container product-swiper-{{ $index + 1 }}" loading="lazy">
                            <div class="swiper-wrapper">
                                @foreach ($product->photos as $item)
                                    <div class="swiper-slide">
                                        <img src="{{ asset($item->image) }}" alt="{{ $product->name }}"
                                            class="h-80 w-72 object-cover rounded-xl hover:scale-105">
                                    </div>
                                @endforeach
                            </div>

                            <!-- Pagination -->
                            <div class="swiper-pagination swiper-pagination-{{ $index + 1 }}"></div>

                            <!-- Navigation -->
                            <div class="swiper-button-prev swiper-button-prev-{{ $index + 1 }}"></div>
                            <div class="swiper-button-next swiper-button-next-{{ $index + 1 }}"></div>
                        </div>
                    </a>
                    <div class="px-4 py-3 w-72">
                        <span
                            class="text-gray-400 mr-3 uppercase text-xs">{{ $product->category_product->name }}</span><br>
                        <span class="text-gray-400 mr-3 text-xs">Boutique {{ $product->shop->name }}</span>

                        <p class="text-lg font-bold text-black truncate block capitalize">{{ $product->name }}</p>
                        <div class="flex items-center">
                            <p class="text-lg font-semibold text-black cursor-auto my-3">${{ $product->unit_price }}
                            </p>
                            <del>
                                <p class="text-sm text-gray-600 cursor-auto ml-2">${{ $product->unit_price + 50 }}</p>
                            </del>
                            <div class="ml-auto flex space-x-2">
                                <!-- Contacter un vendeur -->
                                <svg onclick="contactSellerModal(event, {{ json_encode($product) }})"
                                    data-tooltip-target="tooltip-contact-seller-{{ $index }}"
                                    class="w-8 h-8 text-gray-800 dark:text-white hover:fill-[#e38407] hover:text-[#e38407] hover:cursor-pointer"
                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                    height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M16 10.5h.01m-4.01 0h.01M8 10.5h.01M5 5h14a1 1 0 0 1 1 1v9a1 1 0 0 1-1 1h-6.6a1 1 0 0 0-.69.275l-2.866 2.723A.5.5 0 0 1 8 18.635V17a1 1 0 0 0-1-1H5a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1Z" />
                                </svg>
                                <div id="tooltip-contact-seller-{{ $index }}" role="tooltip"
                                    class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                    Envoyer un message au vendeur
                                    <div class="tooltip-arrow" data-popper-arrow></div>
                                </div>

                                <!-- Ajouter a la wishlist -->
                                <svg data-tooltip-target="tooltip-wishlist-{{ $index }}"
                                    onclick="addToWishList(event, {{ $product->id }})"
                                    class="w-8 h-8 text-gray-800 dark:text-white hover:fill-[#e38407] hover:text-[#e38407] hover:cursor-pointer"
                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                    height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M12.01 6.001C6.5 1 1 8 5.782 13.001L12.011 20l6.23-7C23 8 17.5 1 12.01 6.002Z" />
                                </svg>
                                <div id="tooltip-wishlist-{{ $index }}" role="tooltip"
                                    class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                    Ajouter à ma wishlist
                                    <div class="tooltip-arrow" data-popper-arrow></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </section>
</div>

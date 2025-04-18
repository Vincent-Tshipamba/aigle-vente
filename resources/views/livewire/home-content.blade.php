<div class="main-content container ab">
    <div class="row items-center justify-center xl:pt-4">
        <div class="">

            <form>
                <div class="flex w-full">
                    {{-- <label for="category-select"
                        class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Catégorie</label>

                    <!-- Select remplaçant le dropdown -->
                    <select id="category-select"
                        class="shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-gray-900 bg-gray-100 border border-e-0 border-gray-300 dark:border-gray-700 dark:text-white rounded-s-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">
                        <option value="product">Product</option>
                        <option value="boutique">Boutique</option>
                    </select> --}}

                    <!-- Input de recherche -->
                    <div class=" w-full">
                        <input type="search" id="search-dropdown"
                            class="block search-input p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-e-lg border border-gray-300 focus:ring-gray-100 focus:border-gray-100 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500"
                            placeholder="Search" required />
                    </div>
                </div>
            </form>

        </div>

    </div>
    <div class="flex bg-white p-4 justify-between items-center gap-4 px-20">
        <!-- Bouton précédent -->
        <!-- Bouton précédent (masqué sur petits écrans) -->
        <div
            class="custom-next p-2 bg-gray-100 rounded-full w-8 h-8 hover:bg-gray-200 transition-all duration-300  hover:scale-125 drop-shadow-md sm:block hidden">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-600" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
        </div>

        <!-- Swiper avec grille responsive -->
        <div class="swiper w-full sm:w-auto">
            <div class="swiper-wrapper">
                @foreach ($categories as $item)
                    <div class="swiper-slide relative">
                        <a href="#" onclick="document.getElementById('filter-{{ $item->id }}').click();"
                            class="flex flex-col items-center text-center space-y-2 hover:scale-105">
                            <div class="p-2 rounded-full">
                                <img src="{{ $item->image }}" alt="{{ $item->name }}" class="w-8 h-8 rounded-full max-w-full">
                            </div>
                            <span id="category-{{ $item->id }}"
                                class="text-xs sm:text-sm font-medium text-gray-500 hover:text-gray-700">
                                {{ substr($item->name,0,15)  }}
                                <input type="checkbox" id="filter-{{ $item->id }}" value="{{ $item->id }}"
                                    class="category-checkbox w-5 h-5 text-[#e38407] hidden" />
                            </span>
                        </a>
                        <!-- Barre indiquant l'onglet sélectionné -->
                        <div id="tabs-{{ $item->id }}" class="hidden mt-2">
                            <div class="bg-gray-700 w-full h-[2px] rounded-full"></div>
                        </div>
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
        <button data-drawer-target="drawer-navigation" data-drawer-show="drawer-navigation"
            aria-controls="drawer-navigation"
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


    @include('partials.home-partials.filters', [
        'categories' => $categories,
        'products' => $products,
        'localSellers' => $localSellers,
        'internationalSellers' => $internationalSellers,
    ])




    <!-- ✅ Grid Section - Starts Here 👇 -->
    <section class="productsParent">

        @if ($products && $products->count() == 0)
            <div class="p-4 text-center justify-center w-[100%] mx-auto text-sm text-gray-800 rounded-lg bg-gray-50 dark:bg-gray-800 dark:text-gray-300"
                role="alert">
                <span class="font-medium">Oups désolé !</span> Aucun produit disponible pour le moment. Essayez de
                rafraichir la page s'il vous plait.
            </div>
        @else
            <div id="Products"
                class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6 2xl:grid-cols-8 justify-items-center justify-center gap-4 mb-5 my-10">
                @foreach ($products as $index => $product)
                    <div class="w-48 h-auto rounded-xl  p-2" id="">
                        <a href="{{ route('products.show', $product->_id) }}">
                            <div class="image swiper-container product-swiper-{{ $index + 1 }}" loading="lazy">
                                <div class="swiper-wrapper">
                                    @foreach ($product->photos as $item)
                                        <div class="swiper-slide">
                                            @php
                                                $fileExtension = pathinfo($item->image, PATHINFO_EXTENSION);
                                            @endphp
                                            @if (in_array($fileExtension, ['jpg', 'jpeg', 'png', 'gif', 'webp']))
                                                <!-- Affichage des images -->
                                                <img src="{{ asset($item->image) }}" alt="{{ $product->name }}"
                                                    class="h-40 w-40 object-cover rounded-xl hover:scale-105">
                                            @elseif (in_array($fileExtension, ['mp4', 'mov', 'avi', 'webm']))
                                                <!-- Affichage des vidéos -->
                                                <video class="h-40 w-40 object-cover rounded-xl hover:scale-105"
                                                    autoplay muted loop playsinline>
                                                    <source src="{{ asset($item->image) }}"
                                                        type="video/{{ $fileExtension }}">
                                                    Votre navigateur ne supporte pas la lecture de cette vidéo.
                                                </video>
                                            @endif
                                            <div
                                                class="absolute bottom-6 left-2  bg-opacity-50 text-white text-xs px-2 py-1">
                                                <img src="{{ asset($product->shop->image) ?? asset('images/default-shop.png') }}"
                                                    alt="Image de {{ $product->shop->name }}"
                                                    class="w-10 h-10 object-cover rounded-full border border-gray-200 bg-opacity-50">
                                            </div>
                                        </div>
                                    @endforeach



                                </div>
                                <!-- Pagination -->
                                <div class="swiper-pagination swiper-pagination-{{ $index + 1 }}"></div>
                            </div>
                        </a>
                        <div class="px-4 py-3 w-48 hover:scale-105">
                            <span
                                class="text-gray-400 mr-3 uppercase text-xs">{{ $product->category_product->name }}</span><br>
                            <a href="{{ route('shops.show', $product->shop->_id) }}"
                                class="text-gray-400 mr-3 text-xs">Boutique
                                {{ $product->shop->name }}</a>
                            <div id="average-rating">
                                @php
                                    $avg = round($product->reviews->avg('rating'), 1);
                                @endphp
                                @for ($i = 1; $i <= 5; $i++)
                                    <i class="{{ $i <= $avg ? 'fas' : 'fal' }} fa-star text-[#e38407]"></i>
                                @endfor
                                <span>({{ $avg }}/5)</span>
                            </div>
                            <p class="text-lg font-bold text-black truncate block capitalize w-full overflow-hidden">
                                {{ $product->name }}</p>


                            <div class=" flex items-center">
                                <p class="text-lg font-semibold text-black cursor-auto my-3">
                                    <b>CDF</b> {{ $product->unit_price }}
                                </p>
                                <del>
                                    <p class="text-sm text-gray-600 cursor-auto ml-2"><b>CDF</b>
                                        {{ $product->unit_price + 50 }}
                                    </p>
                                </del>
                            </div>
                            <div class=" items-center">

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

            </div>

            <div id="loadingPlaceholder"
                class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6 2xl:grid-cols-8 justify-items-center justify-center gap-4 mb-5 my-10">
                {{-- @for ($i = 0; $i < 24; $i++)
                    <div class="w-48 h-auto rounded-xl p-2 animate-pulse bg-white">
                        <div class="h-40 w-40 bg-gray-300 rounded-xl"></div>
                        <div class="px-4 py-3">
                            <div class="w-2/3 h-4 bg-gray-300 rounded mb-2"></div>
                            <div class="h-4 bg-gray-300 rounded w-3/4 mb-2"></div>
                            <div class="h-4 bg-gray-300 rounded w-1/2 mb-2"></div>
                            <div class="h-4 bg-gray-300 rounded w-full mb-2"></div>
                            <div class="flex space-x-2">
                                <div class="h-6 w-10 bg-gray-nn300 rounded"></div>
                                <div class="h-6 w-14 bg-gray-300 rounded"></div>
                            </div>
                        </div>
                    </div>
                @endfor --}}
            </div>
        @endif




    </section>


</div>

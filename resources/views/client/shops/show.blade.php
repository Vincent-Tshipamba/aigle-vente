<x-app-layout>

    <div class="container mx-auto p-6">


        <!-- Détails du Shop  -->
        <div class="relative rounded-lg bg-white ">
            <!-- Image de couverture -->
            <div class="">
                <img src="{{ $shop->image ? asset($shop->image) : asset('images/default-shop.png') }}"
                    alt="{{ $shop->name }}" class="w-full h-64 object-cover rounded-t-lg blur-sm">
            </div>

            <!-- Profil et Informations -->
            <div class="p-6 text-center">
                <!-- Image de profil bien positionnée -->
                <div class="relative flex justify-center">
                    <img src="{{ $shop->image ? asset($shop->image) : asset('images/default-shop.png') }}"
                        alt="Logo {{ $shop->name }}"
                        class="w-24 h-24 rounded-full border-4 border-white shadow-lg absolute -top-12 z-10">
                </div>

                <h1 class="text-3xl font-bold text-gray-800 mt-14">{{ $shop->name }}</h1>
                <p class="text-gray-600 text-lg">{{ $shop->address }}</p>
                <p class="text-gray-600 mt-2">{!! $shop->description !!}</p>

                <!-- Boutons de partage et contact -->
                <div class="flex justify-center space-x-4 mt-4">
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ url()->current() }}" target="_blank"
                        class="text-blue-600 hover:text-blue-800">
                        <i class="fab fa-facebook-square text-2xl"></i>
                    </a>
                    <a href="https://twitter.com/intent/tweet?url={{ url()->current() }}&text=Découvrez cette boutique: {{ $shop->name }}"
                        target="_blank" class="text-blue-400 hover:text-blue-600">
                        <i class="fab fa-twitter-x"></i>
                    </a>
                    <a href="https://api.whatsapp.com/send?text=Découvrez cette boutique: {{ url()->current() }}"
                        target="_blank" class="text-green-500 hover:text-green-700">
                        <i class="fab fa-whatsapp text-2xl"></i>
                    </a>
                    <a href="mailto:contact@shop.com" class="text-gray-600 hover:text-gray-800">
                        <i class="fas fa-envelope text-2xl"></i>
                    </a>
                </div>
            </div>
        </div>


        <!-- Catégories -->
        @if (!empty($shops))
            <h2 class="text-lg font-semibold text-gray-800 mb-4">Suggestion Boutique</h2>
            <div class="swiper1 sm:w-auto">
                <div class="swiper-wrapper grid grid-cols-2 sm:grid-cols-4 md:grid-cols-6 gap-4">
                    @foreach ($shops as $shop)
                        <div
                            class="w-full bg-white rounded-lg shadow-sm hover:shadow-md transition transform hover:-translate-y-1 flex-shrink-0 snap-start p-2 swiper-slide relative ">

                            <!-- Image de profil -->
                            <div class="flex justify-center mt-2">
                                <img src="{{ $shop->image ? asset($shop->image) : asset('images/default-shop.png') }}"
                                    alt="Image de {{ $shop->name }}"
                                    class="w-20 h-20 object-cover rounded-full border border-gray-200">
                            </div>

                            <!-- Nom de la boutique -->
                            <div class="text-center mt-2">
                                <h3 class="text-sm font-bold text-gray-800 truncate w-full">{{ $shop->name }}</h3>
                            </div>

                            <!-- Bouton -->
                            <div class="flex justify-center mt-2">
                                <a href="{{ route('shops.show', $shop->id) }}"
                                    class="bg-[#e38407] hover:bg-[#e38407e7] text-white text-xs font-semibold py-2 px-4 rounded-full">
                                    Visit Store
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Swiper JS -->
            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    new Swiper(".swiper1", {
                        slidesPerView: "auto",
                        // spaceBetween: 10,
                        autoplay: {
                            delay: 5000,
                            disableOnInteraction: false,
                        },
                        breakpoints: {
                            1024: {
                                slidesPerView: 8,
                                spaceBetween: 8,
                            },
                            768: {
                                slidesPerView: 7,
                            },
                            640: {
                                slidesPerView: 4,
                            },
                            480: {
                                slidesPerView: 2,
                                spaceBetween: 5,
                            },
                        }
                    });
                });
            </script>
        @endif



        <!-- Produits -->
        <h2 class="text-2xl font-semibold text-gray-800 mt-8 mb-4">Produits populaires</h2>
        <div id="Products"
            class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6 2xl:grid-cols-8 justify-items-center justify-center gap-4 mb-5 my-10">
            @foreach ($products as $index => $product)
                <div class="w-48 h-auto rounded-xl  p-2">
                    <a href="{{ route('products.show', $product->_id) }}">
                        <div class="image swiper-container product-swiper-{{ $index + 1 }}" loading="lazy">
                            <div class="swiper-wrapper">
                                @foreach ($product->photos as $item)
                                    <div class="swiper-slide">
                                        <img src="{{ asset($item->image) }}" alt="{{ $product->name }}"
                                            class="h-40 w-40 object-cover rounded-xl hover:scale-105">
                                        <div
                                            class="absolute bottom-6 left-2  bg-opacity-50 text-white text-xs px-2 py-1">
                                            <img src="{{ $product->shop->image ? asset($shop->image) : asset('images/default-shop.png') }}"
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
                            class="text-gray-400 mr-3 text-xs">Boutique {{ $product->shop->name }}</a>
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
                                ${{ $product->unit_price }}</p>
                            <del>
                                <p class="text-sm text-gray-600 cursor-auto ml-2">${{ $product->unit_price + 50 }}
                                </p>
                            </del>
                        </div>
                        <div class=" items-center">

                            <div class="ml-auto flex space-x-2">
                                <!-- Contacter un vendeur -->
                                <svg onclick="contactSellerModal(event, {{ json_encode($product) }})"
                                    data-tooltip-target="tooltip-contact-seller-{{ $index }}"
                                    class="w-8 h-8 text-gray-800 dark:text-white hover:fill-[#e38407] hover:text-[#e38407] hover:cursor-pointer"
                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    fill="none" viewBox="0 0 24 24">
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
                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    fill="none" viewBox="0 0 24 24">
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

        <!-- Avis des clients -->
        {{-- <h2 class="text-2xl font-semibold text-gray-800 mt-12 mb-4">Avis des clients</h2> --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            {{-- @foreach ($reviews as $review)
                <div class="bg-white shadow-md rounded-lg p-6">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-gray-200 rounded-full"></div>
                        <div class="ml-4">
                            <p class="font-bold">{{ $review->user->name }}</p>
                            <p class="text-sm text-gray-500">{{ $review->created_at->diffForHumans() }}</p>
                        </div>
                    </div>
                    <p class="text-gray-600">{{ $review->comment }}</p>
                </div>
            @endforeach --}}
        </div>

        <!-- Pagination -->
        <div class="mt-8">
            {{ $products->links() }}
        </div>
    </div>



    <!-- footer-area-start -->
    @include('partials.home-partials.footer')
    <!-- footer-area-end -->
</x-app-layout>

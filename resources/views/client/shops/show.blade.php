<x-app-layout>

    <div class="container mx-auto p-6">
        <!-- Détails du Shop avec Photo -->
        <div class=" rounded-lg p-6 mb-8">
            <!-- Image de la boutique -->
            <div class=" mb-6">
                @if (empty($shop->image))
                    <img src="https://timelinecovers.pro/facebook-cover/download/eagle-looking-at-your-profile-facebook-cover.jpg"
                        alt="{{ $shop->name }}" class="rounded-lg w-full h-64 object-cover">
                @else
                    <img src="{{ asset($shop->image) }}" alt="{{ $shop->name }}"
                        class="rounded-lg w-full h-64 object-cover">
                @endif

                <!-- Titre de la boutique -->
                <div class=" bottom-0 left-0  p-4 rounded-b-lg w-full">
                    <h1 class="text-4xl font-bold text-gray-800">{{ $shop->name }}</h1>
                    <div class="flex  items-start mb-4">
                        <svg class="w-5 h-5 text-gray-500 mt-1" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                            </path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                        <span class="ml-2 text-gray-600">{{ $shop->address }}</span>
                    </div>
                    <p class="text-lg text-gray-300">{!! $shop->description !!}</p>
                </div>
            </div>
        </div>

        <!-- Produits -->
        <h2 class="text-2xl font-semibold text-gray-800 mb-4">Produits disponibles</h2>
        <section class="productsParent">
            @if ($products && $products->count() == 0)
                <div class="p-4 text-center justify-center w-[100%] mx-auto text-sm text-gray-800 rounded-lg bg-gray-50 dark:bg-gray-800 dark:text-gray-300"
                    role="alert">
                    <span class="font-medium">Oups désolé !</span> Aucun produit disponible pour le moment. Essayez de
                    rafraichir la page s'il vous plait.
                </div>
            @else
                <div id="Products"
                    class="grid grid-cols-1 lg:grid-cols-4 md:grid-cols-2 justify-items-center justify-center gap-y-20 gap-x-14  mb-5 my-20">
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

                                <p class="text-lg font-bold text-black truncate block capitalize">{{ $product->name }}
                                </p>
                                <div class="flex items-center">
                                    <p class="text-lg font-semibold text-black cursor-auto my-3">
                                        ${{ $product->unit_price }}
                                    </p>
                                    <del>
                                        <p class="text-sm text-gray-600 cursor-auto ml-2">
                                            ${{ $product->unit_price + 50 }}
                                        </p>
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
                </div>
            @endif
        </section>

        <!-- Pagination -->
        <div class="mt-8">
            {{ $products->links() }} <!-- Liens de pagination -->
        </div>
    </div>


    <!-- footer-area-start -->
    @include('partials.home-partials.footer')
    <!-- footer-area-end -->
</x-app-layout>

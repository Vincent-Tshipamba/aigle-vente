@foreach ($products as $index => $product)
    <div class="w-72 rounded-xl duration-500">
        <a href="{{ route('products.show', $product->_id) }}">
            <div class="image swiper-container product-swiper-{{ $loop->index + 1 }}" loading="lazy">
                <div class="swiper-wrapper">
                    @foreach ($product->photos as $item)
                        <div class="swiper-slide">
                            <img src="{{ asset($item->image) }}" alt="{{ $product->name }}"
                                class="h-80 w-72 object-cover rounded-xl hover:scale-105">
                        </div>
                    @endforeach
                </div>
                <div class="swiper-pagination swiper-pagination-{{ $loop->index + 1 }}"></div>
                <div class="swiper-button-prev swiper-button-prev-{{ $loop->index + 1 }}"></div>
                <div class="swiper-button-next swiper-button-next-{{ $loop->index + 1 }}"></div>
            </div>
        </a>
        <div class="px-4 py-3 w-72">
            <span class="text-gray-400 mr-3 uppercase text-xs">{{ $product->category_product->name }}</span><br>
            <span class="text-gray-400 mr-3 text-xs">Boutique {{ $product->shop->name }}</span>
            <p class="text-lg font-bold text-black truncate block capitalize">{{ $product->name }}</p>
            <div class="flex items-center">
                <p class="text-lg font-semibold text-black cursor-auto my-3">${{ $product->unit_price }}</p>
                <del>
                    <p class="text-sm text-gray-600 cursor-auto ml-2">${{ $product->unit_price + 50 }}</p>
                </del>
                <div class="ml-auto flex space-x-2">
                    <!-- Contacter un vendeur -->
                    <svg onclick="contactSellerModal(event, {{ json_encode($product) }})"
                        data-tooltip-target="tooltip-contact-seller-{{ $index }}"
                        class="w-8 h-8 text-gray-800 dark:text-white hover:fill-[#e38407] hover:text-[#e38407] hover:cursor-pointer"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
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
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
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
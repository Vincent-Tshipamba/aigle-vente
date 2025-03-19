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
                                <video class="h-40 w-40 object-cover rounded-xl hover:scale-105" autoplay muted loop
                                    playsinline>
                                    <source src="{{ asset($item->image) }}" type="video/{{ $fileExtension }}">
                                    Votre navigateur ne supporte pas la lecture de cette vidéo.
                                </video>
                            @endif
                            <div class="absolute bottom-6 left-2  bg-opacity-50 text-white text-xs px-2 py-1">
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
            <span class="text-gray-400 mr-3 uppercase text-xs">{{ $product->category_product->name }}</span><br>
            <a href="{{ route('shops.show', $product->shop->_id) }}" class="text-gray-400 mr-3 text-xs">Boutique
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

<x-app-layout>
    <!-- product-area-start -->
    <section class="product-area pt-60 pb-25">
        <div class="container">
            <div class="row flex mx-auto justify-center">
                <div class="container mx-auto px-4 py-8">
                    <div class="flex flex-wrap -mx-4">
                        <!-- Product Images -->
                        <div class="w-full md:w-1/2 px-4 mb-8">
                            <img src="{{ asset($product->photos->first()->image) }}" alt="{{ $product->name }}"
                                class="w-full h-auto rounded-lg shadow-md mb-4" id="mainImage">
                            <div class="flex gap-4 py-4 justify-center overflow-x-auto">
                                @foreach ($product->photos->take(4) as $photo)
                                    <img src="{{ asset($photo->image) }}" alt="{{ $product->name }}"
                                        class="size-16 sm:size-20 object-cover rounded-md cursor-pointer opacity-60 hover:opacity-100 transition duration-300"
                                        onclick="changeImage(this.src)">
                                @endforeach
                            </div>
                        </div>
                        <div class="w-full md:w-1/2 px-4">
                            <h2 class="text-3xl font-bold mb-2">
                                {{ $product->name }}
                                <span class="tpproduct-details__stock">
                                    {{ $product->is_active ? 'Disponible' : 'Stock épuisé' }}
                                </span>
                            </h2>
                            <p class="text-gray-600 mb-4">
                                <a href="{{ route('shops.show', $product->shop->_id) }}"
                                    class="mb-8 hover:text-[#e38407]">Boutique : {{ $product->shop->name }}</a><br>
                                <span class="tpproduct-details__tag">
                                    Catégorie : {{ $product->category_product->name }}
                                </span>
                            </p>
                            <div class="mb-4">
                                <span class="text-2xl font-bold mr-2">${{ $product->unit_price }}</span>
                                <span class="text-gray-500 line-through">${{ $product->unit_price + 10 }}</span>
                            </div>
                            <div class="flex items-center mb-4">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="size-6 text-yellow-500">
                                    <path fill-rule="evenodd"
                                        d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z"
                                        clip-rule="evenodd" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="size-6 text-yellow-500">
                                    <path fill-rule="evenodd"
                                        d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z"
                                        clip-rule="evenodd" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="size-6 text-yellow-500">
                                    <path fill-rule="evenodd"
                                        d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z"
                                        clip-rule="evenodd" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="size-6 text-yellow-500">
                                    <path fill-rule="evenodd"
                                        d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z"
                                        clip-rule="evenodd" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="size-6 text-yellow-500">
                                    <path fill-rule="evenodd"
                                        d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z"
                                        clip-rule="evenodd" />
                                </svg>
                                <span class="ml-2 text-gray-600">4.5 (120 reviews)</span>
                            </div>
                            <p class="text-gray-700 mb-6">
                                {!! substr($product->description, 0, 800) !!} ...
                            </p>
                            <div class="tpproduct-details__content">
                                <div class="tpproduct-details__count d-flex align-items-center flex-wrap mb-25">
                                    <div class="tpproduct-details__cart">
                                        <button>Contacter le vendeur</button>
                                    </div>
                                    <div class="tpproduct-details__wishlist ml-20">
                                        <a href="#" onclick="addToWishList(event, {{ $product->id }})"><i
                                                class="fal fa-heart"></i></a>
                                    </div>
                                </div>
                                {{-- <div class="tpproduct-details__information tpproduct-details__tags">
                                    <p>Tags:</p>
                                    <span><a href="#">fashion,</a></span>
                                    <span><a href="#">t-shirts,</a></span>
                                    <span><a href="#">women</a></span>
                                </div> --}}
                                <div class="tpproduct-details__information tpproduct-details__social">
                                    <p>Share:</p>
                                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                    <a href="#"><i class="fab fa-behance"></i></a>
                                    <a href="#"><i class="fab fa-youtube"></i></a>
                                    <a href="#"><i class="fab fa-linkedin"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    </section>
    <!-- product-area-end -->

    <!-- product-details-area-start -->
    <div class="product-details-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="tpproduct-details__navtab mb-60">
                        <div class="tpproduct-details__nav mb-30">
                            <ul class="nav nav-tabs pro-details-nav-btn" id="myTabs" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-links active" id="home-tab-1" data-bs-toggle="tab"
                                        data-bs-target="#home-1" type="button" role="tab" aria-controls="home-1"
                                        aria-selected="true">Description</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-links" id="information-tab" data-bs-toggle="tab"
                                        data-bs-target="#additional-information" type="button" role="tab"
                                        aria-controls="additional-information" aria-selected="false">
                                        Informations supplémentaires
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-links" id="reviews-tab" data-bs-toggle="tab"
                                        data-bs-target="#reviews" type="button" role="tab"
                                        aria-controls="reviews" aria-selected="false">Notes et avis</button>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content tp-content-tab" id="myTabContent-2">
                            <div class="tab-para tab-pane fade show active" id="home-1" role="tabpanel"
                                aria-labelledby="home-tab-1">
                                <p class="mb-30">
                                    {!! $product->description !!}
                                </p>
                            </div>
                            <div class="tab-pane fade" id="additional-information" role="tabpanel"
                                aria-labelledby="information-tab">
                                <div class="product__details-info table-responsive">
                                    <table class="table table-striped">
                                        <tbody>
                                            <tr>
                                                <td class="add-info">Weight</td>
                                                <td class="add-info-list"> {{ $product->details->weight ?? 'none' }}</td>
                                            </tr>
                                            <tr>
                                                <td class="add-info">Dimensions</td>
                                                <td class="add-info-list"> {{ $product->details->dimensions ?? 'none' }}</td>
                                            </tr>
                                            <tr>
                                                <td class="add-info">State</td>
                                                <td class="add-info-list">{{ $product->state->name ?? 'none' }}</td>
                                            </tr>
                                            <tr>
                                                <td class="add-info">Color</td>
                                                <td class="add-info-list"> {{ $product->details->color ?? 'none' }}</td>
                                            </tr>
                                            <tr>
                                                <td class="add-info">Size</td>
                                                <td class="add-info-list"> {{ $product->details->size ?? 'none' }}</td>
                                            </tr>
                                            <tr>
                                                <td class="add-info">Model</td>
                                                <td class="add-info-list"> {{ $product->details->model ?? 'none' }}</td>
                                            </tr>
                                            <tr>
                                                <td class="add-info">Shipping</td>
                                                <td class="add-info-list"> {{ $product->details->shipping ?? 'none' }}</td>
                                            </tr>
                                            <tr>
                                                <td class="add-info">Care Info</td>
                                                <td class="add-info-list"> {{ $product->details->care ?? 'none' }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="add-info">Brand</td>
                                                <td class="add-info-list"> {{ $product->details->brand ?? 'none' }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                                <div class="product-details-review">
                                    <h3 class="tp-comments-title mb-35">3 avis pour {{ $product->name }}
                                    </h3>
                                    <div class="latest-comments mb-55">
                                        <ul>
                                            <li>
                                                <div class="comments-box d-flex">
                                                    <div class="comments-avatar mr-25">
                                                        <img loading="lazy"
                                                            src="{{ asset('img/shop/reviewer-01.png') }}"
                                                            alt="">
                                                    </div>
                                                    <div class="comments-text">
                                                        <div
                                                            class="comments-top d-sm-flex align-items-start justify-content-between mb-5">
                                                            <div class="avatar-name">
                                                                <b>Siarhei Dzenisenka</b>
                                                                <div class="comments-date mb-20">
                                                                    <span>March 27, 2018 9:51 am</span>
                                                                </div>
                                                            </div>
                                                            <div class="user-rating">
                                                                <ul>
                                                                    <li><a href="#"><i
                                                                                class="fas fa-star"></i></a>
                                                                    </li>
                                                                    <li><a href="#"><i
                                                                                class="fas fa-star"></i></a>
                                                                    </li>
                                                                    <li><a href="#"><i
                                                                                class="fas fa-star"></i></a>
                                                                    </li>
                                                                    <li><a href="#"><i
                                                                                class="fas fa-star"></i></a>
                                                                    </li>
                                                                    <li><a href="#"><i
                                                                                class="fal fa-star"></i></a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <p class="m-0">This is cardigan is a comfortable warm
                                                            classic
                                                            piece. Great to layer with a light top and you can dress up
                                                            or
                                                            down given the jewel buttons. I'm 5'8” 128lbs a 34A and the
                                                            Small fit fine.</p>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="comments-box d-flex">
                                                    <div class="comments-avatar mr-25">
                                                        <img loading="lazy"
                                                            src="{{ asset('img/shop/reviewer-02.png') }}"
                                                            alt="">
                                                    </div>
                                                    <div class="comments-text">
                                                        <div
                                                            class="comments-top d-sm-flex align-items-start justify-content-between mb-5">
                                                            <div class="avatar-name">
                                                                <b>Tommy Jarvis </b>
                                                                <div class="comments-date mb-20">
                                                                    <span>March 27, 2018 9:51 am</span>
                                                                </div>
                                                            </div>
                                                            <div class="user-rating">
                                                                <ul>
                                                                    <li><a href="#"><i
                                                                                class="fas fa-star"></i></a>
                                                                    </li>
                                                                    <li><a href="#"><i
                                                                                class="fas fa-star"></i></a>
                                                                    </li>
                                                                    <li><a href="#"><i
                                                                                class="fas fa-star"></i></a>
                                                                    </li>
                                                                    <li><a href="#"><i
                                                                                class="fas fa-star"></i></a>
                                                                    </li>
                                                                    <li><a href="#"><i
                                                                                class="fal fa-star"></i></a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <p class="m-0">This is cardigan is a comfortable warm
                                                            classic
                                                            piece. Great to layer with a light top and you can dress up
                                                            or
                                                            down given the jewel buttons. I'm 5'8” 128lbs a 34A and the
                                                            Small fit fine.</p>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="comments-box d-flex">
                                                    <div class="comments-avatar mr-25">
                                                        <img loading="lazy"
                                                            src="{{ asset('img/shop/reviewer-03.png') }}"
                                                            alt="">
                                                    </div>
                                                    <div class="comments-text">
                                                        <div
                                                            class="comments-top d-sm-flex align-items-start justify-content-between mb-5">
                                                            <div class="avatar-name">
                                                                <b>Johnny Cash</b>
                                                                <div class="comments-date mb-20">
                                                                    <span>March 27, 2018 9:51 am</span>
                                                                </div>
                                                            </div>
                                                            <div class="user-rating">
                                                                <ul>
                                                                    <li><a href="#"><i
                                                                                class="fas fa-star"></i></a>
                                                                    </li>
                                                                    <li><a href="#"><i
                                                                                class="fas fa-star"></i></a>
                                                                    </li>
                                                                    <li><a href="#"><i
                                                                                class="fas fa-star"></i></a>
                                                                    </li>
                                                                    <li><a href="#"><i
                                                                                class="fas fa-star"></i></a>
                                                                    </li>
                                                                    <li><a href="#"><i
                                                                                class="fal fa-star"></i></a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <p class="m-0">This is cardigan is a comfortable warm
                                                            classic
                                                            piece. Great to layer with a light top and you can dress up
                                                            or
                                                            down given the jewel buttons. I'm 5'8” 128lbs a 34A and the
                                                            Small fit fine.</p>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="product-details-comment">
                                        <div class="comment-title mb-20">
                                            <h3>Add a review</h3>
                                            <p>Your email address will not be published. Required fields are marked*</p>
                                        </div>
                                        <div class="comment-rating mb-20 d-flex">
                                            <span>Overall ratings</span>
                                            <ul>
                                                <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                <li><a href="#"><i class="fal fa-star"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="comment-input-box">
                                            <form action="#">
                                                <div class="row">
                                                    <div class="col-xxl-12">
                                                        <div class="comment-input">
                                                            <textarea placeholder="Your review..."></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-xxl-6">
                                                        <div class="comment-input">
                                                            <input type="text" placeholder="Your Name*">
                                                        </div>
                                                    </div>
                                                    <div class="col-xxl-6">
                                                        <div class="comment-input">
                                                            <input type="email" placeholder="Your Email*">
                                                        </div>
                                                    </div>
                                                    <div class="col-xxl-12">
                                                        <div class="comment-submit">
                                                            <button type="submit"
                                                                class="tp-btn pro-submit">Submit</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- product-details-area-end -->

    <!-- related-product-area-start -->
    <div class="related-product-area pt-65 pb-50 related-product-border">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <div class="tpsection mb-40">
                        <h4 class="tpsection__title">Produits de la même catégorie</h4>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="tprelated__arrow d-flex align-items-center justify-content-end mb-40">
                        <div class="tprelated__prv"><i class="far fa-long-arrow-left"></i></div>
                        <div class="tprelated__nxt"><i class="far fa-long-arrow-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="swiper-container related-product-active">
                <div class="swiper-wrapper">
                    @if ($otherProducts->count() > 0)
                        @foreach ($otherProducts->unique('_id') as $index => $product)
                            <div class="w-72 rounded-xl duration-500">
                                <a href="{{ route('products.show', $product->_id) }}">
                                    <div class="image swiper-container product-swiper-{{ $index + 1 }}"
                                        loading="lazy">
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
                                    <span class="text-gray-400 mr-3 text-xs">Boutique
                                        {{ $product->shop->name }}</span>

                                    <p class="text-lg font-bold text-black truncate block capitalize">
                                        {{ $product->name }}</p>
                                    <div class="flex items-center">
                                        <p class="text-lg font-semibold text-black cursor-auto my-3">
                                            ${{ $product->unit_price }}
                                        </p>
                                        <del>
                                            <p class="text-sm text-gray-600 cursor-auto ml-2">
                                                ${{ $product->unit_price + 50 }}</p>
                                        </del>
                                        <div class="ml-auto flex space-x-2">
                                            <!-- Ajouter a la wishlist -->
                                            <svg data-tooltip-target="tooltip-wishlist-{{ $index }}"
                                                onclick="addToWishList(event, {{ $product->id }})"
                                                class="w-8 h-8 text-gray-800 dark:text-white hover:fill-[#e38407] hover:text-[#e38407] hover:cursor-pointer"
                                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                                height="24" fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
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
                    @else
                        {{ "Aucun autre produit n'a été trouvé dans cette catégorie actuellement." }}
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!-- related-product-area-end -->

    @section('script')
        <script>
            function changeImage(src) {
                document.getElementById('mainImage').src = src;
            }
        </script>
    @endsection
</x-app-layout>

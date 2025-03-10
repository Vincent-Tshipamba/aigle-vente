<x-app-layout>
    <!-- product-area-start -->
    <section class="product-area pt-60 pb-25">
        <div class="container">
            <div class="row flex mx-auto justify-center">
                <div class="container mx-auto px-4 py-8">
                    <div class="flex flex-wrap -mx-4">
                        <!-- Product Images -->
                        <div class="w-full md:w-1/2 px-4 mb-8">
                            <!-- Image principale avec taille fixe -->
                            <div
                                class="mx-auto w-[300px] h-[300px] xl:w-[450px] xl:h-[450px] 2xl:w-[500px] 2xl:h-[500px]">
                                <img src="{{ asset($product->photos->first()->image) }}" alt="{{ $product->name }}"
                                    class="w-full h-full object-cover rounded-lg shadow-sm mb-4" id="mainImage">
                            </div>

                            <!-- Miniatures -->
                            <div class="flex gap-4 py-4 justify-center overflow-x-auto">
                                @foreach ($product->photos->take(4) as $photo)
                                    <img src="{{ asset($photo->image) }}" alt="{{ $product->name }}"
                                        class="w-16 h-16 sm:w-20 sm:h-20 object-cover rounded-md cursor-pointer opacity-60 hover:opacity-100 transition duration-300"
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
                            
                                @php
                                    $avg = round($product->reviews->avg('rating'), 1);
                                @endphp
                                @for ($i = 1; $i <= 5; $i++)
                                    <i class="{{ $i <= $avg ? 'fas' : 'fal' }} fa-star text-yellow-500"></i>
                                @endfor
                                
                                <span class="ml-2 text-gray-600">({{ $avg }}/5)</span>
                            </div>
                            <p class="text-gray-700 mb-6">
                                {!! substr($product->description, 0, 800) !!} ...
                            </p>
                            <div class="tpproduct-details__content">
                                <div class="tpproduct-details__count d-flex align-items-center flex-wrap mb-25">
                                    <div class="tpproduct-details__cart">
                                        <button
                                            onclick="contactSellerModal(event, {{ json_encode($product) }})">Contacter
                                            le vendeur</button>
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
                                    <button class="nav-links active" id="information-tab" data-bs-toggle="tab"
                                        data-bs-target="#additional-information" type="button" role="tab"
                                        aria-controls="additional-information" aria-selected="false">
                                        Informations supplémentaires
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-links" id="reviews-tab" data-bs-toggle="tab"
                                        data-bs-target="#reviews" type="button" role="tab" aria-controls="reviews"
                                        aria-selected="false">Notes et avis</button>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content tp-content-tab" id="myTabContent-2">
                            <div class="tab-pane fade" id="additional-information" role="tabpanel"
                                aria-labelledby="information-tab">
                                <div class="product__details-info table-responsive">
                                    <table class="table table-striped">
                                        <tbody>
                                            <tr>
                                                <td class="add-info">Weight</td>
                                                <td class="add-info-list"> {{ $product->details->weight ?? 'none' }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="add-info">Dimensions</td>
                                                <td class="add-info-list">
                                                    {{ $product->details->dimensions ?? 'none' }}</td>
                                            </tr>
                                            <tr>
                                                <td class="add-info">State</td>
                                                <td class="add-info-list">{{ $product->state->name ?? 'none' }}</td>
                                            </tr>
                                            <tr>
                                                <td class="add-info">Color</td>
                                                <td class="add-info-list"> {{ $product->details->color ?? 'none' }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="add-info">Size</td>
                                                <td class="add-info-list"> {{ $product->details->size ?? 'none' }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="add-info">Model</td>
                                                <td class="add-info-list"> {{ $product->details->model ?? 'none' }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="add-info">Shipping</td>
                                                <td class="add-info-list"> {{ $product->details->shipping ?? 'none' }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="add-info">Care Info</td>
                                                <td class="add-info-list"> {{ $product->details->care ?? 'none' }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="add-info">Brand</td>
                                                <td class="add-info-list"> {{ $product->details->brand ?? 'none' }}
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade show active" id="reviews" role="tabpanel"
                                aria-labelledby="reviews-tab">
                                <div class="product-details-review">
                                    <h3 class="tp-comments-title mb-35">
                                        {{ $product->reviews->count() }} avis pour {{ $product->name }}
                                    </h3>

                                    {{-- Section Affichage des Avis --}}
                                    <div class="latest-comments mb-55">
                                        <ul>
                                            @foreach ($product->reviews as $review)
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
                                                                    <b>{{ $review->user->name }}</b>

                                                                    <div class="comments-date mb-20">

                                                                        <span>{{ $review->created_at->format('d M Y H:i') }}</span>
                                                                    </div>
                                                                </div>
                                                                <div class="user-rating">
                                                                    <ul>
                                                                        @for ($i = 1; $i <= 5; $i++)
                                                                            <li>
                                                                                <i
                                                                                    class="{{ $i <= $review->rating ? 'fas' : 'fal' }} fa-star"></i>
                                                                            </li>
                                                                        @endfor
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <p class="m-0">{{ $review->comment }}</p>
                                                        </div>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>

                                    {{-- Note globale (calculée dynamiquement) --}}
                                    <div class="comment-rating mb-20 d-flex">
                                        <span>Note Globale : </span>
                                        <div id="average-rating">
                                            @php
                                                $avg = round($product->reviews->avg('rating'), 1);
                                            @endphp
                                            @for ($i = 1; $i <= 5; $i++)
                                                <i class="{{ $i <= $avg ? 'fas' : 'fal' }} fa-star"></i>
                                            @endfor
                                            <span>({{ $avg }}/5)</span>
                                        </div>
                                    </div>

                                    {{-- Formulaire d'ajout d'un avis --}}
                                    <div class="product-details-comment">
                                        <div class="comment-title mb-20">
                                            <h3>Ajouter un avis</h3>
                                            <p>Votre email ne sera pas publié. Les champs requis sont marqués *</p>
                                        </div>
                                        <form id="review-form" action="{{ route('reviews.store', $product->id) }}"
                                            method="POST">
                                            @csrf
                                            <div class="comment-rating mb-20 d-flex">
                                                <span>Votre Note</span>
                                                <ul id="star-rating">
                                                    @for ($i = 1; $i <= 5; $i++)
                                                        <li data-value="{{ $i }}">
                                                            <i class="fal fa-star"></i>
                                                        </li>
                                                    @endfor
                                                </ul>
                                                <input type="hidden" name="rating" id="rating-value">
                                            </div>
                                            <div class="comment-input-box">
                                                <div class="row">
                                                    <div class="col-xxl-12">
                                                        <div class="comment-input">
                                                            <!-- Correction ici -->
                                                            <textarea name="comment" placeholder="Votre avis..." required></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <button type="submit"
                                                            class="tp-btn pro-submit">Soumettre</button>
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
            <div class="swiper-container">
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
                                            <!-- Contacter un vendeur -->
                                            <svg onclick="contactSellerModal(event, {{ json_encode($product) }})"
                                                class="w-8 h-8 text-gray-800 dark:text-white hover:fill-[#e38407] hover:text-[#e38407] hover:cursor-pointer"
                                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                                height="24" fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="M16 10.5h.01m-4.01 0h.01M8 10.5h.01M5 5h14a1 1 0 0 1 1 1v9a1 1 0 0 1-1 1h-6.6a1 1 0 0 0-.69.275l-2.866 2.723A.5.5 0 0 1 8 18.635V17a1 1 0 0 0-1-1H5a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1Z" />
                                            </svg>

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

    {{-- JavaScript pour les étoiles interactives --}}
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const stars = document.querySelectorAll("#star-rating li");
            const ratingValue = document.getElementById("rating-value");

            stars.forEach(star => {
                star.addEventListener("click", function() {
                    const value = this.getAttribute("data-value");
                    ratingValue.value = value;

                    stars.forEach(s => s.querySelector("i").classList.replace("fas", "fal"));
                    for (let i = 0; i < value; i++) {
                        stars[i].querySelector("i").classList.replace("fal", "fas");
                    }
                });
            });
        });
    </script>
</x-app-layout>

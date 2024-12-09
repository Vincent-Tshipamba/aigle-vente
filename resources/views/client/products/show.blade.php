<x-app-layout>
    <!-- product-area-start -->
    <section class="product-area pt-80 pb-25">
        <div class="container">
            <div class="row flex mx-auto justify-center">
                <div class="col-lg-6 col-md-12">
                    <div class="tpproduct-details__nab pr-50 mb-40">
                        <div class="d-flex align-items-start">
                            <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist"
                                aria-orientation="vertical">
                                @php
                                    // Assuming $product->photos is a collection of photos
                                    $photos = $product->photos;
                                @endphp

                                @foreach ($photos as $index => $photo)
                                    <button class="nav-link {{ $index == 0 ? 'active' : '' }}"
                                        id="v-pills-{{ $index }}-tab" data-bs-toggle="pill"
                                        data-bs-target="#v-pills-{{ $index }}" type="button" role="tab"
                                        aria-controls="v-pills-{{ $index }}"
                                        aria-selected="{{ $index == 0 ? 'true' : 'false' }}">
                                        <img src="{{ asset($photo->image) }}"
                                            alt="{{ $product->name }} - {{ $index + 1 }}">
                                    </button>
                                @endforeach
                            </div>
                            <div class="tab-content" id="v-pills-tabContent">
                                @foreach ($photos as $index => $photo)
                                    <div class="tab-pane fade {{ $index == 0 ? 'show active' : '' }}"
                                        id="v-pills-{{ $index }}" role="tabpanel"
                                        aria-labelledby="v-pills-{{ $index }}-tab">
                                        <img src="{{ asset($photo->image) }}"
                                            alt="{{ $product->name }} - {{ $index + 1 }}">
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="tpproduct-details__content">
                        <div class="tpproduct-details__tag-area d-flex align-items-center mb-5">
                            <span class="tpproduct-details__tag">{{ $product->category_product->name }}</span>
                            <div class="tpproduct-details__tag-area d-flex align-items-center mb-5">
                                <div class="tpproduct-details__rating">
                                    <a href="#"><i class="fas fa-star"></i></a>
                                    <a href="#"><i class="fas fa-star"></i></a>
                                    <a href="#"><i class="fas fa-star"></i></a>
                                </div>
                                <a class="tpproduct-details__reviewers">10 Reviews</a>
                            </div>
                        </div>
                        <div class="tpproduct-details__title-area d-flex align-items-center flex-wrap mb-5">
                            <h3 class="tpproduct-details__title">{{ $product->name }}</h3><br>
                            <span
                                class="tpproduct-details__stock">{{ $product->is_active ? 'Disponible' : 'Stock épuisé' }}</span>
                        </div>
                        <a href="{{ route('shops.show', $product->shop->_id) }}"
                            class="mb-8 hover:text-[#e38407]">Boutique : {{ $product->shop->name }}</a>
                        <div class="tpproduct-details__price mt-4 mb-30">
                            <del>${{ $product->unit_price + 10 }}</del>
                            <span>${{ $product->unit_price }}</span>
                        </div>
                        <div class="tpproduct-details__count d-flex align-items-center flex-wrap mb-25">
                            <div class="tpproduct-details__cart ml-20">
                                <button>Contacter le vendeur</button>
                            </div>
                            @auth
                                <div class="tpproduct-details__wishlist ml-20">
                                    <a href="#" onclick="addToWishList(event, {{ $product->id }})"><i
                                            class="fal fa-heart"></i></a>
                                </div>
                            @endauth
                        </div>
                        <div class="tpproduct-details__information tpproduct-details__tags">
                            <p>Tags:</p>
                            <span><a href="#">fashion,</a></span>
                            <span><a href="#">t-shirts,</a></span>
                            <span><a href="#">women</a></span>
                        </div>
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
                                    {{ $product->description }}
                                </p>
                            </div>
                            <div class="tab-pane fade" id="additional-information" role="tabpanel"
                                aria-labelledby="information-tab">
                                <div class="product__details-info table-responsive">
                                    <table class="table table-striped">
                                        <tbody>
                                            <tr>
                                                <td class="add-info">Weight</td>
                                                <td class="add-info-list"> 2 lbs</td>
                                            </tr>
                                            <tr>
                                                <td class="add-info">Dimensions</td>
                                                <td class="add-info-list"> 12 × 16 × 19 in</td>
                                            </tr>
                                            <tr>
                                                <td class="add-info">Product</td>
                                                <td class="add-info-list"> Purchase this product on rag-bone.com</td>
                                            </tr>
                                            <tr>
                                                <td class="add-info">Color</td>
                                                <td class="add-info-list"> Gray, Black</td>
                                            </tr>
                                            <tr>
                                                <td class="add-info">Size</td>
                                                <td class="add-info-list"> S, M, L, XL</td>
                                            </tr>
                                            <tr>
                                                <td class="add-info">Model</td>
                                                <td class="add-info-list"> Model </td>
                                            </tr>
                                            <tr>
                                                <td class="add-info">Shipping</td>
                                                <td class="add-info-list"> Standard shipping: $5,95L</td>
                                            </tr>
                                            <tr>
                                                <td class="add-info">Care Info</td>
                                                <td class="add-info-list"> Machine Wash up to 40ºC/86ºF Gentle Cycle
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="add-info">Brand</td>
                                                <td class="add-info-list"> Kazen</td>
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
                                                        <img src="{{ asset('img/shop/reviewer-01.png') }}"
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
                                                        <img src="{{ asset('img/shop/reviewer-02.png') }}"
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
                                                        <img src="{{ asset('img/shop/reviewer-03.png') }}"
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
                        @foreach ($otherProducts->unique('_id') as $product)
                            <div class="swiper-slide">
                                <div class="tpproduct pb-15 mb-30">
                                    <div class="tpproduct__thumb p-relative">
                                        <a href="{{ route('products.show', $product->_id) }}">
                                            @php
                                                $firstPhoto = $product->photos->first();
                                            @endphp
                                            <img src="{{ asset($firstPhoto->image) }}" alt="{{ $product->name }}">
                                            <img class="product-thumb-secondary"
                                                src="{{ asset($firstPhoto->image) }}" alt="{{ $product->name }}">
                                        </a>
                                        <div class="tpproduct__thumb-action">
                                            @auth
                                                <a class="comphare" onclick="addToWishList(event, {{ $product->id }})"
                                                    href="#"><i class="fal fa-heart"></i></a>
                                            @endauth

                                            <a class="quckview" href="{{ route('products.show', $product->_id) }}"><i
                                                    class="fal fa-eye"></i></a>

                                            <a href="#" class="quckview message-button"
                                                data-seller-id="{{ $product->shop->seller->user->id }}"
                                                data-product-id="{{ $product->id }}">
                                                <i class="fal fa-comment"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="tpproduct__content">
                                        <h3 class="tpproduct__title">
                                            <a href="{{ route('products.show', $product->_id) }}">
                                                {{ $product->name }}
                                            </a>
                                        </h3>
                                        <div class="tpproduct__priceinfo p-relative">
                                            <div class="tpproduct__priceinfo-list">
                                                <span>${{ $product->unit_price }}</span>
                                            </div>
                                            @if (Auth::check())
                                                <div class="tpproduct__cart">
                                                    <a href="cart.html"
                                                        onclick="addToWishList(event, {{ $product->id }})"><i
                                                            class="fal fa-shopping-cart"></i>
                                                        Ajouter à la liste des souhaits
                                                    </a>
                                                </div>
                                            @else
                                                <div class="tpproduct__cart">
                                                    <span>${{ $product->unit_price }}</span>
                                                </div>
                                            @endif
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
</x-app-layout>

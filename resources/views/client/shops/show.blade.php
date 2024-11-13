<x-app-layout>
    <!-- product-area-start -->
    <section class="product-area pt-80 pb-25">
        <div class="container">
            <div class="row flex mx-auto justify-center">
                <div class="col-lg-4 col-md-12">
                    <div class="tpproduct-details__nab pr-50 mb-40 h-96">
                        <img class="w-full max-h-full"
                            src="{{ $shop->image ?? asset('img/product/home-one/product-1.jpg') }}" alt="">
                    </div>
                </div>
                <div class="col-lg-8 col-md-12">
                    <div class="tpproduct-details__content">
                        <div class="tpproduct-details__tag-area d-flex align-items-center mb-5">
                            <span class="tpproduct-details__tag"></span>
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
                            <h3 class="tpproduct-details__title">{{ $shop->name }}</h3><br>
                            <span
                                class="tpproduct-details__stock">{{ $shop->is_active ? 'Disponible' : 'Indisponible' }}</span>
                        </div>
                        <div class="tpproduct-details mb-30">
                            <span>Existe depuis le
                                {{ $shop->created_at->locale('fr')->translatedFormat('d F Y') }}</span><br>
                            <span>
                                Siège à (au) {{ $shop->address }}
                            </span>
                        </div>
                        <div class="tpproduct-details__count d-flex align-items-center flex-wrap mb-25">
                            <div class="tpproduct-details__cart">
                                <button>Contacter le proprietaire</button>
                            </div>
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
                                        data-bs-target="#reviews" type="button" role="tab" aria-controls="reviews"
                                        aria-selected="false">Notes et avis (2)</button>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content tp-content-tab" id="myTabContent-2">
                            <div class="tab-para tab-pane fade show active" id="home-1" role="tabpanel"
                                aria-labelledby="home-tab-1">
                                <p class="mb-30">
                                    {{ $shop->description }}
                                </p>
                            </div>
                            <div class="tab-pane fade" id="additional-information" role="tabpanel"
                                aria-labelledby="information-tab">
                                <div class="product__details-info table-responsive">
                                    <table class="table table-striped">
                                        <tbody>
                                            <tr>
                                                <td class="add-info">Nom</td>
                                                <td class="add-info-list">{{ $shop->name }}</td>
                                            </tr>
                                            <tr>
                                                <td class="add-info">Identité du vendeur</td>
                                                <td class="add-info-list"> {{ $shop->seller->first_name }} {{ $shop->seller->last_name }}</td>
                                            </tr>
                                            <tr>
                                                <td class="add-info">Adresse de la boutique</td>
                                                <td class="add-info-list">{{ $shop->address }}</td>
                                            </tr>
                                            <tr>
                                                <td class="add-info">Numéro de contact</td>
                                                <td class="add-info-list"><a class="hover:text-[#e38407]" href="tel:{{ $shop->seller->phone }}">{{ $shop->seller->phone }}</a></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                                <div class="product-details-review">
                                    <h3 class="tp-comments-title mb-35">
                                        3 notes pour la boutique {{ $shop->name }}
                                    </h3>
                                    <div class="latest-comments mb-55">
                                        <ul>
                                            <li>
                                                <div class="comments-box d-flex">
                                                    <div class="comments-avatar mr-25">
                                                        <img src="{{ $shop->image ?? asset('img/shop/reviewer-01.png') }}"
                                                            alt="Image de la boutique">
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
                        <h4 class="tpsection__title">Produits de la boutique</h4>
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
                    @if ($products->count() > 0)
                        @foreach ($products as $product)
                            <div class="swiper-slide">
                                <div class="tpproduct pb-15 mb-30">
                                    <div class="tpproduct__thumb p-relative">
                                        <a href="{{ route('products.show', $product->_id) }}">
                                            <img src="{{ asset('img/product/home-one/product-1.jpg') }}"
                                                alt="product-thumb">
                                            <img class="product-thumb-secondary"
                                                src="{{ asset('img/product/home-one/product-2.jpg') }}"
                                                alt="">
                                        </a>
                                        <div class="tpproduct__thumb-action">
                                            <a class="comphare" href="#"><i class="fal fa-exchange"></i></a>
                                            <a class="quckview" href="{{ route('products.show', $product->_id) }}"><i
                                                    class="fal fa-eye"></i></a>
                                            <a class="wishlist" href="wishlist.html"><i class="fal fa-heart"></i></a>
                                        </div>
                                    </div>
                                    <div class="tpproduct__content">
                                        <h3 class="tpproduct__title">
                                            <a href="{{ route('products.show', $product->_id) }}">
                                                {{ $product->name }}
                                            </a><br>
                                            <a href="javascript:;">
                                                Boutique : {{ $product->shop->name }}
                                            </a>
                                        </h3>
                                        <div class="tpproduct__priceinfo p-relative">
                                            <div class="tpproduct__priceinfo-list">
                                                <span>${{ $product->unit_price }}</span>
                                            </div>
                                            <div class="tpproduct__cart">
                                                <a href="cart.html"><i class="fal fa-shopping-cart"></i>
                                                    Ajouter à la liste des souhaits
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        {{ "Aucun produit enregistré pour l'instant dans la boutique." }}
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!-- related-product-area-end -->
</x-app-layout>

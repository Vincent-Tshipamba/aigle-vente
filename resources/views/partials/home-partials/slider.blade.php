<!-- slider-area-start -->
<section class="slider-area mb-40">
    <div class="container">
        <div class="row justify-content-xl-end">
            <div class="col-xl-9 col-xxl-7 col-lg-9">
                <div class="tp-slider-area p-relative">
                    <div class="swiper-container slider-active">
                        <div class="swiper-wrapper">
                            @foreach ($products->take(9) as $product)
                                <div class="swiper-slide">
                                    <div class="tp-slide-item">
                                        <div class="tp-slide-item__content">
                                            <h4 class="tp-slide-item__sub-title">
                                                {{ $product->category_product->name }}</h4>
                                            <h3 class="tp-slide-item__title mb-25 text-white">
                                                {{ $product->name }}
                                            </h3>
                                            <a class="tp-slide-item__slide-btn tp-btn" href="#">Contactez le
                                                vendeur maintenant <i class="fal fa-long-arrow-right"></i></a>
                                        </div>
                                        @php
                                            $firstImage = $product->photos()->first();
                                        @endphp
                                        <div class="tp-slide-item__img">
                                            <img loading="lazy" src="{{ $firstImage->image }}" alt="{{ $product->name }}">
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="slider-pagination"></div>
                </div>
            </div>
            <div class="col-xl-3 col-xxl-3 col-lg-3">
                <div class="row">
                    <div class="col-lg-12 col-md-6">
                        <div class="tpslider-banner tp-slider-sm-banner mb-30">
                            @if ($firstMostRecentProduct)
                                <a href="{{ route('products.show', $firstMostRecentProduct->id) }}">
                                    <div class="tpslider-banner__img">
                                        @php
                                            $firstMostRecentProductImage = $firstMostRecentProduct->photos()->first();
                                        @endphp
                                        <img src="{{ $firstMostRecentProductImage->image }}"
                                            alt="{{ $firstMostRecentProduct->name }}">
                                        <div class="tpslider-banner__content">
                                            <span class="tpslider-banner__sub-title">
                                                {{ $firstMostRecentProduct->category_product->name }}
                                            </span>
                                            <h4 class="tpslider-banner__title">
                                                {{ $firstMostRecentProduct->name }}
                                            </h4>
                                        </div>
                                    </div>
                                </a>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-6">
                        <div class="tpslider-banner">
                            @if ($secondMostRecentProduct)
                                <a href="{{ route('products.show', $secondMostRecentProduct->id) }}">
                                    <div class="tpslider-banner__img">
                                        @php
                                            $secondMostRecentProductImage = $secondMostRecentProduct->photos()->first();
                                        @endphp
                                        <img src="{{ $secondMostRecentProductImage->image }}"
                                            alt="{{ $secondMostRecentProductImage->name }}">
                                        <div class="tpslider-banner__content">
                                            <span class="tpslider-banner__sub-title">
                                                {{ $secondMostRecentProduct->category_product->name }}
                                            </span>
                                            <h4 class="tpslider-banner__title">
                                                {{ $firstMostRecentProduct->name }}
                                            </h4>
                                        </div>
                                    </div>
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- slider-area-end -->


<style>
    .tp-slide-item__img {
        width: 696px;
        /* Pour que l'image prenne toute la largeur du conteneur */
        height: 600px;
        /* Hauteur fixe */
        overflow: hidden;
        /* Pour cacher les parties débordantes */
        display: flex;
        align-items: center;
        /* Centrer l'image verticalement */
        justify-content: center;
        /* Centrer l'image horizontalement */
    }

    .tp-slide-item__img img {
        width: auto;
        /* Laisser la largeur automatique */
        height: 100%;
        /* Hauteur à 100% pour remplir le conteneur */
        object-fit: cover;
        /* Pour que l'image remplisse le conteneur sans déformation */
    }
</style>

<!-- shop-area-start -->
<section class="shop-area pb-100">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="tpsectionarea text-center mb-10">
                    <h5 class="tpsectionarea__subtitle">Offres Spéciales</h5>
                    <h4 class="tpsectionarea__title">Produits en Promotion</h4>
                </div>
            </div>
        </div>

        <div class="shopareaitem">
            <div class="shopslider-active swiper-container">
                @if (empty($promotions))
                @else
                    <div class="swiper-wrapper">
                        @foreach ($promotions as $promo)
                            @php
                                $firstPhoto = $promo->product->photos->first();
                                $initialPrice = $promo->product->price ?? 59;
                                $discountPercentage = $promo->discount_percentage ?? 1;
                                $discountPrice = $initialPrice - $initialPrice * ($discountPercentage / 100);
                            @endphp

                            <div
                                class="swiper-slide bg-gradient-to-br from-purple-50 to-purple-100 rounded-2xl shadow-lg transition-transform duration-300 hover:scale-105">
                                <div class="relative">
                                    <img src="{{ $firstPhoto->image ?? asset('img/floded/floded-01.png') }}"
                                        alt="{{ $promo->product->name }}"
                                        class="w-full h-64 object-cover rounded-t-2xl">
                                    <div
                                        class="absolute top-4 right-4 bg-[#e38407] text-white text-xl font-bold rounded-lg px-4 py-2">
                                        -{{ $discountPercentage }}%
                                    </div>
                                </div>
                                <div class="p-6">
                                    <h3 class="text-lg font-semibold mb-2">
                                        {{ $promo->product->name ?? 'Produit en promotion' }}</h3>
                                    <p class="text-gray-400 mr-3 text-xs">{!! substr($promo->product->description ?? 'Description non disponible', 0, 200) !!}</p>
                                    <div class="flex items-center gap-3 mb-4">
                                        <span
                                            class="text-2xl font-bold text-[#e38407]">{{ number_format($discountPrice, 2, ',', ' ') }}€</span>
                                        <del
                                            class="text-gray-500 text-lg">{{ number_format($initialPrice, 2, ',', ' ') }}€</del>
                                    </div>
                                    <a href="{{ route('products.show', $promo->product->_id) }}"
                                        class="bg-[#e38407] text-white px-4 py-2 rounded-lg text-center block hover:bg-orange-600 transition">
                                        Voir le produit
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="swiper-pagination mt-4"></div>
                @endif

            </div>
        </div>
    </div>
</section>
<!-- shop-area-end -->

<script>
    var swiper = new Swiper('.shopslider-active', {

        spaceBetween: 20,
        loop: true,
        autoplay: {
            delay: 3000
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true
        },
        breakpoints: {
            1024: {
                slidesPerView: 3
            },
            768: {
                slidesPerView: 2
            },
            480: {
                slidesPerView: 1
            },
        }
    });
</script>

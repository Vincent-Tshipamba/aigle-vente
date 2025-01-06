<!-- category-area-start -->
<section class="category-area mt-40">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="tpsection mb-40">
                    <h4 class="tpsection__title">Top <span> Catégories </span></h4>
                </div>
            </div>
        </div>
        <div class="shopslider-active swiper-container custom-row category-border justify-content-xl-between xl:gap-10">
            <div class="swiper-wrapper">
                @foreach ($categories as $i => $category)
                    <div class="tpcategory mb-40 tpshopitem swiper-slide">
                        <div class="popup-image">
                            <div class="tpcategory__icon bg-cover bg-center p-relative"
                                style="background-image: url('{{ asset($category->image) }}');">
                                <img loading="lazy" src="{{ asset($category->image) }}" width="33" height="50" />
                                <span>{{ $i + 1 }}</span>
                            </div>
                            <div class="tpcategory__content">
                                <h5 class="tpcategory__title">
                                    {{ $category->name }}
                                </h5>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>



<script>
    document.addEventListener('DOMContentLoaded', function() {
        const carouselElement = document.querySelector('#post-carousel');
        if (carouselElement) {
            new Splide(carouselElement, {
                type: 'loop',
                perPage: 5,
                perMove: 1,
                autoplay: true,
                interval: 3000,
                breakpoints: {
                    640: { // Mobile
                        perPage: 1,
                    },
                    768: { // Tablette
                        perPage: 2,
                    },
                    1024: { // Desktop
                        perPage: 4,
                    },
                },
            }).mount();
        } else {
            console.warn('L\'élément #post-carousel est introuvable.');
        }
    });
</script>

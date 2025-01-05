<section class="py-10">
    <div class="container mx-auto">
        <div class="tpsection mb-40">
            <h4 class="tpsection__title">Top <span> Catégories </span></h4>
        </div>

        @if ($categories->isEmpty())
            <p class="text-center text-gray-500">Aucune catégorie disponible pour le moment.</p>
        @else
            <div id="post-carousel" class="splide">
                <div class="splide__track">
                    <ul class="splide__list">
                        @foreach ($categories as $i => $category)
                            <li class="splide__slide">
                                <div class="text-center group">
                                    <!-- Image avec effet hover -->
                                    <div class="relative bg-cover bg-center rounded-full w-32 h-32 mx-auto mb-5 transition-transform duration-300 transform group-hover:scale-110"
                                        style="background-image: url('{{ asset($category->image ?? 'default-image.jpg') }}');">
                                        <span
                                            class="absolute top-0 right-0 w-8 h-8 bg-white text-[#e38407] rounded-full flex items-center justify-center font-bold shadow-md">
                                            {{ $i + 1 }}
                                        </span>
                                    </div>
                                    <!-- Titre -->
                                    <h5 class="text-lg font-semibold">
                                        {{ $category->name }}
                                    </h5>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif
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

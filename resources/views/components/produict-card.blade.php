@props(['products'])

<style>
    .swiper-pagination-bullet {
        background-color: #FF5500FF;
        width: 12px;
        height: 12px;
        opacity: 0.7;
    }

    .swiper-pagination-bullet-active {
        background-color: #2563eb;
        opacity: 1;
    }

    .swiper-button-prev,
    .swiper-button-next {
        width: 40px;
        height: 40px;
        color: #D8681DFF;
    }

    .swiper-button-prev::after,
    .swiper-button-next::after {
        font-size: 1.5rem;
    }
</style>

@foreach ($products as $index => $product)
    <div class="w-72 rounded-xl duration-500">
        <a href="#">
            <div class="swiper-container product-swiper-{{ $index + 1 }}" loading="lazy">
                <div class="swiper-wrapper">
                    @foreach ($product->photos as $item)
                        <div class="swiper-slide">
                            <img src="{{ asset($item->image) }}" alt="{{ $product->name }}"
                                 class="h-80 w-72 object-cover rounded-xl hover:scale-105">
                        </div>
                    @endforeach
                </div>

                <div class="swiper-pagination swiper-pagination-{{ $index + 1 }}"></div>
                <div class="swiper-button-prev swiper-button-prev-{{ $index + 1 }}"></div>
                <div class="swiper-button-next swiper-button-next-{{ $index + 1 }}"></div>
            </div>
        </a>
        <div class="px-4 py-3 w-72">
            <span class="text-gray-400 mr-3 uppercase text-xs">{{ $product->category_product->name }}</span>
            <p class="text-lg font-bold text-black truncate block capitalize">{{ $product->name }}</p>
            <div class="flex items-center">
                <p class="text-lg font-semibold text-black cursor-auto my-3">$149</p>
                <del>
                    <p class="text-sm text-gray-600 cursor-auto ml-2">$199</p>
                </del>
                <div class="ml-auto">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                         class="bi bi-bag-plus" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                              d="M8 7.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V12a.5.5 0 0 1-1 0v-1.5H6a.5.5 0 0 1 0-1h1.5V8a.5.5 0 0 1 .5-.5z"/>
                        <path
                              d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z"/>
                    </svg>
                </div>
            </div>
        </div>
    </div>
@endforeach

<script>
    document.querySelectorAll('.swiper-container').forEach((element, index) => {
        new Swiper(`.product-swiper-${index + 1}`, {
            direction: 'horizontal',
            loop: true,
            slidesPerView: 1,
            pagination: {
                el: `.swiper-pagination-${index + 1}`,
                clickable: true,
            },
            navigation: {
                nextEl: `.swiper-button-next-${index + 1}`,
                prevEl: `.swiper-button-prev-${index + 1}`,
            },
        });
    });
</script>

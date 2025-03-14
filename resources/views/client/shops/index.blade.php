<x-app-layout>
    <div class="container mx-auto my-4">
        <h2 class="text-2xl font-semibold text-gray-800 mb-4">Boutiques Disponibles</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">


            @foreach ($shops as $shop)
                <div
                    class="max-w-xs bg-white rounded-lg shadow hover:shadow-lg transition transform hover:-translate-y-1">
                    <!-- Image de profil en cercle -->
                    <div class="flex justify-center mt-4">
                        <img src="{{ $shop->image ?? asset('images/default-shop.png') }}"
                            alt="Image de {{ $shop->name }}"
                            class="w-24 h-24 object-cover rounded-full border border-gray-200">

                    </div>

                    <!-- Contenu de la carte -->
                    <div class="p-4 text-center">
                        <h3 class="text-lg font-bold text-gray-800">{{ $shop->name }}</h3>
                        <p class="text-gray-600 text-sm mt-1">
                            {!! substr($shop->description, 0, 100) !!}
                        </p>
                        <div class="flex items-center justify-center mt-2">
                            <svg class="w-4 h-4 text-gray-500 mr-1" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                </path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            <span class="text-gray-600 text-xs">{{ $shop->address }}</span>
                        </div>
                        <a href="{{ route('shops.show', $shop->_id) }}"
                            class="mt-4 block bg-[#e38407] hover:bg-[#e38407e7] text-white text-sm font-semibold py-2 px-4 rounded-full">
                            Visit Store
                        </a>
                    </div>
                </div>
            @endforeach




        </div>
    </div>

    <!-- footer-area-start -->
    @include('partials.home-partials.footer')
    <!-- footer-area-end -->
</x-app-layout>

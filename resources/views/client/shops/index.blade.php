<x-app-layout>
    <div class="container mx-auto my-4">
        <h2 class="text-2xl font-semibold text-gray-800 mb-4">Boutiques Disponibles</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">


            @foreach ($shops as $shop)
                <div
                    class="max-w-sm bg-white rounded-lg shadow-md hover:shadow-xl transition-all duration-300 hover:scale-105">
                    <img src="{{ $shop->image ? asset('storage/shops_profile/' . basename($shop->image)) : 'https://timelinecovers.pro/facebook-cover/download/eagle-looking-at-your-profile-facebook-cover.jpg' }}"
                        alt="Image de {{ $shop->name }}" class="w-full h-48 object-cover rounded-t-lg">

                    <div class="p-6">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-xl font-bold text-gray-800">{{ $shop->name }}</h3>
                            <div class="flex items-center">
                                <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                    </path>
                                </svg>
                                <span class="ml-1 text-gray-600">4.8</span>
                            </div>
                        </div>
                        <hr>
                        <p class="text-gray-600 mb-4">{!! substr($shop->description, 0, 100) !!}</p>
                        <div class="flex justify-between items-center mb-4">
                            <svg class="w-5 h-5 text-gray-500 mt-1" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                </path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            <span class="ml-2 text-gray-600">{{ $shop->address }}</span>
                        </div>
                        <a href="{{ route('shops.show', $shop->_id) }}"
                            class="block w-full text-center bg-[#e38407] hover:bg-[#e38407e7] text-white font-semibold py-2 px-4 rounded-lg transition-colors duration-300">Visit
                            Store</a>
                    </div>
                </div>
            @endforeach




        </div>
    </div>

    <!-- footer-area-start -->
    @include('partials.home-partials.footer')
    <!-- footer-area-end -->
</x-app-layout>

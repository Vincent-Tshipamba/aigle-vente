@extends('seller.layouts.app')

@section('content')
    <section class="py-8 bg-white md:py-16 dark:bg-gray-900 antialiased">
        <div class="max-w-screen-xl px-4 mx-auto 2xl:px-0">
            <div class="lg:grid lg:grid-cols-2 lg:gap-8 xl:gap-16">
                <!-- Container for the main image and thumbnails -->
                <div class="shrink-0 max-w-md lg:max-w-lg mx-auto">
                    @php
                        $firstPhoto = $product->photos->first();
                    @endphp

                    <!-- Main image -->
                    <img id="mainImage" class="w-full h-96 rounded-md mb-4" src="{{ asset('storage/' . $firstPhoto->image) }}"
                        alt="{{ $product->name }}" />

                    <!-- Thumbnails -->
                    <div class="flex gap-2 mt-4">
                        @foreach ($product->photos as $photo)
                            <img onclick="changeMainImage('{{ asset('storage/' . $photo->image) }}')"
                                src="{{ asset('storage/' . $photo->image) }}" alt="{{ $product->name }}"
                                class="w-20 h-20 object-cover rounded-md cursor-pointer border border-gray-300 hover:border-primary-500 transition-all" />
                        @endforeach
                    </div>
                </div>

                <!-- Product Details Section -->
                <div class="mt-6 sm:mt-8 lg:mt-0">
                    <!-- Product Name -->
                    <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white">
                        {{ $product->name }}
                    </h1>

                    <!-- Price and Promotion Request -->
                    <div class="mt-4 sm:items-center sm:gap-4 sm:flex">
                        <p class="text-2xl font-extrabold text-gray-900 sm:text-3xl dark:text-white">
                            ${{ number_format($product->unit_price, 2) }}
                        </p>

                        <!-- Promotion Request Button -->
                        <button data-modal-target="crud-modal" data-modal-toggle="crud-modal"
                            class="ml-4 py-2 px-4 bg-yellow-500 text-white rounded-lg hover:bg-yellow-600 focus:ring-4 focus:ring-yellow-300 font-medium">
                            Demander une promotion
                        </button>
                    </div>

                    <!-- Stock Quantity Display -->
                    <p class="mt-2 text-gray-500 dark:text-gray-400">
                        <strong>Solde : </strong>{{ $product->stock_quantity }} en stock
                    </p>

                    <!-- Dynamic Rating and Reviews -->
                    <div class="flex items-center gap-2 mt-4">
                        <div class="flex items-center gap-1">
                            @for ($i = 1; $i <= 5; $i++)
                                <svg class="w-4 h-4 {{ $i <= $product->rating ? 'text-yellow-300' : 'text-gray-300' }}"
                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M13.849 4.22c-.684-1.626-3.014-1.626-3.698 0L8.397 8.387l-4.552.361c-1.775.14-2.495 2.331-1.142 3.477l3.468 2.937-1.06 4.392c-.413 1.713 1.472 3.067 2.992 2.149L12 19.35l3.897 2.354c1.52.918 3.405-.436 2.992-2.15l-1.06-4.39 3.468-2.938c1.353-1.146.633-3.336-1.142-3.477l-4.552-.36-1.754-4.17Z" />
                                </svg>
                            @endfor
                        </div>
                        <p class="text-sm font-medium text-gray-500 dark:text-gray-400">
                            ({{ $product->rating }})
                        </p>
                        <a href="#"
                            class="text-sm font-medium text-gray-900 underline hover:no-underline dark:text-white">
                            {{ $product->reviews_count }} Avis
                        </a>
                    </div>

                    <!-- Seller Information -->
                    <div class="mt-6 p-4 bg-gray-100 dark:bg-gray-800 rounded-lg">
                        <h2 class="text-lg font-semibold text-gray-700 dark:text-white">Informations du vendeur</h2>
                        {{-- <p class="text-sm text-gray-500 dark:text-gray-400">Nom : {{ $product->seller->first_name }}</p>
                        <p class="text-sm text-gray-500 dark:text-gray-400">Note : {{ $product->seller->rating }} / 5</p>
                        <p class="text-sm text-gray-500 dark:text-gray-400">Ventes : {{ $product->seller->sales_count }} --}}
                        </p>
                        {{-- <a href="{{ route('seller.show', $product->seller->id) }}"
                            class="mt-2 inline-block text-primary-700 hover:underline dark:text-primary-500">
                            Voir le profil du vendeur
                        </a> --}}
                    </div>

                    <!-- Product Description -->
                    <p class="my-6 text-gray-500 dark:text-gray-400">
                        {{ $product->description }}
                    </p>
                </div>
            </div>
        </div>
    </section>

@section('modal')
    <!-- Main modal -->
    <div id="crud-modal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                        Demande de Promotion pour le Produit
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-toggle="crud-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <form class="p-4 md:p-5"
                    action="{{route('products.promotion',$product->id)}}"
                    method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="grid gap-4 mb-4 grid-cols-2">
                        <div class="col-span-2">
                            <label for="discount_percentage"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pourcentage de
                                Réduction</label>
                            <input type="number" name="discount_percentage" id="discount_percentage"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Type percentage" min="1" max="100" required="">
                        </div>
                        <div class="col-span-2">
                            <label for="promotion_duration"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Durée de la Promotion
                                (jours)</label>
                            <input type="number" name="promotion_duration" id="promotion_duration"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Type duration in days" min="1" required="">
                        </div>
                    </div>
                    <button type="submit"
                        class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Envoyer la Demande
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection


<!-- JavaScript Functions -->
<script>
    function changeMainImage(imageSrc) {
        document.getElementById("mainImage").src = imageSrc;
    }

    function requestPromotion() {
        alert("Votre demande de promotion a été envoyée !");
        // Vous pouvez ajouter une requête AJAX ici pour envoyer la demande au serveur.
    }
</script>
@endsection

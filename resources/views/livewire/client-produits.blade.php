<div>
    @if (request()->routeIs('products.index'))
        <!-- header-area-start -->
        @include('partials.header')
        <!-- header-area-end -->

        <!-- header-xl-sticky-area -->
        @include('partials.header-xl')
        <!-- header-xl-sticky-end -->

        <!-- header-md-lg-area -->
        @include('partials.header-md-lg')
        <!-- header-md-lg-area -->
    @endif

    <div class="relative container mb-6 max-w-full">
        <!-- Category Filter -->
        <div>
            <fieldset>
                <legend class="text-lg font-medium text-gray-700 mb-3">Filtres</legend>
                <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-1 w-full">
                    @foreach ($categories as $category)
                        <label class="flex items-center space-x-2 p-2 rounded cursor-pointer hover:bg-gray-50">
                            <input type="checkbox" id="{{ $category->name }}" name="{{ $category->name }}"
                                wire:model.live="filters.categories.{{ $category->id }}"
                                class="form-checkbox h-5 w-5 text-indigo-600 rounded border-gray-300 focus:ring-indigo-500">
                            <span class="text-gray-700 text-sm">{{ $category->name }}</span>
                        </label>
                    @endforeach
                </div>
            </fieldset>
        </div>
    </div>

    <section class="product-area pb-70" id="productSection">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-12">
                    <div class="tpsection mb-40">
                        <h4 class="tpsection__title">Produits <span> Populaires </span></h4>
                    </div>
                </div>
                <div class="col-md-6 col-12">
                    <div class="tpnavbar">
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <button class="nav-link active" id="nav-all-tab" data-bs-toggle="tab"
                                    data-bs-target="#nav-all" type="button" role="tab" aria-controls="nav-all"
                                    aria-selected="true">Tous</button>
                                <button class="nav-link" id="nav-popular-tab" data-bs-toggle="tab"
                                    data-bs-target="#nav-popular" type="button" role="tab"
                                    aria-controls="nav-popular" aria-selected="false">Populaires</button>
                                <button class="nav-link" id="nav-sale-tab" data-bs-toggle="tab"
                                    data-bs-target="#nav-sale" type="button" role="tab" aria-controls="nav-sale"
                                    aria-selected="false">En
                                    Promotion</button>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="tab-content" id="nav-tabContent">
                <div id="product-container" class="w-full md:inset-0">
                    @if ($products && $products->count() == 0)
                        <div class="p-4 text-sm text-gray-800 rounded-lg bg-gray-50 dark:bg-gray-800 dark:text-gray-300"
                            role="alert">
                            <span class="font-medium">oups desole!</span> aucun produit disponible pour le moment.
                        </div>
                    @else
                        <div
                            class="row row-cols-xxl-5 row-cols-xl-4 row-cols-lg-3 row-cols-md-2 row-cols-sm-2 row-cols-1 mx-auto">
                            @foreach ($products as $product)
                                <div class="col product">
                                    <div class="tpproduct pb-15 mb-30">
                                        <div class="tpproduct__thumb p-relative">
                                            <a href="{{ route('products.show', $product->_id) }}">
                                                @php
                                                    $firstPhoto = $product->photos->first();
                                                @endphp
                                                @if ($firstPhoto)
                                                    <img loading="lazy" src="{{ asset($firstPhoto->image) }}"
                                                        alt="{{ $product->name }}">
                                                    <img class="product-thumb-secondary"
                                                        src="{{ asset($firstPhoto->image) }}" alt="">
                                                @endif
                                            </a>
                                            <div class="tpproduct__thumb-action">
                                                <a class="comphare" href="#"
                                                    onclick="addToWishList(event, {{ $product->id }})"><i
                                                        class="fal fa-heart"></i></a>

                                                <a class="quckview"
                                                    href="{{ route('products.show', $product->_id) }}"><i
                                                        class="fal fa-eye"></i></a>

                                                <!-- Button to send message -->
                                                <a href="#" class="quckview message-button"
                                                    data-seller-id="{{ $product->shop->seller->user->id }}"
                                                    data-product-id="{{ $product->id }}">
                                                    <i class="fal fa-comment"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="tpproduct__content">
                                            <h3 class="tpproduct__title"><a
                                                    href="{{ route('products.show', $product->_id) }}">{{ $product->name }}</a>
                                            </h3>
                                            <p class="tpproduct__shop-name">Boutique {{ $product->shop->name }}</p>
                                            <p class="tpproduct__title">Propriétaire
                                                {{ $product->shop->seller->first_name }}
                                                {{ $product->shop->seller->last_name }}</p>
                                            <div class="tpproduct__priceinfo p-relative">
                                                <div class="tpproduct__priceinfo-list">
                                                    <span>{{ number_format($product->unit_price, 2, ',', ' ') }}
                                                        $</span>
                                                    @if ($product->old_price)
                                                        <span
                                                            class="tpproduct__priceinfo-list-oldprice">{{ number_format($product->old_price, 2, ',', ' ') }}
                                                            €</span>
                                                    @endif
                                                </div>
                                                <div class="tpproduct__cart">
                                                    <a href=""
                                                        onclick="addToWishList(event, {{ $product->id }})"><i
                                                            class="fal fa-heart"></i>
                                                        Ajouter à la liste des souhaits
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="justify-center">
                            <div class="text-center">
                                <button type="button" onclick="window.location.href='/products'"
                                    class="rounded-full border text-white hover:font-bold bg-gray-400 hover:bg-[#040404] px-10 py-3 space-x-3">
                                    <span>Voir tous les produits</span>
                                    <i class="fal fa-long-arrow-right"></i>
                                </button>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
</div>

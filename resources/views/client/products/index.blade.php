<x-app-layout>
    <section class="product-area pb-70" id="productSection">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-12">
                    <div class="tpsection mb-40">
                        <h4 class="tpsection__title">Produits <span> Populaires <img
                                    src="{{ asset('img/icon/title-shape-01.jpg') }}" alt=""></span></h4>
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
                    @if (empty($products))
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
                                                    <img src="{{ asset($firstPhoto->image) }}"
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

                            <input type="hidden" id="start" value="0">
                            <input type="hidden" id="rowperpage" value="{{ $rowperpage }}">
                            <input type="hidden" id="totalProducts" value="{{ $totalProducts }}">
                        </div>
                    @endif
                </div>
                <!-- Répétez la structure ci-dessus pour chaque onglet avec des conditions pour filtrer les produits -->
                <div class="tab-pane fade" id="nav-popular" role="tabpanel" aria-labelledby="nav-popular-tab">
                    {{-- <div class="row row-cols-xxl-5 row-cols-xl-4 row-cols-lg-3 row-cols-md-2 row-cols-sm-2 row-cols-1">
                    @foreach ($popularProducts as $product)
                    <div class="col">
                        <div class="tpproduct pb-15 mb-30">
                            <div class="tpproduct__thumb p-relative">
                                <a href="{{ route('shop.details', $product->id) }}">
                                    <img src="{{ asset($product->image_primary) }}" alt="{{ $product->name }}">
                                    <img class="product-thumb-secondary" src="{{ asset($product->image_secondary) }}"
                                        alt="">
                                </a>
                                <div class="tpproduct__thumb-action">
                                    <a class="comphare" href="#"><i class="fal fa-exchange"></i></a>
                                    <a class="quckview" href="#"><i class="fal fa-eye"></i></a>
                                    <a class="wishlist" href="{{ route('wishlist.add', $product->id) }}"><i class="fal fa-heart"></i></a>
                                </div>
                            </div>
                            <div class="tpproduct__content">
                                <h3 class="tpproduct__title"><a href="{{ route('shop.details', $product->id) }}">{{ $product->name }}</a></h3>
                                <div class="tpproduct__priceinfo p-relative">
                                    <div class="tpproduct__priceinfo-list">
                                        <span>{{ number_format($product->price, 2, ',', ' ') }} €</span>
                                        @if ($product->old_price)
                                            <span class="tpproduct__priceinfo-list-oldprice">{{ number_format($product->old_price, 2, ',', ' ') }} €</span>
                                        @endif
                                    </div>
                                    <div class="tpproduct__cart">
                                        <a href="{{ route('cart.add', $product->id) }}"><i class="fal fa-shopping-cart"></i>Ajouter au Panier</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div> --}}
                </div>
                <div class="tab-content" id="nav-sale">
                    <div class="tab-pane fade" id="nav-sale" role="tabpanel" aria-labelledby="nav-sale-tab">
                        <div
                            class="row row-cols-xxl-5 row-cols-xl-4 row-cols-lg-3 row-cols-md-2 row-cols-sm-2 row-cols-1">
                            @foreach ($saleProducts as $product)
                                <div class="col">
                                    <div class="tpproduct pb-15 mb-30">
                                        <div class="tpproduct__thumb p-relative">
                                            <a href="">
                                                @php
                                                    $firstPhoto = $product->photos->first();
                                                @endphp
                                                <img src="{{ asset('storage/' . $firstPhoto->image) }}"
                                                    alt="{{ $product->name }}">
                                                <img class="product-thumb-secondary"
                                                    src="{{ asset('storage/' . $firstPhoto->image) }}"
                                                    alt="">
                                            </a>
                                            <div class="tpproduct__thumb-action">
                                                <a class="comphare"
                                                    onclick="addToWishList(event, {{ $product->id }})"
                                                    href="#"><i class="fal fa-exchange"></i></a>

                                                <a class="quckview" href="#"><i class="fal fa-eye"></i></a>
                                                <a class="wishlist" href=""><i class="fal fa-heart"></i></a>
                                            </div>
                                        </div>
                                        <div class="tpproduct__content">
                                            <h3 class="tpproduct__title"><a href="">{{ $product->name }}</a>
                                            </h3>
                                            <div class="tpproduct__priceinfo p-relative">
                                                <div class="tpproduct__priceinfo-list">
                                                    <span>{{ number_format($product->unit_price * (1 - $product->promotions->first()->discount_percentage / 100), 2, ',', ' ') }}
                                                        €</span>
                                                    @if ($product->old_price)
                                                        <span
                                                            class="tpproduct__priceinfo-list-oldprice">{{ number_format($product->old_price, 2, ',', ' ') }}
                                                            €</span>
                                                    @endif
                                                </div>
                                                <div class="tpproduct__cart">
                                                    <a href=""><i class="fal fa-shopping-cart"></i>Ajouter au
                                                        Panier</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-rate" role="tabpanel" aria-labelledby="nav-rate-tab">
                    {{-- <div class="row row-cols-xxl-5 row-cols-xl-4 row-cols-lg-3 row-cols-md-2 row-cols-sm-2 row-cols-1">
                    @foreach ($ratedProducts as $product)
                    <div class="col">
                        <div class="tpproduct pb-15 mb-30">
                            <div class="tpproduct__thumb p-relative">
                                <a href="{{ route('shop.details', $product->id) }}">
                                    <img src="{{ asset($product->image_primary) }}" alt="{{ $product->name }}">
                                    <img class="product-thumb-secondary" src="{{ asset($product->image_secondary) }}"
                                        alt="">
                                </a>
                                <div class="tpproduct__thumb-action">
                                    <a class="comphare" href="#"><i class="fal fa-exchange"></i></a>
                                    <a class="quckview" href="#"><i class="fal fa-eye"></i></a>
                                    <a class="wishlist" href="{{ route('wishlist.add', $product->id) }}"><i class="fal fa-heart"></i></a>
                                </div>
                            </div>
                            <div class="tpproduct__content">
                                <h3 class="tpproduct__title"><a href="{{ route('shop.details', $product->id) }}">{{ $product->name }}</a></h3>
                                <div class="tpproduct__priceinfo p-relative">
                                    <div class="tpproduct__priceinfo-list">
                                        <span>{{ number_format($product->price, 2, ',', ' ') }} €</span>
                                        @if ($product->old_price)
                                            <span class="tpproduct__priceinfo-list-oldprice">{{ number_format($product->old_price, 2, ',', ' ') }} €</span>
                                        @endif
                                    </div>
                                    <div class="tpproduct__cart">
                                        <a href="{{ route('cart.add', $product->id) }}"><i class="fal fa-shopping-cart"></i>Ajouter au Panier</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div> --}}
                </div>
            </div>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const messageButtons = document.querySelectorAll('.message-button'); // Sélection par classe

            messageButtons.forEach(button => {
                button.addEventListener('click', function(event) {
                    event.preventDefault(); // Empêche le comportement par défaut du lien

                    const sellerId = this.getAttribute('data-seller-id');
                    const productId = this.getAttribute('data-product-id');
                    const message = "Est-ce que le produit est toujours disponible?";

                    // Préparer les données du message
                    const formData = new FormData();
                    formData.append('seller_id', sellerId);
                    formData.append('product_id', productId);
                    formData.append('message', message);
                    formData.append('_token', '{{ csrf_token() }}'); // CSRF token

                    console.log(sellerId);


                    // Envoyer la requête AJAX
                    fetch("{{ route('messages.send', ':seller_id') }}".replace(':seller_id',
                            sellerId), {
                            method: 'POST',
                            body: formData
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                Swal.fire({
                                    icon: 'success',
                                    title: data.message,
                                    text: '{{ session('success') }}',
                                    toast: true,
                                    position: 'top-end',
                                    timer: 3000,
                                    showConfirmButton: false,
                                    timerProgressBar: true,
                                });
                            } else {
                                alert("Échec de l'envoi du message.");
                            }
                        })
                        .catch(error => console.error('Erreur:', error));
                });
            });
        });
    </script>


    <style>
        .tpproduct__thumb img {
            width: 400px;
            /* Prend toute la largeur du conteneur */
            height: 375px;
            /* Définir une hauteur fixe */
            object-fit: cover;
            /* Recadrage de l'image pour remplir le conteneur sans déformer */
        }
    </style>

    <script src="{{ Vite::asset('node_modules/jquery/dist/jquery.min.js') }}"></script>
    <script>
        function checkWindowSize(rowperpage = null, totalSearchResults = null) {
            if ($(window).height >= $(document).height) {
                if (rowperpage && totalSearchResults) {
                    fetchSearchProducts(rowperpage, totalSearchResults)
                } else {
                    fetchProducts();
                }
            }
        }

        function fetchProducts() {
            var start = Number($('#start').val())
            var rowperpage = Number($('#rowperpage').val())
            var totalProducts = Number($('#totalProducts').val())
            start = start + rowperpage

            if (start <= totalProducts) {
                $('#start').val(start);

                $.ajax({
                    type: "get",
                    url: "{{ route('getProducts') }}",
                    data: {
                        start: start,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: "json",
                    success: function(response) {
                        $(".product:last").after(response).show().fadeIn()

                        checkWindowSize();
                    }
                });
            }
        }

        $(document).on('touchmove', onScroll)

        $(window).scroll(function() {
            onScroll();
        });

        function onScroll() {
            var productSectionTop = $('#productSection').offset().top;
            var windowScrollTop = $(window).scrollTop();
            var windowHeight = $(window).height();

            if (windowScrollTop + windowHeight > productSectionTop && windowScrollTop < productSectionTop + $(
                    '#productSection').height()) {
                if (windowScrollTop > ($('#productSection').height() - windowHeight - 100)) {
                    fetchProducts();
                }
            }
        }
    </script>

</x-app-layout>

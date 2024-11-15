<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{ asset('img\logo\logo_sans_bg.png') }}" type="image/x-icon">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Aigle Vente</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <link rel="stylesheet" href="{{ asset('css/alternativecss.css') }}">
    @endif

    <!-- CSS here -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('css/swiper-bundle.css') }}">
    <link rel="stylesheet" href="{{ asset('css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery-ui.css') }}">
    <link rel="stylesheet" href="{{ asset('css/meanmenu.css') }}">
    <link rel="stylesheet" href="{{ asset('css/spacing.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
</head>

<body>
    <!-- header-area-start -->
    @include('partials.home-partials.header')
    <!-- header-area-end -->

    <!-- header-xl-sticky-area -->
    @include('partials.home-partials.header-xl')
    <!-- header-xl-sticky-end -->

    <!-- header-md-lg-area -->
    @include('partials.home-partials.header-md-lg')
    <!-- header-md-lg-area -->

    <!-- sidebar-menu-area -->
    @include('partials.home-partials.sidebar-menu')
    <!-- sidebar-menu-area-end -->

    @auth
        <!-- header-cart-start -->
        @include('partials.home-partials.header-cart')
        <!-- header-cart-end -->
    @endauth

    <main>
        <!-- slider-area-start -->
        @include('partials.home-partials.slider')
        <!-- slider-area-end -->

        <!-- category-area-start -->
        @include('partials.home-partials.category')
        <!-- category-area-end -->

        <!-- product-area-start -->
        @include('partials.home-partials.product')
        <!-- product-area-end -->

        <!-- deal-product-area-start -->
        @include('partials.home-partials.deal-product')
        <!-- deal-product-area-end -->

        <!-- shop-area-start -->
        @include('partials.home-partials.shop')
        <!-- shop-area-end -->
    </main>

    <!-- footer-area-start -->
    @include('partials.home-partials.footer')
    <!-- footer-area-end -->

    <!-- JS here -->
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/waypoints.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/swiper-bundle.js') }}"></script>
    <script src="{{ asset('js/slick.js') }}"></script>
    <script src="{{ asset('js/magnific-popup.js') }}"></script>
    <script src="{{ asset('js/nice-select.js') }}"></script>
    <script src="{{ asset('js/counterup.js') }}"></script>
    <script src="{{ asset('js/wow.js') }}"></script>
    <script src="{{ asset('js/isotope-pkgd.js') }}"></script>
    <script src="{{ asset('js/imagesloaded-pkgd.js') }}"></script>
    <script src="{{ asset('js/countdown.js') }}"></script>
    <script src="{{ asset('js/ajax-form.js') }}"></script>
    <script src="{{ asset('js/meanmenu.js') }}"></script>
    <script src="{{ asset('js/jquery.knob.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ Vite::asset('node_modules/flowbite/dist/flowbite.min.js') }}"></script>
    <script src="{{ Vite::asset('node_modules/sweetalert2/dist/sweetalert2.min.js') }}"></script>
    <script>
        function confirmLogout() {
            Swal.fire({
                title: 'Êtes-vous sûr de vouloir vous déconnecter ?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Oui',
                cancelButtonText: 'Annuler'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('logout-form').submit();
                }
            });
        }
    </script>

<script>
    $(document).ready(function() {
        let currentPage = 1; // Start at the first page
        let loading = false; // Flag to prevent multiple requests at once
        const productContainer = document.getElementById('product-container');
        const loadingMessage = document.getElementById('loading-message');
        const prevButton = document.getElementById('prev-button');
        const nextButton = document.getElementById('next-button');

        // Function to fetch products from the server
        function fetchProducts(page) {
            if (loading) return; // Prevent multiple requests at the same time
            loading = true; // Set the flag to true to indicate we're loading products

            loadingMessage.style.display = 'block'; // Show loading message

            fetch('{{ route('products.index') }}?page=' + page)
                .then(response => response.json())
                .then(data => {
                    // Remove the loading message
                    loadingMessage.style.display = 'none';

                    // Clear the existing products
                    productContainer.innerHTML = '';

                    // Check if there are products
                    if (data.data.length > 0) {
                        // Loop through products and append them to the container
                        data.data.forEach(product => {
                            const productHtml = `
                            <div class="col">
                                <div class="tpproduct pb-15 mb-30">
                                    <div class="tpproduct__thumb p-relative">
                                        <a href="/products/${product._id}">
                                            ${product.photos.length > 0 ? `
                                                    <img src="/storage/${product.photos[0].image}" alt="${product.name}">
                                                    <img class="product-thumb-secondary" src="/storage/${product.photos[0].image}" alt="">
                                                ` : ''}
                                        </a>
                                        <div class="tpproduct__thumb-action">
                                            <a class="comphare" href="#"><i class="fal fa-heart"></i></a>
                                            <a class="quckview" href="/products/${product._id}"><i class="fal fa-eye"></i></a>
                                            <a href="#" class="quckview message-button" data-seller-id="${product.shop.seller.user.id}" data-product-id="${product._id}">
                                                <i class="fal fa-comment"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="tpproduct__content">
                                        <h3 class="tpproduct__title"><a href="/products/${product._id}">${product.name}</a></h3>
                                        <p class="tpproduct__shop-name">Boutique ${product.shop.name}</p>
                                        <p class="tpproduct__title">Propriétaire ${product.shop.seller.first_name} ${product.shop.seller.last_name}</p>
                                        <div class="tpproduct__priceinfo p-relative">
                                            <div class="tpproduct__priceinfo-list">
                                                <span>${product.unit_price} $</span>
                                                ${product.old_price ? `<span class="tpproduct__priceinfo-list-oldprice">${product.old_price} €</span>` : ''}
                                            </div>
                                            <div class="tpproduct__cart">
                                                <a href="#"><i class="fal fa-shopping-cart"></i>Ajouter au Panier</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        `;
                            productContainer.innerHTML += productHtml; // Append new products
                        });

                        // Show or hide pagination buttons based on current page and available pages
                        if (data.prev_page_url) {
                            prevButton.style.display = 'inline-block'; // Show 'Previous' button
                        } else {
                            prevButton.style.display = 'none'; // Hide 'Previous' button if on the first page
                        }

                        if (data.next_page_url) {
                            nextButton.style.display = 'inline-block'; // Show 'Next' button
                        } else {
                            nextButton.style.display = 'none'; // Hide 'Next' button if on the last page
                        }
                    }

                    loading = false; // Reset loading flag after products are fetched
                })
                .catch(error => {
                    console.error('Error fetching products:', error);
                    loading = false;
                    loadingMessage.style.display = 'none';
                });
        }

        // Initial load when page loads
        fetchProducts(currentPage);

        // Next button: Load next page of products
        nextButton.addEventListener('click', function() {
            currentPage++; // Increment page number
            fetchProducts(currentPage); // Fetch products for the next page
        });

        // Previous button: Load previous page of products
        prevButton.addEventListener('click', function() {
            if (currentPage > 1) {
                currentPage--; // Decrement page number
                fetchProducts(currentPage); // Fetch products for the previous page
            }
        });
    });
</script>


</body>

</html>

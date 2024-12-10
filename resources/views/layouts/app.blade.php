<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

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
    <!-- preloader -->
    @include('partials.preloader')
    <!-- preloader end  -->

    <!-- Scroll-top -->
    @include('partials.scroll-top')
    <!-- Scroll-top-end-->

    <!-- header-area-start -->
    @include('partials.header')
    <!-- header-area-end -->

    <!-- header-xl-sticky-area -->
    @include('partials.header-xl')
    <!-- header-xl-sticky-end -->

    <!-- header-md-lg-area -->
    @include('partials.header-md-lg')
    <!-- header-md-lg-area -->

    <!-- sidebar-menu-area -->
    @include('partials.sidebar-menu')
    <!-- sidebar-menu-area-end -->

    @auth
        <!-- header-cart-start -->
        @include('partials.header-cart')
        <!-- header-cart-end -->
    @endauth

    <main class="main-content">
        {{ $slot }}
    </main>

    @yield('footer')

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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
        function addToWishList(event, productId) {
            event.preventDefault();
            let isAuthenticated = @auth true @else false @endauth;
            if(isAuthenticated){
                $.ajax({
                    type: "post",
                    url: "{{ route('client.wishlist.add') }}",
                    data: {
                        _token: "{{ csrf_token() }}",
                        productId: productId
                    },
                    dataType: "json",
                    success: function(response) {
                        if (response.count) {
                            $('.wishcount').text(response.count)
                            const Toast = Swal.mixin({
                                toast: true,
                                position: "top-end",
                                showConfirmButton: false,
                                timer: 3000,
                                timerProgressBar: true,
                                didOpen: (toast) => {
                                    toast.onmouseenter = Swal.stopTimer;
                                    toast.onmouseleave = Swal.resumeTimer;
                                }
                            });
                            Toast.fire({
                                icon: "success",
                                title: response.success
                            });
                        }

                        if (response.exists) {
                            const Toast = Swal.mixin({
                                toast: true,
                                position: "top-end",
                                showConfirmButton: false,
                                timer: 3000,
                                timerProgressBar: true,
                                didOpen: (toast) => {
                                    toast.onmouseenter = Swal.stopTimer;
                                    toast.onmouseleave = Swal.resumeTimer;
                                }
                            });
                            Toast.fire({
                                icon: "success",
                                title: response.exists
                            });
                        }
                    }
                });
            } else {
                window.location.href="{{ route('login') }}"
            }
        }
    </script>

    <script>
        $('.search-input').keypress(function(e) {
            var value = $(this).val();
            const searchResults = `
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
                            </div>
                        </div>
                        <div class="w-full md:inset-0 product-container">
                            <div
                                class="row row-cols-xxl-5 row-cols-xl-4 row-cols-lg-3 row-cols-md-2 row-cols-sm-2 row-cols-1 mx-auto">
                                <div class="col searchResultProduct">
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            `;

            $.ajax({
                type: "get",
                url: "{{ route('products.search') }}",
                data: {
                    _token: "{{ csrf_token() }}",
                    value: value
                },
                dataType: "json",
                success: function(response) {
                    const html = response.html
                    $('.main-content').html(searchResults)

                    const productContainer = $('.product-container');
                    if (html.trim() === '') {
                        productContainer.html(`
                            <div class="p-4 text-md text-gray-800 mx-auto text-center rounded-lg bg-gray-50 dark:bg-gray-800 dark:text-gray-300" role="alert">
                                <span class="font-medium">Oups désolé!</span> Aucun produit disponible correspondant à votre recherche. <br><br>
                                <button onclick="window.location.href='/products'" class="footer-widget__fw-news-btn tpsecondary-btn">Voir le catalogue des produits disponibles<i
                                                class="fal fa-long-arrow-right"></i></button>
                            </div>
                        `);
                    } else {
                        $(".searchResultProduct:last").after(response.html).show().fadeIn()
                    }
                },
                error: function(xhr, status, error) {
                    console.error("Error fetching products:", error);
                }
            });
        });

        function fetchSearchProducts(rowperpage=15, total=null) {
            var start = 0
            start = start + rowperpage


            if (start <= total) {
                $.ajax({
                    type: "get",
                    url: "{{ route('getSearchProducts') }}",
                    data: {
                        start: start,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: "json",
                    success: function(response) {
                        $(".searchResultProduct:last").after(response).show().fadeIn()

                        checkWindowSize(response.rowperpage, response.totalSearchResults);
                    }
                });
            }
        }
    </script>

    @yield('script')
</body>

</html>

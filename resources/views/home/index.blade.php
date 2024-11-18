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
    function checkWindowSize() {
        if($(window).height >= $(document).height){
            fetchProducts();
        }
    }

    function fetchProducts() {
        var start = Number($('#start').val())
        var rowperpage = Number($('#rowperpage').val())
        var totalProducts = Number($('#totalProducts').val())

        start = start + rowperpage

        if(start <= totalProducts){
            $('#start').val(start);

            $.ajax({
                type: "get",
                url: "{{ route('getProducts') }}",
                data: {
                    start: start,
                    _token: '{{ csrf_token() }}'
                },
                dataType: "json",
                success: function (response) {

                    $(".product:last").after(response).show().fadeIn()

                    checkWindowSize();
                }
            });
        }
    }

    $(document).on('touchmove', onScroll)

    $(window).scroll(function () {
        onScroll();
    });

    function onScroll() {
        if($(window).scrollTop() > ($(document).height() - $(window).height() - 100)){
            fetchProducts();
        }
    }
</script>


</body>

</html>

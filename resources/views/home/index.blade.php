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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css">
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>
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
    <link rel="stylesheet" href="{{ asset('css/loaders.css') }}">
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

    <main class="main-content">
        <!-- slider-area-start -->
        <section class="slider-area pb-25 lazy-section" data-url="{{ route('home.slider') }}">
            <div class="container">
                <div class="row justify-content-xl-end">
                    <!-- Section principale du slider -->
                    <div class="col-xl-9 col-xxl-7 col-lg-9">
                        <div class="tp-slider-area p-relative">
                            <div class="swiper-container slider-active">
                                <div class="swiper-wrapper">
                                    <!-- Placeholder des slides -->
                                    @for ($i = 0; $i < 9; $i++)
                                        <div class="swiper-slide placeholder-slide h-full">
                                            <div class="tp-slide-item">
                                                <div class="tp-slide-item__content">
                                                    <div class="tp-slide-item__sub-title-placeholder"></div>
                                                    <div class="tp-slide-item__title-placeholder mb-25"></div>
                                                    <div class="tp-slide-item__btn-placeholder"></div>
                                                </div>
                                                <div class="tp-slide-item__img-placeholder load" style="height: 420px">
                                                </div>
                                            </div>
                                        </div>
                                    @endfor
                                </div>
                            </div>
                            <div class="slider-pagination"></div>
                        </div>
                    </div>
                    <!-- Section des bannières -->
                    <div class="col-xl-3 col-xxl-3 col-lg-3">
                        <div class="row">
                            @for ($i = 0; $i < 2; $i++)
                                <div class="col-lg-12 col-md-6">
                                    <div class="tpslider-banner tp-slider-sm-banner mb-30 placeholder-banner">
                                        <div class="tpslider-banner__img">
                                            <div class="placeholder-image load"></div>
                                            <div class="tpslider-banner__content">
                                                <div class="placeholder-sub-title"></div>
                                                <div class="placeholder-title"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endfor
                        </div>
                    </div>
                </div>
            </div>
        </section>

        
        <!-- slider-area-end -->

        <!-- category-area-start -->

        {{-- <section class="category-area pt-70 lazy-section" data-url="{{ route('home.category') }}">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="tpsection mb-40">
                            <h4 class="tpsection__title">Top <span>Catégories</span></h4>
                        </div>
                    </div>
                </div>
                <div class="custom-row category-border pb-45 justify-content-xl-between xl:gap-10">
                    <!-- Placeholder Elements -->
                    @for ($i = 0; $i < $categories->count(); $i++)
                        <div class="tpcategory mb-40 placeholder">
                            <div class="tpcategory__icon shimmer">
                                <div class="shimmer" style="width: 33px; height: 50px;"></div>
                                <span class="shimmer" style="width: 20px; height: 20px; border-radius: 50%;"></span>
                            </div>
                            <div class="tpcategory__content">
                                <h5 class="tpcategory__title">
                                    <div class="shimmer" style="width: 100px; height: 20px;"></div>
                                </h5>
                            </div>
                        </div>
                    @endfor
                </div>
            </div>
        </section> --}}

        @include('partials.home-partials.category')
        <!-- category-area-end -->

        <!-- product-area-start -->
        <section class="product-area pt-95 pb-70 lazy-section" data-url="{{ route('home.product') }}"
            id="productSection">
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
                                        data-bs-target="#nav-all" type="button" role="tab"
                                        aria-controls="nav-all" aria-selected="true">Tous</button>
                                    <button class="nav-link" id="nav-popular-tab" data-bs-toggle="tab"
                                        data-bs-target="#nav-popular" type="button" role="tab"
                                        aria-controls="nav-popular" aria-selected="false">Populaires</button>
                                    <button class="nav-link" id="nav-sale-tab" data-bs-toggle="tab"
                                        data-bs-target="#nav-sale" type="button" role="tab"
                                        aria-controls="nav-sale" aria-selected="false">En
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
                                <span class="font-medium">Oups désolé !</span> Aucun produit disponible pour le moment.
                            </div>
                        @else
                            <div
                                class="row row-cols-xxl-5 row-cols-xl-4 row-cols-lg-3 row-cols-md-2 row-cols-sm-2 row-cols-1 mx-auto">
                                @for ($i = 0; $i < $products->count(); $i++)
                                    <!-- Affiche 6 placeholders -->
                                    <div class="col product">
                                        <div class="tpproduct pb-15 mb-30">
                                            <div class="tpproduct__thumb p-relative">
                                                <div class="placeholder-shimmer"
                                                    style="width: 100%; height: 375px; border-radius: 8px;"></div>

                                                <div class="tpproduct__thumb-action">
                                                    <span class="placeholder-shimmer"
                                                        style="width: 20px; height: 20px; border-radius: 50%; margin-right: 10px;"></span>
                                                    <span class="placeholder-shimmer"
                                                        style="width: 20px; height: 20px; border-radius: 50%; margin-right: 10px;"></span>
                                                    <span class="placeholder-shimmer"
                                                        style="width: 20px; height: 20px; border-radius: 50%;"></span>
                                                </div>
                                            </div>
                                            <div class="tpproduct__content">
                                                <h3 class="tpproduct__title">
                                                    <div class="placeholder-shimmer"
                                                        style="width: 80%; height: 20px; border-radius: 4px;"></div>
                                                </h3>
                                                <p class="tpproduct__shop-name">
                                                <div class="placeholder-shimmer"
                                                    style="width: 60%; height: 15px; margin-top: 5px; border-radius: 4px;">
                                                </div>
                                                </p>
                                                <p class="tpproduct__title">
                                                <div class="placeholder-shimmer"
                                                    style="width: 50%; height: 15px; margin-top: 5px; border-radius: 4px;">
                                                </div>
                                                </p>
                                                <div class="tpproduct__priceinfo p-relative">
                                                    <div class="placeholder-shimmer"
                                                        style="width: 60%; height: 20px; margin-top: 10px; border-radius: 4px;">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endfor
                            </div>
                        @endif
                    </div>

                    <div class="flex justify-center mx-auto">
                        <div class="placeholder-shimmer"
                            style="width: 30%; height: 15px; margin-top: 10px; border-radius: 4px;">
                        </div>
                    </div>
                </div>
        </section>
        <!-- product-area-end -->

        <!-- deal-product-area-start -->
        <section class="dealproduct-area pb-95 lazy-section" data-url="{{ route('home.dealProduct') }}">
            <div class="container">
                <div class="theme-bg pt-40 pb-40">
                    <div class="row">
                        <div class="col-lg-6 col-md-12">
                            <div class="tpdealproduct">
                                <div class="tpdealproduct__thumb p-relative text-center">
                                    <!-- Placeholder pour l'image -->
                                    <div class="placeholder-shimmer"
                                        style="width: 100%; height: 200px; border-radius: 8px;"></div>
                                    <div class="tpdealproductd__offer">
                                        <h5 class="tpdealproduct__offer-price placeholder-shimmer"
                                            style="width: 50%; height: 20px; margin: 10px auto; border-radius: 4px;">
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="tpdealcontact pt-30">
                                <div class="tpdealcontact__price mb-5">
                                    <span class="placeholder-shimmer"
                                        style="width: 30%; height: 20px; border-radius: 4px;"></span>
                                    <del class="placeholder-shimmer"
                                        style="width: 20%; height: 20px; margin-left: 10px; border-radius: 4px;"></del>
                                </div>
                                <div class="tpdealcontact__text mb-30">
                                    <h4 class="tpdealcontact__title mb-10">
                                        <div class="placeholder-shimmer"
                                            style="width: 70%; height: 20px; border-radius: 4px;"></div>
                                    </h4>
                                    <p>
                                    <div class="placeholder-shimmer"
                                        style="width: 90%; height: 15px; margin-bottom: 5px; border-radius: 4px;">
                                    </div>
                                    <div class="placeholder-shimmer"
                                        style="width: 80%; height: 15px; margin-bottom: 5px; border-radius: 4px;">
                                    </div>
                                    <div class="placeholder-shimmer"
                                        style="width: 85%; height: 15px; border-radius: 4px;"></div>
                                    </p>
                                </div>
                                <div class="tpdealcontact__progress mb-30">
                                    <div class="progress">
                                        <div class="placeholder-shimmer"
                                            style="width: 75%; height: 10px; border-radius: 4px;"></div>
                                    </div>
                                </div>
                                <div class="tpdealcontact__count">
                                    <div class="placeholder-shimmer"
                                        style="width: 50%; height: 20px; margin: 10px 0; border-radius: 4px;"></div>
                                    <i class="placeholder-shimmer"
                                        style="width: 40%; height: 15px; border-radius: 4px;"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- deal-product-area-end -->

        <!-- shop-area-start -->
        <section class="shop-area pb-100 lazy-section" data-url="{{ route('home.shop') }}">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="placeholder-shimmer mx-auto mb-4" style="width: 18%; height: 10px"></div>
                        <div class="tpsectionarea text-center mb-35">
                            <h5 class="tpsectionarea__subtitle placeholder-shimmer"
                                style="width: 30%; height: 30px; margin: 0 auto; border-radius: 4px;"></h5>
                        </div>
                    </div>
                </div>
                <div class="shopareaitem">
                    <div class="shopslider-active swiper-container">
                        <div class="swiper-wrapper">
                            <!-- Placeholder pour les images -->
                            <div class="tpshopitem swiper-slide">
                                <div class="placeholder-shimmer"
                                    style="width: 100%; height: 200px; border-radius: 8px;"></div>
                            </div>
                            <div class="tpshopitem swiper-slide">
                                <div class="placeholder-shimmer"
                                    style="width: 100%; height: 200px; border-radius: 8px;"></div>
                            </div>
                            <div class="tpshopitem swiper-slide">
                                <div class="placeholder-shimmer"
                                    style="width: 100%; height: 200px; border-radius: 8px;"></div>
                            </div>
                            <div class="tpshopitem swiper-slide">
                                <div class="placeholder-shimmer"
                                    style="width: 100%; height: 200px; border-radius: 8px;"></div>
                            </div>
                            <div class="tpshopitem swiper-slide">
                                <div class="placeholder-shimmer"
                                    style="width: 100%; height: 200px; border-radius: 8px;"></div>
                            </div>
                            <div class="tpshopitem swiper-slide">
                                <div class="placeholder-shimmer"
                                    style="width: 100%; height: 200px; border-radius: 8px;"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- shop-area-end -->
    </main>

    <!-- footer-area-start -->
    @include('partials.home-partials.footer')
    <!-- footer-area-end -->

    <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const lazySections = document.querySelectorAll('.lazy-section');

            const observer = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const section = entry.target;
                        const url = section.dataset.url;

                        // Charger le contenu de la section
                        fetch(url)
                            .then(response => response.text())
                            .then(html => {
                                section.innerHTML = html; // Insère le contenu
                                observer.unobserve(
                                    section); // Arrête d'observer une fois chargé
                                injectAssets();
                            })
                            .catch(error => console.error('Erreur de chargement :', error));
                    }
                });
            });

            lazySections.forEach(section => observer.observe(section));

            function injectAssets() {
                // Injecter les fichiers CSS
                const cssFiles = [
                    'css/bootstrap.min.css',
                    'css/animate.css',
                    'css/swiper-bundle.css',
                    'css/slick.css',
                    'css/nice-select.css',
                    'css/fontawesome.min.css',
                    'css/magnific-popup.css',
                    'css/jquery-ui.css',
                    'css/meanmenu.css',
                    'css/spacing.css',
                    'css/main.css',
                    'css/loaders.css'
                ];

                cssFiles.forEach(file => {
                    const link = document.createElement('link');
                    link.rel = 'stylesheet';
                    link.href = `{{ asset('${file}') }}`;
                    document.head.appendChild(link);
                });

                // Injecter les fichiers JS
                const jsFiles = [
                    'js/jquery.js',
                    'js/waypoints.js',
                    'js/bootstrap.bundle.min.js',
                    'js/swiper-bundle.js',
                    'js/slick.js',
                    'js/magnific-popup.js',
                    'js/nice-select.js',
                    'js/counterup.js',
                    'js/wow.js',
                    'js/isotope-pkgd.js',
                    'js/imagesloaded-pkgd.js',
                    'js/countdown.js',
                    'js/ajax-form.js',
                    'js/meanmenu.js',
                    'js/jquery.knob.js',
                    'js/main.js',
                ];

                jsFiles.forEach(file => {
                    const script = document.createElement('script');
                    script.src = `{{ asset('${file}') }}`;
                    document.body.appendChild(script);
                });
            }
        });
    </script>
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
            let isAuthenticated = @auth true
        @else
            false
        @endauth ;
        if (isAuthenticated) {
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
            window.location.href = "{{ route('login') }}"
        }
        }
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
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

            function fetchSearchProducts(rowperpage, total) {
                var start = 0
                var rowperpage = rowperpage
                var totalProductsSearch = total
                start = start + rowperpage

                if (start <= totalProducts) {
                    $.ajax({
                        type: "get",
                        url: "{{ route('getSearchProducts') }}",
                        data: {
                            start: start,
                            _token: '{{ csrf_token() }}'
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
                }
            }
        })
    </script>

    <script>
        // Use a parent container that exists at all times or document if no specific parent
        document.body.addEventListener('click', function(event) {
            // Check if the clicked element has the class 'message-button'
            if (event.target && event.target.classList.contains('message-button')) {
                event.preventDefault(); // Prevent default link behavior

                const button = event.target; // The clicked button
                const sellerId = button.getAttribute('data-seller-id');
                const productId = button.getAttribute('data-product-id');
                const message = "Coucou ! Est-ce que le produit est toujours disponible?";

                // Prepare message data
                const formData = new FormData();
                formData.append('seller_id', sellerId);
                formData.append('product_id', productId);
                formData.append('message', message);
                formData.append('_token', document.querySelector('meta[name="csrf-token"]')
                    .getAttribute('content')); // Fetch CSRF token dynamically

                // Send AJAX request
                fetch("{{ route('messages.send', ':seller_id') }}".replace(':seller_id', sellerId), {
                        method: 'POST',
                        body: formData
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            Swal.fire({
                                icon: 'success',
                                title: data.message,
                                text: "{{ session('success') }}",
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
            }
        });
    </script>

   


    @stack('script')
    @yield('script')
</body>

</html>

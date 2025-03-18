<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Vincent Tshipamba & Carlo Musongela">
    <meta name="description"
        content="Aigle Vente est une plateforme de vente en ligne rapprochant les vendeurs et les acheteurs de produits de toutes sortes.">
    <link rel="shortcut icon" href="{{ asset('img\logo\logo_sans_bg.png') }}" type="image/x-icon">
    <meta name="robots" content="max-snippet:-1, max-image-preview:large, max-video-preview:-1">
    <link rel="canonical" href="https://aiglevente.com/">
    <meta name="description" content="à la hauteur de votre desire.">

    <meta name="twitter:site" content="@aiglevente">
    <meta name="twitter:creator" content="@aiglevente">
    <meta name="twitter:card" content="à la hauteur de votre desire">
    <meta name="twitter:title" content="à la hauteur de votre desire">
    <meta name="twitter:description" content="à la hauteur de votre desire.">
    <meta name="twitter:image" content="https://aiglevente.com/img/logo/logo_sans_bg.pn">

    <meta property="og:url" content="https://aiglevente.com/">
    <meta property="og:locale" content="{{ str_replace('_', '-', app()->getLocale()) }}">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Aigle Vente">
    <meta property="og:title" content="à la hauteur de votre desire.">
    <meta property="og:description" content="à la hauteur de votre desire.">
    <meta property="og:image" content="https://aiglevente.com/img/logo/logo_sans_bg.png">

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
    @livewireStyles
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
        @if (!Auth::check())
            <div id="drawer-login"
                class="fixed z-40 w-full overflow-y-auto bg-white border-t border-gray-200 rounded-t-lg dark:border-gray-700 dark:bg-gray-800 transition-transform top-10 bottom-0 left-0 right-0 translate-y-full"
                tabindex="-1" aria-labelledby="drawer-login-label">
                <div class="p-4 cursor-pointer hover:bg-gray-50 dark:hover:bg-gray-700"
                    data-drawer-toggle="drawer-login">
                    <span
                        class="absolute w-8 h-1 -translate-x-1/2 bg-gray-300 rounded-lg top-3 left-1/2 dark:bg-gray-600"></span>
                </div>
                @livewire('auth.login')
            </div>
        @endif
    </main>

    @yield('footer')

    <!-- JS here -->
    <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
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
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>

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
        function changeImage(src) {
            document.getElementById('mainImage').src = src;
        }

        function changeImageInContactSellerModal(src) {
            document.getElementById('mainImageInContactSellerModal').src = src;
        }

        function contactSellerModal(event, product) {
            event.preventDefault();

            // Construire l'image principale du produit
            const productImage =
                `<img src="{{ asset('') }}${product.photos[0].image}" id="mainImageInContactSellerModal" alt="${product.name}" class="w-full h-full object-cover rounded-sm shadow-md mb-4">`;

            // Construire les images secondaires
            let thumbnails = '';
            product.photos.slice(0, 4).forEach(photo => {
                thumbnails += `<img src="{{ asset('') }}${photo.image}" alt="${product.name}"
        class="size-16 sm:size-20 object-cover rounded-md cursor-pointer opacity-60 hover:opacity-100 transition duration-300"
        onclick="changeImageInContactSellerModal('{{ asset('') }}${photo.image}')">`;
            });

            const routeUrl = "{{ route('contact.seller', ['sellerId' => ':sellerId', 'productId' => ':productId']) }}";
            const actionUrl = routeUrl
                .replace(':sellerId', product.shop.seller.id)
                .replace(':productId', product.id);

            // Contenu du modal
            const modalContent = `
                    <div class="w-full">
                        <h2 class="text-lg font-bold mb-4">Contacter le vendeur pour le produit ${product.name}</h2>

                        <div class="flex flex-col lg:flex-row gap-5">
                            <!-- Section des images -->
                            <div class="lg:w-1/2">
                                <div class="mb-4 mx-auto w-[150px] h-[150px] md:w-[200px] md:h-[200px] lg:w-[250px] lg:h-[250px] xl:w-[400px] xl:h-[400px]">${productImage}</div>
                                <div class="flex gap-4 py-4 justify-center overflow-x-auto">${thumbnails}</div>
                            </div>

                            <!-- Section d'envoi de message -->
                            <div class="lg:w-1/2 mb-12 mx-auto">
                                <form action="${actionUrl}" method="POST">
                                <textarea id="sellerMessage"
                                    class="w-full p-3 mb-6 mx-auto rounded-lg border focus:outline-none focus:ring focus:ring-[#e38407]"
                                    rows="4" name="message"
                                    placeholder="Écrivez votre message ici...">Bonjour M. (Mme) ${product.shop.seller.first_name} ${product.shop.seller.last_name}. J'espère que vous allez bien. Est-ce que le(s) ou la ${product.name} est (sont) toujours disponible(s) ?</textarea>

                                    <div class="flex flex-col items-center justify-center gap-3 mt-6 lg:flex-row">
                                        @csrf
                                        <button type="submit" class="inline-block text-sm sm:text-md text-center min-w-[150px] 2xl:min-w-[200px] px-2 py-2 sm:px-0 sm:py-3 text-white transition-all rounded-md shadow-xl bg-gradient-to-r from-orange-600 to-[#e38407] hover:bg-gradient-to-b dark:shadow-blue-900 shadow-blue-200 hover:shadow-2xl hover:shadow-blue-400 hover:-tranneutral-y-px "
                                            href="#" id="confirmMessageBtn">
                                            Envoyer le message
                                        </button>
                                        <a class="inline-block text-sm sm:text-md text-center min-w-[150px] 2xl:min-w-[200px] px-2 py-2 sm:px-0 sm:py-3 text-white transition-all bg-gray-700 dark:bg-white dark:text-gray-800 rounded-md shadow-xl hover:bg-gray-900 hover:text-white shadow-neutral-300 dark:shadow-neutral-700 hover:shadow-2xl hover:shadow-neutral-400 hover:-tranneutral-y-px"
                                        href="#" id="cancelMessageBtn">Annuler
                                        </a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                `;

            // Afficher la modal SweetAlert2
            Swal.fire({
                html: modalContent,
                showConfirmButton: false,
                showCancelButton: false,
                customClass: {
                    popup: 'w-full p-3 max-w-sm sm:max-w-md md:max-w-lg lg:max-w-3xl xl:max-w-4xl 2xl:max-w-6xl'
                },
                didOpen: () => {
                    const cancelButton = document.getElementById('cancelMessageBtn');

                    // Cancel button event
                    cancelButton.addEventListener('click', (event) => {
                        event.preventDefault();
                        Swal.close(); // Close the modal
                    });
                },
            })
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
        const categoryNames = @json($categories->pluck('name', 'id'));
        const initialContent = $('.main-content').html();

        document.addEventListener('change', function(event) {

            // Check if the target element has the specific class
            if (event.target.classList.contains('category-checkbox')) {
                const selectedCategories = Array.from(
                    document.querySelectorAll('.category-checkbox:checked')
                ).map(checkbox => checkbox.value);

                if (selectedCategories.length < 1) {
                    $('.main-content').html(initialContent);
                    document.querySelectorAll('[id^="categoryInSidebar-"]').forEach(cat => $(cat).removeClass(
                        'text-white underline'));
                    initializeSwipers()
                    return;
                }

                const allCategoryIds = Array.from(document.querySelectorAll('.category-checkbox'))
                    .map(checkbox => checkbox.value);

                allCategoryIds.forEach(categoryId => {
                    const categoryElement = document.getElementById(`category-${categoryId}`);
                    const categoryInSidebarElement = document.getElementById(
                        `categoryInSidebar-${categoryId}`);

                    if (selectedCategories.includes(categoryId)) {
                        $(categoryInSidebarElement).addClass('text-white underline');
                    } else {
                        $(categoryInSidebarElement).removeClass('text-white underline');
                        $(categoryInSidebarElement).addClass('text-gray-500');
                    }
                });

                fetch(`/products/filter`, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        },
                        body: JSON.stringify({
                            categories: selectedCategories,
                        }),
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.html.trim() === '') {
                            document.querySelector('.main-content').innerHTML = `
                                <div class="flex flex-col gap-6 p-4 my-4 text-center text-sm text-gray-800 rounded-lg bg-gray-50 dark:bg-gray-800 dark:text-gray-300">
                                    <div>
                                        <span class="font-medium">Oups désolé !</span> Aucun produit correspondant à votre filtre n'a été trouvé.
                                    </div>
                                    <div>
                                        <a href="{{ route('sellers.create') }}"
                                        class="inline-block px-6 py-2 w-full bg-gray-800 text-gray-200 hover:text-white hover:bg-[#e38407] font-semibold rounded-md text-center transition-all duration-300">
                                        Devenez donc le premier à vendre un produit de cette catégorie !
                                        </a>
                                    </div>
                                </div>`;
                        } else {
                            document.querySelector('.main-content').innerHTML = `
                                <div class="grid grid-cols-1 lg:grid-cols-4 md:grid-cols-2 justify-items-center justify-center gap-y-20 gap-x-14 mb-5 my-20">
                                    ${data.html}
                                </div>`;
                            initializeSwipers()
                        }
                    })
                    .catch(error => console.error('Error fetching products:', error));
            }
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = $('.search-input');
            const container = $('.main-content');
            const initialProducts = container.html();

            $('.search-input').on('keyup', function() {
                const value = $(this).val().trim();

                if (value === '') {
                    container.html(initialProducts);
                    initializeSwipers();
                } else {
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
                            $('.main-content').html(`
                                    <section class="container grid grid-cols-1 lg:grid-cols-4 md:grid-cols-2 justify-items-center justify-center gap-y-20 gap-x-14  mb-5 my-20">
                                        ${html}
                                    </section>
                            `)

                            if (html.trim() === '') {
                                $('.main-content').html(`
                            <div class="p-4 text-md text-gray-800 mx-auto text-center rounded-lg bg-gray-50 dark:bg-gray-800 dark:text-gray-300" role="alert">
                                <span class="font-medium">Oups désolé!</span> Aucun produit disponible correspondant à votre recherche. <br><br>
                                <button onclick="window.location.href='/products'" class="footer-widget__fw-news-btn tpsecondary-btn">Voir le catalogue des produits disponibles<i
                                                class="fal fa-long-arrow-right"></i></button>
                            </div>
                        `);
                            } else {
                                initializeSwipers();
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error("Error fetching products:", error);
                        }
                    });
                }
            });

            // Function to initialize Swipers
            function initializeSwipers() {
                document.querySelectorAll('.image').forEach((element, index) => {
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
            }

            initializeSwipers();
        });
    </script>

    @yield('script')
    @stack('script')
    @livewireScripts
</body>

</html>

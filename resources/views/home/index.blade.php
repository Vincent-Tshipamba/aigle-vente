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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

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
    <style>
        .swiper - pagination - bullet {
            background - color: #FF5500FF;
            /* Couleur personnalisée */
            width: 12 px;
            height: 12 px;
            opacity: 0.7;
        }

        .swiper - pagination - bullet - active {
            background - color: # 2563 eb;
            /* Couleur active */
            opacity: 1;
        }

        /* Style personnalisé pour les flèches */
        .swiper - button - prev,
        .swiper - button - next {
            width: 40 px;
            height: 40 px;
            color: #D8681DFF;

        }

        .swiper-button-prev::after,
        .swiper-button-next::after {
            font-size: 1.5rem;
            /* Ajuste la taille des icônes */
        }
    </style>
    <style>
        .checkbox:checked+.check-icon {
            display: flex;
        }
    </style>
    @livewireStyles
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
        @livewire('home-content', ['products' => $products, 'categories' => $categories])

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
    <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
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
        document.addEventListener('DOMContentLoaded', function() {
            @if (session('error'))
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
                    icon: "error",
                    title: "{{ session('error') }}"
                });
            @endif
        })
    </script>
    <script>
        function changeImage(src) {
            document.getElementById('mainImage').src = src;
        }
    </script>
    <script>
        function contactSellerModal(event, product) {
            event.preventDefault();

            // Construire l'image principale du produit
            const productImage =
                `<img src="${product.photos[0].image}" id="mainImage" alt="${product.name}" class="w-full h-auto object-cover rounded-sm shadow-md mb-4">`;

            // Construire les images secondaires
            let thumbnails = '';
            product.photos.slice(0, 4).forEach(photo => {
                thumbnails += `<img src="${photo.image}" alt="${product.name}"
        class="size-16 sm:size-20 object-cover rounded-md cursor-pointer opacity-60 hover:opacity-100 transition duration-300"
        onclick="changeImage('${photo.image}')">`;
            });

            const routeUrl = "{{ route('contact.seller', ['sellerId' => ':sellerId', 'productId' => ':productId']) }}";
            const actionUrl = routeUrl
                .replace(':sellerId', product.shop.seller.id)
                .replace(':productId', product.id);

            // Contenu du modal
            const modalContent = `
                    <div class="bg-white rounded-lg p-6 shadow-lg w-full">
                        <h2 class="text-lg font-bold mb-4">Contacter le vendeur pour le produit ${product.name}</h2>

                        <div class="flex flex-col lg:flex-row gap-4">
                            <!-- Section des images -->
                            <div class="lg:w-1/2">
                                <div class="mb-4 mx-auto w-[300px] h-[300px] xl:w-[450px] xl:h-[450px]">${productImage}</div>
                                <div class="flex gap-4 py-4 justify-center overflow-x-auto">${thumbnails}</div>
                            </div>

                            <!-- Section d'envoi de message -->
                            <div class="lg:w-1/2 mb-12 mx-auto">
                                <form action="${actionUrl}" method="POST">
                                <textarea id="sellerMessage"
                                    class="w-full p-3 mb-6 rounded-lg border focus:outline-none focus:ring focus:ring-[#e38407]"
                                    rows="4" name="message"
                                    placeholder="Écrivez votre message ici...">Bonjour M. (Mme) ${product.shop.seller.first_name} ${product.shop.seller.last_name}. J'espère que vous allez bien. Est-ce que le(s) ou la ${product.name} est (sont) toujours disponible(s) ?</textarea>

                                    <div class="flex flex-col items-center justify-center gap-5 mt-6 md:flex-row">
                                        @csrf
                                        <button type="submit" class="inline-block w-auto text-center min-w-[200px] px-6 py-4 text-white transition-all rounded-md shadow-xl sm:w-auto bg-gradient-to-r from-orange-600 to-[#e38407] hover:bg-gradient-to-b dark:shadow-blue-900 shadow-blue-200 hover:shadow-2xl hover:shadow-blue-400 hover:-tranneutral-y-px "
                                            href="#" id="confirmMessageBtn">
                                            Envoyer le message
                                        </button>
                                        <a class="inline-block w-auto text-center min-w-[200px] px-6 py-4 text-white transition-all bg-gray-700 dark:bg-white dark:text-gray-800 rounded-md shadow-xl sm:w-auto hover:bg-gray-900 hover:text-white shadow-neutral-300 dark:shadow-neutral-700 hover:shadow-2xl hover:shadow-neutral-400 hover:-tranneutral-y-px"
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
                    popup: 'w-full max-w-sm sm:max-w-md lg:max-w-xl xl:max-w-2xl'
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

        function showFilters() {
            var fSection = document.getElementById("filterSection");
            if (fSection.classList.contains("hidden")) {
                fSection.classList.remove("hidden");
                fSection.classList.add("block");
            } else {
                fSection.classList.add("hidden");
            }
        }

        function applyFilters() {
            document
                .querySelectorAll("input[type=checkbox]")
                .forEach((el) => (el.checked = false));
        }

        function closeFilterSection() {
            var fSection = document.getElementById("filterSection");
            fSection.classList.add("hidden");
        }
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const slides = document.querySelectorAll('#slider > div');
            let currentSlide = 0;

            const showSlide = (index) => {
                slides.forEach((slide, i) => {
                    slide.style.opacity = i === index ? '1' : '0';
                    slide.style.zIndex = i === index ? '1' : '0';
                    slide.style.transition = 'opacity 1s ease-in-out';
                });
            };

            const nextSlide = () => {
                currentSlide = (currentSlide + 1) % slides.length;
                showSlide(currentSlide);
            };

            // Initialisation
            showSlide(currentSlide);

            // Défilement automatique
            setInterval(nextSlide, 3000); // Change toutes les 3 secondes
        });


        document.addEventListener('DOMContentLoaded', function() {
            const swiper = new Swiper('.swiper', {
                spaceBetween: 10,
                slidesPerView: 4,
                loop: true,
                navigation: {
                    nextEl: '.custom-next',
                    prevEl: '.custom-prev',
                },
                autoplay: {
                    delay: 5000,
                    disableOnInteraction: false,
                },
                breakpoints: {
                    1024: {
                        slidesPerView: 12,
                        spaceBetween: 15,
                    },
                    768: {
                        slidesPerView: 7,
                    },
                    640: {
                        slidesPerView: 4,
                    },
                    480: {
                        slidesPerView: 2,
                        spaceBetween: 5,
                    },
                }
            });
        });



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
                    document.querySelector('.logout-form').submit();
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
            const searchInput = $('.search-input');
            const container = $('.main-content');
            const initialProducts = container.html();

            $('.search-input').on('keyup', function() {
                const value = $(this).val().trim();

                if (value === '') {
                    container.html(initialProducts);
                } else {
                    const searchResults = `
                <section class="product-area pb-70" id="productSection">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <div class="tpsection mb-40">
                                    <h4 class="tpsection__title">Produits <span> Populaires </span></h4>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                            </div>
                        </div>
                        <div class="w-full md:inset-0 product-container">
                            <div
                                class="searchResultProduct row row-cols-xxl-5 row-cols-xl-4 row-cols-lg-3 row-cols-md-2 row-cols-sm-2 row-cols-1 mx-auto">

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
                                $(".searchResultProduct").append(response.html).show()
                                    .fadeIn()
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error("Error fetching products:", error);
                        }
                    });
                }
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

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            if (window.innerWidth <= 640) { // Écran mobile (640px et moins)
                document.querySelector(".custom-next").style.display = "none";
                document.querySelector(".custom-prev").style.display = "none";
            }
        });
    </script>





    @yield('modal')
    @stack('script')
    @yield('script')
    @livewireScripts
</body>

</html>

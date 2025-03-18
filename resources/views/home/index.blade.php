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
    <meta property="og:image" content="https://aiglevente.com/img/logo/logo_sans_bg.pn">


    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Aigle Vente</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css">
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/placeholder-loading/0.2.4/placeholder-loading.css"
        integrity="sha512-Ab95Kd8jIB21+phDtNtVwVtlaAQzYbMnYSd+C35kthbDBmQ5k4VexVY6dCBprDyIt2ZuMbRnDRekziXNKtg/fQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
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

        #loadingPlaceholder {
            display: none;
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

        @if (!Auth::check())
            <div id="drawer-login"
                class="fixed z-50 w-full overflow-y-auto bg-white border-t border-gray-200 rounded-t-lg dark:border-gray-700 dark:bg-gray-800 transition-transform top-10 bottom-0 left-0 right-0 translate-y-full"
                tabindex="-1" aria-labelledby="drawer-login-label">
                <div class="p-4 cursor-pointer hover:bg-gray-50 dark:hover:bg-gray-700"
                    data-drawer-toggle="drawer-login">
                    <span
                        class="absolute w-8 h-1 -translate-x-1/2 bg-gray-300 rounded-lg top-3 left-1/2 dark:bg-gray-600"></span>
                </div>
                @livewire('auth.login')
            </div>
        @endif

        <!-- deal-product-area-start -->
        {{-- @include('partials.home-partials.deal-product') --}}
        <!-- deal-product-area-end -->

        <!-- shop-area-start -->
        {{-- @include('partials.home-partials.shop') --}}
        <!-- shop-area-end -->
    </main>

    <!-- footer-area-start -->
    @include('partials.home-partials.footer')
    <!-- footer-area-end -->

    <!-- JS here -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/react-placeholder-loading@0.5.30/dist/index.min.js"></script> --}}
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
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let page = 1;
            // const loadMoreTrigger = document.getElementById("loadMoreTrigger");
            const loadingPlaceholder = document.getElementById("loadingPlaceholder");

            function loadMoreProducts() {
                page++;
                loadingPlaceholder.style.display = "grid"; // Afficher le loader

                fetch(`?page=${page}`, {
                        headers: {
                            "X-Requested-With": "XMLHttpRequest"
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        setTimeout(() => { // ⏳ Ajoute un délai de 1.5s avant d'afficher les données
                            if (data.html.trim().length > 0) {
                                document.getElementById("Products").insertAdjacentHTML("beforeend", data
                                    .html);
                            } else {
                                // loadMoreTrigger.remove();
                            }
                            loadingPlaceholder.style.display = "none"; // Masquer après le délai
                        }, Math.floor(Math.random() * (3000 - 1000) +
                        1000)); // ⏳ Délai aléatoire entre 1 et 3 secondes
                    })
                    .catch(error => {
                        console.error("Erreur lors du chargement des produits :", error);
                        setTimeout(() => {
                            loadingPlaceholder.style.display =
                            "none"; // Masquer le loader même en cas d'erreur
                        }, 1500);
                    });
            }

            window.addEventListener("scroll", function() {
                if (window.innerHeight + window.scrollY >= document.body.offsetHeight - 100) {
                    loadMoreProducts();
                }
            });
        });
    </script>


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

            @if (session('success'))
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
                    title: "{{ session('success') }}"
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
                `<img src="${product.photos[0].image}" id="mainImage" alt="${product.name}" class="w-full h-full object-cover rounded-sm shadow-md mb-4">`;

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

    <!-- Script pour le filtrage des produits par categorie(s) et gestion de l'affichage des resultats -->
    <script>
        const categoryNames = @json($categories->pluck('name', 'id'));
        const initialProductsContent = $('.productsParent').html();

        document.addEventListener('change', function(event) {
            // Check if the target element has the specific class
            if (event.target.classList.contains('category-checkbox')) {
                // Désélectionner toutes les autres cases à cocher
                document.querySelectorAll('.category-checkbox').forEach(checkbox => {
                    if (checkbox !== event.target) {
                        checkbox.checked = false;
                    }
                });

                const selectedCategories = Array.from(
                    document.querySelectorAll('.category-checkbox:checked')
                ).map(checkbox => checkbox.value);

                if (selectedCategories.length < 1) {
                    $('.productsParent').html(initialProductsContent);
                    document.querySelectorAll('[id^="tabs-"]').forEach(tab => tab.classList.add('hidden'));
                    document.querySelectorAll('[id^="category-"]').forEach(cat => $(cat).removeClass(
                        'text-black text-white underline'));
                    initializeSwipers();
                    return;
                }

                const allCategoryIds = Array.from(document.querySelectorAll('.category-checkbox'))
                    .map(checkbox => checkbox.value);

                allCategoryIds.forEach(categoryId => {
                    const tab = document.getElementById(`tabs-${categoryId}`);
                    const categoryElement = document.getElementById(`category-${categoryId}`);
                    const categoryInSidebarElement = document.getElementById(
                        `categoryInSidebar-${categoryId}`);

                    if (selectedCategories.includes(categoryId)) {
                        $(categoryInSidebarElement).addClass('text-white underline');
                        $(categoryElement).addClass('text-black');
                        $(tab).removeClass('hidden');
                    } else {
                        $(categoryInSidebarElement).removeClass('text-white underline');
                        $(categoryInSidebarElement).addClass('text-gray-500');
                        $(categoryElement).removeClass('text-black');
                        $(categoryElement).addClass('text-gray-500');
                        $(tab).addClass('hidden');
                    }
                });

                fetch(`/products/category/filter`, {
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
                            document.querySelector('.productsParent').innerHTML = `
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
                            document.querySelector('.productsParent').innerHTML = `
                        <div class="grid grid-cols-1 lg:grid-cols-4 md:grid-cols-2 justify-items-center justify-center gap-y-20 gap-x-14 mb-5 my-20">
                            ${data.html}
                        </div>`;
                            initializeSwipers();
                        }
                    })
                    .catch(error => console.error('Error fetching products:', error));
            }
        });
    </script>

    <!-- Filtrage general des produits -->
    <script>
        document.getElementById('apply-filters').addEventListener('click', function() {
            // Collecter les filtres sélectionnés

            // Récupérer les plages de prix
            const minPrice = document.getElementById('min-price').value;
            const maxPrice = document.getElementById('max-price').value;

            if (parseFloat(minPrice) > parseFloat(maxPrice)) {
                alert("Le prix minimum ne peut pas être supérieur au prix maximum.");
                return;
            }

            // Récupérer les catégories sélectionnées
            const categories = [];
            document.querySelectorAll('.category-checkbox-in-filter-modal:checked').forEach(function(checkbox) {
                categories.push(checkbox.value);
            });

            // Récupérer les localisations (vendeurs locaux et internationaux sélectionnés)
            const locations = [];
            document.querySelectorAll('.location-checkbox:checked').forEach(function(checkbox) {
                locations.push(checkbox.value);
            });

            // Construire les données à envoyer via AJAX
            const filters = {
                min_price: minPrice,
                max_price: maxPrice,
                categories: categories,
                locations: locations
            };

            // Envoi de la requête AJAX avec les filtres
            fetch('/products/filter', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify(filters)
                })
                .then(response => response.json())
                .then(data => {
                    if (data.html.trim() === '') {
                        document.querySelector('.productsParent').innerHTML = `
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
                        document.querySelector('.productsParent').innerHTML = `
                            <div class="grid grid-cols-1 lg:grid-cols-4 md:grid-cols-2 justify-items-center justify-center gap-y-20 gap-x-14 mb-5 my-20">
                                ${data.html}
                            </div>`;
                        initializeSwipers()
                    }
                })
                .catch(error => {
                    console.error('Erreur lors du filtrage des produits :', error);
                });
        });
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
            initializeSwipersForCategories();
        });

        function initializeSwipersForCategories() {
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
        }

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
            const initialContent = $('.productsParent').html();

            $('.search-input').on('keyup', function() {
                const value = $(this).val().trim();

                if (value === '') {
                    $('.productsParent').html(initialContent); // Restore the initial products
                    initializeSwipers(); // Reinitialize Swipers for the initial products
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
                            const html = response.html;

                            if (html.trim() === '') {
                                $('.productsParent').html(`
                                    <div class="p-4 my-4 flex flex-col gap-6 text-center justify-center w-full text-sm text-gray-800 rounded-lg bg-gray-50 dark:bg-gray-800 dark:text-gray-300" role="alert">
                                        <div class="">
                                            <span class="font-medium">Oups désolé !</span> Aucun produit correspondant à votre recherche n'est disponible pour le moment.
                                        </div>
                                        <div class="">
                                            <a href="{{ route('sellers.create') }}" class="px-6 py-2 bg-gray-800 text-gray-200 hover:text-white hover:bg-[#e38407] font-semibold rounded-md text-center transition-all duration-300 whitespace-nowrap align-middle touch-manipulation shadow-md">Devenez donc le premier vendeur de ce produit !</a>
                                        </div>
                                    </div>
                                `);
                            } else {
                                $('.productsParent').html(`
                                    <div class="grid grid-cols-1 lg:grid-cols-4 md:grid-cols-2 justify-items-center justify-center gap-y-20 gap-x-14  mb-5 my-20">
                                        ${html}
                                    </div>
                                `);
                                initializeSwipers
                                    (); // Reinitialize Swipers for the new search results
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error("Error fetching products:", error);
                        }
                    });
                }
            });

            // Initial call to set up Swipers for the initial products
            initializeSwipers();
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

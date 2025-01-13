<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

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


</head>

<body class="font-sans antialiased dark:bg-black dark:text-white/50">
    <header>
        {{-- <div class="header-top space-bg">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="header-welcome-text text-start ">
                            <span>Bienvenue dans notre boutique internationale ! Profitez de la livraison gratuite pour
                                les
                                commandes de 100 $ et plus.</span>
                            <a href="shop.html">Achetez maintenant <i class="fal fa-long-arrow-right"></i> </a>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        <div class="logo-area mt-30 d-none d-xl-block">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-2 col-lg-3">
                        <div class="logo col-span-1">
                            <a href="{{ route('home') }}" class="flex items-center space-x-2">
                                <img loading="lazy" src="{{ asset('img/logo/logo_sans_bg.png') }}" width="25%"
                                    alt="logo">
                                <h1 class="text-2xl font-bold animate__animated animate__slideInRight"></h1>
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-10 col-lg-9">
                        <div class="header-meta-info d-flex align-items-center justify-content-between">
                            <div class="col-auto">
                                <div class="main-menu flex items-center justify-center">
                                    <nav id="mobile-menu">
                                        <ul class="flex space-x-6">
                                            <li>
                                                <a href="{{ route('home') }}" class="hover:text-blue-500">Accueil</a>
                                            </li>
                                            <li class=" relative">
                                                <a href="{{ route('products.index') }}"
                                                    class="hover:text-blue-500">Shops</a>

                                            </li>
                                            <li>
                                                <a href="{{ route('contact') }}"
                                                    class="hover:text-blue-500">Contact</a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                            <div class="header-meta header-language flex items-center space-x-3">
                                @auth
                                    <button id="dropdownUserAvatarButtonHeader-home"
                                        data-dropdown-toggle="dropdownAvatarHeader-home"
                                        class="flex text-sm bg-gray-800 rounded-full md:me-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                                        type="button">
                                        <span class="sr-only">Open user menu</span>
                                        <img class="w-8 h-8 rounded-full" src="/docs/images/people/profile-picture-3.jpg"
                                            alt="user photo">
                                    </button>

                                    <!-- Dropdown menu -->
                                    <div id="dropdownAvatarHeader-home"
                                        class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-60 dark:bg-gray-700 dark:divide-gray-600">
                                        <div class="px-4 py-3 text-sm text-gray-900 dark:text-white">
                                            <div>{{ Auth::user()->name }}</div>
                                            <div class="font-medium truncate">{{ Auth::user()->email }}</div>
                                        </div>
                                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                                            aria-labelledby="dropdownUserAvatarButtonHeader-home">
                                            <li>
                                                @if (Auth::user()->client)
                                                    <a href="{{ route('client.dashboard') }}"
                                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                                        Mon dashboard client
                                                    </a>
                                                @endif

                                                @if (Auth::user()->isSeller())
                                                    <a href="{{ route('seller.dashboard') }}"
                                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                                        Mon dashboard de vendeur
                                                    </a>
                                                @endif

                                                @if (Auth::user()->hasRole('superadmin'))
                                                    <a href="{{ route('admin.dashboard') }}"
                                                        class="block px-6 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                                        Mon dashboard administrateur
                                                    </a>
                                                @endif

                                            </li>
                                            <li>
                                                <a href="{{ route('profile.edit') }}"
                                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                                    Paramètres du compte
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#"
                                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Mon
                                                    panier</a>
                                            </li>
                                            <li>
                                                <!-- Authentication -->
                                                <form id="logout-form" method="POST" action="{{ route('logout') }}"
                                                    style="display: none;">
                                                    @csrf
                                                </form>
                                                <a href="#" onclick="event.preventDefault(); confirmLogout();"
                                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                                    <i class="fal fa-user"></i> {{ __('Me déconnecter') }}
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="header-meta__social flex items-center ml-25">
                                        <button class="header-cart p-relative tp-cart-toggle">
                                            <i class="fal fa-heart"></i>
                                            {{-- <span class="tp-product-count wishcount">{{ $wishlists->count() }}</span> --}}
                                        </button>
                                        @if (Auth::check() && !Auth::user()->isSeller())
                                            <a href="{{ route('sellers.create') }}"
                                                class="w-full inline-block px-[10px] py-[15px] bg-[var(--tp-text-primary)] text-[var(--tp-common-white)] text-sm font-semibold rounded-md text-center transition-all duration-300 whitespace-nowrap align-middle touch-manipulation">
                                                Devenir vendeur</a>
                                        @endif
                                    </div>
                                @else
                                    <a href="{{ route('login') }}"><i class="fal fa-user"></i></a>
                                    <!-- Lien vers le formulaire de connexion -->
                                @endauth
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="main-menu-area mt-20 d-none d-xl-block">
            <div class="for-megamenu p-relative">
                <div class="container">
                    <div class="row justify-center">
                        <!-- Menu principal -->
                        <div class="header-search-bar">
                            <form action="#">
                                <div class="search-info p-relative rounded-full">
                                    <button class="header-search-icon"><i class="fal fa-search"></i></button>
                                    <input class="search-input" type="text"
                                        placeholder="Rechercher des produits...">
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        {{-- <hr class=" border-t-1 border-gray-100"> --}}


    </header>


    <main class="main-content mx-20">

        <div class="flex flex-col sm:flex-row justify-between items-center gap-4 my-8">

            <!-- Bouton précédent -->
            <div
                class="p-2 bg-gray-100 rounded-full w-8 h-8 hover:bg-gray-200 transition-all duration-300 custom-prev hover:scale-125 drop-shadow-md sm:block hidden">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-600" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </div>

            <!-- Swiper avec grille responsive -->
            <div class="swiper w-full sm:w-auto">
                <div class="swiper-wrapper grid grid-cols-2 sm:grid-cols-4 md:grid-cols-6 gap-4">
                    @foreach ($categories as $item)
                        <div class="swiper-slide">
                            <a href="{{ $item->link }}"
                                class="flex flex-col items-center text-center space-y-2 hover:scale-105">
                                <div class="p-2  rounded-full ">
                                    <img src="{{ $item->image }}" alt="{{ $item->name }}"
                                        class="w-8 h-8 max-w-full h-auto">
                                </div>
                                <span class="text-xs sm:text-sm font-medium text-gray-500 hover:text-gray-700">{{ $item->name }}</span>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Bouton suivant -->
            <div
                class="p-2 bg-gray-100 rounded-full w-8 h-8 hover:bg-gray-200 transition-all duration-300 custom-next hover:scale-125 drop-shadow-md sm:block hidden">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-800" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </div>

            <!-- Bouton Filtre avec responsive -->
            <button onclick="showFilters()"
                class="border border-gray-800 bg-white text-gray-800 dark:hover:bg-gray-100 py-2 px-3 text-sm sm:text-base font-normal rounded-lg flex items-center">
                <svg class="" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                    viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                        d="M18.796 4H5.204a1 1 0 0 0-.753 1.659l5.302 6.058a1 1 0 0 1 .247.659v4.874a.5.5 0 0 0 .2.4l3 2.25a.5.5 0 0 0 .8-.4v-7.124a1 1 0 0 1 .247-.659l5.302-6.059c.566-.646.106-1.658-.753-1.658Z" />
                </svg>

                Filters
            </button>
        </div>


        <div id="filterSection"
            class=" hidden  md:py-10 lg:px-20 md:px-6 py-9 px-4 bg-gray-50 dark:bg-gray-800 items-center w-94 md:inset-0 h-[calc(100%-1rem)] max-h-full overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50">
            <!-- Cross button Code -->
            <div onclick="closeFilterSection()"
                class="cursor-pointer text-gray-800 dark:text-white absolute right-0 top-0 md:py-10 lg:px-20 md:px-6 py-9 px-4">
                <svg class="lg:w-6 lg:h-6 w-4 h-4" viewBox="0 0 26 26" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path d="M25 1L1 25" stroke="currentColor" stroke-width="1.25" stroke-linecap="round"
                        stroke-linejoin="round" />
                    <path d="M1 1L25 25" stroke="currentColor" stroke-width="1.25" stroke-linecap="round"
                        stroke-linejoin="round" />
                </svg>
            </div>

            <!-- Colors Section -->
            <div>
                <div class="flex space-x-2 text-gray-800 dark:text-white">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M19 3H15C14.4696 3 13.9609 3.21071 13.5858 3.58579C13.2107 3.96086 13 4.46957 13 5V17C13 18.0609 13.4214 19.0783 14.1716 19.8284C14.9217 20.5786 15.9391 21 17 21C18.0609 21 19.0783 20.5786 19.8284 19.8284C20.5786 19.0783 21 18.0609 21 17V5C21 4.46957 20.7893 3.96086 20.4142 3.58579C20.0391 3.21071 19.5304 3 19 3Z"
                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                            stroke-linejoin="round" />
                        <path
                            d="M12.9994 7.35022L10.9994 5.35022C10.6243 4.97528 10.1157 4.76465 9.58539 4.76465C9.05506 4.76465 8.54644 4.97528 8.17139 5.35022L5.34339 8.17822C4.96844 8.55328 4.75781 9.06189 4.75781 9.59222C4.75781 10.1225 4.96844 10.6312 5.34339 11.0062L14.3434 20.0062"
                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                            stroke-linejoin="round" />
                        <path
                            d="M7.3 13H5C4.46957 13 3.96086 13.2107 3.58579 13.5858C3.21071 13.9609 3 14.4696 3 15V19C3 19.5304 3.21071 20.0391 3.58579 20.4142C3.96086 20.7893 4.46957 21 5 21H17"
                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                            stroke-linejoin="round" />
                        <path d="M17 17V17.01" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>
                    <p class="lg:text-2xl text-xl lg:leading-6 leading-5 font-medium">Colors</p>
                </div>
                <div class="md:flex md:space-x-6 mt-8 grid grid-cols-3 gap-y-8 flex-wrap">
                    <div class="flex space-x-2 md:justify-center md:items-center items-center justify-start">
                        <div class="w-4 h-4 rounded-full bg-white shadow"></div>
                        <p class="text-base leading-4 dark:text-gray-300 text-gray-600 font-normal">White</p>
                    </div>
                    <div class="flex space-x-2 justify-center items-center">
                        <div class="w-4 h-4 rounded-full bg-blue-600 shadow"></div>
                        <p class="text-base leading-4 dark:text-gray-300 text-gray-600 font-normal">Blue</p>
                    </div>
                    <div class="flex space-x-2 md:justify-center md:items-center items-center justify-end">
                        <div class="w-4 h-4 rounded-full bg-red-600 shadow"></div>
                        <p class="text-base leading-4 dark:text-gray-300 text-gray-600 font-normal">Red</p>
                    </div>
                    <div class="flex space-x-2 md:justify-center md:items-center items-center justify-start">
                        <div class="w-4 h-4 rounded-full bg-indigo-600 shadow"></div>
                        <p class="text-base leading-4 dark:text-gray-300 text-gray-600 font-normal">Indigo</p>
                    </div>
                    <div class="flex space-x-2 justify-center items-center">
                        <div class="w-4 h-4 rounded-full bg-black shadow"></div>
                        <p class="text-base leading-4 dark:text-gray-300 text-gray-600 font-normal">Black</p>
                    </div>
                    <div class="flex space-x-2 md:justify-center md:items-center items-center justify-end">
                        <div class="w-4 h-4 rounded-full bg-purple-600 shadow"></div>
                        <p class="text-base leading-4 dark:text-gray-300 text-gray-600 font-normal">Purple</p>
                    </div>
                    <div class="flex space-x-2 md:justify-center md:items-center items-center justify-start">
                        <div class="w-4 h-4 rounded-full bg-gray-600 shadow"></div>
                        <p class="text-base leading-4 dark:text-gray-300 text-gray-600 font-normal">Grey</p>
                    </div>
                </div>
            </div>

            <hr class="bg-gray-200 lg:w-6/12 w-full md:my-10 my-8" />

            <!-- Material Section -->
            <div>
                <div class="flex space-x-2 text-gray-800 dark:text-white">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M9.5 16C13.0899 16 16 13.0899 16 9.5C16 5.91015 13.0899 3 9.5 3C5.91015 3 3 5.91015 3 9.5C3 13.0899 5.91015 16 9.5 16Z"
                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                            stroke-linejoin="round" />
                        <path
                            d="M19 10H12C10.8954 10 10 10.8954 10 12V19C10 20.1046 10.8954 21 12 21H19C20.1046 21 21 20.1046 21 19V12C21 10.8954 20.1046 10 19 10Z"
                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>
                    <p class="lg:text-2xl text-xl lg:leading-6 leading-5 font-medium ">Material</p>
                </div>
                <div class="md:flex md:space-x-6 mt-8 grid grid-cols-3 gap-y-8 flex-wrap">
                    <div class="flex space-x-2 md:justify-center md:items-center items-center justify-start">
                        <input class="w-4 h-4 mr-2" type="checkbox" id="Leather" name="Leather"
                            value="Leather" />
                        <div class="inline-block">
                            <div class="flex space-x-6 justify-center items-center">
                                <label class="mr-2 text-sm leading-3 dark:text-gray-300 font-normal text-gray-600"
                                    for="Leather">Leather</label>
                            </div>
                        </div>
                    </div>
                    <div class="flex justify-center items-center">
                        <input class="w-4 h-4 mr-2" type="checkbox" id="Cotton" name="Cotton" value="Cotton" />
                        <div class="inline-block">
                            <div class="flex space-x-6 justify-center items-center">
                                <label class="mr-2 text-sm leading-3 dark:text-gray-300 font-normal text-gray-600"
                                    for="Cotton">Cotton</label>
                            </div>
                        </div>
                    </div>
                    <div class="flex space-x-2 md:justify-center md:items-center items-center justify-end">
                        <input class="w-4 h-4 mr-2" type="checkbox" id="Fabric" name="Fabric" value="Fabric" />
                        <div class="inline-block">
                            <div class="flex space-x-6 justify-center items-center">
                                <label class="mr-2 text-sm leading-3 dark:text-gray-300 font-normal text-gray-600"
                                    for="Fabric">Fabric</label>
                            </div>
                        </div>
                    </div>
                    <div class="flex space-x-2 md:justify-center md:items-center items-center justify-start">
                        <input class="w-4 h-4 mr-2" type="checkbox" id="Crocodile" name="Crocodile"
                            value="Crocodile" />
                        <div class="inline-block">
                            <div class="flex space-x-6 justify-center items-center">
                                <label class="mr-2 text-sm leading-3 dark:text-gray-300 font-normal text-gray-600"
                                    for="Crocodile">Crocodile</label>
                            </div>
                        </div>
                    </div>
                    <div class="flex justify-center items-center">
                        <input class="w-4 h-4 mr-2" type="checkbox" id="Wool" name="Wool" value="Wool" />
                        <div class="inline-block">
                            <div class="flex space-x-6 justify-center items-center">
                                <label class="mr-2 text-sm leading-3 dark:text-gray-300 font-normal text-gray-600"
                                    for="Wool">Wool</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <hr class="bg-gray-200 lg:w-6/12 w-full md:my-10 my-8" />

            <!-- Size Section -->
            <div>
                <div class="flex space-x-2 text-gray-800 dark:text-white">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M3 5H14" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                            stroke-linejoin="round" />
                        <path d="M12 7L14 5L12 3" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                            stroke-linejoin="round" />
                        <path d="M5 3L3 5L5 7" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                            stroke-linejoin="round" />
                        <path d="M19 10V21" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                            stroke-linejoin="round" />
                        <path d="M17 19L19 21L21 19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                            stroke-linejoin="round" />
                        <path d="M21 12L19 10L17 12" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                            stroke-linejoin="round" />
                        <path
                            d="M12 10H5C3.89543 10 3 10.8954 3 12V19C3 20.1046 3.89543 21 5 21H12C13.1046 21 14 20.1046 14 19V12C14 10.8954 13.1046 10 12 10Z"
                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>
                    <p class="lg:text-2xl text-xl lg:leading-6 leading-5 font-medium ">Size</p>
                </div>
                <div class="md:flex md:space-x-6 mt-8 grid grid-cols-3 gap-y-8 flex-wrap">
                    <div class="flex md:justify-center md:items-center items-center justify-start">
                        <input class="w-4 h-4 mr-2" type="checkbox" id="Large" name="Large" value="Large" />
                        <div class="inline-block">
                            <div class="flex space-x-6 justify-center items-center">
                                <label class="mr-2 text-sm leading-3 font-normal text-gray-600 dark:text-gray-300"
                                    for="Large">Large</label>
                            </div>
                        </div>
                    </div>
                    <div class="flex justify-center items-center">
                        <input class="w-4 h-4 mr-2" type="checkbox" id="Medium" name="Medium" value="Medium" />
                        <div class="inline-block">
                            <div class="flex space-x-6 justify-center items-center">
                                <label class="mr-2 text-sm leading-3 font-normal text-gray-600 dark:text-gray-300"
                                    for="Medium">Medium</label>
                            </div>
                        </div>
                    </div>
                    <div class="flex md:justify-center md:items-center items-center justify-end">
                        <input class="w-4 h-4 mr-2" type="checkbox" id="Small" name="Small" value="Small" />
                        <div class="inline-block">
                            <div class="flex space-x-6 justify-center items-center">
                                <label class="mr-2 text-sm leading-3 font-normal text-gray-600 dark:text-gray-300"
                                    for="Small">Small</label>
                            </div>
                        </div>
                    </div>
                    <div class="flex md:justify-center md:items-center items-center justify-start">
                        <input class="w-4 h-4 mr-2" type="checkbox" id="Mini" name="Mini" value="Mini" />
                        <div class="inline-block">
                            <div class="flex space-x-6 justify-center items-center">
                                <label class="mr-2 text-sm leading-3 font-normal text-gray-600 dark:text-gray-300"
                                    for="Mini">Mini</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <hr class="bg-gray-200 lg:w-6/12 w-full md:my-10 my-8" />

            <!-- Collection Section -->
            <div>
                <div class="flex space-x-2 text-gray-800 dark:text-white ">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <g opacity="0.8">
                            <path
                                d="M9 4H5C4.44772 4 4 4.44772 4 5V9C4 9.55228 4.44772 10 5 10H9C9.55228 10 10 9.55228 10 9V5C10 4.44772 9.55228 4 9 4Z"
                                stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path
                                d="M9 14H5C4.44772 14 4 14.4477 4 15V19C4 19.5523 4.44772 20 5 20H9C9.55228 20 10 19.5523 10 19V15C10 14.4477 9.55228 14 9 14Z"
                                stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path
                                d="M19 14H15C14.4477 14 14 14.4477 14 15V19C14 19.5523 14.4477 20 15 20H19C19.5523 20 20 19.5523 20 19V15C20 14.4477 19.5523 14 19 14Z"
                                stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path d="M14 7H20" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path d="M17 4V10" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </g>
                    </svg>
                    <p class="lg:text-2xl text-xl lg:leading-6 leading-5 font-medium ">Collection</p>
                </div>
                <div class="flex mt-8 space-x-8">
                    <div class="flex justify-center items-center">
                        <input class="w-4 h-4 mr-2" type="checkbox" id="LS" name="LS" value="LS" />
                        <div class="inline-block">
                            <div class="flex space-x-6 justify-center items-center">
                                <label class="mr-2 text-sm leading-3 font-normal dark:text-gray-300 text-gray-600"
                                    for="LS">Luxe signature</label>
                            </div>
                        </div>
                    </div>
                    <div class="flex justify-center items-center">
                        <input class="w-4 h-4 mr-2" type="checkbox" id="LxL" name="LxL" value="LxL" />
                        <div class="inline-block">
                            <div class="flex space-x-6 justify-center items-center">
                                <label class="mr-2 text-sm leading-3 font-normal dark:text-gray-300 text-gray-600"
                                    for="LxL">Luxe x London</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Apply Filter Button (Large Screen) -->

            <div class="hidden md:block absolute right-0 bottom-0 md:py-10 lg:px-20 md:px-6 py-9 px-4">
                <button onclick="applyFilters()"
                    class="hover:bg-gray-700 dark:bg-white dark:text-gray-800 dark:hover:bg-gray-100 focus:ring focus:ring-offset-2 focus:ring-gray-800 text-base leading-4 font-medium py-4 px-10 text-white bg-gray-800">Apply
                    Filter</button>
            </div>


        </div>
        <!-- ✅ Grid Section - Starts Here 👇 -->
        <section id="Projects"
            class="grid grid-cols-1 lg:grid-cols-4 md:grid-cols-2 justify-items-center justify-center gap-y-20 gap-x-14  mb-5 my-20">

            <!--   ✅ Product card 1 - Starts Here 👇 -->
            @foreach ($products as $index => $product)
                <div class="w-72 rounded-xl duration-500">
                    <a href="#">
                        <div class="image swiper-container product-swiper-{{ $index + 1 }}" loading="lazy">
                            <div class="swiper-wrapper">
                                @foreach ($product->photos as $item)
                                    <div class="swiper-slide">
                                        <img src="{{ asset($item->image) }}" alt="{{ $product->name }}"
                                            class="h-80 w-72 object-cover rounded-xl hover:scale-105">
                                    </div>
                                @endforeach
                            </div>

                            <!-- Pagination -->
                            <div class="swiper-pagination swiper-pagination-{{ $index + 1 }}"></div>

                            <!-- Navigation -->
                            <div class="swiper-button-prev swiper-button-prev-{{ $index + 1 }}"></div>
                            <div class="swiper-button-next swiper-button-next-{{ $index + 1 }}"></div>
                        </div>
                    </a>
                    <div class="px-4 py-3 w-72">
                        <span
                            class="text-gray-400 mr-3 uppercase text-xs">{{ $product->category_product->name }}</span>
                        <p class="text-lg font-bold text-black truncate block capitalize">{{ $product->name }}</p>
                        <div class="flex items-center">
                            <p class="text-lg font-semibold text-black cursor-auto my-3">$149</p>
                            <del>
                                <p class="text-sm text-gray-600 cursor-auto ml-2">$199</p>
                            </del>
                            <div class="ml-auto">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                    fill="currentColor" class="bi bi-bag-plus" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M8 7.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V12a.5.5 0 0 1-1 0v-1.5H6a.5.5 0 0 1 0-1h1.5V8a.5.5 0 0 1 .5-.5z" />
                                    <path
                                        d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach



            <!--   🛑 Product card 1 - Ends Here  -->


        </section>



        <style>
            .checkbox:checked+.check-icon {
                display: flex;
            }
        </style>
        <script>
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
        </div>


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
                // Initialisation du Swiper avec les paramètres
                const swiper = new Swiper('.swiper', {
                    spaceBetween: 1, // Espacement entre les slides // Affiche 7 slides à la fois
                    loop: true, // Pour rendre le slider infini
                    navigation: {
                        nextEl: '.custom-next', // Bouton suivant
                        prevEl: '.custom-prev', // Bouton précédent
                    },
                    breakpoints: {
                        // Réduire le nombre de slides sur des écrans plus petits
                        1024: {
                            slidesPerView: 12,
                        },
                        768: {
                            slidesPerView: 7,
                        },
                        480: {
                            slidesPerView: 2,
                        },
                    },
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
    </main>
</body>

</html>

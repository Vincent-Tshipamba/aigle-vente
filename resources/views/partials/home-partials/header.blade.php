<!-- header-area-start -->
<header>
    <div class="logo-area mt-30 d-none d-xl-block">
        <div class="container">
            <div class="flex items-center justify-between w-full">
                <div class="basis-1/6 flex-shrink-0">
                    <div>
                        <a href="{{ route('home') }}" class="flex items-center space-x-2">
                            <img loading="lazy" src="{{ asset('img/logo/logo_sans_bg.png') }}" width="25%"
                                alt="logo">
                            <h1 class="lg:text-xl font-bold">Aigle Vente</h1>
                        </a>
                    </div>
                </div>
                <div class="flex-grow">
                    <div class="main-menu flex items-center justify-center">
                        <nav id="mobile-menu">
                            <ul>
                                <li>
                                    <a href="{{ route('home') }}">Accueil</a>
                                </li>
                                <li class="has-dropdown">
                                    <a href="javascript:;">Produits</a>
                                    <ul class="submenu">
                                        <li><a href="{{ route('products.index') }}">Produits</a></li>
                                        <li><a href="{{ route('products.index') }}">Boutiques</a></li>
                                        <li><a href="{{ route('client.wishlist') }}">Liste de souhaits</a></li>
                                    </ul>
                                </li>
                                <li><a href="{{ route('contact') }}">Contact</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="basis-1/6 flex-shrink-0">
                    <div class="header-meta-info d-flex align-items-center justify-content-between">
                        <div class="header-meta header-language flex items-center space-x-3">
                            @auth
                                <!-- Chat Notification Area -->
                                <button class="relative" id="dropdownButtonChatHeader-home"
                                    data-dropdown-toggle="dropdownChatHeader-home">
                                    <div class="relative bg-orange-50 p-2 rounded-lg">
                                        <svg class="w-8 h-8 text-[#e38407] animate-wiggle" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 21 21">
                                            <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round"
                                                d="M15.585 15.5H5.415A1.65 1.65 0 0 1 4 13a10.526 10.526 0 0 0 1.5-5.415V6.5a4 4 0 0 1 4-4h2a4 4 0 0 1 4 4v1.085c0 1.907.518 3.78 1.5 5.415a1.65 1.65 0 0 1-1.415 2.5zm1.915-11c-.267-.934-.6-1.6-1-2s-1.066-.733-2-1m-10.912 3c.209-.934.512-1.6.912-2s1.096-.733 2.088-1M13 17c-.667 1-1.5 1.5-2.5 1.5S8.667 18 8 17" />
                                        </svg>
                                        <div
                                            class="px-1 py-0.5 bg-[#e38407] min-w-5 rounded-full text-center text-white text-xs absolute -top-2 -end-1 translate-x-1/4 text-nowrap">
                                            <div
                                                class="absolute top-0 start-0 rounded-full -z-10 animate-ping bg-[#e38407] w-full h-full">
                                            </div>
                                            3
                                        </div>
                                    </div>
                                </button>

                                <!-- Dropdown chat -->
                                <div id="dropdownChatHeader-home"
                                    class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-60 dark:bg-gray-700 dark:divide-gray-600">
                                    <div class="px-4 py-3 text-sm text-gray-900 dark:text-white">
                                        <div>{{ Auth::user()->name }}</div>
                                        <div class="font-medium truncate">{{ Auth::user()->email }}</div>
                                    </div>
                                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                                        aria-labelledby="dropdownChatHeader-home">
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
                                    </ul>
                                </div>
                                <!-- Chat Notification Area End -->

                                <!-- User Dropdown Area -->
                                <button id="dropdownUserAvatarButtonHeader-home"
                                    data-dropdown-toggle="dropdownAvatarHeader-home"
                                    class="flex text-sm bg-gray-800 rounded-full md:me-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                                    type="button">
                                    <span class="sr-only">Open user menu</span>
                                    <img class="w-8 h-8 rounded-full" src="/docs/images/people/profile-picture-3.jpg"
                                        alt="user photo">
                                </button>

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
                                            <form class="logout-form" method="POST" action="{{ route('logout') }}"
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
                                <!-- User Dropdown Area end-->

                                <div class="header-meta__social flex items-center ml-25">
                                    <button class="header-cart p-relative tp-cart-toggle">
                                        <i class="fal fa-heart"></i>
                                        <span class="tp-product-count wishcount">{{ $wishlists->count() }}</span>
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
                <div class="row align-items-center">
                    <div class="header-search-bar">
                        <form action="#">
                            <div class="search-info p-relative">
                                <button class="header-search-icon"><i class="fal fa-search"></i></button>
                                <input class="search-input" type="text" placeholder="Rechercher des produits...">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- header-area-end -->

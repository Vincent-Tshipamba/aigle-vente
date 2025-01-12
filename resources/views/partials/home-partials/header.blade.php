<!-- header-area-start -->
<header>
    <div class="logo-area mt-30 d-none d-xl-block">
        <div class="container">
            <div class="flex items-center justify-between w-full">
                <div class="basis-1/6 flex-shrink-0">
                    <div>
                        <a href="{{ route('home') }}" class="flex items-center space-x-2">
                            <img loading="lazy" src="{{ asset('img/logo/logo_sans_bg.png') }}" width="15%" alt="logo">
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
                                    <a href="{{ route('products.index') }}">Produits</a>
                                    <ul class="submenu">
                                        <li><a href="{{ route('products.index') }}">Produits</a></li>
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

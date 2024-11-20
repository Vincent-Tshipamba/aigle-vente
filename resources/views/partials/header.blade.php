<!-- header-area-start -->
<header>
    <div class="header-top space-bg">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-8 col-lg-12 col-md-12">
                    <div class="header-welcome-text ">
                        <span>Bienvenue dans notre boutique internationale ! Profitez de la livraison gratuite pour les
                            commandes de 100 $ et plus.</span>
                        <a href="#">Achetez maintenant<i class="fal fa-long-arrow-right"></i></a>
                    </div>
                </div>
                <div class="col-xl-4 d-none d-xl-block">
                    <div class="headertoplag d-flex align-items-center justify-content-end">
                        <div class="menu-top-social">
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-behance"></i></a>
                            <a href="#"><i class="fab fa-youtube"></i></a>
                            <a href="#"><i class="fab fa-linkedin"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mainmenuarea d-none d-xl-block">
        <div class="container">
            <div class="row items-center">
                <div class="col-lg-3">
                    <div class="mainmenu flex items-center">
                        <div class="logo">
                            <a href="{{ route('home') }}" class="">
                                <img src="{{ asset('img/logo/logo_sans_bg.png') }}" width="50%" alt="logo">
                            </a>
                        </div>
                        <div class="mainmenu__search">
                            <form action="#">
                                <div class="mainmenu__search-bar p-relative w-full">
                                    <button class="mainmenu__search-icon"><i class="fal fa-search"></i></button>
                                    <input class="search-input" type="text" placeholder="Rechercher des produits...">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div>
                        <div class="mainmenu__main flex items-center justify-center p-relative">
                            <div class="main-menu flex justify-center">
                                <nav id="mobile-menu">
                                    <ul>
                                        <li class="has-dropdown">
                                            <a href="{{ route('home') }}">Accueil</a>
                                            <ul class="submenu">
                                                <li><a href="{{ route('home.fashion') }}">Accueil Mode</a></li>
                                                <li><a href="{{ route('home.furniture') }}">Accueil Meubles</a></li>
                                                <li><a href="{{ route('home.cosmetic') }}">Accueil Cosmétiques</a></li>
                                                <li><a href="{{ route('home.food-grocery') }}">Accueil Épicerie</a></li>
                                            </ul>
                                        </li>
                                        <li class="has-dropdown">
                                            <a href="shop.html">Shop</a>
                                            <ul class="submenu">
                                                <li><a href="shop.html">Boutique</a></li>
                                                <li><a href="shop-2.html">Boutique 2</a></li>
                                                <li><a href="shop-details.html">Détails de la boutique</a></li>
                                                <li><a href="shop-details-2.html">Détails de la boutique 2</a></li>
                                                <li><a href="shop-location.html">Emplacement de la boutique</a></li>
                                                <li><a href="cart.html">Panier</a></li>
                                                <li><a href="{{ route('login') }}">Se connecter</a></li>
                                                <li><a href="checkout.html">Paiement</a></li>
                                                <li><a href="wishlist.html">Liste de souhaits</a></li>
                                                <li><a href="track.html">Suivi de produit</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="{{ route('contact') }}">Contact</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3">
                    <div class="header-meta flex items-center space-x-4 justify-end">
                        @auth
                            <button id="dropdownUserAvatarButtonHeader-1" data-dropdown-toggle="dropdownAvatarHeader-1"
                                class="flex text-sm bg-gray-800 rounded-full md:me-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                                type="button">
                                <span class="sr-only">Open user menu</span>
                                <img class="w-8 h-8 rounded-full" src="/docs/images/people/profile-picture-3.jpg"
                                    alt="user photo">
                            </button>

                            <!-- Dropdown menu -->
                            <div id="dropdownAvatarHeader-1"
                                class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-60 dark:bg-gray-700 dark:divide-gray-600">
                                <div class="px-4 py-3 text-sm text-gray-900 dark:text-white">
                                    <div>{{ Auth::user()->name }}</div>
                                    <div class="font-medium truncate">{{ Auth::user()->email }}</div>
                                </div>
                                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                                    aria-labelledby="dropdownUserAvatarButtonHeader-1">
                                    <li>
                                        @if (Auth::user()->client)
                                            <a href=""
                                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                                Mon dashboard client
                                            </a>
                                        @elseif (Auth::user()->isSeller())
                                            <a href="{{ route('seller.dashboard') }}"
                                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                                Mon dashboard de vendeur
                                            </a>
                                        @elseif (Auth::user()->hasRole('superadmin'))
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
                            <div class="header-meta__social flex items-center space-x-3">
                                <button class="header-cart p-relative tp-cart-toggle me-3">
                                    <i class="fal fa-heart"></i>
                                    <span class="tp-product-count wishcount">{{ $wishlists->count() }}</span>
                                </button>
                                @php
                                    $user = Auth::user();
                                    $client = App\Models\Client::where('user_id', $user->id)->first();
                                @endphp

                                @if (Auth::check() && !Auth::user()->isSeller())
                                    <a href="{{ route('sellers.create') }}"
                                        class="w-full inline-block px-[10px] py-[15px] bg-[var(--tp-text-primary)] text-[var(--tp-common-white)] text-sm font-semibold rounded-md text-center transition-all duration-300 whitespace-nowrap align-middle touch-manipulation">
                                        Devenir vendeur</a>
                                @else
                                    <a href="{{ route('seller.dashboard') }}">
                                        <svg class=" text-gray-800 dark:text-white" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            fill="currentColor" viewBox="0 0 24 24">
                                            <path fill-rule="evenodd"
                                                d="M4 4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2H4Zm16 7H4v7h16v-7ZM5 8a1 1 0 0 1 1-1h.01a1 1 0 0 1 0 2H6a1 1 0 0 1-1-1Zm4-1a1 1 0 0 0 0 2h.01a1 1 0 0 0 0-2H9Zm2 1a1 1 0 0 1 1-1h.01a1 1 0 1 1 0 2H12a1 1 0 0 1-1-1Z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </a>
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
</header>
<!-- header-area-end -->

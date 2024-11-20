<!-- header-xl-sticky-area -->
<div id="header-sticky" class="logo-area tp-sticky-one mainmenu-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-xl-3 col-lg-3">
                <div class="logo col-span-1">
                    <a href="{{ route('home') }}" class="flex items-center space-x-2">
                        <img src="{{ asset('img/logo/logo_sans_bg.png') }}" width="25%" alt="logo">
                        <h1 class="text-2xl font-bold animate__animated animate__slideInRight">Aigle Vente</h1>
                    </a>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4">
                <div class="main-menu flex justify-center">
                    <nav>
                        <ul class="flex items-center">
                            <li class="has-dropdown">
                                <a href="{{ route('home') }}">Accueil</a>
                                <ul class="submenu">
                                    <li><a href="{{ route('home.fashion') }}">Mode</a></li>
                                    <li><a href="{{ route('home.furniture') }}">Meubles</a></li>
                                    <li><a href="{{ route('home.cosmetic') }}">Cosmétiques</a></li>
                                    <li><a href="{{ route('home.food-grocery') }}">Épicerie</a></li>
                                </ul>
                            </li>
                            <li class="has-dropdown">
                                <a href="shop.html">Boutique</a>
                                <ul class="submenu">
                                    <li><a href="shop.html">Boutique</a></li>
                                    <li><a href="shop-2.html">Boutique 2</a></li>
                                    <li><a href="shop-details.html">Détails de la Boutique</a></li>
                                    <li><a href="shop-details-2.html">Détails de la Boutique 2</a></li>
                                    <li><a href="shop-location.html">Localisation de la Boutique</a></li>
                                    <li><a href="cart.html">Panier</a></li>
                                    <li><a href="{{ route('login') }}">Se Connecter</a></li>
                                    <li><a href="checkout.html">Passer à la Caisse</a></li>
                                    <li><a href="wishlist.html">Liste de Souhaits</a></li>
                                    <li><a href="track.html">Suivi de Produit</a></li>
                                </ul>
                            </li>
                            <li><a href="{{ route('contact') }}">Contact</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="col-xl-5 col-lg-5">
                <div class="header-meta-info flex items-center justify-end space-x-3">
                    <div class="header-meta__search-5 ml-25">
                        <div class="header-search-bar-5">
                            <form action="#">
                                <div class="search-info-5 p-relative">
                                    <button class="header-search-icon-5"><i class="fal fa-search"></i></button>
                                    <input type="text" placeholder="Rechercher des produits...">
                                </div>
                            </form>
                        </div>
                    </div>
                    @auth
                        <button id="dropdownUserAvatarButtonHeader-home-xl"
                            data-dropdown-toggle="dropdownAvatarHeader-home-xl"
                            class="flex text-sm bg-gray-800 rounded-full md:me-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                            type="button">
                            <span class="sr-only">Open user menu</span>
                            <img class="w-8 h-8 rounded-full" src="/docs/images/people/profile-picture-3.jpg"
                                alt="user photo">
                        </button>

                        <!-- Dropdown menu -->
                        <div id="dropdownAvatarHeader-home-xl"
                            class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-60 dark:bg-gray-700 dark:divide-gray-600">
                            <div class="px-4 py-3 text-sm text-gray-900 dark:text-white">
                                <div>{{ Auth::user()->name }}</div>
                                <div class="font-medium truncate">{{ Auth::user()->email }}</div>
                            </div>
                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                                aria-labelledby="dropdownUserAvatarButtonHeader-home-xl">
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
                        <div class="header-meta__social flex items-center">
                            <button class="header-cart p-relative tp-cart-toggle">
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
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                        viewBox="0 0 24 24">
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
<!-- header-xl-sticky-end -->

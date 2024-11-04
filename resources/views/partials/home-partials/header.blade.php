<!-- header-area-start -->
<header>
    <div class="header-top space-bg">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="header-welcome-text text-start ">
                        <span>Bienvenue dans notre boutique internationale ! Profitez de la livraison gratuite pour les
                            commandes de 100 $ et plus.</span>
                        <a href="shop.html">Achetez maintenant <i class="fal fa-long-arrow-right"></i> </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="logo-area mt-30 d-none d-xl-block">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-2 col-lg-3">
                    <div class="logo col-span-1">
                        <a href="{{ route('home') }}" class="flex items-center space-x-2">
                            <img src="{{ asset('img/logo/logo_sans_bg.png') }}" width="25%" alt="logo">
                            <h1 class="text-2xl font-bold animate__animated animate__slideInRight">Aigle Vente</h1>
                        </a>
                    </div>
                </div>
                <div class="col-xl-10 col-lg-9">
                    <div class="header-meta-info d-flex align-items-center justify-content-between">
                        <div class="header-search-bar">
                            <form action="#">
                                <div class="search-info p-relative">
                                    <button class="header-search-icon"><i class="fal fa-search"></i></button>
                                    <input type="text" placeholder="Rechercher des produits...">
                                </div>
                            </form>
                        </div>
                        <div class="header-meta header-language flex items-center space-x-3">
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
                            @endauth
                            <div class="header-meta__social flex items-center ml-25">
                                <button class="header-cart p-relative tp-cart-toggle">
                                    <i class="fal fa-shopping-cart"></i>
                                    <span class="tp-product-count">2</span>
                                </button>

                                <a href="wishlist.html"><i class="fal fa-heart"></i></a>
                                @auth
                                    @php
                                        $user = Auth::user();
                                        $client = App\Models\Client::where('user_id', $user->id)->first();
                                    @endphp

                                    <div class="flex items-center mx-3 space-x-5 "
                                        data-dropdown-toggle="dropdown-user-header">
                                        <div>
                                            <button type="button"
                                                class="flex text-sm bg-white rounded-full focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                                                aria-expanded="false" data-dropdown-toggle="dropdown-user-header">
                                                <span class="sr-only">Open user menu</span>
                                                <img class="w-12 rounded-full border mx-2"
                                                    src="{{ asset('img/profil.jpeg') }}" alt="user photo">

                                            </button>
                                        </div>

                                        <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow dark:bg-gray-700 dark:divide-gray-600"
                                            id="dropdown-user-header">
                                            <div class="px-4 py-3" role="none">
                                                <p class="text-sm text-gray-900 dark:text-white" role="none">
                                                    {{ Auth::user()->name }}
                                                </p>
                                                <p class="text-sm font-medium text-gray-900 truncate dark:text-gray-300"
                                                    role="none">
                                                    {{ Auth::user()->email }}
                                                </p>
                                            </div>
                                            <ul class="py-2 px-4" role="none">
                                                <li>
                                                    <a href="{{ route('profile.edit') }}"
                                                        class="block text-xs py-2 text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white"
                                                        role="menuitem">Profil</a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('profile.edit') }}"
                                                        class="block text-xs py-2 text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white"
                                                        role="menuitem">Mes commandes</a>
                                                </li>

                                                <li>
                                                    @if (Auth::check() && !Auth::user()->isSeller())
                                                        <a href="{{ route('sellers.create') }}"
                                                            class="">Devenir
                                                            vendeur</a>
                                                    @else
                                                        <a href="{{ route('seller.dashboard') }}"class="block text-xs py-2 text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white"
                                                            role="menuitem">

                                                            Dashboard

                                                        </a>
                                                    @endif
                                                </li>

                                                <li>
                                                    <!-- Authentication -->
                                                    <form id="logout-form" method="POST" action="{{ route('logout') }}"
                                                        style="display: none;">
                                                        @csrf
                                                    </form>
                                                    <a href="#" onclick="event.preventDefault(); confirmLogout();">
                                                        <i class="fal fa-user"></i> {{ __('Deconnexion') }}
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>


                                    </div>
                                @else
                                    <a href="{{ route('login') }}"><i class="fal fa-user"></i></a>
                                    <!-- Lien vers le formulaire de connexion -->
                                @endauth

                                <a href="wishlist.html"><i class="fal fa-heart"></i></a>

                                @if (Auth::check() && !Auth::user()->isSeller())
                                    <a href="{{ route('sellers.create') }}" class="tptrack__submition">Devenir
                                        vendeur</a>
                                @endif

                            </div>
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
                    <div class="col-xl-2 col-lg-3">
                        <div class="cat-menu__category p-relative">
                            <a class="tp-cat-toggle has-dropdown" href="#" role="button"><i
                                    class="fal fa-bars"></i>Catégories</a>
                            <div class="category-menu category-menu-off">
                                <ul class="cat-menu__list">
                                    <li><a href="shop.html"><i class="fal fa-user"></i> Bougies</a></li>
                                    <li class="menu-item-has-children"><a href="shop.html"><i
                                                class="fal fa-flower-tulip"></i> Fait main</a>
                                        <ul class="submenu">
                                            <li><a href="shop-2.html">Chaise</a></li>
                                            <li><a href="shop-2.html">Table</a></li>
                                            <li><a href="shop.html">Bois</a></li>
                                            <li><a href="shop.html">Meubles</a></li>
                                            <li><a href="shop.html">Horloge</a></li>
                                            <li><a href="shop.html">Cadeaux</a></li>
                                            <li><a href="shop.html">Artisanat</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="shop.html"><i class="fal fa-shoe-prints"></i> Coffrets cadeaux</a>
                                    </li>
                                    <li><a href="shop.html"><i class="fal fa-smile"></i> Cadeaux en plastique</a></li>
                                    <li><a href="shop.html"><i class="fal fa-futbol"></i> Crème pour les mains</a>
                                    </li>
                                    <li><a href="shop.html"><i class="fal fa-crown"></i> Cosmétiques</a></li>
                                    <li><a href="shop.html"><i class="fal fa-gift"></i> Accessoires en soie</a></li>
                                </ul>
                                <div class="daily-offer">
                                    <ul>
                                        <li><a href="shop.html">Valeur du jour</a></li>
                                        <li><a href="shop.html">Top 100 des offres</a></li>
                                        <li><a href="shop.html">Nouveautés</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-7 col-lg-6">
                        <div class="main-menu flex items-center justify-center">
                            <nav id="mobile-menu">
                                <ul>
                                    <li class="has-dropdown">
                                        <a href="{{ route('home') }}">Accueil</a>
                                        <ul class="submenu">
                                            <li><a href="{{ route('home.fashion') }}">Accueil Mode</a></li>
                                            <li><a href="{{ route('home.furniture') }}">Accueil Meubles</a></li>
                                            <li><a href="{{ route('home.cosmetic') }}">Accueil Cosmétiques</a></li>
                                            <li><a href="{{ route('home.food-grocery') }}">Épicerie</a></li>
                                        </ul>
                                    </li>
                                    <li class="has-dropdown">
                                        <a href="shop.html">Boutique</a>
                                        <ul class="submenu">
                                            <li><a href="shop.html">Boutique</a></li>
                                            <li><a href="shop-2.html">Boutique 2</a></li>
                                            <li><a href="shop-details.html">Détails de la boutique</a></li>
                                            <li><a href="shop-details-2.html">Détails de la boutique 2</a></li>
                                            <li><a href="shop-location.html">Localisation de la boutique</a></li>
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
                    <div class="col-xl-3 col-lg-3">
                        <div class="menu-contact">
                            <ul class="flex justify-center">
                                <li>
                                    <div class="menu-contact__item">
                                        <div class="menu-contact__icon">
                                            <i class="fal fa-phone"></i>
                                        </div>
                                        <div class="menu-contact__info">
                                            <a href="tel:0123456">+243 81 234 56 78</a>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="menu-contact__item">
                                        <div class="menu-contact__icon">
                                            <i class="fal fa-map-marker-alt"></i>
                                        </div>
                                        <div class="menu-contact__info">
                                            <a href="shop-location.html">Trouver un magasin</a>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- header-area-end -->

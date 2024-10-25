<!-- header-xl-sticky-area -->
<div id="header-sticky" class="logo-area tp-sticky-one mainmenu-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-xl-2 col-lg-3">
                <div class="logo">
                    <a href="{{ route('home') }}"><img src="{{ asset('img/logo/logo.png') }}" alt="logo"></a>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6">
                <div class="main-menu">
                    <nav>
                        <ul>
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
                            <li class="has-dropdown has-megamenu">
                                <a href="about.html">Pages</a>
                                <ul class="submenu mega-menu">
                                    <li>
                                        <a class="mega-menu-title">Mise en Page</a>
                                        <ul>
                                            <li><a href="shop.html">Filtres Boutique v1</a></li>
                                            <li><a href="shop-2.html">Filtres Boutique v2</a></li>
                                            <li><a href="shop-details.html">Barre Latérale Boutique</a></li>
                                            <li><a href="shop-details-2.html">Barre Latérale Droite Boutique</a></li>
                                            <li><a href="shop-location.html">Vue Liste Boutique</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a class="mega-menu-title">Mise en Page</a>
                                        <ul>
                                            <li><a href="about.html">À Propos</a></li>
                                            <li><a href="cart.html">Panier</a></li>
                                            <li><a href="checkout.html">Passer à la Caisse</a></li>
                                            <li><a href="{{ route('login') }}">Se Connecter</a></li>
                                            <li><a href="{{ route('login') }}">Connexion</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a class="mega-menu-title">Type de Page</a>
                                        <ul>
                                            <li><a href="track.html">Suivi de Produit</a></li>
                                            <li><a href="wishlist.html">Liste de Souhaits</a></li>
                                            <li><a href="error.html">404 / Erreur</a></li>
                                            <li><a href="coming-soon.html">Bientôt Disponible</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="{{ route('blog') }}">Blog</a>
                            </li>
                            <li><a href="{{ route('contact') }}">Contact</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="col-xl-4 col-lg-9">
                <div class="header-meta-info d-flex align-items-center justify-content-end">
                    <div class="header-meta__social d-flex align-items-center">
                        <button class="header-cart p-relative tp-cart-toggle">
                            <i class="fal fa-shopping-cart"></i>
                            <span class="tp-product-count">2</span>
                        </button>
                        @auth
                            @php
                                $user = Auth::user();
                                $client = App\Models\Client::where('user_id', $user->id)->first();
                            @endphp

                            <div class="flex items-center px-3 space-x-3 " data-dropdown-toggle="dropdown-user-header-xl">
                                <div>
                                    <button type="button"
                                        class="flex text-sm bg-white rounded-full focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                                        aria-expanded="false" data-dropdown-toggle="dropdown-user-header-xl-1">
                                        <span class="sr-only">Open user menu</span>
                                        <img class="w-12 rounded-full border mx-2" src="{{ asset('img/profil.jpeg') }}"
                                            alt="user photo">

                                    </button>
                                </div>


                                <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow dark:bg-gray-700 dark:divide-gray-600"
                                    id="dropdown-user-header-xl">
                                    <div class="px-4 py-3" role="none">
                                        <p class="text-sm text-gray-900 dark:text-white" role="none">
                                            {{ Auth::user()->name }}
                                        </p>
                                        <p class="text-sm font-medium text-gray-900 truncate dark:text-gray-300"
                                            role="none">
                                            {{ Auth::user()->email }}
                                        </p>
                                    </div>
                                    <ul class="py-1" role="none">
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
                    </div>
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
                </div>
            </div>
        </div>
    </div>
</div>
<!-- header-xl-sticky-end -->

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
            <div class="row align-items-center">
                <div class="col-lg-9">
                    <div class="mainmenu d-flex align-items-center">
                        <div class="mainmenu__search">
                            <form action="#">
                                <div class="mainmenu__search-bar p-relative">
                                    <button class="mainmenu__search-icon"><i class="fal fa-search"></i></button>
                                    <input type="text" placeholder="Rechercher des produits...">
                                </div>
                            </form>
                        </div>
                        <div class="mainmenu__main d-flex align-items-center p-relative">
                            <div class="main-menu">
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
                                        <li class="has-dropdown has-megamenu">
                                            <a href="about.html">Pages</a>
                                            <ul class="submenu mega-menu">
                                                <li>
                                                    <a class="mega-menu-title">Mise en page</a>
                                                    <ul>
                                                        <li><a href="shop.html">Filtres de boutique v1</a></li>
                                                        <li><a href="shop-2.html">Filtres de boutique v2</a></li>
                                                        <li><a href="shop-details.html">Barre latérale de la
                                                                boutique</a></li>
                                                        <li><a href="shop-details-2.html">Barre latérale droite de la
                                                                boutique</a>
                                                        </li>
                                                        <li><a href="shop-location.html">Vue en liste de la boutique</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    <a class="mega-menu-title">Mise en page</a>
                                                    <ul>
                                                        <li><a href="about.html">À propos</a></li>
                                                        <li><a href="cart.html">Panier</a></li>
                                                        <li><a href="checkout.html">Paiement</a></li>
                                                        <li><a href="{{ route('login') }}">Se connecter</a></li>
                                                        <li><a href="{{ route('login') }}">Connexion</a></li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    <a class="mega-menu-title">Type de page</a>
                                                    <ul>
                                                        <li><a href="track.html">Suivi de produit</a></li>
                                                        <li><a href="wishlist.html">Liste de souhaits</a></li>
                                                        <li><a href="error.html">404 / Erreur</a></li>
                                                        <li><a href="coming-soon.html">Bientôt disponible</a></li>
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
                            <div class="mainmenu__logo">
                                <a href="{{ route('home') }}"><img src="{{ asset('img/logo/logo.png') }}"
                                        alt=""></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3">
                    <div class="header-meta d-flex align-items-center justify-content-end">
                        <div class="header-meta__social d-flex align-items-center ml-25">
                            <button class="header-cart p-relative tp-cart-toggle me-3">
                                <i class="fal fa-shopping-cart"></i>
                                <span class="tp-product-count">2</span>
                            </button>
                            @auth
                                @php
                                    $user = Auth::user();
                                    $client = App\Models\Client::where('user_id', $user->id)->first();
                                @endphp

                                <div class="flex items-center px-3 space-x-3 " data-dropdown-toggle="dropdown-user">
                                    <div>
                                        <button type="button"
                                            class="flex text-sm bg-white rounded-full focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                                            aria-expanded="false" data-dropdown-toggle="dropdown-user">
                                            <span class="sr-only">Open user menu</span>
                                            <img class="w-8 h-8 rounded-full border mx-2"
                                                src="{{ asset('img/profil.jpeg') }}" alt="user photo">

                                        </button>
                                    </div>


                                    <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow dark:bg-gray-700 dark:divide-gray-600"
                                        id="dropdown-user">
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
                                @else
                                    <a href="{{ route('login') }}"><i class="fal fa-user"></i></a>
                                    <!-- Lien vers le formulaire de connexion -->
                                @endauth
                                <a href="wishlist.html"><i class="fal fa-heart"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</header>
<!-- header-area-end -->

<!-- header-xl-sticky-area -->
<div id="header-sticky" class="logo-area tp-sticky-one mainmenu-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-xl-2 col-lg-3">
                <div class="logo">
                    <a href="/"><img src="{{ asset('img/logo/logo.png') }}" alt="logo"></a>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6">
                <div class="main-menu">
                    <ul>
                        <li class="has-dropdown">
                            <a href="/">Accueil</a>
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
                                <li><a href="shop-details.html">Détails Boutique</a></li>
                                <li><a href="shop-details-2.html">Détails Boutique 2</a></li>
                                <li><a href="shop-location.html">Localisation Boutique</a></li>
                                <li><a href="cart.html">Panier</a></li>
                                <li><a href="sign-in.html">Se Connecter</a></li>
                                <li><a href="checkout.html">Paiement</a></li>
                                <li><a href="wishlist.html">Liste de Souhaits</a></li>
                                <li><a href="track.html">Suivi Produit</a></li>
                            </ul>
                        </li>
                        <li class="has-dropdown has-megamenu">
                            <a href="about.html">Pages</a>
                            <ul class="submenu mega-menu">
                                <li>
                                    <a class="mega-menu-title">Disposition de la Page</a>
                                    <ul>
                                        <li><a href="shop.html">Filtres Boutique v1</a></li>
                                        <li><a href="shop-2.html">Filtres Boutique v2</a></li>
                                        <li><a href="shop-details.html">Barre Latérale Boutique</a></li>
                                        <li><a href="shop-details-2.html">Barre Latérale Droite Boutique</a></li>
                                        <li><a href="shop-location.html">Vue Liste Boutique</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a class="mega-menu-title">Disposition de la Page</a>
                                    <ul>
                                        <li><a href="about.html">À Propos</a></li>
                                        <li><a href="cart.html">Panier</a></li>
                                        <li><a href="checkout.html">Paiement</a></li>
                                        <li><a href="sign-in.html">Se Connecter</a></li>
                                        <li><a href="sign-in.html">Connexion</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a class="mega-menu-title">Type de Page</a>
                                    <ul>
                                        <li><a href="track.html">Suivi Produit</a></li>
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
                </div>
            </div>
            <div class="col-xl-4 col-lg-9">
                <div class="header-meta-info d-flex align-items-center justify-content-end">
                    <div class="header-meta__social  d-flex align-items-center">
                        <button class="header-cart p-relative tp-cart-toggle">
                            <i class="fal fa-shopping-cart"></i>
                            <span class="tp-product-count">2</span>
                        </button>
                        <a href="sign-in.html"><i class="fal fa-user"></i></a>
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

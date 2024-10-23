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
                    <div class="logo">
                        <a href="/"><img src="{{ asset('img/logo/logo.png') }}" alt="logo"></a>
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
                        <div class="header-meta header-language d-flex align-items-center">
                            <div class="header-meta__social d-flex align-items-center ml-25">
                                <button class="header-cart p-relative tp-cart-toggle">
                                    <i class="fal fa-shopping-cart"></i>
                                    <span class="tp-product-count">2</span>
                                </button>
                                <a href="{{ route('login') }}"><i class="fal fa-user"></i></a>
                                <a href="wishlist.html"><i class="fal fa-heart"></i></a>
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
                                    <li><a href="shop.html"><i class="fal fa-shoe-prints"></i> Coffrets cadeaux</a></li>
                                    <li><a href="shop.html"><i class="fal fa-smile"></i> Cadeaux en plastique</a></li>
                                    <li><a href="shop.html"><i class="fal fa-futbol"></i> Crème pour les mains</a></li>
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
                        <div class="main-menu">
                            <nav id="mobile-menu">
                                <ul>
                                    <li class="has-dropdown">
                                        <a href="/">Accueil</a>
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
                                    <li class="has-dropdown has-megamenu">
                                        <a href="about.html">Pages</a>
                                        <ul class="submenu mega-menu">
                                            <li>
                                                <a class="mega-menu-title">Mise en page</a>
                                                <ul>
                                                    <li><a href="shop.html">Filtres de boutique v1</a></li>
                                                    <li><a href="shop-2.html">Filtres de boutique v2</a></li>
                                                    <li><a href="shop-details.html">Barre latérale de boutique</a></li>
                                                    <li><a href="shop-details-2.html">Barre latérale droite de
                                                            boutique</a></li>
                                                    <li><a href="shop-location.html">Vue en liste de boutique</a></li>
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
                    </div>
                    <div class="col-xl-3 col-lg-3">
                        <div class="menu-contact">
                            <ul>
                                <li>
                                    <div class="menu-contact__item">
                                        <div class="menu-contact__icon">
                                            <i class="fal fa-phone"></i>
                                        </div>
                                        <div class="menu-contact__info">
                                            <a href="tel:0123456">908. 408. 501. 89</a>
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

<!-- sidebar-menu-area -->
<div class="tpsideinfo">
    <button class="tpsideinfo__close">Fermer<i class="fal fa-times ml-10"></i></button>
    <div class="tpsideinfo__search text-center pt-35">
        <span class="tpsideinfo__search-title mb-20">Que cherchez-vous ?</span>
        <form action="#">
            <input class="search-input" type="text" placeholder="Rechercher des produits...">
            <button><i class="fal fa-search"></i></button>
        </form>
    </div>
    <div class="tpsideinfo__nabtab">
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home"
                    type="button" role="tab" aria-controls="pills-home" aria-selected="true">Menu</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile"
                    type="button" role="tab" aria-controls="pills-profile"
                    aria-selected="false">Catégories</button>
            </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab"
                tabindex="0">
                <div class="mobile-menu"></div>
            </div>
            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab"
                tabindex="0">
                <div class="tpsidebar-categories">
                    <ul>
                        <li><a href="shop.html">Meubles</a></li>
                        <li><a href="shop.html">Bois</a></li>
                        <li><a href="shop.html">Style de Vie</a></li>
                        <li><a href="shop-2.html">Shopping</a></li>
                        <li><a href="track.html">Suivi de Produit</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="tpsideinfo__account-link">
        <a href="{{ route('login') }}"><i class="fal fa-user"></i> Connexion / Inscription</a>
    </div>
    <div class="tpsideinfo__wishlist-link">
        <a href="{{ route('client.wishlist') }}" target="_parent"><i class="fal fa-heart"></i> Liste de Souhaits</a>
    </div>
</div>
<div class="body-overlay"></div>
<!-- sidebar-menu-area-end -->

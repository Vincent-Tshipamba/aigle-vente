<!-- début-panier-en-tête -->
<div class="tpcartinfo tp-cart-info-area p-relative">
    <button class="tpcart__close"><i class="fal fa-times"></i></button>
    <div class="tpcart">
        <h4 class="tpcart__title">Votre Panier</h4>
        <div class="tpcart__product">
            <div class="tpcart__product-list">
                <ul>
                    <li>
                        <div class="tpcart__item">
                            <div class="tpcart__img">
                                <img src="{{ asset('img/banner/banner-2-03.jpg') }}" alt="">
                                <div class="tpcart__del">
                                    <a href="#"><i class="far fa-times-circle"></i></a>
                                </div>
                            </div>
                            <div class="tpcart__content">
                                <span class="tpcart__content-title"><a href="shop-details.html">Chemise Granite Légère Evo</a>
                                </span>
                                <div class="tpcart__cart-price">
                                    <span class="quantity">1 x</span>
                                    <span class="new-price">138,00 €</span>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="tpcart__item">
                            <div class="tpcart__img">
                                <img src="{{ asset('img/banner/banner-2-04.jpg') }}" alt="">
                                <div class="tpcart__del">
                                    <a href="#"><i class="far fa-times-circle"></i></a>
                                </div>
                            </div>
                            <div class="tpcart__content">
                                <span class="tpcart__content-title"><a href="shop-details.html">Bouteille Miranda Enorme Purab</a>
                                </span>
                                <div class="tpcart__cart-price">
                                    <span class="quantity">1 x</span>
                                    <span class="new-price">162,80 €</span>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="tpcart__checkout">
                <div class="tpcart__total-price d-flex justify-content-between align-items-center">
                    <span> Sous-total :</span>
                    <span class="heilight-price"> 300,00 €</span>
                </div>
                <div class="tpcart__checkout-btn">
                    <a class="tpcart-btn mb-10" href="cart.html">Voir le Panier</a>
                    <a class="tpcheck-btn" href="checkout.html">Passer à la Caisse</a>
                </div>
            </div>
        </div>
        <div class="tpcart__free-shipping text-center">
            <span>Livraison gratuite pour les commandes <b>à moins de 10 km</b></span>
        </div>
    </div>
</div>
<div class="cartbody-overlay"></div>
<!-- fin-panier-en-tête -->

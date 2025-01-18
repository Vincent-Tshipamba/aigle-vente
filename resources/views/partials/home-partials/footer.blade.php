<!-- footer-area-start -->
<footer>
    <div class="footer-area theme-bg pt-65">
        <div class="container">
            <div class="main-footer pb-15 mb-30">
                <div class="row">
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="footer-widget footer-col-1 mb-40">
                            <div class="footer-logo mb-30">
                                <a href="{{ route('home') }}"><img loading="lazy"
                                        src="{{ asset('img/logo/logo_sans_bg.png') }}" alt="logo"></a>
                            </div>
                            
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-6">
                        <div class="footer-widget footer-col-2 ml-30 mb-40">
                            <h4 class="footer-widget__title mb-30">Informations</h4>
                            <div class="footer-widget__links">
                                <ul>
                                    <li><a href="#">Service Client</a></li>
                                    <li><a href="#">FAQs</a></li>
                                    <li><a href="track.html">Suivi de Commande</a></li>
                                    <li><a href="contact.html">Contacts</a></li>
                                    <li><a href="#">Événements</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-6">
                        <div class="footer-widget footer-col-3 mb-40">
                            <h4 class="footer-widget__title mb-30">Mon Compte</h4>
                            <div class="footer-widget__links">
                                <ul>
                                    <li><a href="#">Informations de Livraison</a></li>
                                    <li><a href="#">Politique de Confidentialité</a></li>
                                    <li><a href="#">Remise</a></li>
                                    <li><a href="#">Service Client</a></li>
                                    <li><a href="#">Termes & Conditions</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-6">
                        <div class="footer-widget footer-col-4 mb-40">
                            <h4 class="footer-widget__title mb-30">Réseaux Sociaux</h4>
                            <div class="footer-widget__links">
                                <ul>
                                    <li><a href="#"><i class="fab fa-facebook-f"></i>Facebook</a></li>
                                    <li><a href="#"><i class="fab fa-dribbble"></i>Dribbble</a></li>
                                    <li><a href="#"><i class="fab fa-twitter"></i>Twitter</a></li>
                                    <li><a href="#"><i class="fab fa-behance"></i>Behance</a></li>
                                    <li><a href="#"><i class="fab fa-youtube"></i>Youtube</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="col-lg-3 col-md-4">
                        <div class="footer-widget footer-col-5 mb-40">
                            <h4 class="footer-widget__title mb-30">Recevoir la Newsletter</h4>
                            <p>Inscrivez-vous et obtenez 10% de réduction sur votre première commande !</p>
                            <div class="footer-widget__newsletter">
                                <form action="#">
                                    <input type="email" placeholder="Entrez votre adresse email">
                                    <button class="footer-widget__fw-news-btn tpsecondary-btn">S'abonner<i
                                            class="fal fa-long-arrow-right"></i></button>
                                </form>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
            <div class="footer-cta pb-20">
                <div class="row justify-content-between align-items-center">
                    <div class="col-xl-6 col-lg-4 col-md-4 col-sm-6">
                        <div class="footer-cta__contact">
                            <div class="footer-cta__icon">
                                <i class="far fa-phone"></i>
                            </div>
                            <div class="footer-cta__text">
                                <a href="tel:0123456">980. 029. 666. 99</a>
                                <span>Ouvert de 8:00 à 22:00</span>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="col-xl-6 col-lg-8 col-md-8 col-sm-6">
                        <div class="footer-cta__source">
                            <div class="footer-cta__source-content">
                                <h4 class="footer-cta__source-title">Télécharger l'App sur Mobile</h4>
                                <p>15% de réduction sur votre premier achat</p>
                            </div>
                            <div class="footer-cta__source-thumb">
                                <a href="#"><img loading="lazy" src="{{ asset('img/footer/f-google.jpg') }}"
                                        alt="google"></a>
                                <a href="#"><img loading="lazy" src="{{ asset('img/footer/f-app.jpg') }}"
                                        alt="app"></a>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
        <div class="footer-copyright footer-bg">
            <div class="container">
                <div class="footer-copyright__content text-center">
                    <span>
                        Copyright {{ date('Y') }} <a href="{{ route('home') }}">©AigleVente</a>. Tous droits
                        réservés.
                    </span>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- footer-area-end -->

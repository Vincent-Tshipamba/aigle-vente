<x-app-layout>
    <!-- breadcrumb-area -->
    <section class="breadcrumb__area pt-60 pb-60 tp-breadcrumb__bg"
        data-background="{{ asset('img/banner/breadcrumb-01.jpg') }}">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-7 col-lg-12 col-md-12 col-12">
                    <div class="tp-breadcrumb">
                        <div class="tp-breadcrumb__link mb-10">
                            <span class="breadcrumb-item-active"><a href="/">Accueil</a></span>
                            <span>Validation</span>
                        </div>
                        <h2 class="tp-breadcrumb__title">Page de Validation</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb-area-end -->

    <!-- postbox area start -->
    <div class="postbox-area pt-80 pb-30">
        <div class="container">
            <div class="row">
                <div class="col-xxl-8 col-xl-8 col-lg-7 col-md-12">
                    <div class="postbox pr-20 pb-50">
                        <article class="postbox__item format-image mb-60 transition-3">
                            <div class="postbox__thumb w-img mb-25">
                                <a href="{{ route('blog-details') }}">
                                    <img src="{{ asset('img/blog/blog-in-01.jpg') }}" alt="blog-thumg">
                                </a>
                            </div>
                            <div class="postbox__content">
                                <div class="postbox__meta mb-15">
                                    <span><a href="#"><i class="fal fa-user-alt"></i> Alextina</a></span>
                                    <span><i class="fal fa-clock"></i> 28 Déc 2022</span>
                                    <span><a href="#"><i class="far fa-comment-alt"></i> (04) Commentaires</a></span>
                                </div>
                                <h3 class="postbox__title mb-20">
                                    <a href="{{ route('blog-details') }}">Les laboratoires utilisés pour la recherche scientifique prennent de nombreuses formes.</a>
                                </h3>
                                <div class="postbox__text mb-30">
                                    <p>Les laboratoires utilisés pour la recherche scientifique prennent de nombreuses formes en raison des exigences différentes des spécialistes dans les divers domaines de la science et de l'ingénierie. Un laboratoire de physique</p>
                                </div>
                                <div class="postbox__read-more">
                                    <a href="{{ route('blog-details') }}"
                                        class="tp-btn tp-color-btn banner-animation">Lire
                                        Plus</a>
                                </div>
                            </div>
                        </article>
                        <article class="postbox__item format-image mb-60 transition-3">
                            <div class="postbox__thumb postbox-active swiper-container w-img p-relative mb-25">
                                <div class="swiper-wrapper">
                                    <div class="postbox__slider-item swiper-slide">
                                        <img src="{{ asset('img/blog/blog-in-04.jpg') }}" alt="">
                                    </div>
                                    <div class="postbox__slider-item swiper-slide">
                                        <img src="{{ asset('img/blog/blog-in-05.jpg') }}" alt="">
                                    </div>
                                    <div class="postbox__slider-item swiper-slide">
                                        <img src="{{ asset('img/blog/blog-in-06.jpg') }}" alt="">
                                    </div>
                                </div>
                                <div class="postbox-nav">
                                    <button class="postbox-slider-button-next"><i
                                            class="far fa-chevron-right"></i></button>
                                    <button class="postbox-slider-button-prev"><i
                                            class="far fa-chevron-left"></i></button>
                                </div>
                            </div>
                            <div class="postbox__content">
                                <div class="postbox__meta mb-15">
                                    <span><a href="#"><i class="fal fa-user-alt"></i> Alextina</a></span>
                                    <span><i class="fal fa-clock"></i> 28 Déc 2022</span>
                                    <span><a href="#"><i class="far fa-comment-alt"></i> (04) Commentaires</a></span>
                                </div>
                                <h3 class="postbox__title mb-20">
                                    <a href="{{ route('blog-details') }}">Les laboratoires utilisés pour la recherche scientifique prennent de nombreuses formes.</a>
                                </h3>
                                <div class="postbox__text mb-30">
                                    <p>Les laboratoires utilisés pour la recherche scientifique prennent de nombreuses formes en raison des exigences différentes des spécialistes dans les divers domaines de la science et de l'ingénierie. Un laboratoire de physique</p>
                                </div>
                                <div class="postbox__read-more">
                                    <a href="{{ route('blog-details') }}"
                                        class="tp-btn tp-color-btn banner-animation">Lire
                                        Plus</a>
                                </div>
                            </div>
                        </article>
                        <article class="postbox__item format-video mb-60 transition-3">
                            <div class="postbox__thumb postbox__video p-relative mb-25">
                                <a href="{{ route('blog-details') }}">
                                    <img src="{{ asset('img/blog/blog-in-03.jpg') }}" alt="">
                                </a>
                                <a href="https://www.youtube.com/watch?v=OMqWRlxo1oQ" class="play-btn popup-video"><i
                                        class="fas fa-play"></i></a>
                            </div>
                            <div class="postbox__content">
                                <div class="postbox__meta mb-15">
                                    <span><a href="#"><i class="fal fa-user-alt"></i> Alextina</a></span>
                                    <span><i class="fal fa-clock"></i> 28 Déc 2022</span>
                                    <span><a href="#"><i class="far fa-comment-alt"></i> (04) Commentaires</a></span>
                                </div>
                                <h3 class="postbox__title mb-20">
                                    <a href="{{ route('blog-details') }}">Quatre façons de remplir votre tâche pour rendre la maison belle.</a>
                                </h3>
                                <div class="postbox__text mb-30">
                                    <p>Exploitez de manière convaincante les portails B2B avec un lien total émergent. Poursuivez de manière appropriée le leadership stratégique avec des idées intermandatées. Révolutionnez de manière proactive la pensée "hors des sentiers battus" interopérable avec une innovation entièrement recherchée. Facilitez de manière spectaculaire des architectures exceptionnelles et des données bricks-and-clicks. Générez progressivement des e-services extensibles pour.</p>
                                </div>
                                <div class="postbox__read-more">
                                    <a href="{{ route('blog-details') }}"
                                        class="tp-btn tp-color-btn banner-animation">Lire
                                        Plus</a>
                                </div>
                            </div>
                        </article>
                        <div class="basic-pagination">
                            <nav>
                                <ul>
                                    <li>
                                        <a href="blog.html">
                                            <i class="fal fa-long-arrow-left"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="blog.html">01</a>
                                    </li>
                                    <li>
                                        <span class="current">02</span>
                                    </li>
                                    <li>
                                        <a href="blog.html">- - -</a>
                                    </li>
                                    <li>
                                        <a href="blog.html">07</a>
                                    </li>
                                    <li>
                                        <a href="blog.html">08</a>
                                    </li>
                                    <li>
                                        <a href="blog.html">
                                            <i class="fal fa-long-arrow-right"></i>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-4 col-xl-4 col-lg-5 col-md-12">
                    <div class="sidebar__wrapper pl-25 pb-50">
                        <div class="sidebar__widget mb-45">
                            <div class="sidebar__widget-content">
                                <h3 class="sidebar__widget-title mb-25">Recherche</h3>
                                <div class="sidebar__search">
                                    <form action="#">
                                        <div class="sidebar__search-input-2 p-relative">
                                            <input type="text" placeholder="Rechercher un article">
                                            <button type="submit"><i class="far fa-search"></i></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="sidebar__widget mb-40">
                            <h3 class="sidebar__widget-title mb-25">Catégorie</h3>
                            <div class="sidebar__widget-content">
                                <ul>
                                    <li><a href="{{ route('blog-details') }}">Chimie<span>03</span></a></li>
                                    <li><a href="{{ route('blog-details') }}">Science médico-légale <span>07</span></a>
                                    </li>
                                    <li><a href="{{ route('blog-details') }}">Gemmologie <span>09</span></a></li>
                                    <li><a href="{{ route('blog-details') }}">Analyse COVID <span>01</span></a></li>
                                    <li><a href="{{ route('blog-details') }}">Bactériologie <span>00</span></a></li>
                                    <li><a href="{{ route('blog-details') }}">Angiosperme <span>26</span></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="sidebar__widget mb-55">
                            <h3 class="sidebar__widget-title mb-25">Article Récent</h3>
                            <div class="sidebar__widget-content">
                                <div class="sidebar__post rc__post">
                                    <div class="rc__post mb-20 d-flex align-items-center">
                                        <div class="rc__post-thumb">
                                            <a href="{{ route('blog-details') }}"><img
                                                    src="{{ asset('img/blog/blog-in-01.jpg') }}"
                                                    alt="blog-sidebar"></a>
                                        </div>
                                        <div class="rc__post-content">
                                            <div class="rc__meta">
                                                <span>4 Mars. 2022</span>
                                            </div>
                                            <h3 class="rc__post-title">
                                                <a href="{{ route('blog-details') }}">Ne sous-estimez pas l'arbre pour les meubles</a>
                                            </h3>
                                        </div>
                                    </div>
                                    <div class="rc__post mb-20 d-flex align-items-center">
                                        <div class="rc__post-thumb">
                                            <a href="{{ route('blog-details') }}"><img
                                                    src="{{ asset('img/blog/sidebar/blog-sm-2.jpg') }}"
                                                    alt="blog-sidebar"></a>
                                        </div>
                                        <div class="rc__post-content">
                                            <div class="rc__meta">
                                                <span>12 Février. 2022</span>
                                            </div>
                                            <h3 class="rc__post-title">
                                                <a href="{{ route('blog-details') }}">Équiper les chercheurs dans le monde en développement</a>
                                            </h3>
                                        </div>
                                    </div>
                                    <div class="rc__post mb-20 d-flex align-items-center">
                                        <div class="rc__post-thumb">
                                            <a href="{{ route('blog-details') }}"><img
                                                    src="{{ asset('img/blog/sidebar/blog-sm-3.jpg') }}"
                                                    alt="blog-sidebar"></a>
                                        </div>
                                        <div class="rc__post-content">
                                            <div class="rc__meta">
                                                <span>14 Janvier. 2022</span>
                                            </div>
                                            <h3 class="rc__post-title">
                                                <a href="{{ route('blog-details') }}">Choses à faire avant de faire du shopping</a>
                                            </h3>
                                        </div>
                                    </div>
                                    <div class="rc__post d-flex align-items-center">
                                        <div class="rc__post-thumb">
                                            <a href="{{ route('blog-details') }}"><img
                                                    src="{{ asset('img/blog/sidebar/blog-sm-4.jpg') }}"
                                                    alt="blog-sidebar"></a>
                                        </div>
                                        <div class="rc__post-content">
                                            <div class="rc__meta">
                                                <span>18 Mars. 2021</span>
                                            </div>
                                            <h3 class="rc__post-title">
                                                <a href="{{ route('blog-details') }}">Rechercher et vérifier un produit de qualité</a>
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="sidebar__widget mb-55">
                            <h3 class="sidebar__widget-title mb-25">Tag Populaire</h3>
                            <div class="sidebar__widget-content">
                                <div class="tagcloud">
                                    <a href="{{ route('blog-details') }}">Meubles</a>
                                    <a href="{{ route('blog-details') }}">Table</a>
                                    <a href="{{ route('blog-details') }}">Chaise</a>
                                    <a href="{{ route('blog-details') }}">Vêtements</a>
                                    <a href="{{ route('blog-details') }}">Jouet</a>
                                    <a href="{{ route('blog-details') }}">Costume</a>
                                    <a href="{{ route('blog-details') }}">T-Shirt </a>
                                    <a href="{{ route('blog-details') }}">Robe</a>
                                    <a href="{{ route('blog-details') }}">Bois</a>
                                    <a href="{{ route('blog-details') }}">Horloge</a>
                                    <a href="{{ route('blog-details') }}">Artisanat</a>
                                    <a href="{{ route('blog-details') }}">Cadeau</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- postbox area end -->

    @section('footer')
        @include('partials.footer')
    @endsection
</x-app-layout>

<x-app-layout>
    <!-- breadcrumb-area -->
    <section class="breadcrumb__area pt-60 pb-60 tp-breadcrumb__bg"
        data-background="{{ asset('img/banner/breadcrumb-01.jpg') }}">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-7 col-lg-12 col-md-12 col-12">
                    <div class="tp-breadcrumb">
                        <div class="tp-breadcrumb__link mb-10">
                            <span class="breadcrumb-item-active"><a href="/">Home</a></span>
                            <span>Checkout</span>
                        </div>
                        <h2 class="tp-breadcrumb__title">Checkout Page</h2>
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
                                    <span><i class="fal fa-clock"></i> Dec 28, 2022</span>
                                    <span><a href="#"><i class="far fa-comment-alt"></i> (04) Comments</a></span>
                                </div>
                                <h3 class="postbox__title mb-20">
                                    <a href="{{ route('blog-details') }}">Lavoratories used for scientic reseach take
                                        many
                                        froms.</a>
                                </h3>
                                <div class="postbox__text mb-30">
                                    <p>Laboratories used for scientific research take many forms because of the
                                        differing requirements of specialists in the various fields of science and
                                        engineering. A physics laboratory</p>
                                </div>
                                <div class="postbox__read-more">
                                    <a href="{{ route('blog-details') }}"
                                        class="tp-btn tp-color-btn banner-animation">Reade
                                        More</a>
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
                                    <span><i class="fal fa-clock"></i> Dec 28, 2022</span>
                                    <span><a href="#"><i class="far fa-comment-alt"></i> (04) Comments</a></span>
                                </div>
                                <h3 class="postbox__title mb-20">
                                    <a href="{{ route('blog-details') }}">Lavoratories used for scientic reseach take
                                        many
                                        froms.</a>
                                </h3>
                                <div class="postbox__text mb-30">
                                    <p>Laboratories used for scientific research take many forms because of the
                                        differing requirements of specialists in the various fields of science and
                                        engineering. A physics laboratory</p>
                                </div>
                                <div class="postbox__read-more">
                                    <a href="{{ route('blog-details') }}"
                                        class="tp-btn tp-color-btn banner-animation">Read
                                        More</a>
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
                                    <span><i class="fal fa-clock"></i> Dec 28, 2022</span>
                                    <span><a href="#"><i class="far fa-comment-alt"></i> (04) Comments</a></span>
                                </div>
                                <h3 class="postbox__title mb-20">
                                    <a href="{{ route('blog-details') }}">Four Ways to Fullfill Your Task For Makes
                                        House
                                        Beautiful.</a>
                                </h3>
                                <div class="postbox__text mb-30">
                                    <p>Compellingly exploit B2B vortals with emerging total linkage. Appropriately
                                        pursue strategic leadership whe intermandated ideas. Proactively
                                        revolutionize interoperable "outside the box" thinking with fully researched
                                        innovation. Dramatically facilitate exceptional architectures and
                                        bricks-and-clicks data. Progressively genera extensible e-services for.</p>
                                </div>
                                <div class="postbox__read-more">
                                    <a href="{{ route('blog-details') }}"
                                        class="tp-btn tp-color-btn banner-animation">Read
                                        More</a>
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
                                <h3 class="sidebar__widget-title mb-25">Search</h3>
                                <div class="sidebar__search">
                                    <form action="#">
                                        <div class="sidebar__search-input-2 p-relative">
                                            <input type="text" placeholder="Search post">
                                            <button type="submit"><i class="far fa-search"></i></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="sidebar__widget mb-40">
                            <h3 class="sidebar__widget-title mb-25">Category</h3>
                            <div class="sidebar__widget-content">
                                <ul>
                                    <li><a href="{{ route('blog-details') }}">Chemistry<span>03</span></a></li>
                                    <li><a href="{{ route('blog-details') }}">Forensic science <span>07</span></a>
                                    </li>
                                    <li><a href="{{ route('blog-details') }}">Gemological <span>09</span></a></li>
                                    <li><a href="{{ route('blog-details') }}">COvid Analysis <span>01</span></a></li>
                                    <li><a href="{{ route('blog-details') }}">Becteriology <span>00</span></a></li>
                                    <li><a href="{{ route('blog-details') }}">Angiosperm <span>26</span></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="sidebar__widget mb-55">
                            <h3 class="sidebar__widget-title mb-25">Recent Post</h3>
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
                                                <span>4 March. 2022</span>
                                            </div>
                                            <h3 class="rc__post-title">
                                                <a href="{{ route('blog-details') }}">Don't Underestimate Tree for
                                                    Furniture</a>
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
                                                <span>12 February. 2022</span>
                                            </div>
                                            <h3 class="rc__post-title">
                                                <a href="{{ route('blog-details') }}">Equipping Researchers in the
                                                    Developing
                                                    World</a>
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
                                                <span>14 January. 2022</span>
                                            </div>
                                            <h3 class="rc__post-title">
                                                <a href="{{ route('blog-details') }}">Things to do before shopping</a>
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
                                                <span>18 March. 2021</span>
                                            </div>
                                            <h3 class="rc__post-title">
                                                <a href="{{ route('blog-details') }}">Research And Verify of a Quality
                                                    Product</a>
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="sidebar__widget mb-55">
                            <h3 class="sidebar__widget-title mb-25">Popular Tag</h3>
                            <div class="sidebar__widget-content">
                                <div class="tagcloud">
                                    <a href="{{ route('blog-details') }}">Furniture</a>
                                    <a href="{{ route('blog-details') }}">Table</a>
                                    <a href="{{ route('blog-details') }}">Chair</a>
                                    <a href="{{ route('blog-details') }}">Cloths</a>
                                    <a href="{{ route('blog-details') }}">Toy</a>
                                    <a href="{{ route('blog-details') }}">Suit</a>
                                    <a href="{{ route('blog-details') }}">T-Shirt </a>
                                    <a href="{{ route('blog-details') }}">Dress</a>
                                    <a href="{{ route('blog-details') }}">Wooden</a>
                                    <a href="{{ route('blog-details') }}">Clock</a>
                                    <a href="{{ route('blog-details') }}">Craft</a>
                                    <a href="{{ route('blog-details') }}">Gift</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- postbox area end -->
</x-app-layout>

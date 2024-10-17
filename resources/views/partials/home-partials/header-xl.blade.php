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
                    <nav>
                        <ul>
                            <li class="has-dropdown">
                                <a href="/">Home</a>
                                <ul class="submenu">

                                    <li><a href="{{ route('home.fashion') }}">Fashion Home</a></li>
                                    <li><a href="{{ route('home.furniture') }}">Furniture Home</a></li>
                                    <li><a href="{{ route('home.cosmetic') }}">Cosmetics Home</a></li>
                                    <li><a href="{{ route('home.food-grocery') }}">Food Grocery</a></li>
                                </ul>
                            </li>
                            <li class="has-dropdown">
                                <a href="shop.html">Shop</a>
                                <ul class="submenu">
                                    <li><a href="shop.html">Shop</a></li>
                                    <li><a href="shop-2.html">Shop 2</a></li>
                                    <li><a href="shop-details.html">Shop Details </a></li>
                                    <li><a href="shop-details-2.html">Shop Details 2</a></li>
                                    <li><a href="shop-location.html">Shop Location</a></li>
                                    <li><a href="cart.html">Cart</a></li>
                                    <li><a href="sign-in.html">Sign In</a></li>
                                    <li><a href="checkout.html">Checkout</a></li>
                                    <li><a href="wishlist.html">Wishlist</a></li>
                                    <li><a href="track.html">Product Track</a></li>
                                </ul>
                            </li>
                            <li class="has-dropdown has-megamenu">
                                <a href="about.html">Pages</a>
                                <ul class="submenu mega-menu">
                                    <li>
                                        <a class="mega-menu-title">Page layout</a>
                                        <ul>
                                            <li><a href="shop.html">Shop filters v1</a></li>
                                            <li><a href="shop-2.html">Shop filters v2</a></li>
                                            <li><a href="shop-details.html">Shop sidebar</a></li>
                                            <li><a href="shop-details-2.html">Shop Right sidebar</a></li>
                                            <li><a href="shop-location.html">Shop List view</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a class="mega-menu-title">Page layout</a>
                                        <ul>
                                            <li><a href="about.html">About</a></li>
                                            <li><a href="cart.html">Cart</a></li>
                                            <li><a href="checkout.html">Checkout</a></li>
                                            <li><a href="sign-in.html">Sign In</a></li>
                                            <li><a href="sign-in.html">Log In</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a class="mega-menu-title">Page type</a>
                                        <ul>
                                            <li><a href="track.html">Product Track</a></li>
                                            <li><a href="wishlist.html">Wishlist</a></li>
                                            <li><a href="error.html">404 / Error</a></li>
                                            <li><a href="coming-soon.html">Coming Soon</a></li>
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
                                    <input type="text" placeholder="Search products...">
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

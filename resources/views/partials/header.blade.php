<!-- header-area-start -->
<header>
    <div class="header-top space-bg">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-8 col-lg-12 col-md-12">
                    <div class="header-welcome-text ">
                        <span>Welcome to our international shop! Enjoy free shipping on orders $100 & up.</span>
                        <a href="#">Shop Now<i class="fal fa-long-arrow-right"></i></a>
                    </div>
                </div>
                <div class="col-xl-4 d-none d-xl-block">
                    <div class="headertoplag d-flex align-items-center justify-content-end">
                        <div class="headertoplag__lang">
                            <ul>
                                <li>
                                    <a href="#">
                                        English
                                        <span><i class="fal fa-angle-down"></i></span>
                                    </a>
                                    <ul class="header-meta__lang-submenu">
                                        <li>
                                            <a href="#">Arabic</a>
                                        </li>
                                        <li>
                                            <a href="#">Spanish</a>
                                        </li>
                                        <li>
                                            <a href="#">Mandarin</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
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
                                    <input type="text" placeholder="Search products...">
                                </div>
                            </form>
                        </div>
                        <div class="mainmenu__main d-flex align-items-center p-relative">
                            <div class="main-menu">
                                <nav id="mobile-menu">
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
                                                        <li><a href="shop-details-2.html">Shop Right sidebar</a>
                                                        </li>
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
                            <div class="mainmenu__logo">
                                <a href="/"><img src="{{ asset('img/logo/logo.png') }}" alt=""></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3">
                    <div class="header-meta d-flex align-items-center justify-content-end">
                        <div class="header-meta__value mr-15">
                            <select>
                                <option>USD</option>
                                <option>YEAN</option>
                                <option>EURO</option>
                            </select>
                        </div>
                        <div class="header-meta__social d-flex align-items-center ml-25">
                            <button class="header-cart p-relative tp-cart-toggle">
                                <i class="fal fa-shopping-cart"></i>
                                <span class="tp-product-count">2</span>
                            </button>
                            <a href="sign-in.html"><i class="fal fa-user"></i></a>
                            <a href="wishlist.html"><i class="fal fa-heart"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- header-area-end -->

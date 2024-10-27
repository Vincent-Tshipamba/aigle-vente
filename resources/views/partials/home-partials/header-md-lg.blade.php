<!-- header-md-lg-area -->
<div id="header-tab-sticky" class="tp-md-lg-header d-none d-md-block d-xl-none pt-30 pb-30">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-4 d-flex align-items-center">
                <div class="header-canvas flex-auto">
                    <button class="tp-menu-toggle"><i class="far fa-bars"></i></button>
                </div>
                <div class="logo">
                    <a href="{{ route('home') }}"><img src="{{ asset('img/logo/logo_sans_bg.png') }}" width="25%" alt="logo"></a>
                </div>
            </div>
            <div class="col-lg-9 col-md-8">
                <div class="header-meta-info d-flex align-items-center justify-content-between">
                    <div class="header-search-bar">
                        <form action="#">
                            <div class="search-info p-relative">
                                <button class="header-search-icon"><i class="fal fa-search"></i></button>
                                <input type="text" placeholder="Rechercher des produits...">
                            </div>
                        </form>
                    </div>
                    <div class="header-meta__social d-flex align-items-center ml-25">
                        <button class="header-cart p-relative tp-cart-toggle"></button>
                        <i class="fal fa-shopping-cart"></i>
                        <span>2</span>
                        </button>
                        <a href="{{ route('login') }}"><i class="fal fa-user"></i></a>
                        <a href="wishlist.html"><i class="fal fa-heart"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="header-mob-sticky" class="tp-md-lg-header d-md-none pt-20 pb-20">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-3 d-flex align-items-center">
                <div class="header-canvas flex-auto">
                    <button class="tp-menu-toggle"><i class="far fa-bars"></i></button>
                </div>
            </div>
            <div class="col-6">
                <div class="logo text-center">
                    <a href="{{ route('home') }}"><img src="{{ asset('img/logo/logo.png') }}" alt="logo"></a>
                </div>
            </div>
            <div class="col-3">
                <div class="header-meta-info d-flex align-items-center justify-content-end ml-25">
                    <div class="header-meta m-0 d-flex align-items-center">
                        <div class="header-meta__social d-flex align-items-center">
                            <button class="header-cart p-relative tp-cart-toggle">
                                <i class="fal fa-shopping-cart"></i>
                                <span>2</span>
                            </button>
                            @auth
                                @php
                                    $user = Auth::user();
                                    $client = App\Models\Client::where('user_id', $user->id)->first();
                                @endphp

                                <div class="flex items-center px-3 space-x-3 "
                                    data-dropdown-toggle="dropdown-user-header-md">
                                    <div>
                                        <button type="button"
                                            class="flex text-sm bg-white rounded-full focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                                            aria-expanded="false" data-dropdown-toggle="dropdown-user-header-md-1">
                                            <span class="sr-only">Open user menu</span>
                                            <img class="w-12 rounded-full border mx-2" src="{{ asset('img/profil.jpeg') }}"
                                                alt="user photo">

                                        </button>
                                    </div>


                                    <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow dark:bg-gray-700 dark:divide-gray-600"
                                        id="dropdown-user-header-md">
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
                                                    role="menuitem">Mon profil</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('profile.edit') }}"
                                                    class="block text-xs py-2 text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white"
                                                    role="menuitem">Mes commandes</a>
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
                                </div>
                            @else
                                <a href="{{ route('login') }}"><i class="fal fa-user"></i></a>
                                <!-- Lien vers le formulaire de connexion -->
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- header-md-lg-area -->

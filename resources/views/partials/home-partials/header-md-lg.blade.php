<!-- header-md-lg-area -->
<div id="header-tab-sticky" class="tp-md-lg-header d-none d-md-block d-xl-none pt-30 pb-30">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-4 d-flex align-items-center">
                <div class="header-canvas flex-auto">
                    <button class="tp-menu-toggle"><i class="far fa-bars"></i></button>
                </div>
                <div class="logo">
                    <a href="{{ route('home') }}" class="flex items-center space-x-2">
                        <img src="{{ asset('img/logo/logo_sans_bg.png') }}" width="25%" alt="logo">
                        <h1 class="text-lg font-bold animate__animated animate__slideInRight">Aigle Vente</h1>
                    </a>
                </div>
            </div>
            <div class="col-lg-9 col-md-8">
                <div class="header-meta-info d-flex align-items-center justify-content-between">
                    <div class="header-search-bar">
                        <form action="#">
                            <div class="search-info p-relative">
                                <button class="header-search-icon"><i class="fal fa-search"></i></button>
                                <input class="search-input" type="text" placeholder="Rechercher des produits...">
                            </div>
                        </form>
                    </div>
                    <div class="header-meta__social flex items-center space-x-3 ml-25">
                        @auth
                            <button id="dropdownUserAvatarButtonHeader-home-md-lg"
                                data-dropdown-toggle="dropdownAvatarHeader-home-md-lg"
                                class="flex text-sm bg-gray-800 rounded-full md:me-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                                type="button">
                                <span class="sr-only">Open user menu</span>
                                <img class="w-8 h-8 rounded-full" src="/docs/images/people/profile-picture-3.jpg"
                                    alt="user photo">
                            </button>

                            <!-- Dropdown menu -->
                            <div id="dropdownAvatarHeader-home-md-lg"
                                class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-60 dark:bg-gray-700 dark:divide-gray-600">
                                <div class="px-4 py-3 text-sm text-gray-900 dark:text-white">
                                    <div>{{ Auth::user()->name }}</div>
                                    <div class="font-medium truncate">{{ Auth::user()->email }}</div>
                                </div>
                                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                                    aria-labelledby="dropdownUserAvatarButtonHeader-home-md-lg">
                                    <li>
                                        @if (Auth::user()->client)
                                            <a href="{{ route('client.dashboard') }}"
                                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                                Mon dashboard client
                                            </a>
                                        @endif

                                        @if (Auth::user()->isSeller())
                                            <a href="{{ route('seller.dashboard') }}"
                                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                                Mon dashboard de vendeur
                                            </a>
                                        @endif

                                        @if (Auth::user()->hasRole('superadmin'))
                                            <a href="{{ route('admin.dashboard') }}"
                                                class="block px-6 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                                Mon dashboard administrateur
                                            </a>
                                        @endif
                                    </li>
                                    <li>
                                        <a href="{{ route('profile.edit') }}"
                                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                            Paramètres du compte
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Mon
                                            panier</a>
                                    </li>
                                    <li>
                                        <!-- Authentication -->
                                        <form id="logout-form" method="POST" action="{{ route('logout') }}"
                                            style="display: none;">
                                            @csrf
                                        </form>
                                        <a href="#" onclick="event.preventDefault(); confirmLogout();"
                                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                            <i class="fal fa-user"></i> {{ __('Me déconnecter') }}
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="header-meta__social flex items-center ml-25">
                                <button class="header-cart p-relative tp-cart-toggle">
                                    <i class="fal fa-heart"></i>
                                    <span class="tp-product-count wishcount">{{ $wishlists->count() }}</span>
                                </button>
                                @php
                                    $user = Auth::user();
                                    $client = App\Models\Client::where('user_id', $user->id)->first();
                                @endphp

                                @if (Auth::check() && !Auth::user()->isSeller())
                                    <a href="{{ route('sellers.create') }}"
                                        class="w-full inline-block px-[10px] py-[15px] bg-[var(--tp-text-primary)] text-[var(--tp-common-white)] text-sm font-semibold rounded-md text-center transition-all duration-300 whitespace-nowrap align-middle touch-manipulation">
                                        Devenir vendeur</a>
                                @else
                                    <a href="{{ route('seller.dashboard') }}">
                                        <svg class=" text-gray-800 dark:text-white" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            fill="currentColor" viewBox="0 0 24 24">
                                            <path fill-rule="evenodd"
                                                d="M4 4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2H4Zm16 7H4v7h16v-7ZM5 8a1 1 0 0 1 1-1h.01a1 1 0 0 1 0 2H6a1 1 0 0 1-1-1Zm4-1a1 1 0 0 0 0 2h.01a1 1 0 0 0 0-2H9Zm2 1a1 1 0 0 1 1-1h.01a1 1 0 1 1 0 2H12a1 1 0 0 1-1-1Z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </a>
                                @endif
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
<div id="header-mob-sticky" class="tp-md-lg-header d-md-none pt-20 pb-20">
    <div class="container">
        <div class="row items-center">
            <div class="col-5 d-flex align-items-center">
                <div class="header-canvas flex-auto">
                    <button class="tp-menu-toggle"><i class="far fa-bars"></i></button>
                </div>
            </div>
            <div class="col-2">
                <div class="logo text-center w-full">
                    <a href="{{ route('home') }}">
                        <img src="{{ asset('img/logo/logo_sans_bg.png') }}" width="100" alt="logo">
                    </a>
                </div>
            </div>
            <div class="col-5">
                <div class="header-meta-info d-flex align-items-center justify-content-end ml-25">
                    <div class="header-meta m-0 d-flex align-items-center">
                        <div class="header-meta__social d-flex align-items-center">
                            @auth
                                <button id="dropdownUserAvatarButtonHeader-home-md-lg"
                                    data-dropdown-toggle="dropdownAvatarHeader-home-md-lg-2"
                                    class="flex text-sm bg-gray-800 rounded-full md:me-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                                    type="button">
                                    <span class="sr-only">Open user menu</span>
                                    <img class="w-8 h-8 rounded-full" src="/docs/images/people/profile-picture-3.jpg"
                                        alt="user photo">
                                </button>

                                <!-- Dropdown menu -->
                                <div id="dropdownAvatarHeader-home-md-lg-2"
                                    class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-60 dark:bg-gray-700 dark:divide-gray-600">
                                    <div class="px-4 py-3 text-sm text-gray-900 dark:text-white">
                                        <div>{{ Auth::user()->name }}</div>
                                        <div class="font-medium truncate">{{ Auth::user()->email }}</div>
                                    </div>
                                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                                        aria-labelledby="dropdownUserAvatarButtonHeader-home-md-lg">
                                        <li>
                                            @if (Auth::user()->client)
                                                <a href="{{ route('client.dashboard') }}"
                                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                                    Mon dashboard client
                                                </a>
                                            @endif

                                            @if (Auth::user()->isSeller())
                                                <a href="{{ route('seller.dashboard') }}"
                                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                                    Mon dashboard de vendeur
                                                </a>
                                            @endif

                                            @if (Auth::user()->hasRole('superadmin'))
                                                <a href="{{ route('admin.dashboard') }}"
                                                    class="block px-6 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                                    Mon dashboard administrateur
                                                </a>
                                            @endif
                                        </li>
                                        <li>
                                            <a href="{{ route('profile.edit') }}"
                                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                                Paramètres du compte
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#"
                                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Mon
                                                panier</a>
                                        </li>
                                        <li>
                                            <!-- Authentication -->
                                            <form id="logout-form" method="POST" action="{{ route('logout') }}"
                                                style="display: none;">
                                                @csrf
                                            </form>
                                            <a href="#" onclick="event.preventDefault(); confirmLogout();"
                                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                                <i class="fal fa-user"></i> {{ __('Me déconnecter') }}
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="header-meta__social flex items-center ml-25">
                                    <button class="header-cart p-relative tp-cart-toggle me-2">
                                        <i class="fal fa-heart"></i>
                                        <span class="tp-product-count wishcount">{{ $wishlists->count() }}</span>
                                    </button>
                                    @php
                                        $user = Auth::user();
                                        $client = App\Models\Client::where('user_id', $user->id)->first();
                                    @endphp

                                    @if (Auth::check() && !Auth::user()->isSeller())
                                        <a href="{{ route('sellers.create') }}"
                                            class="w-full inline-block px-[10px] py-[15px] bg-[var(--tp-text-primary)] text-[var(--tp-common-white)] text-sm font-semibold rounded-md text-center transition-all duration-300 whitespace-nowrap align-middle touch-manipulation">
                                            Devenir vendeur</a>
                                    @else
                                        <a href="{{ route('seller.dashboard') }}">
                                            <svg class=" text-gray-800 dark:text-white" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                fill="currentColor" viewBox="0 0 24 24">
                                                <path fill-rule="evenodd"
                                                    d="M4 4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2H4Zm16 7H4v7h16v-7ZM5 8a1 1 0 0 1 1-1h.01a1 1 0 0 1 0 2H6a1 1 0 0 1-1-1Zm4-1a1 1 0 0 0 0 2h.01a1 1 0 0 0 0-2H9Zm2 1a1 1 0 0 1 1-1h.01a1 1 0 1 1 0 2H12a1 1 0 0 1-1-1Z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </a>
                                    @endif
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
</div>
<!-- header-md-lg-area -->

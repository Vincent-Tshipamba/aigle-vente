<!-- header-area-start -->
<header>
    <div class="mainmenuarea d-none d-xl-block">
        <div class="container">
            <div class="row items-center">
                <div class="col-lg-3">
                    <div class="mainmenu flex items-center">
                        <div class="logo">
                            <a href="{{ route('home') }}" class="">
                                <img loading="lazy" src="{{ asset('img/logo/logo_sans_bg.png') }}" width="50%"
                                    alt="logo">
                            </a>
                        </div>
                        <div class="mainmenu__search">
                            <form action="#">
                                <div class="mainmenu__search-bar p-relative w-full">
                                    <button class="mainmenu__search-icon"><i class="fal fa-search"></i></button>
                                    <input class="search-input" type="text"
                                        placeholder="Rechercher un produit ou une boutique...">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div>
                        <div class="mainmenu__main flex items-center justify-center p-relative">
                            <div class="main-menu flex justify-center">
                                <nav id="mobile-menu">
                                    <ul>
                                        <li>
                                            <a href="{{ route('home') }}">Accueil</a>
                                        </li>
                                        <li>
                                            <a href="#">Boutiques</a>
                                        </li>
                                        <li><a href="{{ route('contact') }}">Contact</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3">
                    <div class="header-meta flex items-center space-x-4 justify-end">
                        @auth
                            <!-- Chat Notification Area -->
                            <button class="relative" id="dropdownButtonChatHeader"
                                data-dropdown-toggle="dropdownChatHeader">
                                <div class="relative bg-orange-50 p-2 rounded-lg">
                                    <svg class="w-8 h-8 text-[#e38407] animate-wiggle" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 21 21">
                                        <path fill="none" stroke="currentColor" stroke-linecap="round"
                                            stroke-linejoin="round"
                                            d="M15.585 15.5H5.415A1.65 1.65 0 0 1 4 13a10.526 10.526 0 0 0 1.5-5.415V6.5a4 4 0 0 1 4-4h2a4 4 0 0 1 4 4v1.085c0 1.907.518 3.78 1.5 5.415a1.65 1.65 0 0 1-1.415 2.5zm1.915-11c-.267-.934-.6-1.6-1-2s-1.066-.733-2-1m-10.912 3c.209-.934.512-1.6.912-2s1.096-.733 2.088-1M13 17c-.667 1-1.5 1.5-2.5 1.5S8.667 18 8 17" />
                                    </svg>
                                    @if (Auth::user()->getUnreadCount() > 0)
                                        <div
                                            class="px-1 py-0.5 bg-[#e38407] min-w-5 rounded-full text-center text-white text-xs absolute -top-2 -end-1 translate-x-1/4 text-nowrap">
                                            <div
                                                class="absolute top-0 start-0 rounded-full -z-10 animate-pulse bg-[#e38407] w-full h-full">
                                            </div>
                                            {{ Auth::user()->getUnreadCount() }}
                                        </div>
                                    @endif
                                </div>
                            </button>

                            <!-- Dropdown chat -->
                            <div id="dropdownChatHeader"
                                class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-60 dark:bg-gray-700 dark:divide-gray-600">
                                <div class="px-4 py-3 text-sm font-bold text-gray-900 dark:text-white">
                                    Notifications
                                </div>
                                <ul class="p-3 text-sm text-gray-700 dark:text-gray-200"
                                    aria-labelledby="dropdownChatHeader">
                                    @if (Auth::user()->getUnreadCount() > 0)
                                        <li>
                                            <a href="{{ route('profile.edit') }}"
                                                class="block px-4 py-3 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                                {{ Auth::user()->getUnreadCount() }} nouveau(x) message(s)
                                            </a>
                                        </li>
                                        @php
                                            $latestConversations = Auth::user()
                                                ->conversations()
                                                ->with('messages')
                                                ->latest()
                                                ->get();
                                        @endphp
                                        @foreach ($latestConversations as $conversation)
                                            <li>
                                                @if (!$conversation?->readBy(auth()?->user()) && !$conversation->lastMessage?->belongsToAuth())
                                                    <div class="flex items-center hover:bg-orange-50 hover:cursor-pointer hover:scale-110 hover:ease-in duration-500"
                                                        onclick="window.location.href='{{ route('chat', $conversation->id) }}'">
                                                        <div class="relative inline-block shrink-0">
                                                            <img class="w-12 h-12 rounded-full"
                                                                src="{{ asset('images/user-avatar.png') }}"
                                                                alt="{{ $conversation->lastMessage->sendable?->display_name }}" />
                                                            <span
                                                                class="absolute bottom-0 right-0 inline-flex items-center justify-center w-6 h-6 bg-blue-600 rounded-full">
                                                                <svg class="w-3 h-3 text-white" aria-hidden="true"
                                                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 18"
                                                                    fill="currentColor">
                                                                    <path
                                                                        d="M18 4H16V9C16 10.0609 15.5786 11.0783 14.8284 11.8284C14.0783 12.5786 13.0609 13 12 13H9L6.846 14.615C7.17993 14.8628 7.58418 14.9977 8 15H11.667L15.4 17.8C15.5731 17.9298 15.7836 18 16 18C16.2652 18 16.5196 17.8946 16.7071 17.7071C16.8946 17.5196 17 17.2652 17 17V15H18C18.5304 15 19.0391 14.7893 19.4142 14.4142C19.7893 14.0391 20 13.5304 20 13V6C20 5.46957 19.7893 4.96086 19.4142 4.58579C19.0391 4.21071 18.5304 4 18 4Z"
                                                                        fill="currentColor" />
                                                                    <path
                                                                        d="M12 0H2C1.46957 0 0.960859 0.210714 0.585786 0.585786C0.210714 0.960859 0 1.46957 0 2V9C0 9.53043 0.210714 10.0391 0.585786 10.4142C0.960859 10.7893 1.46957 11 2 11H3V13C3 13.1857 3.05171 13.3678 3.14935 13.5257C3.24698 13.6837 3.38668 13.8114 3.55279 13.8944C3.71889 13.9775 3.90484 14.0126 4.08981 13.996C4.27477 13.9793 4.45143 13.9114 4.6 13.8L8.333 11H12C12.5304 11 13.0391 10.7893 13.4142 10.4142C13.7893 10.0391 14 9.53043 14 9V2C14 1.46957 13.7893 0.960859 13.4142 0.585786C13.0391 0.210714 12.5304 0 12 0Z"
                                                                        fill="currentColor" />
                                                                </svg>
                                                                <span class="sr-only">Message icon</span>
                                                            </span>
                                                        </div>
                                                        <div class="ms-3 text-sm font-normal">
                                                            <div
                                                                class="text-sm font-semibold text-gray-900 dark:text-white">
                                                                {{ $conversation->lastMessage->sendable?->display_name }}
                                                            </div>
                                                            <div class="text-sm font-normal">
                                                                {{ $conversation->lastMessage->body }}
                                                            </div>
                                                            <span
                                                                class="text-xs font-medium text-orange-600 dark:text-orange-500">
                                                                @if ($conversation->lastMessage->created_at->diffInMinutes(now()) < 1)
                                                                    now
                                                                @else
                                                                    {{ $conversation->lastMessage->created_at->shortAbsoluteDiffForHumans() }}
                                                                @endif
                                                            </span>
                                                        </div>
                                                    </div>
                                                @endif
                                            </li>
                                        @endforeach
                                    @else
                                        <span class="text-sm p-1">Aucun nouveau message.</span>
                                    @endif
                                    <li>
                                        <a href="{{ route('chats') }}"
                                            class="px-2 py-6 text-sm hover:text-[#e38407] hover:scale-110">
                                            Ouvrir le chat
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <!-- Chat Notification Area End -->

                            <button id="dropdownUserAvatarButtonHeader-1" data-dropdown-toggle="dropdownAvatarHeader-1"
                                class="flex text-sm bg-gray-800 rounded-full md:me-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                                type="button">
                                <span class="sr-only">Open user menu</span>
                                <img class="w-8 h-8 rounded-full" src="/docs/images/people/profile-picture-3.jpg"
                                    alt="user photo">
                            </button>

                            <!-- Dropdown menu -->
                            <div id="dropdownAvatarHeader-1"
                                class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-60 dark:bg-gray-700 dark:divide-gray-600">
                                <div class="px-4 py-3 text-sm text-gray-900 dark:text-white">
                                    <div>{{ Auth::user()->name }}</div>
                                    <div class="font-medium truncate">{{ Auth::user()->email }}</div>
                                </div>
                                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                                    aria-labelledby="dropdownUserAvatarButtonHeader-1">
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
                                        <form class="logout-form" method="POST" action="{{ route('logout') }}"
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
                            <div class="header-meta__social flex items-center space-x-3">
                                <button class="header-cart p-relative tp-cart-toggle me-3">
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
                            <a href="#" class="text-md text-black dark:text-gray-200"
                                data-drawer-target="drawer-login" data-drawer-show="drawer-login"
                                data-drawer-placement="bottom" data-drawer-edge="true"
                                data-drawer-edge-offset="bottom-[60px]" aria-controls="drawer-login">
                                <i class="fal fa-user"></i>
                            </a>
                            <!-- Lien vers le formulaire de connexion -->
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- header-area-end -->

<!-- sidebar-menu-area -->
<div class="tpsideinfo">
    <button class="tpsideinfo__close">Fermer<i class="fal fa-times ml-10"></i></button>
    <div class="tpsideinfo__search text-center pt-35">
        <span class="tpsideinfo__search-title mb-20">Que cherchez-vous ?</span>
        <form action="#">
            <input class="search-input" type="text" placeholder="Rechercher un produit ou une boutique...">
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
                        @foreach ($categories as $item)
                            <li>
                                <a href="#"
                                    onclick="document.getElementById('filter-{{ $item->id }}').click();"
                                    class="flex flex-col items-center text-center space-y-2 hover:scale-105">
                                    <div class="flex items-center space-x-4">
                                        <img src="{{ $item->image }}" alt="{{ $item->name }}" class="w-8 h-8">
                                        <span id="category-{{ $item->id }}"
                                            class="categoryInSidebar-{{ $item->id }} text-xs sm:text-sm font-medium text-gray-500 hover:text-gray-700">
                                            {{ $item->name }}
                                        </span>
                                    </div>
                                    <input type="checkbox" id="filter-{{ $item->id }}" value="{{ $item->id }}"
                                        class="category-checkbox w-5 h-5 text-[#e38407] hidden" />
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
    @auth
        <ul>
            <hr class="text-gray-400 bg-gray-400">
            @if (Auth::user()->client)
                <li>
                    <a href="{{ route('client.dashboard') }}" class="text-white">
                        Mon dashboard client
                    </a>
                </li>
                <hr class="text-gray-400 bg-gray-400">
            @endif

            @if (Auth::user()->isSeller())
                <li>
                    <a href="{{ route('seller.dashboard') }}" class="text-white">
                        Mon dashboard vendeur
                    </a>
                </li>
                <hr class="text-gray-400 bg-gray-400">
            @endif

            @if (Auth::user()->hasRole('superadmin'))
                <li>
                    <a href="{{ route('admin.dashboard') }}" class="text-white">
                        Mon dashboard administrateur
                    </a>
                </li>
                <hr class="text-gray-400 bg-gray-400">
            @endif
            <li>
                <a class="text-white" href="{{ route('chats') }}">Ouvrir le chat</a>
            </li>
            <hr class="text-gray-400 bg-gray-400">

            <li>
                <!-- Authentication -->
                <form class="logout-form" method="POST" action="{{ route('logout') }}" style="display: none;">
                    @csrf
                </form>
                <a href="#" onclick="event.preventDefault(); confirmLogout();" class="text-white">
                    <i class="fal fa-user"></i> {{ __('Me déconnecter') }}
                </a>
            </li>
            <hr class="text-gray-400 bg-gray-400">
        </ul>
    @else
        <div class="tpsideinfo__account-link">
            <a href="{{ route('login') }}"><i class="fal fa-user"></i> Connexion / Inscription</a>
        </div>
    @endauth
    <div class="tpsideinfo__wishlist-link">
        <a href="{{ route('client.wishlist') }}" target="_parent"><i class="fal fa-heart"></i> Liste de
            Souhaits</a>
    </div>
</div>
<div class="body-overlay"></div>
<!-- sidebar-menu-area-end -->

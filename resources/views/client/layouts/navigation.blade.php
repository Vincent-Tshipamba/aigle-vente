<div class="fixed w-full z-30 flex bg-gray-900 dark:bg-[#0F172A] p-2 items-center justify-center h-16 px-10">
    <div
        class="flex items-center justify-center flex-none h-full ml-12 duration-500 ease-in-out transform logo dark:text-white">
        <a href="{{ route('home') }}" class="flex ms-2 md:me-24">
            <img src="{{ asset('img\logo\logo_sans_bg.png') }}" class="h-8 me-3" alt="Logo de Aigle Vente" />
            <span class="self-center font-semibold text-white text-1xl sm:text-1xl whitespace-nowrap">
                Aigle Vente
            </span>
        </a>
    </div>
    <!-- SPACER -->
    <div class="flex items-center justify-center h-full grow"></div>
    <div class="flex items-center justify-center flex-none h-full text-center">

        <div class="flex items-center px-3 space-x-3 " data-dropdown-toggle="dropdown-user-admin">
            <div>
                <button type="button"
                    class="flex text-sm bg-white rounded-full focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                    aria-expanded="false" data-dropdown-toggle="dropdown-user-admin">
                    <span class="sr-only">Open user menu</span>
                    <img class="w-8 h-8 rounded-full" src="{{ asset('img/profil.jpeg') }}" alt="user photo">

                </button>
            </div>

            <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow dark:bg-gray-700 dark:divide-gray-600"
                id="dropdown-user-admin">
                <div class="px-4 py-3" role="none">
                    <p class="text-sm text-gray-900 dark:text-white" role="none">
                        {{ Auth::user()->name }}
                    </p>
                    <p class="text-sm font-medium text-gray-900 truncate dark:text-gray-300" role="none">
                        {{ Auth::user()->email }}
                    </p>
                </div>
                <ul class="py-1" role="none">
                    <li>
                        <a href="{{ route('profile.edit') }}"
                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white"
                            role="menuitem">Profil</a>
                    </li>

                    <li>
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault();
                                this.closest('form').submit();">
                                {{ __('Deconnexion') }}
                            </x-dropdown-link>
                        </form>
                    </li>
                </ul>
            </div>
            @if (Auth()->user()->hasRole('superadmin'))
                <div class="hidden text-sm text-white cursor-pointer md:block md:text-md" aria-expanded="false">
                    <a href="">
                        <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd"
                                d="M17 10v1.126c.367.095.714.24 1.032.428l.796-.797 1.415 1.415-.797.796c.188.318.333.665.428 1.032H21v2h-1.126c-.095.367-.24.714-.428 1.032l.797.796-1.415 1.415-.796-.797a3.979 3.979 0 0 1-1.032.428V20h-2v-1.126a3.977 3.977 0 0 1-1.032-.428l-.796.797-1.415-1.415.797-.796A3.975 3.975 0 0 1 12.126 16H11v-2h1.126c.095-.367.24-.714.428-1.032l-.797-.796 1.415-1.415.796.797A3.977 3.977 0 0 1 15 11.126V10h2Zm.406 3.578.016.016c.354.358.574.85.578 1.392v.028a2 2 0 0 1-3.409 1.406l-.01-.012a2 2 0 0 1 2.826-2.83ZM5 8a4 4 0 1 1 7.938.703 7.029 7.029 0 0 0-3.235 3.235A4 4 0 0 1 5 8Zm4.29 5H7a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h6.101A6.979 6.979 0 0 1 9 15c0-.695.101-1.366.29-2Z"
                                clip-rule="evenodd" />
                        </svg>
                    </a>
                </div>
            @endif
        </div>
    </div>
</div>


<aside
    class="w-60 -translate-x-48 fixed transition transform ease-in-out duration-1000 z-40 flex h-screen dark:bg-[#0F172A] bg-gray-900">
    <!-- open sidebar button -->
    <div
        class="max-toolbar translate-x-24 scale-x-0 w-full -right-6 transition transform ease-in duration-300 flex items-center justify-between border-4 border-white dark:border-[#0F172A] bg-[#eaeaebf3] dark:bg-[#1E293B]  absolute top-2 rounded-full h-12">

        <div class="flex items-center pl-4 space-x-2 ">
            <div>
                <div onclick="setDark('dark')"
                    class="moon text-gray-700 dark:text-white hover:text-blue-500 dark:hover:text-[#38BDF8]">

                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={3}
                        stroke="currentColor" class="w-4 h-4">
                        <path strokeLinecap="round" strokeLinejoin="round"
                            d="M21.752 15.002A9.718 9.718 0 0118 15.75c-5.385 0-9.75-4.365-9.75-9.75 0-1.33.266-2.597.748-3.752A9.753 9.753 0 003 11.25C3 16.635 7.365 21 12.75 21a9.753 9.753 0 009.002-5.998z" />
                    </svg>
                </div>
                <div onclick="setDark('light')"
                    class="sun hidden text-gray-700 dark:text-white hover:text-[#e38407] dark:hover:text-[#e38407]">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-4 h-4">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 3v2.25m6.364.386l-1.591 1.591M21 12h-2.25m-.386 6.364l-1.591-1.591M12 18.75V21m-4.773-4.227l-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z" />
                    </svg>
                </div>
            </div>
        </div>

    </div>
    <div onclick="openNav()"
        class="-right-6 transition transform ease-in-out duration-500 flex border-4 border-white dark:border-[#0F172A] dark:bg-[#1E293B]  bg-[#e38407]  dark:text-white dark:hover:bg-[#0F172A] hover:bg-[#0F172A] absolute top-2 p-3 rounded-full text-white hover:rotate-45">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={3} stroke="currentColor"
            class="w-4 h-4">
            <path strokeLinecap="round" strokeLinejoin="round"
                d="M3.75 6A2.25 2.25 0 016 3.75h2.25A2.25 2.25 0 0110.5 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6zM3.75 15.75A2.25 2.25 0 016 13.5h2.25a2.25 2.25 0 012.25 2.25V18a2.25 2.25 0 01-2.25 2.25H6A2.25 2.25 0 013.75 18v-2.25zM13.5 6a2.25 2.25 0 012.25-2.25H18A2.25 2.25 0 0120.25 6v2.25A2.25 2.25 0 0118 10.5h-2.25a2.25 2.25 0 01-2.25-2.25V6zM13.5 15.75a2.25 2.25 0 012.25-2.25H18a2.25 2.25 0 012.25 2.25V18A2.25 2.25 0 0118 20.25h-2.25A2.25 2.25 0 0113.5 18v-2.25z" />
        </svg>
    </div>

    <!-- MAX SIDEBAR-->
    <div class="max hidden text-white mt-20 flex-col space-y-2 w-full h-[calc(100vh)]">
        <div
            class="hover:ml-4 w-full text-white  hover:text-[#e38407] dark:hover:text-[#e38407]  p-2 pl-8 rounded-full transform ease-in-out duration-300 flex flex-row items-center space-x-3">

            <a href="{{ route('client.dashboard') }}"
                class="hover:ml-4 justify-end pr-5  hover:text-[#e38407] dark:hover:text-[#e38407]  p-3 rounded-full transform ease-in-out duration-300 flex {{ request()->routeIs('client.dashboard') ? ' text-[#e38407] ' : 'text-white' }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                    <path fill="currentColor"
                        d="m15.943 10.498l-4.055 4.505A2 2 0 0 0 10 17h4a2 2 0 0 0-.603-1.431l3.66-4.067a.75.75 0 1 0-1.114-1.004M5 15.25a.75.75 0 0 0 0 1.5h1.5a.75.75 0 0 0 0-1.5zm14.75.75a.75.75 0 0 0-.75-.75h-1.5a.75.75 0 0 0 0 1.5H19a.75.75 0 0 0 .75-.75" />
                    <path fill="currentColor"
                        d="M18 13a1 1 0 1 0 0-2a1 1 0 0 0 0 2M7 12a1 1 0 1 1-2 0a1 1 0 0 1 2 0m1-2.5a1 1 0 1 0 0-2a1 1 0 0 0 0 2m9-1a1 1 0 1 1-2 0a1 1 0 0 1 2 0M12.75 6a.75.75 0 0 0-1.5 0v1.5a.75.75 0 0 0 1.5 0z" />
                    <path fill="currentColor"
                        d="M12 3.25C6.063 3.25 1.25 8.063 1.25 14c0 1.498.307 2.927.862 4.224l.005.012c.215.502.363.848.817 1.332c.183.195.439.39.677.548c.238.157.519.315.77.407c.624.227 1.168.227 1.937.227h11.364c.769 0 1.313 0 1.937-.227c.252-.092.532-.25.77-.407s.494-.353.677-.548c.454-.484.603-.83.817-1.332l.005-.012c.555-1.297.862-2.726.862-4.224c0-5.937-4.813-10.75-10.75-10.75M2.75 14a9.25 9.25 0 0 1 18.5 0c0 1.292-.264 2.52-.741 3.634c-.204.477-.267.62-.536.907c-.071.075-.22.197-.41.323c-.19.125-.36.214-.458.25c-.352.128-.632.136-1.502.136H6.397c-.87 0-1.15-.008-1.502-.136a2.6 2.6 0 0 1-.458-.25a2.6 2.6 0 0 1-.41-.323c-.269-.287-.332-.43-.536-.907A9.2 9.2 0 0 1 2.75 14" />
                </svg>
                <span>Dashboard</span>
            </a>
        </div>

        <!-- Wishlist -->
        <div
            class="hover:ml-4 w-full hover:text-[#e38407] dark:hover:text-[#e38407]  p-2 pl-8 rounded-full transform ease-in-out duration-300 flex flex-row items-center space-x-3">
            <a href="{{ route('client.wishlist') }}"
                class="hover:ml-4 justify-end pr-5   hover:text-[#e38407] dark:hover:text-[#e38407]  p-3 rounded-full transform ease-in-out duration-300 flex {{ request()->routeIs('client.wishlist') ? ' text-[#e38407] ' : 'text-white' }}">
                <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                    viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12.01 6.001C6.5 1 1 8 5.782 13.001L12.011 20l6.23-7C23 8 17.5 1 12.01 6.002Z" />
                </svg>

                <span>Liste des souhaits</span>
            </a>
        </div>

        <!-- Orders -->
        <div
            class="hover:ml-4 w-full  hover:text-[#e38407] dark:hover:text-[#e38407]  p-2 pl-8 rounded-full transform ease-in-out duration-300 flex flex-row items-center space-x-3">
            <a href="{{ route('client.orders') }}"
                class="hover:ml-4 justify-end pr-5 hover:text-[#e38407] dark:hover:text-[#e38407]  p-3 rounded-full transform ease-in-out duration-300 flex {{ request()->routeIs('client.orders') ? ' text-[#e38407] ' : 'text-white' }}">
                <svg class="w-6 h-6 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                    height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 5C7.9 5 7 5.9 7 7V21L11 17H20C21.1 17 22 16.1 22 15V7C22 5.9 21.1 5 20 5H9M3 7C2.4 7 2 7.4 2 8S2.4 9 3 9H5V7H3M11 8H19V10H11V8M2 11C1.4 11 1 11.4
                                 1 12S1.4 13 2 13H5V11H2M11 12H16V14H11V12M1 15C.4 15 0 15.4 0 16C0 16.6 .4 17 1 17H5V15H1Z" />
                </svg>

                <span>Commandes</span>
            </a>
        </div>
    </div>
    <!-- MINI SIDEBAR-->
    <div class="mini mt-20 flex flex-col space-y-2 w-full h-[calc(100vh)]">
        <!-- Dashboard -->
        <a href="{{ route('client.dashboard') }}"
            class="hover:ml-4 justify-end pr-5   hover:text-[#e38407] dark:hover:text-[#e38407]  p-3 rounded-full transform ease-in-out duration-300 flex {{ request()->routeIs('client.dashboard') ? ' text-[#e38407] ' : 'text-white' }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                <path fill="currentColor"
                    d="m15.943 10.498l-4.055 4.505A2 2 0 0 0 10 17h4a2 2 0 0 0-.603-1.431l3.66-4.067a.75.75 0 1 0-1.114-1.004M5 15.25a.75.75 0 0 0 0 1.5h1.5a.75.75 0 0 0 0-1.5zm14.75.75a.75.75 0 0 0-.75-.75h-1.5a.75.75 0 0 0 0 1.5H19a.75.75 0 0 0 .75-.75" />
                <path fill="currentColor"
                    d="M18 13a1 1 0 1 0 0-2a1 1 0 0 0 0 2M7 12a1 1 0 1 1-2 0a1 1 0 0 1 2 0m1-2.5a1 1 0 1 0 0-2a1 1 0 0 0 0 2m9-1a1 1 0 1 1-2 0a1 1 0 0 1 2 0M12.75 6a.75.75 0 0 0-1.5 0v1.5a.75.75 0 0 0 1.5 0z" />
                <path fill="currentColor"
                    d="M12 3.25C6.063 3.25 1.25 8.063 1.25 14c0 1.498.307 2.927.862 4.224l.005.012c.215.502.363.848.817 1.332c.183.195.439.39.677.548c.238.157.519.315.77.407c.624.227 1.168.227 1.937.227h11.364c.769 0 1.313 0 1.937-.227c.252-.092.532-.25.77-.407s.494-.353.677-.548c.454-.484.603-.83.817-1.332l.005-.012c.555-1.297.862-2.726.862-4.224c0-5.937-4.813-10.75-10.75-10.75M2.75 14a9.25 9.25 0 0 1 18.5 0c0 1.292-.264 2.52-.741 3.634c-.204.477-.267.62-.536.907c-.071.075-.22.197-.41.323c-.19.125-.36.214-.458.25c-.352.128-.632.136-1.502.136H6.397c-.87 0-1.15-.008-1.502-.136a2.6 2.6 0 0 1-.458-.25a2.6 2.6 0 0 1-.41-.323c-.269-.287-.332-.43-.536-.907A9.2 9.2 0 0 1 2.75 14" />
            </svg>
        </a>

        <!-- Wishlist -->
        <a href="{{ route('client.wishlist') }}"
            class="hover:ml-4 justify-end pr-5  hover:text-[#e38407] dark:hover:text-[#e38407]  p-3 rounded-full transform ease-in-out duration-300 flex {{ request()->routeIs('client.wishlist') ? ' text-[#e38407] ' : 'text-white' }}">
            <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12.01 6.001C6.5 1 1 8 5.782 13.001L12.011 20l6.23-7C23 8 17.5 1 12.01 6.002Z" />
            </svg>
        </a>

        <!-- Commandes -->
        <a href="{{ route('client.orders') }}"
            class="hover:ml-4 justify-end pr-5   hover:text-[#e38407] dark:hover:text-[#e38407]  p-3 rounded-full transform ease-in-out duration-300 flex {{ request()->routeIs('client.orders') ? ' text-[#e38407] ' : 'text-white' }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                <g fill="none" stroke="currentColor">
                    <rect width="14" height="17" x="5" y="4" rx="2" />
                    <path stroke-linecap="round" d="M9 9h6m-6 4h6m-6 4h4" />
                </g>
            </svg>
        </a>
    </div>
</aside>

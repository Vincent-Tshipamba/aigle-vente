<div class="fixed w-full z-30 flex bg-gray-900 dark:bg-[#0F172A] p-2 items-center justify-center h-16 px-10">
    <div
        class="flex items-center justify-center flex-none h-full ml-12 duration-500 ease-in-out transform logo dark:text-white">
        <a href="{{ route('dashboard') }}" class="flex ms-2 md:me-24">
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

            <a href="{{ route('dashboard') }}"
                class="hover:ml-4 justify-end pr-5  hover:text-[#e38407] dark:hover:text-[#e38407]  p-3 rounded-full transform ease-in-out duration-300 flex {{ request()->routeIs('dashboard') ? ' text-[#e38407] ' : 'text-white' }}">
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
        <div
            class="hover:ml-4 w-full hover:text-[#e38407] dark:hover:text-[#e38407]  p-2 pl-8 rounded-full transform ease-in-out duration-300 flex flex-row items-center space-x-3">
            <a href="{{ route('users.index') }}"
                class="hover:ml-4 justify-end pr-5   hover:text-[#e38407] dark:hover:text-[#e38407]  p-3 rounded-full transform ease-in-out duration-300 flex {{ request()->routeIs('users.index') ? ' text-[#e38407] ' : 'text-white' }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 16 16">
                    <path fill="white" fill-rule="evenodd"
                        d="M5.482 4.344a2 2 0 1 0-2.963 0q-.12.063-.23.136c-.457.305-.75.704-.933 1.073A3.5 3.5 0 0 0 1 6.978V9a1 1 0 0 0 1 1h2.5a3.7 3.7 0 0 1 .684-.962L5.171 9H2V7s0-2 2-2c1.007 0 1.507.507 1.755 1.01c.225-.254.493-.47.793-.636a2.7 2.7 0 0 0-1.066-1.03M4 4a1 1 0 1 0 0-2a1 1 0 0 0 0 2m10 6h-2.5a3.7 3.7 0 0 0-.684-.962L10.829 9H14V7s0-2-2-2c-1.007 0-1.507.507-1.755 1.01a3 3 0 0 0-.793-.636a2.7 2.7 0 0 1 1.066-1.03a2 2 0 1 1 2.963 0q.12.063.23.136c.457.305.75.704.933 1.073A3.45 3.45 0 0 1 15 6.944V9a1 1 0 0 1-1 1m-2-6a1 1 0 1 0 0-2a1 1 0 0 0 0 2" />
                    <path fill="white" fill-rule="evenodd"
                        d="M10 8c0 .517-.196.989-.518 1.344a2.76 2.76 0 0 1 1.163 1.21A3.45 3.45 0 0 1 11 11.977V14a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1v-2.022a2 2 0 0 1 .006-.135a3.5 3.5 0 0 1 .35-1.29a2.76 2.76 0 0 1 1.162-1.21A2 2 0 1 1 10 8m-4 4v2h4v-2s0-2-2-2s-2 2-2 2m3-4a1 1 0 1 1-2 0a1 1 0 0 1 2 0" />
                </svg>
                <span>Utilisateurs</span>
            </a>
        </div>
        <div
            class="hover:ml-4 w-full hover:text-[#e38407] dark:hover:text-[#e38407]  p-2 pl-8 rounded-full transform ease-in-out duration-300 flex flex-row items-center space-x-3">
            <a href=""
                class="hover:ml-4 justify-end pr-5   hover:text-[#e38407] dark:hover:text-[#e38407]  p-3 rounded-full transform ease-in-out duration-300 flex {{ request()->routeIs('clients.index') ? ' text-[#e38407] ' : 'text-white' }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 14 14">
                    <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M9.284 3.503a1.621 1.621 0 1 0 3.242 0a1.621 1.621 0 1 0-3.242 0" />
                        <path
                            d="M8.473 8.367v-.81a2.432 2.432 0 0 1 4.865 0v.81M6.6 8.369h6.738M3.604 5.612a1.712 1.712 0 1 0 0-3.425a1.712 1.712 0 0 0 0 3.425" />
                        <path d="M6.6 8.609a2.996 2.996 0 1 0-5.993 0v1.284h1.285l.428 3.424h2.568l.428-3.424H6.6z" />
                    </g>
                </svg>
                <span>Clients</span>
            </a>
        </div>
        <div
            class="hover:ml-4 w-full   hover:text-[#e38407] dark:hover:text-[#e38407]  p-2 pl-8 rounded-full transform ease-in-out duration-300 flex flex-row items-center space-x-3">
            <a href=""
                class="hover:ml-4 justify-end pr-5   hover:text-[#e38407] dark:hover:text-[#e38407]  p-3 rounded-full transform ease-in-out duration-300 flex {{ request()->routeIs('activites.index') ? ' text-[#e38407] ' : 'text-white' }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 48 48">
                    <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                        d="M24 31.68V16.319m-3.936 12.479c.775.98 1.746 1.346 3.098 1.346h1.87c1.741 0 3.152-1.375 3.152-3.072h0c0-1.697-1.41-3.072-3.152-3.072h-2.066c-1.74 0-3.152-1.375-3.152-3.072h0c0-1.697 1.41-3.072 3.152-3.072h1.87c1.353 0 2.324.365 3.099 1.346m-3.874 14.96v7.592m19.44-30.21v19.27L24.965 41.517a1.81 1.81 0 0 1-1.81 0L4.5 30.745V11.474m26.448 7.318L43.5 11.545l-9.12-5.266h0l-6.426 3.71c-2.183 1.26-5.732 1.254-7.929-.014L13.56 6.242L4.5 11.474l12.552 7.247" />
                </svg>
                <span>Vendeurs</span>
            </a>
        </div>
        <div
            class="hover:ml-4 w-full hover:text-[#e38407] dark:hover:text-[#e38407]  p-2 pl-8 rounded-full transform ease-in-out duration-300 flex flex-row items-center space-x-3">
            <a href=""
                class="hover:ml-4 justify-end pr-5   hover:text-[#e38407] dark:hover:text-[#e38407]  p-3 rounded-full transform ease-in-out duration-300 flex {{ request()->routeIs('odcusers.index') ? ' text-[#e38407] ' : 'text-white' }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                    <path fill="currentColor" fill-rule="evenodd"
                        d="M6.066 5.5a.5.5 0 0 0-.43.243L3.383 9.5h17.234l-2.254-3.757a.5.5 0 0 0-.429-.243zm-2.684 5H4v8A1.5 1.5 0 0 0 5.5 20H6a1.5 1.5 0 0 0 1.5-1.5v-5H10v5a1.5 1.5 0 0 0 1.5 1.5h7a1.5 1.5 0 0 0 1.5-1.5v-8h.616a1 1 0 0 0 .858-1.514l-2.255-3.758a1.5 1.5 0 0 0-1.286-.728H6.066a1.5 1.5 0 0 0-1.287.728L2.525 8.986a1 1 0 0 0 .857 1.514M5 18.5v-8h14v8a.5.5 0 0 1-.5.5h-7a.5.5 0 0 1-.5-.5v-5.3a.7.7 0 0 0-.7-.7H7.2a.7.7 0 0 0-.7.7v5.3a.5.5 0 0 1-.5.5h-.5a.5.5 0 0 1-.5-.5m8-2.5v-2.75h4V16zm-.083-3.75a.917.917 0 0 0-.917.917v2.916c0 .507.41.917.917.917h4.166c.507 0 .917-.41.917-.917v-2.916a.917.917 0 0 0-.917-.917z"
                        clip-rule="evenodd" />
                </svg>
                <span>Boutiques</span>
            </a>
        </div>

        <div
            class="hover:ml-4 w-full   hover:text-[#e38407] dark:hover:text-[#e38407]  p-2 pl-8 rounded-full transform ease-in-out duration-300 flex flex-row items-center space-x-3">
            <a href=""
                class="hover:ml-4 justify-end pr-5   hover:text-[#e38407] dark:hover:text-[#e38407]  p-3 rounded-full transform ease-in-out duration-300 flex {{ request()->routeIs('employabilites.index') ? ' text-[#e38407] ' : 'text-white' }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 1024 1024">
                    <path fill="white" fill-rule="evenodd"
                        d="M464 144c8.837 0 16 7.163 16 16v304c0 8.836-7.163 16-16 16H160c-8.837 0-16-7.164-16-16V160c0-8.837 7.163-16 16-16zm-52 68H212v200h200zm493.333 87.686c6.248 6.248 6.248 16.379 0 22.627l-181.02 181.02c-6.248 6.248-16.378 6.248-22.627 0l-181.019-181.02c-6.248-6.248-6.248-16.379 0-22.627l181.02-181.02c6.248-6.248 16.378-6.248 22.627 0zm-84.853 11.313L713 203.52L605.52 311L713 418.48zM464 544c8.837 0 16 7.164 16 16v304c0 8.837-7.163 16-16 16H160c-8.837 0-16-7.163-16-16V560c0-8.836 7.163-16 16-16zm-52 68H212v200h200zm452-68c8.837 0 16 7.164 16 16v304c0 8.837-7.163 16-16 16H560c-8.837 0-16-7.163-16-16V560c0-8.836 7.163-16 16-16zm-52 68H612v200h200z" />
                </svg>
                <span>Produits</span>
            </a>
        </div>

        <div
            class="hover:ml-4 w-full  hover:text-[#e38407] dark:hover:text-[#e38407]  p-2 pl-8 rounded-full transform ease-in-out duration-300 flex flex-row items-center space-x-3">
            <a href=""
                class="hover:ml-4 justify-end pr-5 hover:text-[#e38407] dark:hover:text-[#e38407]  p-3 rounded-full transform ease-in-out duration-300 flex {{ request()->routeIs('evaluations.index') ? ' text-[#e38407] ' : 'text-white' }}">
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
        <a href="{{ route('dashboard') }}"
            class="hover:ml-4 justify-end pr-5   hover:text-[#ce4e76] dark:hover:text-[#e38407]  p-3 rounded-full transform ease-in-out duration-300 flex {{ request()->routeIs('dashboard') ? ' text-[#e38407] ' : 'text-white' }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                <path fill="currentColor"
                    d="m15.943 10.498l-4.055 4.505A2 2 0 0 0 10 17h4a2 2 0 0 0-.603-1.431l3.66-4.067a.75.75 0 1 0-1.114-1.004M5 15.25a.75.75 0 0 0 0 1.5h1.5a.75.75 0 0 0 0-1.5zm14.75.75a.75.75 0 0 0-.75-.75h-1.5a.75.75 0 0 0 0 1.5H19a.75.75 0 0 0 .75-.75" />
                <path fill="currentColor"
                    d="M18 13a1 1 0 1 0 0-2a1 1 0 0 0 0 2M7 12a1 1 0 1 1-2 0a1 1 0 0 1 2 0m1-2.5a1 1 0 1 0 0-2a1 1 0 0 0 0 2m9-1a1 1 0 1 1-2 0a1 1 0 0 1 2 0M12.75 6a.75.75 0 0 0-1.5 0v1.5a.75.75 0 0 0 1.5 0z" />
                <path fill="currentColor"
                    d="M12 3.25C6.063 3.25 1.25 8.063 1.25 14c0 1.498.307 2.927.862 4.224l.005.012c.215.502.363.848.817 1.332c.183.195.439.39.677.548c.238.157.519.315.77.407c.624.227 1.168.227 1.937.227h11.364c.769 0 1.313 0 1.937-.227c.252-.092.532-.25.77-.407s.494-.353.677-.548c.454-.484.603-.83.817-1.332l.005-.012c.555-1.297.862-2.726.862-4.224c0-5.937-4.813-10.75-10.75-10.75M2.75 14a9.25 9.25 0 0 1 18.5 0c0 1.292-.264 2.52-.741 3.634c-.204.477-.267.62-.536.907c-.071.075-.22.197-.41.323c-.19.125-.36.214-.458.25c-.352.128-.632.136-1.502.136H6.397c-.87 0-1.15-.008-1.502-.136a2.6 2.6 0 0 1-.458-.25a2.6 2.6 0 0 1-.41-.323c-.269-.287-.332-.43-.536-.907A9.2 9.2 0 0 1 2.75 14" />
            </svg>
        </a>
        <!-- Utilisateurs -->
        <a href="{{ route('users.index') }}"
            class="hover:ml-4 justify-end pr-5   hover:text-[#e38407] dark:hover:text-[#e38407]  p-3 rounded-full transform ease-in-out duration-300 flex {{ request()->routeIs('users.index') ? ' text-[#e38407] ' : 'text-white' }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 16 16">
                <path fill="currentColor" fill-rule="evenodd"
                    d="M5.482 4.344a2 2 0 1 0-2.963 0q-.12.063-.23.136c-.457.305-.75.704-.933 1.073A3.5 3.5 0 0 0 1 6.978V9a1 1 0 0 0 1 1h2.5a3.7 3.7 0 0 1 .684-.962L5.171 9H2V7s0-2 2-2c1.007 0 1.507.507 1.755 1.01c.225-.254.493-.47.793-.636a2.7 2.7 0 0 0-1.066-1.03M4 4a1 1 0 1 0 0-2a1 1 0 0 0 0 2m10 6h-2.5a3.7 3.7 0 0 0-.684-.962L10.829 9H14V7s0-2-2-2c-1.007 0-1.507.507-1.755 1.01a3 3 0 0 0-.793-.636a2.7 2.7 0 0 1 1.066-1.03a2 2 0 1 1 2.963 0q.12.063.23.136c.457.305.75.704.933 1.073A3.45 3.45 0 0 1 15 6.944V9a1 1 0 0 1-1 1m-2-6a1 1 0 1 0 0-2a1 1 0 0 0 0 2" />
                <path fill="currentColor" fill-rule="evenodd"
                    d="M10 8c0 .517-.196.989-.518 1.344a2.76 2.76 0 0 1 1.163 1.21A3.45 3.45 0 0 1 11 11.977V14a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1v-2.022a2 2 0 0 1 .006-.135a3.5 3.5 0 0 1 .35-1.29a2.76 2.76 0 0 1 1.162-1.21A2 2 0 1 1 10 8m-4 4v2h4v-2s0-2-2-2s-2 2-2 2m3-4a1 1 0 1 1-2 0a1 1 0 0 1 2 0" />
            </svg>
        </a>

        <!-- Clients -->
        <a href=""
            class="hover:ml-4 justify-end pr-5  hover:text-[#e38407] dark:hover:text-[#e38407]  p-3 rounded-full transform ease-in-out duration-300 flex {{ request()->routeIs('activites.index') ? ' text-[#e38407] ' : 'text-white' }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 14 14">
                <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M9.284 3.503a1.621 1.621 0 1 0 3.242 0a1.621 1.621 0 1 0-3.242 0" />
                    <path
                        d="M8.473 8.367v-.81a2.432 2.432 0 0 1 4.865 0v.81M6.6 8.369h6.738M3.604 5.612a1.712 1.712 0 1 0 0-3.425a1.712 1.712 0 0 0 0 3.425" />
                    <path d="M6.6 8.609a2.996 2.996 0 1 0-5.993 0v1.284h1.285l.428 3.424h2.568l.428-3.424H6.6z" />
                </g>
            </svg>
        </a>
        <!-- Vendeurs -->
        <a href=""
            class="hover:ml-4 justify-end pr-5   hover:text-[#e38407] dark:hover:text-[#e38407]  p-3 rounded-full transform ease-in-out duration-300 flex {{ request()->routeIs('odcusers.index') ? ' text-[#e38407] ' : 'text-white' }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 48 48">
                <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                    d="M24 31.68V16.319m-3.936 12.479c.775.98 1.746 1.346 3.098 1.346h1.87c1.741 0 3.152-1.375 3.152-3.072h0c0-1.697-1.41-3.072-3.152-3.072h-2.066c-1.74 0-3.152-1.375-3.152-3.072h0c0-1.697 1.41-3.072 3.152-3.072h1.87c1.353 0 2.324.365 3.099 1.346m-3.874 14.96v7.592m19.44-30.21v19.27L24.965 41.517a1.81 1.81 0 0 1-1.81 0L4.5 30.745V11.474m26.448 7.318L43.5 11.545l-9.12-5.266h0l-6.426 3.71c-2.183 1.26-5.732 1.254-7.929-.014L13.56 6.242L4.5 11.474l12.552 7.247" />
            </svg>
        </a>
        <!-- Boutiques -->
        <a href=""
            class="hover:ml-4 justify-end pr-5   hover:text-[#e38407] dark:hover:text-[#e38407]  p-3 rounded-full transform ease-in-out duration-300 flex {{ request()->routeIs('evaluations.index') ? ' text-[#e38407] ' : 'text-white' }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                <path fill="currentColor" fill-rule="evenodd"
                    d="M6.066 5.5a.5.5 0 0 0-.43.243L3.383 9.5h17.234l-2.254-3.757a.5.5 0 0 0-.429-.243zm-2.684 5H4v8A1.5 1.5 0 0 0 5.5 20H6a1.5 1.5 0 0 0 1.5-1.5v-5H10v5a1.5 1.5 0 0 0 1.5 1.5h7a1.5 1.5 0 0 0 1.5-1.5v-8h.616a1 1 0 0 0 .858-1.514l-2.255-3.758a1.5 1.5 0 0 0-1.286-.728H6.066a1.5 1.5 0 0 0-1.287.728L2.525 8.986a1 1 0 0 0 .857 1.514M5 18.5v-8h14v8a.5.5 0 0 1-.5.5h-7a.5.5 0 0 1-.5-.5v-5.3a.7.7 0 0 0-.7-.7H7.2a.7.7 0 0 0-.7.7v5.3a.5.5 0 0 1-.5.5h-.5a.5.5 0 0 1-.5-.5m8-2.5v-2.75h4V16zm-.083-3.75a.917.917 0 0 0-.917.917v2.916c0 .507.41.917.917.917h4.166c.507 0 .917-.41.917-.917v-2.916a.917.917 0 0 0-.917-.917z"
                    clip-rule="evenodd" />
            </svg>
        </a>

        <!-- Produits -->
        <a href=""
            class="hover:ml-4 justify-end pr-5   hover:text-[#e38407] dark:hover:text-[#e38407]  p-3 rounded-full transform ease-in-out duration-300 flex {{ request()->routeIs('evaluations.index') ? ' text-[#e38407] ' : 'text-white' }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 1024 1024">
                <path fill="white" fill-rule="evenodd"
                    d="M464 144c8.837 0 16 7.163 16 16v304c0 8.836-7.163 16-16 16H160c-8.837 0-16-7.164-16-16V160c0-8.837 7.163-16 16-16zm-52 68H212v200h200zm493.333 87.686c6.248 6.248 6.248 16.379 0 22.627l-181.02 181.02c-6.248 6.248-16.378 6.248-22.627 0l-181.019-181.02c-6.248-6.248-6.248-16.379 0-22.627l181.02-181.02c6.248-6.248 16.378-6.248 22.627 0zm-84.853 11.313L713 203.52L605.52 311L713 418.48zM464 544c8.837 0 16 7.164 16 16v304c0 8.837-7.163 16-16 16H160c-8.837 0-16-7.163-16-16V560c0-8.836 7.163-16 16-16zm-52 68H212v200h200zm452-68c8.837 0 16 7.164 16 16v304c0 8.837-7.163 16-16 16H560c-8.837 0-16-7.163-16-16V560c0-8.836 7.163-16 16-16zm-52 68H612v200h200z" />
            </svg>
        </a>

        <!-- Commandes -->
        <a href=""
            class="hover:ml-4 justify-end pr-5   hover:text-[#e38407] dark:hover:text-[#e38407]  p-3 rounded-full transform ease-in-out duration-300 flex {{ request()->routeIs('evaluations.index') ? ' text-[#e38407] ' : 'text-white' }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                <g fill="none" stroke="white">
                    <rect width="14" height="17" x="5" y="4" rx="2" />
                    <path stroke-linecap="round" d="M9 9h6m-6 4h6m-6 4h4" />
                </g>
            </svg>
        </a>

    </div>

</aside>

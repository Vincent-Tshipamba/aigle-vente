@extends('admin.layouts.app')

@section('content')
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none sm:flex items-center mb-3 w-full">
        <nav class="flex px-5 w-full py-3 text-gray-700 rounded-lg bg-[#eaeaebf3] dark:bg-gray-900" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="{{ route('admin.dashboard') }}"
                        class="inline-flex items-center space-x-2 text-sm font-medium text-gray-700 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">
                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                            viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m4 12 8-8 8 8M6 10.5V19a1 1 0 0 0 1 1h3v-3a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3h3a1 1 0 0 0 1-1v-8.5" />
                        </svg>
                        <span class="space-x-2">
                            Dashboard
                        </span>
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </div>
                </li>
                <li class="inline-flex items-center text-sm text-gray-700 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white"
                    aria-current="page">
                    <a href="{{ route('admin.users.index') }}">
                        Liste des utilisateurs
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </div>
                </li>
                <li class="inline-flex items-center text-sm font-bold text-gray-700 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white"
                    aria-current="page">
                    {{ $user->name }}
                </li>
            </ol>
        </nav>
    </div>
    <!--end breadcrumb-->

    @if ($user->hasRole('client') || $user->client)
        <section class="grid grid-cols-4 w-full p-4 mt-4 border-gray-200 rounded-xl gap-12">
            <div class="sm:col-span-2 xl:col-span-1 col-span-4">
                <div
                    class="bg-white dark:bg-gray-900 shadow-lg dark:shadow-lg dark:shadow-gray-500/20 p-4 mb-4 rounded-lg border dark:border-gray-500 text-center">
                    <div class="">
                        <div class=" flex justify-center">
                            <img src="{{ isset($user->client->image) ? $user->client->image : asset('img/profil.jpeg') }}"
                                alt=""
                                class=" w-28 h-28 rounded-full border border-gray-900 dark:border-gray-500 object-cover">
                        </div>
                    </div>
                    <div class="mb-4">
                        <h2
                            class="text-4xl mb-2 font-extrabold leading-none tracking-tight text-gray-700 md:text-5xl lg:text-5xl dark:text-white">
                            {{ $user->name }}</h2>
                        <p class="text-sm text-gray-400">{{ $user->email }}</p>
                    </div>

                    <div class=" flex justify-center gap-5 text-center">
                        <div>
                            <p class="mb-4 text-lg leading-none tracking-tight text-gray-700 dark:text-white">
                                @if (Cache::has('user-is-online-' . $user->id))
                                    <div class="flex items-center">
                                        <div class="h-2.5 w-2.5 rounded-full bg-green-500 me-2"></div> En ligne
                                    </div>
                                @else
                                    <span class="text-gray-500" id="last-activity-client">
                                        En ligne il y a <span id="diff_client_last_time"></span>
                                    </span>
                                @endif
                            </p>
                        </div>
                    </div>
                </div>

                <div
                    class="border dark:border-gray-500 bg-white dark:bg-gray-900 shadow-lg dark:shadow-lg dark:shadow-gray-500/20 p-4 mb-4 rounded-lg text-lg font-normal text-gray-500 lg:text-sm  dark:text-gray-400">
                    <div
                        class="mb-1.5 text-4xl font-extrabold leading-none tracking-tight text-gray-700 md:text-2xl lg:text-2xl dark:text-white">
                        <h2>Cordonnées en tant que client</h2>
                    </div>

                    <hr class="my-4">
                    <div class=" text-left flex ">
                        <p class="w-1/2">Prénom : </p><span class="font-bold">{{ $user->client->first_name }}</span>
                    </div>
                    <hr class="my-4">
                    <div class=" text-left flex ">
                        <p class="w-1/2">Nom : </p><span class="font-bold">{{ $user->client->last_name }}</span>
                    </div>
                    <hr class="my-4">
                    <div class=" text-left flex ">
                        <p class="w-1/2">Genre : </p><span class="font-bold">{{ $user->client->sexe }}</span>
                    </div>
                    <hr class="my-4">
                    <div class=" text-left flex ">
                        <p class="w-1/2">Email : </p><span class="font-bold">{{ $user->email }}</span>
                    </div>
                    <hr class="my-4">
                    <div class=" text-left flex ">
                        <p class="w-1/2">Téléphone : </p>
                        <span class="font-bold">
                            {{ $user->client->phone }}
                        </span>
                    </div>
                    <hr class="my-4">
                    <div class=" text-left flex ">
                        <p class="w-1/2">Ville : </p>
                        <span class="font-bold">
                            {{ $user->client->city->name }}
                        </span>
                    </div>
                    <hr class="my-4">
                    <div class=" text-left flex ">
                        <p class="w-1/2">Adresse : </p>
                        <span class="font-bold">
                            {{ $user->client->address }}
                        </span>
                    </div>
                    <div class="flex ">
                        <p class="w-1/2">
                            Client créé le :
                        </p>
                        <span class="font-bold">
                            @php
                                $date = new DateTimeImmutable($user->client->created_at);
                                $formatter = new IntlDateFormatter(
                                    'fr_FR',
                                    IntlDateFormatter::MEDIUM,
                                    IntlDateFormatter::NONE,
                                );
                                $format = $formatter->format($date);
                            @endphp
                            {{ $format }}
                        </span>
                    </div>
                </div>
                <hr class="my-4">
            </div>
            <div
                class="sm:col-span-2 xl:col-span-3 col-span-4 border dark:border-gray-500 bg-white dark:bg-gray-900 shadow-lg dark:shadow-lg dark:shadow-gray-500/20 p-4 mb-4 rounded-lg w-full">

                <div class=" flex justify-between mb-4 items-center">
                    <h3
                        class="text-4xl font-extrabold leading-none tracking-tight text-gray-700 md:text-2xl lg:text-2xl dark:text-white">
                        Historique des commandes passées par le client
                    </h3>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-[repeat(auto-fit,_minmax(250px,_1fr))] gap-6 mb-10">
                    @foreach ($user->client->orders as $order)
                        <a href="{{ route('admin.orders.show', $order->id) }}"
                            class="rounded-xl flex justify-between gap-8 items-center border p-2 h-36 w-full shadow-lg dark:shadow-lg dark:shadow-gray-500/20 backdrop-blur-xl bg-cover bg-[#fcdab40a] dark:bg-gray-900 dark:hover:bg-gray-700 hover:bg-[#f8f0e7]  hover:scale-105 transition duration-700 ease-in-out border-l-8 dark:border-[#cc832f] border-[#ff9822] hover:border-l-10 ">
                            <div>
                                <div class=" flex gap-4 items-center mb-4">

                                    <h3 class="text-xl font-semibold text-[#ff9822]">
                                        {{ $order->order_number }}
                                    </h3>
                                </div>
                                <div class="">
                                    <p class="text-sm font-bold  dark:text-gray-400">
                                        Date de commande : <span class="font-normal">{{ $order->order_date }}</span>
                                    </p>
                                    <p class="text-sm font-bold  dark:text-gray-400">
                                        Nombre de produits : {{ $order->products->count() }}
                                    </p>
                                </div>
                            </div>
                            <div class="">
                                <img src="{{ isset($order->image) ? $order->image : asset('img/profil.jpeg') }}"
                                    alt=""
                                    class=" w-28 rounded-full border border-gray-900 dark:border-gray-500 object-cover">
                            </div>
                        </a>
                    @endforeach
                </div>
                @if ($user->client->orders->count() > 0)
                    <div class=" flex justify-between items-center ">
                        <div class=" flex gap-4">
                            <div>
                                <a href="" class=" flex items-center">
                                    <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        fill="currentColor" viewBox="0 0 24 24">
                                        <path fill-rule="evenodd"
                                            d="M11.403 5H5a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-6.403a3.01 3.01 0 0 1-1.743-1.612l-3.025 3.025A3 3 0 1 1 9.99 9.768l3.025-3.025A3.01 3.01 0 0 1 11.403 5Z"
                                            clip-rule="evenodd" />
                                        <path fill-rule="evenodd"
                                            d="M13.232 4a1 1 0 0 1 1-1H20a1 1 0 0 1 1 1v5.768a1 1 0 1 1-2 0V6.414l-6.182 6.182a1 1 0 0 1-1.414-1.414L17.586 5h-3.354a1 1 0 0 1-1-1Z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    <span class="text-gray-800 lg:text-sm  dark:text-gray-200">Générer un
                                        rapport</span>
                                </a>
                            </div>
                        </div>
                        <div>
                            <form class="max-w-sm mx-auto">
                                <div class=" flex items-center gap-4">
                                    <div>
                                        <select id="year-select-for-client"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        </select>
                                    </div>

                                    <div>
                                        <select id="month-select-for-client"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        </select>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div>
                        <canvas id="chartClientOrders"></canvas>
                    </div>
                @else
                    <div class=" flex justify-center items-center w-full h-full">
                        <p class=" text-lg font-normal text-gray-500 lg:text-sm  dark:text-gray-400">
                            Aucune commande passée par ce client pour le moment.
                        </p>
                    </div>
                @endif
            </div>
        </section>
    @endif

    @if ($user->hasRole('vendeur') || $user->seller)
        <section class="grid grid-cols-4 w-full p-4 mt-4 border-gray-200 rounded-xl gap-12">
            <div class="sm:col-span-2 xl:col-span-1 col-span-4">
                <div
                    class="bg-white dark:bg-gray-900 shadow-lg dark:shadow-lg dark:shadow-gray-500/20 p-4 mb-4 rounded-lg border dark:border-gray-500 text-center">
                    <div class="">
                        <div class=" flex justify-center">
                            <img src="{{ isset($user->seller->image) ? $user->seller->image : asset('img/profil.jpeg') }}"
                                alt=""
                                class=" w-28 h-28 rounded-full border border-gray-900 dark:border-gray-500 object-cover">
                        </div>
                    </div>
                    <div class="mb-4">
                        <h2
                            class="text-4xl mb-2 font-extrabold leading-none tracking-tight text-gray-700 md:text-5xl lg:text-5xl dark:text-white">
                            {{ $user->seller->first_name }} {{ $user->seller->last_name }}</h2>
                        <p class="text-sm text-gray-400">{{ $user->email }}</p>
                    </div>

                    <div class=" flex justify-center gap-5 text-center">
                        <div>
                            <p class="mb-4 text-lg leading-none tracking-tight text-gray-700 dark:text-white">
                                @if (Cache::has('user-is-online-' . $user->id))
                                    <div class="flex items-center">
                                        <div class="h-2.5 w-2.5 rounded-full bg-green-500 me-2"></div> En ligne
                                    </div>
                                @else
                                    <p class="text-gray-500">
                                        En ligne il y a <span id="diff_seller_last_time"></span>
                                    </p>
                                @endif
                            </p>
                        </div>
                    </div>
                </div>

                <div
                    class="border dark:border-gray-500 bg-white dark:bg-gray-900 shadow-lg dark:shadow-lg dark:shadow-gray-500/20 p-4 mb-4 rounded-lg text-lg font-normal text-gray-500 lg:text-sm  dark:text-gray-400">
                    <div
                        class="mb-1.5 text-4xl font-extrabold leading-none tracking-tight text-gray-700 md:text-2xl lg:text-2xl dark:text-white">
                        <h2>Cordonnées en tant que vendeur</h2>
                    </div>

                    <hr class="my-4">
                    <div class=" text-left flex ">
                        <p class="w-1/2">Prénom : </p><span class="font-bold">{{ $user->seller->first_name }}</span>
                    </div>
                    <hr class="my-4">
                    <div class=" text-left flex ">
                        <p class="w-1/2">Nom : </p><span class="font-bold">{{ $user->seller->last_name }}</span>
                    </div>
                    <hr class="my-4">
                    <div class=" text-left flex ">
                        <p class="w-1/2">Genre : </p><span class="font-bold">{{ $user->seller->sexe }}</span>
                    </div>
                    <hr class="my-4">
                    <div class=" text-left flex ">
                        <p class="w-1/2">Email : </p><span class="font-bold">{{ $user->email }}</span>
                    </div>
                    <hr class="my-4">
                    <div class=" text-left flex ">
                        <p class="w-1/2">Téléphone : </p>
                        <span class="font-bold">
                            {{ $user->seller->phone }}
                        </span>
                    </div>
                    <hr class="my-4">
                    <div class=" text-left flex ">
                        <p class="w-1/2">Ville : </p>
                        <span class="font-bold">
                            {{ $user->seller->city->name }}
                        </span>
                    </div>
                    <hr class="my-4">
                    <div class=" text-left flex ">
                        <p class="w-1/2">Adresse : </p>
                        <span class="font-bold">
                            {{ $user->seller->address }}
                        </span>
                    </div>
                    <hr class="my-4">
                    <div class="flex ">
                        <p class="w-1/2">
                            Vendeur depuis le :
                        </p>
                        <span class="font-bold">
                            @php
                                $seller_creation_date = new DateTimeImmutable($user->seller->created_at);
                                $formatter = new IntlDateFormatter(
                                    'fr_FR',
                                    IntlDateFormatter::MEDIUM,
                                    IntlDateFormatter::NONE,
                                );
                                $seller_creation_date_format = $formatter->format($seller_creation_date);
                            @endphp
                            {{ $seller_creation_date_format }}
                        </span>
                    </div>
                    <hr class="my-4">
                    <div class=" text-left flex ">
                        <p class="w-1/2">Nombre des boutiques : </p>
                        <span class="font-bold">
                            {{ $user->seller->shops->count() }}
                        </span>
                    </div>
                    <hr class="my-4">
                </div>
                <hr class="my-4">
            </div>
            <div
                class="sm:col-span-2 xl:col-span-3 col-span-4 border dark:border-gray-500 bg-white dark:bg-gray-900 shadow-lg dark:shadow-lg dark:shadow-gray-500/20 p-4 mb-4 rounded-lg w-full">
                @if ($user->seller->shops->count() > 0)
                    <div class=" flex justify-between mb-4 items-center">
                        <h3
                            class="text-4xl font-extrabold leading-none tracking-tight text-gray-700 md:text-2xl lg:text-2xl dark:text-white mb-4">
                            Boutiques enregistrées par le vendeur
                        </h3>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-[repeat(auto-fit,_minmax(250px,_1fr))] gap-6 mb-10">
                        @foreach ($user->seller->shops as $shop)
                            <a href="{{ route('admin.clients.index') }}"
                                class="rounded-xl flex justify-between gap-8 items-center border p-2 h-36 w-full shadow-lg dark:shadow-lg dark:shadow-gray-500/20 backdrop-blur-xl bg-cover bg-[#fcdab40a] dark:bg-gray-900 dark:hover:bg-gray-700 hover:bg-[#f8f0e7]  hover:scale-105 transition duration-700 ease-in-out border-l-8 dark:border-[#cc832f] border-[#ff9822] hover:border-l-10 ">
                                <div>
                                    <div class=" flex gap-4 items-center mb-4">

                                        <h3 class="text-xl font-semibold text-[#ff9822]">
                                            {{ $shop->name }}
                                        </h3>
                                    </div>
                                    <div class="">
                                        <p class="text-sm font-bold  dark:text-gray-400">
                                            Adresse : <span class="font-normal">{{ $shop->address }}</span>
                                        </p>
                                        <p class="text-sm font-bold  dark:text-gray-400">
                                            Nombre de produits : {{ $shop->products->count() }}
                                        </p>
                                    </div>
                                </div>
                                <div class="">
                                    <img src="{{ isset($shop->image) ? $shop->image : asset('img/profil.jpeg') }}"
                                        alt=""
                                        class=" w-28 rounded-full border border-gray-900 dark:border-gray-500 object-cover">
                                </div>
                            </a>
                        @endforeach
                    </div>
                    <div class=" flex justify-between mb-4 items-center">
                        <h3
                            class="text-4xl font-extrabold leading-none tracking-tight text-gray-700 md:text-2xl lg:text-2xl dark:text-white">
                            Historique des commandes enregistrées par le vendeur
                        </h3>
                    </div>
                    <div class=" flex justify-between items-center ">
                        <div class=" flex gap-4">
                            <div>
                                <a href="" class=" flex items-center">
                                    <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        fill="currentColor" viewBox="0 0 24 24">
                                        <path fill-rule="evenodd"
                                            d="M11.403 5H5a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-6.403a3.01 3.01 0 0 1-1.743-1.612l-3.025 3.025A3 3 0 1 1 9.99 9.768l3.025-3.025A3.01 3.01 0 0 1 11.403 5Z"
                                            clip-rule="evenodd" />
                                        <path fill-rule="evenodd"
                                            d="M13.232 4a1 1 0 0 1 1-1H20a1 1 0 0 1 1 1v5.768a1 1 0 1 1-2 0V6.414l-6.182 6.182a1 1 0 0 1-1.414-1.414L17.586 5h-3.354a1 1 0 0 1-1-1Z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    <span class="text-gray-800 lg:text-sm  dark:text-gray-200">Générer un
                                        rapport</span>
                                </a>
                            </div>
                        </div>
                        <div>
                            <form class="max-w-sm mx-auto">
                                <div class=" flex items-center gap-4">
                                    <div>
                                        <select id="year-select-for-seller"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        </select>
                                    </div>

                                    <div>
                                        <select id="month-select-for-seller"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        </select>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div>
                        <canvas id="chartSellerOrders"></canvas>
                    </div>

                    <div class=" my-8">
                        <h3
                            class="text-4xl font-extrabold leading-none tracking-tight text-gray-700 md:text-2xl lg:text-2xl dark:text-white">
                            Commandes recentes enregistrées par le vendeur
                        </h3>
                    </div>
                @else
                    <div class=" flex justify-center items-center w-full h-full">
                        <p class=" text-lg font-normal text-gray-500 lg:text-sm  dark:text-gray-400">
                            Aucune boutique n'a été enregistrée par ce vendeur pour le moment.
                        </p>
                    </div>
                @endif
            </div>
        </section>
    @endif

    <script>
        let isSeller = @json($isSeller);
        let isClient = @json($isClient);
        let nbr_shops = @json($nbr_shops);
        let nbr_orders = @json($nbr_orders);
        let user_last_activity = "{{ $user->last_activity ?? null }}";

        function updateTimeDifference(user) {
            const lastActivity = new Date(user_last_activity);
            const now = new Date();
            const diffInSeconds = Math.floor((now - lastActivity) / 1000);

            const diffInMinutes = Math.floor(diffInSeconds / 60);
            const diffInHours = Math.floor(diffInMinutes / 60);
            const diffInDays = Math.floor(diffInHours / 24);
            const diffInMonths = Math.floor(diffInDays / 30); // Approximativement, 1 mois = 30 jours
            const diffInYears = Math.floor(diffInMonths / 12); // Approximativement, 1 an = 12 mois

            const seconds = diffInSeconds % 60; // Calculer les secondes restantes
            const minutes = diffInMinutes % 60; // Calculer les minutes restantes
            const hours = diffInHours % 24; // Calculer les heures restantes
            const days = diffInDays % 30; // Calculer les jours restants
            const months = diffInMonths % 12; // Calculer les mois restants

            let timeDifference = '';
            if (diffInYears > 0) {
                timeDifference += diffInYears + ' an' + (diffInYears > 1 ? 's' : '');
            }
            if (months > 0) {
                if (timeDifference) timeDifference += ' ';
                timeDifference += months + ' mois';
            }
            if (days > 0) {
                if (timeDifference) timeDifference += ' ';
                timeDifference += days + ' jour' + (days > 1 ? 's' : '');
            }
            if (hours > 0) {
                if (timeDifference) timeDifference += ' ';
                timeDifference += hours + ' heure' + (hours > 1 ? 's' : '');
            }
            if (minutes > 0) {
                if (timeDifference) timeDifference += ' ';
                timeDifference += minutes + ' minute' + (minutes > 1 ? 's' : '');
            }
            timeDifference += ` ${seconds} seconde${seconds !== 1 ? 's' : ''}`; // Affiche les secondes

            if (user == 'seller') {
                let span = document.getElementById('diff_seller_last_time');
                span.textContent = timeDifference;
            } else if (user == 'client') {
                let span = document.getElementById('diff_client_last_time');
                span.textContent = timeDifference;
            }
        }

        // Mettre à jour le compteur chaque seconde
        setInterval(() => {
            if (isSeller) {
                updateTimeDifference('seller');
            }
            if (isClient) {
                updateTimeDifference('client');
            }
        }, 1000);


        // Initial call to set the correct time immediately
        if (isSeller) {
            updateTimeDifference('seller');
        }
        if (isClient) {
            updateTimeDifference('client');
        }
    </script>
    <script>
        let myChartClient = null;
        let myChartSeller = null;
        const currentYear = new Date().getFullYear();
        const currentMonth = new Date().getMonth() + 1;
        const startYear = 2022;

        const months = [
            'Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin',
            'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'
        ];

        if (isSeller) {
            let seller_id = @json($user->seller->id);
            if (nbr_shops > 0) {
                const yearSelectForSeller = document.getElementById('year-select-for-seller');
                const monthSelectForSeller = document.getElementById('month-select-for-seller');
                for (let year = startYear; year <= currentYear; year++) {
                    const option = document.createElement('option');
                    option.value = year;
                    option.text = year;
                    yearSelectForSeller.appendChild(option);
                }

                yearSelectForSeller.addEventListener('change', function() {
                    sellerUpdateMonths(this.value);
                });

                yearSelectForSeller.value = currentYear;
                sellerUpdateMonths(currentYear);

                fetchSellerOrdersData(seller_id, yearSelectForSeller.value, monthSelectForSeller.value);

                // Event listeners for year and month selection
                yearSelectForSeller.addEventListener('change', function() {
                    fetchSellerOrdersData(seller_id, yearSelectForSeller.value, monthSelectForSeller.value);
                });

                monthSelectForSeller.addEventListener('change', function() {
                    fetchSellerOrdersData(seller_id, yearSelectForSeller.value, monthSelectForSeller.value);
                });

                function fetchSellerOrdersData(seller_id, year, month) {
                    const sellerOrdersUrl = `/admin/api/seller-orders?seller_id=${seller_id}&year=${year}&month=${month}`;
                    fetch(sellerOrdersUrl)
                        .then(response => response.json())
                        .then(data => {
                            const dates = data.map(item => item.date);
                            const aggregates = data.map(item => item.aggregate);

                            if (myChartSeller) {
                                myChartSeller.data.labels = dates;
                                myChartSeller.data.datasets[0].data = aggregates;
                                myChartSeller.update();
                            } else {
                                const chartElement = document.getElementById('chartSellerOrders').getContext('2d');
                                if (myChartSeller) {
                                    myChartSeller.destroy();
                                }

                                myChartSeller = new Chart(chartElement, {
                                    type: 'bar',
                                    data: {
                                        labels: dates,
                                        datasets: [{
                                            label: 'Mouvements des commandes du vendeur',
                                            backgroundColor: 'rgba(255, 99, 132, 0.2)',
                                            borderColor: 'rgba(255, 99, 132, 1)',
                                            data: aggregates,
                                        }]
                                    }
                                });
                            }
                        })
                        .catch(error => console.error('Erreur lors de la récupération des données pour les vendeurs :',
                            error));
                }

                function sellerUpdateMonths(selectedYear) {
                    const allOption = document.createElement('option');
                    allOption.value = 'all';
                    allOption.text = 'Tous les mois';
                    const maxMonth = (selectedYear == currentYear) ? currentMonth : 12;
                    monthSelectForSeller.innerHTML = '';
                    monthSelectForSeller.appendChild(allOption);
                    for (let i = 0; i < maxMonth; i++) {
                        const option = document.createElement('option');
                        option.value = i + 1;
                        option.text = months[i];
                        monthSelectForSeller.appendChild(option);
                    }
                }
            }
        }

        if (isClient) {
            let client_id = @json($user->client->id);
            if (nbr_orders > 0) {
                const yearSelectForClient = document.getElementById('year-select-for-client');
                const monthSelectForClient = document.getElementById('month-select-for-client');

                for (let year = startYear; year <= currentYear; year++) {
                    const option = document.createElement('option');
                    option.value = year;
                    option.text = year;
                    yearSelectForClient.appendChild(option);
                }

                yearSelectForClient.addEventListener('change', function() {
                    clientUpdateMonths(this.value);
                });

                yearSelectForClient.value = currentYear;
                clientUpdateMonths(currentYear);

                fetchClientOrdersData(client_id, yearSelectForClient.value, monthSelectForClient.value);

                // Event listeners for year and month selection
                yearSelectForClient.addEventListener('change', function() {
                    fetchClientOrdersData(client_id, yearSelectForClient.value, monthSelectForClient.value);
                });

                monthSelectForClient.addEventListener('change', function() {
                    fetchClientOrdersData(client_id, yearSelectForClient.value, monthSelectForClient.value);
                });

                function fetchClientOrdersData(client_id, year, month) {
                    const clientOrdersUrl = `/admin/api/orders?client_id=${client_id}&year=${year}&month=${month}`;
                    fetch(clientOrdersUrl)
                        .then(response => response.json())
                        .then(data => {
                            const dates = data.map(item => item.date);
                            const aggregates = data.map(item => item.aggregate);

                            if (myChartClient) {
                                myChartClient.data.labels = dates;
                                myChartClient.data.datasets[0].data = aggregates;
                                myChartClient.update();
                            } else {
                                const chartElement = document.getElementById('chartClientOrders').getContext('2d');
                                if (myChartClient) {
                                    myChartClient.destroy();
                                }

                                myChartClient = new Chart(chartElement, {
                                    type: 'bar',
                                    data: {
                                        labels: dates,
                                        datasets: [{
                                            label: 'Commandes du client',
                                            backgroundColor: 'rgba(54, 162, 235, 0.2)',
                                            borderColor: 'rgba(54, 162, 235, 1)',
                                            data: aggregates,
                                        }]
                                    }
                                });
                            }
                        })
                        .catch(error => console.error('Erreur lors de la récupération des données pour les clients :',
                            error));
                }

                function clientUpdateMonths(selectedYear) {
                    const allOption = document.createElement('option');
                    allOption.value = 'all';
                    allOption.text = 'Tous les mois';
                    const maxMonth = (selectedYear == currentYear) ? currentMonth : 12;
                    monthSelectForClient.innerHTML = '';
                    monthSelectForClient.appendChild(allOption);
                    for (let i = 0; i < maxMonth; i++) {
                        const option = document.createElement('option');
                        option.value = i + 1;
                        option.text = months[i];
                        monthSelectForClient.appendChild(option);
                    }
                }
            }
        }
    </script>
@endsection

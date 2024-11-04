<section class="grid grid-cols-4 w-full p-4 border-gray-200 rounded-xl gap-12">
    <div class="sm:col-span-2 xl:col-span-1 col-span-4">
        <h2 class="text-2xl font-bold mb-4">Informations sur le propriétaire de la boutique</h2>
        <div
            class="bg-white dark:bg-gray-900 shadow-lg dark:shadow-lg dark:shadow-gray-500/20 p-4 mb-4 rounded-lg border dark:border-gray-500 text-center">
            <div class="">
                <div class=" flex justify-center">
                    <img src="{{ isset($owner->image) ? $owner->image : asset('img/profil.jpeg') }}" alt=""
                        class=" w-28 h-28 rounded-full border border-gray-900 dark:border-gray-500 object-cover">
                </div>
            </div>
            <div class="mb-4">
                <h2
                    class="text-4xl mb-2 font-extrabold leading-none tracking-tight text-gray-700 md:text-5xl lg:text-5xl dark:text-white">
                    {{ $owner->first_name }} {{ $owner->last_name }}</h2>
                <p class="text-sm text-gray-400">{{ $owner->user->email }}</p>
            </div>

            <div class=" flex justify-center gap-5 text-center">
                <div>
                    <p class="mb-4 text-lg leading-none tracking-tight text-gray-700 dark:text-white">
                        @if (Cache::has('user-is-online-' . $owner->user->id))
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
            <div class=" text-left flex ">
                <p class="w-1/2">Prénom : </p><span class="font-bold">{{ $owner->first_name }}</span>
            </div>
            <hr class="my-4">
            <div class=" text-left flex ">
                <p class="w-1/2">Nom : </p><span class="font-bold">{{ $owner->last_name }}</span>
            </div>
            <hr class="my-4">
            <div class=" text-left flex ">
                <p class="w-1/2">Genre : </p><span class="font-bold">{{ $owner->sexe }}</span>
            </div>
            <hr class="my-4">
            <div class=" text-left flex ">
                <p class="w-1/2">Email : </p><span class="font-bold">{{ $owner->user->email }}</span>
            </div>
            <hr class="my-4">
            <div class=" text-left flex ">
                <p class="w-1/2">Téléphone : </p>
                <span class="font-bold">
                    {{ $owner->phone }}
                </span>
            </div>
            <hr class="my-4">
            <div class=" text-left flex ">
                <p class="w-1/2">Ville : </p>
                <span class="font-bold">
                    {{ $owner->city->name }}
                </span>
            </div>
            <hr class="my-4">
            <div class=" text-left flex ">
                <p class="w-1/2">Adresse : </p>
                <span class="font-bold">
                    {{ $owner->address }}
                </span>
            </div>
            <hr class="my-4">
            <div class="flex ">
                <p class="w-1/2">
                    Vendeur depuis le :
                </p>
                <span class="font-bold">
                    {{ \Carbon\Carbon::parse($owner->created_at)->locale('fr')->isoFormat('LL') }}
                </span>
            </div>
            <hr class="my-4">
            <div class=" text-left flex ">
                <p class="w-1/2">Nombre des boutiques : </p>
                <span class="font-bold">
                    {{ $owner->shops->count() }}
                </span>
            </div>
            <hr class="my-4">
        </div>
        <hr class="my-4">
    </div>

    <div
        class="sm:col-span-2 xl:col-span-3 col-span-4 border dark:border-gray-500 bg-white dark:bg-gray-900 shadow-lg dark:shadow-lg dark:shadow-gray-500/20 p-4 mb-4 rounded-lg w-full">

        <div class=" flex justify-between mb-4 items-center">
            <h3
                class="text-4xl font-extrabold leading-none tracking-tight text-gray-700 md:text-2xl lg:text-2xl dark:text-white">
                Historique des commandes enregistrées par cette boutique
            </h3>
            @if ($orders->count() > 3)
                <div>
                    <a href="#" class="text-[#e38407] hover:scale-105 transition duration-700 ease-in-out hover:underline">Voir toutes les commandes</a>
                </div>
            @endif
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-[repeat(auto-fit,_minmax(250px,_1fr))] gap-6 mb-10">
            @foreach ($orders->take(3) as $order)
                <a href="#" onclick="showOrderDetails({{ $order->id }})"
                    class="rounded-xl flex justify-between gap-8 items-center border p-2 h-36 w-full shadow-lg dark:shadow-lg dark:shadow-gray-500/20 backdrop-blur-xl bg-cover bg-[#fcdab40a] dark:bg-gray-900 dark:hover:bg-gray-700 hover:bg-[#f8f0e7]  hover:scale-105 transition duration-700 ease-in-out border-l-8 dark:border-[#cc832f] border-[#ff9822] hover:border-l-10 ">
                    <div>
                        <div class=" flex gap-4 items-center mb-4">

                            <h3 class="text-xl font-semibold text-gray-800 dark:text-gray-200">
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
                        <img src="{{ isset($order->image) ? $order->image : asset('img/profil.jpeg') }}" alt=""
                            class=" w-28 rounded-full border border-gray-900 dark:border-gray-500 object-cover">
                    </div>
                </a>
            @endforeach
        </div>
        @if ($orders->count() > 0)
            <div class=" flex justify-between items-center ">
                <div class=" flex gap-4">
                    <div>
                        <a href="" class=" flex items-center">
                            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                viewBox="0 0 24 24">
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
                                <select id="year-select-for-orders"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                </select>
                            </div>

                            <div>
                                <select id="month-select-for-orders"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div>
                <canvas id="chartOrders"></canvas>
            </div>
        @else
            <div class=" flex justify-center items-center w-full h-full">
                <p class=" text-lg font-normal text-gray-500 lg:text-sm  dark:text-gray-400">
                    Aucune commande enregistrée dans cette boutique pour le moment.
                </p>
            </div>
        @endif
    </div>
</section>

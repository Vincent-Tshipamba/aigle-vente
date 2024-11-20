@extends('admin.layouts.app')

@section('content')
    <div class=" mt-4">
        <h1
            class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-700 md:text-5xl lg:text-6xl dark:text-white">
            Tableau de Bord
        </h1>
        <p class="mb-6 text-lg font-normal text-gray-500 lg:text-xl  dark:text-gray-400">
            Supervision Complète : Utilisateurs, Vendeurs, Clients, Produits, Commandes, ...</p>
    </div>

    <section class="grid lg:grid-cols-4 md:grid-cols-2 grid-cols-1 gap-4  h-[calc(100%-1rem)] max-h-full mb-8">
        <!-- Total des utilisateurs enregistrés -->
        <a href="{{ route('admin.users.index') }}"
            class="h-36 items-center border p-2 w-full rounded-lg shadow-lg dark:shadow-lg dark:shadow-gray-500/20 backdrop-blur-xl bg-cover bg-[#fcdab40a] dark:bg-gray-900 dark:hover:bg-gray-700  hover:bg-[#f8f0e7] hover:scale-105 transition duration-700 ease-in-out border-l-8 dark:border-[#cc832f] border-[#ff9822] hover:border-l-10 ">
            <div class=" ">
                <div class="flex gap-4 items-center mb-4">
                    <svg class="text-gray-800 dark:text-white" xmlns="http://www.w3.org/2000/svg" width="48"
                        height="48" viewBox="0 0 100 100">
                        <path fill="currentColor"
                            d="M49.947 0C22.354.03 0 22.406 0 50a50 50 0 0 0 20.404 40.21c-.265-2.031-.213-4.128.117-6.202a45.2 45.2 0 0 1-8.511-9.877h12.445c1.182-1.845 2.4-3.67 4.525-5c-1.245-5.1-2.006-10.716-2.146-16.631h1.346a18.7 18.7 0 0 1 1.93-5h-3.243c.212-5.935 1.043-11.554 2.363-16.63H47.5v8.888a13.8 13.8 0 0 1 5 1.804V30.87h19.195c.26.997.495 2.02.715 3.057a19.8 19.8 0 0 1 5.084-.117a76 76 0 0 0-.639-2.94h13.89a44.8 44.8 0 0 1 3.965 14.028c.58 5.049.591 10.975-1.246 16.771a45 45 0 0 1-2.286 6.478c1.128 1.187 2.494 2.309 3.867 3.454A50 50 0 0 0 100 50c0-27.614-22.386-50-50-50ZM52.5 5.682c5.268.896 10.302 5.236 14.268 12.437c1.278 2.321 2.42 4.927 3.408 7.75H52.5Zm-5 .197v19.99H30.75c.988-2.823 2.13-5.429 3.408-7.75C37.89 11.341 42.571 7.102 47.5 5.88M35.98 7.232c-2.324 2.352-4.41 5.22-6.203 8.475c-1.68 3.05-3.125 6.467-4.312 10.162H12.01c5.535-8.706 13.975-15.37 23.97-18.637m29.41.463c9.398 3.413 17.32 9.868 22.6 18.174H75.455c-1.184-3.695-2.627-7.112-4.307-10.162c-1.676-3.045-3.613-5.749-5.757-8.012M9.257 30.87h14.808c-1.245 5.162-2.008 10.76-2.203 16.631H5.072a44.8 44.8 0 0 1 4.184-16.63M5.072 52.5h16.762c.129 5.856.82 11.454 1.994 16.63H9.256A44.8 44.8 0 0 1 5.072 52.5"
                            color="currentColor" />
                        <path fill="currentColor"
                            d="M76 37.769c-8.285 0-15 6.716-15 15s6.715 15 15 15c8.283 0 15-6.716 15-15s-6.717-15-15-15m0 32.223c-16.57 0-24 7.431-24 24v2c.075 3.94 1.817 4.056 5.5 4h37c4.695-.004 5.532.005 5.5-4v-2c0-16.569-7.432-24-24-24M44 43.39c-6.787 0-12.291 5.504-12.291 12.292c0 6.787 5.504 12.289 12.291 12.289s12.29-5.502 12.29-12.29s-5.503-12.29-12.29-12.29m0 26.401c-13.575 0-19.664 6.09-19.664 19.664v1.639c.062 3.228 1.489 3.323 4.506 3.277h19.123c-.488-8.088 1.901-16.678 7.851-22.139c-3.012-1.646-6.925-2.441-11.816-2.441" />
                    </svg>

                    <h3 class="text-xl font-semibold text-gray-800 dark:text-gray-200 ">
                        Total des utilisateurs enregistrés
                    </h3>
                </div>
                <div>
                    <p class="text-4xl font-bold text-[#ff9822] dark:text-gray-400">
                        {{ $totalUsers }}
                    </p>
                </div>
            </div>
        </a>

        <!-- Total des vendeurs -->
        <a href="{{ route('admin.sellers.index') }}"
            class="  p-2 h-36 w-full items-center border rounded-lg shadow-lg  dark:shadow-gray-500/20 backdrop-blur-xl bg-[#fcdab40a] dark:bg-gray-900 hover:scale-105 transition duration-700 ease-in-out hover:bg-[#f8f0e7] hover:text-black border-l-8 dark:border-[#cc832f] border-[#ff9822] hover:border-l-10 dark:hover:bg-gray-700">
            <div class="flex gap-4 items-center mb-4">
                <svg class=" w-12 h-12 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                    <path fill-rule="evenodd"
                        d="M12 6a3.5 3.5 0 1 0 0 7 3.5 3.5 0 0 0 0-7Zm-1.5 8a4 4 0 0 0-4 4 2 2 0 0 0 2 2h7a2 2 0 0 0 2-2 4 4 0 0 0-4-4h-3Zm6.82-3.096a5.51 5.51 0 0 0-2.797-6.293 3.5 3.5 0 1 1 2.796 6.292ZM19.5 18h.5a2 2 0 0 0 2-2 4 4 0 0 0-4-4h-1.1a5.503 5.503 0 0 1-.471.762A5.998 5.998 0 0 1 19.5 18ZM4 7.5a3.5 3.5 0 0 1 5.477-2.889 5.5 5.5 0 0 0-2.796 6.293A3.501 3.501 0 0 1 4 7.5ZM7.1 12H6a4 4 0 0 0-4 4 2 2 0 0 0 2 2h.5a5.998 5.998 0 0 1 3.071-5.238A5.505 5.505 0 0 1 7.1 12Z"
                        clip-rule="evenodd" />
                </svg>
                <h3 class="text-xl font-semibold text-gray-800 dark:text-gray-200">
                    Total des vendeurs
                </h3>
            </div>
            <div>
                <p class="text-4xl font-bold text-[#ff9822] dark:text-gray-400">
                    {{ $totalVendeurs }}
                </p>
            </div>
        </a>

        <!-- Total des clients -->
        <a href="{{ route('admin.clients.index') }}"
            class="rounded-xl items-center border p-2 h-36 w-full shadow-lg dark:shadow-lg dark:shadow-gray-500/20 backdrop-blur-xl bg-cover bg-[#fcdab40a] dark:bg-gray-900 dark:hover:bg-gray-700 hover:bg-[#f8f0e7]  hover:scale-105 transition duration-700 ease-in-out border-l-8 dark:border-[#cc832f] border-[#ff9822] hover:border-l-10 ">
            <div>
                <div class=" flex gap-4 items-center mb-4">
                    <svg class=" w-12 h-12 text-gray-800 dark:text-white" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                        viewBox="0 0 24 24">
                        <path fill-rule="evenodd"
                            d="M12 6a3.5 3.5 0 1 0 0 7 3.5 3.5 0 0 0 0-7Zm-1.5 8a4 4 0 0 0-4 4 2 2 0 0 0 2 2h7a2 2 0 0 0 2-2 4 4 0 0 0-4-4h-3Zm6.82-3.096a5.51 5.51 0 0 0-2.797-6.293 3.5 3.5 0 1 1 2.796 6.292ZM19.5 18h.5a2 2 0 0 0 2-2 4 4 0 0 0-4-4h-1.1a5.503 5.503 0 0 1-.471.762A5.998 5.998 0 0 1 19.5 18ZM4 7.5a3.5 3.5 0 0 1 5.477-2.889 5.5 5.5 0 0 0-2.796 6.293A3.501 3.501 0 0 1 4 7.5ZM7.1 12H6a4 4 0 0 0-4 4 2 2 0 0 0 2 2h.5a5.998 5.998 0 0 1 3.071-5.238A5.505 5.505 0 0 1 7.1 12Z"
                            clip-rule="evenodd" />
                    </svg>
                    <h3 class="text-xl font-semibold text-gray-800 dark:text-gray-200">
                        Total des clients
                    </h3>
                </div>
                <div class="">
                    <p class="text-4xl font-bold text-[#ff9822] dark:text-gray-400">
                        {{ $totalClients }}
                    </p>
                </div>

            </div>
        </a>

        <!-- Total des produits -->
        <a href="{{ route('admin.products.index') }}"
            class="rounded-xl items-center border p-2 h-36 w-full shadow-lg dark:shadow-lg dark:shadow-gray-500/20 backdrop-blur-xl bg-cover bg-[#fcdab40a] dark:bg-gray-900 dark:hover:bg-gray-700   hover:bg-[#f8f0e7]  hover:scale-105 transition duration-700 ease-in-out border-l-8 dark:border-[#cc832f] border-[#ff9822] hover:border-l-10 ">
            <div>
                <div class=" flex gap-4 items-center mb-4">
                    <svg class="text-gray-800 dark:text-white" xmlns="http://www.w3.org/2000/svg" width="48"
                        height="48" viewBox="0 0 1024 1024">
                        <path fill="currentColor" fill-rule="evenodd"
                            d="M464 144c8.837 0 16 7.163 16 16v304c0 8.836-7.163 16-16 16H160c-8.837 0-16-7.164-16-16V160c0-8.837 7.163-16 16-16zm-52 68H212v200h200zm493.333 87.686c6.248 6.248 6.248 16.379 0 22.627l-181.02 181.02c-6.248 6.248-16.378 6.248-22.627 0l-181.019-181.02c-6.248-6.248-6.248-16.379 0-22.627l181.02-181.02c6.248-6.248 16.378-6.248 22.627 0zm-84.853 11.313L713 203.52L605.52 311L713 418.48zM464 544c8.837 0 16 7.164 16 16v304c0 8.837-7.163 16-16 16H160c-8.837 0-16-7.163-16-16V560c0-8.836 7.163-16 16-16zm-52 68H212v200h200zm452-68c8.837 0 16 7.164 16 16v304c0 8.837-7.163 16-16 16H560c-8.837 0-16-7.163-16-16V560c0-8.836 7.163-16 16-16zm-52 68H612v200h200z" />
                    </svg>
                    <h3 class="text-xl font-semibold text-gray-800 dark:text-gray-200">
                        Total des produits
                    </h3>
                </div>
                <div class="">
                    <p class="text-4xl font-bold text-[#ff9822] dark:text-gray-400">
                        {{ $totalProduits }}
                    </p>
                </div>
            </div>
        </a>
    </section>
    <section class="grid grid-cols-1 md:grid-cols-2 md:p-4 p-1 gap-4 w-full md:inset-0 h-[calc(100%-1rem)] max-h-full mb-8">
        <div
            class=" bg-[#fcdab40a] dark:bg-gray-900 md:p-5 p-1 rounded-lg  w-full shadow-lg dark:shadow-lg dark:shadow-gray-500/20 ">
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
                            <span class="text-gray-800 lg:text-sm  dark:text-gray-200">Générer un rapport</span>
                        </a>
                    </div>
                </div>
                <div>
                    <form class="max-w-sm mx-auto">
                        <div class=" flex items-center gap-4">
                            <div>
                                <select id="year-select"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                </select>
                            </div>

                            <div>
                                <select id="month-select"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div>
                <canvas id="chartClientsByPeriod"></canvas>
            </div>
        </div>

        <div class=" grid grid-cols-1 md:grid-cols-2 gap-4 rounded-lg shadow-lg dark:shadow-lg dark:shadow-gray-500/20 backdrop-blur-xl bg-[#fcdab40a] dark:bg-gray-900 w-full">
            <div class=" w-full">
                <div class=" m-4 ">
                    <canvas id="chartClientsSellers"></canvas>
                </div>
            </div>
            <div class=" w-full">
                <div class=" m-4 ">
                    <canvas id="chartClientsByGender"></canvas>
                </div>
            </div>
        </div>
    </section>
    <section class="rounded-lg shadow-lg dark:shadow-lg dark:shadow-gray-500/20 backdrop-blur-xl bg-[#fcdab40a] dark:bg-gray-900">
        <h3 class="text-xl font-semibold text-gray-800 dark:text-gray-200 p-4">
            Dernières commandes enregistrées par le système
        </h3>
        <div class="card p-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table border="1" id="orders-table" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>
                                    <span class="flex items-center">
                                        #
                                        <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                                        </svg>
                                    </span>
                                </th>
                                <th>
                                    <span class="flex items-center">
                                        Client
                                        <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                                        </svg>
                                    </span>
                                </th>
                                <th>
                                    <span class="flex items-center">
                                        Produit
                                        <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                                        </svg>
                                    </span>
                                </th>
                                <th>
                                    <span class="flex items-center">
                                        Quantité
                                        <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                                        </svg>
                                    </span>
                                </th>
                                <th>
                                    <span class="flex items-center">
                                        Prix
                                        <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                                        </svg>
                                    </span>
                                </th>
                                <th>
                                    <span class="flex items-center">
                                        Total
                                        <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                                        </svg>
                                    </span>
                                </th>
                                <th>
                                    <span class="flex items-center">
                                        Statut
                                        <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                                        </svg>
                                    </span>
                                </th>
                                <th>
                                    <span class="flex items-center">
                                        Date
                                        <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                                        </svg>
                                    </span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($recentOrders as $key => $order)
                                <tr
                                    class="hover:bg-[#f0e6d9] hover:scale-100 hover:cursor-pointer transition-all duration-300 ease-in-out">
                                    @php
                                        $total = 0;
                                    @endphp
                                    <td>{{ $key + 1 }}</td>
                                    <td class="flex items-center px-6 py-4 hover:cursor-pointer hover:underline hover:text-[#e38407] hover:font-bold hover:scale-105 transition-all duration-300 ease-in-out"
                                        onclick="window.location.href='{{ route('admin.users.show', $order->client->user->id) }}'">
                                        <img class="w-10 h-10 rounded-full"
                                            src="{{ $order->client->image ?? asset('img/profil.jpeg') }}" alt="">
                                        <div class="ps-3">
                                            <div class="text-base font-semibold">{{ $order->client->first_name }}
                                                {{ $order->client->last_name }}</div>
                                            <div class="font-normal text-gray-500">{{ $order->client->user->email }}</div>
                                        </div>
                                    </td>
                                    <td>
                                        @foreach ($order->products as $product)
                                            {{ $product->name }}<br>
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach ($order->products as $product)
                                            {{ $product->pivot->quantity }}<br>
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach ($order->products as $product)
                                            {{ $product->unit_price }}<br>
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach ($order->products as $product)
                                            {{ $product->pivot->quantity * $product->unit_price }}<br>
                                        @endforeach
                                    </td>
                                    <td>{{ $order->status }}</td>
                                    <td>{{ $order->created_at->format('d/m/Y') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script>
        if (document.getElementById("orders-table") && typeof simpleDatatables.DataTable !== 'undefined') {
            const exportCustomCSV = function(dataTable, userOptions = {}) {
                // A modified CSV export that includes a row of minuses at the start and end.
                const clonedUserOptions = {
                    ...userOptions
                }
                clonedUserOptions.download = false
                const csv = simpleDatatables.exportCSV(dataTable, clonedUserOptions)
                // If CSV didn't work, exit.
                if (!csv) {
                    return false
                }
                const defaults = {
                    download: true,
                    lineDelimiter: "\n",
                    columnDelimiter: ";"
                }
                const options = {
                    ...defaults,
                    ...clonedUserOptions
                }
                const separatorRow = Array(dataTable.data.headings.filter((_heading, index) => !dataTable.columns
                        .settings[index]?.hidden).length)
                    .fill("+")
                    .join("+"); // Use "+" as the delimiter

                const str = separatorRow + options.lineDelimiter + csv + options.lineDelimiter + separatorRow;

                if (userOptions.download) {
                    // Create a link to trigger the download
                    const link = document.createElement("a");
                    link.href = encodeURI("data:text/csv;charset=utf-8," + str);
                    link.download = (options.filename || "datatable_export") + ".txt";
                    // Append the link
                    document.body.appendChild(link);
                    // Trigger the download
                    link.click();
                    // Remove the link
                    document.body.removeChild(link);
                }

                return str
            }
            const dataTable = new simpleDatatables.DataTable("#orders-table", {
                searchable: true,
                sortable: true,
                template: (options, dom) => "<div class='" + options.classes.top + "'>" +
                    "<div class='flex flex-col sm:flex-row sm:items-center space-y-4 sm:space-y-0 sm:space-x-3 rtl:space-x-reverse w-full sm:w-auto'>" +
                    (options.paging && options.perPageSelect ?
                        "<div class='" + options.classes.dropdown + "'>" +
                        "<label>" +
                        "<select class='" + options.classes.selector + "'></select> " + options.labels.perPage +
                        "</label>" +
                        "</div>" : ""
                    ) +
                    "<button id='exportDropdownButton' data-dropdown-toggle='exportDropdown' type='button' class='flex w-full items-center justify-center rounded-lg border border-gray-200 bg-white px-3 py-2 text-sm font-medium text-gray-900 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-100 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white dark:focus:ring-gray-700 sm:w-auto'>" +
                    "Export as" +
                    "<svg class='-me-0.5 ms-1.5 h-4 w-4' aria-hidden='true' xmlns='http://www.w3.org/2000/svg' width='24' height='24' fill='none' viewBox='0 0 24 24'>" +
                    "<path stroke='currentColor' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='m19 9-7 7-7-7' />" +
                    "</svg>" +
                    "</button>" +
                    "<div id='exportDropdown' class='z-10 hidden w-52 divide-y divide-gray-100 rounded-lg bg-white shadow dark:bg-gray-700' data-popper-placement='bottom'>" +
                    "<ul class='p-2 text-left text-sm font-medium text-gray-500 dark:text-gray-400' aria-labelledby='exportDropdownButton'>" +
                    "<li>" +
                    "<button id='export-csv' class='group inline-flex w-full items-center rounded-md px-3 py-2 text-sm text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white'>" +
                    "<svg class='me-1.5 h-4 w-4 text-gray-400 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white' aria-hidden='true' xmlns='http://www.w3.org/2000/svg' width='24' height='24' fill='currentColor' viewBox='0 0 24 24'>" +
                    "<path fill-rule='evenodd' d='M9 2.221V7H4.221a2 2 0 0 1 .365-.5L8.5 2.586A2 2 0 0 1 9 2.22ZM11 2v5a2 2 0 0 1-2 2H4a2 2 0 0 0-2 2v7a2 2 0 0 0 2 2 2 2 0 0 0 2 2h12a2 2 0 0 0 2-2 2 2 0 0 0 2-2v-7a2 2 0 0 0-2-2V4a2 2 0 0 0-2-2h-7Zm1.018 8.828a2.34 2.34 0 0 0-2.373 2.13v.008a2.32 2.32 0 0 0 2.06 2.497l.535.059a.993.993 0 0 0 .136.006.272.272 0 0 1 .263.367l-.008.02a.377.377 0 0 1-.018.044.49.49 0 0 1-.078.02 1.689 1.689 0 0 1-.297.021h-1.13a1 1 0 1 0 0 2h1.13c.417 0 .892-.05 1.324-.279.47-.248.78-.648.953-1.134a2.272 2.272 0 0 0-2.115-3.06l-.478-.052a.32.32 0 0 1-.285-.341.34.34 0 0 1 .344-.306l.94.02a1 1 0 1 0 .043-2l-.943-.02h-.003Zm7.933 1.482a1 1 0 1 0-1.902-.62l-.57 1.747-.522-1.726a1 1 0 0 0-1.914.578l1.443 4.773a1 1 0 0 0 1.908.021l1.557-4.773Zm-13.762.88a.647.647 0 0 1 .458-.19h1.018a1 1 0 1 0 0-2H6.647A2.647 2.647 0 0 0 4 13.647v1.706A2.647 2.647 0 0 0 6.647 18h1.018a1 1 0 1 0 0-2H6.647A.647.647 0 0 1 6 15.353v-1.706c0-.172.068-.336.19-.457Z' clip-rule='evenodd'/>" +
                    "</svg>" +
                    "<span>Export CSV</span>" +
                    "</button>" +
                    "</li>" +
                    "<li>" +
                    "<button id='export-json' class='group inline-flex w-full items-center rounded-md px-3 py-2 text-sm text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white'>" +
                    "<svg class='me-1.5 h-4 w-4 text-gray-400 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white' aria-hidden='true' xmlns='http://www.w3.org/2000/svg' width='24' height='24' fill='currentColor' viewBox='0 0 24 24'>" +
                    "<path fill-rule='evenodd' d='M9 2.221V7H4.221a2 2 0 0 1 .365-.5L8.5 2.586A2 2 0 0 1 9 2.22ZM11 2v5a2 2 0 0 1-2 2H4v11a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2h-7Zm-.293 9.293a1 1 0 0 1 0 1.414L9.414 14l1.293 1.293a1 1 0 0 1-1.414 1.414l-2-2a1 1 0 0 1 0-1.414l2-2a1 1 0 0 1 1.414 0Zm2.586 1.414a1 1 0 0 1 1.414-1.414l2 2a1 1 0 0 1 0 1.414l-2 2a1 1 0 0 1-1.414-1.414L14.586 14l-1.293-1.293Z' clip-rule='evenodd'/>" +
                    "</svg>" +
                    "<span>Export JSON</span>" +
                    "</button>" +
                    "</li>" +
                    "<li>" +
                    "<button id='export-txt' class='group inline-flex w-full items-center rounded-md px-3 py-2 text-sm text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white'>" +
                    "<svg class='me-1.5 h-4 w-4 text-gray-400 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white' aria-hidden='true' xmlns='http://www.w3.org/2000/svg' width='24' height='24' fill='currentColor' viewBox='0 0 24 24'>" +
                    "<path fill-rule='evenodd' d='M9 2.221V7H4.221a2 2 0 0 1 .365-.5L8.5 2.586A2 2 0 0 1 9 2.22ZM11 2v5a2 2 0 0 1-2 2H4v11a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2h-7ZM8 16a1 1 0 0 1 1-1h6a1 1 0 1 1 0 2H9a1 1 0 0 1-1-1Zm1-5a1 1 0 1 0 0 2h6a1 1 0 1 0 0-2H9Z' clip-rule='evenodd'/>" +
                    "</svg>" +
                    "<span>Export TXT</span>" +
                    "</button>" +
                    "</li>" +
                    "<li>" +
                    "<button id='export-sql' class='group inline-flex w-full items-center rounded-md px-3 py-2 text-sm text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white'>" +
                    "<svg class='me-1.5 h-4 w-4 text-gray-400 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white' aria-hidden='true' xmlns='http://www.w3.org/2000/svg' width='24' height='24' fill='currentColor' viewBox='0 0 24 24'>" +
                    "<path d='M12 7.205c4.418 0 8-1.165 8-2.602C20 3.165 16.418 2 12 2S4 3.165 4 4.603c0 1.437 3.582 2.602 8 2.602ZM12 22c4.963 0 8-1.686 8-2.603v-4.404c-.052.032-.112.06-.165.09a7.75 7.75 0 0 1-.745.387c-.193.088-.394.173-.6.253-.063.024-.124.05-.189.073a18.934 18.934 0 0 1-6.3.998c-2.135.027-4.26-.31-6.3-.998-.065-.024-.126-.05-.189-.073a10.143 10.143 0 0 1-.852-.373 7.75 7.75 0 0 1-.493-.267c-.053-.03-.113-.058-.165-.09v4.404C4 20.315 7.037 22 12 22Zm7.09-13.928a9.91 9.91 0 0 1-.6.253c-.063.025-.124.05-.189.074a18.935 18.935 0 0 1-6.3.998c-2.135.027-4.26-.31-6.3-.998-.065-.024-.126-.05-.189-.074a10.163 10.163 0 0 1-.852-.372 7.816 7.816 0 0 1-.493-.268c-.055-.03-.115-.058-.167-.09V12c0 .917 3.037 2.603 8 2.603s8-1.686 8-2.603V7.596c-.052.031-.112.059-.165.09a7.816 7.816 0 0 1-.745.386Z'/>" +
                    "</svg>" +
                    "<span>Export SQL</span>" +
                    "</button>" +
                    "</li>" +
                    "</ul>" +
                    "</div>" + "</div>" +
                    (options.searchable ?
                        "<div class='" + options.classes.search + "'>" +
                        "<input class='" + options.classes.input + "' placeholder='" + options.labels.placeholder +
                        "' type='search' title='" + options.labels.searchTitle + "'" + (dom.id ?
                            " aria-controls='" + dom.id + "'" : "") + ">" +
                        "</div>" : ""
                    ) +
                    "</div>" +
                    "<div class='" + options.classes.container + "'" + (options.scrollY.length ?
                        " style='height: " + options.scrollY + "; overflow-Y: auto;'" : "") + "></div>" +
                    "<div class='" + options.classes.bottom + "'>" +
                    (options.paging ?
                        "<div class='" + options.classes.info + "'></div>" : ""
                    ) +
                    "<nav class='" + options.classes.pagination + "'></nav>" +
                    "</div>"
            })


            const $exportButton = document.getElementById("exportDropdownButton");
            const $exportDropdownEl = document.getElementById("exportDropdown");

            document.getElementById("export-csv").addEventListener("click", () => {
                simpleDatatables.exportCSV(dataTable, {
                    download: true,
                    lineDelimiter: "\n",
                    columnDelimiter: ";"
                })
            })
            document.getElementById("export-sql").addEventListener("click", () => {
                simpleDatatables.exportSQL(dataTable, {
                    download: true,
                    tableName: "export_table"
                })
            })
            document.getElementById("export-txt").addEventListener("click", () => {
                simpleDatatables.exportTXT(dataTable, {
                    download: true
                })
            })
            document.getElementById("export-json").addEventListener("click", () => {
                simpleDatatables.exportJSON(dataTable, {
                    download: true,
                    space: 3
                })
            })
        }
    </script>
    <script>
        const currentYear = new Date().getFullYear();
        const currentMonth = new Date().getMonth() + 1;
        const startYear = 2022;
        const yearSelect = document.getElementById('year-select');
        const monthSelect = document.getElementById('month-select');

        for (let year = startYear; year <= currentYear; year++) {
            const option = document.createElement('option');
            option.value = year;
            option.text = year;
            yearSelect.appendChild(option);
        }

        const months = [
            'Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin',
            'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'
        ];

        function updateMonths(selectedYear) {
            monthSelect.innerHTML = '';
            const allOption = document.createElement('option');
            allOption.value = 'all';
            allOption.text = 'Tous les mois';
            monthSelect.appendChild(allOption);
            const maxMonth = (selectedYear == currentYear) ? currentMonth : 12;


            for (let i = 0; i < maxMonth; i++) {
                const option = document.createElement('option');
                option.value = i + 1;
                option.text = months[i];
                monthSelect.appendChild(option);
            }
        }

        yearSelect.addEventListener('change', function() {
            updateMonths(this.value);
        });


        yearSelect.value = currentYear;
        updateMonths(currentYear);
    </script>


    <!-- Graphique des clients et des vendeurs -->
    <script>
        const chartClientsSellersData = {
            labels: ['Clients', 'Vendeurs'],
            datasets: [{
                label: 'Total',
                data: [
                    {{ $totalClients }},
                    {{ $totalVendeurs }}
                ],
                backgroundColor: [
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(227, 132, 7, 0.2)'
                ],
                borderColor: [
                    'rgba(54, 162, 235, 1)',
                    'rgba(227, 132, 7, 1)'
                ],
                borderWidth: 1
            }]
        };

        const chartClientsSellersConfig = {
            type: 'doughnut',
            data: chartClientsSellersData,
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    title: {
                        display: true,
                        text: 'Total des Vendeurs et des Clients'
                    }
                }
            },
        };

        const chartClientsSellers = new Chart(
            document.getElementById('chartClientsSellers'),
            chartClientsSellersConfig
        );
    </script>

    <!-- Graphique des clients par genre -->
    <script>
        const chartClientsByGenderData = {
            labels: ['Hommes', 'Femmes'],
            datasets: [{
                label: 'Total',
                data: [
                    {{ $totalClientsMales }},
                    {{ $totalClientsFemales }}
                ],
                backgroundColor: [
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(227, 132, 7, 0.2)'
                ],
                borderColor: [
                    'rgba(54, 162, 235, 1)',
                    'rgba(227, 132, 7, 1)'
                ],
                borderWidth: 1
            }]
        };

        const chartClientsByGenderConfig = {
            type: 'doughnut',
            data: chartClientsByGenderData,
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    title: {
                        display: true,
                        text: 'Total des clients par genre'
                    }
                }
            },
        };

        const chartClientsByGender = new Chart(
            document.getElementById('chartClientsByGender'),
            chartClientsByGenderConfig
        );
    </script>

    <!-- Graphique des clients par période -->
    <script>
        let myChart;

        function fetchChartData(year, month) {
            let url = `/admin/api/clients?year=${year}`;
            if (month !== "all") {
                url += `&month=${month}`;
            }

            fetch(url)
                .then(response => response.json())
                .then(data => {
                    const dates = data.map(item => item.date);
                    const aggregates = data.map(item => item.aggregate);

                    // Mettre à jour le graphique avec les nouvelles données
                    if (myChart) {
                        myChart.data.labels = dates;
                        myChart.data.datasets[0].data = aggregates;
                        myChart.update();
                    } else {
                        const chartClientsByPeriod = document.getElementById('chartClientsByPeriod').getContext('2d');
                        myChart = new Chart(chartClientsByPeriod, {
                            type: 'bar',
                            data: {
                                labels: dates,
                                datasets: [{
                                    label: 'Période de Création de clients',
                                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                                    borderColor: 'rgba(54, 162, 235, 1)',
                                    data: aggregates,
                                }]
                            }
                        });
                    }
                })
                .catch(error => console.error('Erreur lors de la récupération des données :', error));
        }

        // Événements pour mettre à jour le graphique lors de la sélection de l'année ou du mois
        yearSelect.addEventListener('change', function() {
            fetchChartData(yearSelect.value, monthSelect.value);
        });

        monthSelect.addEventListener('change', function() {
            fetchChartData(yearSelect.value, monthSelect.value);
        });

        // Initialiser avec l'année et le mois par défaut
        fetchChartData(yearSelect.value, monthSelect.value);
    </script>
@endsection

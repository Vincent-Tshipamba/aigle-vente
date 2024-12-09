@extends('seller.layouts.app')

@section('content')
    <div class="card bg-bg-chart rounded-lg shadow-lg p-4">
        <div class="grid grid-cols-1 sm:grid-cols-[repeat(auto-fit,_minmax(250px,_1fr))] gap-4">

            <a href="">
                <div class="col bg-custom-dark p-4 rounded-lg shadow hover:bg-[#25252510]">
                    <div class="flex items-center">
                        <h5 class="dark:text-white text-4xl text-black">{{ $totalRevenue }}</h5>
                        <div class="ml-auto">
                            <i class='bx bx-group text-3xl text-white'></i>
                        </div>
                    </div>
                    <div class="w-full bg-gray-700 rounded-full h-1.5 my-3">
                        <div class="bg-blue-500 h-1.5 rounded-full" style="width: 55%"></div>
                    </div>
                    <div class="flex items-center dark:text-white text-black">
                        <p class="text-sm">Total Revenue</p>
                    </div>
                </div>
            </a>
            <a href="{{ route('shops.index') }}">
                <div class="col hover:bg-[#25252510] p-4 rounded-lg shadow bg-custom-dark">
                    <div class="flex items-center">
                        <h5 class="dark:text-white text-4xl text-black">{{ $totalShops }}</h5>
                        <div class="ml-auto">
                            <i class='bx bx-dollar text-3xl dark:text-white text-black'></i>
                        </div>
                    </div>
                    <div class="w-full bg-gray-700 rounded-full h-1.5 my-3">
                        <div class="bg-green-500 h-1.5 rounded-full" style="width: 55%"></div>
                    </div>
                    <div class="flex items-center dark:text-white text-black">
                        <p class="text-sm">Total Shops</p>
                    </div>
                </div>
            </a>
            <a href="">
                <div class="col hover:bg-[#25252510] p-4 rounded-lg shadow bg-custom-dark">
                    <div class="flex items-center">
                        <h5 class="dark:text-white text-4xl text-black">{{ $totalOrders }}</h5>
                        <div class="ml-auto">
                            <i class='bx bx-group text-3xl text-white'></i>
                        </div>
                    </div>
                    <div class="w-full bg-gray-700 rounded-full h-1.5 my-3">
                        <div class="bg-red-500 h-1.5 rounded-full" style="width: 55%"></div>
                    </div>
                    <div class="flex items-center dark:text-white text-black">
                        <p class="text-sm">Total Sellers</p>
                    </div>
                </div>
            </a>
            <a href="">
                <div class="col hover:bg-[#25252510] p-4 rounded-lg shadow bg-custom-dark">
                    <div class="flex items-center">
                        <h5 class="dark:text-white text-4xl text-black">{{ $totalProducts }}</h5>
                        <div class="ml-auto">
                            <i class='bx bx-group text-3xl text-white'></i>
                        </div>
                    </div>
                    <div class="w-full bg-gray-700 rounded-full h-1.5 my-3">
                        <div class="bg-yellow-500 h-1.5 rounded-full" style="width: 55%"></div>
                    </div>
                    <div class="flex items-center dark:text-white text-black">
                        <p class="text-sm">Total Orders</p>
                    </div>
                </div>
            </a>
        </div>
    </div>


    <div class="card bg-bg-chart rounded-lg shadow-lg p-4 my-4">
        <canvas id="monthlySalesChart"></canvas>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('monthlySalesChart').getContext('2d');
        const monthlySalesChart = new Chart(ctx, {
            type: 'line', // Vous pouvez changer cela en 'bar' ou 'pie' si nécessaire
            data: {
                labels: {!! json_encode($months) !!}, // Étiquettes des mois
                datasets: [{
                    label: 'Total Orders', // Changez cela si vous souhaitez afficher les ventes ou d'autres métriques
                    data: {!! json_encode($ordersCount) !!}, // Nombre de commandes
                    borderColor: 'rgba(75, 192, 192, 1)',
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderWidth: 2,
                    fill: true, // Si vous souhaitez remplir la zone sous la ligne
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@endsection

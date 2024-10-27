@extends('seller.layouts.app')

@section('content')
    <div class="card bg-bg-chart rounded-lg shadow-lg p-4">
        <div class="grid grid-cols-1 sm:grid-cols-[repeat(auto-fit,_minmax(250px,_1fr))] gap-4">

            <a href="">
                <div class="col bg-custom-dark p-4 rounded-lg shadow hover:bg-gray-900">
                    <div class="flex items-center">
                        <h5 class="text-white text-lg">{{ $totalRevenue }}</h5>
                        <div class="ml-auto">
                            <i class='bx bx-group text-3xl text-white'></i>
                        </div>
                    </div>
                    <div class="w-full bg-gray-700 rounded-full h-1.5 my-3">
                        <div class="bg-blue-500 h-1.5 rounded-full" style="width: 55%"></div>
                    </div>
                    <div class="flex items-center text-white">
                        <p class="text-sm">Total Revenue</p>
                    </div>
                </div>
            </a>
            <a href="">
                <div class="col hover:bg-gray-900 p-4 rounded-lg shadow bg-custom-dark">
                    <div class="flex items-center">
                        <h5 class="text-white text-lg">{{ $totalShops }}</h5>
                        <div class="ml-auto">
                            <i class='bx bx-dollar text-3xl text-white'></i>
                        </div>
                    </div>
                    <div class="w-full bg-gray-700 rounded-full h-1.5 my-3">
                        <div class="bg-green-500 h-1.5 rounded-full" style="width: 55%"></div>
                    </div>
                    <div class="flex items-center text-white">
                        <p class="text-sm">Total Shops</p>
                    </div>
                </div>
            </a>
            <a href="">
                <div class="col hover:bg-gray-900 p-4 rounded-lg shadow bg-custom-dark">
                    <div class="flex items-center">
                        <h5 class="text-white text-lg">{{ $totalSellers }}</h5>
                        <div class="ml-auto">
                            <i class='bx bx-group text-3xl text-white'></i>
                        </div>
                    </div>
                    <div class="w-full bg-gray-700 rounded-full h-1.5 my-3">
                        <div class="bg-red-500 h-1.5 rounded-full" style="width: 55%"></div>
                    </div>
                    <div class="flex items-center text-white">
                        <p class="text-sm">Total Sellers</p>
                    </div>
                </div>
            </a>
            <a href="">
                <div class="col hover:bg-gray-900 p-4 rounded-lg shadow bg-custom-dark">
                    <div class="flex items-center">
                        <h5 class="text-white text-lg">{{ $totalOrders }}</h5>
                        <div class="ml-auto">
                            <i class='bx bx-group text-3xl text-white'></i>
                        </div>
                    </div>
                    <div class="w-full bg-gray-700 rounded-full h-1.5 my-3">
                        <div class="bg-yellow-500 h-1.5 rounded-full" style="width: 55%"></div>
                    </div>
                    <div class="flex items-center text-white">
                        <p class="text-sm">Total Orders</p>
                    </div>
                </div>
            </a>
        </div>
    </div>
@endsection

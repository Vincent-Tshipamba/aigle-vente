@extends('seller.layouts.app')

@section('content')
<div class="container mx-auto mt-5 text-gray-700 dark:text-gray-200">
    <h1 class="text-2xl font-bold mb-4">mouvements de stock  {{ $product->name }}</h1>

    @if (session('success'))
        <div class="bg-green-100 text-green-800 p-4 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="p-4 bg-white dark:bg-gray-700 shadow rounded">
        <h2 class="text-lg font-bold mb-2">Stock actuel : {{ $stocks->quantity ?? 0 }}</h2>
        <p >Prix unitaire : ${{ number_format($product->unit_price, 2) }}</p>

        <form method="POST" action="{{ route('products.manageStock', $product) }}" class="mt-4">
            @csrf
            <div class="mb-4">
                <label for="type" class="mb-3 block text-sm font-medium text-black dark:text-white">Type de mouvement :</label>
                <select name="type" id="type" class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary">
                    <option value="add">Ajouter</option>
                    <option value="remove">Retirer</option>
                </select>
            </div>

            <div class="mb-4">
                <label for="quantity" class="mb-3 block text-sm font-medium text-black dark:text-white">Quantité :</label>
                <input type="number" id="quantity" name="quantity" min="1" class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary">
            </div>

            <div class="mb-4">
                <label for="reason" class="mb-3 block text-sm font-medium text-black dark:text-white">Raison :</label>
                <input type="text" id="reason" name="reason" class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary">
            </div>

            <button type="submit" class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:focus:ring-yellow-900">
                Mettre à jour le stock
            </button>
        </form>
    </div>
</div>
@endsection

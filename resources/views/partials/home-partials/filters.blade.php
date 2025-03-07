@props(['categories', 'products', 'localSellers', 'internationalSellers'])
<div id="drawer-navigation"
    class="fixed top-0 left-0 z-40 w-64 h-screen p-4 overflow-y-auto transition-transform -translate-x-full bg-white dark:bg-gray-800"
    tabindex="-1" aria-labelledby="drawer-navigation-label">
    <h5 id="drawer-navigation-label" class="text-base font-semibold text-gray-500 uppercase dark:text-gray-400">Filtres
        de recherche</h5>
    <button type="button" data-drawer-hide="drawer-navigation" aria-controls="drawer-navigation"
        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 absolute top-2.5 end-2.5 inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white">
        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
            xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd"
                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                clip-rule="evenodd"></path>
        </svg>
        <span class="sr-only">Fermer le menu</span>
    </button>
    <div class="py-4">
        <h6 class="text-sm font-semibold text-gray-900 dark:text-white">Catégorie de produit</h6>
        <ul class="space-y-2">
            @foreach ($categories as $item)
                <li>
                    <label class="flex items-center">
                        <input type="checkbox" id="{{ $item->id }}" value="{{ $item->id }}"
                            class="category-checkbox-in-filter-modal mr-2">
                        {{ $item->name }} ({{ $item->products->count() }})
                    </label>
                </li>
            @endforeach
        </ul>

        <h6 class="mt-4 text-sm font-semibold text-gray-900 dark:text-white">Vendeur</h6>
        <ul class="space-y-2">
            <li>
                <label class="flex items-center">
                    <input type="checkbox" class="mr-2 location-checkbox" value="localSellers">
                    Vendeurs locaux ({{ $localSellers }})
                </label>
            </li>
            <li>
                <label class="flex items-center"><input type="checkbox" class="mr-2 location-checkbox"
                        value="internationalSellers">
                    Vendeurs internationaux ({{ $internationalSellers }})
                </label>
            </li>
        </ul>

        <h6 class="mt-4 text-sm font-semibold text-gray-900 dark:text-white">Plage de prix</h6>
        <div class="space-y-2">
            <label class="block text-sm text-gray-600 dark:text-gray-300">
                Prix minimum : <span id="min-price-value">0</span> $
            </label>
            <input type="range" id="min-price" class="w-full" min="0" max="1000" value="0" step="1">

            <label class="block text-sm text-gray-600 dark:text-gray-300 mt-2">
                Prix maximum : <span id="max-price-value">1000</span> $
            </label>
            <input type="range" id="max-price" class="w-full" min="0" max="1000" value="1000" step="1">
        </div>

        <button id="apply-filters" class="mt-6 w-full bg-gray-900 text-white py-2 rounded-lg hover:bg-gray-700">
            Afficher les résultats
        </button>
    </div>
</div>

<script>
    // Script pour afficher les valeurs des curseurs
    const minPriceRange = document.getElementById("min-price");
    const maxPriceRange = document.getElementById("max-price");
    const minPriceValue = document.getElementById("min-price-value");
    const maxPriceValue = document.getElementById("max-price-value");

    // Initialiser les valeurs
    minPriceValue.textContent = minPriceRange.value;
    maxPriceValue.textContent = maxPriceRange.value;

    // Mettre à jour les valeurs lorsque les curseurs sont modifiés
    minPriceRange.addEventListener("input", function () {
        minPriceValue.textContent = minPriceRange.value;
    });
    maxPriceRange.addEventListener("input", function () {
        maxPriceValue.textContent = maxPriceRange.value;
    });
</script>

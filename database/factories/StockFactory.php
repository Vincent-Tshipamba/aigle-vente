<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class StockFactory extends Factory
{
    protected $model = \App\Models\Stock::class;

    // Stocker les IDs de produits disponibles
    protected static $availableProductIds = null;

    public function definition()
    {
        // Charger les IDs de produits disponibles si ce n'est pas déjà fait
        if (is_null(self::$availableProductIds)) {
            self::$availableProductIds = Product::pluck('id')->toArray();
        }

        // Vérifier qu'il reste des IDs disponibles
        if (empty(self::$availableProductIds)) {
            throw new \Exception('No more unique product IDs available for stocks.');
        }

        // Sélectionner un ID aléatoire et le retirer du tableau
        $productIdKey = array_rand(self::$availableProductIds);
        $productId = self::$availableProductIds[$productIdKey];
        unset(self::$availableProductIds[$productIdKey]);

        return [
            'product_id' => $productId,
            'quantity' => $this->faker->numberBetween(1, 1000),
        ];
    }
}
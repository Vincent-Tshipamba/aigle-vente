<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductState extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
    ];

    /**
     * Relation avec les produits.
     */
    public function products()
    {
        return $this->hasMany(Product::class, 'product_state_id');
    }
}
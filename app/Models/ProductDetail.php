<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'weight',
        'dimensions',
        'color',
        'size',
        'model',
        'shipping',
        'care',
        'brand',
    ];

    /**
     * Relation avec le produit.
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}

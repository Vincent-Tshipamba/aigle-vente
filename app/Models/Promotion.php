<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'discount_percentage',
        'promotion_duration',
        'status',
    ];

    // Relation avec le modèle Product
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}

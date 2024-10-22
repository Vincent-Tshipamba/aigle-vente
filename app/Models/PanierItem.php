<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PanierItem extends Model
{
    /** @use HasFactory<\Database\Factories\PanierItemFactory> */
    use HasFactory;

    protected $fillable = ['panier_id', 'product_id', 'quantity'];

    public static function boot()
    {
        parent::boot();

        static::creating(
            function ($panier) {
                $panier->_id = (string) Str::uuid();
            }
        );
    }

    public function panier(): BelongsTo
    {
        return $this->belongsTo(Panier::class);
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
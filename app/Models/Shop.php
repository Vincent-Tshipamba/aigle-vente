<?php

namespace App\Models;

use Illuminate\Support\Str;
use App\Models\ShopCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Shop extends Model
{
    /** @use HasFactory<\Database\Factories\ShopFactory> */
    use HasFactory;

    protected $fillable = [
        '_id',
        'name',
        'address',
        'seller_id',
        'description',
        'image',
        'is_active'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->_id = (string) Str::uuid();
        });
    }

    public function seller(): BelongsTo
    {
        return $this->belongsTo(Seller::class);
    }


    // Dans le modèle Seller
    public function shops()
    {
        return $this->hasMany(Shop::class);
    }


    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    public function category()
    {
        return $this->belongsTo(ShopCategory::class);
    }

}
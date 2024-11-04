<?php

namespace App\Models;

use Database\Seeders\OrderSeeder;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        '_id',
        'name',
        'unit_price',
        'category_product_id', // Assurez-vous d'utiliser le bon nom ici
        'shop_id',
        'description'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->_id = (string) Str::uuid();
        });
    }

    public function shop(): BelongsTo
    {
        return $this->belongsTo(Shop::class);
    }

    public function stocks(): HasMany
    {
        return $this->hasMany(Stock::class);
    }

    public function category_product(): BelongsTo
    {
        return $this->belongsTo(CategoryProduct::class);
    }

    public function orders(): BelongsToMany
    {
        return $this->belongsToMany(Order::class, 'order_products', 'product_id', 'order_id');
    }

    public function paniers(): BelongsToMany
    {
        return $this->belongsToMany(Panier::class, 'panier_items', 'product_id', 'panier_id')->withPivot('quantity');
    }

    public function photos(): HasMany
    {
        return $this->hasMany(Photo::class);
    }

    public function promotions()
    {
        return $this->hasMany(Promotion::class);
    }


}

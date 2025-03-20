<?php

namespace App\Models;

use App\Models\Review;
use Illuminate\Support\Str;
use Database\Seeders\OrderSeeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
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
        'category_product_id',
        'shop_id',
        'description',
        'is_active',
        'product_state_id'
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

    public function stocks(): HasOne
    {
        return $this->hasOne(Stock::class);
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

    public function wishlist(): HasMany
    {
        return $this->hasMany((Wishlist::class));
    }

    public function details()
    {
        return $this->hasOne(ProductDetail::class);
    }

    public function state()
    {
        return $this->belongsTo(ProductState::class);
    }

    public function stockMovements(): HasMany
    {
        return $this->hasMany(StockMovement::class);
    }

    public function recordStockMovement(string $type, int $quantity, string $reason, int $performedBy,int $shop): void
    {
        $this->stockMovements()->create(attributes: [
            'product_id' => $this->id,
            'type' => $type,
            'quantity' => $quantity,
            'raison' => $reason,
            'performed_by' => $performedBy,
            'shop_id' => $shop,
        ]);

        $stock = $this->stocks()->firstOrCreate(['product_id' => $this->id]);
        if ($type === 'add') {
            $stock->quantity += $quantity;
        } elseif ($type === 'remove') {
            $stock->quantity -= $quantity;
        }
        $stock->save();
    }

    public function calculateTotalSold(): int
    {
        return $this->stockMovements()
            ->where('type', 'remove')
            ->where('reason', 'Vente')
            ->sum('quantity');
    }

    public function calculateTotalEarnings(): float
    {
        $totalSold = $this->calculateTotalSold();
        return $totalSold * $this->unit_price;
    }

    public function reviews()
{
    return $this->hasMany(Review::class);
}

public function averageRating()
{
    return $this->reviews()->avg('rating');
}


}

<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Panier extends Model
{
    /** @use HasFactory<\Database\Factories\PanierFactory> */
    use HasFactory;

    protected $fillable = ['client_id', 'creation_date', 'status'];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($panier) {
                $panier->_id = (string) Str::uuid();
            }
        );
    }

    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'panier_items', 'panier_id', 'product_id')->withPivot('quantity');
    }
}

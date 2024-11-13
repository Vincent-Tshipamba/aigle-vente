<?php

namespace App\Models;

use App\Models\Client;
use App\Models\Employe;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        '_id',
        'daily_counter',
        'order_number',
        'order_date',
        'status',
        'client_id',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($order) {
            $order->_id = (string) Str::uuid();

            $currentDate = date('Ymd');

            // Vérifier s'il existe déjà des commandes pour aujourd'hui
            $lastCommande = Order::whereDate('order_date', now())->orderBy('daily_counter', 'desc')->first();

            // Si une commande existe, incrémenter le compteur
            if ($lastCommande) {
                $compteurJournalier = $lastCommande->daily_counter + 1;
            } else {
                // Sinon, démarrer le compteur à 1
                $compteurJournalier = 1;
            }

            // Affecter la date et le compteur
            $order->order_date = now();
            $order->daily_counter = $compteurJournalier;

            // Générer le numéro de commande
            $order->order_number = 'CMD-' . $currentDate . '-' . str_pad($compteurJournalier, 6, '0', STR_PAD_LEFT);
        });
    }


    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

    public function factures(): HasMany
    {
        return $this->hasMany(Facture::class);
    }

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'order_products', 'order_id', 'product_id')
            ->withPivot('quantity');
    }
}
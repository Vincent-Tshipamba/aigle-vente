<?php

namespace App\Models;

use App\Models\Order;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Facture extends Model
{
    use HasFactory;

    protected $fillable = [
        '_id',
        'daily_counter',
        'facture_number',
        'order_id',
        'total_tva',
        'total_ht',
        'total_ttc',
        'date_facture',
        'status'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($facture) {
            $facture->_id = (string) Str::uuid();

            $currentDate = date('Ymd');

            // Vérifier s'il existe déjà des factures pour aujourd'hui
            $lastFacture = Facture::whereDate('date_facture', now())->orderBy('daily_counter', 'desc')->first();

            // Si une facture existe, incrémenter le compteur
            if ($lastFacture) {
                $compteurJournalier = $lastFacture->daily_counter + 1;
            } else {
                // Sinon, démarrer le compteur à 1
                $compteurJournalier = 1;
            }

            // Affecter la date et le compteur
            $facture->date_facture = now();
            $facture->daily_counter = $compteurJournalier;

            // Générer le numéro de facture
            $facture->facture_number = 'AIGV-' . $currentDate . '-' . str_pad($compteurJournalier, 6, '0', STR_PAD_LEFT);
        });
    }

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }
}
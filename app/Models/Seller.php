<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Seller extends Model
{
    use HasFactory;

    protected $fillable = [
        '_id',
        'first_name',
        'last_name',
        'phone',
        'sexe',
        'picture',
        'address',
        'location_id',
        'user_id',
        'is_active'
    ];

    /**
     * Ajout de types de conversion pour les attributs
     */
    protected $casts = [
        'phone' => 'string',
        'sexe' => 'string'
    ];

    /**
     * Initialisation de l'ID UUID
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->_id = (string) Str::uuid();
        });
    }

    /**
     * Relation avec l'utilisateur (User)
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relation avec les boutiques (Shops)
     */
    public function shops(): HasMany
    {
        return $this->hasMany(Shop::class);
    }

    /**
     * Méthode pour récupérer le nom complet
     */
    public function getFullNameAttribute(): string
    {
        return "{$this->first_name} {$this->last_name}";
    }

    /**
     * Méthode pour vérifier si le vendeur a une photo de profil
     */
    public function hasProfilePicture(): bool
    {
        return !is_null($this->picture);
    }

    public function location(): BelongsTo
    {
        return $this->belongsTo(Location::class);
    }
}

<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Namu\WireChat\Traits\Chatable;
use Illuminate\Support\Facades\Cache;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasRoles;
    use Chatable;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'password',
        'is_active',
        'last_activity',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];



    public function isOnline()
    {
        return Cache::has('user-is-online-' . $this->id);
    }


    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function hasAnyRole(array $roles): bool
    {
        return $this->roles()->whereIn('name', $roles)->exists();
    }

    public function client(): HasOne
    {
        return $this->hasOne(Client::class);
    }

    public function seller(): HasOne
    {
        return $this->hasOne(Seller::class);
    }

    public function isSeller(): bool
    {
        return $this->seller()->exists();
    }

    public function wishlist():HasOne
    {
        return $this->hasOne((Wishlist::class));
    }

    public function getCoverUrlAttribute(): ?string
    {
        return $this->avatar_url ?? null;
    }

    public function hasConversationWith(User $user): bool
    {
        return $this->hasConversationWith($user);
    }

    public function canCreateChats(): bool
    {
        return true;
    }
    public function canCreateGroups(): bool
    {
        return true;
    }


}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShopVisit extends Model
{
    protected $fillable = ['shop_id', 'ip_address', 'user_agent'];

    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }
}

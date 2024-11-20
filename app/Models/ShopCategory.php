<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ShopCategory extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];
    public function shops()
    {
        return $this->hasMany(Shop::class);
    }
}

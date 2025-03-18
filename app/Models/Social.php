<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Social extends Model
{
    /** @use HasFactory<\Database\Factories\SocialFactory> */
    use HasFactory;
    protected $table = 'socials';
    protected $fillable = ['seller_id', 'facebook', 'instagram'];
    

    public function seller()
    {
        return $this->belongsTo(Seller::class);
    }
}
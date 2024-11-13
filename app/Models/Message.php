<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        '_id',
        'sender_id',
        'receiver_id',
        'message',
        'is_read',
        'product_id',

    ];

    /**
     * Relationship with the sender (User model).
     */

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->_id = (string) Str::uuid();
        });
    }


    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }

    /**
     * Relationship with the receiver (User model).
     */
    public function receiver()
    {
        return $this->belongsTo(User::class, 'receiver_id');
    }

    /**
     * Scope for unread messages.
     */
    public function scopeUnread($query)
    {
        return $query->where('is_read', false);
    }

    /**
     * Mark message as read.
     */
    public function markAsRead()
    {
        $this->is_read = true;
        $this->save();
    }

    /**
     * Mark message as unread.
     */
    public function markAsUnread()
    {
        $this->is_read = false;
        $this->save();
    }

    /**
     * Accessor to get a snippet of the message content.
     */
    public function getSnippetAttribute()
    {
        return strlen($this->message) > 50
            ? substr($this->message, 0, 50) . '...'
            : $this->message;
    }

    /**
     * Accessor to get the formatted created_at date.
     */
    public function getFormattedDateAttribute()
    {
        return $this->created_at->format('d M, Y h:i A');
    }
}

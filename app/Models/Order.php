<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    public static array $coins = ['BTC', 'ETH', 'DOT', 'APT'];
    public static array $type = ['buy', 'sell'];

    protected $fillable = [
        'coin', 'type', 'amount', 'price', 'user_id'
    ];

    protected static function booted(): void
    {
        static::deleted(function(Order $order){
            cache()->forget('orders');
        });
        
        static::deleted(function(Order $order){
            cache()->forget('orders');
        });
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}

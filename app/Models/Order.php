<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    use HasFactory;

    public static array $coins = ['BTC', 'ETH', 'DOT', 'APT'];
    public static array $type = ['buy', 'sell'];

    protected $fillable = [
        'coin', 'type', 'amount', 'price', 'user_id'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}

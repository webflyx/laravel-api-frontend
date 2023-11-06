<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public static array $coins = ['BTC', 'ETH', 'DOT', 'APT'];
    public static array $type = ['buy', 'sell'];
}

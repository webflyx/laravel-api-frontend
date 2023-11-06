<?php

namespace App\Console\Commands;

use App\Models\Coin;
use App\Models\Order;
use Illuminate\Console\Command;
use App\Notifications\ChangePriceNotification;

class SendAlerts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-alerts';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $orders = Order::all();

        foreach ($orders as $order) {
            $order_coin = strtolower($order->coin);
            $order_price = $order->price;

            $price = Coin::where('symbol', $order_coin)->first()->price;
            $price_plus_10_percent = $price + ($price * 10 / 100);

            if ($price_plus_10_percent >= $order_price) {
                $order->user()->notify(new ChangePriceNotification($order));
            }
        }
    }
}

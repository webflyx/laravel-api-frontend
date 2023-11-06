<?php

namespace App\Console\Commands;

use App\Models\Coin;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class ParsePrices extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:parse-prices';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Parse crypto prices';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $resource = Http::get('https://api.coingecko.com/api/v3/coins/markets?vs_currency=usd&order=market_cap_desc&per_page=250&page=1&sparkline=false&locale=en');
        $data = json_decode($resource, true);

        foreach ($data as $coin) {
            Coin::updateOrCreate([
                'symbol' => $coin['symbol'], 
                'name' => $coin['name'], 
                'price' => $coin['current_price'], 
                'price_change_24' => $coin['price_change_24h'], 
                'price_change_percentage_24' => $coin['price_change_percentage_24h']
            ]);
        }

        $this->info('Parsing ended successfully!');
    }
}

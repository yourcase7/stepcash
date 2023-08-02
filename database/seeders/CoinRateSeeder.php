<?php

namespace Database\Seeders;

use App\Models\CoinRate;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CoinRateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $coinRate = CoinRate::create([
            'coin'  => 50,
            'rupiah' => 50,
            'step' => 1000,
            'coin_balance' => 1000000
        ]);

        $coinRate->coin_rate_history()->create([
            'coin' => 1000000,
            'rupiah' => 1000000,
            'type' => 'add',
            'last_balance_coin' => 1000000,
            'description' => 'Manual added coin balance'
        ]);

    }
}

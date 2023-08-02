<?php

namespace Database\Seeders;

use App\Models\Level;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Level::create([
            'title' => 'Basic',
            'limit_step' => 8000,
            'reward_affiliate' => 5000,
            'price' => 0
        ]);
        Level::create([
            'title' => 'Premium',
            'limit_step' => 18000,
            'reward_affiliate' => 15000,
            'price' => 15000
        ]);
        Level::create([
            'title' => 'Eksklusif',
            'limit_step' => 30000,
            'reward_affiliate' => 30000,
            'price' => 20000
        ]);
    }
}

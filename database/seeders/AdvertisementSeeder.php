<?php

namespace Database\Seeders;

use App\Models\Advertisement;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdvertisementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = ['lee-minerale.jpg'];

        foreach ($data as $row => $value) {
            $ads = Advertisement::create([
                'title' => 'Lee Minerale',
                'description' => 'Minuman kemasan',
                'thumbnail' => url("image/img/".$value),
                'status' => 1,
                'reward_coin' => rand(1,5),
                'active_until' => now()
            ]);
        }
    }
}

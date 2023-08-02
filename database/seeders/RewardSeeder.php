<?php

namespace Database\Seeders;

use App\Models\Reward;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RewardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            'Fitness Bar - Skipping',
            'Fitness Bar - SitUp Stand',
            'Fitness Bar - Matras Yoga',
            'Toko Olahraga Kasuari - Baju Olahraga',
            'Toko Olahraga Kasuari - Sepatu Olahraga',
            'Toko Olahraga Kasuari - Tas Olahraga',
            'Voucher - ACE Gym 1 Bulan',
            'ACE Gym - Supplemen',
        ];

        $dataImage = [
            "skipping.jpg",
            "situpstand.jpg",
            "matras.jpg",
            "bajuolahraga.jpeg",
            "sepatuolahraga.jpg",
            "tasolahraga.jpg",
            "voucher.jpg",
            "suplemen.jpg",
        ];

        foreach ($data as $row => $value) {
            Reward::create([
                'title' => $value,
                'description' => $value,
                'thumbnail' => "storage/img/".$dataImage[$row],
                'coin' => $row+1*10,
                'stock' => $row+1,
                'stock' => $row+1,
                'level_id' => rand(1,3)
            ]);
        }
    }
}

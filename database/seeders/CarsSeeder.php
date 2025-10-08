<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cars;

class CarsSeeder extends Seeder
{
    public function run(): void
    {
        $rows = [
            [
                'brand' => 'Toyota',
                'model' => 'Avanza 1.5 G',
                'year' => 2021,
                'color' => 'Silver',
                'price' => 215000000,
                'plate_number' => 'L 1234 AB',
                'transmission' => 'automatic',
                'fuel_type' => 'bensin',
                'status' => 'available',
                'description' => 'Unit siap pakai, servis rutin.',
                'created_at' => now(), 'updated_at' => now(),
            ],

            [
                'brand' => 'Mitsubishi',
                'model' => 'Xpander Exceed',
                'year' => 2022,
                'color' => 'Hitam',
                'price' => 295000000,
                'plate_number' => 'N 1122 ZZ',
                'transmission' => 'automatic',
                'fuel_type' => 'bensin',
                'status' => 'available',
                'description' => 'Kabin luas, cocok family.',
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'brand' => 'Daihatsu',
                'model' => 'Ayla 1.2 R',
                'year' => 2019,
                'color' => 'Kuning',
                'price' => 115000000,
                'plate_number' => 'L 5566 CD',
                'transmission' => 'manual',
                'fuel_type' => 'bensin',
                'status' => 'rented',
                'description' => 'Irit, cocok harian.',
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'brand' => 'Suzuki',
                'model' => 'Ertiga GX',
                'year' => 2021,
                'color' => 'Putih',
                'price' => 230000000,
                'plate_number' => 'AG 3344 MN',
                'transmission' => 'automatic',
                'fuel_type' => 'bensin',
                'status' => 'maintenance',
                'description' => 'Servis berkala, siap jalan.',
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'brand' => 'Toyota',
                'model' => 'Kijang Innova Reborn',
                'year' => 2018,
                'color' => 'Abu-abu',
                'price' => 325000000,
                'plate_number' => 'L 1 INA',
                'transmission' => 'automatic',
                'fuel_type' => 'diesel',
                'status' => 'available',
                'description' => 'Mesin halus, interior bersih.',
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'brand' => 'Hyundai',
                'model' => 'Ioniq 5',
                'year' => 2023,
                'color' => 'Matte Gray',
                'price' => 820000000,
                'plate_number' => 'L EV 05',
                'transmission' => 'automatic',
                'fuel_type' => 'listrik',
                'status' => 'available',
                'description' => 'EV modern, jarak tempuh jauh.',
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'brand' => 'Wuling',
                'model' => 'Air EV Long Range',
                'year' => 2023,
                'color' => 'Biru',
                'price' => 310000000,
                'plate_number' => 'S 7788 EV',
                'transmission' => 'automatic',
                'fuel_type' => 'listrik',
                'status' => 'rented',
                'description' => 'City car kompak, hemat.',
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'brand' => 'Nissan',
                'model' => 'Grand Livina',
                'year' => 2017,
                'color' => 'Coklat',
                'price' => 145000000,
                'plate_number' => 'L 9090 NN',
                'transmission' => 'manual',
                'fuel_type' => 'bensin',
                'status' => 'available',
                'description' => 'MPV nyaman, jok 3 baris.',
                'created_at' => now(), 'updated_at' => now(),
            ],
            

        ];

        Cars::insert($rows); // insert langsung (lebih cepat), sudah termasuk timestamps
    }
}

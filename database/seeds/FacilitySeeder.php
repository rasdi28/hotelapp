<?php

use Illuminate\Database\Seeder;
use App\Model\Facilities;

class FacilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fasilities = [
            [
                'name'=>'Breakfest',
                'detail'=>'menyediakan layanan makan pagi dengan menu lebih dari 10 jenis'
            ],
            [
                'name'=>'Free Wifi',
                'detail'=>'layanan wifi dengan kecepatan 10 Mbps'
            ],
            [
                'name'=>'Ruang Meeting',
                'detail'=>'Menyediakan fasilitas meeting untuk 10 orang'
            ],
            [
                'name'=>'Kolam Renang',
                'detail'=>'Layanan Kolam Renang'
            ]
            ];

            foreach ($fasilities as $fasility){
                Facilities::create($fasility);
            }
    }
}

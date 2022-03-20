<?php

use App\Model\Room_statuses;
use Illuminate\Database\Seeder;

class RoomStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $room_status = [
            [
                'name'=>'DELUXE',
                'code'=>'ABC',
                'information'=>'informasi'
            ],
            [
                'name'=>'EXPENSIVE',
                'code'=>'ABCDE',
                'information'=>'informasi 2'   
            ]
            ];

            foreach ($room_status as $room){
                Room_statuses::create($room);
            }
    }
}

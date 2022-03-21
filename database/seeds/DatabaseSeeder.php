<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        $this->call(FacilitySeeder::class);
        $this->call(RoomStatusTableSeeder::class);
        $this->call(TypesTableSeeder::class);
        $this->call(UserTableSeeder::class);
    }
}

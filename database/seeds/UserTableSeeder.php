<?php

use App\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users= [
            [
            'name'=>'rasdi',
            'email'=>'rasdi@gmail.com',
            'password'=>bcrypt('rasdi123'),
            'role'=>'Super Admin',
            'avatar'=>'image.png'
        ],
        [
            'name'=>'user',
            'email'=>'user@gmail.com',
            'password'=>bcrypt('user12345'),
            'role'=>'Customer',
            'avatar'=>'image.png'
        ]
        ];

        foreach($users as $user){
            User::create($user);
        }
    }
}

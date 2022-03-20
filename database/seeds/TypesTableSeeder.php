<?php

use App\Model\Types;
use Illuminate\Database\Seeder;

class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            [
                'name'=>'Duluxe',
                'information'=>'sebuah kamar dengan bintang 5'
            ],
            [
                'name'=>'Standard Room',
                'information'=>'kamar tipe ini dibanderol dengan harga yang relatif murah. Fasilitas yang ditawarkan pun standar seperti kasur ukuran king size atau dua queen size. Namun, penawaran yang diberikan tergantung pada masing-masing hotel'
            ],
            [
                'name'=>'Superior Room',
                'information'=>'superior room adalah tipe kamar yang sedikit lebih baik dari tipe standard room'
            ],
        ];

        foreach ($types as $type){
            Types::create($type);
        }
        

    }
}

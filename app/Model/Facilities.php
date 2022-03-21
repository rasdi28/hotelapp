<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Facilities extends Model
{
    protected $fillable = [
        'facility_id','room_id'
    ];
}

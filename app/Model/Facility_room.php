<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Facility_room extends Model
{
    protected $fillable = [
        'facility_id','room_id'
    ];

    public function facilitas(){
        return $this->belongsTo(Facilities::class,'facility_id');
    }

}

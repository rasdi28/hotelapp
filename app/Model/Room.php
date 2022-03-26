<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = [
        'type_id','number','capasity','price','view','room_status_id','room_status'
    ];

    public function type()
    {
        return $this->belongsTo(Types::class,'type_id');
    }
}

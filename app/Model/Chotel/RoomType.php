<?php

namespace App\Model\Chotel;

use Illuminate\Database\Eloquent\Model;

class RoomType extends Model
{
    //
    protected $table = 'room_type';
    protected $primaryKey = 'type_id';
    public $timestamps = false;

    public $fillable = [
        'tname'
    ];
}

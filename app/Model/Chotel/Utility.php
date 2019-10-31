<?php

namespace App\Model\Chotel;

use Illuminate\Database\Eloquent\Model;

class Utility extends Model
{
    //
    protected $table ='utilities';
    protected $primaryKey = 'uid';

    protected $fillable = [
        'uname'
    ];
}

<?php

namespace App\Model\Chotel;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    //
    protected $table = 'vnecontact';
    protected $primaryKey = 'cid';
    public $timestamps = false;
    protected $fillable = [
        'fullname',
        'email',
        'subject',
        'content'
    ];

}

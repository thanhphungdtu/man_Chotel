<?php

namespace App\Model\Chotel;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class User extends Model
{
    //
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $fillable = [
        'password',
        'fullname'
    ];

    public function index()
    {
        $listUser = DB::table('users as u')
            ->join('roles as r', 'u.role_id', '=', 'r.id')
            ->select('u.id', 'username', 'fullname', 'role')
            ->get();
        //dd($listUser);
        return $listUser;
    }

    public function getEdit($id)
    {
        $user = DB::table('users as u')
            ->join('roles as r', 'u.role_id', '=', 'r.id')
            ->select('u.id', 'username', 'fullname', 'role', 'u.role_id')
            ->where('u.id', $id)
            ->first();
        //dd($user);
        return $user;
    }

    public function postEdit($id, $arr)
    {
        return DB::table('users')
            ->where('id', $id)
            ->update($arr);
    }

    public function postAdd($arr)
    {
        return DB::table('users')
            ->insert($arr);
    }

    public function deleteUser($id)
    {
        return DB::table('users')
            ->where('id', $id)
            ->delete();
    }
}

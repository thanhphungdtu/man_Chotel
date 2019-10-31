<?php

namespace App\Model\Chotel;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Role extends Model
{
    //
    protected $table = 'roles';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name'
    ];

    public function getRole()
    {
        $listRole = DB::table('roles')
            ->select()
            ->get();
        return $listRole;
    }

    public function getRoleById($id)
    {
        $role = DB::table('roles')
            ->where('id', $id)
            ->first();
        return $role;
    }
}

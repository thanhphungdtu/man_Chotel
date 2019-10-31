<?php

namespace App\Model\Chotel;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Room extends Model
{
    //

    protected $table = 'rooms';
    protected $primaryKey = 'rid';
    protected $fillable = [
        'rname',
        'description',
        'type_id',
        'picture',
        'uid'
    ];


    /*
     * Chotel public
     * */
    public function getListRoom()
    {
        $listRoom = DB::table('rooms as r')
            ->join('utilities as u', 'r.uid', '=', 'u.uid')
            ->select('rid', 'rname', 'description', 'uname', 'picture')
            ->orderBy('rid', 'desc')
            ->paginate(getenv('NUM_OF_PAGE'));
        return $listRoom;
    }

    public function getDetail($id)
    {
        $roomDetail = DB::table('rooms as r')
            ->join('room_type as t', 'r.type_id', '=', 't.type_id')
            ->join('utilities as u', 'r.uid', '=', 'u.uid')
            ->select('rid', 'rname', 'description', 'picture', 'uname', 'tname', 'r.type_id')
            ->where('rid', $id)
            ->first();
        return $roomDetail;
    }

    public function getRelative($id, $type_id)
    {
        $relativeRoom = DB::table('rooms')
            ->select('rid', 'rname')
            ->where('type_id', $type_id)
            ->where('rid', '!=', $id)
            ->orderBy('rid', 'desc')
            ->limit(5)
            ->get();
        return $relativeRoom;
    }

    //get room refer catagory id
    public function getRoomByCategory($id)
    {
        $listRoom = DB::table('rooms as r')
            ->join('utilities as u', 'r.uid', '=', 'u.uid')
            ->select('rid', 'rname', 'description', 'picture', 'uname')
            ->where('type_id', $id)
            ->orderBy('rid', 'desc')
            ->paginate(5);
        return $listRoom;
    }

    //search
    public function search($txt) {
        $listRoom = DB::table('rooms as r')
            ->join('utilities as u', 'r.uid', '=', 'u.uid')
            ->select('rid', 'rname', 'description', 'picture', 'uname')
            ->where('rname', 'like', '%' . $txt . '%')
            ->orWhere('description', 'like', '%' . $txt . '%')
            ->orderBy('rid', 'desc')
            ->paginate(getenv('NUM_OF_PAGE'));
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Chotel\RoomTypeRequest;
use App\Model\Chotel\RoomType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class RoomTypeController extends Controller
{
    //
    public function getRoomType()
    {
        $roomType = DB::table('room_type')
            ->select()
            ->get();
        //dd($roomType);
        return view('admin.room-type.index', compact('roomType'));
    }

    public function addRoomType()
    {
        return view('admin.room-type.add');
    }

    public function addPostRoomType(RoomTypeRequest $request)
    {
        $name = $request->loai_phong;
        $arrType['tname'] = $name;
        RoomType::insert($arrType);
        return redirect()->route('admin.roomType.getRoomType');
    }

    public function editGetRoomType($id)
    {
        $roomType = DB::table('room_type')
            ->select()
            ->where('type_id', $id)
            ->first();
        //dd($roomType);
        return view('admin.room-type.edit', compact('roomType'));
    }

    public function editPostRoomType(RoomTypeRequest $request)
    {
        $type_id = $request->type_id;
        //dd($type_id);
        $arrType['tname'] = $request->type_name;
        RoomType::find($type_id)->update($arrType);
        return redirect()->route('admin.roomType.getRoomType');
    }

    public function deleteRoomType($id)
    {
        $result = DB::table('room_type')
            ->where('type_id', $id)
            ->delete();
        if ($result) {
            return redirect()->route('admin.roomType.getRoomType')->with('msg', 'Deleted successfully');
        }
        return redirect()->route('admin.roomType.getRoomType');
    }
}

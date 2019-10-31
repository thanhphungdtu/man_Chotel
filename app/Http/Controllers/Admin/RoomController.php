<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Chotel\RoomRequest;
use App\Model\Chotel\Room;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class RoomController extends Controller
{


    //
    /**
     * RoomController constructor.
     */
    public function __construct(Room $room)
    {
        $this->room = $room;
    }

    public function getRoom()
    {
        $roomList = DB::table('rooms as r')
            ->join('room_type as t', 'r.type_id', '=', 't.type_id')
            ->join('utilities as u', 'r.uid', '=', 'u.uid')
            ->select('rid', 'rname', 'uname', 'description', 'r.type_id', 'picture', 'tname')
            ->orderBy('rid', 'desc')
            ->paginate(5);
        //dd($roomList);

        return view('admin.room.index', compact('roomList'));
    }

    public function getEditRoom($id)
    {
        $room = DB::table('rooms')
            ->select()
            ->where('rid', $id)
            ->first();
        //dd($room);
        $listType = DB::table('room_type')
            ->select()
            ->get();
        //dd($listType);
        return view('admin.room.edit', compact('room', 'listType'));
    }

    public function postEditRoom(RoomRequest $request)
    {

        //$room->rid = $request->rid;
        $room = Room::find($request->rid);
        $room->rname = $request->ten_phong;
        $room->type_id = $request->loai_phong;
        $room->description = $request->mota;

        if ($request->hasFile('hinhanh')) {
            $filePath = $request->file('hinhanh')->store('files');
            $arrFile = explode("/", $filePath);
            $fileName = end($arrFile);
            $room->picture = $fileName;
        }
        $result = $room->save();
        if ($result) {
            $request->session()->flash('msg', 'Updated successfully');
        }
        return redirect()->route('admin.room.getRoom');
        //dd($room);
    }

    public function getAddRoom()
    {
        $listType = DB::table('room_type')
            ->select()
            ->get();
        $utilities = DB::table('utilities')
            ->select()
            ->get();
        //dd($listType);
        return view('admin.room.add', compact('listType', 'utilities'));
    }

    public function postAddRoom(RoomRequest $request)
    {
        $room = new Room();
        $room->rname = $request->ten_phong;
        $room->type_id = $request->loai_phong;
        $room->description = $request->mota;
        $room->uid = $request->thiet_bi;
        //dd($room);
        //upload file
        $pathFile = $request->file('hinhanh')->store('files');
        $arrFile = explode('/', $pathFile);
        $room->picture = end($arrFile);

        $result = $room->save();
        if ($result) {
            $request->session()->flash('msg', 'Add a room successfully');
        }
        return redirect()->route('admin.room.getRoom');
    }

    public function deleteRoom($id)
    {
        $result = DB::table('rooms')
            ->where('rid', $id)
            ->delete();
        if ($result) {
            //Session::put('msg', 'Deleted successfully');

        }
        return redirect()->route('admin.room.getRoom')->with('msg', 'Deleted successfully');
    }
}
